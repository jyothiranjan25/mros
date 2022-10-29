<?php
include('../includes/dbconnection.php');

$emp_id = $_GET['emp_id'];
$joining_date = $_GET['joining_date'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('includes/html_header.php');
  ?>
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
              <h2>Assets Report for Employee ID: <?php echo $emp_id; ?></h2>
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

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>SNo.</th>
                          <th>Asset Name</th>
                          <th>Asset ID</th>
                          <th>Request Date</th>
                          <th>Assigned Date</th>
                          <th>Department</th>
                          <th>Status</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php



                        $offerletter_query = mysqli_query($con, "SELECT * FROM `assets` WHERE `emp_id` = '$emp_id'");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($offerletter_query)) {
                          if ($row['status'] == 0) {
                            $confirmed = "Assigned";
                          } elseif ($row['status'] == 1) {
                            $confirmed = "Cofirmed";
                          } else {
                            $confirmed = "No Action Taken Yet";
                          }
                        ?>

                          <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($row['asset_name']); ?></td>
                            <td><?php echo htmlentities($row['asset_id']); ?></td>
                            <td><?php echo htmlentities(date("d-M-Y", strtotime($row['request_date']))); ?></td>
                            <td><?php echo htmlentities(date("d-M-Y", strtotime($row['assigned_date']))); ?></td>
                            <td><?php echo htmlentities($row['dept']); ?></td>
                            <td><?php echo htmlentities($confirmed); ?></td>

                          </tr>

                        <?php $cnt = $cnt + 1;
                        } ?>
                      </tbody>


                    </table>
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