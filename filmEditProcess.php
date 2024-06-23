<?php
session_start();

include "connection.php";

if (isset($_SESSION["u"])) {
    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        // $title = $_SESSION["u"]["title"];

        $film_rs = Database::search("SELECT * FROM `film` WHERE `id`='" . $id . "'");
        $film_data = $film_rs->fetch_assoc();
        // $film_num = $film_rs->num_rows;

        if ($film_data > 0) {
            echo ("Success");

            $array;
            
        } else {
            echo ("This film not a database");

        }
    }

}


?>