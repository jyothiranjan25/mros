<?php
include('../includes/dbconnection.php');
session_start(); 
$type=$_GET['type'];

$query = "SELECT * from `position` Where type='$type'";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    echo "<option value=0>First Select Position Type </option>";
    while ($row=mysqli_fetch_array($results))
    {
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
    }
}
else
{
    echo "<option value=0>First Select Position Type </option>";
}

?>
 