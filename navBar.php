<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />

</head>

<body>

    <nav class="col-12">
        <h2 class="logo-name">FILM <span>U</span>X</h2>

        <ul class="sidebar">
            <li onclick="hideSidebar();"><a href="#"><img src="images/103431_cancel_icon.png" id="hide"></a></li>
            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="body.php">New Arrival</a></li> -->
            <li><a href="camingSoonPage.php">Coming Soon</a></li>
            <li><a href="contactPage.php">Contact</a></li>
            <li><a href="userAccount.php">Profile</a></li>
            <li><a href="cart.php">My Cart</a></li>
            <li><a href="wishList.php">Wish List</a></li>
            <li><a href="myFilm.php">My Film</a></li>


            <?php

            // session_start();

            if (isset($_SESSION["u"])) {
                $data = $_SESSION["u"];

                ?>

                <li style="display: flex; align-items: center; justify-content: center;"><img
                        src="images/user_profile_img.png" class="rounded-circle img-fluid"
                        style="width: 60px; cursor: pointer;" onclick="profileCh();" />
                </li>
                <li style="display: flex; align-items: center; justify-content: center;">
                    <span class="text-light"><?php echo $data["email"]; ?></span>
                </li>

                <li style=" display: flex; align-items: center; justify-content: center;"><button type="button"
                        class="btn btn-danger btn-sm" onclick="logOutBt();">Log Out</button></li>
                <?php
            } else {
                ?>
                <li><a href="signIn.php"><button type="button" class="btn btn-danger btn-lg">LogIn</button></a>
                </li>

                <?php
            }
            ?>
        </ul>



        <ul class="d-none d-xl-block">
            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="body.php">New Arrival</a></li> -->
            <li><a href="camingSoonPage.php">Coming Soon</a></li>
            <li><a href="contactPage.php">Contact</a></li>
            <li><a href="cart.php">My Cart</a></li>
            <li><a href="wishList.php">Wish List</a></li>
            <li><a href="myFilm.php">My Film</a></li>

        </ul>

        <li onclick="showSidebar();" style="align-items: flex-end;"><a href="#"><img
                    src="images/1564512_burger_catalogue_list_menu_icon.png" id="show"></a></li>

    </nav>

    </div>

    <script src="script.js"></script>
</body>

</html>