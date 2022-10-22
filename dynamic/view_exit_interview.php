<?php
include('../includes/dbconnection.php');
error_reporting(0);
if(isset($_POST['id']))
{
                                                            
  $entity_query=mysqli_query($con,"SELECT * FROM `exit_interview` WHERE `id` = '".$_POST['id']."'");
     while ($row=mysqli_fetch_array($entity_query))
     {
        $id =$row['id'];
        $name=$row['name'];
        $date=$row['date'];
        $job_title=$row['job_title'];
        $department=$row['dept'];
        $joining_date=$row['joining_date'];
        $separation_date=$row['separation_date'];
        $keys=$row['drawer_key'];
        $phone=$row['phone'];
        $card=$row['card'];
        $document=$row['document'];
        $laptop=$row['laptop'];
        $other=$row['other'];
        $reason=$row['reason'];
        $reason1=$row['reason1'];
        $reason2=$row['reason2'];
        $reason3=$row['reason3'];
        $reason4=$row['reason4'];
        $reason5=$row['reason5'];
        $reason6=$row['reason6'];
        $reason7=$row['reason7'];
        $reason8=$row['reason8'];
        $reason9=$row['reason9'];
        $reason10=$row['reason10'];
        $reason11=$row['reason11'];
        $reason12=$row['reason12'];
        $reason13=$row['reason13'];
        $reason14=$row['reason14'];
        $reason15=$row['reason15'];
        $reason16=$row['reason16'];
        $applicant=$row['applicant'];
        $todays_date=$row['todays_date'];
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
        @media print {
    .hideOnprint {
        visibility: hidden;
        display: none;
    }
}
    </style>
    
  </head>

  <body class="nav-md" >
    <?php
include('includes/leftbar.php'); ?>
<?php
include('includes/topbar.php'); ?>

        <!-- page content -->
            <div class="right_col" role="main">
            <!-- top tiles -->
           
          <!-- /top tiles -->

          
          <br />
                <div class="box-header with-border">
              <a href="#" onclick="window.print()" style="align:right" class="btn btn-success btn-sm btn-flat hideOnprint"><span class="glyphicon glyphicon-print"></span> Print</a>
            </div>
                <form action="" method="post" id="exit_interview_form" enctype="multipart/form-data" class="form-horizontal">
                <div class="x_content">
                  <center><h3><b>EXIT INTERVIEW FORM</b></h3></center><br>
                    
                   
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="id"><b>Employee ID:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-6 ">
                              <select name="id" id="id" class="form-control" onblur="myFunction('exit_interview_form')" required>
                                <option value="">-select email-</option>
                                <?php
                                                            
                                $entity_query=mysqli_query($con,"SELECT ei.id,ed.email FROM `exit_interview` ei LEFT JOIN employee_details ed ON ei.id=ed.emp_id");
                                   while ($row=mysqli_fetch_array($entity_query))
                                       {
                                        if($row['id'] == $id)
                                         { $selected ="selected";}else{
                                             $selecetd ="";
                                         }
                                       ?>
                                           <option  required="required" value="<?php echo  $row['id']; ?>" <?= $selected ?>><?php echo $row['email']; ?></option>
                                      <?php
                                    
                                      }
                          ?>
                              </select>
                        </div>
                  

                    </div>
                    <br>
                    <div class="row">
                    <div class="col-form-label col-md-2 col-sm-3 label-align">
                        <label  for="name"><b>Name:</b><span class="required">*</span>
                        </label> 
                    </div>

                    <div class="col-md-8 col-sm-6 ">
                          <input name="name" id="name" type="text" readonly="true"  value="<?php echo $name; ?>" class="form-control">
                    </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-2 label-align">
                            <label  for="job_title"><b>Job Title:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                              <input name="job_title" type="text" id="job_title" readonly="true"  value="<?php echo $job_title; ?>" class="form-control"  >
                        </div>
                        <div class="col-form-label col-md-2 col-sm-2 label-align">
                            <label  for="department"><b>Department:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                              <input name="department" id="department" type="text" readonly="true" value="<?php echo $department; ?>" class="form-control">
                        </div>
                        
                    </div>
                    <br>
                  
                    <div class="row">
                        <div class="col-form-label col-md-2 col-sm-2 label-align">
                            <label  for="joining_date"><b>Joining Date:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                              <input name="joining_date" id="joining_date"  readonly="true" class="date-picker form-control" value="<?php echo $joining_date; ?>" type="date">
                        </div>
                        <div class="col-form-label col-md-2 col-sm-2 label-align">
                            <label  for="separation_date"><b>Separation Date:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                              <input name="separation_date" id="separation_date" type="date" readonly="true" value="<?php echo $separation_date; ?>" class="date-picker form-control">
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
                              
                              <input type="checkbox" name="keys" id="keys" onclick="return false" <?php echo ($keys == 'YES') ? 'Checked' : ''; ?>/>
                           
                        </div>
                        <div class="col-form-label col-md-4 col-sm-3 label-align">
                              
                              <label  for="return"><b>Institute Phone /Blackberry</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="phone" id="phone" onclick="return false" <?php echo ($phone == 'YES') ? 'Checked' : ''; ?>/>
                           
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-form-label col-md-4 col-sm-3 label-align">
                              
                              <label  for="return"><b>Identity Card</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="card" id="card" onclick="return false" <?php echo ($card == 'YES') ? 'Checked' : ''; ?>/>
                           
                        </div>
                        <div class="col-form-label col-md-4 col-sm-3 label-align">
                              
                              <label  for="return"><b>Institute Document</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="document" id="document" onclick="return false" <?php echo ($document == 'YES') ? 'Checked' : ''; ?>/>
                           
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-form-label col-md-4 col-sm-3 label-align">
                              
                              <label  for="return"><b>Laptop</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="laptop" id="laptop" onclick="return false" <?php echo ($laptop == 'YES') ? 'Checked' : ''; ?>/>
                           
                        </div>
                        <div class="col-form-label col-md-4 col-sm-3 label-align">
                              
                              <label  for="return"><b>Other</b>
                            </label>

                        </div>
                        <div class="col-form-label">
                              
                              <input type="checkbox" name="other" id="other" onclick="return false" <?php echo ($other == 'YES') ? 'Checked' : ''; ?>/>
                           
                        </div>
                      </div>
                        
                    
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>Reason for leaving (Voluntary/Involuntary):</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-10 col-sm-6 ">
                              <textarea name="reason" id="reason" rows="4" readonly="true"  class="form-control" ><?php echo $reason; ?></textarea>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>1.  Did you feel sufficiently trained and oriented for your job?:</b><span class="required">*</span>
                            </label> 
                        </div>
                  

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason1" id="reason1" readonly="true" rows="4" class="form-control"><?php echo $reason1; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>2.  Did you feel that you were treated with respect & responsibility by co-employees and management? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason2" id="reason2" readonly="true" rows="4" class="form-control"><?php echo $reason2; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>3.  Do you feel that you could have done your job better if you were provided different or better resources?  What resources would you have needed? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason3" id="reason3" readonly="true"  rows="4" class="form-control"><?php echo $reason3; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>4.  Did you feel free to discuss suggestions or problems with your supervisor or manager? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason4" id="reason4" readonly="true"  rows="4" class="form-control"><?php echo $reason4; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>5.  Did your supervisor or manager provide you with clear instructions and expectations? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason5" id="reason5" readonly="true"  rows="4" class="form-control"><?php echo $reason5; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>6.  Were any employees given preferential treatment or discriminated against? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason6" id="reason6" readonly="true"  rows="4" class="form-control"><?php echo $reason6; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>7.  Did you witness or have knowledge of any unethical or illegal acts or practices engaged in by any employees of this Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason7" id="reason7" readonly="true"  rows="4" class="form-control"><?php echo $reason7; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>8.  Do you have any suggestions for improving Institute management? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason8" id="reason8" readonly="true"  rows="4" class="form-control"><?php echo $reason8; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                       <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>9.  Were working conditions satisfactory? Was your pay adequate? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason9" id="reason9" readonly="true"  rows="4" class="form-control"><?php echo $reason9; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>10.  Do you have any suggestions for improving communication in this Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason10" id="reason10" readonly="true"  rows="4" class="form-control"><?php echo $reason10; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>11.  Do you have any suggestions for improving Student relations in this Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason11" id="reason11" readonly="true"  rows="4" class="form-control"><?php echo $reason11; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>12.  Do you have any suggestions for improving employee motivation in this Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6">
                              <textarea name="reason12" id="reason12" readonly="true"  rows="4" class="form-control"><?php echo $reason12; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>13.  Do you have a new job that you expect to begin within the next few weeks? With whom? What does that Institute offer you that this Institute didn’t? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason13" id="reason13" readonly="true"  rows="4" class="form-control"><?php echo $reason13; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>14. Do you feel your training was adequate? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason14" id="reason14" readonly="true"  rows="4" class="form-control"><?php echo $reason14; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>15. Would you consider coming back to the Institute? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason15" id="reason15" readonly="true"  rows="4" class="form-control"><?php echo $reason15; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="reason"><b>16. Are security arrangements appropriate in the Institute?  Could they be improved? :</b><span class="required">*</span>
                            </label> 
                        </div>
                    

                        <div class="col-md-10 col-sm-6" >
                              <textarea name="reason16" id="reason16" readonly="true"  rows="4" class="form-control"><?php echo $reason16; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    
           
                    <div class="row">
                      <div class=" col-md-11 col-sm-11 " style="text-align: left;">
                            <label  for="reason"><b>I have returned, or arranged for the return of, all Institute property, including, but not limited to, computers, software, documents, financial records, personnel files, equipment and tools, vehicles, credit cards, keys, security cards, parking passes, works in progress, client or customer lists, books, resource materials, and confidential or trade secret items.</b><span class="required">*</span>
                            </label> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-form-label col-md-2 col-sm-2 label-align">
                            <label  for="applicant"><b>Applicant Name:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-5 col-sm-5 ">
                              <input name="applicant" id="applicant" type="text" readonly="true" value="<?php echo $applicant; ?>"   class="form-control">
                        </div>
                     
                        <div class="col-form-label col-md-2 col-sm-2 label-align">
                            <label  for="todays_date"><b>DATE:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                              <input name="todays_date" type="date" id="todays_date"   readonly="true" value="<?php echo $todays_date; ?>" class="date-picker form-control"  >
                        </div>
                      </div>
                    
             
                    <br>
                     

           
                        
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
   <script>
              function myFunction(x) {
                  document.getElementById(x).submit();
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