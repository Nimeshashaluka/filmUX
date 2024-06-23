<?php

include "connection.php";

session_start();

if (isset($_SESSION["u"])) {
    $data = $_SESSION["u"];


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Admin Panle</title>
    </head>

    <body class="bg-dark">

        <?php

        // session_start();
    
        if (isset($_SESSION["u"])) {

            $email = $_SESSION["u"]["user_name"];
            $details_rs = Database::search("SELECT * FROM `admin` WHERE `user_name` ='" . $email . "'");
            $details = $details_rs->fetch_assoc();

            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-3 text-center bg-dark">
                                <h2 class="logo-name p-4">FILM <span>U</span>X</h2>

                                <nav class="nav flex-column gap-5 p-4"
                                    style="display: flex; align-items: center; justify-content: center;">
                                    <button type="button" class="btn btn-outline-danger" onclick="adminDashborad();"
                                        style="width: 100%; height: 8vh; font-size: 25px; font-weight: 700;"><i
                                            class="bi bi-house-door">
                                        </i> Dashborad</button>
                                    <button type="button" class="btn btn-outline-danger" onclick="newFilmAdd();"
                                        style="width: 100%; height: 8vh;  font-size: 25px; font-weight: 700;"><i
                                            class="bi bi-film"></i>New Film</button>

                                    <button type="button" class="btn btn-outline-danger" onclick="allFilm();"
                                        style="width: 100%; height: 8vh;  font-size: 25px; font-weight: 700;"><i
                                            class="bi bi-film"></i>All Film View</button>

                                    <button type="button" class="btn btn-outline-danger" onclick="addCamingSoonFilm();"
                                        style="width: 100%; height: 8vh;  font-size: 25px; font-weight: 700;"><i
                                            class="bi bi-camera-reels"></i>Add CamingSoon</button>

                                    <button type="button" class="btn btn-outline-danger" onclick="allCamingSoonFilm();"
                                        style="width: 100%; height: 8vh;  font-size: 25px; font-weight: 700;"><i
                                            class="bi bi-camera-reels"></i>CamingSoon View</button>

                                    <button type="button" class="btn btn-outline-danger" onclick="allWishList();"
                                        style="width: 100%; height: 8vh;  font-size: 25px; font-weight: 700;"><i
                                            class="bi bi-bag-heart"></i> All Wishlist</button>

                                    <button type="button" class="btn btn-outline-danger" onclick="allUserDetails();"
                                        style="width: 100%; height: 8vh;  font-size: 25px; font-weight: 700;"><i
                                            class="bi bi-people"></i> All User Details</button>

                                    <button type="button" class="btn btn-outline-danger" onclick="allPaymentDetails();"
                                        style="width: 100%; height: 8vh;  font-size: 25px; font-weight: 700;"><i
                                            class="bi bi-credit-card-fill"></i> Payment History</button>
                                </nav>

                                <div class="mt-4 mb-4 p-3">
                                    <img src="images/user_profile_img.png" class="rounded-circle img-fluid"
                                        style="width: 100px;" />
                                </div>

                                <h4 class="mb-2 text-light" style="font-size: 14px;"><?php echo $details["user_name"] ?></h4>
                                <p class="text-muted mb-4">@ADMIN OF FILM UX<span class="mx-2"></span></p>
                                <li style=" display: flex; align-items: center; justify-content: center;"><button type="button"
                                        class="btn btn-danger btn-sm" onclick="logOutBt();">Log Out</button></li>

                            </div>

                            <div class="col-12 col-lg-9 bg-light">
                                <div class="col-12 mt-4 p-4 bg-dark">
                                    <nav class="nav flex-row gap-5 p-2">

                                        <!-- //count case ek -->


                                        <button type="button" class="border-danger border-3 bg-dark text-light" onclick="allFilm();"
                                            style="width: 30%; height: 15vh; font-size: 24px; font-weight: 700;">Film
                                            <!-- <span class="text-light">22</span> -->
                                        </button>

                                        <button type="button" class="border-danger border-3 bg-dark text-light" onclick="allUserDetails();"
                                            style="width: 30%; height: 15vh; font-size: 24px; font-weight: 700;">Users Details
                                            <!-- <span class="text-light">50</span> -->
                                        </button>
                                        <button type="button" class="border-danger border-3 bg-dark text-light" onclick="allCamingSoonFilm();"
                                            style="width: 30%; height: 15vh; font-size: 24px; font-weight: 700;">Coming Soon
                                            <!-- <span class="text-light">50</span> -->
                                        </button>
                                        <button type="button" class="border-danger border-3 bg-dark text-light" onclick="allPaymentDetails();"
                                            style="width: 30%; height: 15vh; font-size: 24px; font-weight: 700;">Payment Details
                                            <!-- <span class="text-light">40</span> -->

                                        </button>
                                    </nav>

                                </div>

                                <div class="d-none d-lg-block d-md-block d-xl-block d-xxl-block  col-12 text-center mt-4">
                                    <div class="col-12 bg-danger">
                                        <h1 class="p-3 text-light text-center">User Details</h1>
                                    </div>

                                    <div class="col-12">
                                        <nav class="navbar">
                                            <div class="container-fluid">
                                                <a class="navbar-brand"></a>
                                                <form class="d-flex" role="search">
                                                    <input class="form-control me-2" type="search" placeholder="Search"
                                                        aria-label="Search">
                                                    <button class="btn btn-success" type="submit">Search</button>
                                                </form>
                                            </div>
                                        </nav>

                                        <table class="col-6 col-lg-12 col-md-12 table table-bordered text-center">

                                            <tr class="bg-dark text-light">
                                                <td>Email</td>
                                                <td>First Name</td>
                                                <td>Last Name</td>
                                                <td>Mobile</td>
                                                <td>User</td>
                                            </tr>

                                            <?php
                                            $userData_rs = Database::search("SELECT * FROM `user`");
                                            // $userData_num = $userData_rs->num_rows;             
                                            while ($row = mysqli_fetch_assoc($userData_rs)) {

                                                ?>
                                                <tr>
                                                    <th><?php echo $row["email"]; ?></th>
                                                    <th><?php echo $row["fname"]; ?></th>
                                                    <th><?php echo $row["lname"]; ?></th>
                                                    <th><?php echo $row["number"]; ?></th>
                                                    <td>
                                                        <a href="" class="link-dark">
                                                            <i class="bi bi-person-bounding-box fs-4 text-break"></i>
                                                        </a>


                                                    </td>
                                                </tr>

                                                <?php
                                            }

                                            ?>

                                            </tbody>
                                        </table>

                                    </div>


                                </div>

                            </div>

                        </div>




                    </div>
                </div>
            </div>

            <?php
        } else {
            ?>
            <script>
                window.location = "adminLogin.php";
            </script>
            <?php
        }

        ?>

        <script src="script.js"></script>


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