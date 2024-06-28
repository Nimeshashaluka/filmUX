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
        <link rel="icon" href="images/FUX.png" />

        <title>CAMING SOON FILM DETAILS</title>
    </head>

    <body style="background-color: black;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="logo-name p-4">FILM <span>U</span>X</h2>


                    <div class="row align-content-center justify-content-center text-light">

                        <div class="col-12">
                            <div class="row p-4 text-light text-center">
                                <h1>ALL CAMING SOON FILM DETAILS</h1>
                            </div>

                        </div>

                        <div class="col-10 p-4 mt-4">

                            <table class="col-6 col-lg-12 col-md-12 table table-bordered text-center text-light">

                                <tr class="bg-dark text-light">
                                    <td>Film ID</td>
                                    <td>Film Title</td>
                                    <td>Release Year</td>
                                    <td>Film Image Path</td>
                                    <td>Film Status</td>
                                </tr>

                                <?php
                                $userData_rs = Database::search("SELECT * FROM `coming_soon`");
                                $user_num = $userData_rs->num_rows;

                                for ($x = 0; $x < $user_num; $x++) {
                                    $select_data = $userData_rs->fetch_assoc();
                                    ?>
                                    <tr>
                                        <th><?php echo $select_data["id"]; ?></th>
                                        <th><?php echo $select_data["title"]; ?></th>
                                        <th><?php echo $select_data["date"]; ?></th>
                                        <th><?php echo $select_data["img_path"]; ?></th>

                                        <td>
                                            <button type="button" class="btn btn-primary"
                                                onclick="changeComingSoonUpdateFilm(<?php echo $select_data['id']; ?>);">
                                                <i class="bi bi-pencil-square fs-3 text-light"></i>
                                            </button>
                                        </td>

                                        <th>
                                            <?php

                                            if ($select_data["status_status_id"] == 1) {
                                                ?>
                                                <button id="ub<?php echo $select_data['id']; ?>" class="btn btn-danger"
                                                    onclick="blockComingSoonFilm(<?php echo $select_data['id']; ?>);">Block</button>
                                                <?php
                                            } else {
                                                ?>
                                                <button id="ub<?php echo $select_data['id']; ?>" class="btn btn-success"
                                                    onclick="blockComingSoonFilm(<?php echo $select_data['id']; ?>);">Unblock</button>
                                                <?php
                                            }
                                            ?>
                                        </th>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="row align-content-end justify-content-end">
                                <button type="button" class="btn btn-danger btn-lg col-3"
                                    onclick="adminDashborad();">Dashborad</button>

                            </div>
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