<?php
include "connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>ComingSoon Page</title>
</head>

<body class="bg-dark">

    <?php include "navBar.php"; ?>

    <div class="container-fluid">
        <!-- film -->
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="text-light body-h1">Up Coming</h1>

                <div class="row border border-danger">

                    <div class="col-12">
                        <div class="row justify-content-center gap-5">

                            <?php

                            $film_rs = Database::search("SELECT * FROM `coming_soon`");

                            $film_num = $film_rs->num_rows;

                            for ($x = 0; $x < $film_num; $x++) {
                                $film_data = $film_rs->fetch_assoc();

                                ?>

                                <div class="card col-6 col-lg-3 mt-4 mb-4" style="width: 16rem;">

                                    <?php
                                    $image_rs = Database::search("SELECT * FROM `coming_soon` WHERE `img_path`='" . $film_data["img_path"] . "'");
                                    $image_date = $image_rs->fetch_assoc();

                                    ?>

                                    <img src="<?php echo $image_date["img_path"] ?>" class="card-img-top img-thumbnail mt-2"
                                        style="height: 300px;" />

                                    <div class="card-body ms-0 m-0 text-center">

                                        <h5 class="card-title fs-6 fw-bold">
                                            <?php echo $film_data["title"] ?>
                                        </h5>

                                        <h5 class="card-title fs-6 fw-bold">
                                            <?php echo $film_data["date"] ?>
                                        </h5>

                                        <div class="col-12">
                                            <a href='' class="col-12 btn btn-secondary">
                                                <i class="bi bi-play-circle-fill"></i>
                                            </a>
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

        <!-- film -->
    </div>



    <?php include "footer.php"; ?>

    <script src="script.js"></script>

</body>

</html>