<?php
include('../includes/dbconnection.php');
$entity_id = $_SESSION['id'];
$page = $_GET['page'];


if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $entity_id = $_POST['entity_id'];

  $inset_query = mysqli_query($con, "INSERT INTO `department` (name, entity_id)
  VALUES ('$name', '$entity_id')");

  if ($inset_query === TRUE) {
    echo "<script>alert('" . $name . " department is added successfull');</script>";
  } else {
    echo "<script>alert('Fail to add department');</script>";
  }
}

if (isset($_REQUEST['del'])) {
  $id = $_REQUEST['del'];
  $name = $_REQUEST['name'];
  $page = $_REQUEST['entitynm'];
  $entity_id = $_REQUEST['entityid'];
  $delete_query = mysqli_query($con, "DELETE FROM `department` WHERE `id`='$id' AND `name`='$name'");
  if ($delete_query) {
    echo '<script type="text/javascript">';
    echo 'alert("Position Type Deleted");';
    echo 'window.location.href = "add_dep.php?page=' . $page . '&id=' . $entity_id . ' " ';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Position Type can not be deleted");';
    echo 'window.location.href = "add_dep.php?page=' . $page . '&id=' . $entity_id . ' " ';
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
  <title>Add Department</title>

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
          <h3>Add Department of <?php echo $page;  ?> </h3>
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
              <form action="" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Department<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input name="name" id="name" title="" class="form-control" required="">
                  </div>
                </div>

                <input type="hidden" name="entity_id" id="entity_id" value="<?= $entity_id ?>">
                <!-- <form action="" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">entity<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input name="entity_id" id="entity_id" title="" class="form-control" required="">
                    </div>
                  </div> -->

                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>


            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
              <thead>
                <tr>
                  <th>SNo.</th>
                  <th>Department</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $select_query = mysqli_query($con, "SELECT * FROM  `department` WHERE `entity_id`='$entity_id'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($select_query)) {
                ?>
                  <tr>
                    <td><?php echo htmlentities($cnt); ?></td>
                    <td><?php echo htmlentities($row['name']); ?></td>
                    <td>
                      <a href="add_dep.php?del=<?php echo htmlentities($row['id']); ?>&name=<?php echo htmlentities($row['name']); ?>&entityid=<?php echo htmlentities($entity_id); ?>&entitynm=<?php echo htmlentities($page); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
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
    <div class="pull-right">
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>
  <script type="text/javascript">
    function CheckColors(val) {
      var element = document.getElementById('dep');
      if (val == 'Cordinator' || val == 'Program_Head') {
        element.value = '';
        element.style.display = 'block';

      } else {
        element.value = val;
        element.style.display = 'none';

      }
    }


    $(document).ready(function() {
      var i = 1;
      $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Enter Department Name for <?php echo $page; ?>" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
      });

      $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
      });

      $('#submit').click(function() {
        $.ajax({
          url: "dep_name.php?page=<?php echo $page;  ?>",
          method: "POST",
          data: $('#add_name').serialize(),
          success: function(data) {
            alert(data);
            $('#add_name')[0].reset();
          }
        });
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