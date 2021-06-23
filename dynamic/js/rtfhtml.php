    <?php

      use PHPUnit\Framework\TestCase;
      use RtfHtmlPhp\Document;
      use RtfHtmlPhp\Html\HtmlFormatter;

      $target_file = $_POST['target_file'];
      final class ParseSimpleTest extends TestCase
      {
        public function testParseSimple(): void
        {
          $rtf = file_get_contents($target_file);
          $document = new Document($rtf);
          $this->assertTrue(true);
        }

        public function testParseSimpleHtml(): void
        {

          $rtf = file_get_contents($target_file);
          $document = new Document($rtf);
          $formatter = new HtmlFormatter();
          $html = $formatter->Format($document);    
          echo $html;

        }  
      }

      ?>