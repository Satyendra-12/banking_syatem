<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
// use Dotenv\Validator;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function subCategory()
    {
        return view('admin.subcategory.bsubcategory');
    }
    public function subCategory1()
    {
        return view('admin.subcategory.asubcategory');
    }
    public function subCategory2()
    {
        return view('admin.subcategory.ssubcategory');
    }

    public function addSubcategory()
    {

        $categories = Category::get();

        return view('admin.subcategory.add_subcategory', compact('categories'));
    }

    public function saveSubcategory(Request $request)
    {
        $rules = [

            'category_id' => 'required',
            'name' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'icon' => 'nullable|image|mimes:svg|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            exit;
        }


        $convert = strtolower(str_replace(' ', '_', $request->name));


        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->service_id = $request->service_id;
        $subcategory->sub_category_name = $request->name;
        $subcategory->slug = $convert;
        // $subcategory->sub_category_photo = $profile;
        // $subcategory->sub_category_icon = $iconprofile;
        $subcategory->save();

        if ($subcategory) {

            return response()->json(array('status' => true, 'msg' => 'successfullly Added', 'location' => route('admin.subCategory')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
        }
    }

    public function subCategoryAjax(Request $request)
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

        $getSubcategory = Subcategory::select('subcategories.*')
        ->orWhere(function ($query) use ($search) {
            $query->orWhere('sub_category_name', 'like', '%' . $search . '%');
        })->where('service_id', 1);

        $total = $getSubcategory->count();
        $getSubcategory = $getSubcategory->offset($ofset)->limit($limit)->get();
        // dd($getSubcategory);

        $i = 1 + $ofset;
        $data = [];

        foreach ($getSubcategory as $subcategory) {
            $color = $subcategory->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesubcategory" data-id="' . $subcategory->id . '">' . ($subcategory->status == 1 ? "Active" : "Inactive") . ' </button>';


            $data[] = array(
                $i++,
                $subcategory->sub_category_name,
                $status,

                '<a href="' . route('admin.editsubcategroy', $subcategory->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2   delete_subcategory" data-id = "' . $subcategory->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }
    public function subCategoryAjax1(Request $request)
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

        $getSubcategory = Subcategory::select('subcategories.*')
        ->orWhere(function ($query) use ($search) {
            $query->orWhere('sub_category_name', 'like', '%' . $search . '%');
        })->where('service_id', 2);


        $total = $getSubcategory->count();
        $getSubcategory = $getSubcategory->offset($ofset)->limit($limit)->get();

        $i = 1 + $ofset;
        $data = [];

        foreach ($getSubcategory as $subcategory) {
            $color = $subcategory->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesubcategory" data-id="' . $subcategory->id . '">' . ($subcategory->status == 1 ? "Active" : "Inactive") . ' </button>';


            $data[] = array(
                $i++,
                $subcategory->sub_category_name,
                $status,
                '<a href="' . route('admin.editsubcategroy', $subcategory->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2   delete_subcategory" data-id = "' . $subcategory->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }


    public function subCategoryAjax2(Request $request)
    {

        if (isset($request->search['value'])) {
            $search = $request->search['value'];
        } else {
            $search = '';
        }

        if (isset($request->length)) {
            $limit = $request->length;
        } else {
            $limit = 20;
        }

        if (isset($request->start)) {
            $ofset = $request->start;
        } else {
            $ofset = 0;
        }


        $getSubcategory = Subcategory::select('subcategories.*')
        ->orWhere(function ($query) use ($search) {
            $query->orWhere('sub_category_name', 'like', '%' . $search . '%');
        })->where('category_id', 3);


        $total = $getSubcategory->count();
        $getSubcategory = $getSubcategory->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];
        foreach ($getSubcategory as $subcategory) {
            $color = $subcategory->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesubcategory" data-id="' . $subcategory->id . '">' . ($subcategory->status == 1 ? "Active" : "Inactive") . ' </button>';


            $data[] = array(
                $i++,
                $subcategory->sub_category_name,
                $status,
                '<a href="' . route('admin.editsubcategroy', $subcategory->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2   delete_subcategory" data-id = "' . $subcategory->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }


    public function editSubcategroy($id)
    {
     
        $subcategories = Subcategory::find($id);

        return view('admin.subcategory.edit_subcategory', compact('subcategories'));
    }

    public function  subCategoryUpdate(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            'name' => 'required'

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $subcategory = Subcategory::find($request->id);

        $subcategory->category_id = $request->category_id;
        $subcategory->service_id = $request->service_id;
        $subcategory->sub_category_name = $request->name;

        $subcategory->update();

        if ($subcategory) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.subCategory')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something went wrong,Please Try Again'));
        }
    }
    public function subcategoryDelete(Request $request)
    {

        $delete = Subcategory::find($request->id);
        $delete->delete();
        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'successfully Deleted'));
        }
    }


    public function subcategoryActiveInactive(Request $request)
    {
        $updatestatus = Subcategory::find($request->subcatory_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subcatory_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }
}
