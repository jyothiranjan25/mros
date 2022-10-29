<?php
include('../includes/dbconnection.php');



if (isset($_POST['save'])) // if click on save button
{
  $ext = ".html";
  $directory = "../Offer_Letter_Templates/" . $_POST["entity"] . "/"; // here we get directory name
  $template_name = $_POST["template_name"]; // filename

  // require_once('php-html-to-rtf-converter-master/src/HtmlToRtf.php');
  // $htmlToRtfConverter = new HtmlToRtf\HtmlToRtf($_POST['edit_template']);
  // $htmlToRtfConverter->getRTFFile($directory,$template_name.$ext);
  file_put_contents($directory . $template_name . $ext, $_POST['edit_template']);
  echo "<script>alert('Offer Letter template " . $template_name . " of entity: " . $directory . " successfully edited.');window.location.href='editTemplate.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/ifim_logo.jpg" type="image/ico" />
  <title>MROS | </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <link href="../build/css/input.css" rel="stylesheet">

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="js/tinymce/init-tinymce.js"></script>
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript">
    function selecttype(str) {
      var req = new XMLHttpRequest();
      req.open("get", "template_name.php?entity=" + str, true);
      req.send();
      req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById("template_name").innerHTML = req.responseText;
        }
      }
    }
  </script>
  <style>
    .site_title {
      overflow: inherit;
    }

    .nav_title {
      height: 198px;
      margin-top: -59px;
    }
  </style>
</head>

<body class="nav-md">
  <?php
  include('includes/leftbar.php');

  include('includes/topbar.php');
  ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>EDIT Template </h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">

              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>


              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form action="" method="post" enctype="multipart/form-data" id="demo-form1" data-parsley-validate class="form-horizontal form-label-left">

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" class="form-control" for="entity_name">Select the entity for which the new template is being generated:<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6">
                    <select name="entity" id="entity" title="Select a Entity" class="form-control" onchange="selecttype(this.value)" required="">
                      <option value="0">Select Entity</option>
                      <?php

                      $entity_query = mysqli_query($con, "SELECT * from `entity`");
                      while ($row = mysqli_fetch_array($entity_query)) {
                      ?>
                        <option required="required" value="<?php echo  $row['entity_name']; ?>"><?php echo $row['entity_name']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>




                </div>



                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" class="form-control" for="entity_name">Select the entity for which the new template is being generated:<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6">
                    <select name="template_name" id="template_name" title="Select the template type" class="form-control" required="">
                      <option value="">Select template type</option>

                    </select>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button name="view" type="button" id="view" class="btn btn-success">View</button>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" class="form-control" for="edit_template">Enter the template details: <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-6 ">
                    <textarea name="edit_template" id="edit_template" class="tinymce"></textarea>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button name="save" type="submit" id="save" disabled class="btn btn-success">Save</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>





    </div>
  </div>
  <!-- /page content -->

  <!-- footer content -->
  <footer>
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>
  <script type="text/javascript">
    function CheckColors(val) {
      var element = document.getElementById('dep');
      if (val == 'Cordinator' || val == 'Program_Head') {
        element.value = '';
        element.style.display = 'block';

      } else {
        element.value = val;
        element.style.display = 'none';

      }
    }
  </script>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="../vendors/google-code-prettify/src/prettify.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>