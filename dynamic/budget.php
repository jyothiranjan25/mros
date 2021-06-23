<?php
include('../includes/dbconnection.php');
$entity=$_POST['entity'];
$month=$_POST['month'];
// $entity_table=$entity." Role";
$query = "Select * from `budget` where entity ='$entity' and month = '$month'";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        echo $row['budget'];
    }
}
else
{
    echo "0000";
}

?>