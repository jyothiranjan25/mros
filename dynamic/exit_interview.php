<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start();

$entity=$_SESSION['entity'];

$notification_table=$entity." notification";
if(isset($_POST['submit']))
{
    
  $id =$_POST['id'];
  $name=$_POST['name'];

  $job_title=$_POST['job_title'];
  $department=$_POST['department'];
  $joining_date=$_POST['joining_date'];
  $separation_date=$_POST['separation_date'];
  $keys=(isset($_POST['keys'])) ? "YES" : "NO";
  $phone=(isset($_POST['phone'])) ? "YES" : "NO";
  $card=(isset($_POST['card'])) ? "YES" : "NO";
  $document=(isset($_POST['document'])) ? "YES" : "NO";
  $laptop=(isset($_POST['laptop'])) ? "YES" : "NO";
  $other=(isset($_POST['other'])) ? "YES" : "NO";
  $reason=$_POST['reason'];
  $reason1=$_POST['reason1'];
  $reason2=$_POST['reason2'];
  $reason3=$_POST['reason3'];
  $reason4=$_POST['reason4'];
  $reason5=$_POST['reason5'];
  $reason6=$_POST['reason6'];
  $reason7=$_POST['reason7'];
  $reason8=$_POST['reason8'];
  $reason9=$_POST['reason9'];
  $reason10=$_POST['reason10'];
  $reason11=$_POST['reason11'];
  $reason12=$_POST['reason12'];
  $reason13=$_POST['reason13'];
  $reason14=$_POST['reason14'];
  $reason15=$_POST['reason15'];
  $reason16=$_POST['reason16'];
  $applicant=$_POST['applicant'];
  $todays_date=$_POST['todays_date'];

  
  $query=mysqli_query($con,"INSERT INTO `exit_interview` ( `id`, `name`, `job_title`, `dept`, `joining_date`, `separation_date`, `drawer_key`, `phone`, `card`, `document`, `laptop`,`other`,`reason`,`reason1`,`reason2`,`reason3`,`reason4`,`reason5`,`reason6`,`reason7`,`reason8`,`reason9`,`reason10`,`reason11`,`reason12`,`reason13`,`reason14`,`reason15`,`reason16`,`applicant`,`todays_date`)
                                VALUES ('$id', '$name', '$job_title', '$department', '$joining_date', '$separation_date', '$keys', '$phone', '$card', '$document', '$laptop','$other','$reason','$reason1','$reason2','$reason3','$reason4','$reason5','$reason6','$reason7','$reason8','$reason9','$reason10','$reason11','$reason12','$reason13','$reason14','$reason15','$reason16','$applicant','$todays_date')");
 
 
 $query=mysqli_query($con,"UPDATE `employee_details` SET `status` = '7' WHERE `emp_id`='$id' ");
 if ($query) {
    $message_query=mysqli_query($con,"Select * from `exit_interview` WHERE id='$id'");
    $message_data=mysqli_fetch_array($message_query);
    if($message_data['name']==$message_data['applicant'])
    {
        $stat="Seperated";
        $subject="Employee Seperation";
    }
    else{
        $stat="Terminated";
        $subject="Employee Termination";
    }
   
    $title="Employee Seperation";
    $message="<h3>".$subject."</h3><br><p>Greetings,</p><br><p>This is to inform you that a employee has been,".$stat."</p>";
            
    $from=$_SESSION['email'];        
    //$noti_query=mysqli_query($con,"INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");

   echo "<script>alert('Thank You.');</script>";
   echo "<script>window.location.href='index.php';</script>";
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
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

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
                <div class="x_content">
                  <center><h3><b>EXIT INTERVIEW FORM</b></h3></center><br>
                    <?php
                                                            
                      $entity_query=mysqli_query($con,"SELECT * FROM `employee_details` WHERE `emp_id` = '".$_GET['id']."'");
                       $row=mysqli_fetch_array($entity_query);
                       $entity_query1=mysqli_query($con,"SELECT `relievingdate` FROM `separation` WHERE `empid` = '".$_GET['id']."'");
                       $row1=mysqli_fetch_array($entity_query1);
                         
                      ?>
                   
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="id"><b>Employee ID:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                              <input name="id" id="id" type="text" required="required" readonly class="form-control" value="<?php echo $row['emp_id']; ?>"> 
                        </div>
                        

                    </div>
                    <br>
                    <div class="row">
                    <div class="col-form-label col-md-2 col-sm-3 label-align">
                        <label  for="name"><b>Name:</b><span class="required">*</span>
                        </label> 
                    </div>

                    <div class="col-md-6 col-sm-6 ">
                          <input name="name" id="name" type="text" required="required" class="form-control" value="<?php echo $row['name']; ?>" readonly>
                    </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="job_title"><b>Job Title:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                              <input name="job_title" type="text" id="job_title" required="required" class="form-control" value="<?php echo $row['job_title']; ?>" readonly >
                        </div>
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="department"><b>Department:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                              <input name="department" id="department" type="text" required="required" class="form-control" value="<?php echo $row['pos']; ?>" readonly>
                        </div>
                        
                    </div>
                    <br>
                  
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="joining_date"><b>Joining Date:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                              <input name="joining_date" id="joining_date" required="required" class="date-picker form-control" type="date" value="<?php echo $row['joining_date']; ?>" readonly>
                        </div>
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="separation_date"><b>Separation Date:</b><span class="required">*</span>
                            </label> 
                        </div>

                        <div class="col-md-2 col-sm-6 ">
                              <input name="separation_date" id="separation_date" type="date" required="required" class="date-picker form-control" value="<?php echo $row1['relievingdate']; ?>" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="return"><b>RETURN OF:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                              
                              <label  for="return"><b>Cabinet/Drawer Keys</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="keys" id="keys" value="keys"/>
                           
                        </div>
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                              
                              <label  for="return"><b>Institute Phone /Blackberry</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="phone" id="phone" value="phone"/>
                           
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-form-label col-md-4 col-sm-3 label-align">
                              
                              <label  for="return"><b>Identity Card</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="card" id="card" value="card"/>
                           
                        </div>
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                              
                              <label  for="return"><b>Institute Document</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="document" id="document" value="document"/>
                           
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-form-label col-md-4 col-sm-3 label-align">
                              
                              <label  for="return"><b>Laptop</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="laptop" id="laptop" value="laptop"/>
                           
                        </div>
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                              
                              <label  for="return"><b>Other</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="other" id="other" value="other"/>
                           
                        </div>
                      </div>
                        
                    
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>Reason for leaving (Voluntary/Involuntary):</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-10 col-sm-6 ">
                              <textarea name="reason" id="reason" rows="4" required="required" class="form-control"></textarea>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>1.  Did you feel sufficiently trained and oriented for your job?:</b><span class="required">*</span>
                            </label> 
                        </div>
                  

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason1" id="reason1" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>2.  Did you feel that you were treated with respect & responsibility by co-employees and management? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason2" id="reason2" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>3.  Do you feel that you could have done your job better if you were provided different or better resources?  What resources would you have needed? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason3" id="reason3" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>4.  Did you feel free to discuss suggestions or problems with your supervisor or manager? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason4" id="reason4" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>5.  Did your supervisor or manager provide you with clear instructions and expectations? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason5" id="reason5" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>6.  Were any employees given preferential treatment or discriminated against? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason6" id="reason6" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>7.  Did you witness or have knowledge of any unethical or illegal acts or practices engaged in by any employees of this Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason7" id="reason7" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>8.  Do you have any suggestions for improving Institute management? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason8" id="reason8" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                       <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>9.  Were working conditions satisfactory? Was your pay adequate? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason9" id="reason9" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>10.  Do you have any suggestions for improving communication in this Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason10" id="reason10" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>11.  Do you have any suggestions for improving Student relations in this Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason11" id="reason11" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>12.  Do you have any suggestions for improving employee motivation in this Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason12" id="reason12" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>13.  Do you have a new job that you expect to begin within the next few weeks? With whom? What does that Institute offer you that this Institute didn’t? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason13" id="reason13" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>14. Do you feel your training was adequate? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason14" id="reason14" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>15. Would you consider coming back to the Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason15" id="reason15" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>16. Are security arrangements appropriate in the Institute?  Could they be improved? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason16" id="reason16" required="required" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <footer>
                    <div class="row">
                      <div class="col-form-label col-md-12 col-sm-3 label-align" style="text-align: left;">
                            <label  for="reason"><b>I have returned, or arranged for the return of, all Institute property, including, but not limited to, computers, software, documents, financial records, personnel files, equipment and tools, vehicles, credit cards, keys, security cards, parking passes, works in progress, client or customer lists, books, resource materials, and confidential or trade secret items.</b><span class="required">*</span>
                            </label> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="applicant"><b>Applicant Name:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-5 col-sm-6 ">
                              <input name="applicant" id="applicant" type="text" readonly="true" value="<?php echo $username; ?>" required="required" class="form-control">
                        </div>
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="todays_date"><b>DATE:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-6 ">
                              <input name="todays_date" type="date" id="todays_date" required="required" readonly="true" value="<?php echo date("Y-m-d"); ?>" class="date-picker form-control"  >
                        </div>
                      </div>
                    
                    </footer>
                    <br>
                     <div class="col-md-2 offset-md-10">
                        <button type="submit" name="submit" type="button" class="btn btn-info btn-lg" style="width: 150px; border-radius: 10px;background-color: #3f51b5;">SUBMIT</button>
                      </div>

           
                        
                  </div>
                </form >
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
