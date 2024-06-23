<?php

session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme =$_POST["rm"];

if (empty($email)) {
    echo ("Please enter your Email");
} else if (strlen($email) > 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Invalid Password");
} else {
    $data_rs = Database::search("SELECT * FROM `user` WHERE `email` ='" . $email . "' AND `password`='" . $password . "' AND `status_status_id`='1'");
    $data_num = $data_rs->num_rows;

    if ($data_num == 1) {
        echo ("Success");

        $d =$data_rs->fetch_assoc();
        $_SESSION["u"] = $d;

        if($rememberme == "true"){
            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$password,time()+(60*60*24*365));

        }else{
            setcookie("email","",-1);
            setcookie("password","",-1);
        }

    } else {
        echo ("Invalid Username or Password");
    }
}

?>