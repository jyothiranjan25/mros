<?php
include('../includes/dbconnection.php');


$mail_id = $_SESSION['email'];
$completed = '0';
$selection_query = mysqli_query($con, "SELECT * from feedback where mail_id='" . $mail_id . "' and status='$completed'");
$row_slect = mysqli_fetch_array($selection_query);

if ($row_slect) {
  echo '<script type="text/javascript">';
  echo 'alert("You have already submitted your feedback, Thank you...");';
  echo 'window.location.href = "index.php";';
  echo '</script>';
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MROS | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      .site_title {
        overflow: inherit;
      }

      .nav_title {
        height: 198px;
        margin-top: -59px;
      }

      .required {
        color: red
      }
    </style>
  </head>

  <body class="nav-md">
    <?php
    include('includes/leftbar.php'); ?>
    <?php
    include('includes/topbar.php'); ?>

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">


        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel tile ">
            <div class="x_title">
              <h2>Rating Overview </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-md-2" style="margin-left: 10px;">
                  <h4>Strongly Disagree</h4>
                </div>
                <div class="col-md-1 " style="border-right: 2px solid #9aa8b8;max-width: 5.333333% !important;">
                  <h4>1</h4>
                </div>

                <div class="col-md-1" style="margin-left: 10px;">
                  <h4> Disagree</h4>
                </div>
                <div class="col-md-1" style="border-right: 2px solid #9aa8b8;max-width: 5.333333% !important;">
                  <h4>2</h4>
                </div>
                <div class="col-md-1" style="margin-left: 10px;">
                  <h4> Agree</h4>
                </div>
                <div class="col-md-1" style="border-right: 2px solid #9aa8b8;max-width: 5.333333% !important;">
                  <h4>3</h4>
                </div>
                <div class="col-md-2" style="margin-left: 10px;">
                  <h4>Moderately Agree</h4>
                </div>
                <div class="col-md-1" style="border-right: 2px solid #9aa8b8;max-width: 5.333333% !important;">
                  <h4>4</h4>
                </div>
                <br>
                <div class="col-md-2" style="margin-left: 10px;">
                  <h4>Strongly Agree</h4>
                </div>
                <div class="col-md-1" style="max-width: 5.333333% !important;">
                  <h4>5</h4>
                </div>
              </div>
              <br>
              <div class="row">

              </div>



            </div>
          </div>
        </div>
      </div>


      <!-- form starts -->

      <div class="row" style="margin-top: -420px;">


        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel tile ">
            <div class="x_title">
              <h2>Feedback Form </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-1">
                  <span style="font-size: 1.5em;">1</span>
                </div>
                <div class="col-md-1">
                  <span style="font-size: 1.5em;">2</span>
                </div>
                <div class="col-md-1">
                  <span style="font-size: 1.5em;">3</span>
                </div>
                <div class="col-md-1">
                  <span style="font-size: 1.5em;">4</span>
                </div>
                <div class="col-md-1">
                  <span style="font-size: 1.5em;">5</span>
                </div>
              </div>
              <br>
              <form action="feedbackProcess.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">I received my employment offer and associated information in a
                      timely manner.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options1" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options1">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options1">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options1">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options1">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">The information I received before my arrival helped me settle in. <span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options2" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options2">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options2">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options2">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options2">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">I knew where to report, who to see and felt welcomed on my arrival.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options3" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options3">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options3">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options3">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options3">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">After completing Day 1 and 2 of the induction, I gained an
                      understanding of <?= $_SESSION['entity'] ?> and its expectations from me.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options4" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options4">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options4">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options4">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options4">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">My initial departmental induction was helpful and informative.<span class="required">*</span></p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options5" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options5">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options5">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options5">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options5">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">I gained an understanding of the <?= $_SESSION['entity'] ?> resources and services and
                      where to look for more information.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options6" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options6">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options6">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options6">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options6">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;"> I knew who to ask for help and was provided with assistance and
                      support.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options7" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options7">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options7">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options7">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options7">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;"> IMy Director/ Principal was helpful & provided me with direction.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options8" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options8">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options8">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options8">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options8">
                      </label>
                    </div>
                  </div>
                </div>



                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;"> My Director/ Principal was helpful & provided me with direction.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options9" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options9">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options9">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options9">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options9">
                      </label>
                    </div>
                  </div>
                </div>


                <br>


                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;"> I have met all the members of my team and others who I work closely with.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options10" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options10">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options10">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options10">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options10">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;"> I feel well-informed and comfortable in my role.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options11" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options11">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options11">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options11">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options11">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;"> My new role was effectively explained, and I was able to start work without unnecessary
                      delay.<span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options12" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options12">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options12">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options12">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options12">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">I know how and when my performance will be evaluated.<span class="required">*</span></p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options13" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options13">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options13">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options13">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options13">
                      </label>
                    </div>
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">I feel part of <?= $_SESSION['entity'] ?>.<span class="required">*</span></p>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="1" name="options14" required="required">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="2" name="options14">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="3" name="options14">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="4" name="options14">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="radio">
                      <label>
                        <input type="radio" value="5" name="options14">
                      </label>
                    </div>
                  </div>
                </div>



                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">Any other comments .<span class="required">*</span></p>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">


                      <textarea name="Comments" class="resizable_textarea form-control" required="required" placeholder="Please mention any other comments"></textarea>

                    </div>
                  </div>
                </div>


                <div class="row" style="margin-top:40px;">
                  <div class="col-md-2 offset-md-10">
                    <input type="submit" name="submit" value="SUBMIT" class="btn btn-info btn-lg" style=" padding: 12px;
                                    width: 154px;border-radius: 10px;background-color: #3f51b5;
                                    ">
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
        <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>

  </html>
<?php
}
?>