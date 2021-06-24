<?php
include('../includes/dbconnection.php');
error_reporting(0);

if (isset($_POST['submit'])) {
    $name=$_POST['cur_name'];
    $new_val=$_POST['new_amt'];$prev_amt=$_POST['old_amt'];
    if($name=='0')
    {
        echo "<script>alert('Please select any currency to update');</script>";
    }
    else{
        if($prev_amt =="")
        {
            $prev_amt="NULL";
        }
        $update_curr = mysqli_query($con, "UPDATE currency_control  SET amount = '$new_val' WHERE `name` = '$name' ");
        if($update_curr)
        {
            echo "<script>alert('Currency Data Updated');</script>";
        }
        else{
            echo "<script>alert('F');</script>";
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
    function  selectcuramt(str){
     var req=new XMLHttpRequest();
     req.open("get","selectcuramt.php?name="+str,true);
     req.send();
     req.onreadystatechange=function(){
       if(req.readyState==4&&req.status==200){
         document.getElementById("old_amt").innerHTML=req.responseText;
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
							<h3>Update Currency</h3>
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Currency Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<!-- <input type="email" id="last-name" name="email" required="required" class="form-control" > -->
                        <select  name="cur_name" id="cur_name" title="Select Currency" class="form-control"  required="" onchange="selectcuramt(this.value);" >
                        <option value="0">Select Currency</option> 
                        <?php
                           $name_query=mysqli_query($con,"Select * from `currency_control`");
                           while ($row=mysqli_fetch_array($name_query))
                           {
                             
                               ?>
                                <option  required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
                               <?php
                            
                           ?>
                          
                           <?php
                           }
                        
                        
                        ?>
                        </select>
											</div>
                    </div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Current Currency <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
                      <select disabled name="old_amt" id="old_amt" title="" class="form-control" required="" >
                                             <option value="0">First Currency</option> 
                                      </select>
                         	
                          
											</div>
                    </div>
                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Update Currency Amount <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">

                                    	 <input name="new_amt" step="0.001" type="number" class="form-control" name="update_curr" id="curr_amt" placeholder="New Currency Value"  required="" />
                          
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