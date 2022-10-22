<?php
include('../includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
    
    $name=$_POST['entityname'];

   $sql = mysqli_query($con, "SELECT `name` FROM `entity` WHERE `entity_name`='$name'");
      $check=mysqli_num_rows($sql);
      $filez=mysqli_fetch_array($sql);

if(!($check>0)){
         $insert=mysqli_query($con,"INSERT INTO `entity` (`entity_name`) 
         VALUES ('$name')");
       if($insert){
$name = str_replace(" ","_",$name);
            echo "<script>alert('".$name." added successfully!');</script>";
    $dep_name=strtolower($name."_Dep");
    $emp_name=strtolower($name."_Emp"); $new_emp_name=strtolower($name."_New_Emp");
    $role_name=strtolower($name."_Role");
    $trans_name=strtolower($name."_transaction");
       $hc_name=strtolower($name."_headcount");
       $template_name=strtolower($name."_templates");

    $add_entity_new_emp=mysqli_query($con,"CREATE TABLE `$new_emp_name` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `email` VARCHAR(20) NOT NULL ,`emp_id` VARCHAR(20) NOT NULL , `role` VARCHAR(20) NOT NULL , `dep` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");  

if(!$add_entity_new_emp){
   $error = "----------------------------------------------------------->Error Description: " . mysqli_error($con);
        echo $error;
        echo "<script> alert('Something Gone Wrong!');</script>";
}


  $create_template_table=mysqli_query($con,"CREATE TABLE `$template_name` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `template_name` VARCHAR(100) NOT NULL ,`header` TEXT  NULL ,`html` TEXT NOT NULL ,,`footer` TEXT  NULL , PRIMARY KEY (`id`), UNIQUE(`template_name`)) ENGINE = InnoDB;");


  $add_entity_emp=mysqli_query($con,"CREATE TABLE `$emp_name` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `email` VARCHAR(20) NOT NULL ,`password` TEXT NOT NULL,`emp_id` VARCHAR(20) NOT NULL , `role` VARCHAR(20) NOT NULL , `dep` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
  $add_entity_dep=mysqli_query($con,"CREATE TABLE `$dep_name` ( `name` VARCHAR(20) NOT NULL , PRIMARY KEY (`name`)) ENGINE = InnoDB;");
  $add_entity_role=mysqli_query($con,"CREATE TABLE `$role_name` ( `id` INT(2) NOT NULL AUTO_INCREMENT ,`name` VARCHAR(20) NOT NULL , `generate_olr` INT(2) NOT NULL ,
   `accept_reject_olr` INT(2) NOT NULL , `approve_olr` INT(2) NOT NULL , `olr_sent_to_cand` INT(2) NOT NULL , 
   `view_olr` INT(2) NOT NULL, `accounts` INT(2) NOT NULL , `asset_req_manage` INT(2) NOT NULL , `super_admin` INT(2) NOT NULL , `new_emp` INT(2) NOT NULL   ,`IT` INT(2) NOT NULL   ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;");
 $add_entity_trans=mysqli_query($con,"CREATE TABLE `$trans_name` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `budget` VARCHAR(100) NOT NULL , `hc` VARCHAR(100) NOT NULL , `reason` TEXT NOT NULL ,`date` TIMESTAMP(6) on update CURRENT_TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6), PRIMARY KEY (`id`)) ENGINE = InnoDB;"); 

$add_entity_hc=mysqli_query($con,"CREATE TABLE `$hc_name` ( `id` INT(200) NOT NULL AUTO_INCREMENT , `position` VARCHAR(200) NOT NULL , `month` INT(11) NOT NULL , `hc` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB"); 
       }

}else{
    echo "<script>alert('".$name." is an entity, please add with another name!');</script>";
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
    <title>MROS  | Add Entity</title>

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

     <link href="../build/css/input.css" rel="stylesheet">
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
							<h3>Add Entity </h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									
									<ul class="nav navbar-right panel_toolbox">
								<br>  <br>  
										
									
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form action="" method="post" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Name of the entity: <span style="color:red">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input name="entityname" type="text" required="required" class="form-control" title="Adding entity results in creating tables. You have to add departments, roles, positions, masters, offerletter templates etc., for this particular entity." placeholder="Ex: IFIM College">
											</div>
										</div>
     					
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-secondary" type="reset">Reset</button> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
												<button name="submit" type="submit" class="btn btn-primary" >Add Entity</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

					


				
				</div>
			</div>

        <footer>
     
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