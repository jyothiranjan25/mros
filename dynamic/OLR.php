<?php
include('../includes/dbconnection.php');
// include('sendmailnoti.php');

include('includes/leftbar.php');
include('includes/topbar.php');
include('includes/html_footer1.php');
include('includes/html_header.php');


$entity_id = $_SESSION['id'];
$e = "New Employee";
$entity =  str_replace(" ", "_", $_SESSION['entity']);
$table = "headcount";
$roletable = "role";
$notification_table = "notification";
$valid = 2;
$budget = 0;
$hc = 0;

if (isset($_POST['submit'])) {
  $arr = array('1' => 'April', '2' => 'May', '3' => 'June', '4' => 'July', '5' => 'August', '6' => 'September', '7' => 'October', '8' => 'November', '9' => 'December', '10' => 'January', '11' => 'February', '12' => 'March',);
  $entityname = "IFIMentity";
  $ctc = $_POST['ctc'];
  $mctc = $ctc / 12;
  $pos = $_POST['pos'];
  $job_title = $_POST['job_title'];
  $report_to = $_POST['report_to'];
  $jobmonths = $_POST['jobmonths'];

  $jobtype = $_POST['jobtype'];
  $joining_date = $_POST['joining_date'];
  $time = strtotime($joining_date);
  $monthy = date("m", $time);
  $dates = date("j", $time);
  $monthy = $monthy - 3;

  if ($monthy == -1 || $monthy == -2 || $monthy == 0) {
    $monthy = $monthy + 12;
  }


  if ($jobtype == "parttime") {
    $jobmons = $monthy + $jobmonths;
  }

  if ($jobtype == "fulltime") {
    $jobmons = 13;
  }


  if ($entityname === '0' || $pos === '0' || $job_title === '0' || $report_to === '0') {
    echo "<script>alert('Please Select All The Details... ');</script>";
  } else {

    if ($jobtype == "fulltime") {

      $selquery = mysqli_query($con, "SELECT * from `$table` WHERE position='$job_title'");
      while ($row = mysqli_fetch_array($selquery)) {
        $mon = $row['month'];
        $hc = $row['hc'];
        if ($mon >= $monthy && $mon < $jobmons) {

          if ($hc <= 0) {
            $valid = 0;
          } else {
            $valid = 1;
          }

          if ($valid == 0) {

            echo "<script>alert('Offer Letter Request is Rejected; Due to Headcount Unavailability(:  From " . $arr[$mon] . "');</script>";
            break;
          }
        }
      }

      $budgetseq = mysqli_query($con, "SELECT * from budget WHERE entity='$entity'");
      while ($row = mysqli_fetch_array($budgetseq)) {
        $mon = $row['month'];
        $budget = $row['budget'];
        if ($mon >= $monthy && $mon < $jobmons) {

          if ($budget >= $mctc) {
            $status = 0;
          } else {
            $status = -3;
            echo "<script>alert('Budget Unavailability (: From " . $arr[$mon] . " ');</script>";
            break;
          }
        }
      }
    }

    if ($jobtype == "parttime") {


      $selquery = mysqli_query($con, "SELECT * from `$table` WHERE position='$job_title'");
      while ($row = mysqli_fetch_array($selquery)) {
        $mon = $row['month'];
        $hc = $row['hc'];

        if ($mon >= $monthy && $mon < $jobmons) {
          //  echo "<script>alert('".$monthy." ".$mon." ".$jobmons." ');</script>";
          if ($hc <= 0) {
            $valid = 0;
          } else {
            $valid = 1;
          }

          if ($valid == 0) {

            echo "<script>alert('Offer Letter Request is Rejected; Due to Headcount Unavailability(:     From " . $arr[$mon] . "');</script>";
            break;
          }
        }
      }

      $budgetseq = mysqli_query($con, "SELECT * from budget WHERE entity='$entity'");
      while ($row = mysqli_fetch_array($budgetseq)) {
        $mon = $row['month'];
        $budget = $row['budget'];
        if ($mon >= $monthy && $mon < $jobmons) {

          if ($budget >= $mctc) {
            $status = 0;
          } else {
            $status = -3;
            echo "<script>alert('Budget Unavailability (: From " . $arr[$mon] . " ');</script>";
            break;
          }
        }
      }
    }
  }





  if ($valid == 1) {
    $cand_name = $_POST['cand_name'];
    $cand_address = $_POST['cand_address'];
    $mail_id = $_POST['email'];
    $probation = $_POST['probation'];
    $no_of_days = $_POST['expire_date'];
    $date = $joining_date;
    $str = "+" . $no_of_days . "days";
    $expire_date = date('Y-m-d', strtotime($date . $str));
    $requested_by = $_SESSION['email'];
    $work_hour = $_POST['work_hour'];
    $work_days = $_POST['work_days'];
    $replacement = $_POST['replacement'];
    $entity_name = $_POST['entity_name'];
    $perks = $_POST['perks'];
    $cur_name = $_POST['cur_name'];
    $sn = 0;
    $sel_query = mysqli_query($con, "SELECT * from offer_letters");
    while ($row = mysqli_fetch_array($sel_query)) {
      $sn = $row['id'];
    }
    $sn++;
    $submit_date = date("Y-m-d");

    if ($cur_name != "INR(Rs)") {
      $query = "SELECT * FROM `currency_control` WHERE name='$cur_name'";
      $results = mysqli_query($con, $query);
      if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_array($results)) {
          $ctc = $ctc * $row['amount'];
        }
      }
    }
    $status = 0;
    $query = mysqli_query($con, "INSERT INTO `offer_letters` (`id`,`cand_name`,`cand_address`,`jobtype`,`jobmonths`, `pos`, `job_title`,`personal_mail_id`, `joining_date`,`currency_type`, `ctc`, `probation`, `reporting_to`,`requested_by`,`replacement`, `expiry_date`, `work_time`, `work_days`,`entity_id`,`perks`,`status`,`olr_filled_date`)
                     VALUES ('$sn','$cand_name','$cand_address','$jobtype','$jobmonths', '$pos', '$job_title','$mail_id', '$joining_date','$cur_name','$ctc', '$probation', '$report_to','$requested_by','$replacement', '$expire_date', '$work_hour', '$work_days','$entity_id','$perks','$status','$submit_date')");
    if (!$query) {
      echo "<script>alert('Offer Letter Request Failed!');</script>";

      echo "Error Description: " . mysqli_error($con) . "<br>";
    }

    //               $subject="OFFER LETTER";
    //               $title="offer letter submission to ". $report_to;
    //               $message="<h3>Offer Letter Details</h3><br><p>GREETINGS.</p><br><p>It is to inform you that a new offer letter has been requested by ".$requested_by."</p><p>No response recieved from ".$report_to."</p>";


    // $noti_query=mysqli_query($con,"INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`, `entity_id`) VALUES ('$requested_by', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");


    if ($query) {
      // if ($status == 0) {


      echo "<script>alert('Offer Letter Details has been submitted Successfully :)');</script>";
      // $mailto = "mailto:" . $requested_by;
      // $message = "<p>GREETINGS,</p><p>This is to inform you that a new offer letter has been Requested by " . $username . " ( <a href='" . $mailto . "'>" . $requested_by . "</a> ) </p><p><b><u> Offer Letter Details are :</u></b></p><p><b>Cadidate Name :</b> " . $cand_name . "</p><p><b>Email Id : </b>" . $mail_id . " </p><p><b>Job Type : </b>" . $jobtype . "," . $jobmonths . "</p><p><b>Joining Date: </b>" . $joining_date . "</p><p><b>Position: </b>" . $pos . "</p><p><b>Job Title: </b>" . $job_title . "</p> <p>Candidate will be reporting to " . $report_to . "</p>";

      // // $mail->Subject = "Offer Letter Requested by " . $username;

      // $mail->Body = $message;
      // $mail->AltBody = 'This is to inform you that a new offer letter has been Requested by ' . $username;
      // if (!$mail->send()) {
      // echo '<script type="text/javascript">';
      // echo 'alert("Notification not sent.");';
      // echo '</script>';
      // } else {
      // echo '<script type="text/javascript">';
      // echo 'alert("Notification sent.");';
      // echo 'window.location.href = "index.php";';
      // echo '</script>';
      // }
      // } else if ($status == 3) {
      // echo "<script>alert('Offer Letter Details has been submitted with Budget Unavailability');</script>";


      // $message = "<p>GREETINGS.</p><p>This is to inform you that a new offer letter has been Requested by " . $requested_by . "<b> (Issue : Budget Unavailability) </b></p> <p>offer letter submitted to " . $report_to . "</p><p><b><u> Offer Letter Details are:</u></b></p><p><b>Cadidate Name :</b> " . $cand_name . "</p><p><b>Email Id :</b>" . $mail_id . " </p><p><b>Job Type : </b>" . $jobtype . "," . $jobmonths . "</p><p><b>Joining Date: </b>" . $joining_date . "</p><p><b>Position: </b>" . $pos . "</p><p><b>Job Title: </b>" . $job_title . "</p>";

      // $mail->Subject = "Offer Letter Requested by " . $username;

      // $mail->Body = $message;
      // $mail->AltBody = 'This is to inform you that a new offer letter has been Requested by ' . $username;
      // if (!$mail->send()) {
      // echo '<script type="text/javascript">';
      // echo 'alert("Notification not sent.");';
      // echo '</script>';
      // } else {
      // echo '<script type="text/javascript">';
      // echo 'alert("Notification sent.");';
      // // echo 'window.location.href = "OLR.php";';
      //     // echo '</script>';
      //   }
      // }
    } else {
      echo "<script>alert('Something gone Wrong.');</script>";
    }
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

  <title>MROS | </title>

  <style>
    .site_title {
      overflow: inherit;
    }

    .nav_title {
      height: 198px;
      margin-top: -59px;
    }

    .required {
      color: red;
    }

    .form-control:focus {
      border: 1px solid #4195fc;
      /* some kind of blue border */

      /* other CSS styles */

      /* round the corners */
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;


      /* make it glow! */
      -webkit-box-shadow: 0px 0px 4px #4195fc;
      -moz-box-shadow: 0px 0px 4px #4195fc;
      box-shadow: 0px 0px 4px #4195fc;
      /* some variation of blue for the shadow */
    }
  </style>

  <script>
    function selectposition(str) {
      var req = new XMLHttpRequest();
      req.open("get", "position.php?type=" + str, true);
      req.send();
      req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById("pos").innerHTML = req.responseText;
        }
      }
    }
  </script>
  <script>
    function selectdep(str) {
      var req = new XMLHttpRequest();
      req.open("get", "department.php?dep=" + str, true);
      req.send();
      req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById("report_to").innerHTML = req.responseText;
        }
      }
    }
  </script>

  <script>
    function select_pos_name(str) {
      var req = new XMLHttpRequest();
      req.open("get", "select_pos_name.php?name=" + str, true);
      req.send();
      req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById("job_title").innerHTML = req.responseText;
        }
      }
    }
  </script>

