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
        <link rel="icon" href="images/FUX.png" />

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

                                <div class="col-12 d-none"
                                    style="position: absolute; display:flex; align-items: end; justify-content: end;"
                                    id="msgdiv3">
                                    <div class="col-12">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg3">

                                        </div>
                                    </div>
                                </div>

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
                                    <nav class="nav flex-row gap-5 p-2 justify-content-center">

                                        <!-- //count case ek -->

                                        <div class="col">
                                            <button type="button" class="border-danger border-3 bg-dark text-light px-3"
                                                onclick="allFilm();"
                                                style=" height: 15vh; font-size: 24px; font-weight: 700;">Film Details
                                                <!-- <span class="text-light">22</span> -->
                                            </button>
                                        </div>

                                        <div class="col">
                                            <button type="button" class="border-danger border-3 bg-dark text-light px-3"
                                                onclick="allUserDetails();"
                                                style="height: 15vh; font-size: 24px; font-weight: 700;">Users
                                                Details
                                                <!-- <span class="text-light">50</span> -->
                                            </button>
                                        </div>

                                        <div class="col">
                                            <button type="button" class="border-danger border-3 bg-dark text-light px-3"
                                                onclick="allCamingSoonFilm();"
                                                style="height: 15vh; font-size: 24px; font-weight: 700;">Coming Soon
                                                <!-- <span class="text-light">50</span> -->
                                            </button>
                                        </div>

                                        <div class="col">
                                            <button type="button" class="border-danger border-3 bg-dark text-light fs-4 px-3"
                                                onclick="allPaymentDetails();"
                                                style="height: 15vh; font-weight: 700;">Payment Details
                                            </button>
                                        </div>


                        
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
                                                <div class="d-flex">
                                                    <input class="form-control me-2" id="userSearch" type="search"
                                                        placeholder="Search" aria-label="Search">
                                                    <button class="btn btn-success" onclick="userSearchBtn();">Search</button>
                                                </div>
                                            </div>
                                        </nav>
                                        <div class="col-12" id="userSearchResult">
                                            <div class="row">
                                                <table class="col-6 col-lg-12 col-md-12 table table-bordered text-center">

                                                    <tr class="bg-dark text-light">
                                                        <td>Email</td>
                                                        <td>First Name</td>
                                                        <td>Last Name</td>
                                                        <td>Mobile</td>
                                                        <td>User</td>
                                                    </tr>

                                                    <?php
                                                    $userData_rs = Database::search("SELECT * FROM `user` ORDER BY `uid` DESC");
                                                    $user_num = $userData_rs->num_rows;

                                                    for ($x = 0; $x < $user_num; $x++) {
                                                        $select_data = $userData_rs->fetch_assoc();

                                                        ?>
                                                        <tr>
                                                            <th><?php echo $select_data["email"]; ?></th>
                                                            <th><?php echo $select_data["fname"]; ?></th>
                                                            <th><?php echo $select_data["lname"]; ?></th>
                                                            <th><?php echo $select_data["number"]; ?></th>
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