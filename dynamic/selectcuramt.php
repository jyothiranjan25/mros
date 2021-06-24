<?php
include('../includes/dbconnection.php');
session_start(); 
$name=$_GET['name'];
                                              
 $query = "Select * from `currency_control` Where name='$name'";
 $results = mysqli_query($con, $query);
if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        if(!$row['amount'])
        {
            echo "<option value='".$row['amount']."'>No value given</option>";
        }
        else{
            echo "<option value='".$row['amount']."'>".$row['amount']."</option>";
        }
        
    }
}
else
{
    echo "<option value=0>First Select Employee Mail id </option>";
}

?>
 