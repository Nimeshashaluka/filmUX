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

            if (isset($_FILES["uimage"])) {

                $film_img = $_FILES["uimage"];
                $image_extension = $film_img["type"];

                $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

                if (in_array($image_extension, $allowed_image_extensions)) {
                    $new_img_extension;

                    if ($image_extension == "image/jpg") {
                        $new_img_extension = ".jpg";
                    } else if ($image_extension == "image/jpeg") {
                        $new_img_extension = ".jpeg";
                    } else if ($image_extension == "image/png") {
                        $new_img_extension = ".png";
                    } else if ($image_extension == "image/svg+xml") {
                        $new_img_extension = ".svg";
                    }

                    $file_name = "images//newFilmAdd//" . $ftitle . "_" . uniqid() . $new_img_extension;
                    move_uploaded_file($film_img["tmp_name"], $file_name);

                    Database::iud("UPDATE `film` SET `title` ='" . $ftitle . "',`description`='" . $fdes . "',`date`='" . $fyear . "',
                    `price`='" . $fprice . "',`intro_video`='" . $fivideo . "',`status_status_id`='1',`category_c_id`='" . $fcate . "',
                    `view_link`='" . $fvlink . "' ,`img_path`='" . $file_name . "'
                    WHERE `id`='" . $id . "'");  

                    echo ("Success");
                }
            }
        } else {
            echo ("Film Update Fail");
        }
    }

} else {
    echo ("Please 1st LogIn or Sign In");
}

?>