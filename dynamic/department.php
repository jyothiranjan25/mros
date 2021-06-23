<?php
include('../includes/dbconnection.php');
session_start(); 
$dep=$_GET['dep'];
$entity=$_SESSION['entity'];
 $rolename="";
 $entity_table=strtolower($entity." Role"); 
 $emp_table=strtolower($entity." Emp");                                               
 $query = "Select * from `$entity_table`";
 $results = mysqli_query($con, $query);
           while ($row=mysqli_fetch_array($results))
           {
               $rolename=$row['name'];
           }
$query = "Select * from `$emp_table` Where role='$rolename' and dep='$dep'";
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
    echo "<option value=''>Please contact admin</option>";
}

?>
 