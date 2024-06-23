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
            Database::iud("DELETE FROM `cart` WHERE `film_id`='".$id."' AND `user_uid`='".$umail."'");
            echo ("Remove from Cart Successful");
            
        } else {
            echo ("This item is not in the cart");
           
        }
    } else {
        echo ("Something Went Wrong");
    }

} else {
    echo ("Please 1st LogIn or Sign Up");
}


?>