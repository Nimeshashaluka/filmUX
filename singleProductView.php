<?php

require "connection.php";

if (isset($_GET["id"])) {

    $filmId = $_GET["id"];

    $film_rs = Database::search("SELECT 
    film.id,film.title,film.description,film.date,film.category_c_id 
    FROM `film` WHERE film.id='" . $filmId . "'");

    $film_num = $film_rs->num_rows;
    if ($film_num == 1) {

        $film_data = $film_rs->fetch_assoc();

        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <title><?php echo $film_data["title"]; ?></title>
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
                <div class="col-12 mt-4 p-4" style="display: flex; align-content: center; justify-content: center;">
                    <div class="row">
                        <div class="mb-3" style="background-color: rgba(0, 0, 0, 0.7);">
                            <div class="row g-0">

                                <?php
                                $image_rs = Database::search("SELECT * FROM `film` WHERE `id`='" . $filmId . "'");
                                $film_num = $image_rs->num_rows;
                                $img = array();

                                if ($film_num != 0) {
                                    for ($x = 0; $x < $film_num; $x++) {
                                        $image_data = $image_rs->fetch_assoc();
                                        $img[$x] = $image_data["img_path"];
                                    }

                                    ?>

                                    <div class="col-12 d-none" id="poupVideo"
                                        style="display: flex; align-content: center; justify-content: center;">

                                        <!-- <div class="ratio ratio-21x9">
                                            <iframe src="<?php echo $film_data["intro_video"]; ?>" title="YouTube video"
                                                allowfullscreen></iframe>
                                        </div> -->

                                        <iframe width="100%" height="450"
                                            src="https://www.youtube.com/embed/cCxFXv0AKMg?si=OfVlQyvjJql9TZOS"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                                        <!-- //iframe ek database ekt damm wada karanne nathi case ekk thiynwa URL ek waradi kiynwa ? -->

                                        <!-- <iframe width="100%" height="450"
                                            src="<?php echo ("intro_video"); ?>"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                                    </div>

                                    <div class="col-md-4">
                                        <img src="<?php echo $image_data["img_path"]; ?>" class="img-fluid rounded-start"
                                            style="width: 350px;">
                                    </div>

                                    <div class="col-md-8 text-center p-4 align-content-center">
                                        <div class="card-body text-light">
                                            <h1 class="card-title"><?php echo $film_data["title"]; ?></h1>
                                            <p class="card-text"><?php echo $film_data["description"]; ?></p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>

                                            </p>
                                            <i class="bi bi-star-fill text-warning"></i> <i
                                                class="bi bi-star-fill text-warning"></i> <i
                                                class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-half text-warning"></i>

                                            <div class="col-12 mt-4">

                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    onclick=" addToWishlist(<?php echo $film_data['id']; ?>);"><i
                                                        class="bi bi-heart-fill"></i></button>
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    onclick="addToCart(<?php echo $film_data['id']; ?>);">Add to Cart <i
                                                        class="bi bi-cart-plus"></i></button>

                                                <button type="submit" id="payhere-payment" class="btn btn-success btn-sm" onclick="payNow(<?php echo $film_data['id'];?>);">
                                                    PayNow <i class="bi bi-cart-plus"></i></button>

                                                <button type="button" class="btn btn-outline-warning btn-sm"><i
                                                        class="bi bi-play-circle-fill" onclick="playVideo();"></i></button>

                                            </div>


                                        </div>
                                    </div>
                                    <?php

                                }

                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <br />
            <br />
            <br />

            <div class="col-12 mt-4">
                <?php include "footer.php"; ?>

            </div>


            <script src="script.js"></script>
            <script src="bootstrap.bundle.min.js"></script>
            <!-- <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script> -->
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

        </body>

        </html>
        <?php

    } else {
        echo ("sory");
    }
} else {
    echo ("something");
}

?>