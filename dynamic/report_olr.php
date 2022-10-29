<?php
include('../includes/dbconnection.php');


$email = $_SESSION['email'];
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
          <h3>Pending Offer Letter Requests<small></small></h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">



        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Accept OLR </h2>
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

                    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                      <thead>
                        <tr>
                          <th>SNo.</th>
                          <th>Candidate Name</th>
                          <th>Entity Name</th>
                          <th>Joining Date</th>
                          <th>CTC/Annum</th>
                          <th>Position</th>
                          <th>Job Title</th>
                          <th>Replacemet To</th>
                          <th>Reporting To</th>
                          <th>Cordinator Requested</th>
                          <th>Head Response</th>
                          <th>Sent To Candidate </th>
                          <th>Candidate Response </th>
                        </tr>
                      </thead>


                      <tbody>

                        <?php

                        $offerletter_query = mysqli_query($con, "SELECT * FROM offer_letters ");


                        $cnt = 1;
                        while ($row = mysqli_fetch_array($offerletter_query)) {
                        ?>
                          <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($row['cand_name']); ?></td>
                            <td><?php echo htmlentities($row['entity_name']); ?></td>
                            <td><?php echo htmlentities(date("jS-M-Y", strtotime($row['joining_date']))); ?></td>




                            <td><b><?php echo htmlentities(inr_format($row['ctc'], 2)); ?></b></td>
                            <td><?php echo htmlentities($row['pos']); ?></td>
                            <td><?php echo htmlentities($row['job_title']); ?></td>
                            <td><?php echo htmlentities($row['replacement']); ?></td>
                            <td><?php echo htmlentities($row['reporting_to']); ?></td>

                            <td><?php echo htmlentities($row['olr_filled_date']); ?></td>
                            <td><?php echo htmlentities($row['head_response_date']); ?></td>
                            <td><?php echo htmlentities($row['date_sent']); ?></td>
                            <td><?php echo htmlentities($row['cand_response_date']); ?></td>



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
  <?php
  function inr_format($amount)
  {
    $inr = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
    return $inr;
  }
  ?>

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
<!-- <html><head><META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8"><meta name="Robots" content="NOINDEX " /></head><body></body>
                <script type="text/javascript">
                 var gearPage = document.getElementById('GearPage');
                 if(null != gearPage)
                 {
                     gearPage.parentNode.removeChild(gearPage);
                     document.title = "Error";
                 }
                 </script>
                 </html> -->