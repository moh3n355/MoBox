<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Melipayamak\MelipayamakApi;
use Throwable;
use Hash;
class SendVerifyCode extends Controller
{
    public function CreateAndSendVerifyCode(Request $request){
        $targetNumber = $request->input("phone");
        $randomNumber = mt_rand(10000, 99999);

        //برای بررسی در ادامه
        session([
            'VerifyCode' => Hash::make($randomNumber),
            'TimeCreditCode' => now(),
            'phone' => $targetNumber
        ]);

        try {
            //شروع ارسال پیامک
            $data = array('username' => "09944327803", 'password' => "27ed78fa-c421-4077-b155-84a076141067",
            'text' => "$randomNumber",'to' =>"$targetNumber" ,"bodyId"=>"364662");
            $post_data = http_build_query($data);
            $handle = curl_init('https://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber');
            curl_setopt($handle, CURLOPT_HTTPHEADER, array(
                'content-type' => 'application/x-www-form-urlencoded'
            ));
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
            $response = curl_exec($handle);
            //var_dump($response);
            //پایان ارسال پیامک

            return redirect()->route('auth.dynamic', ['type' => "verify"]);
            } catch (Throwable $error) {
            // متن خطا (اگه JSON باشه)
            $message = $error->getMessage();
    
            // تلاش برای تبدیل به آرایه
            $data = json_decode($message, true);

            if (json_last_error() === JSON_ERROR_NONE && isset($data['Value']) && $data['Value'] == 11) {
                return back()->withErrors([
                    'phone' => 'شماره یافت نشد'
                ]);
            } else {
                return back()->withErrors([
                    'phone' => 'در حال حاضر این امکان وجود ندارد'
             ]);
            }
        }
    }

    public function VerifyCode(Request $request){
        $VerifyCodeHashed = session()->get('VerifyCode');
        $VerifyCodeInputed = $request->input('verify-code');
        $TimeCreditCode = session()->get('TimeCreditCode');

        if(!Hash::check($VerifyCodeInputed, $VerifyCodeHashed) || now()->diffInSeconds()){
            echo 3;
        }
        else{
            return back()->withErrors(['VerifyCode' => 'کد تایید صحیح نمیباشد']);
        };
    }
}