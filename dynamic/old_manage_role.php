<?php
include('../includes/dbconnection.php');

$page = $_GET['page'];
$role_page = $page . " Role";
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $name = $_POST['rolename'];
  $authority1 = $_POST['authority1'];
  $authority2 = $_POST['authority2'];
  $authority3 = $_POST['authority3'];
  $authority4 = $_POST['authority4'];
  $authority5 = $_POST['authority5'];
  $authority6 = $_POST['authority6'];
  $authority7 = $_POST['authority7'];
  $authority8 = $_POST['authority8'];
  $authority9 = $_POST['authority9'];
  $insert = mysqli_query($con, "UPDATE `$role_page` SET `name`='$name',`generate_olr`='$authority1',
         `accept_reject_olr`='$authority2',`approve_olr`='$authority3',`olr_sent_to_cand`='$authority4',
         `view_olr`='$authority5',`edit_olr`='$authority6',`asset_req_manage`='$authority7',`super_admin`='$authority8',
         `new_emp`='$authority9' WHERE `id`='$id'");

  echo "<script>alert('" . $name . " Role is updated');</script>";
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
          <h3>Manage Roles of <?php echo $page;  ?> </h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <?php

      $query = mysqli_query($con, "Select * from `$role_page`");
      while ($row = mysqli_fetch_array($query)) {
      ?>

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
                  <input name="id" type="text" id="first-name" style="display:none;" value="<?php echo $row['id']; ?>">
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input name="rolename" type="text" id="first-name" required="required" class="form-control " value="<?php echo $row['name']; ?>">
                    </div>
                  </div>
                  <br>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                    </label>
                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority1" name="authority1" value="1" <?php
                                                                                          if ($row['generate_olr'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority1"> Generate Offer Letter Request</label><br>
                    </div>


                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority2" name="authority2" value="1" <?php
                                                                                          if ($row['accept_reject_olr'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority2"> Accept/Reject Offer Letter Request</label><br>
                    </div>


                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority3" name="authority3" value="1" <?php
                                                                                          if ($row['approve_olr'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority3"> Approve Offer Letter Request</label><br>
                    </div>


                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                    </label>
                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority4" name="authority4" value="1" <?php
                                                                                          if ($row['olr_sent_to_cand'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority4"> Sent Offer Letter Request To Candidate</label><br>
                    </div>

                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority5" name="authority5" value="1" <?php
                                                                                          if ($row['view_olr'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority5"> View Offer Letter</label><br>
                    </div>

                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority6" name="authority6" value="1" <?php
                                                                                          if ($row['accounts'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority6">Accounts</label><br>
                    </div>

                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                    </label>


                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority7" name="authority7" value="1" <?php
                                                                                          if ($row['asset_req_manage'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority7"> Manage Assets</label><br>
                    </div>
                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority8" name="authority8" value="1" <?php
                                                                                          if ($row['super_admin'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority8"> Super Admin</label><br>
                    </div>
                    <div class="col-md-2 col-sm-3 ">
                      <input type="checkbox" id="authority9" name="authority9" value="1" <?php
                                                                                          if ($row['new_emp'] == 1) {
                                                                                            echo "Checked";
                                                                                          }
                                                                                          ?>>
                      <label for="authority9"> New Employee</label><br>
                    </div>

                  </div>






                  <div class="ln_solid"></div>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">

                      <button name="submit" type="submit" class="btn btn-success">Update</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

      <?php
      }
      ?>









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