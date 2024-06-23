<?php


include "connection.php";

// $img_name = $_POST["img_name"];
$ctitle = $_POST["ct"];
$cdate = $_POST["cd"];

// $film_img = $_POST["cimg"];
// $fcimgpth = $_POST["profile_picture"];

if (empty($ctitle)) {
    echo ("Please Enter Film Title");
} else if (strlen($ctitle) > 50) {
    echo ("Title Must Contain LOWER THAN 50 characters.");
} else if (empty($cdate)) {
    echo ("Please Enter Film Release Year");
// } else if (empty($film_img)) {
//     echo ("Please Select Film Image");
} else {
    $data_rs = Database::search("SELECT * FROM `coming_soon` WHERE `title` ='" . $ctitle . "' AND `date`='" . $cdate . "'");
    $data_num = $data_rs->num_rows;

    if ($data_num > 0) {
        echo ("Film with the same Title or same Release Year already exists.");
    } else {
        // $image_URL = move_uploaded_file($film_img, "images/film_images/comingSoon/" . $img_name . ".png");

        Database::iud("INSERT INTO `coming_soon` (`title`,`date`,`status_status_id`) VALUES ('" . $ctitle . "','" . $cdate . "','1')");
        echo ("Success");

        // if (sizeof($_FILES) == 1) {

        //     $film_img = $_FILES["cimg"];
        //     $image_extension = $film_img["type"];

        //     $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        //     if (in_array($image_extension, $allowed_image_extensions)) {
        //         $new_img_extension;


        //         if ($image_extension == "image/jpg") {
        //             $new_img_extension = ".jpg";
        //         } else if ($image_extension == "image/jpeg") {
        //             $new_img_extension = ".jpeg";
        //         } else if ($image_extension == "image/png") {
        //             $new_img_extension = ".png";
        //         } else if ($image_extension == "image/svg+xml") {
        //             $new_img_extension = ".svg";
        //         }

        //         $file_name = "images//film_images//comingSoon//" . $ctitle . "_" . uniqid() . $new_img_extension;
        //         move_uploaded_file($film_img["tmp_name"], $file_name);


        //         Database::iud("INSERT INTO `coming_soon` (`title`,`date`,`img_path`) VALUES ('" . $ctitle . "','" . $cdate . "','" . $file_name . "')");
        //         echo ("Success");
        //     }


        // } else if (sizeof($_FILES) == 0) {
        //     echo ("You have not selected any image");

        // } else {
        //     echo ("You must select only 01 image");
        // }


    }
}

?>