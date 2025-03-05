<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArticlesController extends Controller
{
    public function articlesPage()
    {
        $get = Articles::get();
        return view('admin.articles.articles', compact('get'));
    }

    public function addarticles()
    {
        // $get = Ad::get();
        return view('admin.articles.add_articles');
    }
   

    public function savearticles(Request $request)
    {
        

        $rules = [
            'name' => 'required',
            'date' => 'required',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        $profile = null;
$articles = new Articles();


$content = $request->full_description;
$dom = new \DomDocument();
$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$imageFile = $dom->getElementsByTagName('img');

foreach($imageFile as $item => $image){
    $data = $image->getAttribute('src');
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $imgeData = base64_decode($data);
    $image_name= "upload/" . time().$item.'.png';
    $path = public_path() . $image_name;
    file_put_contents($path, $imgeData);
    
    $image->removeAttribute('src');
    $image->setAttribute('src', $image_name);
 }

$content = $dom->saveHTML();



        $articles->name = $request->name;
        $articles->date = $request->date;
        $articles->enddate = $request->enddate;
        $articles->description = $request->description;
        $articles->full_description = $request->full_description;
        $articles->location = $request->location;
        $articles->organized_by = $request->organized_by;
        $articles->tel = $request->tel;
        $articles->email = $request->email;
        $articles->website = $request->website;
        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/articles/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/articles/image/', $name);
            $articles->image = $profile;
            
        }

        $saved = $articles->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.articlespage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editarticles($id)
    {

        $edit = Articles::where('id', $id)->first();
        // $state = States::all();
        // $category = Category::all();
        // $subcategory = Subcategory::all();

        return view('admin.articles.articles_edit', compact('edit'));
    }

    public function updatearticles(Request $request)
    {
        $rules = [
            'name' => 'required',
            'date' => 'required'

        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Articles::find($request->id);

        if ($request->hasfile('image')) {

            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/articles/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/articles/image/', $name);
        } else {
            $profile = $update->image;
        }

        $update->name = $request->name;
        $update->date = $request->date;
        $update->enddate = $request->enddate;
        $update->description = $request->description;
        $update->full_description = $request->full_description;
        $update->location = $request->location;
        $update->organized_by = $request->organized_by;
        $update->tel = $request->tel;
        $update->email = $request->email;
        $update->website = $request->website;
        $update->image = $profile;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.articlespage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletearticles(Request $request)
    {
        $delete = Articles::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.articlespage')));
        }
    }

    public function articlesAjaxList(Request $request)
    {

        if (isset($request->search['value'])) {
            $search = $request->search['value'];
        } else {
            $search = '';
        }

        if (isset($request->length)) {
            $limit = $request->length;
        } else {
            $limit = 10;
        }

        if (isset($request->start)) {
            $ofset = $request->start;
        } else {
            $ofset = 0;
        }
        $orderType = $request->order[0]['dir'];
        $nameOrder = $request->columns[$request->order[0]['column']]['name'];

        $article = Articles::select('articles.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });


        $total = $article->count();

        $articles = $article->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($articles as $article) {
            $color = $article->status == 1 ? "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesatus_c" data-id="' . $article->id . '">' . ($article->status == 1 ? "Enable" : "Disable") . ' </button>';

            // $color_m = $ad->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $ad->id . '">' . ($ad->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $article->name,
                $article->date,
                $article->enddate,
                '<img src="' . asset($article->image) . '" height="40px" width="40px">',
                $article->description,
                $article->location,
                $article->organized_by,
                $article->tel,
                $article->email,
                $article->website,
                $status,
                '<a href="' . route('admin.editarticles', $article->id) . '" class="h5 p-0 pl-2  edit_articles"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_articles" data-id = "' . $article->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] = $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function articles_changestatus(Request $request)
    {
        $updatestatus = Articles::find($request->articles_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $articles_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

   
   

}
