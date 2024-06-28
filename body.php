<?php

require "connection.php";

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

</head>

<body class="body-body">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar text-center">
                <div class="container-fluid body-title mb-2">
                    <h1 class="text-light body-h1">New Arrival</h1>
                    <div class="d-flex col-12 col-lg-5 col-md-6">
                        <input class="form-control me-2"  placeholder="Search" 
                            id="search_input">

                        <select class="form-select btn btn-outline-danger me-2" style="max-width: 90px;"
                            id="search_select">
                            <option value="0">Select</option>

                            <?php
                            $category_rs = Database::search("SELECT * FROM `category`");
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
                        <button  class="btn btn-outline-danger" onclick="searchBtn(0);">Search</button>
                        </div>
                </div>
            </nav>

            <!-- <hr style="color: white;" /> -->
            <div class="col-12" id="searchResult">

                <?php
                $category_rs2 = Database::search("SELECT * FROM `category`");
                $category_num2 = $category_rs2->num_rows;

                for ($y = 0; $y < $category_num2; $y++) {
                    $category_data2 = $category_rs2->fetch_assoc();
                    ?>

                    <hr style="color: white;" />

                    <h1 class="text-light body-h1"><?php echo $category_data2["ct_name"]; ?></h1>

                    <!-- film -->
                    <div class="col-12 mb-3">
                        <div class="row border border-danger">

                        <!-- ////// -->
                            <div class="col-12">
                                <div class="row justify-content-center gap-5">

                                    <?php

                                    $film_rs = Database::search("SELECT * FROM `film` WHERE `category_c_id`='" . $category_data2["c_id"] . "' AND `status_status_id`='1' ORDER BY `date` DESC LIMIT 6 OFFSET 0");

                                    $film_num = $film_rs->num_rows;

                                    for ($x = 0; $x < $film_num; $x++) {
                                        $film_data = $film_rs->fetch_assoc();

                                        ?>

                                        <div class="card col-6 col-lg-3 mt-4 mb-4" style="width: 16rem;">

                                            <?php
                                            // $image_rs = Database::search("SELECT * FROM `film_img` WHERE `film_id`='" . $film_data["id"] . "'");
                                            // $image_date = $image_rs->fetch_assoc();

                                            ?>

                                            <img src="<?php echo $film_data["img_path"] ?>"
                                                class="card-img-top img-thumbnail mt-2" style="height: 300px;" />

                                            <div class="card-body ms-0 m-0 text-center">

                                                <h5 class="card-title fs-6 fw-bold">
                                                    <?php echo $film_data["title"] ?>
                                                </h5>

                                                <i class="bi bi-star-fill text-warning"></i> <i
                                                    class="bi bi-star-fill text-warning"></i> <i
                                                    class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-half text-warning"></i>


                                                <div class="col-12">
                                                    <a href='<?php echo "singleProductView.php?id=" . ($film_data["id"]); ?>'
                                                        class="col-12 btn btn-danger">
                                                        <i class="bi bi-play-circle-fill"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                        <?php

                                    }

                                    ?>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- film -->

                    <?php

                }

                ?>





                <hr style="color: white;" />

            </div>

        </div>


    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>