<?php

session_start();

if (isset($_SESSION["u"])) {
    $data = $_SESSION["u"];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="signUp&in.css" />
    <link rel="icon" href="images/FUX.png" />

    <title>User Account</title>
</head>

<body class="body-img">

    <?php

    include "connection.php";

    ?>

    <?php

    if (isset($_SESSION["u"])) {

        $email = $_SESSION["u"]["email"];

        $details_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");

        $details = $details_rs->fetch_assoc();

        ?>
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-12 col-xl-4">

                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <div class="mt-3 mb-4">
                                    <img src="images/user_profile_img.png" class="rounded-circle img-fluid"
                                        style="width: 100px;" onclick=""/>
                                </div>

                                <h4 class="mb-2"><?php echo $details["email"] ?></h4>
                                <p class="text-muted mb-4">@USER OF FILM UX<span class="mx-2"></span></p>
                                <div class="mb-4 pb-2">

                                </div>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-success btn-rounded btn-lg" onclick="contactPageCh();">
                                    Message now
                                </button>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-danger btn-rounded btn-lg" onclick="logOutBt();">
                                    Log out
                                </button>
                                <div class="d-flex justify-content-between text-center mt-5 mb-2">
                                    <div>
                                        <button type="button" class="btn btn-outline-danger" onclick="homepageCh();">Home</button>
                                    </div>

                                    <div>
                                        <button type="button" class="btn btn-outline-danger" onclick="wishlistCh();">Wishlist</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php


    } else {
        ?>

        <script>
            window.location = "signIn.php";
        </script>

        <?php
    }


    ?>



    <?php include "footer.php"; ?>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

</body>

</html>