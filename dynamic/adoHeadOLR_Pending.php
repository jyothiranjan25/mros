<?php
include('../includes/dbconnection.php');
error_reporting(0);
if(isset($_REQUEST['del']))
  {
$delid=intval($_GET['del']);
$message_query=mysqli_query($con,"Select * from `offer_letters` WHERE id='$delid'");
$message_data=mysqli_fetch_array($message_query);
        // $subject="OFFER LETTER";
        // $title="offer letter submission to ". $message_data['reporting_to'];
        // $message="<h3>Offer Letter Details</h3><br><p>Dear.</p><br><p>It is to inform you that a new offer letter which has been requested by ,".$message_data['requested_by'].",is now accepted from ".$message_data['reporting_to']."</p>";
                
                
        // $noti_query=mysqli_query($con,"INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$requested_by', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");
              



$status=-2;
$offerletter_query=mysqli_query($con,"UPDATE offer_letters SET status=$status WHERE id=$delid");

}

// if(isset($_POST['submit']))
// {
//   $sn=$_POST['sn'];
  
//   $cand_name=$_POST['cand_name'];
//   $pos=$_POST['pos'];
//   $job_title=$_POST['job_title'];
//   $joining_date=$_POST['joining_date'];
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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MROS | </title>

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
     <!-- <th>Reporting To</th> -->
    <th>Requested By</th>
    <th>Offer Letter</th>
        <th>Reject</th>
  </tr>
                      </thead>


                      <tbody>

<?php 

$offerletter_query=mysqli_query($con,"SELECT * FROM offer_letters where reporting_to='$username' and status = 0");
$cnt=1;
while ($row=mysqli_fetch_array($offerletter_query))
{
   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($row['cand_name']);?></td>
                                                            <td><?php echo htmlentities(date("jS-M-Y", strtotime($row['joining_date'])));?></td>
                                                                

                                                              <td><b><?php echo htmlentities(number_format($row['ctc'],2));?></b></td>
                                                            <td><?php echo htmlentities($row['pos']);?></td>
                                                            <td><?php echo htmlentities($row['job_title']);?></td>
                                                             <td><?php echo htmlentities($row['replacement']);?></td>
                                                              
                                                                  <td><?php echo htmlentities($row['requested_by']);?></td>
   <td>
<a href="adoEditOLR.php?olrid=<?php echo htmlentities($row['id']);?>" class="btn btn-primary" onclick="return confirm('Do you want to Accept the Offer Letter Request? (Requested By <?php echo htmlentities($row['requested_by']);?>)');"> ACCEPT</a></td>
<td>
<a href="adoHeadOLR_Pending.php?del=<?php echo htmlentities($row['id']);?>" class="btn btn-danger" onclick="return confirm('Do you want to reject the Offer Letter Request? (Requested  By <?php echo htmlentities($row['requested_by']);?>)');"> REJECT</a></td>
<!-- <td>
<a href="edit-user.php?adminid=<?php echo htmlentities($row['usr_id']);?>"><i class="fa fa-edit" title="Edit Record"></i> </a> 

</td> -->
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