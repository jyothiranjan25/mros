<?php
include('../includes/dbconnection.php');
$emp_id = $_GET['empid'];
$page = $_GET['page'];
// entity_id here
$entity = $_GET['id'];
// entity_id end

// $entity_name = $_GET['entity_name'];
$dep_page = strtolower($page . "_Dep");
$role_page = strtolower($page . "_Role");
$table = strtolower($page . "_Emp");




if (isset($_POST['submit'])) {


  // $role=$_POST['roles'];
  $name = $_POST['username'];
  $mail = $_POST['email'];
  $emp_id = $_POST['emp_id'];
  $role = $_POST['role'];
  $dep = $_POST['dep'];
  $entity_id = $_POST['entity_id'];
  // $check=mysqli_query($con,"Select * from $roles");

  $insert = mysqli_query($con, "INSERT INTO `employee` (`name`, `email`,`emp_id`,`role`,`dep`,`entity_id` ) VALUES ('$name', '$mail','$emp_id','$role','$dep','$entity_id')");
  if ($insert) {
    echo "<script>alert('" . $name . " is now a " . $role . " of " . $dep . " department of " . $entity_id . "');</script>";
  }
  $select = mysqli_query($con, "SELECT * from `employee` WHERE name='$name' and role='$role' and entity_id='$entity_id'");
  $row_select = mysqli_fetch_array($select);
  $id = $row_select['emp_id'];
  // $assets = mysqli_query($con, "Select * from assets");
  // while ($row = mysqli_fetch_array($assets)) {

  //   $asset_name = $row['asset_name'];
  //   $asset_query = mysqli_query($con, "Select `$asset_name` from `position` WHERE name='$dep'");
  //   $asset_val = mysqli_fetch_array($asset_query);
  //   if ($asset_val[$asset_name] == '1') {
  //     $status = 1;
  //     $insert = mysqli_query($con, "INSERT INTO `asset_report` (`emp_id`, `name`,`job_title`,`asset`,`status`) VALUES ('$id','$name','$dep','$asset_name','$status')");
  //   }
  // }
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

  <style>
    .site_title {
      overflow: inherit;
    }

    .nav_title {
      height: 198px;
      margin-top: -59px;
    }
  </style>

  <?php
  include('includes/leftbar.php');
  ?>
  <?php
  include('includes/html_header.php');
  include('includes/topbar.php');
  ?>

</head>

<body class="nav-md">
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Add Masters of <?php echo $page;  ?></h3>
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
              <form action="" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">


                    <?php
                    $select = mysqli_query($con, "SELECT * from `employee` WHERE `emp_id`='$emp_id'");

                    $row = mysqli_fetch_array($select);
                    $id = $row['emp_id'];

                    ?>
                    <input name="username" type="text" id="first-name" required="required" class="form-control " value="<?php echo $row['name']; ?>" readonly>

                  </div>
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email-id <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="email" id="last-name" name="email" required="required" class="form-control" value="<?php echo $row['email']; ?>" readonly>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Employee Id <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="emp-id" name="emp_id" required="required" class="form-control" value="<?php echo $row['emp_id']; ?>" readonly>
                  </div>
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Roles<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <select name="role" id="roles" title="Select a Role" class="form-control" required="">
                      <?php

                      $entity_query = mysqli_query($con, "SELECT * FROM `role` WHERE entity_id=$entity_id ");
                      while ($row = mysqli_fetch_array($entity_query)) {
                      ?>
                        <option required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
                      <?php
                      }
                      ?>
                    </select>


                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Department <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">


                    <select name="dep" id="dep" title="Select Department" class="form-control" required="">

                      <?php

                      $entity_query = mysqli_query($con, "SELECT * FROM `department`WHERE entity_id=$entity_id");
                      while ($row = mysqli_fetch_array($entity_query)) {
                      ?>
                        <option required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">entity<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <select name="entity_id" id="entity_id" title="Select entity" class="form-control" required="">
                      <?php
                      $entity_query = mysqli_query($con, "SELECT * FROM `entity` WHERE id='$entity'");
                      while ($row = mysqli_fetch_array($entity_query)) {
                      ?>
                        <option required="required" value="<?php echo  $row['id']; ?>"><?php echo $row['name']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <input type="hidden" value="<?php echo $entity ?>">

                <!-- <div class="col-md-6 col-sm-6 ">
                                        <label  for="number"><b> Replacement to</b><span class="required">*</span>
                                        </label> 
                                      <select  name="replaceTo" id="replaceTo" title="Select an Entity" class="form-control" onchange='CheckColors(this.value);' required="">
                                        <option value="New Employee">New Employee</option> 
                                        <option value="others">Others</option>
                                            </select>
                                            <input type="text" class="form-control" name="replacement" id="replacement" value="New Employee" style='display:none;' required="" />
                      </div> -->

                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </form>
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
      <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>
  <script type="text/javascript">
    function CheckColors(val) {
      var element = document.getElementById('dep');
      if (val == 'Cordinator' || val == 'Program_Head') {
        element.value = '';
        element.style.display = 'block';

      } else {
        element.value = val;
        element.style.display = 'none';

      }
    }
  </script>

  <?php
  include('includes/html_footer.php');
  ?>



</body>

</html>