<?php
include('../includes/dbconnection.php');
error_reporting(0);
$page = strtolower($_GET['page']);
$role_page = strtolower($page . " Role");
if (isset($_POST['submit'])) {
  $val = 0;
  $name = $_POST['rolename'];
  $entity_query = mysqli_query($con, "Select * from `$role_page`");
  while ($row = mysqli_fetch_array($entity_query)) {
    if ($row['name'] == $name) {
      $val = 1;
    }
  }
  if ($val == 0) {
    $name = strtolower($_POST['rolename']);
    $authority1 = $_POST['authority1'] == 1 ? "1" : "0";
    $authority2 = $_POST['authority2'] == 1 ? "1" : "0";
    $authority3 = $_POST['authority3'] == 1 ? "1" : "0";
    $authority4 = $_POST['authority4'] == 1 ? "1" : "0";
    $authority5 = $_POST['authority5'] == 1 ? "1" : "0";
    $authority6 = $_POST['authority6'] == 1 ? "1" : "0";
    $authority7 = $_POST['authority7'] == 1 ? "1" : "0";
    $authority8 = $_POST['authority8'] == 1 ? "1" : "0";
    $authority9 = $_POST['authority9'] == 1 ? "1" : "0";
    $authority10 = $_POST['authority10'] == 1 ? "1" : "0";
    $insert = mysqli_query($con, "INSERT INTO `$role_page` (`name`,`generate_olr`,`accept_reject_olr`,`approve_olr`,`olr_sent_to_cand`,`view_olr`,`accounts`,`asset_req_manage`,`super_admin`,`new_emp`,`IT`) 
          VALUES ('$name', '$authority1', '$authority2','$authority3','$authority4','$authority5','$authority6','$authority7','$authority8','$authority9','$authority10')");
    if ($insert) {
      echo "<script>alert('" . $name . " is a role');</script>";
    } else {
      echo "<script>alert('" . mysqli_error($con) . "');</script>";
    }
  } else {
    echo "<script>alert('" . $name . " is already a role');</script>";
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
          <h3>Add Roles of <?php echo $page;  ?> </h3>
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
                    <input name="rolename" type="text" id="first-name" required="required" class="form-control" placeholder="ex: Coordinator, ADO/SO Head etc">
                  </div>
                </div>
                <br>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                  </label>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority1" name="authority1" value="1">
                    <label for="authority1"> Generate Offer Letter Request</label><br>
                  </div>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority5" name="authority5" value="1">
                    <label for="authority5"> View Offer Letter</label><br>
                  </div>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority2" name="authority2" value="1">
                    <label for="authority2"> Accept/Reject Offer Letter Request</label><br>
                  </div>

                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                  </label>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority3" name="authority3" value="1">
                    <label for="authority3"> Approve Offer Letter Request</label><br>
                  </div>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority4" name="authority4" value="1">
                    <label for="authority4"> Sent Offer Letter Request To Candidate</label><br>
                  </div>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority6" name="authority6" value="1">
                    <label for="authority6">Accounts</label><br>
                  </div>

                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                  </label>


                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority7" name="authority7" value="1">
                    <label for="authority7"> Manage Assets</label><br>
                  </div>
                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority8" name="authority8" value="1">
                    <label for="authority8"> Super Admin</label><br>
                  </div>

                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority9" name="authority9" value="1">
                    <label for="authority9"> New Employee</label><br>
                  </div>
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                  </label>


                  <div class="col-md-2 col-sm-3 ">
                    <input type="checkbox" id="authority10" name="authority10" value="1">
                    <label for="authority10">IT</label><br>
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