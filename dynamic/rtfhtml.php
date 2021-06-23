    <?php

      // include ('includes/rtf-html converter.php');

      $target_file = $_POST['target_file'];
      // $reader = new RtfReader();
      $html = file_get_contents($target_file); // or use a string
  //     $reader->Parse($rtf);
  //     $formatter = new RtfHtml();
  //     $htmltext = $formatter->Format($reader->root);

		// $text = str_replace('&loz;', ' ',$htmltext);



      echo $html;

    ?>