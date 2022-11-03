<?php
include('../includes/dbconnection.php');

// include('sendmailnoti.php');

$entity = $_SESSION['entity'];
$entity_id = $_SESSION['entity_id'];

$notification_table = $entity . "_notification";

if (isset($_POST['submit'])) {

  $entity = strtolower(str_replace(" ", "_", $_GET['entity']));
  $id = $_GET['olr_id'];
  $name = $_GET['name'];
  $olr_id = "OLR_SN_" . $id;
  $file = $_FILES['img']['name'];
  $target_dir = "../offer_letters/" . $entity . "/";


  $status = 4;
  // echo "<script>alert('".$entity."');</script>";
  echo "<script>alert('" . $olr_id . "');</script>";
  // echo "<script>alert('".$target_dir."');</script>";

  if (move_uploaded_file($_FILES['img']['tmp_name'], $target_dir . $olr_id . ".pdf")) {
    // $message_query=mysqli_query($con,"SELECT * from `offer_letters` WHERE id='$id'");
    // $message_data=mysqli_fetch_array($message_query);

    $query = mysqli_query($con, "UPDATE `offer_letters` SET `status`='$status' where `id`='$id'");



    // $select_query=mysqli_query($con,"SELECT * from `offer_letters`  where `id`='$id'");
    // while ($row_select=mysqli_fetch_array($select_query))
    // {
    //   $cand_name=$row_select['cand_name'];$mail_id=$row_select['personal_mail_id'];$jobtype=$row_select['jobtype'];$jobmonths=$row_select['jobmonths'];$joining_date=$row_select['joining_date'];$pos=$row_select['pos'];$job_title=$row_select['job_title'];$report_to=$row_select['reporting_to'];
    // }
    //     $message="<h3>Offer Letter Details</h3><br><p>GREETINGS.</p><br><p>This is to inform you that the offer letter Requested by ".$message_data['requested_by']." is Signed and confirmed by ".$name."</p> <p><b><u> Offer Letter Details are :</u></b></p><p><b>Cadidate Name :</b> ".$cand_name."</p><p><b>Email Id : </b>".$mail_id." </p><p><b>Job Type : </b>".$jobtype.",".$jobmonths."</p><p><b>Joining Date: </b>".$joining_date."</p><p><b>Position: </b>".$pos."</p><p><b>Job Title: </b>".$job_title."</p> <p>Candidate will be reporting to ".$report_to."</p>" ;
    //     $mail->Subject = "Offer Letter Accepted";

    //     $mail->Body= $message;
    //     $mail->AltBody = 'This is to inform you that the offer letter has been Requested by '.$message_data['requested_by'].' is now confirmed by '.$message_data['reporting_to'];
    //     if(!$mail->send()) 
    //     {
    //         echo '<script type="text/javascript">'; 
    //         echo 'alert("Notification not sent.");';

    //         echo '</script>';
    //     }
    //     else{
    //         echo '<script type="text/javascript">'; 
    //         echo 'alert("Notification sent.");'; 

    //         echo '</script>';
    //     }

    echo "<script>alert('Offer Letter saved successfully.');window.location.href='adoHeadOLR_Accepted.php?id=$enity_id.';</script>";

    echo "</br>";
  } else {
    echo "<script>alert('Offer Letter save failed. Please Try again...!!!');</script>";
    echo "</br>";
  }
}
