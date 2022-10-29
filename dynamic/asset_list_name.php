<?php
include('../includes/dbconnection.php');
 
$name=$_GET['name'];
$entity=$_SESSION['entity'];
$title="";
$query = "Select * from `offer_letters` Where cand_name='$name'";
$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0)
{
    while ($row=mysqli_fetch_array($results))
    {
       $title=$row['job_title'];
    }
}
if($_SESSION['role']==$title)
{
    
    $query = "Select * from `asset`";
    $results = mysqli_query($con, $query);

    if (mysqli_num_rows($results) > 0)
    {
        while ($row=mysqli_fetch_array($results))
        {
                    $assetname=$row['name'];
                      
                    $asset_query = "Select `$assetname` from `position` WHERE `name`='$title'";
                    $asset_results = mysqli_query($con, $asset_query);


                    // $check_asset_query = "Select `$assetname` from `asset_report` WHERE `name`='$name' and `$assetname`='1'";
                    // $check_asset = mysqli_query($con, $check_asset_query);

                    // if (mysqli_num_rows($check_asset) > 0)
                    // {
                    //     while ($rows=mysqli_fetch_array($asset_results))
                    //     {
                    //             if($rows[$assetname]==1)
                    //             {
                    //                 echo "<option value='".$assetname."'>".$assetname."</option>";
                    //             }
                    //     }
                    // }


                  
                    
        }
    }

    else
    {
        echo "<option value=0>First Select Candidate Name</option>";
    }

}
