<?php

session_start();
require "connection.php";

$email3 = $_POST["e3"];
$password3 = $_POST["p3"];

if (empty($email3)) {
    echo ("Please enter your Email");
} else if (strlen($email3) > 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email3, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email");
} else if (empty($password3)) {
    echo ("Please enter your Password");
} else if (strlen($password3) < 5 || strlen($password3) > 20) {
    echo ("Invalid Password");
} else {
    $data_rs = Database::search("SELECT * FROM `admin` WHERE `user_name` ='" . $email3 . "' AND `password`='" . $password3 . "'");
    $data_num = $data_rs->num_rows;

    if ($data_num == 1) {
        echo ("Success");

        $d =$data_rs->fetch_assoc();
        $_SESSION["u"] = $d;

    } else {
        echo ("Invalid Username or Password");
    }
}

?>