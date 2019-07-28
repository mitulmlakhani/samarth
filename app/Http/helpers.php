<?php

if(!function_exists('sendSMS')) {
    function sendSms($to, $message){
        $url = 'http://trans.suratguide.in/smsstatuswithid.aspx?mobile='.config('custom.sms.mobile').'&pass='.config('custom.sms.pass').'&senderid='.config('custom.sms.senderid').'&to='.$to.'&msg='.$message;
        
        $client = new \GuzzleHttp\Client();
        $request = $client->get($url);
        
        return true;
    }
}

?>