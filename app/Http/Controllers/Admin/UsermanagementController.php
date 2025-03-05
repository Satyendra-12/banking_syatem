<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsermanagementController extends Controller
{
    public function registerUser()
    {

        return view('admin.user_management.registeruser');
    }
    public function registerMember()
    {

        return view('admin.user_management.registermember');
    }

    public function addRegisterUser()
    {
        $subcategories = Subcategory::all();
        return view('admin.user_management.add_registeruser',compact('subcategories'));
    }

    public function storeRegisterUser(Request $request)
    {
        // dd("mmmm");
        try {
            $rules = [
                'email' => 'max:255'
                // 'password' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }

            $user = new User();
            if ($request->hasFile('contact_person')) {
                
                $ext = $request->file('contact_person')->getClientOriginalExtension();
                $name = substr(uniqid(),0,9).'.'.$ext;
                $profile = 'assets/img/bank/image/' . $name;
                $request->file('contact_person')->move(public_path() . '/assets/img/bank/image/', $name);
                
            }else{
                $profile =   $user->contact_person;
            }
            // $slug = Str::slug($request->company_name);


            $user->username = $request->company_name;
            // $user->slug = $slug; // Assign slug to the slug field
            $user->contact_person = $profile;
            $user->phone_number = $request->phone;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->category_id = $request->category_id;
            $user->service_id = $request->service_id;
            $user->subcategor_id = $request->subcategor_id;
            $user->member = $request->member ?? ''; // Check if $request->member is null
            $user->password = Hash::make($request->password);
            $user->save();

        

            if ($user) {
                return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.registeruser')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again', 'location' => route('')));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        // Get file from request
        $file = $request->file('file');

        // Read and parse the CSV file
        $csvData = array_map('str_getcsv', file($file));

        // Remove header row if exists
        $header = array_shift($csvData);

        // Insert data into database
        foreach ($csvData as $row) {
            User::create([
                'category_id' => $row[0],
                'service_id' => $row[1],  
                'username' => $row[2],
                'email' => $row[3], 
                'password' => $row[4],
                'member' => $row[5], 
                'phone_number' => $row[6], 
                'address' => $row[7], 
                'subcategor_id' => $row[8], 
                
               
            ]);
        }

        return redirect()->back()->with('success', 'CSV data imported successfully.');
        // return response()->json(array('status' => true, 'msg' => 'CSV data imported successfully.', 'location' => route('admin.registeruser')));
        
    }

    public function registerUserAjaxList(Request $request)
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

        $register = User::where('member','1')
        ->when(isset($request->search['value']), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
            $query->Where('name', 'like', '%' . $request->search['value'] . '%');
            $query->Where('email', 'like', '%' . $request->search['value'] . '%');
        });
    });
        $total = $register->count();

        $registeruser = $register->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        // echo "<pre>",print_r($registeruser);
        // exit;

        $i = 1 + $ofset;
        $data = [];
        
        foreach ($registeruser as $register) {
            $color = $register->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button type="button" class="btn '.$color.'  changeuserregisterstatus" data-id="'.$register->id.'">'.($register->status == 1 ? "Active":"Inactive").'</button>';
            $data[] = array(
                $i++,
                // $register->organization,
                $register->username,
                '<img src="' . asset($register->contact_person) . '" height="40px" width="40px">',
                $register->email,
                $register->phone_number,
                $status,

                '<a href="' . route('admin.editregisteruser', $register->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
                <a href="' . route('admin.editpasswordregisteruser', $register->id) . '" class="h5 p-0 pl-2  edit_password"><i class="mdi mdi-account-key"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2  deleteregister" data-id = "' . $register->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );

            
        }
// dd($data);
        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }


    public function registerMemberAjaxList(Request $request)
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

        $register1 = User::where('member','0')
        ->when(isset($request->search['value']), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
            $query->Where('username', 'like', '%' . $request->search['value'] . '%');
            $query->Where('email', 'like', '%' . $request->search['value'] . '%');
        });
    });
        
        // dd($register1);
        $total = $register1->count();


        $registeruser1 = $register1->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        
        // dd($registeruser1);

        $i = 1 + $ofset;
        $data = [];
        
        foreach ($registeruser1 as $register) {
            $color = $register->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button type="button" class="btn '.$color.'  changeuserregisterstatus" data-id="'.$register->id.'">'.($register->status == 1 ? "Active":"Inactive").'</button>';
            $data[] = array(
                $i++,
                // $register->organization,
                $register->username,
                '<img src="' . asset($register->contact_person) . '" height="40px" width="40px">',
                $register->email,
                $register->phone_number,
                $status,

                '<a href="' . route('admin.editregisteruser', $register->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
                <a href="' . route('admin.editpasswordregisteruser', $register->id) . '" class="h5 p-0 pl-2  edit_password"><i class="mdi mdi-account-key"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2  deleteregister" data-id = "' . $register->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );

            
        }
// dd($data);
        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editRegisterUser($id)
    {
        $registeredit = User::find($id);
        $subcategory = Subcategory::get();
        
    //    dd($registeredit);
        return view('admin.user_management.edit_register', compact('registeredit','subcategory'));
    }

    public function editpasswordregisteruser($id)
    {
        $registeredit = User::find($id);
        
    //    dd($registeredit->id);
        return view('admin.user_management.edit_registerpassword', compact('registeredit'));
    }

    public function updateRegisterUser(Request $request)
    {
        try {

            $rules = [

              
                'email' => 'required|email|max:255',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }
            $registerupdate = User::find($request->id);
            if ($request->hasFile('contact_person')) {
                
                $ext = $request->file('contact_person')->getClientOriginalExtension();
                $name = substr(uniqid(),0,9).'.'.$ext;
                $profile = 'assets/img/bank/image/' . $name;
                // $request->file('contact_person')->move(public_path() . '/assets/img/ad/image/', $name);
                $request->file('contact_person')->move(public_path() . '/assets/img/bank/image/', $name);
                
            }else{
                $profile =   $registerupdate->contact_person;
            }

            $registerupdate->username = $request->username;
            $registerupdate->contact_person = $profile;
            $registerupdate->email = $request->email;
            $registerupdate->phone_number  = $request->phone;
            $registerupdate->address  = $request->address;
            $registerupdate->category_id = $request->category_id;
            $registerupdate->service_id = $request->service_id;
            $registerupdate->subcategor_id = $request->subcategor_id;
            $registerupdate->member = $request->member;

             // Update password if provided
        if ($request->filled('password')) {
            $registerupdate->password = Hash::make($request->password);
        }
          
            $registerupdate->update();

                if ($registerupdate) {
                    return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.registeruser')));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'Something Went Wrong, Please Try Again', 'location' => route('')));
                }
            
        } catch (\Exception $ex) {

            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }
    public function updatepasswordregisteruser(Request $request)
    {
        try {

            $rules = [

              
                'password' => 'required|max:255',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }
            $registerupdate = User::find($request->id);
           
            if (!empty($request->password)) {
                $registerupdate->password = Hash::make($request->password);;
            }
            $registerupdate->update();

                if ($registerupdate) {
                    return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.registeruser')));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'Something Went Wrong, Please Try Again', 'location' => route('')));
                }
            
        } catch (\Exception $ex) {

            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }
    public function export()
    {
        $users = User::all();
        $csvFileName = 'members.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];
    
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Name', 'Email','Phone','Address']); // Add more headers as needed
    
        foreach ($users as $user) {
            fputcsv($handle, [$user->username, $user->email, $user->phone_number, $user->location]); // Add more fields as needed
        }
    
        fclose($handle);
    
        return Response::make('', 200, $headers);
    }

    public function deleteRegisterUser(Request $request)
    {
        $deleteregister = User::find($request->id);
        $deleteregister->delete();

        if($deleteregister){
            return response()->json(array('status'=>true,'msg'=>'Successfully Deleted'));
        }
    }

    public function registerUserActiveInactive(Request $request)
    {
        $registeruseractiveinactive = User::find($request->user_id) ; 
        $registeruseractiveinactive->status = $registeruseractiveinactive->status == 1 ? 0 : 1 ;
        $register = $registeruseractiveinactive->update();

        if ($registeruseractiveinactive) {
            
            return response()->json(array('status'=>true, 'msg'=>'Successfully updated'));
        }else{

            return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
        }

    }
    public function categoryOnchange(Request $request)
    {
        try {
            $get = Subcategory::where('category_id', $request->catid)->get();

            return response()->json(['status' => true, 'data' => $get]);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'data' => $ex->getMessage()]);
        }
    }
    public function serviceOnchange(Request $request)
    {
        try {
            $get = Subcategory::where('service_id', $request->serid)->get();

            return response()->json(['status' => true, 'data' => $get]);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'data' => $ex->getMessage()]);
        }
    }
    
    
}
