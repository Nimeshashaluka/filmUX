<?php

session_start();

include "connection.php";

if (isset($_SESSION["u"])) {
    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $umail = $_SESSION["u"]["uid"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `film_id`='" . $id . "' AND `user_uid` ='" . $umail . "'");
        $cart_num = $cart_rs->num_rows;

        if ($cart_num == 1) {
            echo ("Already added to Cart");
        } else {
            Database::iud("INSERT INTO `cart`(`film_id`,`user_uid`) VALUES('" . $id . "','" . $umail . "')");
            echo ("Add To Cart");
        }
    } else {
        echo ("Something Went Wrong");
    }

} else {
    echo ("Please 1st LogIn or Sign Up");
}


?>