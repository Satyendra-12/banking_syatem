<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Details;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DetailsController extends Controller
{
    public function detailsPage()
    {
        $get = Details::get();
        // $get = detailsing::get();
        return view('admin.details.details', compact('get'));
    }

    
    public function adddetails()
    {
       
        return view('admin.details.add_details',compact('state','category'));
    }

    public function savedetails(Request $request)
    {
        // echo"<pre>",print_r($request->all());   
        // exit;

        $rules = [
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            // 'details_icon' => 'nullable|image|mimes:svg|max:4096'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        $profile = null;
        // $iconprofile = null;

        $details = new Details();
        $details->title = $request->title;
        $details->description = $request->description;
        // $details->status = $request->status;
        $details->category_id = $request->category_id;
        $details->subcategory_id = $request->subcategor_id;
        // $details->state_id = $request->state;
        // $details->district_id = $request->district;
        // $details->city_id = $request->city;
        $details->address = $request->address;
        $details->pincode = $request->pincode;
        // $details->manu_status = $request->manu_status;
        // $details->brand_id = $request->brand_id;

        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/details/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/details/image/', $name);
            $details->image = $profile;
            
        }



        $saved = $details->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.detailsPage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editdetails($id)
    {

        $edit = Details::where('id', $id)->first();

        return view('admin.details.details_edit', compact('edit'));
    }

    public function updatedetails(Request $request)
    {
        $rules = [
            'title' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Details::find($request->id);

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
            $profile = 'assets/img/details/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/details/image/', $name);
            $update->image = $profile;
            
        }
  $update->update();
    }

    public function deleteCategroy(Request $request)
    {
        $delete = Details::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.detailsPage')));
        }
    }

    public function detailsAjaxdetails(Request $request)
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

        $details = Details::select('listings.*','categories.category_name','subcategories.sub_category_name')
        ->join('categories', 'listings.category_id', '=', 'categories.id')
        ->join('subcategories', 'listings.subcategory_id', '=', 'subcategories.id')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('title', 'like', '%' . $search . '%');
            });


        $total = $details->count();

        $detailss = $details->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($detailss as $details) {
            $color = $details->status == 1 ? "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesatus_c" data-id="' . $details->id . '">' . ($details->status == 1 ? "Active" : "Inactive") . ' </button>';

            // $color_m = $details->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $details->id . '">' . ($details->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $details->name,
                '<img src="' . asset($details->image) . '" height="40px" width="40px">',
                $details->phone_number,
                $details->address,
                $details->category_name,
                $details->sub_category_name,
                
                $status,
                '<a href="' . route('admin.editdetails', $details->id) . '" class="h5 p-0 pl-2  edit_details"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_details" data-id = "' . $details->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] = $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function details_changestatus(Request $request)
    {
        $updatestatus = Details::find($request->details_id);
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
        $updatestatus = Details::find($request->catory_id);
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
            // dd($subs);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'data' => $ex->getMessage()]);
        }
    }

    public function getCity(Request $request)
    {
        try {
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
