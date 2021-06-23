<?php

include('../includes/dbconnection.php');
error_reporting(0);
$count=0;
include('includes/leftbar.php');
session_start(); 
$mail_id=$_SESSION['email'];
// $asset_name="";
if(isset($_POST['submit']))
{
  $asset_array=$_POST["assetname"];
 
  
  
          if(count($asset_array)>0)
          {
            for($i=0;$i<count($asset_array);$i++)
                {
                  
                  // $query = "UPDATE `asset_report` SET `$asset_array[$i]`='3' WHERE `name`='$username'";
                  // $results = mysqli_query($con, $query);
                  
                }
                $msg="Sucessfull";
                  echo '<script type="text/javascript">'; 
                  echo 'alert("'.$msg.'");'; 
                  echo '</script>';
          }
          else
          {
            $query = "Select * from `asset`";
            $results = mysqli_query($con, $query);
            
            
                while ($row=mysqli_fetch_array($results))
                {
                    $assetname=$row['name'];
                    $assetquery = "Select `$assetname` from `asset_report` WHERE name='$username' and `$assetname`='3'";
                    $asset_results = mysqli_query($con, $assetquery);
                    if(mysqli_num_rows($asset_results) == 0)
                    { 
                      $msg="You have not checked all recieved assets";
                    }
                    else{
                      $msg="You have checked all recieved assets";
                    }
                  }
        
            echo '<script type="text/javascript">'; 
            echo 'alert("'.$msg.'");'; 
            echo '</script>';
          }
  
  // else
  // {
  //   $msg="You have  checked all recieved assets";
  //   echo '<script type="text/javascript">'; 
  //   echo 'alert("'.$msg.'");'; 
  //   echo '</script>';
  // }

       
            

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/php; charset=UTF-8">
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
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
        .site_title{
            overflow: inherit;
        }
        .nav_title{
            height: 198px;
            margin-top: -59px;
        }
        h1{
          font-size:24px;
        }
        .x_content h4,label{
          font-size:21px;
        }
    </style>
     <script>
    // function  checking(str){
    //  var req=new XMLHttpRequest();
    //  req.open("get","update_asset.php?val="+str,true);
    //  req.send();
    //  req.onreadystatechange=function(){
    //    if(req.readyState==4&&req.status==200){
    //      //document.getElementById("change").innerHTML=req.responseText;
    //    }
    //  }
    // } 
    </script>
  </head>

  <body class="nav-md">
   <?php
 ?>
<?php
include('includes/topbar.php'); ?>

        <!-- page content -->
            <div class="right_col" role="main">
            <!-- top tiles -->
           
          <!-- /top tiles -->

          
          <br />
<form action="<?php echo $_SERVER["PHP_SELF"];  ?>" method="POST">
          <div class="row">


            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Entitlment</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                   
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <?php
                            $query = "Select * from `asset`";
                            $results = mysqli_query($con, $query);
                            
                            
                                while ($row=mysqli_fetch_array($results))
                                {
                                    $assetname=$row['name'];
                                    // $assetquery = "Select `$assetname` from `asset_report` WHERE name='$username' and `$assetname`='2'";
                                    // $asset_results = mysqli_query($con, $assetquery);
                                    if(mysqli_num_rows($asset_results) > 0)
                                    { 

                                          while ($rows=mysqli_fetch_array($asset_results))
                                          {
                                                  if($rows[$assetname]==2)
                                                  {
                                                      ?>
                                                      
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                          <h4><?php echo $assetname ?></h4> 
                                                          
                                                          </div>
                                                          <div class="col-md-6">
                                                              <label>
                                                                  <input name="assetname[]" value="<?php echo $assetname; ?>" type="checkbox" class="js-switch"  /> <span>Received</span>
                                                                 
                                                              </label>
                                                          </div>
                                                      </div>
                                                      <br>
                                                      <?php
                                                  }
                                          }

                                    }
                                    else{
                                    //   $assetquery = "Select `$assetname` from `asset_report` WHERE name='$username' and `$assetname`='1'";
                                    // $asset_results = mysqli_query($con, $assetquery);
                                    if(mysqli_num_rows($asset_results) > 0)
                                    { 
                                      $output="<h1>".$assetname." has not provided by department."."</h1><br>";
                                    }
                                    else
                                    {
                                      $output="<h1>".$assetname." has been recieved by you."."</h1><br>";
                                    } 
                                      echo $output;
                                    }
                                            
                                    
                                }
                                
                        ?>


                    
                
                        <br>
                        
                      
                </div>
              </div>
            </div>

           
          <!-- //  onchange="checking(this.value);" -->
           
          </div>


          <div class="row" style="margin-top:40px;">
              <div class="col-md-6 offset-md-6">
                <button type="submit" name="submit" value="SUBMIT" class="btn btn-info btn-lg" style="padding: 16px;
                width: 194px;border-radius: 10px;background-color: #3f51b5;">SUBMIT</button>
              </div>
          </div>
        </div>
  </form>
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
