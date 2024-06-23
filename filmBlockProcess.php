<?php

require "connection.php";

if(isset($_GET["id"])){

    $film_id = $_GET["id"];

    $film_rs = Database::search("SELECT * FROM `film` WHERE `id`='".$film_id."'");
    $film_num = $film_rs->num_rows;

    if($film_num == 1){

        $film_data = $film_rs->fetch_assoc();

        if($film_data["status_status_id"] == 2){
            Database::iud("UPDATE `film` SET `status_status_id`= '1' WHERE `id`='".$film_id."'");
            echo ("blocked");
        }else if($film_data["status_status_id"] == 1){
            Database::iud("UPDATE `film` SET `status_status_id`= '2' WHERE `id`='".$film_id."'");
            echo ("unblocked");
        }

    }else{
        echo ("Cannot find the user. Please try again later.");
    }

}else{
    echo ("Something went wrong.");
}

?>