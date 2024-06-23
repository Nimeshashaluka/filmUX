<?php

include "connection.php";

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
        <title>FILM DETAILS</title>
    </head>

    <body style="background-color: black;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="logo-name p-4">FILM <span>U</span>X</h2>


                    <div class="row align-content-center justify-content-center text-light">

                        <div class="col-12">
                            <div class="row p-4 text-light text-center">
                                <h1>ALL FILM DETAILS</h1>
                            </div>

                        </div>


                        <div class="col-12 d-none"
                            style="position: absolute; display:flex; align-items: end; justify-content: end;" id="msgdiv4">
                            <div class="col-12">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg4">
                                </div>
                            </div>
                        </div>

                        <!-- //table load data -->
                        <div class="col-10 p-4 mt-4">

                            <table class="col-6 col-lg-12 col-md-12 table table-bordered text-center text-light">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <td>Film ID</td>
                                        <td>Film Title</td>
                                        <td>Film Description</td>
                                        <td>Release Year</td>
                                        <td>Price</td>
                                        <td>Intro Video URL</td>
                                        <td>Category</td>
                                        <td>View Link</td>
                                        <td>Edit</td>
                                        <td>Status</td>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $film_data = Database::search("SELECT * FROM `film` INNER JOIN `category` ON `film`.`category_c_id` =`category`.`c_id` ORDER BY `film`.`id` ASC");
                                    $film_num = $film_data->num_rows;

                                    for ($x = 0; $x < $film_num; $x++) {
                                        $select_data = $film_data->fetch_assoc();

                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $select_data["id"]; ?></th>
                                            <td><?php echo $select_data["title"]; ?></td>
                                            <td><?php echo $select_data["description"]; ?></td>
                                            <td><?php echo $select_data["date"]; ?></td>
                                            <td>$<?php echo $select_data["price"]; ?>.00</td>
                                            <td><?php echo $select_data["intro_video"]; ?></td>
                                            <td><?php echo $select_data["ct_name"]; ?></td>
                                            <td><?php echo $select_data["view_link"]; ?></td>

                                            <td>
                                                <button type="button" class="btn btn-primary" onclick="changeUpdateFile(<?php echo $select_data['id'];?>);">
                                                    <i class="bi bi-pencil-square fs-3 text-light"></i>
                                                </button>
                                            </td>


                                            <th>

                                                <?php

                                                if ($select_data["status_status_id"] == 1) {
                                                    ?>
                                                    <button id="ub<?php echo $select_data['id']; ?>" class="btn btn-danger"
                                                        onclick="blockFilm(<?php echo $select_data['id']; ?>);">Block</button>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <button id="ub<?php echo $select_data['id']; ?>" class="btn btn-success"
                                                        onclick="blockFilm(<?php echo $select_data['id']; ?>);">Unblock</button>
                                                    <?php
                                                }

                                                ?>
                                            </th>

                                        </tr>


                                    </tbody>
                                    <?php
                                    }

                                    ?>
                            </table>

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

    ?>
    <script>
        window.location.href = "adminLogin.php";

    </script>

    <?php
}

?>