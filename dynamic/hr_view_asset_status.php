<?php
include('../includes/dbconnection.php');

$emp_id = $_GET['emp_id'];

if (isset($_POST['submit'])) {

  $number = count($_POST["value"]);
  for ($i = 0; $i < $number; $i++) {
    if (trim($_POST["value"][$i] != '')) {
      $s = 0;
      $d = "";
      $sql = "DELETE FROM `assets` WHERE `sn` = '" . mysqli_real_escape_string($con, $_POST["value"][$i]) . "'";
      mysqli_query($con, $sql);
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

  <title>MROS </title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->

  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
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
  include('includes/leftbar.php'); ?>
  <?php
  include('includes/topbar.php'); ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">



      </div>

      <div class="clearfix"></div>

      <div class="row">



        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h3>New Employees Asset List<small></small></h3>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>



              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <form method="POST">
                      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>

                            <th>S.No</th>
                            <th>Asset Name</th>
                            <th>Department</th>
                            <th>Entity</th>
                            <th>Request Date</th>
                            <th>Assigned Date</th>
                            <th>Status</th>
                            <th>Delete</th>
                          </tr>
                        </thead>


                        <tbody id="databody">
                          <?php
                          $offerletter_query = mysqli_query($con, "SELECT * FROM `assets` ORDER BY `dept`");
                          $cnt = 1;
                          while ($row = mysqli_fetch_array($offerletter_query)) {
                            $assigned_date = $row['assigned_date'];
                            if ($row['status'] == 0) {
                              $result = "Not Assigned";
                              $assigned_date = "Not Available";
                            } elseif ($row['status'] == 1) {
                              $result = "Assigned, yet Candidate confirmation pending";
                            } elseif ($row['status'] == 2) {
                              $result = "Candidate confirmation received";
                            }
                          ?>
                            <tr>
                              <td><?php echo $cnt; ?></td>
                              <td><?php echo htmlentities($row['asset_name']); ?></td>
                              <td><?php echo htmlentities($row['dept']); ?></td>
                              <td><?php echo htmlentities($row['entity']); ?></td>
                              <td><?php echo htmlentities($row['request_date']); ?></td>
                              <td><?php echo $assigned_date; ?></td>
                              <td><?php echo $result; ?></td>
                              <td><input type="checkbox" value="<?php echo $row['sn']; ?>" name="value[]"></td>
                            </tr>
                          <?php $cnt = $cnt + 1;
                          } ?>
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
    </div>
  </div>
  <!-- /page content -->

  <!-- footer content -->
  <footer>
    <div class="pull-right">
      <a href="#"> Go to Top <span class="fa fa-chevron-up"> </span></a>
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
<html>

<head>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <meta name="Robots" content="NOINDEX " />
</head>

<body></body>
<script type="text/javascript">
  var gearPage = document.getElementById('GearPage');
  if (null != gearPage) {
    gearPage.parentNode.removeChild(gearPage);
    document.title = "Error";
  }
</script>

</html>