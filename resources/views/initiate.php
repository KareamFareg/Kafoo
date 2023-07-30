<?php

include_once('arbpg.php');

$card_number = $_POST['card_number'];

$expiry_month = $_POST['expiry_month'];
$expiry_year = $_POST['expiry_year'];
$cvv = $_POST['cvv'];
$card_holder = $_POST['holder_name'];


$arbPg = new ArbPg();

$url = $arbPg->getmerchanthostedPaymentid($card_number, $expiry_month, $expiry_year, $cvv, $card_holder);


echo $url;

header("Location: $url");
