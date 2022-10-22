<?php
include('../includes/dbconnection.php');
require "vendor/autoload.php";
// error_reporting(0);
session_start();
echo "<script>alert('TEST');</script>";

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;

if ($_SESSION['email'] == "") {

  $auth = new Auth(Session::get("tenant_id"), Session::get("client_id"), Session::get("client_secret"), Session::get("redirect_uri"), Session::get("scopes"));
  $tokens = $auth->getToken($_REQUEST['code']);
  $accessToken = $tokens->access_token;

  $auth->setAccessToken($accessToken);

  $user = new User;

  $name = $user->data->getDisplayName();
  $email = $user->data->getUserPrincipalName();
  $_SESSION['email'] = $email;
  $_SESSION['name'] = $name;
} else {
  $email =   $_SESSION['email'];
  $name = $_SESSION['name'];
}

if ($email) {

  $query_entity = "SELECT `entity_id`,`role` FROM `login` WHERE email='$email'";
  $resultz = mysqli_query($con, $query_entity);
  $rowz = mysqli_fetch_array($resultz);
  $entity_id = $rowz['entity_id'];
  $role = $rowz['role'];

  if ($role) {
    echo "<script>alert('$role ');</script>";
    $query = "SELECT * FROM entity WHERE id='$entity_id' ";
    $results = mysqli_query($con, $query);

    if (mysqli_num_rows($results) > 0) {
      $row = mysqli_fetch_array($results);
      $_SESSION['email'] = $email;
      $_SESSION['entity'] =  str_replace(" ", "_", $row['entity_name']);
      $_SESSION['entity_name'] = $row['entity_name'];
      $_SESSION['role'] = $role;
      $_SESSION['entity_id'] = $entity_id;
      // $_SESSION['dep'] = $row['dep'];
      // $_SESSION['empid'] = $row['emp_id'];
      header('location: index.php');
      // echo "<script>alert('".$_SESSION['success']."');</script>";
    } else {
      echo "<script>alert('No role assigned for $email, Please contact SuperAdmin! ');</script>";
      //  header('location: index.php');
    }
  } else {
    echo "<script>alert('No user access for $email, Please contact SuperAdmin! ');</script>";
    //  header('location: sign.php');
    echo "<script>
                window.location.href='sign.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>MROS | </title>

  <?php
  include('includes/html_header.php');
  ?>

  <style>

  </style>
  <script>
    function selectentity(str) {
      var req = new XMLHttpRequest();
      req.open("get", "login_roles.php?entity=" + str, true);
      req.send();
      req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById("role").innerHTML = req.responseText;
        }
      }
    }
  </script>
  <style>
    .glow {

      box-shadow:
        0 0 20px 10px white,
        0 0 72px 20px white,
        0 0 140px 1px white;
    }

    .fade {

      box-shadow:
        0 0 20px 10px black,
        0 0 72px 20px black,
        0 0 140px 1px black;
    }
  </style>
</head>

<body class="login" style="background-color:#bdc3c7">
  <div>
    <br> <br> <br>

    <div class="login_wrapper glow" style="border-radius:5px; padding:20px;max-width: 500px; margin-top:60px">



      <section class="login_content">
        <br>

        <center>
          <h3 style="color:black"> M R O S </h3>
        </center>
        <br>

        <form action="login_redirect.php" method="post" enctype="multipart/form-data" id="form" data-parsley-validate class="form-horizontal form-label-left">
          <div>
            <input name="name" style="color:black" type="text" class="form-control" title="user name" placeholder="name" required="" value="<?= $name ?>" readonly>
          </div>
          <div>
            <input name="email" style="color:black" type="text" class="form-control" title="email" placeholder="email" required="" value="<?= $email ?>" readonly>

          </div>

          <span style="color:red"> Invalid Login Credentials, Please Contact SuperAdmin </span>
          <br>


          <br>
          <a href="sign.php" class="btn btn-danger submit" style="text-decoration: none;">Sign Out</a>
          <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
    </div>

    <br />


  </div>
  </form>
  </section>
  </div>

  </div>
  </div>

</body>

</html>