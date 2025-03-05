<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\States;
use App\Models\City;
use App\Models\District;
use App\Models\Listing;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ListController extends Controller
{
    public function listPage()
    {
        $get = Listing::get();
        // $get = Listing::get();
        return view('admin.list.list', compact('get'));
    }

    public function applistPage()
    {
        $get = Listing::get();
        return view('admin.list.applist', compact('get'));
    }
    public function rejlistPage()
    {
        $get = Listing::get();
        return view('admin.list.rejlist', compact('get'));
    }
    public function addlist()
    {
        $state = States::all();
        $category = Category::all();
       
        return view('admin.list.add_list',compact('state','category'));
    }

    public function savelist(Request $request)
    {
        // echo"<pre>",print_r($request->all());   
        // exit;

        $rules = [
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            // 'list_icon' => 'nullable|image|mimes:svg|max:4096'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        $profile = null;
        // $iconprofile = null;

        $list = new Listing();
        $list->title = $request->title;
        $list->description = $request->description;
        // $list->status = $request->status;
        $list->category_id = $request->category_id;
        $list->subcategory_id = $request->subcategor_id;
        // $list->state_id = $request->state;
        // $list->district_id = $request->district;
        // $list->city_id = $request->city;
        $list->address = $request->address;
        $list->pincode = $request->pincode;
        // $list->manu_status = $request->manu_status;
        // $list->brand_id = $request->brand_id;

        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/list/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/list/image/', $name);
            $list->image = $profile;
            
        }



        $saved = $list->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.listPage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editlist($id)
    {

        $edit = Listing::where('id', $id)->first();
        $state = States::all();
        $category = Category::all();
        $subcategory = Subcategory::all();

        return view('admin.list.list_edit', compact('edit','state','category','subcategory'));
    }

    public function updatelist(Request $request)
    {
        $rules = [
            'title' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Listing::find($request->id);

        $update->title = $request->title;
        $update->description = $request->description;
        // $update->status = $request->status;
        $update->category_id = $request->category_id;
        $update->subcategory_id = $request->subcategor_id;
       
        $update->address = $request->address;
        $update->pincode = $request->pincode;
        // $update->manu_status = $request->manu_status;
        // $update->brand_id = $request->brand_id;

        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/list/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/list/image/', $name);
            $update->image = $profile;
            
        }
  $update->update();
    }

    public function deleteCategroy(Request $request)
    {
        $delete = Listing::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.listPage')));
        }
    }

    public function listAjaxList(Request $request)
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

        $list = Listing::select('listings.*','categories.category_name','subcategories.sub_category_name')
        ->join('categories', 'listings.category_id', '=', 'categories.id')
        ->join('subcategories', 'listings.subcategory_id', '=', 'subcategories.id')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('title', 'like', '%' . $search . '%');
            });


        $total = $list->count();

        $lists = $list->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($lists as $list) {
            $color = $list->status == 1 ? "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesatus_c" data-id="' . $list->id . '">' . ($list->status == 1 ? "Active" : "Inactive") . ' </button>';

            // $color_m = $list->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $list->id . '">' . ($list->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $list->title,
                '<img src="' . asset($list->image) . '" height="40px" width="40px">',
            
                $list->address,
                $list->category_name,
                $list->sub_category_name,
                
                $status,
                '<a href="' . route('admin.editlist', $list->id) . '" class="h5 p-0 pl-2  edit_list"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_list" data-id = "' . $list->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] = $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function list_changestatus(Request $request)
    {
        $updatestatus = Listing::find($request->list_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subcatory_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

    public function change_manu_status(Request $request)
    {
        $updatestatus = Listing::find($request->catory_id);
        $updatestatus->manu_status = $updatestatus->manu_status == 1 ? 0 : 1;
        $subcatory_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }
    public function getDistrict(Request $request)
    {
        try {
            $subs = District::where('state_id', $request->state_id)->get();
            // dd($subs);
            return response()->json(['status' => true, 'data' => $subs]);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'data' => $ex->getMessage()]);
        }
    }

    public function getCity(Request $request)
    {
        try {
            $subs = City::where('district_id', $request->district_id)->get();
            return response()->json(['status' => true, 'data' => $subs]);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'data' => $ex->getMessage()]);
        }
    }
    public function modelOnchange(Request $request)
    {
        try {
            
            $get = Subcategory::where('category_id', $request->catid)->get();

            return response()->json(['status' => true, 'data' => $get]);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'data' => $ex->getMessage()]);
        }
    }


}
