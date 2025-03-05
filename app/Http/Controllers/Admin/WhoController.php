<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WhoController extends Controller
{
    public function whoPage()
    {
        $get = WProfile::get();
        return view('admin.who.who', compact('get'));
    }

    public function addwho()
    {
        // $brands = Brand::all();
       
        return view('admin.who.add_who');
    }

    public function savewho(Request $request)
    {    
        // echo"<pre>",print_r($request->all());   
        // exit;
        
        $rules = [         
            'name' => 'required',
            // 'category_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            // 'category_icon' => 'nullable|image|mimes:svg|max:4096'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        $profile = null;
        // $iconprofile = null;
        $convert = strtolower(str_replace(' ', '_', $request->category_name));
        
        $who = new WProfile();      
        $who->name = $request->name;
        $who->roll = $request->roll;
        $who->position = $request->position;
        $who->pos = $request->pos;
        $who->address = $request->address;
        $who->description = $request->description;
        $who->full_description = $request->full_description;
        $who->status = $request->status;
        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/who/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/who/image/', $name);
            $who->image = $profile;
            
        }
        
        // dd($who);
        $saved = $who->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.whoPage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editwho($id)
    {
       
        $edit = WProfile::where('id', $id)->first();
        // $brands = Brand::all();

        return view('admin.who.who_edit', compact('edit'));
    }

    public function updatewho(Request $request)
    {
        $rules = [
            'name' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }
        $profile = null;

        $update = WProfile::find($request->id);

        
        $update->name = $request->name;
        $update->position = $request->position;
        $update->pos = $request->pos;
        $update->roll = $request->roll;
        $update->address = $request->address;
        $update->description = $request->description;
        $update->full_description = $request->full_description;
        $update->status = 1;
        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/who/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/who/image/', $name);
            $update->image = $profile;
            
        }
        // $update->brand_id = $request->brand_id;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.whoPage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletewho(Request $request)
    {
        $delete = WProfile::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.whoPage')));
        }
        else {
            return response()->json(array('status' => false, 'msg' => 'your id not find' ));
        }
    }

    public function whoAjaxList(Request $request)
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

        $who = WProfile::select('w_profiles.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });

        $total = $who->count();

        $whos = $who->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($whos as $who) {   
 
            $color = $who->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changesatus_c" data-id="' . $who->id . '">' . ($who->status == 1 ? "Active" : "Inactive") . ' </button>';        

            // $color_m = $category->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $category->id . '">' . ($category->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $who->name,
                '<img src="' . asset($who->image) . '" height="40px" width="40px">',
                $who->position,
                $who->roll,
                $who->address,
                $who->pos,
                $status,
                // $status_m,
                '<a href="' . route('admin.editwho', $who->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_who" data-id = "' . $who->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function who_changestatus(Request $request)
    {
        $updatestatus = WProfile::find($request->who_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subcatory_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

    


}
