<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function apiResponse($status, $message, $data = [],$type = null)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'type' => $type
        ]);
    }

    public function sendMail($toEmail, $msg, $subject)
    {
        // ********** API EMAIL START **************

        $data = array(
            "sender" => array(
                "email" =>  getenv('MAIL_FROM_ADDRESS'),
                "name" => getenv('MAIL_FROM_NAME')
            ),
            "to" => array(
                array(
                    "email" => $toEmail,
                    // "name" => "ranjan"
                )
            ),

            "name" => "up_hello", // Add the campaign name here
            "subject" => $subject,
            "htmlContent" => '<html><head></head><body' . $msg . '</body></html>'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $headers = array(
            'Accept: application/json',
            'api-key: ' . getenv('MAIL_PASSWORD'), // Replace YOUR_API_KEY with your actual API key from Sendinblue
            'Content-Type: application/json'
        );

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);
        // dd($result);




    }

    public function sendNotification($userId, $title, $message, $type, $data = [], $chatType = null)
    {


        $token = User::where('id', $userId)->first(['f_token']);
        // $token = User::where('id', $userId)->first();

        if (empty($token)) {
            return true;
        }

        try {
            $post = array(
                "registration_ids" => [$token->f_token],
                "notification" => array(
                    "title" => $title,
                    "body" => $message,
                    "chatType" => $chatType, 
                ),
                "data" => array(
                    "title" => $title,
                    "body" => $message,
                    "chatType" => $chatType, 
                    'extra' => json_encode($data)
                )
            );

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($post),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: KEY=AAAA7qYGEvc:APA91bEGh_vqZGVedzfI2F2oin0GvAqe7CR7hCoZ8tYWcLQdRVE2I41P0-XFdeS37aOiKuoL3SOGnVhbbXEuGx-yNU77htKtkpqCEJg2_YEyszuRXDKkip5VFD-xzl7BExwVexCkzWWG',
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            // dd($response);
            curl_close($curl);
        } catch (Exception $e) {
            return true;
        }
    }
}
