<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class AuthController extends Controller
{
    public function userLoginPage()
    {


        return view('user.auth.user_login');
    }

    public function userSubmit(Request $request)
    {
        // echo "hell";
        // exit;
        try {
            $rules = [

                'email' => 'required',
                'password' => 'required'
            ];

            $validater = Validator::make($request->all(), $rules);

            if ($validater->fails()) {
                return response()->json(array('status' => false, 'msg' => $validater->errors()->first()));
            }

            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(array('status' => true, 'msg' => "Success,Welcome back", 'location' => route('user.profile')));
            } else {
                return response()->json(array('status' => false, 'msg' => "Credentials not matched !"));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function userid(Request $request, $id)
    {
        
        $user = User::where('id', $id)->first();

        if ($user) {
            // Log the user in (you can customize this part based on your needs)
            auth()->login($user);

            return redirect()->intended('user/profile');
        } else {
            return back()->withErrors(['id' => 'Invalid ID']);
        }
    }
   

    public function logOut()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.userloginpage');
    }

    public function registerPage()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        try {
            $rules = [

                'user_name' => 'required',
                // 'email' => 'required|email|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
        


            ];



            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {

                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }

            $register = new User();

            $register->username = $request->user_name;
            $register->email = $request->email;
            $register->password = Hash::make($request->password);
            $register->save();
            if ($register) {
                return response()->json(array('status' => true, 'msg' => 'Successfully Registered', 'location' => route('user.userloginpage')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went wrong ,please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function forgetPassword()
    {
        return view('user.auth.forget_password');
    }

   
    public function otp($id)
    {
        // echo $request->id;
        // exit;
        return view('user.auth.otp', compact('id'));
    }

   

    public function newPassword()
    {
        return view('user.auth.new_password');
    }


    public function storeNewPassword(Request $request)
    {

        try {

            $rules = [

                'password' => 'required|confirmed|min:8',
                // 'c_password' => 'required|same:c_password'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }

            $user = User::where('id', $request->userIdInput)->first();
            if (!empty($user)) {
                // if ($request->password  === $request->c_password) {

                    $user->password =  Hash::make($request->input('password'));
                    $user->update();
                    
                    // if (Auth::guard('web')->attempt(['email' => $user->email, 'password' => $user->password])) {
                        return response()->json(array('status' => true, 'msg' => "Password changed successfully", 'location'=>route('user.userloginpage')));
                    // } else {
                    //     return response()->json(array('status' => false, 'msg' => "Credentials not matched !"));
                    // }
                // } else {
                //     return response()->json(array('status' => false, 'msg' => 'Password Not Matched'));
                // }
            } else {
                return response()->json(array('status' => false, 'msg' => 'User Not Found'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }
}