</head>

<body class="nav-md">
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- top tiles -->
    <!-- /top tiles -->
    <br />
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
      <div class="x_content">
        <center>
          <h3><b>Offer Letter Request Form</b></h3>
        </center><br>
        <div class="row">
          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>OLR SN:</b><span class="required"></span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <input name="sn" type="text" value="<?php
                                                $id = 0;
                                                $sel_query = mysqli_query($con, "Select * from offer_letters");
                                                while ($row = mysqli_fetch_array($sel_query)) {
                                                  $id = $row['id'];
                                                }
                                                $id = $id + 1;
                                                echo "OLR_SN_" . $id;
                                                ?>" disabled="true" id="sn" required="required" class="form-control">
          </div>

        </div>
        <br>
        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Candidate Name:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-6 col-sm-6 ">
            <input name="cand_name" id="cand_name" type="text" required="required" class="form-control" onfocusout="capitals()">
          </div>
        </div>
        <br>
        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="address"><b>Address:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-6 col-sm-6 ">
            <textarea name="cand_address" id="cand_address" type="text" required="required" class="form-control" onfocusout="capitals()"></textarea>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Type of Job:</b><span class="required">*</span></label>
          </div>
          <div class="col-md-2 col-sm-6 ">

            <select name="jobtype" id="jobtype" title="Type Of Job" class="form-control" onchange='CheckColorss(this.value);' required="">
              <option value="fulltime">Full Time</option>
              <option value="parttime">Part Time</option>
            </select>
            <input type="number" class="form-control" name="jobmonths" id="jobmonths" min="1" placeholder="Months" disabled="true" style='display:none;' required="">

          </div>

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Personal Email id:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <input name="email" type="email" id="email" required="required" class="form-control">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Position:</b><span class="required">*</span></label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <select name="pos" id="pos" title="Select a Position" class="form-control" required="" onchange="select_pos_name(this.value);">
              <option value=0>Select Position</option>
              <?php
              $entity_query = mysqli_query($con, "SELECT * FROM `position_type`");
              while ($row = mysqli_fetch_array($entity_query)) {
              ?>
                <option required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
              <?php
              }
              ?>
            </select>

          </div>


          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Job Title:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <select name="job_title" id="job_title" title="Select an job_title" class="form-control" required="">
              <option value="0">Select Position Type</option>

            </select>
          </div>


        </div>
        <br>
        <div class="row">
          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Department:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <select name="" title="Select Department" class="form-control" required="" onchange="selectdep(this.value);">
              <option value="0">Select Department</option>
              <?php
              $dep_table = "department";
              $dep_query = mysqli_query($con, "SELECT * FROM `$dep_table` WHERE entity_id='$entity_id'");
              while ($row = mysqli_fetch_array($dep_query)) {
              ?>
                <option required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Reporting To:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <select name="report_to" id="report_to" title="" class="form-control" required="">
              <option value="0">First Select Job Title</option>
            </select>
          </div>
        </div>
        <br>
        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Joining Date:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <input name="joining_date" id="joining_date" required="required" class="date-picker form-control" type="date" min="<?php
                                                                                                                                echo date("Y-m-d"); ?>">
          </div>
        </div>
        <br>
        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Cost To Company:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <input name="ctc" type="number" id="ctc" required="required" class="form-control" step="0.001" placeholder="&#8377; Per Annum" onfocusout="numberWithCommas()">
          </div>
          <div class="col-md-2 col-sm-6 ">
            <select name="cur_name" id="cur_name" title="Select Currency" class="form-control" required="" onchange="selectcuramt(this.value);">
              <option value="INR(Rs)">INR(Rs)</option>
              <?php
              $name_query = mysqli_query($con, "SELECT * from `currency_control`");
              while ($row = mysqli_fetch_array($name_query)) {
                if ($row['email'] != " ") {

              ?>
                  <option required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php
                } else {
                  $value = "disabled";
                }
                ?>

              <?php
              }


              ?>
            </select>
          </div>
          <div class="col-md-6 col-sm-4 ">
            <b> Please update currency if required<span class="label" style="color:red;"> *</span></b>

          </div>
        </div>
        <br>
        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Probation:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <input name="probation" type="number" min="0" value="3" id="probation" required="required" class="form-control">
          </div>
          <div class="col-md-4 col-sm-4 ">
            <label style="margin-top:6px;" for="number"><b> Months</b> </label>
          </div>
        </div>
        <br>

        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b>Expiry After:</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-md-2 col-sm-6 ">
            <input name="expire_date" id="expire_date" required="required" type="number" class="date-picker form-control" value="7">
          </div>
          <div class="col-md-4 col-sm-4 ">
            <label style="margin-top:6px;" for="number"><b> Days</b> </label>
          </div>
        </div>
        <br>
        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b> Work Timings:</b><span class="required">*</span>
            </label>
          </div>

          <div class="col-md-1 col-sm-1 ">
            <input name="work_hour" id="work_hour" required="required" type="number" class="form-control" value="40">
          </div>
          <div class="col-md-1 col-sm-4 ">
            <label for="number"><b>Hours in </b> </label>
          </div>

          <div class="col-md-1 col-sm-1 ">
            <input name="work_days" id="work_days" required="required" type="number" class="form-control" value="5">
          </div>

          <div class="col-md-4 col-sm-4 ">
            <label for="number"><b>working days per week</b> </label>
          </div>

        </div>
        <br>
        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b> Replacement to</b><span class="required">*</span>
            </label>
          </div>

          <div class="col-md-2 col-sm-6 ">
            <select name="replaceTo" id="replaceTo" title="Select an Entity" class="form-control" onchange='CheckColors(this.value);' required="">
              <option value="New Employee">New Employee</option>
              <option value="others">Others</option>
            </select>
            <input type="text" class="form-control" name="replacement" id="replacement" value="New Employee" placeholder="Name of the Employee" style='display:none;' required="" />
          </div>



        </div>
        <br>
        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="number"><b> Entities :</b><span class="required">*</span>
            </label>
          </div>
          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <select name="entity_name" title="Select an Entity" class="form-control" required="">
              <?php
              if ($super_admin == 0) {
              ?>
                <option required="required" value="<?php echo $_SESSION['entity']; ?>"><?php echo $_SESSION['entity']; ?></option>
              <?php
              } else {
              ?>
                <?php
                $entity_query = mysqli_query($con, "Select * from entity");
                while ($row = mysqli_fetch_array($entity_query)) {
                ?>
                  <option required="required" value="<?php echo  $row['id']; ?>"><?php echo $row['name']; ?></option>
              <?php
                }
              }
              ?>
            </select>
          </div>
        </div>
        <br>


        <div class="row">

          <div class="col-form-label col-md-2 col-sm-3 label-align">
            <label for="perks"><b>Other Perks :</b>
            </label>
          </div>
          <div class="col-md-6 col-sm-6  ">
            <textarea name="perks" id="perks" class="form-control"></textarea>
            <br>
            <br>
            <br>
          </div>
          <div class="col-md-2 offset-md-5">
            <button type="submit" name="submit" type="button" class="btn btn-info btn" style="padding: 16px; width: 194px;border-radius: 10px;background-color: #3f51b5;">SUBMIT</button>
          </div>
        </div>
    </form>
  </div>
  </div>
  </div>
  </div>
  <!-- /page content -->
  </div>
  </div>
  <script type="text/javascript">
    function numberWithCommas() {
      var x = document.getElementById("ctc");
      y = x.value;
      y = y * 1;
      i = y / 12;
      j = i / 30;
      z = (y).toLocaleString('en-IN');
      document.getElementById("commactc").innerHTML = "&#8377;" + z + " / Annum";
      i = (i).toLocaleString('en-IN');
      j = (j).toLocaleString('en-IN');
      document.getElementById("monthctc").innerHTML = "&#8377;" + i + " / Month";
      document.getElementById("dctc").innerHTML = "&#8377;" + j + " / day";
    }
  </script>
  <script type="text/javascript">
    function CheckColors(val) {
      var element = document.getElementById('replacement');

      if (val == 'others') {
        element.value = '';
        element.style.display = 'block';
      } else {
        element.value = val;
        element.style.display = 'none';
      }
    }

    function CheckColorss(val) {
      if (val == 'parttime') {
        var elements = document.getElementById('jobmonths');
        elements.value = '';
        elements.style.display = 'block';
        document.getElementById("jobmonths").disabled = false;

      } else {

        document.getElementById("jobmonths").disabled = true;
        elements.style.display = 'none';

      }
    }
  </script>
</body>

</html>