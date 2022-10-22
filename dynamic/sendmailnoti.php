
<?php
error_reporting(E_ALL);
include('../includes/dbconnection.php');
$entity=$_SESSION['entity'];
$query123 = "SELECT * FROM `hr_email` ";
$results1 = mysqli_query($con, $query123);
$results123=mysqli_fetch_array($results1);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);


// //$mail->SMTPDebug = 3;   
// $xyz=$results123['email'];                            // Enable verbose debug output

// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = $results123['email'];                 // SMTP username
// $mail->Password = $results123['password'];                           // SMTP password
// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                                    // TCP port to connect to

// $mail->setFrom($results123['email'], 'IFIM HR');
//                  // Name is optional
// $mail->addReplyTo($results123['email'], 'IFIM HR');

// $table=strtolower($entity." emp");
// $mailing = "SELECT * FROM `$table` ";
// $sendmail = mysqli_query($con, $mailing);
// while ($row=mysqli_fetch_array($sendmail))
// {
//     $mail->addAddress($row['email'],$row['name']); //to
// }


try {
    //Server settings
    $mail->SMTPDebug = 3    ;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.live.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $results123['email'];                     //SMTP username
    $mail->Password   = $results123['password'];                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($results123['email'], 'VU HR');
    $mail->addAddress($results123['email'], 'Rahul recep');     //Add a recipient
    $mail->addAddress('asrahulkrishna@dsjcl.org');               //Name is optional
    $mail->addReplyTo($results123['email'], 'VU HR');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}






// $mail->addAddress('asrahulkrishna@dsjcl.org','Rahul'); //to

// $mail->isHTML(true);
// echo "<script>alert('Offer Letter Details has been submitted with Budget Unavailability');</script>";


// $message = "<p>GREETINGS.</p><p>This is to inform you that a new offer letter has been Requested by " . $requested_by . "<b> (Issue : Budget Unavailability) </b></p> <p>offer letter submitted to " . $report_to . "</p><p><b><u> Offer Letter Details are:</u></b></p><p><b>Cadidate Name :</b> " . $cand_name . "</p><p><b>Email Id :</b>" . $mail_id . " </p><p><b>Job Type : </b>" . $jobtype . "," . $jobmonths . "</p><p><b>Joining Date: </b>" . $joining_date . "</p><p><b>Position: </b>" . $pos . "</p><p><b>Job Title: </b>" . $job_title . "</p>";

// $mail->Subject = "Offer Letter Requested by " . $username;

// $mail->Body = $message;
// $mail->AltBody = 'This is to inform you that a new offer letter has been Requested by ' . $username;
// if (!$mail->send()) {
//     echo '<script type="text/javascript">';
//     echo 'alert("Notification not sent.");';
//     echo '</script>';
// } else {
//     echo '<script type="text/javascript">';
//     echo 'alert("Notification sent.");';
//     echo 'window.location.href = "index.php";';
//     echo '</script>';
// }
?>