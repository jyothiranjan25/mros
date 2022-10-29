<?php
      
      // include ('includes/rtf-html converter.php');
      require ('includes/mpdf/vendor/autoload.php');
      $target_file = $_SESSION['filename'];
      //echo "<script>console.log('".$target_file."');</script>";
      //$target_file = "../Offer_Letters/IFIM B SCHOOL/OLR_SN_14.rtf";
      // $reader = new RtfReader();
      $html = file_get_contents($target_file); // or use a string
      // $reader->Parse($rtf);
      // $formatter = new RtfHtml();
      // $htmltext = $formatter->Format($reader->root);

	// $text = str_replace('&loz;', ' ',$htmltext);


      $mpdf = new \Mpdf\Mpdf();
      $html1 = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
      $mpdf->WriteHTML($html1);
      $target_file = substr($target_file, 0, -4);
      echo "<script>alert('$target_file');</script>";

      $mpdf->Output($target_file."pdf",'F');
      echo "<script>alert('Pdf Generated.');window.location.href ='adoHeadOLR_Accepted.php';</script>";
