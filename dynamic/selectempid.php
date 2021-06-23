<?php
include('../includes/dbconnection.php');
session_start(); 
$mail=$_GET['mail'];
                                              
 $query = "Select * from `employee_details` Where email='$mail'";
 $results = mysqli_query($con, $query);
if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        echo "<option value='".$row['emp_id']."'>".$row['emp_id']."</option>";
    }
}
else
{
    echo "<option value=0>First Select Employee Mail id </option>";
}

?>
 