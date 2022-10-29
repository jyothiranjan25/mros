<?php
include('../includes/dbconnection.php');

$type = $_GET['name'];

$query = "Select * from `position` Where type='$type'";
$results = mysqli_query($con, $query);
if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_array($results)) {
        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    }
} else {
    echo "<option value=0>Position Not Available</option>";
}
