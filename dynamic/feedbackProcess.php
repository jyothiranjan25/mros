<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 

  $c=1;
$entity=$_SESSION['entity'];
                $email=$_SESSION['email'];
                 $role_name=$_SESSION['role'];
                $entity_table=$_SESSION['entity']." New_Emp";
                  $query=mysqli_query($con,"Select * from `$entity_table` WHERE role='$role_name' and email='$email'");
                  while ($row=mysqli_fetch_array($query))
                  {
                      if($c>1){
                         $name="anonymous";

                      }
                      else{
                      $name=$row['name'];
                        $c++;
                       
                      }
                      
                  }


if(isset($_POST['submit']))
{
  
  @$q1=$_POST['options1'];
  @$q2=$_POST['options2'];
  @$q3=$_POST['options3'];
  @$q4=$_POST['options4'];
  @$q5=$_POST['options5'];
  @$q6=$_POST['options6'];
  @$q7=$_POST['options7'];
  @$q8=$_POST['options8'];
  @$q9=$_POST['options9'];
  @$q10=$_POST['options10'];
  @$q11=$_POST['options11'];
  @$q12=$_POST['options12'];
  @$q13=$_POST['options13'];
  @$q14=$_POST['options14'];
  $comments=$_POST['Comments'];
  $status=1;
  $sn=0;
  $sel_query=mysqli_query($con,"Select * from feedback");
  while ($row=mysqli_fetch_array($sel_query))
    {
      $sn=$row['sn'];
    }
    $sn=$sn+1;
$status=0;
    $query=mysqli_query($con,"UPDATE `employee_details` SET `status`='$status' WHERE `email` = '$email'");
  $query=mysqli_query($con,"INSERT INTO `feedback` ( `sn`,`name`,`entity`,`mail_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`,`q11`,`q12`,`q13`,`q14`,`comments`,`status`)
                               VALUES ('$sn','$name','$entity','$email','$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11','$q12','$q13','$q14','$comments','$status')");
 if(!$query)
    {
        echo mysqli_error();
    }
    else
    {
    
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Thank You for your feedback..");'; 
                        echo 'window.location.href = "index.php";';
                        echo '</script>';
    }
}
?>