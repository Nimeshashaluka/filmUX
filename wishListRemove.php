<?php 

session_start();

include "connection.php";

if (isset($_SESSION["u"])) {
    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $umail = $_SESSION["u"]["uid"];

        $wishList_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_uid` ='" . $umail . "' AND  `film_id`='" . $id . "'");
        $wishList_num = $wishList_rs->num_rows;

        if ($wishList_num == 1) {
            Database::iud("DELETE FROM `wishlist` WHERE `user_uid`='".$umail."' AND   `film_id`='".$id."' ");
            echo ("Remove from WishList Successful");
            
        } else {
            echo ("This item is not in the WishList");
           
        }
    } else {
        echo ("Something Went Wrong");
    }

} else {
    echo ("Please 1st LogIn or Sign Up");
}


?>