<?php

use Beta\Microsoft\Graph\Model\Employee;

include('../includes/dbconnection.php');

if (isset($_GET['accept_id'])) {
  $olr_id = $_GET['accept_id'];


  $offerletter_deatail_query = mysqli_query($con, "SELECT * FROM `offer_letters` WHERE `id` = " . $olr_id . " ");
  $cand_name = "";
  while ($row = mysqli_fetch_array($offerletter_deatail_query)) {
    $cand_name = $row['cand_name'];
    $entity = $row['entity_name'];
    $type = $row['jobtype'];
    $months = $row['jobmonths'];
    $pos_new = $row['pos'];
    $job_new_title = $row['job_title'];
    $j_date = $row['joining_date'];
    $ctc = $row['ctc'];
    $st = 10;
    $emp_em_id = "";
    $email_emp = "";
  }

  $insert_employee_table = mysqli_query($con, "INSERT INTO `employee_details` (`emp_id`,`name`,`entity`,`jobtype`,`jobmonths`,`pos`,`job_title`,`email`,`joining_date`,`ctc`,`status`) 
   VALUES ('$emp_em_id','$cand_name','$entity','$type','$months','$pos_new','$job_new_title','$email_emp','$j_date','$ctc','$st')");


  if (!$insert_employee_table) {
    echo "<script>alert('" . $olr_id . "')</script>";
  }
  $new_emp_table = "new_employee";
  $role_new_emp = "New Employee";
  $insert_employee_table = mysqli_query($con, "INSERT INTO `$new_emp_table` (`name`,`email`,`emp_id`,`role`) 
   VALUES ('$cand_name','$email_emp','$emp_em_id','$role_new_emp')");



  $status = 19;
  $offerletter_query = mysqli_query($con, "UPDATE offer_letters SET status=$status WHERE id=$olr_id");


  $query123 = "SELECT * FROM `hr_email` ";
  $results1 = mysqli_query($con, $query123);
  $results123 = mysqli_fetch_array($results1);
  require 'phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;

  //$mail->SMTPDebug = 3;   
  $xyz = $results123['email'];                            // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = $results123['email'];                 // SMTP username
  $mail->Password = $results123['password'];                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->setFrom($results123['email'], 'IFIM HR');
  // Add a recipient
  // $mail->addAddress('ellen@example.com');               // Name is optional

  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');


  $name = mysqli_query($con, "SELECT * FROM offer_letters where `id`='$olr_id' ");

  $row = mysqli_fetch_array($name);

  $cand_name = $row['cand_name'];
  $date_join = $row['joining_date'];
  $job_title = $row['job_title'];
  $personal_mail = $row['personal_mail_id'];


  //  $mail->addAddress($row['personal_mail_id'], $row['cand_name']); 
  $table = "employee";
  $mailing = "SELECT * FROM `$table` ";
  $sendmail = mysqli_query($con, $mailing);
  while ($row = mysqli_fetch_array($sendmail)) {

    $mail->addAddress($row['email'], $row['name']); //to
  }


  // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'New Employee';
  $page_accept = $base_link . "cand_offerletter_accept.php?id=" . $olr_id;
  $page_reject = $base_link . "cand_offerletter_reject.php?id=" . $olr_id;
  $body = 'This is to inform you that a new employee ,' . $cand_name . ', will be joining our campus from ' . $date_join . ', at ' . $job_title . ' position.<br><b>Please make sure all the required assets are ready.</b><br><br>';
  $mail->Body    = $body;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if (!$mail->send()) {
    echo '<script type="text/javascript">';
    echo 'alert("CIF details have been sent");';

    echo '</script>';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
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

  <?php
  include('includes/html_header.php');
  ?>
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
          <h3>Feedbacks from New Employees</h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">



        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2> Oboarding & Induction Feedback</h2>
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
                          <th>Offer Letter SN </th>
                          <th>Candidate Name</th>
                          <th>PHONE NUMBER</th>
                          <th>Details</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $feedback = mysqli_query($con, "SELECT * FROM candidate_personal_info");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($feedback)) {
                          $oid = $row['olr_id'];
                          $slect_offer_detail = mysqli_query($con, "SELECT * FROM offer_letters WHERE id='$oid' and status='8' OR status='19'");
                          if (mysqli_num_rows($slect_offer_detail)) {
                            $select_status = mysqli_fetch_array($slect_offer_detail);
                            $statz = $select_status['status'];
                        ?>
                            <tr>
                              <td><?php echo htmlentities($cnt); ?></td>
                              <td><?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?></td>
                              <td><?php echo htmlentities($row['name']); ?></td>
                              <td><?php echo htmlentities($row['phone_number']); ?></td>
                              <td><a href="CIF.php?id=<?php echo htmlentities($row['olr_id']); ?>" target="_blank" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> View CIF Form </a>
                              </td>
                              <td>
                                <?php
                                if ($statz == '8') {
                                ?>
                                  <a href="resend_cif.php?id=<?php echo htmlentities($row['olr_id']); ?>" class="btn btn-danger">
                                    Resend
                                  </a>
                                  <a <?php echo $value; ?> href="cifResults.php?accept_id=<?php echo htmlentities($row['olr_id']); ?>" class="btn btn-primary"> Accept </a>
                                <?php
                                }
                                ?>
                                <!-- <a href="cifResults.php?id=<?php //echo htmlentities($row['olr_id']);
                                                                ?>" onclick="return confirm('Do you want to Delete the CIF...')" class="btn btn-danger" ><i class="fa fa-bin" aria-hidden="true"></i> Reject </a> -->

                              </td>


                              <!-- Modal -->
                              <form method="GET">
                                <div class="modal fade" id="<?php echo "modal" . htmlentities($row['olr_id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Leave What Needs to be changed</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <textarea name="commented_part" id="comment" class="form-control"></textarea>

                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Details to Candidate</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <!-- end modal -->

                            </tr>
                        <?php
                          }
                          $cnt = $cnt + 1;
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
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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