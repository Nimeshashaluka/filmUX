<?php
include "connection.php";

session_start();

if (isset($_SESSION["u"])) {

    $fcid = $_POST["fcid"];

    $fctitle = $_POST["fctitle"];
    $fcdate = $_POST["fcdate"];
    // $filmImage = $_FILES["editImage"];

    if (empty($fctitle)) {
        echo ("Please Enter Film Title.");
    } else if (strlen($fctitle) > 45) {
        echo ("Title Must Contain LOWER THAN 45 characters.");
    } else if (empty($fcdate)) {
        echo ("Please Enter Film Date");
    } else {
        $data_rs = Database::search("SELECT * FROM `coming_soon` WHERE `id` ='" . $fcid . "'");
        $data_num = $data_rs->num_rows;

        if ($data_num > 0) {

            if (isset($_FILES["cseditImage"])) {

                $film_img = $_FILES["cseditImage"];
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

                    $file_name = "images//newFilmAdd//" . $fctitle . "_" . uniqid() . $new_img_extension;
                    move_uploaded_file($film_img["tmp_name"], $file_name);

                    Database::iud("UPDATE `coming_soon` SET `title` ='" . $fctitle . "',`date`='" . $fcdate . "',`img_path`='" . $file_name . "' WHERE `id`='" . $fcid . "'");

                    echo ("Success");
                }
            } else {
                echo ("Please select image");
            }
        }
    }

} else {
    echo ("Please 1st LogIn or Sign In");
}

?>