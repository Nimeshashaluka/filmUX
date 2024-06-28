<?php

include "connection.php";

$typedText = $_POST["typedText"];
$categoryId = $_POST["category"];

$query = "SELECT * FROM film";

if (!empty($typedText) && $categoryId == 0) {
    $query .= " WHERE title LIKE '%" . $typedText . "%'";
} else if (empty($typedText) && $categoryId != 0) {
    $query .= " WHERE category_c_id='" . $categoryId . "'";
} else if (!empty($typedText) && $categoryId != 0) {
    $query .= " WHERE title LIKE '%" . $typedText . "%' AND category_c_id='" . $categoryId . "'";
}

?>

<div class="col-12">
    <?php

    if ("0" != ($_POST["page"])) {
        $pageno = $_POST["page"];
    } else {
        $pageno = 1;
    }

    $film_rs = Database::search($query);
    $film_num = $film_rs->num_rows;

    $results_per_page = 10;
    $number_of_pages = ceil($film_num / $results_per_page);

    $page_results = ($pageno - 1) * $results_per_page;
    $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

    $selected_num = $selected_rs->num_rows;

    ?>
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 mb-3">
                <div class="row border border-danger">

                    <!-- ////// -->
                    <div class="col-12">
                        <div class="row justify-content-center gap-5">

                            <?php
                            for ($x = 0; $x < $selected_num; $x++) {
                                $select_data = $selected_rs->fetch_assoc();

                                ?>
                                <!-- <hr style="color: white;" /> -->
                                <div class="col-12 mb-3">
                                    <div class="row justify-content-center gap-5 border border-danger">

                                        <div class="card col-6 col-lg-3 mt-4 mb-4" style="width: 16rem;">

                                            <img src="<?php echo $select_data["img_path"] ?>"
                                                class="card-img-top img-thumbnail mt-2" style="height: 300px;" />

                                            <div class="card-body ms-0 m-0 text-center">

                                                <h5 class="card-title fs-6 fw-bold">
                                                    <?php echo $select_data["title"] ?>
                                                </h5>

                                                <i class="bi bi-star-fill text-warning"></i> <i
                                                    class="bi bi-star-fill text-warning"></i> <i
                                                    class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-half text-warning"></i>


                                                <div class="col-12">
                                                    <a href='<?php echo "singleProductView.php?id=" . ($select_data["id"]); ?>'
                                                        class="col-12 btn btn-danger">
                                                        <i class="bi bi-play-circle-fill"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <?php

                            }

                            ?>
                        </div>

                    </div>

                    <?php

                    ?>
                    <!-- </div> -->

                    <div class="col-12 text-center mb-3 d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" <?php if ($pageno <= 1) {
                                        echo ("#");
                                    } else {
                                        ?>
                                            onclick="searchBtn(<?php echo ($pageno - 1) ?>);" <?php
                                    } ?> aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php

                                for ($x = 1; $x <= $number_of_pages; $x++) {
                                    if ($x == $pageno) {
                                        ?>
                                        <li class="page-item active">
                                            <a class="page-link" onclick="searchBtn(<?php echo ($x) ?>);">
                                                <?php echo $x; ?>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" onclick="searchBtn(<?php echo ($x) ?>);">
                                                <?php echo $x; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }

                                ?>

                                <li class="page-item">
                                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                        echo ("#");
                                    } else {
                                        ?>
            onclick="searchBtn(<?php echo ($pageno + 1) ?>);" <?php
                                    } ?> aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>

                <!-- </div> -->
                <!-- film -->
            </div>

        </div>
    </div>
</div>