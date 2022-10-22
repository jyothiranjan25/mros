<?php

include('../includes/dbconnection.php');
error_reporting(0); 
session_start(); 


if(!$_SESSION['role'])
{
    echo "<script>window.location.href='login.php';</script>";
}

$num = 0; $nums = 0;   $dstring ="";
$ustring ="";     $vstring =""; $msg = ""; $error = ""; $qstring = ""; 
  

 if(isset($_POST['import'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $emp_id   = $line[0];
                $name  = $line[1];
                 $entity  = $line[2]; 
                 $jobtype  = $line[3]; 
                 $months  = $line[4];
                  $position  = $line[5];
                   $jobtitle  = $line[6];
                    $mailid  = $line[7];
                     $joiningdate  = $line[8];
                      $ctc  = $line[9];
                      $status = 0;     
                
                // Check whether member already exists in the database with the same email
 $prevQuery=mysqli_query($con,"SELECT * FROM employee_details WHERE email = '".$mailid."'");
 $prevResult=mysqli_fetch_array($prevQuery);

          $empid = $prevResult['emp_id'];
           $c_t_c = $prevResult['ctc'];


                
                if(mysqli_num_rows($prevQuery) > 0){
                    // Update member data in the database
                    if($ctc !=  $c_t_c){
                  

$update_query=mysqli_query($con,"UPDATE employee_details SET ctc ='".$ctc."' WHERE emp_id='".$empid."'");
if($update_query){
      $num++;
    $ustring ='CTC has been updated for '.$num.' Employees as per the CSV file Uploaded... for the respective Employee_ids';
        }

}
                }else if($emp_id != ""){
                    
  $insert=mysqli_query($con,"INSERT INTO `employee_details`(`emp_id`,`name`,`entity`,`jobtype`,`jobmonths`,`pos`,`job_title`,`email`,`joining_date`,`ctc`,`status`) VALUES('$emp_id','$name','$entity','$jobtype','$months','$position','$jobtitle','$mailid','$joiningdate','$ctc','$status')");

  if($insert){
$nums++;
    $vstring = $nums.' New Employee Records Uploaded as per the CSV file...';
}

                }
            }    
            // Close opened CSV file
            fclose($csvFile);
            
                $msg = 'SUCCESSFULLY IMPORTED...';
              echo "<script>alert('".$msg."')</script>";

if(!$insert && !$update_query){
              $dstring ="No Updates in the Data";
          }
     
        }else{
            $error = 'SOMETHING GONE WRONG PLEASE TRY AGAIN...';
             echo "<script>alert('".$error."')</script>";
        }
    }else{
        $qstring = 'invalid_file';
        echo "<script>alert('".$qstring."')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MROS  | Update Employee Details</title>

  <?php 
include('includes/html_header.php');
?>

  </head>

  <body class="nav-md">
      <?php
 include('includes/leftbar.php'); 
include('includes/topbar.php'); 
?>
      <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h4>Upload .CSV excel file only </h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                       <h2>(FIRST ROW OF THE EXCEL .CSV FILE WILL BE NEGLECTED..)</h2>
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        
                                    
                                    </ul>
                                    <div class="clearfix required">*</div>
                                </div>
                                <div class="x_content">
                                    <br>
                             


                                        <div class="item form-group">
                                                 <label class="col-form-label col-md-12 col-sm-12" for="first-name"><b>CONTAINING : 1. employee_Id <span class="required">*</span>
2. name<span class="required">*</span>
3. Entity<span class="required">*</span>
4. Job_type (fulltime, parttime)<span class="required">*</span>
5. Job Months(if parttime)<span class="required">*</span>
6. Position<span class="required">*</span>
7. Job_title<span class="required">*</span>
8. Email_Id<span class="required">*</span>
9. Joining_Date<span class="required">*</span>
10. CTC (Annual)<span class="required">*</span>
                                            </label>
                                         
       </div>             
       <br>                              <br>                              <br>                         
     <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">

       <form action=""  name="upload_excel" method="post" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

    <label>Select .CSV Excel File :</label>
<input type="file" name="file" id="file" accept=".csv" onchange="ValidateSingleInput(this);" required=" " />
    <br />
       </div>  </div>
       <br>
       <br>
       <br>
       <br>
         <div class="col-md-6 col-sm-6 offset-md-5">
    <input type="submit" name="import" class="btn btn-success" data-loading-text="Loading..."value="I M P O R T" />
     </div>
   </form>

   <br>
<?php 

echo $ustring; ?> <br> <?php  echo $vstring; ?> <br> <?php  echo $msg; ?> <br><?php  echo $dstring; ?> <br><?php  echo $error; ?> <br> <?php  echo $qstring; ?> <br>
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

<script>var _validFileExtensions = [".csv"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry! " + sFileName + " is invalid, allowed File types are : " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>
  </body>
</html>

