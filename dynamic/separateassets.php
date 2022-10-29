<?php
include('../includes/dbconnection.php');


$emp_id = $_GET['emp_id'];
$joining_date = $_GET['joining_date'];


?>
<?php

if (isset($_POST['submit'])) {

  $number = count($_POST["value"]);
  for ($i = 0; $i < $number; $i++) {
    if (trim($_POST["value"][$i] != '')) {
      $sql = "DELETE FROM `assets` WHERE `asset_id` = '" . mysqli_real_escape_string($con, $_POST["value"][$i]) . "'";
      mysqli_query($con, $sql);
    }
  }
  $flag = 1;
  $query = mysqli_query($con, "SELECT `status` FROM `assets` WHERE `emp_id`='$emp_id' ");

  $flag = mysqli_num_rows($query);

  if ($flag == 0) {
    $query = mysqli_query($con, "SELECT `type` FROM `separation` WHERE `empid`='$emp_id' ");
    $row = mysqli_fetch_array($query);
    if ($row['type'] == "Resignation") {
      $message_query = mysqli_query($con, "Select * from `employee_details` WHERE emp_id='$emp_id'");
      $message_data = mysqli_fetch_array($message_query);
      $subject = "ASSETS RECIEVED DURING RESIGNATION";
      $title = "Assets is recieved by departments";
      $message = "<h3>Asset Request</h3><br><p>Dear.</p><br><p>This is to inform you that all assets which has been assigned to ," . $message_data['name'] . ",is now recieved from different department</p>";

      $from = $_SESSION['email'];
      $noti_query = mysqli_query($con, "INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");


      $query = mysqli_query($con, "UPDATE `employee_details` SET `status` = '5' WHERE `emp_id`='$emp_id' ");
      echo "<script>alert('Resignation Checklist Complete.')</script>";
      echo "<script>window.location.href='separateEMPassets.php';</script>";
    } elseif ($row['type'] == "Termination") {

      $message_query = mysqli_query($con, "Select * from `employee_details` WHERE emp_id='$emp_id'");
      $message_data = mysqli_fetch_array($message_query);
      $subject = "ASSETS RECIEVED DURING TERMINATION";
      $title = "Assets is recieved by departments";
      $message = "<h3>Asset Request</h3><br><p>Dear.</p><br><p>This is to inform you that all assets which has been assigned to ," . $message_data['name'] . ",is now recieved from different department</p>";

      $from = $_SESSION['email'];
      $noti_query = mysqli_query($con, "INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");



      $query = mysqli_query($con, "UPDATE `employee_details` SET `status` = '6' WHERE `emp_id`='$emp_id' ");
      echo "<script>alert('Termination Checklist Complete.')</script>";
      echo "<script>window.location.href='separateEMPassets.php';</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/ifim_logo.jpg" type="image/ico" />
  <title>MROS | </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <link href="../build/css/input.css" rel="stylesheet">


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <style>
    .site_title {
      overflow: inherit;
    }

    .nav_title {
      height: 198px;
      margin-top: -59px;
    }
  </style>
</head>

<body class="nav-md">
  <?php
  include('includes/leftbar.php');
  include('includes/topbar.php');
  ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit assets for EMPLOYEE ID: <?php echo $emp_id;  ?> </h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">

              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>


              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <!-- <form action="" method="post" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input name="depname" type="text" id="first-name" required="required" class="form-control ">
											</div>
										</div>


										


									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button name="submit" type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form> -->



              <div class="table-responsive">
                <form method="post">
                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>SN.</th>
                        <th>ASSET NAME</th>
                        <th>ASSET ID</th>
                        <th>ASSIGNED DATE</th>
                        <th>REMOVE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count = 1;
                      $dep = $_SESSION['dep'];
                      $query = mysqli_query($con, "SELECT * FROM `assets` WHERE `dept`='$dep' AND `emp_id`='$emp_id' ");
                      while ($row = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><input type="text" name="name[]" readonly value="<?php echo $row['asset_name']; ?>" class="form-control" />
                          </td>
                          <td><input type="text" name="id[]" value="<?php echo $row['asset_id']; ?>" class="form-control" readonly /></td>
                          <td><input type="text" name="date[]" value="<?php echo $row['assigned_date']; ?>" class="form-control" readonly /></td>
                          <td><input type="checkbox" value="<?php echo $row['asset_id']; ?>" name="value[]"></td>
                        </tr>
                      <?php
                        $count++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <br>
                  <br>
                  <input type="submit" name="submit" class="btn btn-success" />
                </form>

              </div>

            </div>
          </div>
        </div>
      </div>





    </div>
  </div>
  <!-- /page content -->

  <!-- footer content -->
  <footer>
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>


  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="../vendors/google-code-prettify/src/prettify.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>