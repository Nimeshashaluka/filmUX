<?php

include "connection.php";

session_start();

if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];
    $oid = $_GET["id"];


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Payment Invoice</title>
    </head>

    <body style="background-color: black;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- <h2 class="logo-name p-4">FILM <span>U</span>X</h2> -->
                    <?php include "navBar.php"; ?>



                    <div class="row align-content-center justify-content-center text-light">

                        <div class="col-12">
                            <div class="row p-4 text-light text-center">
                                <h1>My INVOICE</h1>
                            </div>

                        </div>

                        <div class="col-10 p-4 mt-4 bg-black border border-3 border-light">

                            <div class="row">
                                <div class="col-6">
                                    <h5 class="fw-bold">INVOICE TO :</h5>
                                    <h2><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h2>
                                    <!-- <span>Kandy Rd, Gampaha</span><br /> -->
                                    <!-- <h5>Email :</h5> -->
                                    <span class="text-primary"><?php echo $umail; ?></span>
                                </div>

                                <?php
                                $payment_rs = Database::search("SELECT * FROM `payment` WHERE `order_id` = '" . $oid . "'");
                                $payment_data = $payment_rs->fetch_assoc();

                                ?>

                                <div class="col-6 text-end">
                                    <h4 class="fw-bold">INVOICE NO : </h4>
                                    <h2 class="fw-bold text-danger"><?php echo $payment_data["order_id"]; ?></h2>
                                    <span class="fw-bold text-light">Date & Time Of Invoice :</span><br />
                                    <span
                                        class="fw-bold text-primary"><?php echo $payment_data["date"]; ?></span>&nbsp;<br />
                                    <!-- <span>name@gmail.com</span> -->
                                </div>

                                <hr class="mt-4">
                                <div class="col-xl-10">
                                    <p>Film Price</p>
                                </div>
                                <div class="col-xl-2">
                                    <p class="float-end text-success fw-bold">USD <?php echo $payment_data["total"]; ?>
                                        . 00</p>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-xl-10">
                                    <p>Allowances</p>
                                </div>
                                <div class="col-xl-2">
                                    <p class="float-end">USD . 0.00
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-xl-10">
                                    <p>Tax</p>
                                </div>
                                <div class="col-xl-2">
                                    <p class="float-end">USD . 0.00
                                    </p>
                                </div>
                                <hr style="border: 2px solid white;">
                            </div>
                            <div class="row text-light">

                                <div class="col-xl-12">
                                    <p class="float-end fw-bold text-success" style="font-size: 22px;">Total USD : <?php echo $payment_data["total"];?>
                                   . 00 </p>
                                </div>
                                <hr style="border: 2px solid black;">
                            </div>
                            <div class="text-center" style="margin-top: 90px;">

                            </div>

                            <p class="my-5 mx-5" style="font-size: 32px; text-align: center; font-weight: bold;">
                                Thank For
                                Your
                                Purchase. See you again !!!</p>
                        </div>

                        <div class="row align-content-end justify-content-end p-4">
                            <button type="button" class="btn btn-danger btn-lg col-3"
                                onclick="viewMyFilm();">View My Film</button>
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
        window.location.href = "signIn.php";

    </script>

    <?php
}

?>