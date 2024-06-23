<?php
include "connection.php";

session_start();

if (isset($_SESSION["u"])) {

    $id = $_POST["fid"];

    $ftitle = $_POST["ft"];
    $fvlink = $_POST["fvl"];
    $fyear = $_POST["fy"];
    $fprice = $_POST["fp"];
    $fivideo = $_POST["fiv"];
    $fcate = $_POST["fc"];
    $fdes = $_POST["fd"];

    if (empty($ftitle)) {
        echo ("Please Enter Film Title.");
    } else if (strlen($ftitle) > 45) {
        echo ("Title Must Contain LOWER THAN 45 characters.");
    } else if (empty($fyear)) {
        echo ("Please Enter Film Year");
    } else if (empty($fprice)) {
        echo ("Please Enter Film Price");
    } else if (empty($fivideo)) {
        echo ("Please Enter Film Intro Video URL");
    } else if (empty($fvlink)) {
        echo ("Please Enter Film Intro Video URL");
    } else if (empty($fdes)) {
        echo ("Please Enter Film escription");
    } else if (empty($fcate)) {
        echo ("Please Select Film Category");
    } else {
        $data_rs = Database::search("SELECT * FROM `film` WHERE `id` ='" . $id . "'");
        $data_num = $data_rs->num_rows;

        if ($data_num > 0) {

            Database::iud("UPDATE `film` SET `title` ='" . $ftitle . "',`description`='" . $fdes . "',`date`='" . $fyear . "',
                `price`='" . $fprice . "',`intro_video`='" . $fivideo . "',`status_status_id`='1',`category_c_id`='" . $fcate . "',`view_link`='" . $fvlink . "' WHERE `id`='" . $id . "'");

            echo ("Success");
        } else {
            echo ("Film Update Fail");
        }
    }

} else {
    echo ("Please 1st LogIn or Sign In");
}

?>