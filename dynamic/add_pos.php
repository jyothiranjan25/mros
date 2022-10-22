<?php
include('../includes/dbconnection.php');
error_reporting(0);
$page = $_GET['page'];
if (isset($_POST['submit'])) {
$number = count($_POST["name"]);
if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$pos_type_name=mysqli_real_escape_string($con, $_POST["name"][$i]);
			$sql = "INSERT INTO `position_type`(name) VALUES('$pos_type_name')";
			$check = mysqli_query($con, $sql);
		}
	}
	if($check){

		 echo "<script>alert('Added Successfully!');</script>";
	}
}
else
{
			 echo "<script>alert('Something gone wrong!');</script>";

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
	<title>MROS | </title>

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
		.site_title {
			overflow: inherit;
		}

		.nav_title {
			height: 198px;
			margin-top: -59px;
		}
	</style>
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
					<h3>Add Position Type</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
					<br><br>
					
						<div class="x_content">
							<br>


							<form name="add_name" id="add_name" method="POST">
								<div class="table-responsive">
									<table class="table table-bordered" id="dynamic_field">
										<tr>
											<td><input type="text" name="name[]" placeholder="Ex: Staff, Faculty, Intern etc" class="form-control name_list" required></td>
											<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
										</tr>
									</table>
																<br>

							<br>

									<button type="submit" name="submit" id="submit" class="btn btn-secondary"  >Add Position Type</button>
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
		$(document).ready(function() {
			var i = 1;
			$('#add').click(function() {
				i++;
				$('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Enter Position Name " class="form-control name_list" required></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
			});

			$(document).on('click', '.btn_remove', function() {
				var button_id = $(this).attr("id");
				$('#row' + button_id + '').remove();
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