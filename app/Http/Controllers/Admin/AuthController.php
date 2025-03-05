<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
 
    //
    public function loginPage(){
      
        return view('admin.auth.login');
    }

    public function loginSubmit(Request $request)
    {
          $rules = [
            
            'email' => 'required',
            'password' => 'required|min:6|max:12'


          ];

          $validator = Validator::make($request->all(),$rules);

          if ($validator->fails()) {
           return response()->json(array('status'=>false , 'msg' => $validator->errors()->first()));
          }

          if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return response()->json(array('status'=>true , 'msg'=>"Success,Welcome back", 'location'=>route('admin.dashboard')));

          }else{
               return response()->json(array('status'=>false, 'msg' => "Credentials not matched !"));
               exit;
          }
    }

    public function logout()
    {
      
       Auth::guard('admin')->logout();
       return redirect()->route('admin.loginpage');
    }
}
 