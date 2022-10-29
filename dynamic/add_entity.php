<?php
include('../includes/dbconnection.php');


if (isset($_POST['submit'])) {

  $name = $_POST['entityname'];
  $name1 = $_POST['name'];

  $sql = mysqli_query($con, "SELECT `name` FROM `entity` WHERE `entity_name`='$name'");
  $check = mysqli_num_rows($sql);
  $filez = mysqli_fetch_array($sql);

  if (!($check > 0)) {
    $insert = mysqli_query($con, "INSERT INTO `entity` (entity_name,name) 
         VALUES ('$name','$name1')");
  } else {
    echo "<script>alert('" . $name . " is an entity, please add with another name!');</script>";
    header('location: add_entity.php');
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
  <title>MROS | Add Entity</title>

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
          <h3>Add Entity </h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">

              <ul class="nav navbar-right panel_toolbox">
                <br> <br>


              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form action="" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">entity code: <span style="color:red">*</span>
                  </label>
                  <div class="col-md-4 col-sm-4 ">
                    <input name="entityname" type="text" required="required" class="form-control" title="Adding entity results in creating tables. You have to add departments, roles, positions, masters, offerletter templates etc., for this particular entity." placeholder="Ex: ifim_college">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Name of the entity: <span style="color:red">*</span>
                  </label>
                  <div class="col-md-4 col-sm-4 ">
                    <input name="name" type="text" required="required" class="form-control" title="Adding entity results in creating tables. You have to add departments, roles, positions, masters, offerletter templates etc., for this particular entity." placeholder="Ex: IFIM College">
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-secondary" type="reset">Reset</button> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                    <button name="submit" type="submit" class="btn btn-primary">Add Entity</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>





    </div>
  </div>

  <footer>

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