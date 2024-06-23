<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $umail = $_SESSION["u"]["uid"];

        $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `film_id` ='" . $id . "' AND `user_uid` ='" . $umail . "'");
        $wishlist_num = $wishlist_rs->num_rows;

        if ($wishlist_num == 1) {
            echo("Already added to wishlist");
        } else {
            $date = new DateTime();
            $t = new DateTimeZone("Asia/Colombo");
            $date->setTimezone($t);
            $date_d = $date->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `wishlist`(`date`,`user_uid`,`film_id`) VALUES ('" . $date_d . "','" . $umail . "','" . $id . "')");
            echo("Added");           
        }
    } else {
        echo ("Something Went Wrong");
    }
} else {
    echo ("Please 1st LogIn or Sign Up");
}

?>