<?php
include('../includes/dbconnection.php');
$entity_id = $_SESSION['id'];

// if (!$_SESSION['id']) {
//   echo "<script> window.location.href='login.php';</script>";
// }
$page = $_GET['page'];
$table = "templates";
$num_records = mysqli_query($con, "SELECT * FROM $table WHERE entity_id='$entity_id' ");
$num = mysqli_num_rows($num_records);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>View Templates!</title>

  <?php
  include('includes/html_header.php');
  ?>
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
          <h3> Offer Letter Templates </h3>
        </div>

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2 style="color:black">Total Records <span style="color:blue"> <?php echo   $num ?></span></h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="addTemplate.php" class="btn btn-primary" style="<?php echo $a_disabled; ?>color: white;">Add Template</a>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                      <thead>
                        <tr style="text-align: center; ">
                          <th>S.No.</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sn = 1;
                        while ($row = mysqli_fetch_array($num_records)) {
                        ?>
                          <tr style="text-align: center; ">
                            <td><?php echo $sn ?></td>
                            <td><?php echo $row['template_name']  ?> </td>
                            <td><?php echo $row['description']  ?></td>
                            <td><a target="_blank" href="view_template.php?offer_id=<?= $row['id']  ?>&entity=<?= $page ?>" class="btn btn-danger">Template</a></td>
                          </tr>
                        <?php $sn++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <footer>
    <div class="clearfix"></div>
  </footer>
  </div>
  </div>



  <?php
  include('includes/html_footer.php'); ?>

</body>

</html>