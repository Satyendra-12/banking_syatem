<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\management;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    public function managementPage()
    {
        return view('user.management.management');
    }

    public function addmanagement()
    {
        return view('user.management.add_management');
    }

    public function savemanagement(Request $request)
    {
        try {

            $rules = [

                'name' => 'required',
                'phone' => 'nullable', // Making phone field optional
                'email' => 'nullable|email', // Making email field optional and validating if present

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }  

            

            $management = new management();
            $management->user_id = Auth::guard('web')->user()->id;
            $management->name = $request->name;
            $management->role = $request->roll;
            $management->number = $request->phone;
            $management->email = $request->email;
            $management->status = 1;
            $management->save();

            if ($management) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.management')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function managementAjaxList(Request $request)
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

        $management = management::select('management.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $management->where('user_id',$id)->count();

        $managements = $management->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($managements as $management) { 
            $color = $management->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changemanagementstatus" data-id="' . $management->id . '">' . ($management->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                $management->name,
                $management->role,
                $management->number,
                $management->email,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editmanagement', $management->id) . '" class="h5 p-0 pl-2  edit_management"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deletemanagement" data-id = "' . $management->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editmanagement($id)
    {
        $edit = management::find($id);
        return view('user.management.edit_management',compact('edit'));
    }

    public function updatemanagement(Request $request)
{
    try {
        $rules = [
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'msg' => $validator->errors()->first()]);
        }

        // Check if the management record exists
        $updatemanagement = management::find($request->id);
        if (!$updatemanagement) {
            return response()->json(['status' => false, 'msg' => 'Management record not found.']);
        }

        // Update the attributes and save
        $updatemanagement->name = $request->input('name', $updatemanagement->name);
        $updatemanagement->role = $request->input('roll', $updatemanagement->role);
        $updatemanagement->number = $request->input('phone', $updatemanagement->number);
        $updatemanagement->email = $request->input('email', $updatemanagement->email);
        $updatemanagement->save();

        return response()->json(['status' => true, 'msg' => 'Successfully Updated', 'location' => route('user.management')]);
    } catch (\Exception $ex) {
        return response()->json(['status' => false, 'msg' => $ex->getMessage()]);
    }
}

    public function deletemanagement(Request $request)
    {
        $deletemanagement = management::find($request->id);

        $deletemanagement->delete();

        if ($deletemanagement) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusmanagement(Request $request)
    {
        
        $updatemanagement = management::find($request->management_id);

        $updatemanagement->status = $updatemanagement->status == 1 ? 0 : 1;
        $management = $updatemanagement->update();

        if ($updatemanagement) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
