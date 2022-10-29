<?php

include('../includes/dbconnection.php');




$template_name = mysqli_real_escape_string($con, $_POST['template_name']);
if ($template_name) {
  $entity = $_POST['entity'];
  $table = strtolower(str_replace(" ", "_", $entity) . "_Templates");
  $data = mysqli_query($con, "SELECT html from $table WHERE template_name='$template_name';");
  $row = mysqli_fetch_array($data);
  $num_rows = mysqli_num_rows($data);
  if ($num_rows > 0) {
    $html = $row['html'];
  }
}







if (isset($_POST['submit'])) {

  $entity_name = str_replace(" ", "_", $_POST['entity']);
  $template_name = ($_POST['template_name']);

  $html = $_POST['html'];

  $table_name = strtolower($entity_name . "_Templates");
  $flag = mysqli_query($con, "SHOW TABLES LIKE `$table_name`");
  $num_tables = mysqli_num_rows($flag);

  if (!($num_tables > 0)) {
    echo $num_tables;
    $create_template_table = mysqli_query($con, "CREATE TABLE `$table_name` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `template_name` VARCHAR(100) NOT NULL ,`html` TEXT NOT NULL , PRIMARY KEY (`id`) , UNIQUE(`template_name`)) ENGINE = InnoDB;");
    if (!$create_template_table) {
      echo mysqli_error($con);
    }

    $insert = mysqli_query($con, "INSERT INTO `$table_name` (`template_name`,`html`) 
         VALUES ('$template_name','$html')");
    if (!$insert) {
      echo mysqli_error($con);
    } else {
      echo "<script>alert('Template: " . $template_name . " created');</script>";
    }
  } else {
    $insert = mysqli_query($con, "INSERT INTO `$table_name` (`template_name`,`html`) 
         VALUES ('$template_name','$html')");
    if (!$insert) {
      echo mysqli_error($con);
    } else {
      echo "<script>alert('Template: " . $template_name . " created');</script>";
    }
  }
}


if (isset($_POST['update'])) {

  $entity_name = str_replace(" ", "_", $_POST['entity']);
  $table_name = strtolower($entity_name . "_Templates");
  $template_name = ($_POST['template_name']);
  $html = $_POST['html'];


  $upd = mysqli_query($con, "UPDATE  `$table_name` SET html='$html' WHERE `template_name` ='$template_name'");
  if (!$upd) {
    echo mysqli_error($con);
  } else {
    echo "<script>alert('Template: " . $template_name . " Updated Successfully!');</script>";
  }
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
  <title>MROS | Add Template</title>

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

  <style>
    .site_title {
      overflow: inherit;
    }

    .nav_title {
      height: 198px;
      margin-top: -59px;
    }
  </style>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/js/tinymce/tinymce.min.js"> </script>
  <script language="text/javascript" type="text/javascript">
    tinyMCE.init({
      relative_urls: false,
      remove_script_host: false,
      convert_urls: false,
      selector: '#tinymce_1',
      height: '600px',
      extended_valid_elements: "newpage",
      custom_elements: "newpage",
      plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help',
        'fullpage'
      ],
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help',
      menu: {
        favs: {
          title: 'My Favorites',
          items: 'code visualaid | searchreplace | emoticons'
        }
      },
      menubar: 'favs file edit view insert format tools table help',
    });
  </script>


  <script type="text/javascript">
    function selecttype(str) {

      var req = new XMLHttpRequest();
      req.open("get", "template_name.php?entity=" + str, true);
      req.send();
      req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById("school").innerHTML = req.responseText;
        }
      }
    }
  </script>
</head>

<body class="nav-md" onload="selecttype(document.getElementById('entity').value)">
  <?php
  include('includes/leftbar.php');
  include('includes/html_header.php');
  include('includes/topbar.php');
  include('includes/html_footer1.php');

  ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Add Template </h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Fill the Following Details</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>


              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br>
              <form name="email" id="email" data-parsley-validate class="form-horizontal form-label-left" method="POST">

                <div class="item form-group">
                  <label class=" col-md-3 col-sm-3 " class="form-control" for="entity_name">Select the entity for which the new template is being generated:<span class="required">*</span>
                  </label>
                  <div class="col-md-4 col-sm-4 " style="margin-top: 6px;">
                    <select class="form-control" name="entity" id="entity" onchange="selecttype(this.value)" required>
                      <option value="">Select Entity</option>


                      <?php

                      $entity_query = mysqli_query($con, "SELECT * from `entity`");
                      while ($row = mysqli_fetch_array($entity_query)) {

                        if ($entity == $row['entity_name']) {

                          $selected = "selected";
                        } else {
                          $selected = "";
                        }
                      ?>
                        <option <?= $selected ?> required="required" value="<?php echo  $row['entity_name']; ?>"><?php echo $row['name']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>




                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3" class="form-control" for="template_name">Name of template:<span class="required">*</span>
                  </label>
                  <div class="col-md-4 col-sm-4 " style="margin-top: 6px;">
                    <input required name="template_name" onblur="myFunction('email')" onfocus="this.value=''" list="school" type="text" class="form-control" value="<?php echo $template_name ?>" placeholder="offer letter template name" autocomplete="off">
                    <datalist id="school">
                      <?php
                      $sel_test = mysqli_query($atr, "SELECT name FROM offer_letters");
                      if (mysqli_num_rows($sel_test)) {
                        while ($row = mysqli_fetch_array($sel_test)) {
                          echo "<option value='" . $row['name'] . "'></option>";
                        }
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </form>
              <form action="" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                <input required name="entity" value="<?php echo $entity ?>" autocomplete="off" style="display:none">
                <input required name="template_name" value="<?php echo $template_name ?>" autocomplete="off" style="display:none">



                <br>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3" class="form-control">Enter the template details: <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-8 ">
                    <textarea name="html" id="tinymce_1"> <?php echo $html ?> </textarea>
                  </div>
                </div>
                <br>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-5">
                    <?php if ($html == "") { ?>
                      <button name="submit" type="submit" class="btn btn-success">Submit</button>
                    <?php } else { ?>
                      <button name="update" type="submit" class="btn btn-warning">Update</button>
                    <?php } ?>
                  </div>
                </div>
              </form>
              <div class="ln_solid"></div>
              <pre>
<h2>Variables</h2>
<b>
[1] for Date
[2] for Candidate Name
[3] for Position
[4] for Job Title
[5] for Joining Date
[6] for CTC
[7] for Probation
[8] for Reporting_to
[9] for Expirydate
[10] for Work timings
[11] for Working days
[12] for Perks
[13] for Candidate Address
[14] for CTC currency
</b>
</pre>

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
      <a href="#">GO TO TOP</a>
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

    function myFunction(x) {

      if (document.forms['email'].template_name.value === "") {
        alert("empty input field");
        document.forms['email'].template_name.blur();
        return false;
      }
      document.getElementById(x).submit();
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