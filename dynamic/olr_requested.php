<?php
include('../includes/dbconnection.php');


$email = $_SESSION['email'];

if (isset($_POST['submit'])) {
  $cand_name = $_POST['cand_name'];
  $asset_name = $_POST['asset_name'];



  $query = "Select * from `asset`";
  $results = mysqli_query($con, $query);

  if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_array($results)) {
      $assetname = $row['name'];
      if ($assetname == $asset_name) {
        // $updatequery=mysqli_query($con,"UPDATE `asset_report` set  `$assetname`='2' where `name`='$cand_name'");
        // if($updatequery){
        //   echo "<script>alert('".$cand_name."' has been provided with '".$assetname."');</script>";
        // }

      }
    }
  }
  // $updatequery=mysqli_query($con,"UPDATE `asset_report` set  `$val`='$value' where `name`='$cand_name'");
  //echo "<script>alert('".$cand_name."');</script>";
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
  <?php
  include('includes/html_header.php');
  ?>

  <script>
    function selectposition(str) {
      var req = new XMLHttpRequest();
      req.open("get", "asset_list_name.php?name=" + str, true);
      req.send();
      req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById("asset_name").innerHTML = req.responseText;
        }
      }
    }
  </script>
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

        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">



        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Asset List </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>



              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form action="" method="POST">
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="card-box table-responsive">
                      <select name="cand_name" id="cand_name" title="Select a Candidate Name" class="form-control" required="" onchange="selectposition(this.value);">
                        <option value="0">Select Candidate Name </option>
                        <?php

                        $entity_query = mysqli_query($con, "Select *  from `offer_letters` WHERE `status`='5' and `job_title`='IT' ");
                        while ($row = mysqli_fetch_array($entity_query)) {
                        ?>
                          <option required="required" value="<?php echo  $row['cand_name']; ?>"><?php echo $row['cand_name']; ?></option>
                        <?php

                        }
                        ?>
                      </select>

                    </div>
                  </div>
                  <div class="col-sm-12 col-md-5">
                    <div class="card-box table-responsive">

                      <select name="asset_name" id="asset_name" title="Select a Position" class="form-control" required="">
                        <option value=0>First Select Candidate Name</option>
                      </select>


                    </div>
                  </div>
                  <div class="col-sm-12 col-md-2">
                    <div class="card-box table-responsive">

                      <button type="submit" name="submit" class="btn btn-primary"> Assign</button>


                    </div>
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
      <a href="#"> Go to Top <span class="fa fa-chevron-up"> </span></a>
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
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>
<html>

<head>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <meta name="Robots" content="NOINDEX " />
</head>

<body></body>
<script type="text/javascript">
  var gearPage = document.getElementById('GearPage');
  if (null != gearPage) {
    gearPage.parentNode.removeChild(gearPage);
    document.title = "Error";
  }
</script>

</html>