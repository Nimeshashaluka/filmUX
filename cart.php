<?php
session_start();

if (isset($_SESSION["u"])) {
    $user = $_SESSION["u"]["uid"];

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
            id="msgdiv5">
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg5">
                </div>
            </div>
        </div>

        <div class="container">

            <?php
            require "connection.php";

            // session_start();
        
            // if (isset($_SESSION["u"])) {

            $total =0;
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
                                                <h4 class="text-light ">My Cart</h4>
                                            </div>
                                        </div>

                                        <?php
                                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_uid`='" . $user . "'");
                                        $cart_num = $cart_rs->num_rows;

                                        if ($cart_num == 0) {
                                            ?>
                                            <div class="col-12 align-content-center">
                                                <h1 class="text-light">Hello , place go to back get select in buy your film
                                                    choese</h1>
                                            </div>
                                            <?php

                                        } else {

                                            for ($x = 0; $x < $cart_num; $x++) {
                                                $cart_data = $cart_rs->fetch_assoc();

                                                $film_rs = Database::search("SELECT * FROM `film` WHERE `id` ='" . $cart_data["film_id"] . "'");
                                                $film_data = $film_rs->fetch_assoc();

                                                $total = $total + ($film_data["price"]);

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
                                                        <div class="col-4 col-lg-6 d-none d-lg-block d-xl-block d-xxl-block">
                                                            <h5
                                                                class="card-title fs-6 fw-bold text-light align-content-center mt-4 p-5">
                                                                <?php echo $film_data["description"] ?>
                                                            </h5>
                                                        </div>

                                                        <div class="col-6 col-lg-2 text-light align-content-center">
                                                            <!-- <h4 class="mt-2 p-1 text-center" style="text-align: end;">hello my
                                                                frinde</h4> -->

                                                            <div class="d-grid gap-2 col-6 mx-auto p-3">
                                                                <a href='<?php echo "singleProductView.php?id=" . ($film_data["id"]); ?>'
                                                                    class="col-12 btn btn-success">PayNow
                                                                </a>
                                                                <!-- <button class="btn btn-success" type="button">PayNow</button> -->
                                                                <button class="btn btn-danger" type="button"
                                                                    onclick="cartRemove(<?php echo $film_data['id']; ?>);">Remove</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <hr style="color: white;" /> -->


                                                <div class="card-body ms-0 m-0 text-center">

                                                    <h5 class="card-title fs-5 fw-bold text-light">
                                                        <?php echo $film_data["title"] ?>
                                                    </h5>

                                                    <i class="bi bi-star-fill text-warning"></i> <i
                                                        class="bi bi-star-fill text-warning"></i> <i
                                                        class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-half text-warning"></i>


                                                    <div class="col-12 mt-2">
                                                        <a href='#' class=" btn btn-primary">
                                                            <h3 class="card-title fs-4 fw-bold text-light">
                                                                $<?php echo $film_data["price"] ?>
                                                            </h3>
                                                        </a>
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
            // }
        
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