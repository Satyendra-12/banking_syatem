<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PurposeController extends Controller
{
    public function purposePage()
    {
        $get = Purpose::get();
        return view('admin.purpose.purpose', compact('get'));
    }

    public function addpurpose()
    {
        // $brands = Brand::all();
       
        return view('admin.purpose.add_purpose');
    }

    public function savepurpose(Request $request)
    {    
        // echo"<pre>",print_r($request->all());   
        // exit;
        
        $rules = [         
            'name' => 'required',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        
        $Purpose = new Purpose();      
        $Purpose->name = $request->name;
       
        $saved = $Purpose->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.purposepage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editpurpose($id)
    {
       
        $edit = Purpose::where('id', $id)->first();

        return view('admin.purpose.purpose_edit', compact('edit'));
    }

    public function updatepurpose(Request $request)
    {
        $rules = [
            'name' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Purpose::find($request->id);

       
        $update->name = $request->name;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.purposepage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletepurpose(Request $request)
    {
        $delete = Purpose::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.purposepage')));
        }
    }

    public function purposeAjaxList(Request $request)
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

        $Purpose = Purpose::select('purposes.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });


        $total = $Purpose->count();

        $purposes = $Purpose->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($purposes as $purpose) {         

            $data[] = array(
                $i++,
                $purpose->name,
              
                '<a href="' . route('admin.editpurpose', $purpose->id) . '" class="h5 p-0 pl-2  edit_purpose"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_purpose" data-id = "' . $purpose->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function purpose_changestatus(Request $request)
    {
        $updatestatus = Purpose::find($request->purpose_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subpurpose_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

    


}
