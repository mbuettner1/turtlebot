<?php
  include_once 'header.php';
 ?>

<script>
  function myFunction() {
    var x = document.getElementById("ip");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>

<div class="temp-humid" id="temp-humid">
  <h1>Welcome Home!</h1>
  <h6>Current Metrics:</h6>
  <?php
      $servername = "localhost";
      $dbusername = "turtogroup";
      $dbpassword = "test123";
      $dbName = "turto";

      $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbName);

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM dht11 ORDER BY dht11.submit_time DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<h4>";
          echo "Temp: ";
          echo $row['temp'];
          echo "°F || Humidity: ";
          echo $row['humidity'];
          echo "%";
          echo "</h4>";
        }
      } else {
        echo "No Data";
      }
      $sql2 = "SELECT * FROM battery ORDER BY battery.submit_time DESC LIMIT 1";
      $result2 = mysqli_query($conn, $sql2);
      $resultCheck2 = mysqli_num_rows($result2);
      if ($resultCheck2 > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
          echo "<h4>";
          echo "Percentage: ";
          echo $row2['percentage'];
          echo "% || Status Connected: ";
          echo $row2['plugged'];
          echo "</h4>";
        }
      } else {
        echo "No Data";
      }

      echo "For user protection, we want to ensure that all sensitive data is secure and protected. When viewing the live camera and utilizing object detection,
      ensure that your device accessing this website and the turtle bot are both connected to the same Wi-Fi as we allow secure video access only through the same
      IP address to limit mal-intent use<br> for live feed and object detection.<br> The IP address you are currently connected to is: ";
      echo '<button class="btn btn-primary" style="background:none;color: black;width: 80px;" onclick="myFunction()">Show IP</button><br>

            <div id="ip" style="display:none">';
      echo          gethostbyname(trim(`hostname`));;
      echo  '</div>';
      $ip = gethostbyname(trim(`hostname`));;
      echo "<a href='http://";
      echo '192.168.1.77';
      echo ":5000/' class='btn btn-primary' name='viewCam'>Initiate Live Feed</a>";
   ?>

</div>

 <?php
   include_once 'footer.php'
 ?>
