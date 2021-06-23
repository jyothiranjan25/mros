<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 
$entity=$_SESSION['entity'];
$my_name=$_SESSION['email'];


if(isset($_REQUEST['con']))
  {
$emp_id=$_GET['con'];
$status=intval($_GET['status']);
$status=$status+2;

$arr= array('1' => 'April' ,'2' => 'May' ,'3' => 'June' ,'4' => 'July' ,'5' => 'August' ,'6' => 'September' ,'7' => 'October' ,'8' => 'November' ,'9' => 'December' ,'10' => 'January' ,'11' => 'February' ,'12' => 'March' , );
          $budget_query=mysqli_query($con,"Select * from employee_details WHERE emp_id='$emp_id'");
          while ($row=mysqli_fetch_array($budget_query))
    {
           $ctc=$row['ctc'];
         $mctc=$ctc/12;
            $pos=$row['job_title'];
          $entity=$row['entity'];
          $table=strtolower($entity." headcount");
            $jobtype=$row['jobtype'];
    $jobmonths=$row['jobmonths'];

            $entity_tran=$entity.' transaction';

          }
              $budget_q=mysqli_query($con,"Select * from separation WHERE empid='$emp_id'");
          while ($rows=mysqli_fetch_array($budget_q))
    {
           $relievingdate=$rows['relievingdate'];
           $reqby=$rows['requestedby'];
         
              $time=strtotime($relievingdate);
            $monthy=date("m",$time);
              $dates=date("j",$time);
                $monthy=$monthy-3;
               if($monthy==-1 || $monthy==-2 || $monthy==0){
              $monthy=$monthy+12;
             }
             
              if($jobtype=="parttime"){
                 $jobmons=$monthy+$jobmonths;
                 }

          if($jobtype=="fulltime"){
                    $jobmons=13;
            }
 }

      // Budget Restoring starts ...................................................................

          $se_query=mysqli_query($con,"Select * from budget WHERE entity='$entity'");
            while ($row=mysqli_fetch_array($se_query))
        {
                $mon=$row['month'];
                $budget=$row['budget'];
                if($mon==$monthy)
                 {
                
                    
                      $dctc=$mctc/30;
                      $d=30-$dates;
                      $dctc=$dctc*$d;
                      $budget=$budget+$dctc;
                  
                         $update_q=mysqli_query($con,"UPDATE `budget` SET `budget`='$budget' WHERE `entity`='$entity' and `month`='$mon'");
                     
              
                      
                 }
                       else if($mon>$monthy && $mon<$jobmons)
                              {
                                 
               
                             
                                    $budget=$budget+$mctc;
                                     
                                        $update_ql=mysqli_query($con,"UPDATE `budget` SET `budget`='$budget' WHERE `entity`='$entity' and `month`='$mon'");
                                        

                  
                              

                   
                                  }

                                            



           }

            $a = array();              // HeadCount Restoring starts ...................................................................

           $sel_query1=mysqli_query($con,"Select * from `$table` WHERE `position`='$pos'");
                          while ($rows=mysqli_fetch_array($sel_query1))
                       {
                             $mons=$rows['month'];
                             $hc=$rows['hc'];
                 
                        if($mons>=$monthy && $mons<$jobmons)
                        {

                          array_push($a,"$arr[$mons]");
                           $hc=$hc+1;
                     
                             $update_query=mysqli_query($con,"UPDATE `$table` SET `hc`='$hc' WHERE `position`='$pos'  and `month`='$mons'");
                              
                        }
                  }
                   
     


$query = "UPDATE employee_details SET status='".$status."' WHERE emp_id='".$emp_id."'";
 $results = mysqli_query($con, $query);
if ($results) {
  echo '<script>alert("Separation Request Confirmed Successfully..!")</script>';
}else{
  echo '<script>alert("Something Wrong, please try again...")</script>';
}


$query123 = "SELECT * FROM `hr_email` ";
$results1 = mysqli_query($con, $query123);
$results123=mysqli_fetch_array($results1);
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;   
$xyz=$results123['email'];                            // Enable verbose debug output

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


$name=mysqli_query($con,"SELECT * FROM employee_details where `emp_id`='$emp_id' ");
    
$row=mysqli_fetch_array($name);
 
      $cand_name=$row['name'];
      $entity_name=$row['entity'];
     
  

 
  $table=strtolower($entity." emp");
  $mailing = "SELECT * FROM `$table` ";
  $sendmail = mysqli_query($con, $mailing);
  while ($row=mysqli_fetch_array($sendmail))
  {
     
      $mail->addAddress($row['email'],$row['name']); //to
  } 
  
  
  // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML
  
  $mail->Subject = 'New Employee';
  $page_accept="https://mros.ifim.edu.in/dynamic/cand_offerletter_accept.php?id=".$olr_id;
  $page_reject="https://mros.ifim.edu.in/dynamic/cand_offerletter_reject.php?id=".$olr_id;
  $body='This is to inform you that the request for '.$type.' for our employee name ,'.$cand_name.', has been successfully accepted by '.$my_name.' .<br><br><br>';
  $mail->Body    = $body;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
  if(!$mail->send()) {
    echo '<script type="text/javascript">'; 
    echo 'alert("CIF details have been sent");'; 
    
    echo '</script>';
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
  } 






$arrlength=count($a);
for($i=1; $i<$arrlength; $i++)
{

  $m=$m.$a[$i].",";
}
      $reason="The Budget : + ".number_format($dctc,2)." Restored for ".$a[0]."; + ".number_format($mctc,2)."/month is Restored for the respective  months- ".$m." as Separation Process Initiated for ".$emp_id." (Requested By ".$reqby.")";
      $bud="+".$ctc."";
      $hhc="+1/".$pos."";

      $insert_query=mysqli_query($con,"INSERT INTO `$entity_tran`( `budget`, `hc`, `reason`) VALUES('$bud','$hhc','$reason')");
      if ($insert_query) {
           echo "<script>alert('".$reason."');</script>";
}

}

