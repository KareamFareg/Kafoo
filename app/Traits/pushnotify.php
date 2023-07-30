<?php

namespace App\Traits;

trait FcmNot
{

    public function sendGCM($message, $id) {


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
            'registration_ids' => array (
                    $id
            ),
            'data' => array (
                    "message" => $message
            )
    );
    $fields = json_encode ( $fields );

    $headers = array (
            'Authorization: key=' . "AAAAyI6AEK0:APA91bGzdvuSHLPEk3ODS9lH2sP8hQd3uxKeUn5Kqhmd7bYI3zAvr1Ix7NeuZr7GVMDGqZr-L2nnqzXv6GwE-EnZovWv4wrcRgvItHxILqeqzc2tIBUx2g9IPZY6kWHO9aWYz1_kTBi8",
            'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    echo $result;
    curl_close ( $ch );
    }
}