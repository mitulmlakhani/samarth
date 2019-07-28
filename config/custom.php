<?php
    return [
        'sms' => [
            'mobile' => env('SMS_MOBILE'),
            'pass' => env('SMS_PASSWORD'),
            'senderid' => env('SMS_SENDERID'),
            'albumtpl' => env('SMS_ALBUMTPL')
        ]
    ];
?>