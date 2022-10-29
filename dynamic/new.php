<?php
include('../includes/dbconnection.php');


$entity = $_SESSION['entity'];
$roletable = $entity . " role";
$notification_table = $entity . " notification";
$message_query = mysqli_query($con, "Select * from `offer_letters` WHERE id='2'");
$message_data = mysqli_fetch_array($message_query);
$subject = "OFFER LETTER ACCEPTED";
$title = "offer letter submission to " . $message_data['reporting_to'];
$message = "<h3>Offer Letter Details</h3><br><p>Dear.</p><br><p>It is to inform you that a new offer letter which has been requested by ," . $message_data['requested_by'] . ",is now accepted from " . $message_data['reporting_to'] . "</p>";

$from = $_SESSION['email'];
$noti_query = mysqli_query($con, "INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");
if (!$noti_query) {
    echo "aerguiop";
}
