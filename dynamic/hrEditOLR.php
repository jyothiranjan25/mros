<?php
include('../includes/dbconnection.php');
?>
    <?php
include('includes/leftbar.php'); ?>
<?php
include('includes/topbar.php'); ?>

<?php
error_reporting(0);
session_start();
$value=intval($_GET['olrid']);



if(isset($_POST['submit']))
{
     // $value=$_POST['olrid'];   
     $entity=$_POST['entity_name'];
     $entity_tran=$entity.' transaction';

   
          $arr= array('1' => 'April' ,'2' => 'May' ,'3' => 'June' ,'4' => 'July' ,'5' => 'August' ,'6' => 'September' ,'7' => 'October' ,'8' => 'November' ,'9' => 'December' ,'10' => 'January' ,'11' => 'February' ,'12' => 'March' , );
          $budget_query=mysqli_query($con,"Select * from offer_letters WHERE id='$value'");
          while ($row=mysqli_fetch_array($budget_query))
    {
           $ctc=$row['ctc'];
         $mctc=$ctc/12;
            $pos=$row['job_title'];
   $jobtype=$_POST['jobtype'];
    $jobmonths=$_POST['jobmonths'];
          $joining_date=$row['joining_date'];
              $time=strtotime($joining_date);
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

                   $a = array();             // HeadCount Restoring starts ...................................................................
           $table=strtolower($entity." headcount");
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
                   
     

                         // Changing Status and Joining Date ...................................................................

  $joining_date=$_POST['joining_date'];
   $perks=$_POST['perks'];

  $query=mysqli_query($con,"UPDATE `offer_letters` set   `joining_date`='$joining_date',`status`='0',`perks`='$perks' where `id`='$value'");
 
       if ($query) {
        echo "<script>alert('Offer Letter Joining Date has been Updated Successfully...(Sent for ADO Head Approval)');</script>";
     
       }
       else 
      {
       echo "<script>alert('Something went wrong:( Please try once more...!');</script>";
      
      }
      
     $arrlength=count($a);
for($i=1; $i<$arrlength; $i++)
{

  $m=$m.$a[$i].",";
}

      $reason="The Budget : + ".number_format($dctc,2)." Restored for ".$a[0]."; + ".number_format($mctc,2)."/month is Restored for the respective months- ".$m." as olr_sn_".$value." has Change in Date, Requested By ".$username."";
      $bud="+".$ctc."";
      $hhc="+1/".$pos."";

      $insert_query=mysqli_query($con,"INSERT INTO `$entity_tran`( `budget`, `hc`, `reason`) VALUES('$bud','$hhc','$reason')");
      if ($insert_query) {
           echo "<script>alert('".$reason."');</script>";
      }
      

}
  echo '<script type="text/javascript">window.location.href="index.php"</script>';

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
        <!-- page content -->
            <div class="right_col" role="main">
            <!-- top tiles -->
          <!-- /top tiles -->
          <br />
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
<?php 
$offerletter_query=mysqli_query($con,"SELECT * FROM offer_letters where offer_letters.id=$value");
$cnt=1;
while ($row=mysqli_fetch_array($offerletter_query))
{
  ?>
                <div class="form-group">
                  <center><h3><b>Offer Letter Request Form</b></h3></center><br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>OLR SN:</b><span class="required"></span>
                            </label>
                          </div>
                            <div class="col-md-4 col-sm-6 ">
                              <input name="sn"  type="text" value="OLR_SN_<?php echo htmlentities($row['id']);?>" id="sn" required="required" class="form-control" readonly>
                             <!--    <input style="display:none" name="olrid"  type="number" value="<?php echo htmlentities($row['id']);?>" class="form-control"  > -->
                            </div>
                            <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Requested By:</b><span class="required"></span>
                            </label>
                          </div>
                            <div class="col-md-4 col-sm-6 ">
                              <input name="reqby"  type="text" value="<?php echo htmlentities($row['requested_by']);?>"  id="reqby" required="required" class="form-control" readonly>
                            </div>            
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="datesubmitted"><b>Date Submitted:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="datesubmitted" id="datesubmitted" type="text" value="<?php echo htmlentities($row['datesubmitted']);?>" required="required" class="form-control" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Candidate Name:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="cand_name" id="cand_name" type="text" value="<?php echo htmlentities($row['cand_name']);?>" required="required" class="form-control" readonly>
                        </div>
                    </div>
                    <br>
                       <div class="row">
                    <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Type of Job:</b><span class="required">*</span></label> 
                              </div>
     <div class="col-md-3 col-sm-4 ">
                              <input name="jobtype" type="text" id="jobtype" value="<?php echo htmlentities($row['jobtype']);?>"  class="form-control" readonly>
                        </div>
                        <?php if($row['jobtype']=="parttime"){ ?>
     <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>No. of Months:</b><span class="required">*</span></label> 
                              </div>
     <div class="col-md-3 col-sm-4 ">
                              <input name="jobmonths" type="text" id="jobmonths" value="<?php echo htmlentities($row['jobmonths']);?>"  class="form-control" readonly>
                        </div>
                        <?php } ?>
                        </div>
  <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Position:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="pos" type="text" id="pos" value="<?php echo htmlentities($row['pos']);?>" required="required" class="form-control" readonly >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Job Title:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="job_title" type="text" id="job_title" value="<?php echo htmlentities($row['job_title']);?>" required="required" class="form-control"  readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Joining Date:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="joining_date" id="joining_date" value="<?php echo htmlentities($row['joining_date']);?>" required="required" class="date-picker form-control" type="date">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Cost To Company:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="ctc" type="number" id="ctc" value="<?php echo htmlentities($row['ctc']);?>" required="required" class="form-control" placeholder="Per Annum" onfocusout="numberWithCommas()" readonly>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                         <b> <h6 style="margin-top:6px;" id="commactc"> </h6></b>
                          </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Probation:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="probation" type="number" value="<?php echo htmlentities($row['probation']);?>" id="probation" required="required" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                          <label style="margin-top:6px;"   for="number"><b> Months</b> </label> 
                          </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Reporting To:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                              <input name="reporting_to" type="text" id="report_to" value="<?php echo htmlentities($row['reporting_to']);?>" required="required" class="form-control" readonly >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Expiry Date:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                              <input name="expiry_date" id="expire_date" value="<?php echo htmlentities($row['expiry_date']);?>"required="required" type="date" class="date-picker form-control" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                              <label  for="number"><b>  Work Timings:</b><span class="required">*</span>
                              </label> 
                          </div>
                          <div class="col-md-1 col-sm-1 ">
                                <input name="work_time" id="work_hour" value="<?php echo htmlentities($row['work_time']);?>"required="required" type="number" class="form-control" readonly>
                          </div>
                          <div class="col-md-1 col-sm-4 ">
                          <label  for="number"><b>Hours in </b> </label> 
                          </div>
                          <div class="col-md-1 col-sm-1 ">
                                <input name="work_days" id="work_days" value="<?php echo htmlentities($row['work_days']);?>" required="required" type="number" class="form-control" readonly>
                          </div>
                          <div class="col-md-4 col-sm-4 ">
                          <label  for="number"><b>working days per week</b> </label> 
                          </div>
                    </div>
                    <br>
                    <div class="row">

                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                                    <label  for="number"><b>  Entity :</b><span class="required">*</span>
                                    </label> 
                          </div>
                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                                  
                            <input name="entity_name" id="entity_name" value="<?php echo htmlentities($row['entity_name']);?>" required="required" type="text" class="form-control" readonly>
                    </div>
                  </div>
                  
                    <br>
                       <div class="row">

                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                                    <label  for="perks"><b>Other Perks :</b><span class="required">*</span>
                                    </label> 
                                  </div>


                          <div class="col-md-5 col-sm-5  ">
                                <textarea name="perks" id="perks" required="required"  class="form-control"><?php echo htmlentities($row['perks']);?> </textarea> 
                          </div>
                      </div>

                    <br>
                   
                     <div class="col-md-2 offset-md-9">
                        <button type="submit" name="submit" type="button" class="btn btn-info " style="    padding: 16px;
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
    <script type="text/javascript">
      function capitals() {
 // var x = document.getElementById("cand_name");
 //  x.value = x.value.toUpperCase();
  }
 function numberWithCommas() {
          var x = document.getElementById("ctc");
          y = x.value;


        
         z = y.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
         document.getElementById("commactc").innerHTML = z + " / Annum";
         
        // x.value = x.value.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
     // return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

    </script>

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
