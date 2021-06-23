    <?php

      include('../includes/dbconnection.php');
      error_reporting(0);
      session_start();
   

$entity=$_SESSION['entity'];
 $table=strtolower($entity." headcount");
$entity_tran=strtolower($entity.' transaction');
$notification_table=$entity." notification";

      function replace($FilePath, &$OldText, &$NewText)
      {
          
          if(file_exists($FilePath)===TRUE)
          {
              if(is_writeable($FilePath))
              {
                  try
                  {
                      $FileContent = file_get_contents($FilePath);
                      for ($i=0; $i <= 13  ; $i++) 
                      { 
                          $FileContent = str_replace($OldText[$i], $NewText[$i], $FileContent);
                      }
                      echo $FileContent;
                      file_put_contents($FilePath, $FileContent);

                  }
                  catch(Exception $e)
                  {
                      echo "<script>alert('$e');</script>";
                  }

                //  echo "<script>alert('OLR has been autofilled.');</script>";
                  echo '<script type="text/javascript">window.location.href="htmlpdf.php"</script>';
                  
              }
              else
              {
                  echo "<script>alert('File is not writable.');</script>";
              }
          }
          else
          {
              echo "<script>alert('File does not exist.');</script>";
          }
         
      }

    if (isset($_POST['submit'])) {

        $stat=1;
        $reqby=$_POST['reqby'];
        $datesubmitted=$_POST['datesubmitted'];
        $cand_name=$_POST['cand_name'];
        $pos=$_POST['pos'];
   $jobtype=$_POST['jobtype'];
    $jobmonths=$_POST['jobmonths'];

        $job_title=$_POST['job_title'];$curr_type=$_POST['cur_type'];
        $joining_date=$_POST['joining_date'];
          $cur_name=$curr_type; $ctc=$_POST['ctc'];
        if($cur_name !="INR(Rs)")
        {
          $query = "Select * from `currency_control` Where name='$cur_name'";
            $results = mysqli_query($con, $query);
            if (mysqli_num_rows($results) > 0)
            {
                while ($conv_row=mysqli_fetch_array($results))
                {
                    $ctc=$ctc*$conv_row['amount'];                                        
                }
            }
        }
       

       $cand_address=$_POST['cand_address'];
          $mctc=$ctc/12;
        $probation=$_POST['probation'];
        $reporting_to=$_POST['reporting_to'];
        $expiry_date=$_POST['expiry_date'];
        $work_time=$_POST['work_time'];
        $work_days=$_POST['work_days'];
        $entity_name=$_POST['entity_name'];
        $perks=$_POST['perks'];
        $template_name= $_POST['template_name'];
        $olr_id= $_POST['olr-id'];

        
$arr= array('1' => 'April' ,'2' => 'May' ,'3' => 'June' ,'4' => 'July' ,'5' => 'August' ,'6' => 'September' ,'7' => 'October' ,'8' => 'November' ,'9' => 'December' ,'10' => 'January' ,'11' => 'February' ,'12' => 'March' , );
 
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
 

 
            $selquery=mysqli_query($con,"Select * from `$table` WHERE position='$job_title'");
            while ($row=mysqli_fetch_array($selquery))
        {
          $mon=$row['month'];
            $hc=$row['hc'];
           if($mon>=$monthy && $mon<$jobmons)
            {
                 
                  if($hc<=0)
              {
                      $valid=0;
                      
              
               }
               else{
                        $valid=1;
                      }
           
           if($valid==0)
                        {
                          $message_query=mysqli_query($con,"Select * from `offer_letters` WHERE id='$olr_id'");
                          $message_data=mysqli_fetch_array($message_query);
                          $subject="OFFER LETTER REJECTED";
                          $title="offer letter submission to ". $message_data['reporting_to'];
                          $message="<h3>Offer Letter Details</h3><br><p>Dear.</p><br><p>It is to inform you that a new offer letter which has been requested by ,".$message_data['requested_by'].",is now rejected due to headcount unavailibilty.</p>";
                                  
                          $from=$_SESSION['email'];        
                          $noti_query=mysqli_query($con,"INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");
               
                            echo "<script>alert('Offer Letter Request is Rejected; Due to Headcount Unavailability(:     From ".$arr[$mon]."');</script>";
                            $update_query=mysqli_query($con,"UPDATE `offer_letters` SET `status`='3' WHERE `id`='$olr_id'");
                              break;
                        }
            }
     
   
      
        }

        $budgetseq=mysqli_query($con,"Select * from budget WHERE entity='$entity'");
            while ($row=mysqli_fetch_array($budgetseq))
        {
            $mon=$row['month'];
            $budget=$row['budget'];
            if($mon>=$monthy && $mon<$jobmons)
            {
               
                  if($budget>=$mctc)
              {
                      $status=0;
              
               }
               else{
                $message_query=mysqli_query($con,"Select * from `offer_letters` WHERE id='$olr_id'");
                $message_data=mysqli_fetch_array($message_query);
                $subject="OFFER LETTER REJECTED";
                $title="offer letter submission to ". $message_data['reporting_to'];
                $message="<h3>Offer Letter Details</h3><br><p>Dear.</p><br><p>It is to inform you that a new offer letter which has been requested by ,".$message_data['requested_by'].",is now rejected due to budget unavailibilty.</p>";
                        
                $from=$_SESSION['email'];        
                $noti_query=mysqli_query($con,"INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");
     
                        $status=3;
                        echo "<script>alert('Budget Unavailability (: From ".$arr[$mon]." ');</script>";
                        $update_query=mysqli_query($con,"UPDATE `offer_letters` SET `status`='3' WHERE `id`='$olr_id'");
                        break;
                      }
            }
        
      
        }

   
  





    if($valid==1 && $status==0)
     {
      
         
                 
                $se_query=mysqli_query($con,"Select * from budget WHERE entity='$entity'");
                while ($row=mysqli_fetch_array($se_query))
             {
                      $mon=$row['month'];
                      $budget=$row['budget'];
                    if($mon==$monthy)
                    {
                
                      $dctc=$mctc/30;
                      $d=30-$dates;
                      $dctc=$dctc*$d;
                      $budget=$budget-$dctc;
                  
                         $update_q=mysqli_query($con,"UPDATE `budget` SET `budget`='$budget' WHERE `entity`='$entity' and `month`='$mon'");
                       
              
                  
                      
                 }
                       else if($mon>$monthy && $mon<$jobmons)
                              {
                               
               
                               
                                    $budget=$budget-$mctc;
                                     
                                        $update_q=mysqli_query($con,"UPDATE `budget` SET `budget`='$budget' WHERE `entity`='$entity' and `month`='$mon'");
                                       
                  
                          

                   
                                  }
                  }
    

                   $a = array();    // HeadCount Reducing starts ...................................................................
    
                       $sel_query1=mysqli_query($con,"Select * from `$table` WHERE `position`='$job_title'");
                          while ($rows=mysqli_fetch_array($sel_query1))
                       {
                             $mons=$rows['month'];
                             $hc=$rows['hc'];
                 
                        if($mons>=$monthy && $mons<$jobmons)
                        {
                           $hc=$hc-1;
                            array_push($a,"$arr[$mons]");
                     
                             $update_query=mysqli_query($con,"UPDATE `$table` SET `hc`='$hc' WHERE `position`='$job_title'  and `month`='$mons'");
                              
                        
                        }
                  }



     $arrlength=count($a);
for($i=1; $i<$arrlength; $i++)
{

  $m=$m.$a[$i].",";
}

      $reason="The Budget -".number_format($dctc,2)." Reduced from ".$a[0]."; - ".number_format($mctc,2)."/month is Reduced for the respective months- ".$m." as olr_sn_".$olr_id." Requested By ".$reqby."";
      $bud="-".$ctc."";
      $hhc="-1/".$job_title."";

      $insert_query=mysqli_query($con,"INSERT INTO `$entity_tran`( `budget`, `hc`, `reason`) VALUES('$bud','$hhc','$reason')");
      if ($insert_query) {
           echo "<script>alert('".$reason."');</script>";
      }
      

}

                   
     
    if($valid==1 && $status==0)
     {
      

//Saving pdf in database
          
          $ext= ".html";
          $file = "../Offer_Letter_Templates/".$entity_name."/".$template_name.$ext;
          $target_dir = "../Offer_Letters/".$entity_name."/";
          $target_file = "OLR_SN_".$olr_id.$ext;
          if(! is_dir($target_dir))
          {
            
            mkdir($target_dir, 0755, true);
          }
          $newfile = $target_dir.$target_file;
          $_SESSION['filename']= $newfile;

          if(!copy($file,$newfile))
          {
              echo "<script>alert('Copying failed');</script>";
          }
          else{
              echo "<script>alert('Copying successful');</script>";
          }
$head_res_date=date("Y-m-d");
$cur_name=$curr_type; $new_ctc=$ctc;
echo "<script>alert('".$cur_name."');</script>";
            if($cur_name !="INR(Rs)")
            {
              $query = "Select * from `currency_control` Where name='$cur_name'";
                $results = mysqli_query($con, $query);
                if (mysqli_num_rows($results) > 0)
                {
                    while ($conv_row=mysqli_fetch_array($results))
                    {
                        $new_ctc=$ctc*$conv_row['amount'];                                        
                    }
                }
            }
            else{
              $new_ctc=$ctc;
            }
        $up_query=mysqli_query($con,"UPDATE `offer_letters` set  `pos`='$pos', `job_title`='$job_title', `joining_date`='$joining_date', `ctc`='$new_ctc', `probation`='$probation', `reporting_to`='$reporting_to', `expiry_date`='$expiry_date', `work_time`='$work_time', `work_days`='$work_days',`entity_name`='$entity_name',`perks`='$perks',`status`='$stat',`head_response_date`='$head_res_date' where `id`='$olr_id'");
       
             if ($up_query) {
                    
           
              echo "<script>alert('Offer Letter Details has been Updated Successfully...');</script>";

            

              //echo 'window.location.href = "adoHeadOLR_Pending.php";';
             }
             else 
            {
             echo "<script>alert('Something went wrong:( Please try once more...!');</script>";
             //echo 'window.location.href = "adoHeadOLR_Pending.php";';
            }

            $sql = "SELECT * FROM `offer_letters` WHERE `id`='".$olr_id."'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
               $timestamp = strtotime($row['datesubmitted']);
            $datesubmitted = date("d-m-Y", $timestamp);

            $timestamp = strtotime($row['joining_date']);
            $joining_date = date("d-m-Y", $timestamp);

            $timestamp = strtotime($row['expiry_date']);
            $expiry_date = date("d-m-Y", $timestamp);


            $cur_name=$row['currency_type'];
            if($cur_name !="INR(Rs)")
            {
              $query = "Select * from `currency_control` Where name='$cur_name'";
                $results = mysqli_query($con, $query);
                if (mysqli_num_rows($results) > 0)
                {
                    while ($conv_row=mysqli_fetch_array($results))
                    {
                        $show_ctc=$row['ctc']/$conv_row['amount'];                                        
                    }
                }
            }
            else{
              $show_ctc=$row['currency_type'];
            }

            $new = array($datesubmitted, $row['cand_name'], $row['pos'], $row['job_title'], $joining_date,$row['currency_type'], $show_ctc, $row['probation'], $row['reporting_to'], $expiry_date, $row['work_time'], $row['work_days'], $row['perks'],$row['cand_address']);
            $old = array('[1]','[2]','[3]','[4]','[5]','[14]','[6]','[7]','[8]','[9]','[10]','[11]','[12]','[13]');
            replace($newfile, $old, $new);


}

  echo '<script type="text/javascript">window.location.href="OLR_BudgetProb.php"</script>';
    }
?>
