<?php
include('../includes/dbconnection.php');
$page = $_GET['page'];
$entity_id = $_SESSION['id'];

if (isset($_POST['submit'])) {
	$entity_id = $_POST['entity_id'];
	$name = $_POST['name'];
	$insert = mysqli_query($con, "INSERT INTO `position_type` (`name`,`entity_id`) VALUES ('$name','$entity_id')");
	$check = $insert;
	if ($check = TRUE) {
		echo "<script>alert('Added Successfully!');</script>";
	} else {
		echo "<script>alert('Something gone wrong!');</script>";
	}
}

if (isset($_REQUEST['del'])) {
	$entity_id = $_REQUEST['id'];
	$id = $_REQUEST['del'];
	$delete_query = mysqli_query($con, "DELETE FROM `position_type` WHERE `name`='$id'");
	if ($delete_query) {
		echo '<script type="text/javascript">';
		echo 'alert("Position Type Deleted");';
		echo 'window.location.href = "add_pos.php?id="' . $entity_id;
		echo '</script>';
	} else {
		echo '<script type="text/javascript">';
		echo 'alert("Position Type can not be deleted");';
		echo 'window.location.href = "add_pos.php?id="' . $entity_id;
		echo '</script>';
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
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input name="name" type="text" id="name" required="required" class="form-control ">
									</div>
								</div>

								<div class="item form-group">
									<!-- <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Entity<span class="required">*</span> -->
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input name="entity_id" type="hidden" id="entity_id" value="<?= $entity_id ?>" required="required" class="form-control ">
									</div>
								</div>
								<br>
								<button type="submit" name="submit" id="submit" class="btn btn-secondary offset-md-5">Add Position Type</button>
						</div>
						</form>
					</div>


					<table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
						<thead>
							<tr>
								<th>SNo.</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$select_query = mysqli_query($con, "SELECT * FROM  `position_type`");
							$cnt = 1;
							while ($row = mysqli_fetch_array($select_query)) {
							?>
								<tr>
									<td><?php echo htmlentities($cnt); ?></td>
									<td><?php echo htmlentities($row['name']); ?></td>
									<td>
										<a href="add_pos.php?del=<?php echo htmlentities($row['name']); ?>&id=<?php echo htmlentities($entity_id); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
							<?php
								$cnt++;
							}
							?>
						</tbody>
					</table>

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