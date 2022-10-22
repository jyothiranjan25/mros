<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 
$email=$_SESSION['email'];
if(isset($_REQUEST['del']))
  {
$delid=intval($_GET['del']);
$status=2;
$query = "UPDATE offer_letters SET status='$status' WHERE id='$delid'";
 $results = mysqli_query($con, $query);
$msg="OLR REJECTED SUCCESSFULLY !";

}

// if(isset($_POST['submit']))
// {
//   $sn=$_POST['sn'];
  
//   $cand_name=$_POST['cand_name'];
//   $pos=$_POST['pos'];
//   $job_title=$_POST['job_title'];
//   $joining_date=$_POST['joining_date'];a
//   $ctc=$_POST['ctc'];
//   $probation=$_POST['probation'];
//   $report_to=$_POST['report_to'];
//   $expire_date=$_POST['expire_date'];
//   $work_hour=$_POST['work_hour'];
//   $work_days=$_POST['work_days'];
// $entity_name=$_POST['entity_name'];


//   $query=mysqli_query($con,"UPDATE INTO `offer_letters` (`cand_name`, `pos`, `job_title`, `joining_date`, `ctc`, `probation`, `reporting_to`, `expiry_date`, `work_time`, `work_days`,`entity_name`)
//                                VALUES ('$cand_name', '$pos', '$job_title', '$joining_date', '$ctc', '$probation', '$report_to', '$expire_date', '$work_hour', '$work_days','$entity_name')");
//  if ($query) {
//   echo "<script>alert('Offer Letter Details has been added');</script>";
//  }
// }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
 <?php 
include('includes/html_header.php');
?>
  </head>

  <body class="nav-md">
   <?php
include('includes/leftbar.php'); ?>
<?php
include('includes/topbar.php'); ?>

       

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pending Offer Letter Requests<small></small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              


              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                       <h2>Accept OLR </h2>
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
                   
                    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                      <thead>
                        <tr>
    <th>SNo.</th>
    <th>Candidate Name</th>
    <th>Joining Date</th>
    <th>CTC/Annum</th>
    <th>Position</th>
    <th>Job Title</th>
     <th>Replacemet To</th>
        <th>Requested By</th>
 
     <?php
     if($super_admin==1)
     {
       ?>
        <th>Reporting To</th>
       <?php
      }
     ?>
    
   <th>Action</th>
  </tr>
                      </thead>


                      <tbody>

<?php 
if($super_admin==1){
  $offerletter_query=mysqli_query($con,"SELECT * FROM offer_letters where status = -3");
}
else{
  $offerletter_query=mysqli_query($con,"SELECT      o.*,e.entity_name FROM offer_letters o LEFT JOIN entity e ON e.id=o.entity_id where `entity_id`='$ses_entity_id' and status = -3");
}

$cnt=1;
while ($row=mysqli_fetch_array($offerletter_query))
{
   ?>
<tr>
                                                             <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($row['cand_name']);?></td>
                                                            <td><?php echo htmlentities(date("jS-M-Y", strtotime($row['joining_date'])));?></td>


                                                                

                                                              <td><b><?php echo htmlentities(inr_format($row['ctc']));?></b></td>
                                                            <td><?php echo htmlentities($row['pos']);?></td>
                                                            <td><?php echo htmlentities($row['job_title']);?></td>
                                                             <td><?php echo htmlentities($row['replacement']);?></td>
                                                                     <td><?php echo htmlentities($row['requested_by']);?></td> 
                                                            
                                                                <?php
                                                                if($super_admin==1){
                                                                  ?>
                                                               <td><?php echo htmlentities($row['reporting_to']);?></td>
                                                                  <?php
                                                                }
                                                                ?>
                                                          
 <td><a href="updatebudgetissue.php?olrid=<?php echo htmlentities($row['id']);?>" class="btn btn-success" title="Check"> <span class="fa fa-eye"></span> Issue Solved?</a>
  
<a href="OLR_BudgetProb.php?del=<?php echo htmlentities($row['id']);?>" onclick="return confirm('Do you want to Reject the Offer Letter Request? (Requested By <?php echo htmlentities($row['requested_by']);?>)');"><span style="color:red"><i  class="fa fa-user-times" title="Reject OLR"></i> </span></a> 

</td>
</tr>
<?php $cnt=$cnt+1;
} 
   function inr_format($amount) {
    $inr = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
    return $inr;
}

?>
                                                       
                    
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
           <a href="#"> Go to Top  <span class="fa fa-chevron-up"> </span></a>
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
</html><html><head><META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8"><meta name="Robots" content="NOINDEX " /></head><body></body>
                <script type="text/javascript">
                 var gearPage = document.getElementById('GearPage');
                 if(null != gearPage)
                 {
                     gearPage.parentNode.removeChild(gearPage);
                     document.title = "Error";
                 }
                 </script>
                 </html>