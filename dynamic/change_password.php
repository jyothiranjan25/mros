<?php

include('../includes/dbconnection.php');

$entity = $_SESSION['entity'];
$password = $_SESSION['password'];
// $id = $_SESSION['id'];
// if (!$id) {
//   echo "<script>window.location.href='login.php';</script>";
// }

$entity_table = $entity . "_emp";

if (isset($_POST['submit'])) {



  $email =  $_POST['email'];
  $old_password =  md5($_POST['old']);
  $passwordz =  md5($_POST['password']);
  if ($password == $old_password) {

    $upd = mysqli_query($con, "UPDATE `$entity_table`  SET password='$passwordz' WHERE email = '$email'");

    if ($upd) {
      echo "<script> alert('Updated Successfully!');</script>";
      echo "<script>window.location.href='index.php';</script>";
    } else {
      $error = "----------------------------------------------------------->Error Description: " . mysqli_error($con);
      echo $error;
      echo "<script> alert('Something Gone Wrong!');</script>";
    }
  } else {
    echo "<script> alert('Entered Wrong Old Password, Please try again!');</script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <link href="../dist/images/fav.png" rel="shortcut icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Update Password </title>
  <script src=" https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <link href="../build/css/rahul.css" rel="stylesheet">
  <style>
    p {
      margin-top: 50%;
      margin-left: 70%;
      width: 717px;
      display: inline-block;
      border-top: 4px double rgba(42, 63, 84, 0.5);
      border-bottom: 4px double rgba(42, 63, 84, 0.5);
    }

    p span {
      margin-left: 140px;
      font: 700 4em/1 "Oswald", sans-serif;
      letter-spacing: 0em;
      padding: .25em 0 .325em;
      display: block;
      text-shadow: 0 0 80px rgba(42, 63, 84, 1);
      background: url(images/text_back.jpg) repeat-y;
      background-clip: text;

      -webkit-background-clip: text;
      color: transparent;
      animation: anim 10s linear infinite;
      -webkit-animation: anim 10s linear infinite;
      -webkit-transform: translate(0, 0, 0);
      transform: translate(0, 0, 0);
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
    }

    @keyframes anim {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 50% 50%;
      }

      100% {
        background-position: 100% 50%;
      }
    }

    .site_title {
      overflow: inherit;
    }

    .nav_title {
      height: 198px;
      margin-top: -59px;
    }

    input.checkbox {
      width: 18px;
      height: 18px;
    }

    label {
      font-size: large;
    }
  </style>

</head>

<body class="nav-md">
  <?php
  include('includes/leftbar.php');
  ?>
  <?php
  include('includes/topbar.php');
  ?>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Update Password</h3>
        </div>


      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">

            <div class="x_content">
              <br />
              <form name="add_name" id="add_name" data-parsley-validate class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">


                <div class="row">
                  <div class="col-md-6 col-sm-3 ">
                    <label for="first-name"><b> Name :</b>
                    </label>
                    <div class="">
                      <input required type="text" name="name" class="form-control" placeholder="Candidate Name" value="<?php echo $username ?>" autocomplete="off" disabled>

                    </div>

                  </div>

                </div>
                <br>
                <div class="row">
                  <div class="col-md-6 col-sm-3 ">
                    <label for="first-name"><b>Username :</b>
                    </label>
                    <div class="">
                      <input required type="text" name="email" class="form-control" value="<?php echo $email ?>" disabled>

                    </div>

                  </div>

                </div>
                <br>
                <div class="row">
                  <div class="col-md-6 col-sm-3 ">
                    <label for="first-name"><b>Old Password :</b>
                    </label>
                    <div class="">
                      <input required id="old" type="text" name="old" onmouseover="this.type='text'" onmouseout="this.type='password'" class="form-control" placeholder="enter old password" autocomplete="off">
                    </div>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6 col-sm-3 ">
                    <label for="first-name"><b>New Password :</b>
                    </label>
                    <div class="">
                      <input required id="new" type="text" name="new" onmouseover="this.type='text'" onmouseout="this.type='password'" class="form-control" placeholder="new password" autocomplete="off">
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6 col-sm-3">
                    <label for="first-name"><b>Confirm Password :</b>
                    </label>
                    <div class="">
                      <input required id="confirm" type="text" name="password" onmouseover="this.type='text'" onmouseout="this.type='password'" onkeyup="verifyPassword()" class="form-control" placeholder="confirm password" autocomplete="off">
                      <span id="message" style="color:red"> </span>
                    </div>
                  </div>
                </div>
                <br>






                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-5">



                    <button id="submit" name="submit" type="submit" class="btn btn-warning" disabled>UPDATE</button>

                  </div>
                </div>

              </form>
              <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  </div>
  </div>
  <script type="text/javascript">
    function verifyPassword() {
      var old = document.getElementById("old").value;
      var newPassword = document.getElementById("new").value;
      var confirmPassword = document.getElementById("confirm").value;
      if (confirmPassword == "") {
        document.getElementById("message").innerHTML = "Please confirm the password!";
        message.style.color = "red";
        document.getElementById("submit").disabled = true;
      } else if (confirmPassword != newPassword) {
        document.getElementById("message").innerHTML = "New Password & Confirm Password do not match!";
        message.style.color = "red";
        document.getElementById("submit").disabled = true;
      } else if (confirmPassword == newPassword) {
        document.getElementById("message").innerHTML = "New Password & Confirm Password matched!";
        message.style.color = "green";
        document.getElementById("submit").disabled = false;
      } else if (confirmPassword != "") {
        document.getElementById("message").innerHTML = "";
      }

    }
  </script>
  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>