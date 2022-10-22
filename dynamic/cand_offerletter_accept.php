<?php
    include('../includes/dbconnection.php');
    error_reporting(0);


    $id=$_GET['id'];
    $curr_date=date("Y-m-d");
    $status=6;

    $query = "UPDATE offer_letters SET status='$status',`cand_response_date`='$curr_date' WHERE id='$id'";
    $results = mysqli_query($con, $query);



        $query123 = "SELECT * FROM `hr_email` ";
        $results1 = mysqli_query($con, $query123);
        $results123=mysqli_fetch_array($results1);

?>

<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $results123['email'];                 // SMTP username
$mail->Password = $results123['password'];                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($results123['email'], 'IFIM HR');

$name=mysqli_query($con,"SELECT * FROM offer_letters where `id`='$id' ");
    
$row=mysqli_fetch_array($name);
$cand_name=$row['cand_name'];$cand_entity=$row['entity_name'];
$mail->addAddress($row['personal_mail_id'], $row['cand_name']);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($results123['email'], 'OFFER LETTER DETAILS');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

   



   // $mail->addAttachment('AmansCV.pdf','OFFER LETTER');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'CIf Details';
    $page=$base_link."CIF_deatail.php?id=".$id;
    $body='Dear '.$cand_name.'There is a document requirment by '.$cand_entity.'<br/><br/>Please complete the same and revert within the timeframe .<br><a href="'.$page.'" target="_blank">Candidate Information Form</a>';
    $mail->Body    = $body;
    $mail->AltBody = 'Dear '.$cand_name.'There is a document requirment by '.$cand_entity.'<br/><br/>Please complete the same and revert within the timeframe .<br><a href="'.$page.'" target="_blank">Candidate Information Form';
    
    if(!$mail->send()) {
      echo '<script type="text/javascript">'; 
      echo 'alert("Offer Letter is not sent.");'; 
      echo 'window.location.href = "olr_list_approved.php";';
      echo '</script>';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    } 
    else
     {
   echo '<script type="text/javascript">'; 
    echo 'alert("Please fill the Candidate Information Form sent to you.");'; 
    echo 'window.close();';
    echo '</script>';

    }

    


?>