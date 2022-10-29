<?php
include('../includes/dbconnection.php');





if (isset($_REQUEST['olrid'])) {
  $olr_id = intval($_GET['olrid']);
  $cand_name = "";
  $job_title = "";
  $personal_mail = "";
  $status = 5;
  $name = mysqli_query($con, "SELECT * FROM offer_letters where `id`='$olr_id' ");

  while ($row = mysqli_fetch_array($name)) {
    $cand_name = $row['cand_name'];
    $job_title = $row['job_title'];
    $personal_mail = $row['personal_mail_id'];
  }
}

if (isset($_REQUEST['con'])) {
  $id = $_GET['con'];

  $arr = array('1' => 'April', '2' => 'May', '3' => 'June', '4' => 'July', '5' => 'August', '6' => 'September', '7' => 'October', '8' => 'November', '9' => 'December', '10' => 'January', '11' => 'February', '12' => 'March',);
  $budget_query = mysqli_query($con, "SELECT * from offer_letters WHERE id='$id'");
  while ($row = mysqli_fetch_array($budget_query)) {
    $ctc = $row['ctc'];
    $mctc = $ctc / 12;
    $pos = $row['job_title'];
    $entity = $row['entity_name'];
    $table = strtolower($entity . "_headcount");
    $jobtype = $row['jobtype'];
    $jobmonths = $row['jobmonths'];

    $entity_tran = $entity . ' transaction';

    $joining_date = $row['joining_date'];
    $reqby = $row['requested_by'];

    $time = strtotime($joining_date);
    $monthy = date("m", $time);
    $dates = date("j", $time);
    $monthy = $monthy - 3;
    if ($monthy == -1 || $monthy == -2 || $monthy == 0) {
      $monthy = $monthy + 12;
    }

    if ($jobtype == "parttime") {
      $jobmons = $monthy + $jobmonths;
    }

    if ($jobtype == "fulltime") {
      $jobmons = 13;
    }
  }




  // Budget Restoring starts ...................................................................

  $se_query = mysqli_query($con, "Select * from budget WHERE entity='$entity'");
  while ($row = mysqli_fetch_array($se_query)) {
    $mon = $row['month'];
    $budget = $row['budget'];
    if ($mon == $monthy) {


      $dctc = $mctc / 30;
      $d = 30 - $dates;
      $dctc = $dctc * $d;
      $budget = $budget + $dctc;

      $update_q = mysqli_query($con, "UPDATE `budget` SET `budget`='$budget' WHERE `entity`='$entity' and `month`='$mon'");
      if ($update_q) {

        echo "<script>alert('Day Budget Restored Successfully :)');</script>";
      }
    } else if ($mon > $monthy && $mon < $jobmons) {



      $budget = $budget + $mctc;

      $update_ql = mysqli_query($con, "UPDATE `budget` SET `budget`='$budget' WHERE `entity`='$entity' and `month`='$mon'");
      if ($update_ql) {

        echo "<script>alert('Month Budget Restored Successfully :)');</script>";
      }
    }
  }

  $a = array();              // HeadCount Restoring starts ...................................................................

  $sel_query1 = mysqli_query($con, "Select * from `$table` WHERE `position`='$pos'");
  while ($rows = mysqli_fetch_array($sel_query1)) {
    $mons = $rows['month'];
    $hc = $rows['hc'];

    if ($mons >= $monthy && $mons < $jobmons) {

      array_push($a, "$arr[$mons]");
      $hc = $hc + 1;

      $update_query = mysqli_query($con, "UPDATE `$table` SET `hc`='$hc' WHERE `position`='$pos'  and `month`='$mons'");
      if ($update_query) {

        echo "<script>alert('Headcount Restored for " . $arr[$mons] . "  ');</script>";
      }
    }
  }


  $stat = 2;

  $query = "UPDATE offer_letters SET status='" . $stat . "' WHERE id='" . $id . "'";
  $results = mysqli_query($con, $query);
  if ($results) {
    echo '<script>alert("Nullify OLR Request Confirmed Successfully..!")</script>';
  } else {
    echo '<script>alert("Something Wrong, please try again...")</script>';
  }


  $arrlength = count($a);
  for ($i = 1; $i < $arrlength; $i++) {

    $m = $m . $a[$i] . ",";
  }
  $reason = "The Budget : + " . number_format($dctc, 2) . " Restored for " . $a[0] . "; + " . number_format($mctc, 2) . "/month is Restored for the respective  months- " . $m . " as OLR Nullified by " . $username . " for OLR_SN_" . $id . " (Requested By " . $reqby . ")";
  $bud = "+" . $ctc . "";
  $hhc = "+1/" . $pos . "";

  $insert_query = mysqli_query($con, "INSERT INTO `$entity_tran`( `budget`, `hc`, `reason`) VALUES('$bud','$hhc','$reason')");
  if ($insert_query) {
    echo "<script>alert('" . $reason . "');</script>";
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


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


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
          <h3>Change date of joining</h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">



        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2> APPROVED OFFER LETTERS</h2>
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
                          <th>Candidate Name</th>
                          <th>Mail Id</th>

                          <th>CTC/Annum</th>
                          <th>Position</th>
                          <th>Job Title</th>
                          <th>Requested By</th>
                          <th>For Entity</th>

                          <th>Date when sent</th>
                          <th>Change Joining Date</th>
                          <th>Status</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $offerletter_query = mysqli_query($con, "SELECT of.*,e.entity_name FROM offer_letters of LEFT JOIN entity e ON e.id=of.entity_id WHERE of.status='5' or of.status='6' or of.status='7' order by of.date_sent desc");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($offerletter_query)) {
                          if ($row['date_sent']) {
                            if ($row['status'] == 5 || $row['status'] == 6 || $row['status'] == 7) {
                              if ($row['status'] == 5) {
                                $status = "SENT";
                              } elseif ($row['status'] == 6) {
                                $status = "Accepted";
                              } elseif ($row['status'] == 7) {
                                $status = "Rejected";
                              }
                        ?>
                              <tr>
                                <td><?php echo htmlentities($cnt); ?></td>
                                <td><?php echo htmlentities($row['cand_name']); ?></td>
                                <td><?php echo htmlentities($row['personal_mail_id']); ?></td>
                                <td><?php echo htmlentities(number_format($row['ctc'], 2)); ?></td>
                                <td><?php echo htmlentities($row['pos']); ?></td>
                                <td><?php echo htmlentities($row['job_title']); ?></td>
                                <td><?php echo htmlentities($row['requested_by']); ?></td>
                                <td><?php echo htmlentities($row['entity_name']); ?></td>
                                <td style="color:blue"><?php echo htmlentities(date("d-m-y", strtotime($row['date_sent']))); ?></td>
                                <td><a title="Change Joining Date!" href="hrEditOLR.php?olrid=<?php echo htmlentities($row['id']); ?>" <?php
                                                                                                                                      if ($row['status'] == 5) { ?>style="color:red;font-weight:bold;" <?php } ?> <?php
                                                                                                                                      if ($row['status'] == 6) { ?>style="color:blue;font-weight:bold;" <?php } ?> <?php
                                                                                                                                      if ($row['status'] == 7) { ?>style="color:red;font-weight:bold;" <?php } ?>><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo htmlentities(date("d-m-y", strtotime($row['joining_date']))); ?> </a></td>

                                <?php
                                if ($row['status'] == 5) { ?>
                                  <td style="color:green;font-weight:bold">Sent</td>
                                <?php }
                                if ($row['status'] == 6) {  ?>
                                  <td style="color:blue;font-weight:bold">Accepted</td>
                                <?php }
                                if ($row['status'] == 7) {  ?>
                                  <td style="color:black;font-weight:bold">Rejected <a title="Nullify!" href="change_date.php?con=<?php echo htmlentities($row['id']); ?>" onclick="return confirm('Do you want to Nullify the OLR...')"><i style="color:red" class="fa fa-trash fa-2x"></i></a></td>

                                <?php } ?>


                              </tr>
                        <?php $cnt = $cnt + 1;
                            }
                          }
                        }  ?>

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
      <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
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