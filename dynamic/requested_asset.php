<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 
$page=$_SESSION['entity'];
$dep=$_SESSION['dep'];
if(isset($_POST['submit']))
{
    
    $name=$_POST['name'];
    $asset_name=$_POST['assetname'];
    $asset_id=$_POST['assetnameid'];
   $status=2;
   
         $create=mysqli_query($con,"CREATE TABLE `$roles` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `email` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB");
         $insert=mysqli_query($con,"UPDATE asset_report SET status='$status',`asset_id`='$asset_id' WHERE `name`='$name' and `asset`='$asset_name'");
        if($insert)
        {
          echo "<script>alert('".$asset_name." is now has an asset id ".$asset_id."');</script>";
        }
        else
        {
          echo "<script>alert('AS DONE');</script>";
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
    <link rel="icon" href="images/ifim_logo.jpg" type="image/ico" />
    <title>MROS  | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
   
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>
      .site_title{
         overflow: inherit;
     }
     .nav_title{
         height: 198px;
         margin-top: -59px;
     }
 </style>
<script>
    function  selectasset(str){
     var req=new XMLHttpRequest();
     req.open("get","assetname.php?name="+str,true);
     req.send();
     req.onreadystatechange=function(){
       if(req.readyState==4&&req.status==200){
         document.getElementById("assetname").innerHTML=req.responseText;
       }
     }
    } 
    </script>


  </head>

  <body class="nav-md">
       <?php
include('includes/leftbar.php'); 
include('name.php'); 
  ?>
<?php
include('includes/topbar.php'); 
?>
      <!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Requested Assets </h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
									
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<!-- <form action="" method="post" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input name="depname" type="text" id="first-name" required="required" class="form-control ">
											</div>
										</div>


										


									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button name="submit" type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form> -->


                  <form name="add_name" id="add_name" method="POST">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dynamic_field">
                        <tr>
                          <td>
                          
                            
                              <select name="name" class="form-control"  required="" onchange="selectasset(this.value);">
                                        <option value="0">Select Employee Name</option>
                                                      <?php
                                                              $status="1";
                                                              $asset_query=mysqli_query($con,"Select Distinct name from `asset_report` WHERE `job_title`='$dep' and `status`='$status' ");
                                                              if($asset_query){
                                                                
                                                              while ($row=mysqli_fetch_array($asset_query))
                                                                  {

                                                                    ?>
                                                                        <option  required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                                    <?php
                                                                  }

                                                              }
                                                      ?>
                              </select>
                          </td>

                          <td>
                          
                            
                          <select  name="assetname" id="assetname" title="Select a Position" class="form-control"  required="">
                                                <option value=0>First Select Name</option>
                          </select>
                      </td>



                        <td>
                            <input type="text" name="assetnameid" placeholder="Enter Asset Id" class="form-control name_list" />
                        </td>
                          <td>  <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /></td>
                        </tr>
                      </table>
                    
                    </div>
			          	</form>
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
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>




