<?php
include('../includes/dbconnection.php');
$mail = $_GET['mail'];

$query = "Select * from `employee_details` Where email='$mail'";
$results = mysqli_query($con, $query);
if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_array($results)) {
        echo $row['emp_id'] . "," . $row['name'];
    }
} else {
    echo "First Select Employee Mail id";
}
