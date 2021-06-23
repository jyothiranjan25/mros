<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 

$value=$_GET['olrid'];



 $arr= array('1' => 'April' ,'2' => 'May' ,'3' => 'June' ,'4' => 'July' ,'5' => 'August' ,'6' => 'September' ,'7' => 'October' ,'8' => 'November' ,'9' => 'December' ,'10' => 'January' ,'11' => 'February' ,'12' => 'March' , );
$budget_query=mysqli_query($con,"Select * from offer_letters WHERE id='$value'");
    while ($row=mysqli_fetch_array($budget_query))
    {
  $ctc=$row['ctc'];
  $mctc=$ctc/12;
    $pos=$row['job_title'];
      $entity=$row['entity_name'];
      $table=strtolower($entity." headcount");
            $jobtype=$row['jobtype'];
    $jobmonths=$row['jobmonths'];

    $joining_date=$row['joining_date'];
    $time=strtotime($joining_date);
  $monthy=date("m",$time);
  $dates=date("j",$time);
  $monthy=$monthy-3;
   if($monthy==-1 || $monthy==-2 || $monthy==0){
  $monthy=$monthy+12;
 }

  if($jobtype=="parttime"){
                 $jobmons=$monthy+$jobmonths;
                 }

          if($jobtype=="fulltime"){
                    $jobmons=13;
            }

 

       $selquery=mysqli_query($con,"Select * from  `$table` WHERE position='$pos'");
            while ($row=mysqli_fetch_array($selquery))
        {
          $mons=$row['month'];
            $hc=$row['hc'];
           if($mons>=$monthy && $mons<$jobmons)
            {
                 
                  if($hc<=0)
              {
                      $valids=0;
                      
              
               }
               else{
                        $valids=1;
                      }
           
           if($valids==0)
                        {
                          $update_query=mysqli_query($con,"UPDATE `offer_letters` SET `status`='3' WHERE `id`='$value'");
   
                            echo "<script>alert('Offer Letter Request is on Hold; Due to Headcount Unavailability(:     From ".$arr[$mons]."');</script>";
                            include('OLR_BudgetProb.php');
                              break;
                        }
            }
     
   
      
        }


$budgetseq=mysqli_query($con,"Select * from budget WHERE entity='$entity'");
            while ($rows=mysqli_fetch_array($budgetseq))
        {
            $mon=$rows['month'];
          $budget=$rows['budget'];
           if($mon>$monthy && $mon<$jobmons)
            {
               
                  if($budget>=$mctc)
              {
                      $status=0;
              
               }
               else{
                        $status=3;
                        echo "<script>alert('Not Yet Solved... Budget Unavailability From ".$arr[$mon]." (: ');</script>";
echo "<script>window.location.href='OLR_BudgetProb.php';</script>";
include('OLR_BudgetProb.php');

                        break;
                      }
            }
        
      
     }   


    if($valids==1 && $status==0)
     {
        echo "<script>alert('OLR has passed Budget & Headcount Validation Successfully :) ');</script>";

$update_query=mysqli_query($con,"UPDATE `offer_letters` SET `status`='0' WHERE `id`='$value'");

echo "<script>window.location.href='OLR_Pending.php';</script>";

}

}

   
?>