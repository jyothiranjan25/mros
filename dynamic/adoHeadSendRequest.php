<?php
include('../includes/dbconnection.php');
error_reporting(0); 
session_start();
if(isset($_POST['submit']))
{
   
$entity=$_SESSION['entity'];
  $hc=$_POST['hc'];
  $budget=$_POST['budget'];
$reason=$_POST['reason'];
$requested_by=$_SESSION['email'];



         $query=mysqli_query($con,"INSERT INTO `budgetrequests` (`entity`,`budget`,`hc`,`reason`,`requested_by`) VALUES('$entity','$budget','$hc','$reason','$requested_by')");  
 
 if ($query) {
  echo "<script>alert('Budget & HeadCount Requested Successfully...');</script>";
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
     .required{color: red}
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
                <h3>Request for Budget Change<small></small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
               <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="row">
              


              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                <h2>Fill the Following Details </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                         </li>
                      
                      
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="row">

                              <div class="col-form-label col-md-2 col-sm-3 label-align">
                                  <label  for="number"><b style="
                                    color: black;
                                ">Required Budget :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="budget" name="budget" required="required" class="form-control">
                              </div>
                          </div>
                          <br>
                          <div class="row">

                              <div class="col-form-label col-md-2 col-sm-3 label-align">
                                  <label  for="number"><b style="
                                    color: black;
                                ">Required HeadCount :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="hc" name="hc" required="required" class="form-control">
                              </div>
                          </div>
                          <br>
                          <div class="row">
      
                              <div class="col-form-label col-md-2 col-sm-3 label-align">
                                  <label  for="number"><b style="
                                    color: black;
                                ">Reason for Budget Change :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    <textarea id="reason" name="reason" required="required" class="form-control"  ></textarea>
                              </div>
                          </div>
                          <br>
                          <div class="col-md-2 offset-md-9">
                     <button name="submit" type="submit" class="btn btn-warning">Send Request</button>
                     </div>
                   
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
</form>
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