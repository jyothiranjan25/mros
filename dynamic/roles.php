<?php
include('../includes/dbconnection.php');
$entity=$_GET['entity'];
// if($entity==="ALL")
// {
//     $entity_problem = "SELECT * FROM `entity`";
//     $entity_results = mysqli_query($con, $entity_problem);
//     $row=mysqli_fetch_array($entity_results);
//     $entity=$row['entity_name'];
//   }
  
$entity_table=strtolower($entity." Role");
$query = "Select * from `$entity_table`";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        if($row['new_emp']!=1)
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
    }
}
else
{
    //echo "<option value=0>".mysqli_num_rows($results)."</option>";
}

?>