if(isset($_REQUEST['del']))
  {
$delid=$_GET['del'];


$query = "UPDATE employee_details SET status='0' WHERE emp_id='".$delid."'";
$results = mysqli_query($con, $query);

$query1 = "DELETE FROM separation  WHERE empid='".$delid."'";
$results1 = mysqli_query($con, $query1);

if ($results && $results1) {
  echo '<script>alert("Separation Request Cancelled..!")</script>';
}else
  echo '<script>alert("Something Wrong, please try again...")</script>';

  $query123 = "SELECT * FROM `hr_email` ";
  $results1 = mysqli_query($con, $query123);
  $results123=mysqli_fetch_array($results1);
  require 'phpmailer/PHPMailerAutoload.php';
  
  $mail = new PHPMailer;
  
  //$mail->SMTPDebug = 3;   
  $xyz=$results123['email'];                            // Enable verbose debug output
  
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
  
  
  $name=mysqli_query($con,"SELECT * FROM employee_details where `emp_id`='$emp_id' ");
      
  $row=mysqli_fetch_array($name);
   
        $cand_name=$row['name'];
        $entity_name=$row['entity'];
       
    
  
   
    $table=strtolower($entity." emp");
    $mailing = "SELECT * FROM `$table` ";
    $sendmail = mysqli_query($con, $mailing);
    while ($row=mysqli_fetch_array($sendmail))
    {
       
        $mail->addAddress($row['email'],$row['name']); //to
    } 
    
    
    // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'New Employee';
    $page_accept="https://mros.ifim.edu.in/dynamic/cand_offerletter_accept.php?id=".$olr_id;
    $page_reject="https://mros.ifim.edu.in/dynamic/cand_offerletter_reject.php?id=".$olr_id;
    $body='This is to inform you that the request for '.$type.' for our employee name ,'.$cand_name.', has been rejected by '.$my_name.' .<br><br><br>';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    if(!$mail->send()) {
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

    <style>
      .site_title{
         overflow: inherit;
     }
     .nav_title{
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
                <h3> Employee Separation</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              


              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                   <h2> Requesting ADO/SO Head</h2>
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
  <th>Emp_Id.</th>
      <th>Candidate Name</th>                 
      <th>Entity</th>    
     <th>Position </th>
   <th>Job Title</th>
     <th>Type</th>
    <th>Relieving_Date</th>
     <th>RequestedBy</th>
     <th>Requested On</th>
    <th align="center">Action</th>
     
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        $feedback=mysqli_query($con,"SELECT * FROM separation");



$cnt=1;
while ($row=mysqli_fetch_array($feedback))
{
$emp_id = $row['empid'];
   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>

                                                            <td><?php echo htmlentities($row['empid']);?></td>
                                                            <td><?php echo htmlentities($row['empname']);?></td>
                                                            <td><?php echo htmlentities($row['entity']);?></td>
                                                            <td><?php echo htmlentities($row['position']);?></td>
                                                             <td><?php echo htmlentities($row['job_title']);?></td>

                                                             <td><?php echo htmlentities($row['type']);?></td>
                                                              <td><?php echo htmlentities(date("jS-M-Y", strtotime($row['relievingdate'])));?></td>
                                                               <td><?php echo htmlentities($row['requestedby']);?></td>
                                 <td><?php echo htmlentities(date("jS-M-Y (h:i A)", strtotime($row['date'])));?></td>


   <?php 
                        $sep=mysqli_query($con,"SELECT * FROM employee_details where emp_id='".$emp_id."'");



$cnt=1;
while ($rows=mysqli_fetch_array($sep))
{
 if($rows['status']==1 || $rows['status']==2){ ?>
  <td><?php
 echo "<a class='btn btn-primary' onclick='return confirm('Are you sure you want to Confirm this?')' href='adoSeparationResults.php?con=".$row['empid']."&status=".$rows['status']." '>Confirm</a>"; ?>

 <a href="adoSeparationResults.php?del=<?php echo htmlentities($row['empid']);?>" class="btn btn-danger" onclick="return confirm('Do you want to Reject the Separation Request? (Requested  By <?php echo htmlentities($row['requestedby']);?>)');">Reject</a>




</td>
<?php } else { ?>
<td><a href="#"  class="btn btn-success"> Confirmed </a></td><?php }}  ?>
</tr>
<?php $cnt=$cnt+1;} ?>
                         
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