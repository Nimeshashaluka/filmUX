<?php

include "connection.php";

session_start();

if (isset($_SESSION["u"])) {

    if (isset($_GET["id"])) {
        $fid = $_GET["id"];


        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <title>FILM DETAILS UPDATE</title>
        </head>

        <body style="background-color: black;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="logo-name p-4">FILM <span>U</span>X</h2>


                        <div class="row align-content-center justify-content-center text-light">

                            <div class="col-12">
                                <div class="row p-4 text-light text-center">
                                    <h1>FILM DETAILS UPDATE</h1>
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
                            $film_data = Database::search("SELECT * FROM `film` INNER JOIN `category` ON `film`.`category_c_id`=`category`.`c_id` WHERE `id` = '" . $fid . "'");
                            $film = $film_data->fetch_assoc();

                            ?>

                            <div class="col-10 p-4 mt-4">

                                <div class="row my-4">
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film ID</label>
                                        <input type="text" class="form-control" placeholder="Film ID"
                                            value="<?php echo $film['id']; ?>" id="id" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film Title</label>
                                        <input type="text" class="form-control" placeholder="Title"
                                            value="<?php echo $film['title']; ?>" id="title">
                                    </div>
                                </div>

                                <div class="row my-4">

                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film View Link</label>
                                        <input type="text" class="form-control" placeholder="View Link"
                                            value="<?php echo $film['view_link']; ?>" id="viewLink">
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film Release Year</label>
                                        <input type="text" class="form-control" placeholder="Year"
                                            value="<?php echo $film['date']; ?>" id="date">
                                    </div>
                                </div>

                                <div class="row my-4">
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film Price</label>
                                        <input type="number" class="form-control" placeholder="Film Price"
                                            value="<?php echo $film['price']; ?>" id="price">
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film Intro Video</label>
                                        <input type="text" class="form-control" placeholder="Intro Video"
                                            value="<?php echo $film['intro_video']; ?>" id="introV">
                                    </div>

                                </div>

                                <div class="row p-2">
                                    <label for="recipient-name" class="col-form-label">Category</label>
                                    <select class="form-control" id="select">
                                        <option value="<?php echo $film['c_id']; ?>">
                                            <?php echo $film['ct_name']; ?>
                                        </option>


                                        <?php
                                        $category_rs = Database::search("SELECT * FROM category");
                                        $category_num = $category_rs->num_rows;

                                        for ($x = 0; $x < $category_num; $x++) {
                                            $category_data = $category_rs->fetch_assoc();
                                            ?>

                                            <option value="<?php echo $category_data["c_id"]; ?>">
                                                <?php echo $category_data["ct_name"]; ?>

                                            </option>

                                            <?php
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="row my-4">
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Description</label>
                                        <input type="text" class="form-control" placeholder="First name"
                                            value="<?php echo $film['description']; ?>" id="descrip"
                                            style="height: 100px;">
                                    </div>

                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label">Film Image</label>

                                        <input type="text" class="form-control" placeholder="Image"
                                            value="<?php echo $film['img_path']; ?>" >

                                        <input type="file" class="form-control my-2"
                                            value="<?php echo $film['img_path']; ?>" >

                                        <button class="btn btn-warning my-2">Save Image</button>
                                    </div>



                                </div>



                                <div class="row">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success btn-lg" type="button" onclick="updateFilm();">Update Details</button>
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