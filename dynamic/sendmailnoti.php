
<?php
include('../includes/dbconnection.php');
$entity=$_SESSION['entity'];
$query123 = "SELECT * FROM `hr_email` ";
$results1 = mysqli_query($con, $query123);
$results123=mysqli_fetch_array($results1);
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;


//$mail->SMTPDebug = 3;   
$xyz=$results123['email'];                            // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $results123['email'];                 // SMTP username
$mail->Password = $results123['password'];                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($results123['email'], 'IFIM HR');
                 // Name is optional
$mail->addReplyTo($results123['email'], 'IFIM HR');

$table=strtolower($entity." emp");
$mailing = "SELECT * FROM `$table` ";
$sendmail = mysqli_query($con, $mailing);
while ($row=mysqli_fetch_array($sendmail))
{
    $mail->addAddress($row['email'],$row['name']); //to
}
$mail->isHTML(true);  
?>