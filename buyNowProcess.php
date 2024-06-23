<?php
session_start();

include "connection.php";

if (isset($_SESSION["u"])) {

    $id = $_GET["id"];
    $umail = $_SESSION["u"]["email"];

    $array;

    $order_id = uniqid();

    $film_rs = Database::search("SELECT * FROM `film` WHERE `id`='" . $id . "'");
    $film_data = $film_rs->fetch_assoc();

    $address = "Colombo 5, Sri Lanka";
    $city = "Colombo";
    $district = "Western Province";

    if ($film_data > 0) {

        $item = $film_data["title"];
        $amount = ((int) $film_data["price"]);
    
        $userid = $_SESSION["u"]["uid"];
        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["number"];
        $uaddress = $address;
        $ucity = $city;
    
        $merchant_id = "1226552";
        $merchant_secret = "MzUzMjg2NjU4MzM4NTc5MDUxMTM0MDc1Mzk1MTU5NTg1Mzc3MzQw";
        $currency ="USD";
    
        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );
    
        $array["id"] = $order_id;
        $array["userid"] = $userid;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $uaddress;
        $array["city"] = $city;
        $array["umail"] = $umail;
        $array["mid"] = $merchant_id;
        $array["msecret"] = $merchant_secret;
        $array["currency"] = $currency;
        $array["hash"] = $hash;

        echo json_encode($array);

    } else {
        echo ("2");
    }

} else {
    echo ("1");
}

?>