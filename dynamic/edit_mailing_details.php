<?php
include('../includes/dbconnection.php');
error_reporting(0);

if (isset($_POST['submit'])) 
{
  
  $email = $_POST["email"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM `hr_email`";
  $query = mysqli_query($con, $sql);
  $flag = 1;
  $flag = mysqli_num_rows($query);
  if ($flag == 0) {
    $sql = "INSERT INTO `hr_email` (`email`,`password`) VALUES ('$email','$password')";
    mysqli_query($con, $sql);
  }
  else
  {
    $sql = "UPDATE `hr_email` SET `email` = '$email',`password` = '$password'";
    mysqli_query($con, $sql);
  }

  if ($sql) {
    echo "<script>alert('Mailing details updated successfully.');</script>";
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
  <script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
  </head>

  <body class="nav-md">
<?php
	include('includes/leftbar.php');  
	include('includes/topbar.php'); 
?>
      <!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h3>Edit Mailing Details</h3>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
									
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
                    
                    	<form method="post">
                      
                      	<?php
            								$query=mysqli_query($con,"SELECT * FROM `hr_email` ");
            								$row=mysqli_fetch_array($query);
            							?>
                        
                <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="id"><b>Email ID:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                              <input name="email" id="email" type="email" required="required" class="form-control" value="<?php echo $row['email']; ?>"> 
                        </div>
                        

                </div>
                <div class="row">
                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="id"><b>Password:</b><span class="required">*</span>
                            </label> 
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                              <input name="password" id="password" type="password" required="required" class="form-control" value="<?php echo $row['password']; ?>"> 
                              <br>
                              <input type="checkbox" onclick="myFunction()"> Show Password
                        </div>
                        

                </div>
                  <div class="col-md-2 offset-md-10">
                        <button type="submit" name="submit" class="btn btn-info btn-lg" style="width: 150px; border-radius: 10px;background-color: #3f51b5;">SUBMIT</button>
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