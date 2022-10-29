<?php
include('../includes/dbconnection.php');
require "vendor/autoload.php";



if (isset($_POST['submit'])) {

  $check_entity = $_POST['entity'];
  $entity = "";
  $email = mysqli_real_escape_string($con, $_POST['email']);

  $entity = mysqli_real_escape_string($con,  str_replace(" ", "_", $_POST['entity']));
  $role = $_POST['role'];

  $query_entity = "SELECT id FROM `entity` WHERE entity_name='$check_entity'";
  $resultz = mysqli_query($con, $query_entity);
  $rowz = mysqli_fetch_array($resultz);
  $entity_id = $rowz['id'];



  if ($role != "New Employee") {
    $emp = strtolower($entity . "_Emp");
    $query = "SELECT * FROM `$emp` WHERE email='$email' and role='$role' ";
    $results = mysqli_query($con, $query);

    if (mysqli_num_rows($results) > 0) {
      $row = mysqli_fetch_array($results);
      $_SESSION['email'] = $email;
      // $_SESSION['password'] = $password;
      $_SESSION['entity'] =  str_replace(" ", "_", $entity);
      $_SESSION['entity_name'] = $check_entity;
      $_SESSION['role'] = $role;
      $_SESSION['entity_id'] = $entity_id;
      $_SESSION['dep'] = $row['dep'];
      $_SESSION['empid'] = $row['emp_id'];
      header('location: index.php');
      // echo "<script>alert('".$_SESSION['success']."');</script>";
    } else {
      echo "<script>alert('" . $email . "');</script>";
      echo "<script>alert('Please Enter proper details ');";
      echo "
                window.location.href='sign.php';</script>";
    }
  } else {
    $emp = strtolower($entity . "_New_Emp");
    $query = "SELECT * FROM `$emp` WHERE email='$email' and role='$role'";
    $results = mysqli_query($con, $query);

    if (mysqli_num_rows($results) > 0) {
      $row = mysqli_fetch_array($results);

      $_SESSION['entity'] = $entity;
      $_SESSION['entity_name'] = $check_entity;
      $_SESSION['entity_id'] = $entity_id;
      $_SESSION['role'] = $role;
      $_SESSION['dep'] = $row['dep'];
      $_SESSION['empid'] = $row['emp_id'];
      header('location: index.php');
      // echo "<script>alert('".$_SESSION['success']."');</script>";
    } else {
      echo "<script>alert('" . $role . " ');</script>";
    }
  }
}
