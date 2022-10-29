<!-- generating pdf -->

<?php
require('includes/mpdf/vendor/autoload.php');
include('../includes/dbconnection.php');




$olr_id = $_GET['olr_id'];


$ol = mysqli_query($con, "SELECT of.*,e.entity_name FROM offer_letters of LEFT JOIN entity e ON of.entity_id=e.id  where of.id='$olr_id' ");
$ro = mysqli_fetch_array($ol);
$html = $ro['html'];
$table_templates = str_replace(" ", "_", $ro['entity_name']) . "_templates";
$template_id = $ro['template_id'];


$ol = mysqli_query($con, "SELECT hf.header,hf.footer FROM `$table_templates` of LEFT JOIN header_footer hf ON hf.id=of.header_footer_id WHERE of.id='$template_id'");
$ro = mysqli_fetch_array($ol);
$header = $ro['header'];
$footer = $ro['footer'];

// $header=$ro['header'];
// $footer=$ro['footer'];





if ($olr_id != "") {







     $mpdf = new \Mpdf\Mpdf(['setAutoBottomMargin' => 'stretch', 'setAutoTopMargin' => 'stretch']);

     $mpdf->SetHTMLHeader($header);
     $mpdf->defaultfooterline = 0;
     $mpdf->SetFooter($footer);
     $mpdf->WriteHTML(utf8_encode($html));
     // $mpdf->WriteHTML($html);

     // $file = 'pdfs/' . $email . '.pdf';
     $mpdf->output();
     // $check = $mpdf->output($file, 'S');

} else {
     echo "<script> alert('Something Gone Wrong!');</script>";
}



?>