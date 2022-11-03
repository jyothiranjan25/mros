<?php
include('../includes/dbconnection.php');
$type = $_GET['type'];
$entity_id = $_SESSION['id'];

if (isset($_POST['submit'])) {
  $number = count($_POST["name"]);
  if ($number > 0) {
    for ($i = 0; $i < $number; $i++) {
      if (trim($_POST["name"][$i] != '')) {

        $pos_type_name = mysqli_real_escape_string($con, $_POST["name"][$i]);
        $sql = "INSERT INTO `position`(type,name,entity_id) VALUES('$type','$pos_type_name','$entity_id')";
        mysqli_query($con, $sql);
        $entity_sql = "SELECT * from `entity`";
        $entity_result = mysqli_query($con, $entity_sql);
        while ($row = mysqli_fetch_array($entity_result)) {
          $table = " headcount";
          for ($j = 1; $j < 13; $j++) {
            $value = 0;
            $insert_sql = "INSERT INTO `headcount`(`position`,`month`,`hc`,`entity_id`) VALUES('$pos_type_name','$j','$value','$entity_id')";
            $check = mysqli_query($con, $insert_sql);
          }
        }
      }
    }
    if ($check) {

      echo "<script>alert('Added Successfully!');</script>";
    }
  } else {
    echo "<script>alert('Something gone wrong!');</script>";
  }
}


if (isset($_REQUEST['del'])) {
  $id = $_REQUEST['poid'];
  $name = $_REQUEST['del'];
  $ptype = $_REQUEST['type'];
  $entity = $_REQUEST['id'];

  $delete_query = mysqli_query($con, "DELETE FROM `position` WHERE `id`='$id'AND `type`='$ptype'AND `name`='$name' ");
  if ($delete_query) {
    echo '<script type="text/javascript">';
    echo 'alert("Job Type Deleted");';
    echo 'window.location.href = "add_job_title.php?type=' . $type . '&id=' . $entity_id . '"';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Job Type can not be deleted");';
    echo 'window.location.href = "add_job_title.php?type=' . $type . '&id=' . $entity_id . '"';
    echo '</script>';
  }
}
?>


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
  <link href="../build/css/input.css" rel="stylesheet">


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
          <h3>Add Job Title for the Position: <span style="color:black"> <?php echo $type ?></span></h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">

              <ul class="nav navbar-right panel_toolbox">
                <br>
                <br>
                <br>

              </ul>

              <br />

              <form name="add_name" id="add_name" method="POST">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dynamic_field">
                    <tr>
                      <td><input type="text" name="name[]" placeholder="Ex: Asst.professor, Professor, HOD" class="form-control name_list" required></td>
                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                  </table>
                  <br>
                  <button name="submit" type="submit" class="btn btn-secondary">Submit</button>
                  <!-- <input type="button" name="submit" id="submit" class="btn btn-secondary" value="Submit"> -->
                </div>
              </form>
            </div>


            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
              <thead>
                <tr>
                  <th>SNo.</th>
                  <th>Type</th>
                  <th>Name</th>
                  <!-- <th>entilelement test</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $select_query = mysqli_query($con, "SELECT * FROM  `position` WHERE `type`='$type'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($select_query)) {
                ?>
                  <tr>
                    <td><?php echo htmlentities($cnt); ?></td>
                    <td><?php echo htmlentities($row['type']); ?></td>
                    <td><?php echo htmlentities($row['name']); ?></td>
                    <!-- <td><?php echo htmlentities($row['entitlement_test']); ?></td> -->
                    <td>
                      <a href="add_job_title.php?del=<?php echo htmlentities($row['name']); ?>&type=<?php echo htmlentities($row['type']); ?>&poid=<?php echo htmlentities($row['id']); ?>&id=<?php echo htmlentities($row['entity_id']); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

  </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      var i = 1;
      $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Enter Job Titile " class="form-control name_list" required></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
      });

      $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
      });

      // $('#submit').click(function(){		
      // 	$.ajax({
      // 		url:"job_title_name.php?type=<?php echo $type;  ?>",
      // 		method:"POST",
      // 		data:$('#add_name').serialize(),
      // 		success:function(data)
      // 		{
      // 			alert(data);
      // 			$('#add_name')[0].reset();
      // 		}
      // 	});
      // });

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