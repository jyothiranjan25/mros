<?php
include('../includes/dbconnection.php');



if(isset($_REQUEST['eid']))
  {
$eid=intval($_GET['eid']);
$status=1;

 $query=mysqli_query($con,"UPDATE budgetrequests SET status='$status' WHERE  id='$eid'");

 if ($query) {
  echo "<script>alert('Status Set to Accepted...');</script>";
 }

}

 ?>
  <?php

  if(isset($_REQUEST['nid']))
  {
$eid=intval($_GET['nid']);
$status=2;

 $query=mysqli_query($con,"UPDATE budgetrequests SET status='$status' WHERE  id='$eid'");

 if ($query) {
  echo "<script>alert('Status Set to Rejected...');</script>";
 }
}



   ?>

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MROS </title>

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
                <h3>List of Requested Budget Change <small></small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              


              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                         <h2> Details of the requests </h2>
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
                   
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
    <th>SNo.</th>

    <th>Budget Requested</th> 
  <th>HeadCount Required</th>
      <th>Requested On</th>
     <th>Reason for the Request</th>
      <th>Requested By</th>
        <th>Entity</th>
        <th>Status</th>



  </tr>
                      </thead>


                      <tbody>
<?php 

$offerletter_query=mysqli_query($con,"SELECT * FROM budgetrequests");
$cnt=1;
while ($row=mysqli_fetch_array($offerletter_query))
{
   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                           


                                                      
                                                                

                                                              <td><b><?php echo htmlentities(number_format($row['budget'],2));?></b></td>
                                                            <td><?php echo htmlentities($row['hc']);?></td>
                                                                  <td><?php echo htmlentities(date("jS-M-Y", strtotime($row['date'])));?></td>
                                                            <td><?php echo htmlentities($row['reason']);?></td>
                                                           
                                                                  <td><?php echo htmlentities($row['requested_by']);?></td>
                                                                                    <td><?php echo htmlentities($row['entity']);?></td>
<?php if($row['status']==0)
{
  ?><td><a class="btn btn-primary" style="color: white" href="requestedBudget.php?eid=<?php echo htmlentities($row['id']);?>" onclick="return confirm('MARK THE REQUEST AS ACCEPTED')" >Accept ?</a>
</td>
<?php } elseif($row['status']==1) {?>

<td><a class="btn btn-success" style="color: white"href="requestedBudget.php?nid=<?php echo htmlentities($row['id']);?>" onclick="return confirm('MARK THE REQUEST AS REJECTED')" >Accepted</a>
</td>
<?php } elseif($row['status']==2) {?>

<td><a class="btn btn-danger" style="color: white"href="requestedBudget.php?eid=<?php echo htmlentities($row['id']);?>" onclick="return confirm('MARK THE REQUEST AS ACCEPTED')" >Rejected</a>
</td>




<?php } ?>
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