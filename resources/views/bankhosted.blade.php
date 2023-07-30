<?php
include_once('arbpg.php');

$ARB_PAYMENT_ENDPOINT_TESTING = 'https://securepayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=';
$ARB_PAYMENT_ENDPOINT_PROD = 'https://digitalpayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=';

echo " ARB PG Payment";

$arbPg = new ArbPg();

$url = $arbPg->getPaymentId();


// $url = $ARB_PAYMENT_ENDPOINT_TESTING . $paymentId; //in Production use Production End Point

// var_dump($url);
header("Location: $url");
