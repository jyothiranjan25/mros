<?php
include('../includes/dbconnection.php');
error_reporting(0);
if(isset($_REQUEST['olrid']))
{
$olr_id=intval($_GET['olrid']);

   $status=5;



    $query=mysqli_query($con,"UPDATE `offer_letters` set  `status`='$status' where `id`='$olr_id'");
     if ($query) {
  echo "<script>alert('Offer Letter Details sent Successfully...');</script>";
 }
 else 
{
 echo "<script>alert('Something went wrong:( Please try once more...!');</script>";
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

    <title>MROS </title>

  <?php 
include('includes/html_header.php');
?>
  </head>

  <body class="nav-md">
    <?php
include('includes/leftbar.php'); 
  ?>
<?php
include('includes/topbar.php'); 
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Feedbacks from New Employees</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              


              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                   <h2> Oboarding & Induction Feedback</h2>
                    <ul class="nav navbar-right panel_toolbox">  
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

      <th>Candidate Name</th>                 
      <th>Entity</th>  
      <th>Mail Id</th>
        <th>Result </th>
    <th>Comments</th>
  
  
   
    <th>Details</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        $feedback=mysqli_query($con,"SELECT * FROM feedback");



$cnt=1;
while ($row=mysqli_fetch_array($feedback))
{

   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            
                                                            <td><?php echo htmlentities($row['name']);?></td>
                                                            <td><?php echo htmlentities($row['entity']);?></td>
                                                            <td><?php echo htmlentities($row['mail_id']);?></td>






                                                            <td><?php echo htmlentities($row['q1']+$row['q2']+$row['q3']+$row['q4']+$row['q5']+$row['q6']+$row['q7']+$row['q8']+$row['q9']+$row['q10']+$row['q11']+$row['q12']+$row['q13']+$row['q14']);?> / 70</td>
                                                            
                                                            <td><?php echo $row['comments']=="" ? "No Comments" : $row['comments'] ?></td>
                                                           
                                                       

 

  <td><a href="feedbackShow.php?formid=<?php echo htmlentities($row['sn']);?>" class="btn btn-primary" ><i class="fa fa-eye" aria-hidden="true"></i> View Results </a></td>

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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
</html>