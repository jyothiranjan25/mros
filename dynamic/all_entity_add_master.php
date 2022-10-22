<?php
include('../includes/dbconnection.php');
error_reporting(0);


if(isset($_POST['submit']))
{
  
    $entity_data=mysqli_query($con,"SELECT * from `entity`");
    while ($data=mysqli_fetch_array($entity_data))
    {
            $entity=$data['entity_name'];
            $dep_page=strtolower($page."_Dep");
            $role_page=strtolower($page."_Role");
            $table=strtolower($page."_Emp");
            $new_table=strtolower($page."_New_Emp");
                    // $role=$_POST['roles'];
                    $name=$_POST['username'];
                    $mail=$_POST['email'];
                    $emp_id=$_POST['emp_id'];
                    $role=$_POST['role'];
                    $dep=$_POST['dep'];


                        $insert=mysqli_query($con,"INSERT INTO `$table` (`name`, `email`,`emp_id`,`role`,`dep`) VALUES ('$name', '$mail','$emp_id','$role','$dep')");
                        if($insert)
                        {
                        
                        
                    
                            echo "<script>alert('".$name." is now a ".$role." of ".$dep." department of ".$page."');</script>";
                            $newemp=mysqli_query($con,"INSERT INTO `$new_table` (`name`, `email`,`emp_id`,`role`,`dep`) VALUES ('$name', '$mail','$emp_id','New Employee','$dep')");
                        }
                        $detail_query=mysqli_query($con,"SELECT * from `offer_letters` WHERE status='8' and cand_name='$name'");
                        $details=mysqli_fetch_array($detail_query);
                        $emp_status=10;$date=$details['joining_date'];$ctc=$details['ctc'];
                        $insert_employee_table=mysqli_query($con,"INSERT INTO `employee_details` (`emp_id`,`name`,`entity`,`pos`,`job_title`,`email`,`joining_date`,`ctc`,`status`) 
                                                                                VALUES ('$emp_id','$name','$page','$role','$dep','$mail','$date','$ctc','$emp_status')");
                    $status=9;$curr_date=date("Y-m-d");
                    $query = "UPDATE offer_letters SET status='$status' and date_sent='$curr_date' WHERE `cand_name`='$name'";
                    $results = mysqli_query($con, $query);

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
  ?>
<?php
include('includes/topbar.php'); 
?>
      <!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Add Masters of <?php echo $page;  ?></h3>
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
									<form action="" method="post" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
                        <!-- <input name="username" type="text" id="first-name" required="required" class="form-control "> -->
                        <select  name="username" id="username" title="Select  username" class="form-control"  required="">
                        <?php
                           $name_query=mysqli_query($con,"Select * from `offer_letters` WHERE status='8'");
                           while ($row=mysqli_fetch_array($name_query))
                           {
                           ?>
                           <option  required="required" value="<?php echo  $row['cand_name']; ?>"><?php echo $row['cand_name']; ?></option>
                           <?php
                           }
                        
                        
                        ?>
                        </select>
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email-id <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" id="last-name" name="email" required="required" class="form-control" >
											</div>
                    </div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Employee Id <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="emp-id" name="emp_id" required="required" class="form-control">
											</div>
                    </div>


                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Roles<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                    <select  name="role" id="roles" title="Select a Role" class="form-control"   required="">
                                                    <?php
                                                    
                                                                                    $entity_query=mysqli_query($con,"Select * from `$role_page`");
                                                                                    while ($row=mysqli_fetch_array($entity_query))
                                                                                    {
                                                                                      if($row['new_emp']!=1){

                                                                                     
                                                                                    ?>
                                                                                    <option  required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                                                    <?php
                                                                                      }
                                                                                    }
                                                        ?>
                                                    </select>
                                                    
                   
							                </div>
                    </div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Department <span class="required">*</span>
	</label>
											<div class="col-md-6 col-sm-6 ">
                   
                      
                                                    <select  name="dep" id="dep" title="Select Department" class="form-control"  required="">
                                                    
                                                    <?php
                                                    
                                                                                    $entity_query=mysqli_query($con,"Select * from `$dep_page`");
                                                                                    while ($row=mysqli_fetch_array($entity_query))
                                                                                    {
                                                                                    ?>
                                                                                    <option  required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                                                    <?php
                                                                                    }
                                                        ?>
                                                    </select>      
                                            </div>
                                            
                    </div>

                     
                    <!-- <div class="col-md-6 col-sm-6 ">


                                        <label  for="number"><b> Replacement to</b><span class="required">*</span>
                                        </label> 



                                      <select  name="replaceTo" id="replaceTo" title="Select an Entity" class="form-control" onchange='CheckColors(this.value);' required="">
                                        <option value="New Employee">New Employee</option> 
                                        <option value="others">Others</option>
                                            </select>
                                            <input type="text" class="form-control" name="replacement" id="replacement" value="New Employee" style='display:none;' required="" />




                      </div> -->
									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button name="submit" type="submit" class="btn btn-success">Submit</button>
											</div>
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
    <script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('dep');
 if(val=='Cordinator' || val=='Program_Head'  ){
  element.value='';
   element.style.display='block';

  }
 else  {
   element.value=val;
   element.style.display='none';

  }
}


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