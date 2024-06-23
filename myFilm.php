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
                                                    <h4 class="text-light ">MY FILM</h4>
                                                </div>
                                            </div>

                                            <?php
                                            $view_film_rs = Database::search("SELECT * FROM `film` INNER JOIN `payment` ON `film`.`id` = `payment`.`film_id` WHERE `user_uid`='" . $user . "'");
                                            $view_film_num = $view_film_rs->num_rows;

                                            if ($view_film_num == 0) {
                                                ?>
                                                <div class="col-12 align-content-center">
                                                    <h1 class="text-light">Hello , place go to back get select in buy your film
                                                        choese</h1>
                                                </div>
                                                <?php

                                            } else {

                                                for ($x = 0; $x < $view_film_num; $x++) {
                                                    $view_film_data = $view_film_rs->fetch_assoc();

                                                    $film_rs = Database::search("SELECT * FROM `film` WHERE `id` ='" . $view_film_data["film_id"] . "' AND `view_link`='" . $view_film_data["view_link"] . "'");
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
                                                                <h2
                                                                    class="card-title fs-4 fw-bold text-light align-content-center mt-4 p-3">
                                                                    <span>Film Title :</span><br />
                                                                    <?php echo $film_data["title"] ?>
                                                                    <br />
                                                                    <br />
                                                                    <span>Film Buying Date & Time :</span><br />
                                                                    <?php echo $view_film_data["date"] ?>
                                                                </h2>
                                                            </div>

                                                            <div class="col-6 col-lg-3 text-light align-content-center">
                               
                                                                <div class="d-grid gap-2 col-10 mx-auto">
                                      
                                                                    <button class="btn btn-primary text-light btn-lg" type="button">
                                                                        <a class="text-light" target="_blank" href="<?php echo $film_data["view_link"]; ?>">Watch Film</a></button>

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