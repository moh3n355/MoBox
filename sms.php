<?php
require __DIR__ . '/vendor/autoload.php';

use Melipayamak\MelipayamakApi;

$VereifyCode;
$TargetNumber;
try {
    $data = array('username' => "09944327803", 'password' => "27ed78fa-c421-4077-b155-84a076141067",
    'text' => "$VerifyCode",'to' =>"$TargetNumber" ,"bodyId"=>"364662");
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
    var_dump($response);
    
    } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>