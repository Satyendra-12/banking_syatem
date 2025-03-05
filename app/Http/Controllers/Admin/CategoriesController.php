<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use PhpParser\NodeVisitor\FirstFindingVisitor;


class CategoriesController extends Controller
{
    public function categoriesPage()
    {
        $get = Category::get();
        return view('admin.categories.categories', compact('get'));
    }

    public function addCategories()
    {
        // $brands = Brand::all();
       
        return view('admin.categories.add_categories');
    }

    public function saveCategory(Request $request)
    {    
        // echo"<pre>",print_r($request->all());   
        // exit;
        
        $rules = [         
            'category_name' => 'required',
            'category_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            // 'category_icon' => 'nullable|image|mimes:svg|max:4096'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        $profile = null;
        // $iconprofile = null;
        $convert = strtolower(str_replace(' ', '_', $request->category_name));
        
        $category = new Category();      
        $category->category_name = $request->category_name;
        $category->position = $request->position;
        $category->slug = $convert;
        $category->status = $request->status;
        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/category/image/' . $name;
            $request->file('category_cover')->move(public_path() . '/assets/img/category/image/', $name);
            $category->category_cover = $profile;
            
        }
        
        
        $saved = $category->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.categoriesPage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editCategory($id)
    {
       
        $edit = Category::where('id', $id)->first();
        // $brands = Brand::all();

        return view('admin.categories.category_edit', compact('edit'));
    }

    public function updateCategory(Request $request)
    {
        $rules = [
            'category_name' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }
        $profile = null;

        $update = Category::find($request->id);

        
        $update->category_name = $request->category_name;
        $update->position = $request->position;
        $update->status = 1;
        if ($request->hasfile('category_cover'))
        {
            $ext = $request->file('category_cover')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/category/image/' . $name;
            $request->file('category_cover')->move(public_path() . '/assets/img/category/image/', $name);
            $update->category_cover = $profile;
            
        }
        // $update->brand_id = $request->brand_id;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.categoriesPage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deleteCategroy(Request $request)
    {
        $delete = Category::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.categoriesPage')));
        }
        else {
            return response()->json(array('status' => false, 'msg' => 'your id not find' ));
        }
    }

    public function categoryAjaxList(Request $request)
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

        $category = Category::select('categories.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('category_name', 'like', '%' . $search . '%');
            });


        $total = $category->count();

        $categories = $category->offset($ofset)->limit($limit)->orderBy('position', 'asc')->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($categories as $category) {    
            $color = $category->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changesatus_c" data-id="' . $category->id . '">' . ($category->status == 1 ? "Active" : "Inactive") . ' </button>';        

            // $color_m = $category->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $category->id . '">' . ($category->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $category->category_name,
                isset($category->category_cover) ? '<img src="' . asset($category->category_cover) . '" height="40px" width="40px">':' ',
                $category->position,
                $status,
                // $status_m,
                '<a href="' . route('admin.editCategory', $category->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_category" data-id = "' . $category->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function category_changestatus(Request $request)
    {
        $updatestatus = Category::find($request->catory_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subcatory_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

    


}
