<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NewsController extends Controller
{
    public function newsPage()
    {
        $get = News::get();
        return view('admin.news.news', compact('get'));
    }

    public function addnews()
    {
        // $get = Ad::get();
        return view('admin.news.add_news');
    }
   

    public function savenews(Request $request)
    {
        

        $rules = [
            'name' => 'required',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        $profile = null;

        $news = new News();
        $news->name = $request->name;
        // $news->date = $request->date;
        // $news->enddate = $request->enddate;
        $news->description = $request->description;
        $news->full_description = $request->full_description;
        // $news->location = $request->location;
        // $news->organized_by = $request->organized_by;
        // $news->tel = $request->tel;
        // $news->email = $request->email;
        $news->website = $request->website;
        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/news/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/news/image/', $name);
            $news->image = $profile;
            
        }

        $saved = $news->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.newspage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editnews($id)
    {

        $edit = News::where('id', $id)->first();
        // $state = States::all();
        // $category = Category::all();
        // $subcategory = Subcategory::all();

        return view('admin.news.news_edit', compact('edit'));
    }

    public function updatenews(Request $request)
    {
        $rules = [
            'name' => 'required',

        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = News::find($request->id);

        if ($request->hasfile('image')) {

            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/news/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/news/image/', $name);
        } else {
            $profile = $update->image;
        }

        $update->name = $request->name;
        // $update->date = $request->date;
        // $update->enddate = $request->enddate;
        $update->description = $request->description;
        $update->full_description = $request->full_description;
        // $update->location = $request->location;
        // $update->organized_by = $request->organized_by;
        // $update->tel = $request->tel;
        // $update->email = $request->email;
        $update->website = $request->website;
        $update->image = $profile;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.newspage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletenews(Request $request)
    {
        $delete = News::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.newspage')));
        }
    }

    public function newsAjaxList(Request $request)
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

        $new = News::select('news.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });


        $total = $new->count();

        $news = $new->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($news as $new) {
            $color = $new->status == 1 ? "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesatus_c" data-id="' . $new->id . '">' . ($new->status == 1 ? "Enable" : "Disable") . ' </button>';

            // $color_m = $ad->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $ad->id . '">' . ($ad->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $new->name,
                // $new->date,
                // $new->enddate,
                '<img src="' . asset($new->image) . '" height="40px" width="40px">',
                $new->description,
                // $new->location,
                // $new->organized_by,
                // $new->tel,
                // $new->email,
                $new->website,
                $status,
                '<a href="' . route('admin.editnews', $new->id) . '" class="h5 p-0 pl-2  edit_news"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_news" data-id = "' . $new->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] = $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function news_changestatus(Request $request)
    {
        $updatestatus = News::find($request->news_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $news_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

   
   

}
