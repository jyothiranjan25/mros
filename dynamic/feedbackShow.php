<?php
include('../includes/dbconnection.php');


$sn = intval($_GET['formid']);



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

    .requires {
      color: blue
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




    <!-- form starts -->

    <div class="row">


      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel tile ">
          <div class="x_title">
            <?php

            $feedback = mysqli_query($con, "SELECT * FROM feedback where feedback.sn=$sn");
            $row = mysqli_fetch_array($feedback);
            ?>

            <h2>Name: <span style="color:black"><?= $row['name'] ?></span> Email: <span style="color:black"><?= $row['mail_id'] ?> </span>Entity: <span style="color:black"><?= $row['entity'] ?></span> </h2>
            <ul class="nav navbar-right panel_toolbox">

              <h2>Onboarding Feedback Form </h2>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-md-7"></div>
              <div class="col-md-4">
                <span style="font-size: 1.5em;color: red">Points Out of 5</span>
              </div>

            </div>
            <br>
            <form action="process.php" method="post" enctype="multipart/form-data">



              <?php


              $feedback = mysqli_query($con, "SELECT * FROM feedback where feedback.sn=$sn");


              while ($row = mysqli_fetch_array($feedback)) {



              ?>



                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">1) <span class="requires">I received my employment offer and associated information in a
                        timely manner.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">


                    <input type="text" value="<?php echo htmlentities($row['q1']); ?> / 5" class="form-control" readonly />


                  </div>

                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">2) <span class="requires">The information I received before my arrival helped me settle in. </span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q2']); ?> / 5" class="form-control" readonly />
                  </div>

                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">3) <span class="requires">I knew where to report, who to see and felt welcomed on my arrival.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q3']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>



                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">4)<span class="requires"> After completing Day 1 and 2 of the induction, I gained an
                        understanding of <?= $_SESSION['entity_name'] ?> and its expectations from me.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q4']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>



                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">5)<span class="requires"> My initial departmental induction was helpful and informative.</span><span class="required">*</span></p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q5']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">6)<span class="requires"> I gained an understanding of the <?= $_SESSION['entity_name'] ?> resources and services and
                        where to look for more information.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q6']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>



                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">7) <span class="requires">I knew who to ask for help and was provided with assistance and
                        support.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q7']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>



                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">8) <span class="requires">My Director/ Principal was helpful & provided me with direction.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q8']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>



                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">9) <span class="requires">My Director/ Principal was helpful & provided me with direction.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q9']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>


                <br>


                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">10)<span class="requires"> I have met all the members of my team and others who I work closely with.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q10']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">11) <span class="requires">I feel well-informed and comfortable in my role.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q11']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">12)<span class="requires"> My new role was effectively explained, and I was able to start work without unnecessary
                        delay.</span><span class="required">*</span> </p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q12']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">13)<span class="requires"> I know how and when my performance will be evaluated.</span><span class="required">*</span></p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q13']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>


                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;">14) <span class="requires">I feel part of <?= $_SESSION['entity_name'] ?>.</span><span class="required">*</span></p>
                  </div>
                  <div class="col-md-1">
                    <input type="text" value="<?php echo htmlentities($row['q14']); ?> / 5" class="form-control" readonly />
                  </div>
                </div>



                <br>

                <div class="row">
                  <div class="col-md-7">
                    <p style="font-size:17px;"><span class="requires"> Other Comments .</span><span class="required">*</span></p>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">


                      <textarea name="Comments" class="resizable_textarea form-control" required="required" placeholder="Please mention any other comments" readonly=""><?php echo  $row['comments'] == "" ? "No Comments" : $row['comments']   ?></textarea>

                    </div>
                  </div>
                </div>



              <?php
              }
              ?>
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