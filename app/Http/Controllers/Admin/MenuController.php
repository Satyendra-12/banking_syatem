<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MenuController extends Controller
{
    public function menuPage()
    {
        $get = Menu::get();
        return view('admin.menu.menu', compact('get'));
    }

    public function addmenu()
    {
        // $brands = Brand::all();
       
        return view('admin.menu.add_menu');
    }

    public function savemenu(Request $request)
    {    
        // echo"<pre>",print_r($request->all());   
        // exit;
        
        $rules = [         
            'menu_name' => 'required',
            // 'Menu_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            // 'Menu_icon' => 'nullable|image|mimes:svg|max:4096'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        
        $Menu = new Menu();      
        $Menu->menu_name = $request->menu_name;
        $Menu->status = $request->status;
        // $Menu->manu_status = $request->manu_status;
        // $Menu->brand_id = $request->brand_id;

        // if ($request->hasfile('Menu_cover'))
        // {
        //     $ext = $request->file('Menu_cover')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $profile = 'storage/app/public/Menu/image/' . $name;
        //     $request->file('Menu_cover')->move(storage_path() . '/app/public/Menu/image/', $name);
        //     $Menu->Menu_cover = $profile;

            // $image = $request->file('Menu_cover');
            // $ext = $image->getClientOriginalExtension();
            // $name = substr(uniqid(), 0, 9) . '.' . $ext;
            // $profile = '/storage/app/public/Menu/image' . $name;
            // $image->save(storage_path('storage/app/public/Menu/image'));

            // Move and resize the uploaded image

            // $image = Image::make($image)->fit(400, 200, function ($constraint) {
            // $constraint->upsize();

            // $image->save(storage_path('app/public/Menu/image'));
            // $request->file('Menu_cover')->move(storage_path() . '/app/public/Menu/icon', $name);
        // }

        // if ($request->hasfile('Menu_icon'))
        // {
        //     $ext = $request->file('Menu_icon')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $iconprofile = 'storage/app/public/Menu/icon/' . $name;
        //     $request->file('Menu_icon')->move(storage_path() . '/app/public/Menu/icon/', $name);
        //     $Menu->Menu_icon = $iconprofile;
        // }
        
        $saved = $Menu->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.menupage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editmenu($id)
    {
       
        $edit = Menu::where('id', $id)->first();

        return view('admin.menu.menu_edit', compact('edit'));
    }

    public function updatemenu(Request $request)
    {
        $rules = [
            'menu_name' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Menu::find($request->id);

        // if ($request->hasfile('Menu_cover')) {

        //     $ext = $request->file('Menu_cover')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $profile = 'storage/app/public/Menu/image/' . $name;
        //     $request->file('Menu_cover')->move(storage_path() . '/app/public/Menu/image/', $name);
        // } else {
        //     $profile = $update->Menu_cover;
        // }

        // if ($request->hasfile('Menu_icon')) {

            // $Menu_icon = $request->file('Menu_icon')->store('Menu/icon');

        //     $ext = $request->file('Menu_icon')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $Menu_icon = 'storage/app/public/Menu/icon/' . $name;
        //     $request->file('Menu_icon')->move(storage_path() . '/app/public/Menu/icon/', $name);
        // } else {
        //     $Menu_icon = $update->Menu_icon;
        // }
        $update->menu_name = $request->menu_name;
        $update->status = $request->status;
        // $update->brand_id = $request->brand_id;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.menupage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletemenu(Request $request)
    {
        $delete = Menu::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.menupage')));
        }
    }

    public function menuAjaxList(Request $request)
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

        $Menu = Menu::select('menus.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('menu_name', 'like', '%' . $search . '%');
            });


        $total = $Menu->count();

        // $menus = $Menu->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $menus = $Menu->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($menus as $menu) {    
            $color = $menu->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changesatus_c" data-id="' . $menu->id . '">' . ($menu->status == 1 ? "Active" : "Inactive") . ' </button>';        

            // $color_m = $Menu->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $Menu->id . '">' . ($Menu->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $menu->menu_name,
                // isset($Menu->Menu_cover) ? '<img src="' . url($Menu->Menu_cover) . '" height="40px" width="40px">':' ',
                $status,
                // $status_m,
                '<a href="' . route('admin.editmenu', $menu->id) . '" class="h5 p-0 pl-2  edit_menu"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_menu" data-id = "' . $menu->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function menu_changestatus(Request $request)
    {
        $updatestatus = Menu::find($request->menu_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $submenu_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

    


}
