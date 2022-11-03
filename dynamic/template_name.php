<?php
include('../includes/dbconnection.php');
$entity = $_GET['id'];
$table_name = "templates";

$query = "SELECT * FROM `$table_name` WHERE entity_id ='$entity'";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_array($results)) {
        echo "<option value='" . $row['template_name'] . "'>" . $row['template_name'] . "</option>";
    }
} else {
    echo "<option value='No Templates'> " . mysqli_num_rows($results) . "</option>";
}
