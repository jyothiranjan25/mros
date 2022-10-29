<?php
include('../includes/dbconnection.php');


?>

<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'dixitaman.nov.wwe@gmail.com';                 // SMTP username
$mail->Password = 'webdev_Aman@123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('dixitaman.nov.wwe@gmail.com', 'Aman IFIM HR');
$mail->addAddress('dixitaman.nov.wwe@gmail.com', 'IFIM HR');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('dixitaman.nov.wwe@gmail.com', 'OFFER LETTER DETAILS');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$status = 5;



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


  $mail->addAttachment('AmansCV.pdf', 'OFFER LETTER');         // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Offer Letter';
  $page_accept = $base_link . "cand_offerletter_accept.php?name=" . $cand_name;
  $page_reject = $base_link . "cand_offerletter_reject.php?name=" . $cand_name;
  $body = 'This is the message body . You can write anything.<br><br><br>
    <a class="btn btn-primary" style="background-color: #000044a6;color: white;text-decoration: none;padding: 10px;" href="' . $page_accept . '" target="_blank">Accept</a>
    <a class="btn btn-primary" style="background-color: #c80e0ea6;color: white;text-decoration: none;padding: 10px;" href="' . $page_reject . '" target="_blank">Reject</a>';
  $mail->Body    = $body;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if (!$mail->send()) {
    echo '<script type="text/javascript">';
    echo 'alert("Offer Letter is not sent.");';
    echo 'window.location.href = "olr_list_approved.php";';
    echo '</script>';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    //update
    $curr_date = date("Y-m-d");
    $query = "UPDATE offer_letters SET status='$status' and date_sent='$curr_date' WHERE id='$olr_id'";
    $results = mysqli_query($con, $query);

    // echo 'Message has been sent';

    echo '<script type="text/javascript">';
    echo 'alert("Offer Letter sent to candidate.");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
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
  ?>
  <?php
  include('includes/topbar.php');
  ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>OFFER LETTERS SENT</h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">



        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2> No Response </h2>
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
                          <th>Entity</th>
                          <th>Mail Id</th>
                          <th>Joining Date</th>
                          <th>CTC/Annum</th>
                          <th>Position</th>
                          <th>Job Title</th>
                          <th>Requested By</th>
                          <th>Replacement</th>
                          <th>Status</th>
                          <th>Date when sent</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $offerletter_query = mysqli_query($con, "SELECT * FROM offer_letters");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($offerletter_query)) {
                          if ($row['date_sent']) {
                            if ($row['status'] == 5 || $row['status'] == 6 || $row['status'] == 7) {
                              if ($row['status'] == 5) {
                                $status = "Sent";
                              } elseif ($row['status'] == 6) {
                                $status = "Accepted";
                              } elseif ($row['status'] == 7) {
                                $status = "Rejected";
                              }



                        ?>
                              <tr>
                                <td><?php echo htmlentities($cnt); ?></td>
                                <td><?php echo htmlentities($row['cand_name']); ?></td>
                                <td><?php echo htmlentities($row['entity_name']); ?></td>
                                <td><?php echo htmlentities($row['personal_mail_id']); ?></td>
                                <td><?php echo htmlentities($row['joining_date']); ?></td>
                                <td><?php echo htmlentities(inr_format($row['ctc'])); ?></td>
                                <td><?php echo htmlentities($row['pos']); ?></td>
                                <td><?php echo htmlentities($row['job_title']); ?></td>



                                <td><?php echo htmlentities($row['requested_by']); ?></td>


                                <td><?php echo htmlentities($row['replacement']); ?><br>(<?php echo htmlentities($row['datesubmitted']); ?>)</td>

                                <td><?php echo htmlentities($status); ?></td>
                                <td><?php echo htmlentities($row['date_sent']); ?></td>


                              </tr>
                        <?php $cnt = $cnt + 1;
                            }
                          }
                        }
                        function inr_format($amount)
                        {
                          $inr = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
                          return $inr;
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