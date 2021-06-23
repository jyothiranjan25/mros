<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 
$entity=$_SESSION['entity'];
$mail_id=$_SESSION['email'];
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
  $completed=1;
  $sn=0;
  $sel_query=mysqli_query($con,"Select * from feedback");
  while ($row=mysqli_fetch_array($sel_query))
    {
      $sn=$row['sn'];
    }
    $sn=$sn+1;


  //$query=mysqli_query($con,"INSERT INTO `feedback` ( `sn`,`name`,`entity`,`mail_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`,`q11`,`q12`,`q13`,`q14`,`Comments`,`completed`)
          //                     VALUES ('$sn','$username','$entity','$mail_id','$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11','$q12','$q13','$q14','$comments','$completed')");
//  if(!$query)
//     {
//         echo mysqli_error();
//     }
//     else
//     {
    
                        echo '<script type="text/javascript">'; 
                        echo 'alert("'.$username.'");';
                        echo 'alert("'.$entity.'");'; 
                       // echo 'window.location.href = "index.php";';
                        echo '</script>';
    //}
}
?>