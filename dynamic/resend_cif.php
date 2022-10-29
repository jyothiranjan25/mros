<?php
include('../includes/dbconnection.php');

$olr_id = $_GET['id'];
if (isset($_GET['submit_data'])) {

  $olr_id = $_GET['id'];
  $info_to_cand = $_GET['information'];
  $tables = array("candidate_personal_info", "candidate_employment", "candidate_education", "candidate_miscellaneous", "candidate_reference", "candidate_signature");
  foreach ($tables as $table) {
    $query = "DELETE FROM $table WHERE `olr_id` = '$olr_id'";
    mysqli_query($con, $query);
  }


  $status = 6;
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
  $mail->addReplyTo($results123['email'], 'IFIM HR');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');


  $name = mysqli_query($con, "SELECT * FROM offer_letters where `id`='$olr_id' ");

  $row = mysqli_fetch_array($name);

  $cand_name = $row['cand_name'];

  $job_title = $row['job_title'];
  $personal_mail = $row['personal_mail_id'];


  $mail->addAddress($row['personal_mail_id'], $row['cand_name']);
  // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Offer Letter';
  $page_accept = $base_link . "CIF_deatail.php?id=" . $olr_id;

  $body = 'Dear ' . $cand_name . '  <br>' . $info_to_cand . '<br>
  
  <br>
  <a class="btn btn-primary" style="background-color: #000044a6;color: white;text-decoration: none;padding: 10px;" href="' . $page_accept . '" target="_blank">CIF</a>
 ';
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
    <!-- top tiles -->

    <!-- /top tiles -->


    <br />

    <form action="" method="GET" enctype="multipart/form-data" class="form-horizontal">
      <div class="x_content">
        <center>
          <h3><b>CIF Resend to candidate</b></h3>
        </center><br>

        <br>

        <input type="text" name="id" value="<?php echo $olr_id; ?>" style="display:none;">


        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="perks"><b>Information To Be Sent to candidate :</b>
            </label>
          </div>


          <div class="col-md-6 col-sm-6  ">
            <textarea rows="10" name="information" id="information" class="form-control"></textarea>
          </div>



          <div class="col-md-2 ">
            <button type="submit" name="submit_data" type="button" class="btn btn-info btn-lg" style="padding: 16px;
                        width: 194px;border-radius: 10px;background-color: #3f51b5;">SUBMIT</button>
          </div>



        </div>
    </form>
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