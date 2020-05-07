<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');

http_response_code(200);
switch($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
        $file = 'logNotification.txt';
    	$current = file_get_contents($file);
    	$current .= $_GET["id"]."\n//////";
    	file_put_contents($file, $current);
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
        var_dump($plan);
        break;
    case "subscription":
        $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
        var_dump($plan);
        break;
    case "invoice":
        $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
        var_dump($plan);
        break;
}
?>	