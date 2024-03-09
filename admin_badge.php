<!-- header-section-->
<?php include 'backend-header.php'; ?>
<!-- /. header-section-->

<div class="container" style="background-color: #ffffff;">
    <div class="text-center">
        <h2>ตัวอย่างรูป GIF / Badge</h2>
    </div>

    <div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">

                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Badge</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image Path</th>
                                                <th>Tag</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "wutdychonburi";
                                            // Fetch all data from the 'config' table
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            $sqlAll = "SELECT id, value,badge_text FROM config where menu = 'badge'";
                                            $resultAll = $conn->query($sqlAll);

                                            if ($resultAll->num_rows > 0) {
                                                while ($rowAll = $resultAll->fetch_assoc()) {
                                                    echo '<tr>';
                                                    echo '<td>' . $rowAll["id"] . '</td>';
                                                    echo '<td>';
                                                    echo '<img src="' . $rowAll["value"] . '" alt="GIF Image" style="width:50px;" />';
                                                    echo '</td>';
                                                    echo '<td>' . $rowAll["badge_text"] . '</td>';
                                                    echo '<td><a href="edit_badge.php?id=' . $rowAll["id"] . '"><button type="button" class="btn btn-info btn-xs">Edit</button></a></td>';
                                                    echo '<td><a href="delete_slide.php?id=' . $rowAll["id"] . '"><button type="button" class="btn btn-danger btn-xs">Delete</button></a></td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo '<tr><td colspan="4">No data available</td></tr>';
                                            }

                                            $conn->close();
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

        <hr>

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">

                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Badge</h4>
                                <div class="table-responsive">
                                    <form action="add_badge.php" method="post" enctype="multipart/form-data">
                                        <label for="newTagLabel">Tag Label (ยอดนิยม,ล่าสุด):</label>
                                        <input type="text" id="newTagLabel" name="newTagLabel" required>
                                        <br><br>
                                        <label for="newImageFile">Upload Badge File:</label>
                                        <input type="file" name="newImageFile" id="newImageFile" accept="image/*" required>
                                        <br>
                                        <input type="submit" value="Add Image Path">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
<!-- /.footer -->