<?php
include('../includes/dbconnection.php');


$email = $_SESSION['email'];
$entity = $_SESSION['entity'];

if (isset($_REQUEST['del'])) {
  $delid = intval($_GET['del']);

  $status = "-2";

  $query = "UPDATE offer_letters SET status='$status' WHERE id='$delid'";
  $results = mysqli_query($con, $query);
  $msg = "OLR REJECTED SUCCESSFULLY !";
  echo "<script>alert('Offer Letter Rejected Successfully !');</script>";
}


if (isset($_REQUEST['olrid'])) {
  $value = intval($_GET['olrid']);
  $entity = $_SESSION['entity'];
  $table = strtolower($entity . "_headcount");

  $arr = array('1' => 'April', '2' => 'May', '3' => 'June', '4' => 'July', '5' => 'August', '6' => 'September', '7' => 'October', '8' => 'November', '9' => 'December', '10' => 'January', '11' => 'February', '12' => 'March',);
  $budget_query = mysqli_query($con, "SELECT * from offer_letters WHERE id='$value'");
  while ($row = mysqli_fetch_array($budget_query)) {
    $ctc = $row['ctc'];
    $mctc = $ctc / 12;
    $pos = $row['job_title'];

    $joining_date = $row['joining_date'];
    $time = strtotime($joining_date);
    $monthy = date("m", $time);
    $dates = date("j", $time);
    $monthy = $monthy - 3;
    if ($monthy == -1 || $monthy == -2 || $monthy == 0) {
      $monthy = $monthy + 12;
    }
    $monthe = $monthy;
    $monthc = $monthy;


    $selquery = mysqli_query($con, "SELECT * from  `$table` WHERE entity='$entity' and position='$pos'");
    while ($row = mysqli_fetch_array($selquery)) {
      $mon = $row['month'];
      $hc = $row['hc'];
      if ($mon >= $monthe) {

        if ($hc <= 0) {
          $valids = 0;
        } else {
          $valids = 1;
        }

        if ($valids == 0) {
          $update_query = mysqli_query($con, "UPDATE `offer_letters` SET `status`='3' WHERE `id`='$value'");

          echo "<script>alert('Offer Letter Request is Rejected; Due to Headcount Unavailability(:     From " . $arr[$mon] . "');</script>";
          break;
        }
      }
    }

    $budgetseq = mysqli_query($con, "SELECT * from budget WHERE entity='$entity'");
    while ($rows = mysqli_fetch_array($budgetseq)) {
      $mon = $rows['month'];
      $budget = $rows['budget'];
      if ($mon >= $monthc) {

        if ($budget >= $mctc) {
          $status = 0;
        } else {
          $status = 3;
          echo "<script>alert('OLR Sent to Budget Unavailability...As Budget is Unavailable From " . $arr[$mon] . " (: ');</script>";
          $update_query = mysqli_query($con, "UPDATE `offer_letters` SET `status`='3' WHERE `id`='$value'");
          break;
        }
      }
    }
    if ($valids == 1 && $status == 0) {
      echo "<script>alert(' Budget & Headcount is Available :) ');</script>";
      echo "<script>window.location.href='adoEditOLR.php?olrid=$value';</script>";
    }
  }
}


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
                          <th>Joining Date</th>
                          <th>CTC/Annum</th>
                          <th>Position</th>
                          <th>Job Title</th>
                          <th>Replacemet To</th>
                          <th>Reporting To</th>
                          <?php
                          if ($super_admin == 1 || $accept_reject_olr == 1 || $approve_olr == 1) {
                          ?>
                            <th>Requested By</th>
                          <?php
                          }
                          ?>
                          <?php
                          if ($accept_reject_olr == 1 || $approve_olr == 1) {
                          ?>
                            <th>Offer Letter</th>
                            <th>Reject</th>
                          <?php

                          } else {
                          ?>
                            <th>Offer Letter Details</th>
                          <?php
                          }

                          ?>



                        </tr>
                      </thead>


                      <tbody>

                        <?php
                        if ($super_admin == 1) {
                          $offerletter_query = mysqli_query($con, "SELECT * FROM offer_letters where status = 0 ORDER BY olr_filled_date DESC");
                        } elseif ($olr_sent_to_cand == 1 && $view_olr == 1) {
                          $offerletter_query = mysqli_query($con, "SELECT * FROM offer_letters where status = 0 ORDER BY olr_filled_date DESC");
                        } elseif ($generate_olr == 1) {
                          $offerletter_query = mysqli_query($con, "SELECT * FROM `offer_letters` where `requested_by`='$email' and `status` = 0 ORDER BY olr_filled_date DESC");
                        } else {
                          $offerletter_query = mysqli_query($con, "SELECT o.*,e.entity_name FROM offer_letters o LEFT JOIN entity e ON e.id=o.entity_id where o.entity_id='$ses_entity_id' and o.status = 0 ORDER BY olr_filled_date DESC");
                        }


                        $cnt = 1;
                        while ($row = mysqli_fetch_array($offerletter_query)) {
                        ?>
                          <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($row['cand_name']); ?></td>
                            <td><?php echo htmlentities(date("jS-M-Y", strtotime($row['joining_date']))); ?></td>




                            <td><b><?php echo htmlentities(inr_format($row['ctc'], 2)); ?></b></td>
                            <td><?php echo htmlentities($row['pos']); ?></td>
                            <td><?php echo htmlentities($row['job_title']); ?></td>
                            <td><?php echo htmlentities($row['replacement']); ?></td>
                            <td><?php echo htmlentities($row['reporting_to']); ?></td>
                            <?php
                            if ($super_admin == 1 || $accept_reject_olr == 1 || $approve_olr == 1) {
                            ?>
                              <td><?php echo htmlentities($row['requested_by']); ?></td>
                            <?php

                            }
                            ?>



                            <!-- adoEditOLR.php?olrid=<?php echo htmlentities($row['id']); ?>
 -->
                            <?php
                            if ($accept_reject_olr == 1 || $approve_olr == 1) {
                            ?>
                              <td>
                                <a href="adoEditOLR.php?olrid=<?php echo htmlentities($row['id']); ?>" class="btn btn-primary" onclick="return confirm('Do you want to Accept the Offer Letter Request? (Requested By <?php echo htmlentities($row['requested_by']); ?>)');"> ACCEPT</a>
                              </td>
                              <td>
                                <a href="adoHeadOLR_Pending.php?del=<?php echo htmlentities($row['id']); ?>" class="btn btn-danger" onclick="return confirm('Do you want to reject the Offer Letter Request? (Requested  By <?php echo htmlentities($row['requested_by']); ?>)');"> REJECT</a>
                              </td>
                            <?php
                            } else {
                            ?>
                              <td><a href="viewOLRdetails.php?olrid=<?php echo htmlentities($row['id']); ?>" class="btn btn-success"> <span class="fa fa-eye"></span> View Details </a></td>

                            <?php
                            }
                            ?>

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