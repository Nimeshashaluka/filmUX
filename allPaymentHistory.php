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

        <title>Payment History</title>
    </head>

    <body style="background-color: black;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="logo-name p-4">FILM <span>U</span>X</h2>


                    <div class="row align-content-center justify-content-center text-light">

                        <div class="col-12">
                            <div class="row p-4 text-light text-center">
                                <h1>ALL PAYMENT HISTORY</h1>
                            </div>

                        </div>

                        <div class="col-10 p-4 mt-4">

                            <table class="col-6 col-lg-12 col-md-12 table table-bordered text-center text-light">

                                <tr class="bg-dark text-light">
                                    <td>Payment ID</td>
                                    <td>Order ID</td>
                                    <td>Date</td>
                                    <td>User ID</td>
                                    <td>Film ID</td>
                                </tr>

                                <?php
                                $userData_rs = Database::search("SELECT * FROM `payment`");
                                while ($row = mysqli_fetch_assoc($userData_rs)) {

                                    ?>
                                    <tr>
                                        <th><?php echo $row["payment_id"]; ?></th>
                                        <th><?php echo $row["order_id"]; ?></th>
                                        <th><?php echo $row["date"]; ?></th>
                                        <th><?php echo $row["user_uid"]; ?></th>
                                        <th><?php echo $row["film_id"]; ?></th>
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