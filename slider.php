<!-- slider -->
<div class="container">
  <div class="slider">
    <div class="owl-carousel owl-one owl-theme">
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

      // Fetch data from the 'config' table where menu is 'slide'
      $sql = "SELECT id, value FROM config WHERE menu = 'slide'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="item">';
          echo '<div class="slider-img">';
          echo '<img src="' . $row["value"] . '" alt="" width="50%" />';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<p>No slides available</p>';
      }

      $conn->close();
      ?>
    </div>
  </div>
</div>

<!-- /slider -->