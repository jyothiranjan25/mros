<?php
include('../includes/dbconnection.php');
 error_reporting(0);
 session_start();
 $entity=$_SESSION['entity'];
$emp_id=$_GET['empid'];
// echo '<script>alert( "'.$email.'" );</script>';


if(isset($_POST['submit']))
{

      
                  $empid=$_POST['emp_id'];
                  $empname=$_POST['name'];
                  $relievingdate=$_POST['relievingdate'];
                  $position=$_POST['position'];
                      $entity=$_POST['entity'];
                  $job_title=$_POST['job_title'];
                   $status=$_POST['type']; 
                    $ctc=$_POST['ctc']; 
                  $requestedby=$_POST['requestedby'];
                  if($status==1){
                    $type='Resignation';
                  }
                  else{$type='Termination';}
  
                  
                
 $query=mysqli_query($con,"INSERT INTO `separation`(`empid`,`empname`,`entity`, `position`, `job_title`,`ctc`, `relievingdate`, `requestedby`,`type`) VALUES('$empid','$empname','$entity', '$position', '$job_title','$ctc', '$relievingdate', '$requestedby','$type')");
 if(!$query){
   echo mysqli_error($con);
 }else{
 $query1 = mysqli_query($con,"UPDATE employee_details SET status='$status' WHERE emp_id='$empid'");

   if(!$query1){
   echo mysqli_error($con);
 }
                  
 }
                  
   
         
                   if ($query)
                    {

                          echo "<script>alert('Employee Separation Details has been submitted');</script>";



                          // $query123 = "SELECT * FROM `hr_email` ";
                          // $results1 = mysqli_query($con, $query123);
                          // $results123=mysqli_fetch_array($results1);
                          // require 'phpmailer/PHPMailerAutoload.php';
                          
                          // $mail = new PHPMailer;
                          
                          // //$mail->SMTPDebug = 3;   
                          // $xyz=$results123['email'];                            // Enable verbose debug output
                          
                          // $mail->isSMTP();                                      // Set mailer to use SMTP
                          // $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
                          // $mail->SMTPAuth = true;                               // Enable SMTP authentication
                          // $mail->Username = $results123['email'];                 // SMTP username
                          // $mail->Password = $results123['password'];                           // SMTP password
                          // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                          // $mail->Port = 587;                                    // TCP port to connect to
                          
                          // $mail->setFrom($results123['email'], 'IFIM HR');
                          //     // Add a recipient
                          // // $mail->addAddress('ellen@example.com');               // Name is optional
                          
                          // // $mail->addCC('cc@example.com');
                          // // $mail->addBCC('bcc@example.com');
                          
                          
                          // $name=mysqli_query($con,"SELECT * FROM employee_details where `emp_id`='$empid' ");
                              
                          // $row=mysqli_fetch_array($name);
                           
                          //       $cand_name=$row['name'];
                          //       $entity_name=$row['entity'];
                               
                            
                          
                           
                          //   $table=strtolower($entity."_emp");
                          //   $mailing = "SELECT * FROM `$table` ";
                          //   $sendmail = mysqli_query($con, $mailing);
                          //   while ($row=mysqli_fetch_array($sendmail))
                          //   {
                               
                          //       $mail->addAddress($row['email'],$row['name']); //to
                          //   } 
                            
                            
                          //   // Add attachments
                          //   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                          //   $mail->isHTML(true);                                  // Set email format to HTML
                            
                          //   $mail->Subject = 'New Employee';
                        
                          //   $body='This is to inform you that there has been a request for '.$type.' for our employee name ,'.$cand_name.', .<br><br><br>';
                          //   $mail->Body    = $body;
                          //   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            
                          //   if(!$mail->send()) {
                          //     echo '<script type="text/javascript">'; 
                          //     echo 'alert("Employee Separation details have been sent");'; 
                              
                          //     echo '</script>';
                          //       //echo 'Mailer Error: ' . $mail->ErrorInfo;
                          //   } 
                          echo "<script>window.location.href='separationResults.php';</script>";

                     }
                      else
                         {
                                echo "<script>alert('Something gone Wrong... Please Try Again :)');</script>";
                                echo mysqli_error($con);
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
   <link rel="icon" href="images/ifim_logo.jpg" type="image/ico" />

    <title>MROS | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">    <link href="../build/css/input.css" rel="stylesheet">

    <style>
        .site_title{
            overflow: inherit;
        }
        .nav_title{
            height: 198px;
            margin-top: -59px;
        }
        .required{
          color: red;
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
            <!-- top tiles -->
           
          <!-- /top tiles -->

          
          <br />


                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


<?php 

$query2="SELECT * FROM employee_details WHERE emp_id='".$emp_id."'";

$query1=mysqli_query($con,$query2);
$cnt=1;
while ($row=mysqli_fetch_array($query1))
{
   


  ?>



                <div class="x_content">
                  <center><h3><b>- Employee Separation Form -</b></h3></center><br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Employee ID:</b><span class="required"></span>
                            </label>
                          </div>
                            <div class="col-md-4 col-sm-6 ">   
                              <input name="emp_id"  type="text"   value="<?php echo htmlentities($row['emp_id']);?>" required class="form-control" readonly>
                            </div>
                            <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Requested By:</b><span class="required"></span>
                            </label>
                          </div>
                            <div class="col-md-4 col-sm-6 ">
                              <input name="requestedby"  type="text" value="<?php echo $username;?>"  id="sn" required="required" class="form-control" readonly>
                            </div>
                       
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Employee Name:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="name"  type="text" value="<?php echo htmlentities($row['name']);?>" required="required" class="form-control" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Position:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="position" type="text"  value="<?php echo htmlentities($row['pos']);?>" required="required" class="form-control"  readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Job Title:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="job_title" type="text"  value="<?php echo htmlentities($row['job_title']);?>" required="required" class="form-control"  readonly>
                        </div>
                    </div>
                    <br>
                         <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Entity:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="entity" type="text"  value="<?php echo htmlentities($row['entity']);?>" required="required" class="form-control"  readonly>
                        </div>
                    </div>
                    <br>
                     <div class="row">

                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                                    <label  for="number"><b>  CTC :</b><span class="required">*</span>
                                    </label> 
                          </div>


                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                               
              <input type="text" name="ctc" value="<?php echo htmlentities($row['ctc']); ?>" class="form-control" readonly /> 
                                 
                          </div>

                    </div>
                    <br>
                       <div class="row">

                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                                    <label  for="resign"><b>  Separation Type :</b><span class="required">*</span>
                                    </label> 
                          </div>

                          
                          <div class="col-form-label col-md-1 col-sm-3 label-align">
           <input type="radio" name="type" value="1" required> <label for="resign" >Resignation</label>  
                                 
                          </div>
                              <div class="col-form-label col-md-1 col-sm-3 label-align">
                          <input type="radio" name="type" value="2"  required> Termination
</div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Relieving Date:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="relievingdate"  required="required" class="date-picker form-control" type="date" >
                        </div>
                    </div>
                    <br>
                 <!--    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Cost To Company:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="ctc" type="text" id="ctc" value="<?php echo htmlentities(number_format($row['ctc'],2));?>" required="required" class="form-control" placeholder="Per Annum"  readonly>
                        </div>

                          <div class="col-md- col-sm-4 ">
                          <label  for="number" style="margin-top:6px;"><b>per Annum</b> </label> 
                          </div>
                      
                    </div>
             
                    <br> -->
           
              
                

                     <div class="col-md-2 offset-md-9">
                        <button type="submit" name="submit" type="button" class="btn btn-info btn-lg" style="    padding: 16px;
                        width: 194px;border-radius: 10px;background-color: #3f51b5;
                           ">SUBMIT</button>
                      </div>

           
                        
                  </div>
                                      <?php  
                                 
}
?> 
                   
                </form >
                </div>
              </div>
  
           
          </div>
         
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
           <div class="pull-right">
           <a href="#"> Go to Top  <span class="fa fa-chevron-up"> </span></a>
          </div>
            
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
  </body>
</html>
