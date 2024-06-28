<?php


session_start();
require "connection.php";

$typePassword = $_POST["tp"];
$typeVeCode = $_POST["tc"];

if (empty($typePassword)) {
    echo ("Please enter your Password");
} else if (strlen($typePassword) > 20) {
    echo ("Password must have less than 20 characters");
} else if (empty($typeVeCode)) {
    echo ("Please enter your Verification Code");
} else {
    Database::iud("UPDATE `user` SET `password`='" . $typePassword . "' 
    WHERE `v_code`='" . $typeVeCode . "'");

    echo("Success");

}








?>