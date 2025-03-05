<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\NotificationModel;
use App\Models\User;
use App\Models\UserOtp;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserAuthController extends Controller
{
    public function signup(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'username' => 'required|min:3|unique:users',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->first();
                return $this->apiResponse(false, $errors);
            }

            $user = new User();
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->username = $request->input('username');
            $user->f_token = $request->input('token');
            $user->type = '0';
            $user->status = '1';
            $user->save();

            $datam = [
                'screen' => "newlead",
                'params' => [
                    'refresh' => true
                ]
            ];

            $this->sendNotification($user->id, 'Register', 'Congratulations,Your Account Has Been Successfully Created', 'user', $datam);

            $notify = new NotificationModel();
            $notify->notification_type = 'alert';
            $notify->user_id = $user->id;
            $notify->notification_title = 'Register';
            $notify->notification_body = 'Congratulations,Your Account Has Been Successfully Created';
            $notify->save();
            $token = $user->createToken('api-token')->plainTextToken;

            return $this->apiResponse(true, 'success', ['token' => $token, 'user' => $user]);
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->apiResponse(false, 'Api is down');
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'  => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => 'Please Enter Password.',
                'email.email' => 'Invalid Email Format.',
                'password.required' => 'Please Enter Password.',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->first();
                return $this->apiResponse(false, $errors);
            }

            // Login Attempt
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $request->user()->createToken('api-token')->plainTextToken;

                if ($request->token) {
                    $user_update = User::find($user->id);
                    $user_update->f_token = $request->token;
                    $user_update->save();
                }

                return $this->apiResponse(true, 'success', ['token' => $token, 'user' => $user]);
            } else {
                return $this->apiResponse(false, 'Invalid Password. Please try again!!');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->apiResponse(false, 'Api is down');
        }
    }

    public function logout(Request $request)
    {
        try {
            $user_id = null;
            $token = $request->header('Authorization');
            if ($token) {
                $token = str_replace('Bearer ', '', $token);

                $token = explode('|', $token);
                if (count($token) === 2) {
                    $token_id = $token[0];
                    $token = $token[1];
                    $token = hash('sha256', $token);

                    $check = PersonalAccessToken::where(['id' => $token_id, 'token' => $token])->first();
                    $user_id = $check->tokenable_id;
                }
            }
            $getuser = User::find($user_id);
            $getuser->f_token = null;
            $getuser->update();
            $request->user()->currentAccessToken()->delete();
            return $this->apiResponse(true, 'success');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->apiResponse(false, 'Api is down');
        }
    }

    public function sendOTP(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email'  => 'required|exists:users,email',
            ], [
                'email.required' => 'Please Enter Password.',
                'email.exists' => 'Email = ' . $request->email . ' is Not Found',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->first();
                return $this->apiResponse(false, $errors);
            }

            $otp = random_int(100000, 999999);


            $currentTime  = Carbon::now();
            $newTime = $currentTime->addMinutes(10);
            $otpSaved = User::where('email', $request->email)->first();

            $optData = UserOtp::where('user_id', $otpSaved->id)->first();

            $msg = "<p>If you requested a password reset for email : <b>$request->email</b>. please copy the below code and paste the code</p><h4>Your OTP is : $otp</h4><p>If you didn't make this request, Ignore this email.</p>";
            $subject = "Password Reset Request";

            if (!empty($optData)) {
                $optData->otp = $otp;
                $optData->expire_at   = $newTime;
                $optData->status = '0'; // 0 for not expired the otp
                $optData->save();

                $this->sendMail($request->email, $msg, $subject);
                return $this->apiResponse(true, 'success', ['OTP' => $otp]);
            } else {
                $otpRecord = new UserOtp();
                $otpRecord->user_id = $otpSaved->id;
                $otpRecord->otp = $otp;
                $otpRecord->expire_at   = $newTime;
                $otpRecord->status = '0';  // 0 for not expired the otp
                $otpRecord->save();

                $this->sendMail($request->email, $msg, $subject);
                return $this->apiResponse(true, 'success', ['OTP' => $otp]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->apiResponse(false, 'Api is down');
        }
    }


    /**
     * @method use for forget update password by email created by ranjan
     */

    public function submitOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password',
                'email' => 'required|exists:users,email',
                'otp' => 'required|numeric',
            ], [
                'email.required' => 'Please Enter Password.',
                'email.exists' => 'Email = ' . $request->email . ' is Not Found',
                'otp.numeric' => 'OTP should be Numeric',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->first();
                return $this->apiResponse(false, $errors);
            }

            $user = User::where('email', $request->email)->first();

            if (!empty($user)) {
                $oldotp = UserOtp::where('user_id', $user->id)
                    ->where('otp', $request->otp)
                    ->where('status', 0)
                    ->where('expire_at', '>', now()) // Check if the OTP has not expired
                    ->first();

                if (!empty($oldotp)) {
                    $user->password = bcrypt($request->input('new_password'));
                    $user->save();

                    // 
                    $oldotp->status = '1';
                    $oldotp->save();
                    // OTP is valid and has not expired
                    return $this->apiResponse(true, 'success', $user);
                } else {
                    return $this->apiResponse(false, 'OTP is either invalid or has expired');
                }
            } else {
                // User not found
                return $this->apiResponse(false, 'Email = ' . $request->email . ' is Not Found');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->apiResponse(false, 'Api is down');
        }
    }

    // method use for changes password
    public function changePassword(Request $request)
    {
        $validate  = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validate->fails()) {
            $errors = $validate->errors()->first();
            return $this->apiResponse(false, $errors);
        } else {

            $id =  Auth::user()->id;
            $data = User::find($id);
            if ((!Hash::check($request->old_password, $data->password))) {
                return $this->apiResponse(false, 'Old  Password is Incorrect !',);
            } else {
                $data->password = Hash::make($request->password);
                $data->update();
                return $this->apiResponse(true, 'password changed successfully !!',);
                return response()->json(['status' => true, 'message' => '']);
                exit;
            }
        }
    }


    // method use for email verification 
    public function emailVarification(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ], [
            'email.required' => "Email is required",
            'email.email' => "The Email must be a valid email address."
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return $this->apiResponse(false, $errors);
        }

        $userLogin = Auth::user();
        if (!empty($userLogin->email)) {
            if ($userLogin->email == $request->email) {
                $existingUser = User::where('email', $request->email)->first();

                if ($existingUser) {
                    // User found
                    $updateUser = $existingUser;

                    if ($updateUser->verify_email == 'yes') {
                        return response()->json(array(
                            'status' => false,
                            'message' => 'Email is already verified.'
                        ));
                    }

                    $otp = rand(111111, 999999);
                    // $otp = 123456;
                    $updateUser->email_otp = $otp;
                    $updateUser->update();

                    $msg = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                    <div style="margin:50px auto;width:70%;padding:20px 0">
                      
                      <p style="font-size:1.1em">Hello ' . $updateUser->first_name . ',</p>
                      <p>Thank you for choosing Up Hello. Please use this verification code within 10 minutes . if you did not request this code, please ignore this message.  </p>
                      <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">' . $otp . '</h2>
                      <p style="font-size:0.9em;">Regards,<br />Up Hello</p>
                     
                    </div>
                  </div>';

                    $subject = "Email Verification Code";

                    $this->sendMail('sharmaranjan7079@gmail.com', $msg, $subject);

                    return response()->json(array(
                        'status' => true,
                        'message' => 'OTP has been sent to your email. Please check your email.',
                        'data' => [
                            'otp' => $otp,
                            'email' => $updateUser->email,
                            'email_verified' => $updateUser->verify_email,
                        ],
                    ));
                } else {
                }
            } else {
                return response()->json(array(
                    'status' => false,
                    'message' => 'This email is already taken by another user.'
                ));
            }
        } else {
            $existingUser = User::where('id', $userLogin->id)->first();
            $otp = rand(111111, 999999);
            // $otp = 123456;
            $existingUser->email_otp = $otp;
            $existingUser->email = $request->email;
            // $existingUser->email_verified = ;
            $existingUser->save();

            // Generate and send OTP to the emaiL
            $msg = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                    <div style="margin:50px auto;width:70%;padding:20px 0">
                      
                      <p style="font-size:1.1em">Hello ' . $existingUser->first_name . ',</p>
                      <p>Thank you for choosing Hunttr. Please use this verification code within 10 minutes . if you did not request this code, please ignore this message.  </p>
                      <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">' . $otp . '</h2>
                      <p style="font-size:0.9em;">Regards,<br />JMD Marrage Bureau(hunttr)</p>
                     
                    </div>
                </div>';

            $subject = "Email Verification Code";

            $this->sendMail('sharmaranjan7079@gmail.com', $msg, $subject);

            return response()->json(array(
                'status' => true,
                'message' => 'OTP has been sent to your email. Please check your email.',
                'data' => [
                    'email' => $existingUser->email,
                    'email_otp' => $otp,
                    'mobile' => '',
                    'mobile_verified' => $existingUser->mobile_verified,
                    'email_verified' => $existingUser->email_verified,
                ],
            ));
        }
    }

    // method use for verify email otp
    public function verifyEmailOtp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => "required",
            'otp' => "required|numeric"
        ], [
            'email.required' => "Email is required",
            'otp.required' => "OTP is required",
            'otp.numeric' => "OTP has to be numeric value"
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return $this->apiResponse(false, $errors);
        } else {

            $udata = User::where(['email' => $request->email])->first();

            if ($udata) {

                if ($udata['verify_email'] === "yes") {
                    return response()->json(array('status' => false, 'message' => "Email already verified"));
                }

                if ($udata['email_otp'] == $request->otp) {
                    $udata['verify_email'] = "yes";

                    $udata->update();

                    return response()->json(array(
                        'status' => true,
                        'message' => "Success",
                        'data' => [
                            'user_id' => $udata->id,
                            'email' => $udata->email,
                            'otp' => '',
                            'verify_email' => $udata->verify_email,
                        ],
                    ));
                } else {

                    return response()->json(array('status' => false, 'message' => "OTP is incorrect"));
                }
            } else {
                return response()->json(array('status' => false, 'message' => "Email ID is incorrect"));
            }
        }
    }

    // method use for update profile
    public function updateProfile(Request $request)
    {
        try {

            $loggedInUserId = Auth::user()->id;
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                // 'last_name' => 'required',
                // 'gender' => 'required',
                // 'dob' => 'required',
                'phone_number' => 'required|integer|unique:users,phone_number,' . $loggedInUserId,
                'email' => 'required|email|unique:users,email,' . $loggedInUserId,
                // 'address' => 'required',
                // 'user_image' => 'required',

            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->first();
                return $this->apiResponse(false, $errors);
            } else {

                $user = user::find(Auth::user()->id);

                if ($request->hasFile('user_image')) {
                    $ext = $request->file('user_image')->getClientOriginalExtension();

                    $name = substr(uniqid(), 0, 9) . '.' . $ext;
                    $profile = 'storage/app/public/user_profile/' . $name;
                    $request->file('user_image')->move(storage_path() . '/app/public/user_profile/', $name);
                } else {
                    $profile = $user->profile_image;
                }

                // $user->first_name = $request->first_name;
                $user->username = $request->username;
                // $user->gender = $request->gender;
                // $user->dob = $request->dob;
                $user->phone_number = $request->phone_number;
                $user->email = $request->email;
                // $user->address = $request->address;
                $user->profile_image = $profile;

                $result = $user->update();
                if ($result) {
                    return $this->apiResponse(true, 'Update Successfully', $user);
                } else {
                    return $this->apiResponse(false, 'Something went Wrong');
                }
            }
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'Api is Down');
        }
    }

    // method use for get user profile
    public function getProfile()
    {
        try {
            $userId = Auth::user()->id;
            $data = User::where('id', $userId)->first();
            if ($data) {
                return $this->apiResponse(true, 'Success', $data);
            } else {
                return $this->apiResponse(false, 'Failed');
            }
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'Api is down');
        }
    }
}
