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
        <title>Add CamingSoon Film</title>
        <link rel="icon" href="images/FUX.png" />

    </head>

    <body style="background-color: black;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="logo-name p-4">FILM <span>U</span>X</h2>


                    <div class="row align-content-center justify-content-center text-light">

                        <div class="col-12">
                            <div class="row p-4 text-light text-center">
                                <h1>ADD NEW CAMING SOON FILM</h1>
                            </div>

                        </div>

                        <div class="col-6 d-none"
                            style="position: absolute; display:flex; align-items: end; justify-content: end;" id="msgdiv5">
                            <div class="col-4">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg5">
                                </div>
                            </div>
                        </div>

                        <div class="col-10 p-4 mt-4">

                            <form method="POST" action="addCamingSoonFilmProcess.php" enctype="multipart/form-data"
                                class="row g-4">

                                <div class="col-6">
                                    <label for="validationDefault01" class="form-label">Film Title</label>
                                    <input type="text" class="form-control" id="ctitle" required placeholder="Title">
                                </div>

                                <div class="col-6">
                                    <label for="validationDefault03" class="form-label">Date</label>
                                    <input type="text" class="form-control" id="cdate" required placeholder="yyyy-mm-dd">
                                </div>
                                
                                <div class="col-6 mt-4">

                                    <label for="validationDefault03" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="img" required
                                        placeholder="Film Image">

                                </div>

                                <div class="col-12 mt-4 gap-4 p-4"
                                    style="display: flex;align-items: center; justify-content: center">
                                    <button type="button" class="btn btn-success btn-lg col-6"
                                        onclick="addNewComingFilm();">Submit</button>
                                    <button type="button" class="btn btn-danger btn-lg col-6"
                                        onclick="adminDashborad();">Dashborad</button>
                                </div>

                            </form>

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

    ?>
    <script>
        window.location.href = "adminLogin.php";

    </script>

    <?php
}

?>