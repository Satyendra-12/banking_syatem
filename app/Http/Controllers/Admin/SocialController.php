<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SocialController extends Controller
{
    public function socialPage()
    {
        $get = Social::get();
        return view('admin.social.social', compact('get'));
    }

    public function addsocial()
    {
        // $brands = Brand::all();
       
        return view('admin.social.add_social');
    }

    public function savesocial(Request $request)
    {    
        // echo"<pre>",print_r($request->all());   
        // exit;
        
        $rules = [         
            // 'social_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            // 'social_icon' => 'nullable|image|mimes:svg|max:4096'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        
        $social = new Social();      
        $social->flink = $request->flink;
        $social->tlink = $request->tlink;
        $social->ilink = $request->ilink;
        $social->ylink = $request->ylink;
        $social->llink = $request->llink;
        $social->wlink = $request->wlink;
        $social->status = $request->status;

        $saved = $social->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.socialpage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editsocial($id)
    {
       
        $edit = Social::where('id', $id)->first();

        return view('admin.social.social_edit', compact('edit'));
    }

    public function updatesocial(Request $request)
    {
        $rules = [


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Social::find($request->id);

        // if ($request->hasfile('social_cover')) {

        //     $ext = $request->file('social_cover')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $profile = 'storage/app/public/social/image/' . $name;
        //     $request->file('social_cover')->move(storage_path() . '/app/public/social/image/', $name);
        // } else {
        //     $profile = $update->social_cover;
        // }

        // if ($request->hasfile('social_icon')) {

            // $social_icon = $request->file('social_icon')->store('social/icon');

        //     $ext = $request->file('social_icon')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $social_icon = 'storage/app/public/social/icon/' . $name;
        //     $request->file('social_icon')->move(storage_path() . '/app/public/social/icon/', $name);
        // } else {
        //     $social_icon = $update->social_icon;
        // }
        $update->flink = $request->flink;
        $update->tlink = $request->tlink;
        $update->ylink = $request->ylink;
        $update->ilink = $request->ilink;
        $update->llink = $request->llink;
        $update->wlink = $request->wlink;
        $update->status = $request->status;
        // $update->brand_id = $request->brand_id;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.socialpage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletesocial(Request $request)
    {
        $delete = Social::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.socialpage')));
        }
    }

    public function socialAjaxList(Request $request)
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

        $social = Social::select('socials.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('flink', 'like', '%' . $search . '%');
            });


        $total = $social->count();

        $socials = $social->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($socials as $social) {    
            $color = $social->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changesatus_c" data-id="' . $social->id . '">' . ($social->status == 1 ? "Active" : "Inactive") . ' </button>';        

            // $color_m = $social->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $social->id . '">' . ($social->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $social->flink,
                $social->tlink,
                $social->ylink,
                $social->ilink,
                $social->llink,
                $social->wlink,
                // isset($social->social_cover) ? '<img src="' . url($social->social_cover) . '" height="40px" width="40px">':' ',
                $status,
                // $status_m,
                '<a href="' . route('admin.editsocial', $social->id) . '" class="h5 p-0 edit_social"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 delete_social" data-id = "' . $social->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function social_changestatus(Request $request)
    {
        $updatestatus = Social::find($request->social_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subsocial_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

    


}
