<?php
include('../includes/dbconnection.php');
$entity=$_GET['entity'];
 
$entity_table=strtolower($entity." Role");
$query = "Select * from `$entity_table`";
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
    //echo "<option value=0>".mysqli_num_rows($results)."</option>";
}

?>