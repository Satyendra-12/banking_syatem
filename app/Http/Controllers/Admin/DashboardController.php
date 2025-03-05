<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Plans;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
  public function dashboard(Request $request)
  {
    
    try {
      $desiredDate = now()->toDateString();
      $active_user_count = User::where('status', 1)->count();
      $inactive_user_count = User::where('status', 0)->count();
      $today_user_count = User::whereDate('created_at', '=', $desiredDate)->count();
      // $recent_logged_in = User::{{Auth::guard('web')->user()->username}}->count();
      // dd($today_user_count);
      $user_count = User::count();
      // dd($plan_count);
      $category_count = Category::where('status', 1)->count();
      // $clientIpAddress = $request->getClientIp();

      


      return view('admin.index', compact('active_user_count','category_count','user_count','inactive_user_count','today_user_count'));
    } catch (\Exception $ex) {
      dd($ex->getMessage());
    }
  }

  public function changePassword()
  {
    return view('admin.auth.change_password');
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

      $getdata = Admin::where('id',  Auth::guard('admin')->user()->id)->first();

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

  public function profile()
  {
    return view('admin.auth.change_profile');
  }
  public function design()
  {
    return view('admin.auth.change_design');
  }
  public function domain()
  {
    return view('admin.auth.change_domain');
  }
  public function admin_accounts()
  {
    return view('admin.auth.admin_accounts');
  }
  public function text()
  {
    return view('admin.auth.text');
  }
  public function advance()
  {
    return view('admin.auth.advance');
  }

  public function changeProfile(Request $request)
  {
    try {
      $rules = [

        'name' => 'required',
        'email' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
      }

      $adminprofile = Admin::find($request->id);

      if ($request->hasfile('image')) {
        $ext = $request->file('image')->getClientOriginalExtension();
        $name = substr(uniqid(),0,9).'.'.$ext;
        $profile = 'assets/user_profile/'.$name;
        $request->file('image')->move(public_path().'/assets/user_profile/',$name);
    }else{

        $profile = $adminprofile->image;
        
    }

      $adminprofile->name = $request->name;
      $adminprofile->email  = $request->email;
      $adminprofile->phone  = $request->phone;
      $adminprofile->phone1  = $request->phone1;
      $adminprofile->phone2  = $request->phone2;
      $adminprofile->address  = $request->address;
      $adminprofile->image  = $profile;
      

      $adminprofile->update();

      if ($profile) {
        return response()->json(array('status' => true, 'msg' => 'Successfully Profile Updated'));
      } else {
        return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
      }
    } catch (\Exception $ex) {

      return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
    }
  }
}
