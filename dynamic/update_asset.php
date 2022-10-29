<?php
include('../includes/dbconnection.php');
 
$val=$_GET['val'];
$entity=$_SESSION['entity'];
$title="";
// $query = "UPDATE `asset_report` set  `$val`='3' where `name`='$cand_name'";
// $results = mysqli_query($con, $query);
echo $val." has been updated";
// echo "<script>alert($val);</script>";
