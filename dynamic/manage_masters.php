<?php
include('../includes/dbconnection.php');
$page = $_GET['page'];
$entity_id = $_GET['id'];
$email = $_SESSION['email'];


if (isset($_REQUEST['del'])) {
  $id = $_REQUEST['del'];
  $entity_id = $_REQUEST['entityid'];
  $entity = str_replace(" ", "_", $_REQUEST['entity']);
  $role = $_REQUEST['role'];
  // $delete_asset_report = mysqli_query($con, "DELETE FROM `asset_report` WHERE `emp_id`='$id' and `job_title`='$role'");   and `entity_id`='$entity_id'
  $delete_query = mysqli_query($con, "DELETE FROM `employee` WHERE  `id`='$id'");
  if ($delete_query) {
    echo '<script type="text/javascript">';
    echo 'alert("Account Deleted");';
    echo 'window.location.href = "manage_masters.php?page=' . $entity . '&id=' . $entity_id . '"';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Account can not be deleted");';
    echo 'window.location.href = "manage_masters.php?page=' . $entity . '&id=' . $entity_id . '"';
    echo '</script>';
  }
}

// if(isset($_POST['submit']))
// {
//   $sn=$_POST['sn'];

//   $cand_name=$_POST['cand_name'];
//   $pos=$_POST['pos'];
//   $job_title=$_POST['job_title'];
//   $joining_date=$_POST['joining_date'];a
//   $ctc=$_POST['ctc'];
//   $probation=$_POST['probation'];
//   $report_to=$_POST['report_to'];
//   $expire_date=$_POST['expire_date'];
//   $work_hour=$_POST['work_hour'];
//   $work_days=$_POST['work_days'];
// $entity_name=$_POST['entity_name'];


//   $query=mysqli_query($con,"UPDATE INTO `offer_letters` (`cand_name`, `pos`, `job_title`, `joining_date`, `ctc`, `probation`, `reporting_to`, `expiry_date`, `work_time`, `work_days`,`entity_name`)
//                                VALUES ('$cand_name', '$pos', '$job_title', '$joining_date', '$ctc', '$probation', '$report_to', '$expire_date', '$work_hour', '$work_days','$entity_name')");
//  if ($query) {
//   echo "<script>alert('Offer Letter Details has been added');</script>";
//  }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>MROS </title>

  <?php
  include('includes/html_header.php');
  ?>


</head>

<body class="nav-md">
  <?php
  include('includes/leftbar.php'); ?>
  <?php
  include('includes/topbar.php'); ?>



  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manage Masters<small></small></h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">



        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2> Masters </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">

                    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%">
                      <thead>
                        <tr>
                          <th>SNo.</th>
                          <th>Employee Id</th>
                          <th>Name</th>
                          <th>Email Id</th>
                          <th>Roles</th>
                          <th>Department</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $select_query = mysqli_query($con, "SELECT emp.id,emp.emp_id,emp.name,emp.email,r.name as role,emp.dep,ent.id as entity FROM `employee` emp INNER JOIN `role` r ON r.id=emp.role INNER JOIN `department` d ON d.name=emp.dep INNER JOIN `entity` ent ON ent.id=emp.entity_id WHERE emp.entity_id='$entity_id'");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($select_query)) {
                        ?>
                          <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($row['emp_id']); ?></td>
                            <td><?php echo htmlentities($row['name']); ?></td>
                            <td><?php echo htmlentities($row['email']); ?></td>
                            <td><?php echo htmlentities($row['role']); ?></td>
                            <td><?php echo htmlentities($row['dep']); ?></td>
                            <td>
                              <a href="edit_masters.php?id=<?php echo htmlentities($row['emp_id']); ?>&page=<?php echo htmlentities($page); ?>&entityid=<?php echo $entity_id ?>" class="btn btn-primary">Add Role</a>
                              <a href="manage_masters.php?del=<?php echo htmlentities($row['id']); ?>&entity=<?php echo htmlentities($page); ?>&role=<?php echo htmlentities($row['role']); ?>&entityid=<?php echo $entity_id ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
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
        </div>

      </div>
    </div>
  </div>
  <!-- /page content -->

  <!-- footer content -->
  <footer>
    <div class="pull-right">
      <a href="#"> Go to Top <span class="fa fa-chevron-up"> </span></a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>
  <?php
  include('includes/html_footer.php');
  ?>
</body>

</html>