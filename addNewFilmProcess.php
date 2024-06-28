<?php

include "connection.php";

$ftitle = $_POST["t"];
$fprice = $_POST["p"];
$ftbox = $_POST["tb"];
$fdate = $_POST["dt"];
$fcategory = $_POST["ct"];
$fvurl = $_POST["vr"];
$filmvurl = $_POST["fvr"];


if (empty($ftitle)) {
    echo ("Please Enter Film Title");
} else if (strlen($ftitle) > 50) {
    echo ("Title Must Contain LOWER THAN 50 characters.");
} else if (empty($fprice)) {
    echo ("Please Enter Film Price");
} else if (empty($ftbox)) {
    echo ("Please Enter Film Description");
} else if (strlen($ftbox) > 250) {
    echo ("Description Must Contain LOWER THAN 250 characters.");
} else if (!preg_match('/^\d{4}$/', $fdate)) {
    echo ("Please Enter Film Release Year");
} else if (!empty($fcategory == "0")) {
    echo ("Please Selected Category");
} else if (empty($fvurl)) {
    echo ("Please Enter Intro Video URL");
} else if (strlen($fvurl) > 50) {
    echo ("Film Intro Video URL Must Contain 50 characters.");
} else if (empty($filmvurl)) {
    echo ("Please Enter Film View URL");
} else {
    $data_rs = Database::search("SELECT * FROM `film` 
    WHERE `title` ='" . $ftitle . "' AND `category_c_id`='" . $fcategory . "'");
    $data_num = $data_rs->num_rows;

    if ($data_num > 0) {
        echo ("Film with the same Title or same Release Year already exists.");
    } else {


        if (isset($_FILES["filmNew"])) {

            $film_img = $_FILES["filmNew"];
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

                Database::iud("INSERT INTO `film` (`title`,`description`,`date`,`price`,`intro_video`,`status_status_id`,`category_c_id`,`view_link`,`img_path`) 
                VALUES ('" . $ftitle . "',
                '" . $ftbox . "',
                '" . $fdate . "',
                '" . $fprice . "',
                '" . $fvurl . "',
                '1',
                '" . $fcategory . "',
                '" . $filmvurl . "',
                '" . $file_name . "')");
                
                echo ("Success");
            }

        } else {
            echo ("please select image ");
        }

    }
}
?>