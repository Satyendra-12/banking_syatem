<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    public function pagePage()
    {
        $get = Page::get();
        return view('admin.page.page', compact('get'));
    }


    public function addpage()
    {
        // $brands = Brand::all();
       
        return view('admin.page.add_page');
    }

    public function savepage(Request $request)
    {    
        // echo"<pre>",print_r($request->all());   
        // exit;
        
        $rules = [         
            'page_name' => 'required',
            'link' => 'required',
            // 'page_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            // 'page_icon' => 'nullable|image|mimes:svg|max:4096'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        
        $page = new Page();      
        $page->page_name = $request->page_name;
        $page->link = $request->link;
        // $page->manu_status = $request->manu_status;
        // $page->brand_id = $request->brand_id;

        if ($request->hasfile('page_cover'))
        {
            $ext = $request->file('page_cover')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'asset/img/page/image/' . $name;
            $request->file('page_cover')->move(public_path() . '/asset/img/page/image/', $name);
            $page->page_cover = $profile;
        }

            // $image = $request->file('page_cover');
            // $ext = $image->getClientOriginalExtension();
            // $name = substr(uniqid(), 0, 9) . '.' . $ext;
            // $profile = '/storage/app/public/page/image' . $name;
            // $image->save(storage_path('storage/app/public/page/image'));

            // Move and resize the uploaded image

            // $image = Image::make($image)->fit(400, 200, function ($constraint) {
            // $constraint->upsize();

            // $image->save(storage_path('app/public/page/image'));
            // $request->file('page_cover')->move(storage_path() . '/app/public/page/icon', $name);
        // }

        // if ($request->hasfile('page_icon'))
        // {
        //     $ext = $request->file('page_icon')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $iconprofile = 'storage/app/public/page/icon/' . $name;
        //     $request->file('page_icon')->move(storage_path() . '/app/public/page/icon/', $name);
        //     $page->page_icon = $iconprofile;
        // }
        
        $saved = $page->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.pagepage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editpage($id)
    {
       
        $edit = Page::where('id', $id)->first();

        return view('admin.page.page_edit', compact('edit'));
    }

    public function updatepage(Request $request)
    {
        $rules = [
            'page_name' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Page::find($request->id);

        if ($request->hasfile('page_cover')) {

            $ext = $request->file('page_cover')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'asset/img/page/image/' . $name;
            $request->file('page_cover')->move(public_path() . '/asset/img/page/image/', $name);
        } else {
            $profile = $update->page_cover;
        }

        // if ($request->hasfile('page_icon')) {

            // $page_icon = $request->file('page_icon')->store('page/icon');

        //     $ext = $request->file('page_icon')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $page_icon = 'storage/app/public/page/icon/' . $name;
        //     $request->file('page_icon')->move(storage_path() . '/app/public/page/icon/', $name);
        // } else {
        //     $page_icon = $update->page_icon;
        // }
        $update->page_name = $request->page_name;
        $update->link = $request->link;
        // $update->brand_id = $request->brand_id;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.pagepage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletepage(Request $request)
    {
        $delete = Page::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.pagepage')));
        }
    }

    public function pageAjaxList(Request $request)
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

        $page = Page::select('pages.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('page_name', 'like', '%' . $search . '%');
            });


        $total = $page->count();

        $pages = $page->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($pages as $page) {    
            $color = $page->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changesatus_c" data-id="' . $page->id . '">' . ($page->status == 1 ? "Active" : "Inactive") . ' </button>';        
            $link = ' <i class="mdi mdi-folder-multiple"></i>  <span>Link:  </span><a style="color: blue !important;text-decoration: underline;">' . $page->link . '</a> <button  type="button" style="margin-left:52px" class="btn '. $color .' changesatus_c" data-id="' . $page->id . '">' . ($page->status == 1 ? "static" : "Dynamic") . ' </button> ';
           $name ='<a style="color: blue !important;">' . $page->page_name . '</a>
           <br> <span style="font-size: smaller;">PageID #</span><text>' . $page->id . '</text> ';
            // $color_m = $page->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $page->id . '">' . ($page->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                '
                <a href="' . route('admin.editpage', $page->id) . '" class="h5 btn  edit_page">Edit</a>
              
                <span class="dropdown" style="margin-left: 20px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   style=" background: transparent;
  color: black !important;">
    Actions
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item h5 p-0 pl-2 delete_page" data-id = "' . $page->id . '"  ><i class="mdi mdi-delete"></i></a>
   
  </span>
  
 ',
                
                
                isset($page->page_cover) ? '<img src="' . asset($page->page_cover) . '" height="70px" width="150px">':' ',
                $name,
                $link,
                // $status_m,
               
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function page_changestatus(Request $request)
    {
        $updatestatus = Page::find($request->page_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subpage_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }
    public function postpage()
    {
        $get = Post::get();
        return view('admin.post.post', compact('get'));
    }

    public function addpost()
    {
        // $brands = Brand::all();
       
        return view('admin.post.add_post');
    }

    public function savepost(Request $request)
    {    
        // echo"<pre>",print_r($request->all());   
        // exit;
        
        $rules = [         
            'post_details' => 'required',
            // 'post_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            // 'post_icon' => 'nullable|image|mimes:svg|max:4096'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        
        $post = new Post(); 
           
        $post->post_details = $request->post_details;
        $post->user_id = Auth::guard('admin')->user()->id;  
        // $post->link = $request->link;
        // $post->manu_status = $request->manu_status;
        // $post->brand_id = $request->brand_id;

        if ($request->hasfile('thumb'))
        {
            $ext = $request->file('thumb')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'asset/img/post/image/' . $name;
            $request->file('thumb')->move(public_path() . '/asset/img/post/image/', $name);
            $post->thumb = $profile;
        }

            // $image = $request->file('post_cover');
            // $ext = $image->getClientOriginalExtension();
            // $name = substr(uniqid(), 0, 9) . '.' . $ext;
            // $profile = '/storage/app/public/post/image' . $name;
            // $image->save(storage_path('storage/app/public/post/image'));

            // Move and resize the uploaded image

            // $image = Image::make($image)->fit(400, 200, function ($constraint) {
            // $constraint->upsize();

            // $image->save(storage_path('app/public/post/image'));
            // $request->file('post_cover')->move(storage_path() . '/app/public/post/icon', $name);
        // }

        // if ($request->hasfile('post_icon'))
        // {
        //     $ext = $request->file('post_icon')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $iconprofile = 'storage/app/public/post/icon/' . $name;
        //     $request->file('post_icon')->move(storage_path() . '/app/public/post/icon/', $name);
        //     $post->post_icon = $iconprofile;
        // }
        
        $saved = $post->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.postpage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editpost($id)
    {
       
        $edit = Post::where('id', $id)->first();

        return view('admin.post.post_edit', compact('edit'));
    }

    public function updatepost(Request $request)
    {
        $rules = [
            'post_details' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Post::find($request->id);

        if ($request->hasfile('thumb')) {

            $ext = $request->file('thumb')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'asset/img/post/image/' . $name;
            $request->file('thumb')->move(public_path() . '/asset/img/post/image/', $name);
        } else {
            $profile = $update->thumb;
        }

        // if ($request->hasfile('post_icon')) {

            // $post_icon = $request->file('post_icon')->store('post/icon');

        //     $ext = $request->file('post_icon')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $post_icon = 'storage/app/public/post/icon/' . $name;
        //     $request->file('post_icon')->move(storage_path() . '/app/public/post/icon/', $name);
        // } else {
        //     $post_icon = $update->post_icon;
        // }
        $update->post_details = $request->post_details;
        // $update->brand_id = $request->brand_id;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.postpage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletepost(Request $request)
    {
        $delete = Post::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.postpage')));
        }
    }

    public function postAjaxList(Request $request)
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

        $post = Post::select('posts.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('post_details', 'like', '%' . $search . '%');
            });


        $total = $post->count();

        $posts = $post->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($posts as $post) {    
            $color = $post->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changesatus_c" data-id="' . $post->id . '">' . ($post->status == 1 ? "Active" : "Inactive") . ' </button>';        
            $link = ' <i class="mdi mdi-folder-multiple"></i>  <span>Link:  </span><a style="color: blue !important;text-decoration: underline;">' . $post->link . '</a> <button  type="button" style="margin-left:52px" class="btn '. $color .' changesatus_c" data-id="' . $post->id . '">' . ($post->status == 1 ? "Published" : "Unpublished") . ' </button> ';
           $name ='<a style="color: blue !important;">' . $post->post_details . '</a><hr style="height:2px" />
           <button  type="button" style="  position: absolute;
           margin-top: -29px;
           right: 8px;
           transform: translateY(-50%);" class="btn '. $color .' changesatus_c" data-id="' . $post->id . '">' . ($post->status == 1 ? "Published" : "Unpublished") . ' </button> 
           <span style="font-size: smaller">Created:</span><text>' . $post->created_at->format('d/m/Y') . '</text> <span style="font-size: smaller;padding-left:50px">Last Edit:</span><text>' . $post->updated_at->format('d/m/Y') . '</text> 
           <br><span style="font-size: smaller">ID:</span><text>' . $post->id . '</text> ';
            // $color_m = $post->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $post->id . '">' . ($post->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                '
               <span> <a href="' . route('admin.editpost', $post->id) . '" class="h5 btn  edit_post">Edit</a></span>
              
                <span class="dropdown" style="margin-left: 20px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   style=" background: transparent;
  color: black !important;">
    Actions
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item h5 p-0 pl-2 delete_post" data-id = "' . $post->id . '"  ><i class="mdi mdi-delete"></i></a>
   
  </span>
  
 ',
                
                
                isset($post->thumb) ? '<img src="' . asset($post->thumb) . '" height="70px" width="150px">':' ',
                $name,
                // $link,
                // $status_m,
               
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function post_changestatus(Request $request)
    {
        $updatestatus = Post::find($request->post_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subpost_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

    


}
