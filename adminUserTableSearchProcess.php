<?php

include "connection.php";

$searchText = $_POST["searchIn"];

$userData = "SELECT * FROM `user`";

if (empty($searchText)) {
    echo ("Please Enter Request Data in the Search Input");
}

if (!empty($searchText)) {
    $userData .= "WHERE fname LIKE '%" . $searchText . "%' OR lname LIKE '%" . $searchText . "%' OR number LIKE '%" . $searchText . "%'";
    // echo($userData);
}
?>

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
        $userData_rs = Database::search($userData);
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