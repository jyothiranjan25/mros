<?php
include('../includes/dbconnection.php');
$entity=$_GET['entity'];
$table_name=strtolower(str_replace(" ","_",$entity)."_templates");
$query = "SELECT * from `$table_name`";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
        echo "<option value='".$row['template_name']."'>".$row['template_name']."</option>";
    }
}
else
{
    echo "<option value='No Data'> ".mysqli_num_rows($results)."</option>";
}

?>