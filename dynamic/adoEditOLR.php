<?php
  include('../includes/dbconnection.php');
                //error_reporting(0);
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


                <form id="save-pdf" name="save-pdf" action="rtfhtml1.php" method="post" enctype="multipart/form-data" class="form-horizontal">


                <?php 
                
                $olr_id=intval($_GET['olrid']);
                $offerletter_query=mysqli_query($con,"SELECT * FROM offer_letters where offer_letters.id=$olr_id");


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
                            <div class="col-md-3 col-sm-4 ">
                              <input type="text" name="olr-id" id="olr-id" hidden="true" value="<?php echo htmlentities($row['id']);?>">
                              <input name="sn"  type="text" value="OLR_SN_<?php echo htmlentities($row['id']);?>" disabled="true" id="sn" required="required" class="form-control">
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
                        <div class="col-md-3 col-sm-4 ">
                              <input name="datesubmitted" id="datesubmitted" type="text" value="<?php echo htmlentities($row['datesubmitted']);?>" required="required" class="form-control" readonly>
                        </div>
                           <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Reporting To:</b>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                              <input name="reporting_to" type="text" id="report_to" value="<?php echo htmlentities($row['reporting_to']);?>" required="required" class="form-control" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Candidate Name:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                              <input name="cand_name" id="cand_name" type="text" value="<?php echo htmlentities($row['cand_name']);?>" required="required" class="form-control" readonly>
                        </div>
                  

                      <div class="col-form-label col-md-2 col-sm-3 label-align">
                          <label  for="Address"><b>Address:</b><span class="required">*</span>
                          </label> 
                      </div>
                      <div class="col-md-4 col-sm-6 ">
                            <textarea name="cand_address" id="cand_address" required="required" class="form-control" readonly><?php echo htmlentities($row['cand_address']);?></textarea>
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
                        <div class="col-md-3 col-sm-4 ">
                              <input name="pos" type="text" id="pos" value="<?php echo htmlentities($row['pos']);?>" required="required" class="form-control" readonly >
                        </div>
                    

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Job Title:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                              <input name="job_title" type="text" id="job_title" value="<?php echo htmlentities($row['job_title']);?>" required="required" class="form-control" readonly  >
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
                        <?php
                        $cur_name=$row['currency_type'];
                         if($cur_name !="INR(Rs)")
                         {
                           $query = "Select * from `currency_control` Where name='$cur_name'";
                             $results = mysqli_query($con, $query);
                             if (mysqli_num_rows($results) > 0)
                             {
                                 while ($conv_row=mysqli_fetch_array($results))
                                 {
                                     $show_ctc=$row['ctc']/$conv_row['amount'];                                        
                                 }
                             }
                         }
                         else{
                           $show_ctc=$row['ctc'];
                         }
                        ?>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="ctc" type="number" id="ctc" value="<?php echo htmlentities($show_ctc);?>" required="required" class="form-control" placeholder="Per Annum" onfocusout="numberWithCommas()">
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input readonly name="cur_type" type="text" id="cur_type" value="<?php echo htmlentities($row['currency_type']);?>" required="required" class="form-control" placeholder="Per Annum" onfocusout="numberWithCommas()">
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                         <b> <h6 style="margin-top:6px;" id="commactc"> </h6><h6 style="margin-top:6px;" id="monthctc"> </h6><h6 style="margin-top:6px;" id="dctc"> </h6></b>
                        
                          </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Probation:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input name="probation" type="number" value="<?php echo htmlentities($row['probation']);?>" id="probation" required="required" class="form-control"  >
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                          <label style="margin-top:6px;"   for="number"><b> Months</b> </label> 
                          </div>
                    </div>
                    <br>
                    <div class="row">

                     
                   
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b>Expiry Date:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                              <input name="expiry_date" id="expire_date" value="<?php echo htmlentities($row['expiry_date']);?>"required="required" type="date" class="date-picker form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">

                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                              <label  for="number"><b>  Work Timings:</b><span class="required">*</span>
                              </label> 
                          </div>
                        
                          <div class="col-md-1 col-sm-1 ">
                                <input name="work_time" id="work_hour" value="<?php echo htmlentities($row['work_time']);?>"required="required" type="number" class="form-control">
                          </div>
                          <div class="col-md-1 col-sm-4 ">
                          <label  for="number"><b>Hours in </b> </label> 
                          </div>
                          
                          <div class="col-md-1 col-sm-1 ">
                                <input name="work_days" id="work_days" value="<?php echo htmlentities($row['work_days']);?>" required="required" type="number" class="form-control">
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
                    <div class="row">

                          <div class="col-form-label col-md-2 col-sm-3 label-align">
                                    <label  for="Template_name"><b>  Select the template type :</b><span class="required">*</span>
                                    </label> 
                          </div>
                                  
                            <select class="col-md-5 col-sm-5" name="template_name" id="template_name" title="Select a Template type" class="form-control" required>
                          
                          <?php
                                
                                $entity = $row['entity_name'];

                                $table_name= strtolower($entity."_Templates");                           
                                $entity_query=mysqli_query($con,"Select `template_name` from `$table_name`");
                                   while ($row=mysqli_fetch_array($entity_query))
                                       {
                                       ?>
                                           <option value="<?php echo  $row['template_name']; ?>"><?php echo $row['template_name']; ?></option>
                                      <?php
                                      }
                                    
                          ?>
                        </select>
                    
                     <div class="col-md-2 offset-md-9">
                        <button type="submit" id="submit" name="submit" class="btn btn-info " style="    padding: 16px;
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
    
 function numberWithCommas() {
           var x = document.getElementById("ctc");
          y = x.value;
          y=y*1;
i = y/12;
j = i/30;


        
         z = (y).toLocaleString('en-IN');
      
         document.getElementById("commactc").innerHTML = "&#8377;"  +  z + " / Annum";

i=(i).toLocaleString('en-IN');
j=(j).toLocaleString('en-IN');

             document.getElementById("monthctc").innerHTML = "&#8377;"  +  i + " / Month";
             document.getElementById("dctc").innerHTML = "&#8377;"  +  j + " / day";
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
