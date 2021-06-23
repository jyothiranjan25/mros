<?php
include('../includes/dbconnection.php');
 error_reporting(0);
$olr_id=intval($_GET['olrid']);

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
    <link href="../build/css/custom.min.css" rel="stylesheet">
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

$offerletter_query=mysqli_query($con,"SELECT * FROM offer_letters where offer_letters.id=$olr_id");

$cnt=1;
while ($row=mysqli_fetch_array($offerletter_query))
{
   


  ?>



                <div class="x_content">
                  <center><h3><b>Details Of Offer Letter Request Form</b></h3></center><br>
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>OLR SN:</b><span class="required"></span>
                            </label>
                          </div>
                            <div class="col-md-4 col-sm-6 ">
                              <input name="sn"  type="text" value="OLR_SN_<?php echo htmlentities($row['id']);?>"  id="sn" required="required" class="form-control" readonly>
                            </div>
                            <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Requested By:</b><span class="required"></span>
                            </label>
                          </div>
                            <div class="col-md-4 col-sm-6 ">
                              <input name="sn"  type="text" value="<?php echo htmlentities($row['requested_by']);?>"  id="sn" required="required" class="form-control" readonly>
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
                            <label  for="number"><b>Position:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="pos" type="text" id="pos" value="<?php echo htmlentities($row['pos']);?>" required="required" class="form-control"  readonly>
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
                            <label  for="number"><b>Joining Date:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="joining_date" id="joining_date" value="<?php echo htmlentities($row['joining_date']);?>" required="required" class="date-picker form-control" type="date" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Cost To Company:</b><span class="required">*</span>
                            </label> 
                        </div>

                        <?php
                        if($row['currency_type']!="INR(Rs)")
                        {

                            $ctc_to_show=$row['ctc'];
                        }
                        $curr_ctc=$row['ctc'];
                        if($row['currency_type'] !="INR(Rs)")
                            {
                              $cur_name=$row['currency_type'];
                              $query = "Select * from `currency_control` Where name='$cur_name'";
                                $results = mysqli_query($con, $query);
                                if (mysqli_num_rows($results) > 0)
                                {
                                    while ($curr_row=mysqli_fetch_array($results))
                                    {
                                        $ctc_to_show=$curr_ctc/$curr_row['amount'];                                        
                                    }
                                }
                            }
                        ?>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="ctc" type="text" id="ctc" value="<?php echo htmlentities(inr_format($ctc_to_show)); ?>" required="required" class="form-control" placeholder="Per Annum"  readonly>
                        </div>
                        <div class="col-md-2 col-sm-3 ">
                              <input name="curr_type" type="text" id="curr_type" value="<?php echo htmlentities($row['currency_type']); ?>" required="required" class="form-control" placeholder="Per Annum"  readonly>
                        </div>
                          <div class="col-md- col-sm-4 ">
                          <label  for="number" style="margin-top:6px;"><b>per Annum</b> </label> 
                          </div>
                      
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Probation:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="probation" type="number" value="<?php echo htmlentities($row['probation']);?>" id="probation" required="required" class="form-control"  readonly>
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

                          <div class="col-md-5 col-sm-5 ">
                          <label  for="number"><b>working days per week</b> </label> 
                          </div>

                    </div>
                     <br>
                    <div class="row">

                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                              <label  for="number"><b> Replacement to</b><span class="required">*</span>
                              </label> 
                          </div>
                           <div class="col-md-2 col-sm-6 ">
                         
                               <input type="text" value="<?php echo htmlentities($row['replacement']);?>" class="form-control" readonly />
                                  </select>
                                  
                          </div>

                        

                    </div>
                    <br>
                    <div class="row">

                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                                    <label  for="number"><b>  Organisation :</b><span class="required">*</span>
                                    </label> 
                          </div>
                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                               
              <input type="text" value="<?php echo htmlentities($row['entity_name']);?>" class="form-control" readonly /> 
                                 
                          </div>

                    </div>
                    <br>

                   <!--   <div class="col-md-2 offset-md-9">
                        <button type="submit" name="submit" type="button" class="btn btn-info btn-lg" style="    padding: 16px;
                        width: 194px;border-radius: 10px;background-color: #3f51b5;
                           ">SUBMIT</button>
                      </div> -->

           
                        
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

<?php function inr_format($amount) {
    $inr = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
    return $inr;
} ?>


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
