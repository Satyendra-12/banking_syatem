<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function profilePage()
    {   
        $id = Auth::guard('web')->user()->id;
        $user =  User::find($id);
        // $address = User::where('id', $id)->latest('id')->first();
        // $addresses = User::where('id', $id)->get();
        return view('frontend.user_profile',compact('user'));
    }
    public function address()
    {
        try {
            $id = Auth::guard('web')->user()->id;
            $users = User::find($id);


            return view('user.profile.myprofile', compact('users'));
        } catch (\Exception $ex) {
            // dd($ex->getMessage());
        }
    }

    public function profileUpdate(Request $request)
    {
        try {
       
        $rules = [

            'username' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }
        $registerupdate =  User::find(auth()->user()->id);
        if ($request->hasfile('contact_person')) {
            $ext = $request->file('contact_person')->getClientOriginalExtension();
            $name = substr(uniqid(),0,9).'.'.$ext;
            $profile = 'assets/user_profile/'.$name;
            $request->file('contact_person')->move(public_path().'/assets/user_profile/',$name);
        }else{

            $profile = $registerupdate->contact_person;
            
        }
  
        $registerupdate->username = $request->username;
        $registerupdate->email = $request->email;
        $registerupdate->phone_number  = $request->phone;
        // $registerupdate->address  = $request->address;
        $registerupdate->location  = $request->location;
        $registerupdate->maps  = $request->maps;
        $registerupdate->website  = $request->website;
        $registerupdate->short_description  = $request->short_description;
        $registerupdate->contact_person = $profile;
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
            return response()->json(['status'=>false,'msg'=>$ex->getMessage()]); 

        }
    }

    public function changePassword()
    {
      return view('user.myprofile');
    }
  
    public function resetPasword(Request $request)
    {
      try {
  
        $rules = [
          'Current_Password' => 'required',
          'n_password' => 'required',
          'c_password' => 'required'
        ];
  
        $validator = Validator::make($request->all(), $rules);
  
        if ($validator->fails()) {
          return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }
  
        $getdata = User::where('id',  Auth::guard('web')->user()->id)->first();
  
        if (!(Hash::check($request->Current_Password, $getdata->password))) {
  
          return response()->json(array('status' => false, 'msg' => 'old password is not match'));
        }
  
        $getdata->password = Hash::make($request->n_password);
        $getdata->save();
  
        if ($getdata) {
          return response()->json(array('status' => true, 'msg' => 'Password Successfully  Updated'));
        } else {
  
          return response()->json(array('status' => false, 'msg' => 'Something went wrong, please try again'));
        }
      } catch (\Exception $ex) {
        return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
      }
    }

   

    
}
