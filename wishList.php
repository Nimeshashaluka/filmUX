<?php
session_start();

if (isset($_SESSION["u"])) {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>

    <body class="nav-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <?php include "navBar.php"; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 d-none" style="position: absolute; display:flex; align-items: end; justify-content: end;"
            id="msgdiv4">
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg4">
                </div>
            </div>
        </div>

        <div class="container">

            <?php
            require "connection.php";

            if (isset($_SESSION["u"])) {
                $user = $_SESSION["u"]["uid"];
                ?>

                <div class="row">

                    <div class="row" style="display: flex; align-items: center; justify-content: center;">
                        <div class="col-12" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7))">
                            <div class="col-12 mb-3">
                                <div class="row border border-danger">

                                    <div class="col-12">
                                        <div class="row justify-content-center gap-5 p-4">

                                            <div class="col-12 bg-dark p-3">
                                                <div class="boxtitle text-center">
                                                    <h4 class="text-light ">Wish List</h4>
                                                </div>
                                            </div>

                                            <?php
                                            $wishList_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_uid`='" . $user . "'");
                                            $wishList_num = $wishList_rs->num_rows;

                                            if ($wishList_num == 0) {
                                                ?>
                                                <div class="col-12 align-content-center">
                                                    <h1 class="text-light">Hello , place go to back get select in buy your film
                                                        choese</h1>
                                                </div>
                                                <?php

                                            } else {

                                                for ($x = 0; $x < $wishList_num; $x++) {
                                                    $wishList_data = $wishList_rs->fetch_assoc();

                                                    $film_rs = Database::search("SELECT * FROM `film` WHERE `id` ='" . $wishList_data["film_id"] . "'");
                                                    $film_data = $film_rs->fetch_assoc();

                                                    // $image_rs = Database::search("SELECT * FROM `film_img` WHERE `film_id`='" . $film_data["id"] . "'");
                                                    // $image_date = $image_rs->fetch_assoc();

                                                    ?>

                                                    <hr style="color: white;" />

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6 col-lg-4">
                                                                <img src="<?php echo $film_data["img_path"] ?>"
                                                                    class="card-img-top img-thumbnail mt-2 p-1"
                                                                    style="height: 300px; width: 300px;" />
                                                            </div>
                                                            <div class="col-4 col-lg-5 d-none d-lg-block d-xl-block d-xxl-block">
                                                                <h5
                                                                    class="card-title fs-6 fw-bold text-light align-content-center mt-4 p-5">
                                                                    <?php echo $film_data["description"] ?>
                                                                </h5>
                                                            </div>

                                                            <div class="col-6 col-lg-3 text-light align-content-center">
                                                                <!-- <h4 class="mt-2 p-1 text-center" style="text-align: end;">hello my
                                                                frinde</h4> -->

                                                                <div class="d-grid gap-2 col-6 mx-auto p-3 ">
                                                                    <button class="btn btn-warning" type="button"
                                                                        onclick="addToCart(<?php echo $film_data['id']; ?>);">Add to
                                                                        Cart</button>
                                                                    <button class="btn btn-danger" type="button"
                                                                        onclick="removeWishList(<?php echo $film_data['id']; ?>);">Remove</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php

                                                }

                                            }

                                            ?>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php
            }

            ?>

        </div>

        <script src="script.js"></script>



    </body>

    </html>

    <?php
} else {
    ?>
    <script>
        window.location.href = "signIn.php";

    </script>

    <?php
}

?>