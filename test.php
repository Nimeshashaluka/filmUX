<div class="col-10 p-4 mt-4">

                            <table class="col-6 col-lg-12 col-md-12 table table-bordered text-center text-light">

                                <tr class="bg-dark text-light">
                                    <td>Film ID</td>
                                    <td>Film Title</td>
                                    <td>Film Description</td>
                                    <td>Release Year</td>
                                    <td>Category</td>
                                    <td>Price</td>
                                    <td>View Link</td>
                                    <td>Category</td>
                                    <td>Intro Video URL</td>
                                    <td>Edit</td>
                                    <td>Status</td>
                                </tr>

                                <?php
                                $userData_rs = Database::search("SELECT * FROM film INNER JOIN category ON film.category_c_id=category.c_id ORDER BY film.id ASC");
                                while ($row = mysqli_fetch_assoc($userData_rs)) {

                                    ?>
                                    <tr>
                                        <th><?php echo $row["id"]; ?></th>
                                        <th><?php echo $row["title"]; ?></th>
                                        <th><?php echo $row["description"]; ?></th>
                                        <th><?php echo $row["date"]; ?></th>
                                        <th><?php echo $row["ct_name"]; ?></th>
                                        <th><?php echo $row["price"]; ?></th>
                                        <th><?php echo $row["view_link"]; ?></th>
                                        <th><?php echo $row["ct_name"]; ?></th>
                                        <th><?php echo $row["intro_video"]; ?></th>
                                        <td>
                                            <!-- <a href="" class="link-dark" onclick="filmEdit(<?php echo $row['id']; ?>);">
                                                <i class="bi bi-pencil-square fs-3 me-3 text-primary"></i>
                                            </a> -->

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?php echo $row['id']; ?>">
                                                <i class="bi bi-pencil-square fs-3 text-light"></i>
                                            </button>
                                            <!-- Button trigger modal -->


                                            <!-- Modal -->
                                            <form action="" method="POST">
                                                <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">
                                                                    Update
                                                                    Film Details</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <!-- <form> -->
                                                                <div class="mb-3">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label text-dark">Film ID</label>
                                                                    <input type="text" value="<?php echo $row['id']; ?>"
                                                                        class="form-control"  id="id">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label text-dark">Title</label>
                                                                    <input type="text" value="<?php echo $row['title']; ?>"
                                                                        class="form-control"  id="title">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label text-dark">Film Year</label>
                                                                    <input type="text" value="<?php echo $row['date']; ?>"
                                                                        class="form-control" id="year">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label text-dark">Price</label>
                                                                    <input type="number" value="<?php echo $row['price']; ?>"
                                                                        class="form-control" id="price">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label text-dark">Intro Video</label>
                                                                    <input type="text"
                                                                        value="<?php echo $row['intro_video']; ?>"
                                                                        class="form-control"
                                                                        id="intro_video">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label text-dark">View Link</label>
                                                                    <input type="text" value="<?php echo $row['view_link']; ?>"
                                                                        class="form-control" id="view_link">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="message-text"
                                                                        class="col-form-label text-dark">Description</label>
                                                                    <input type="text"
                                                                        value="<?php echo $row['description']; ?>"
                                                                        class="form-control" 
                                                                        id="description">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label text-dark">Category</label>

                                                                    <select class="form-control" id="select">
                                                                        <option value="<?php echo $row['c_id']; ?>">
                                                                            <?php echo $row['ct_name']; ?>
                                                                        </option>
                                                                 

                                                                        <?php
                                                                        $category_rs = Database::search("SELECT * FROM category");
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
                                                                </div>

                                                                <!-- </form> -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-success"
                                                                    onclick="updateFilmDetails(<?php echo $row['id']; ?>);">Save
                                                                    Changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                            <!-- Modal -->

                                        </td>
                                        <th>

                                            <?php

                                            if ($row["status_status_id"] == 1) {
                                                ?>
                                                <button id="ub<?php echo $row['id']; ?>" class="btn btn-danger"
                                                    onclick="blockFilm(<?php echo $row['id']; ?>);">Block</button>
                                                <?php
                                            } else {
                                                ?>
                                                <button id="ub<?php echo $row['id']; ?>" class="btn btn-success"
                                                    onclick="blockFilm(<?php echo $row['id']; ?>);">Unblock</button>
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