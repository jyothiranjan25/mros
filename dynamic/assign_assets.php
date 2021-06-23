<?php
include('../includes/dbconnection.php');
error_reporting(0);
$emp_id = $_GET['emp_id'];


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

        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h3>Assign assets for EMPLOYEE: <?php echo $emp_id;  ?> </h3>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>


              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />



              <form name="add_name" id="add_name" method="post" action="insert_assets.php?emp_id=<?php echo $emp_id; ?>">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dynamic_field datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>SNo.</th>
                        <th>Asset Name</th>

                        <th>Asset ID</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        $dept = $_SESSION['dep'];
                        $s = 0;
                        $cnt = 1;
                        $query = mysqli_query($con, "SELECT * FROM `assets` WHERE `emp_id` = '" . $emp_id . "' AND `dept` = '" . $dept . "' AND `status` = '" . $s . "'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                          <td><?php echo htmlentities($cnt); ?></td>
                          <td><input type="text" name="name[]" class="form-control name_list" value="<?php echo $row['asset_name']; ?>" readonly /></td>
                          <td><input type="text" name="id[]" placeholder="Enter Asset ID " class="form-control name_list" /></td>

                      </tr>
                    <?php $cnt = $cnt + 1;
                        } ?>
                    </tbody>
                  </table>
                  <input type="submit" name="insert" id="submit" class="btn btn-info" value="Submit" />
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