<!-- header-section-->
<?php include 'header.php'; ?>
<!-- /. header-section-->
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
<!-- footer -->
<?php include 'footer.php'; ?>
<!-- /.footer -->