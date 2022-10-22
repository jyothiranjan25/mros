<!-- generating pdf -->

<?php
require ('includes/mpdf/vendor/autoload.php');
include('../includes/dbconnection.php');


error_reporting(0);

$table=strtolower($_GET['entity']."_templates");
$offer_id=$_GET['offer_id'];


$ol = mysqli_query($con, "SELECT hf.header,hf.footer,of.html FROM `$table` of LEFT JOIN header_footer hf ON hf.id=of.header_footer_id WHERE of.id='$offer_id'");
$ro = mysqli_fetch_array($ol);
 $html=$ro['html'];
$header=$ro['header'];
$footer=$ro['footer'];
if(!$ol){

     echo mysqli_error($con);
}





if ($offer_id != "") {

     $mpdf = new \Mpdf\Mpdf(['setAutoBottomMargin' => 'stretch', 'setAutoTopMargin' => 'stretch']);

     $mpdf->SetHTMLHeader($header);
     $mpdf->defaultfooterline = 0;
     $mpdf->SetFooter($footer);
     $mpdf->WriteHTML(utf8_encode($html));
     // $mpdf->WriteHTML($html);

     // $file = 'pdfs/' . $email . '.pdf';
     $mpdf->output();
     // $check = $mpdf->output($file, 'S');

}else{
     echo "<script> alert('Something Gone Wrong!');</script>";

}



?>



