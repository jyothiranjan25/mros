<?php
include('../includes/dbconnection.php');
error_reporting(0);
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
                <h3>OFFER LETTERS TO BE SEND</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              


              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                   <h2> APPROVED OFFER LETTERS</h2>
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
                          <th>Candidate Name</th>
                          
                          <th>Job Title</th>
                          <th>Asset</th>
                          <th>Status</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        // $query = "Select * from `asset`";
                        // $results = mysqli_query($con, $query);
                        // $cnt=1;
                        //   while ($rows=mysqli_fetch_array($results))
                        //     {
                        //             $assetname=$rows['name'];
                        //             $status="";
                        //             // $asset_query=mysqli_query($con,"SELECT * FROM asset_report ");
                                    
                                                                   
                        //             while ($row=mysqli_fetch_array($asset_query))
                        //             {
                        //               if($row[$assetname]==2)
                        //               {
                        //                 $status=$row['name']." (New Employee) has not yet confirmed";
                        //               }
                        //               elseif ($row[$assetname]==1) {
                        //                 # code...
                        //                 $status=$row['job_title']." has not yet assigned the ".$assetname." to ".$row['name'];
                                        
                        //               }
                        //               elseif ($row[$assetname]==3) {
                        //                 # code...
                        //                 $status=$row['name']." has been assigned the ".$assetname;
                                        
                        //               }
                        //                         //$title=$row['job_title'];
                        //                     ?>
                        //                     <tr>
                        //                                                                                 <td><?php echo htmlentities($cnt);?></td>
                        //                                                                                 <td><?php echo htmlentities($row['name']);?></td>
                        //                                                                                 <td><?php echo htmlentities($row['job_title']);?></td>
                        //                                                                                 <td><?php echo htmlentities($assetname);?></td>
                        //                                                                                 <td><?php echo htmlentities($status);?></td>
                        //                     </tr>
                        //                     <?php 
                        //                 $cnt=$cnt+1;
                        //             }
                        //     }

                        //             ?>
                         
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