<?php

include "connection.php";

$filmImage = $_FILES["uimage"];
$filmid = $_POST["fid"];

$data_rs = Database::search("SELECT * FROM `film` WHERE `id` ='" . $filmid . "'");
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

            $file_name = "images//newFilmAdd//" . $filmid. "_" . uniqid() . $new_img_extension;
            move_uploaded_file($film_img["tmp_name"], $file_name);

            Database::iud("UPDATE `film` SET `img_path`='" . $file_name . "' WHERE `id`='" . $filmid . "'");
            echo ("Success");
        }

    } else {
        echo ("please select image");
    }

} else {
    echo ("Film with the same Image already exists.");
}

?>