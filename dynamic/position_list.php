<?php
include('../includes/dbconnection.php');

// if($entity==="ALL")
// {
//     $entity_problem = "SELECT * FROM `entity`";
//     $entity_results = mysqli_query($con, $entity_problem);
//     $row=mysqli_fetch_array($entity_results);
//     $entity=$row['entity_name'];
//   }
  

$query = "Select Distinct type from `position`";
$results = mysqli_query($con, $query);
echo "<option value='0'>---SELECT POSITION---</option>";
if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        if($row['new_emp']!=1)
        
        echo "<option value='".$row['type']."'>".$row['type']."</option>";
    }
}
else
{
    //echo "<option value=0>".mysqli_num_rows($results)."</option>";
}

?>