<?php
include('../includes/dbconnection.php');
error_reporting(0);
$emp_id=$_GET['emp_id'];
$joining_date=$_GET['joining_date'];


?>
<?php

if (isset($_POST['submit'])) {
  
  $number = count($_POST["value"]);
  for($i=0; $i<$number; $i++)
  {
    if(trim($_POST["value"][$i] != ''))
    {
      $s = 0;
      $d = "";
      $sql = "UPDATE `assets` SET `status`='$s', `assigned_date`='$d' WHERE `asset_id` = '".mysqli_real_escape_string($con, $_POST["value"][$i])."'";
      mysqli_query($con, $sql);

      
    }
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
    <link href="../build/css/custom.min.css" rel="stylesheet">    <link href="../build/css/input.css" rel="stylesheet">

   
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
							<h3>Edit assets for EMPLOYEE ID: <?php echo $emp_id;  ?> </h3>
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


                  
                    <div class="table-responsive">
                    	<form method="post">
                      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      	<thead>
                      		<tr>
                      			<th>SN.</th>
                      			<th>ASSET NAME</th>
                      			<th>ASSET ID</th>
                      			<th>ASSIGNED DATE</th>
                      			<th>REMOVE</th>
                      		</tr>
                      	</thead>
                      	<tbody>
                      	<?php
                      			$count = 1;
								$dep = $_SESSION['dep'];
                $candidate_entity = $_SESSION['entity'];
								$query=mysqli_query($con,"SELECT * FROM `assets` WHERE `dept`='$dep' AND `emp_id`='$emp_id' AND `entity`='$candidate_entity' AND `status`=1 ");
								while ($row=mysqli_fetch_array($query))
									{ 
								?>
                        <tr>
                        	<td><?php echo $count; ?></td>
                          <td><input type="text" name="name[]" readonly value="<?php echo $row['asset_name']; ?>" class="form-control"/></td>
                          <td><input type="text" name="id[]" value="<?php echo $row['asset_id']; ?>" class="form-control" readonly /></td>
                 			    <td><input type="text" name="date[]" value="<?php echo $row['assigned_date']; ?>" class="form-control" readonly /></td>
                          <td><input type="checkbox" value="<?php echo $row['asset_id']; ?>" name="value[]"></td>
                        </tr>
                        <?php
                    				$count++;
                    				}
                    		?>
                    	</tbody>
                      
                      </table>
                      <br>
              		<br>
                  <input type="submit" name="submit" class="btn btn-success"/>
                  </form>
                      
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