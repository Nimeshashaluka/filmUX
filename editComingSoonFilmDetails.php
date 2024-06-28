<?php

include "connection.php";

session_start();

if (isset($_SESSION["u"])) {

    if (isset($_GET["id"])) {
        $fcid = $_GET["id"];


        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="icon" href="images/FUX.png" />

            <title>COMING SOON FILM DETAILS UPDATE</title>
        </head>

        <body style="background-color: black;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="logo-name p-4">FILM <span>U</span>X</h2>


                        <div class="row align-content-center justify-content-center text-light">

                            <div class="col-12">
                                <div class="row p-4 text-light text-center">
                                    <h1>COMING SOON FILM DETAILS UPDATE</h1>
                                </div>

                            </div>


                            <div class="col-12 d-none"
                                style="position: absolute; display:flex; align-items: end; justify-content: end;" id="msgdiv4">
                                <div class="col-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg4">
                                    </div>
                                </div>
                            </div>

                            <?php
                            $film_data = Database::search("SELECT * FROM `coming_soon` WHERE `id` = '" . $fcid . "'");
                            $film = $film_data->fetch_assoc();

                            ?>

                            <div class="col-10 p-4 mt-4">

                                <div class="row my-4">
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film ID</label>
                                        <input type="text" class="form-control" placeholder="Film ID"
                                            value="<?php echo $film['id']; ?>" id="cid" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film Title</label>
                                        <input type="text" class="form-control" placeholder="Title"
                                            value="<?php echo $film['title']; ?>" id="ctitle">
                                    </div>
                                </div>

                                <div class="row my-4">

                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film Image</label>

                                        <input type="file" class="form-control" id="editImage"
                                            value="<?php echo $film['img_path']; ?>">
                                    </div>

                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film Release Date</label>
                                        <input type="text" class="form-control" placeholder="Year"
                                            value="<?php echo $film['date']; ?>" id="cdate">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success btn-lg" type="button"
                                            onclick="updateComingFilm();">Update
                                            Details</button>
                                    </div>

                                </div>


                            </div>


                            <div class="row align-content-end justify-content-end p-3">
                                <button type="button" class="btn btn-danger btn-lg col-3"
                                    onclick="adminDashborad();">Dashborad</button>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <?php include "footer.php"; ?>

            <script src="script.js"></script>
            <script src="bootstrap.bundle.min.js"></script>

        </body>

        </html>

        <?php


    } else {
        echo ("Not Selected Film Id");
    }


} else {

    ?>
    <script>
        window.location.href = "adminLogin.php";

    </script>

    <?php
}

?>