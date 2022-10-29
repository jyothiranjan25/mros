<?php
include('../includes/dbconnection.php');
$get_role_name = $_GET['name'];
$page = $_GET['page'];
$entity_id = $_GET['id'];



$role_page = strtolower("Role");
$select_query = mysqli_query($con, "SELECT * FROM  `$role_page` WHERE `name`='$get_role_name'");

while ($row = mysqli_fetch_array($select_query)) {

  $edit_generate_olr = $row['generate_olr'];

  $edit_accept_reject_olr = $row['accept_reject_olr'];

  $edit_approve_olr = $row['approve_olr'];

  $edit_olr_sent_to_cand = $row['olr_sent_to_cand'];

  $edit_view_olr = $row['view_olr'];

  $edit_accounts = $row['accounts'];

  $edit_super_admin = $row['super_admin'];

  $edit_new_emp = $row['new_emp'];

  $edit_IT = $row['IT'];

  $edit_asset_manage = $row['asset_req_manage'];
}

if (isset($_POST['submit'])) {

  $edit_authority1 = $_POST['authority1'];
  if (!$edit_authority1) {
    $edit_authority1 = 0;
  }
  //echo "<script>alert('".$edit_authority1."');</script>";

  $edit_authority2 = $_POST['authority2'];
  if (!$edit_authority2) {
    $edit_authority2 = 0;
  }


  $edit_authority3 = $_POST['authority3'];
  if (!$edit_authority3) {
    $edit_authority3 = 0;
  }


  $edit_authority4 = $_POST['authority4'];
  if (!$edit_authority4) {
    $edit_authority4 = 0;
  }


  $edit_authority5 = $_POST['authority5'];
  if (!$edit_authority5) {
    $edit_authority5 = 0;
  }


  $edit_authority6 = $_POST['authority6'];
  if (!$edit_authority6) {
    $edit_authority6 = 0;
  }


  $edit_authority7 = $_POST['authority7'];
  if (!$edit_authority7) {
    $edit_authority7 = 0;
  }


  $edit_authority8 = $_POST['authority8'];
  if (!$edit_authority8) {
    $edit_authority8 = 0;
  }


  $edit_authority9 = $_POST['authority9'];
  if (!$edit_authority9) {
    $edit_authority9 = 0;
  }


  $edit_authority10 = $_POST['authority10'];
  if (!$edit_authority10) {
    $edit_authority10 = 0;
  }


  $role_edit_query1 = mysqli_query($con, "UPDATE `$role_page` SET `generate_olr`='$edit_authority1' WHERE `name`='$get_role_name'");
  $role_edit_query2 = mysqli_query($con, "UPDATE `$role_page` SET `accept_reject_olr`='$edit_authority2' WHERE `name`='$get_role_name'");
  $role_edit_query3 = mysqli_query($con, "UPDATE `$role_page` SET `approve_olr`='$edit_authority3' WHERE `name`='$get_role_name'");
  $role_edit_query4 = mysqli_query($con, "UPDATE `$role_page` SET `olr_sent_to_cand`='$edit_authority4' WHERE `name`='$get_role_name'");
  $role_edit_query5 = mysqli_query($con, "UPDATE `$role_page` SET `view_olr`='$edit_authority5' WHERE `name`='$get_role_name'");
  $role_edit_query6 = mysqli_query($con, "UPDATE `$role_page` SET `accounts`='$edit_authority6' WHERE `name`='$get_role_name'");
  $role_edit_query7 = mysqli_query($con, "UPDATE `$role_page` SET `asset_req_manage`='$edit_authority7' WHERE `name`='$get_role_name'");
  $role_edit_query8 = mysqli_query($con, "UPDATE `$role_page` SET `super_admin`='$edit_authority8' WHERE `name`='$get_role_name'");
  $role_edit_query9 = mysqli_query($con, "UPDATE `$role_page` SET `new_emp`='$edit_authority9' WHERE `name`='$get_role_name'");
  $role_edit_query10 = mysqli_query($con, "UPDATE `$role_page` SET `IT`='$edit_authority10' WHERE `name`='$get_role_name'");
  if ($role_edit_query1 && $role_edit_query2 && $role_edit_query3 && $role_edit_query4 && $role_edit_query5 && $role_edit_query6 && $role_edit_query7 && $role_edit_query8 && $role_edit_query9 && $role_edit_query10) {
    echo "<script>alert('" . $get_role_name . " Role is updated');</script>";
    echo "<script>window.location.href='manage_role.php?page=$page&id=$entity_id';</script>";
  } else {
    echo "<script>alert('" . $edit_authority1 . "');</script>";
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
  ?>
  <?php
  include('includes/topbar.php');
  ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Role for <?php echo $get_role_name;  ?></h3>
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
                    <input readonly name="rolename" type="text" id="first-name" required="required" class="form-control" value="<?php echo $get_role_name; ?>">
                  </div>
                </div>
                <br>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                  </label>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority1" name="authority1" value="1" <?php if ($edit_generate_olr == 1) echo "Checked"; ?>>
                    <label for="authority1"> Generate Offer Letter Request</label><br>
                  </div>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority2" name="authority2" value="1" <?php if ($edit_accept_reject_olr == 1) echo "Checked"; ?>>
                    <label for="authority2"> Accept/Reject Offer Letter Request</label><br>
                  </div>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority3" name="authority3" value="1" <?php if ($edit_approve_olr == 1) echo "Checked"; ?>>
                    <label for="authority3"> Approve Offer Letter Request</label><br>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                  </label>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority4" name="authority4" value="1" <?php if ($edit_olr_sent_to_cand == 1) echo "Checked"; ?>>
                    <label for="authority4"> Sent Offer Letter Request To Candidate</label><br>
                  </div>

                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority5" name="authority5" value="1" <?php if ($edit_view_olr == 1) echo "Checked"; ?>>
                    <label for="authority5"> View Offer Letter</label><br>
                  </div>

                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority6" name="authority6" value="1" <?php if ($edit_accounts == 1)  echo "Checked"; ?>>
                    <label for="authority6">Accounts</label><br>
                  </div>

                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                  </label>


                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority7" name="authority7" value="1" <?php if ($edit_asset_manage == 1) echo "Checked"; ?>>
                    <label for="authority7"> Manage Assets</label><br>
                  </div>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority8" name="authority8" value="1" <?php if ($edit_super_admin == 1) echo "Checked"; ?>>
                    <label for="authority8"> Super Admin</label><br>
                  </div>

                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority9" name="authority9" value="1" <?php if ($edit_new_emp == 1) echo "Checked"; ?>>
                    <label for="authority9"> New Employee</label><br>
                  </div>
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                  </label>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority10" name="authority10" value="1" <?php if ($edit_IT == 1) echo "Checked"; ?>>
                    <label for="authority10">IT</label><br>
                  </div>

                  <!-- <div class="col-md-2 col-sm-3 ">
                    <input type="" id="entity_id" name="entity_id" value="<?= $entity_id ?>">
                    <label for=" authority10">entity</label><br>
                  </div> -->

                </div>






                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-5">

                    <button name="submit" type="submit" class="btn btn-warning">Update</button>
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