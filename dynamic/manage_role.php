<?php
include('../includes/dbconnection.php');
$page = str_replace(" ", "_", $_GET['page']);
$table = strtolower($page . "_role");
$total_roles = "";
$email = $_SESSION['email'];

$entity_id = $_GET['id'];

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
        <div class="title_left">
          <h3>Manage Roles: <span style="color:black"> <?= strtoupper(str_replace("_", " ", $page)); ?> </span> </h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">



        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">

            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">

                    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                      <thead>
                        <tr>
                          <th>SNo.</th>
                          <th>Role</th>
                          <th>Authority</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $select_query = mysqli_query($con, "SELECT * FROM  `role` WHERE `entity_id`='$entity_id' ");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($select_query)) {
                        ?>
                          <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($row['name']); ?></td>
                            <?php
                            $name = $row['name'];
                            if ($row['generate_olr'] === '1') {
                              $total_roles = $total_roles . "Generate Offer Letter; ";
                            }
                            if ($row['accept_reject_olr'] === '1') {
                              $total_roles = $total_roles . "Accept/Reject Offer Letter; ";
                            }
                            if ($row['approve_olr'] === '1') {
                              $total_roles = $total_roles . "Approve Offer Letter; ";
                            }
                            if ($row['olr_sent_to_cand'] === '1') {
                              $total_roles = $total_roles . "Offer Letter Sent to candidate; ";
                            }
                            if ($row['view_olr'] === '1') {
                              $total_roles = $total_roles . "View Offer Letter; ";
                            }
                            if ($row['accounts'] === '1') {
                              $total_roles = $total_roles . "Manage Accounts; ";
                            }
                            if ($row['super_admin'] === '1') {
                              $total_roles = $total_roles . "Super Admin; ";
                            }
                            if ($row['new_emp'] === '1') {
                              $total_roles = $total_roles . "New Employee; ";
                            }
                            if ($row['IT'] === '1') {
                              $total_roles = $total_roles . "IT Sector; ";
                            }
                            if ($row['asset_req_manage'] === '1') {
                              $total_roles = $total_roles . "Asset Managment; ";
                            }

                            ?>
                            <td><?php echo htmlentities($total_roles); ?></td>
                            <?php $total_roles = ""; ?>
                            <td>
                              <a href="edit_role.php?name=<?php echo htmlentities($row['name']); ?>&page=<?php echo htmlentities($page); ?>&id=<?php echo $entity_id ?>" title="edit role" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                            </td>
                          </tr>
                        <?php
                          $cnt++;
                        }
                        ?>
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