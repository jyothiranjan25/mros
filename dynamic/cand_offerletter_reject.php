<?php
include('../includes/dbconnection.php');

$id=$_GET['id'];
$curr_date=date("Y-m-d");
$status=7;
$query = "UPDATE offer_letters SET status='$status','cand_response_date'='$curr_date' WHERE id='$id'";
$results = mysqli_query($con, $query);
echo '<script type="text/javascript">'; 
echo 'alert("Thank you for your response");'; 
echo 'window.close();';
echo '</script>';
