<?php
include('../includes/dbconnection.php');
error_reporting(0);

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['mailid']);
  unset($_SESSION['role']);
  unset($_SESSION['entity']);
  header("location: index.php");
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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      body{
        background-color: rgb(22 69 241 / 84%);
}


      p{
        margin-top:50%;
        margin-left:70%;  
        width: 717px;
        display: inline-block;
        border-top: 4px double rgba(42,63,84,0.5);
        border-bottom: 4px double rgba(42,63,84,0.5);
      }
      p span{
        margin-left: 140px;
        font: 700 4em/1 "Oswald", sans-serif;
        letter-spacing: 0em;
        padding: .25em 0 .325em;
        display: block;
        text-shadow: 0 0 80px rgba(42,63,84,1);
        background: url(images/text_back.jpg) repeat-y;
        background-clip: text;
     
  -webkit-background-clip: text;
        color: transparent;
        animation: anim 10s linear infinite;
        -webkit-animation: anim 10s linear infinite;
        -webkit-transform: translate(0,0,0);
        transform: translate(0,0,0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
      }
      @keyframes anim{
        0%{
          background-position: 0% 50%;
        }
        50%{
          background-position: 50% 50%;
        }
        100%{
          background-position: 100% 50%;
        }
      }
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
include('includes/leftbar.php'); 
  ?>
<?php
include('includes/topbar.php'); 
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
              <!-- <div class="row" style="display: inline-block;" >
                  <p >
                    <span style="font-size: 62px;">WELCOME HR HEAD</span>
                  </p>
             
              </div> -->
          <!-- /top tiles -->

          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <!-- <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div> -->
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
