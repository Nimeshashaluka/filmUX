<?php

session_start();
include "connection.php";

if (isset($_SESSION["u"])) {

    $order_id = $_POST["o"];
    $fid = $_POST["i"];
    $mail = $_POST["m"];
    $amount = $_POST["a"];
    $usid = $_POST["ui"];

    $film_rs = Database::search("SELECT * FROM `film` WHERE `id`='" . $fid . "'");
    $film_data = $film_rs->fetch_assoc();

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::search("INSERT INTO `payment`(`order_id`,`date`,`total`,`user_uid`,`film_id`)
    VALUES ('" . $order_id . "','" . $date . "','" . $amount . "','" . $usid . "','" . $fid . "')");

    echo ("Success");
}



?>