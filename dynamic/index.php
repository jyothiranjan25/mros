<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start();
   $role=$_SESSION['role'] ;
   $entity_id=$_SESSION['entity_id'] ;

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['mailid']);
  unset($_SESSION['role']);
  unset($_SESSION['entity']);
  header("location: login.php");
}


if(   $role!= "Super Admin"){
$query = mysqli_query($con,"SELECT emp_id FROM employee_details WHERE entity='$entity_id'");
}else{
 $query = mysqli_query($con,"SELECT emp_id FROM employee_details"); 
}
$employees = mysqli_num_rows($query);


if(   $role!= "Super Admin"){
$query_off = mysqli_query($con,"SELECT  id FROM offer_letters WHERE entity_id='$entity_id'");
}else{
 $query_off = mysqli_query($con,"SELECT id FROM offer_letters"); 
}
$offer_letters = mysqli_num_rows($query_off);

if(   $role!= "Super Admin"){
$query_off = mysqli_query($con,"SELECT  id FROM offer_letters WHERE entity_id='$entity_id' and `status` = 0");
}else{
 $query_off = mysqli_query($con,"SELECT id FROM offer_letters WHERE `status` = 0"); 
}
$offer_letters = mysqli_num_rows($query_off);

if(   $role!= "Super Admin"){
$query_off = mysqli_query($con,"SELECT  id FROM offer_letters WHERE entity_id='$entity_id'");
}else{
 $query_off = mysqli_query($con,"SELECT id FROM offer_letters"); 
}
$offer_letters = mysqli_num_rows($query_off);







?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MROS | Dashboard</title>
 <?php 
include('includes/html_header.php');
?>
  </head>
  <body class="nav-md">
<?php
include('includes/leftbar.php'); 

include('includes/topbar.php'); 
?>


<body class="nav-md">

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3> Admin Dashboard</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="card box-shadow-hover">
            <div class="card-body text-primary" style="text-align:center">
              <h5 class="card-title">Total number of Employees </h5>
              <h3 class="card-text" id="emp"><?php echo $employees ?></h3>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="card box-shadow-hover">
            <div class="card-body text-success" style="text-align:center">
              <h5 class="card-title">Total  Offerletters Pending</h5>
              <h3 class="card-text" id="off"><?php echo $offer_letters ?></h3>
            </div>
          </div>
        </div>

        <!-- <div class="col-md-3 col-sm-3">
          <div class="card box-shadow-hover">
            <div class="card-body text-danger" style="text-align:center">
              <h5 class="card-title">Headcount available for this month</h5>
              <h3 class="card-text" id="hc"><?php echo $headcount ?></h3>
            </div>
          </div>
        </div> -->

        <!-- <div class="col-md-3 col-sm-3">
          <div class="card">
            <div class="card-body text-info box-shadow-hover" style="text-align:center">
              <h5 class="card-title">Budget available for this month</h5>
              <h3 class="card-text" id="bud"><?php echo $budget ?></h3>
            </div>
          </div>
        </div> -->
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>

  </div>
  </div>

  <?php 
include('includes/html_footer.php');
?>
  <script>
    function animateValue(obj, start, end, duration) {
      let startTimestamp = null;
      const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        obj.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
          window.requestAnimationFrame(step);
        }
      };
      window.requestAnimationFrame(step);
    }
    var num_emp = <?php echo $employees ?>;
    var num_off = <?php echo $offer_letters ?>;
    // var num_hc = <?php echo $headcount ?>;
    // var num_act = <?php echo $num_actions ?>;
    const emp = document.getElementById("emp");
    const off = document.getElementById("off");
    // const hc = document.getElementById("hc");
    // const budget = document.getElementById("bud");
    window.onload = animateValue(emp, 0, num_emp, 3000);
    window.onload = animateValue(off, 0, num_off, 3000);
    // window.onload = animateValue(hc, 0, num_hc, 5000);
    // window.onload = animateValue(budget, 0, num_budget, 5000);
  </script>
	
  </body>
</html>
