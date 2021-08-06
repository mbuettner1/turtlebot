<?php

$servername = "localhost";
$dbusername = "turtogroup";
$dbpassword = "test123";
$dbName = "turto";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$temp = $_GET["temp"];
$humidity = $_GET["humidity"];

$query = "INSERT INTO dht11 (temp,humidity) VALUES ('$temp','$humidity')";
$resulted = mysqli_query($conn, $query);
