

<?php
session_start();
// error_reporting(0);

// $con=mysqli_connect("localhost", "vuuniversity", "^&*GuYtJH&*49R&^", "mros");
$con = mysqli_connect("localhost", "root", "12345", "mros");
if (mysqli_connect_errno()) {
  echo "Connection Fail" . mysqli_connect_error();
}

// $base_link=$base_link."";
$base_link = "http://localhost/dynamic/";


//used for single signon
$tenant = "common";
$client_id = "97cd850f-5e45-4d10-8f81-5410067d56de";
$client_secret = "41Y8Q~jyYTxjLnKwubR_M4tHjPL.eI1Ahh9yQcEk";
$callback = "http://localhost/mros/dynamic/login.php";
$scopes = ["User.Read"];


?>
