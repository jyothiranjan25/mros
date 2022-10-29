<?php
include('../includes/dbconnection.php');
$id=$_GET['id'];

$query = "Select * from `employee_details` Where emp_id='$id'";
$results = mysqli_query($con, $query);
if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
    }
}
else
{
    echo "<option value=0>First Select Employee Mail id </option>";
}

?>
 