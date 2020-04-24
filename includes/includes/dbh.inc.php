<?php
  $servername = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $DBName = "classic_theatre";

  $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $DBName);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error);
}
