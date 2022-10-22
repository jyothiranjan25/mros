<?php
  include('../includes/dbconnection.php');
                //error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
 

    <title>Offerletter Accept </title>

    <?php
include('includes/html_header.php'); ?>

    
  </head>

  <body class="nav-md">
    <?php
include('includes/leftbar.php'); 
include('includes/topbar.php'); ?>

              

        <!-- page content -->
            <div class="right_col" role="main">
            <!-- top tiles -->
           
          <!-- /top tiles -->

          
          <br />


                <form id="save-pdf" name="save-pdf" action="olr_process.php" method="post" enctype="multipart/form-data" class="form-horizontal">


                <?php 
                
                $olr_id=intval($_GET['olrid']);
                $offerletter_query=mysqli_query($con,"SELECT o.*,e.entity_name,c.symbol,c.name as currency_name, c.amount as camount FROM offer_letters o LEFT JOIN entity e ON e.id=o.entity_id LEFT JOIN currency_control c ON c.id=o.currency_type WHERE o.id=$olr_id");


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
                   
                        <div class="col-md-4 col-sm-6 ">
                              <input name="ctc" type="number" id="ctc" value="<?= $row['ctc'];?>" required="required" class="form-control" placeholder="Per Annum" onfocusout="numberWithCommas()">
                        </div>
                        <div class="col-md-4 col-sm-6 ">
                              <input readonly name="cur_type" type="text" id="cur_type" value="<?= $row['currency_name'];?>" required="required" class="form-control" placeholder="Per Annum" onfocusout="numberWithCommas()">
                              <input  type="text" name="symbol" id="cur_symbol" value="<?= $row['symbol'];?>" style="display:none">
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
                                  
                            <select class="col-md-5 col-sm-5" name="template_name" id="template_name" title="Select a Template type" class="form-control form-control-lg" required>
                          
                          <?php
                                $table_name= strtolower($sesentity."_Templates");                           
                                $entity_query=mysqli_query($con,"SELECT `id`,`template_name` from `$table_name`");
                                   while ($row=mysqli_fetch_array($entity_query))
                                       {
                                       ?>
                                           <option value="<?=  $row['id']; ?>"><?= ucwords($row['template_name']); ?></option>
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
           var curr = document.getElementById("cur_type").value;
           var symbol = document.getElementById("cur_symbol").value;
          
          y = x.value;
          y=y*1;
i = y/12;
j = i/30;

        
         z = (y).toLocaleString('en-IN');
      
         document.getElementById("commactc").innerHTML =  symbol  +  z + " / Annum";

i=(i).toLocaleString('en-IN');
j=(j).toLocaleString('en-IN');

             document.getElementById("monthctc").innerHTML =   symbol +  i + " / Month";
             document.getElementById("dctc").innerHTML =  symbol +  j + " / day";
}
</script>

 <?php
include('includes/html_footer.php'); ?>
  
  </body>
</html>
