<?php
include('../includes/dbconnection.php');
$entity=$_POST['entity'];
$month=$_POST['month'];
$position=$_POST['position'];


$table=strtolower($entity." headcount");

$query = "Select * from `$table` where position='$position' and month='$month'";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        echo "".$row['hc']."";
    }
}
else
{
    echo "0";
}

?>