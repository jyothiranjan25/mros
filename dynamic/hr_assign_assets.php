<?php
include('../includes/dbconnection.php');
error_reporting(0);
$emp_id=$_GET['emp_id'];
$employee_entity1 = $_GET['employee_entity'];
$employee_entity = strtolower($_GET['employee_entity']." dep");
// if(isset($_POST['submit']))
// {
    
//     $name=$_POST['depname'];
   
//        $dep_page=$page." Dep";
//          // $create=mysqli_query($con,"CREATE TABLE `$roles` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `email` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB");
//           $insert=mysqli_query($con,"INSERT INTO `$dep_page` (`name`) VALUES ('$name')");
       
//           echo "<script>alert('".$name." is A Department of ".$page."');</script>";
   
  
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
							
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h3>Add assets for EMPLOYEE: <?php echo $emp_id;  ?> </h3>
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


                  <form name="add_name" id="add_name" method="post" action="hr_insert_assets.php?emp_id=<?php echo $emp_id; ?>&employee_entity=<?php echo $employee_entity1;?>">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dynamic_field">
                        <tr>
                        	<td><select  name="department[]" title="Select Department" class="form-control"  required="">
		                   
		                  <?php
		                                                    
		                        $entity_query=mysqli_query($con,"SELECT `name` FROM `$employee_entity`");
		                           while ($row=mysqli_fetch_array($entity_query))
		                               {
		                               ?>
		                                   <option required="required" value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
		                              <?php
		                              }
		                  ?>
		                </select></td>
                          <td><input type="text" name="name[]" placeholder="Enter Asset Name " class="form-control name_list" list="assets" required="" />
							<datalist id="assets">
								<?php
								$query=mysqli_query($con,"SELECT DISTINCT `asset_name` FROM `assets`");
								while ($row=mysqli_fetch_array($query))
									{ 
								?>
							<option><?php echo $row['asset_name'];?></option>
							<?php 	
									}
							?>
							</datalist></td>
                          <!-- <td><input type="text" name="id[]" placeholder="Enter Asset ID " class="form-control name_list" /></td> -->
                          <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                      </table>
                      <input type="submit" name="insert" id="submit" class="btn btn-info" value="Submit" />
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
          
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <script type="text/javascript">


	$(document).ready(function(){
		var i=1;
		$('#add').click(function(){
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td><select name="department[]" title="Select Department" class="form-control"  required=""><?php $entity_query=mysqli_query($con,"SELECT `name` FROM `$employee_entity`"); while ($row=mysqli_fetch_array($entity_query)){ ?><option required="required" value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option><?php } ?></select></td><td><input type="text" name="name[]" placeholder="Enter Asset Name " class="form-control name_list" list="assets" required=""/><datalist id="assets"><?php $query=mysqli_query($con,"SELECT DISTINCT `asset_name` FROM `assets`"); while ($row=mysqli_fetch_array($query)) { ?><option><?php echo $row['asset_name'];?></option><?php } ?></datalist></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
		});
		// <td><input type="text" name="id[]" placeholder="Enter Asset ID " class="form-control name_list" /></td>
		$(document).on('click', '.btn_remove', function(){
			var button_id = $(this).attr("id"); 
			$('#row'+button_id+'').remove();
		});
		
		
		
	});
</script>

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