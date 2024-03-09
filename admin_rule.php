<!-- header-section-->
<?php include 'backend-header.php'; ?>
<!-- /. header-section-->

<div class="container" style="background-color: #ffffff;">
    <div class="text-center">
        <h2>ตัวอย่างกฎ</h2>
    </div>

    <div class="container" style="padding: 50px;position: relative;">
        <div class="post-block" style="height: 1173px; padding:50px;font-size: 3rem;line-height: 1.5;">
            <div style="text-align: center;">
                <img src="./pic/wutdy_logo.png" alt="" style="width: 20%" />
            </div>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "wutdychonburi";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the 'config' table where menu is 'rule'
            $sql = "SELECT id, value FROM config WHERE menu = 'rule'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div>';
                echo $row["value"];
                echo '</div>';
            } else {
                echo '<p>No rule available</p>';
            }

            $conn->close();
            ?>

            <div><img src="./pic/end-topic.png" alt="" style="width: 150%" /></div>
        </div>

    </div>
    <hr>
    <!-- <div class="table-container" style="padding: 15px;">
        <div class="row">
            <div class="col">
                <h3>Edit Rules</h3>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Image Path</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "wutdychonburi";
                    // Fetch all data from the 'config' table
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $sqlAll = "SELECT id, value FROM config where menu = 'rule'";
                    $resultAll = $conn->query($sqlAll);

                    if ($resultAll->num_rows > 0) {
                        while ($rowAll = $resultAll->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $rowAll["id"] . '</td>';
                            echo '<td>' . $rowAll["value"] . '</td>';
                            echo '<td><a href="edit_role.php?id=' . $rowAll["id"] . '">Edit</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">No data available</td></tr>';
                    }

                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div> -->

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">

                <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Rule</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rule</th>
                                            <th>Edit</th>
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
                                        $sqlAll = "SELECT id, value FROM config where menu = 'rule'";
                                        $resultAll = $conn->query($sqlAll);

                                        if ($resultAll->num_rows > 0) {
                                            while ($rowAll = $resultAll->fetch_assoc()) {
                                                echo '<tr>';
                                                echo '<td>' . $rowAll["value"] . '</td>';
                                                echo '<td><a href="edit_role.php?id=' . $rowAll["id"] . '"><button type="button" class="btn btn-info btn-xs">Edit</button></a></td>';
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
</div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
<!-- /.footer -->