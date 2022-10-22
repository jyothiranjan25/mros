<?php
include('../includes/dbconnection.php');
session_start(); 
$dep=$_GET['dep'];
$entity=$_SESSION['entity'];
 $rolename="";
 $entity_table=strtolower($entity."_Role"); 
 $emp_table=strtolower($entity."_Emp");                                               

$query = "SELECT * from `$emp_table` Where  dep='$dep'";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        echo "<option value='".$row['name']."'>".$row['name']." (".$row['role'].") </option>";
    }
}
        
else
{
    echo "<option value=''>Please contact admin</option>";
}

?>
 