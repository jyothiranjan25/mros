<?php
include('../includes/dbconnection.php');
error_reporting(0);

$entity=$_SESSION['entity'];
if(isset($_POST['submit']))
{
    
    $type=$_POST['pos_type'];
    $name=$_POST['pos'];
   $entitlement=$_POST['entitlement'];
   
  $insert=mysqli_query($con,"UPDATE `position` SET `$entitlement`='1' WHERE `type`='$type' and `name`='$name'");
     if($insert){
        echo "<script>alert('".$name." is now a entitled with ".$entitlement."');</script>";
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
    function  selectposition(str){
     var req=new XMLHttpRequest();
     req.open("get","position.php?type="+str,true);
     req.send();
     req.onreadystatechange=function(){
       if(req.readyState==4&&req.status==200){
         document.getElementById("pos").innerHTML=req.responseText;
       }
     }
    } 
    </script>

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
							<h3>Assign Entitlement For <?php echo $_SESSION['entity'];  ?> </h3>
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
                                   
                                    <div class="row">

                                            <div class="col-form-label col-md-2 col-sm-3 label-align">
                                                <label  for="number"><b>Position Type:</b><span class="required">*</span></label> 
                                            </div>
                                            <div class="col-md-6 col-sm-6 ">
                                                
                                            <select  name="pos_type" id="pos_type" title="Select a Entity" class="form-control"  required="" onchange="selectposition(this.value);">
                                                <option value="0">Select Position Type</option>
                                            <?php

                                                    $entity_query=mysqli_query($con,"Select Distinct type from `position` ");
                                                    while ($row=mysqli_fetch_array($entity_query))
                                                        {
                                                        ?>
                                                            <option  required="required" value="<?php echo  $row['type']; ?>"><?php echo $row['type']; ?></option>
                                                        <?php
                                                        
                                                        }
                                            ?>
                                            </select>
                                                <br>


                                                <select  name="pos" id="pos" title="Select a Position" class="form-control"  required="">
                                                <option value=0>First Select Position Type</option>
                                                </select>

                                         </div>

                                   </div>
                                   <br>
                                   <div class="container-fluid">
                                        <div class="row">

                                                <div class="col-form-label col-md-6 col-sm-3 label-align">
                                                    <label style="font-size:16px;"  for="number"><b>Entitlement:</b><span class="required">*</span></label> 
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                               <div class="col-form-label col-md-6 offset-md-2 col-sm-3 label-align">
                                                    <select  name="entitlement" id="entitlement" title="Select a Entitlement" class="form-control"  required="" >
                                                        
                                                        <?php

                                                                $entity_query=mysqli_query($con,"Select Distinct name from `asset` ");
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
                                      
                                   </div>
                                  
                                        <br>
                                        
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                                        
												<button name="submit" type="submit" class="btn btn-success">Assign</button>
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