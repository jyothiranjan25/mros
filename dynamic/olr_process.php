    <?php

    include('../includes/dbconnection.php');




    $entity = $_SESSION['entity'];
    $table = strtolower($entity . "_headcount");
    $entity_tran = strtolower($entity . '_transaction');
    $notification_table = $entity . "_notification";

    // function amount_inr_format($num)
    // {
    //   $num = "" . $num;
    //   if (strlen($num) < 4) return $num;
    //   $tail = substr($num, -3);
    //   $head = substr($num, 0, -3);
    //   $head = preg_replace("/\B(?=(?:\d{2})+(?!\d))/", ",", $head);
    //   return $head . "," . $tail;
    // }

    if (isset($_POST['submit'])) {

      $stat = 1; //for accepted offer letter.
      $reqby = $_POST['reqby'];
      $datesubmitted = $_POST['datesubmitted'];
      $cand_name = $_POST['cand_name'];
      $pos = $_POST['pos'];
      $jobtype = $_POST['jobtype'];
      $jobmonths = $_POST['jobmonths'];
      $job_title = $_POST['job_title'];
      $curr_type = $_POST['cur_type'];
      $joining_date = $_POST['joining_date'];
      $cur_name = $curr_type;
      $ctc = $_POST['ctc'];
      // for calculating other currency type

      if ($cur_name != "INR") {
        $results = mysqli_query($con, "SELECT * from `currency_control` Where name='$cur_name'");

        if (mysqli_num_rows($results) > 0) {
          $conv_row = mysqli_fetch_array($results);

          $new_ctc = $ctc * $conv_row['amount'];
        }
      } else {
        $new_ctc = $ctc;
      }


      $cand_address = $_POST['cand_address'];
      $mctc = $ctc / 12;
      $probation = $_POST['probation'];
      $reporting_to = $_POST['reporting_to'];
      $expiry_date = $_POST['expiry_date'];
      $work_time = $_POST['work_time'];
      $work_days = $_POST['work_days'];
      $entity_name = $_POST['entity_name'];
      $perks = $_POST['perks'];
      $template_id = $_POST['template_name'];
      echo $template_id;
      $olr_id = $_POST['olr-id'];
      $symbol = $_POST['symbol'];

      //query used for all purpose
      $message_query = mysqli_query($con, "SELECT * from `offer_letters` WHERE id='$olr_id'");
      $olr_data = mysqli_fetch_array($message_query);

      //for calculation how much to deduct from the budget.

      $arr = array('1' => 'April', '2' => 'May', '3' => 'June', '4' => 'July', '5' => 'August', '6' => 'September', '7' => 'October', '8' => 'November', '9' => 'December', '10' => 'January', '11' => 'February', '12' => 'March',);

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

            $subject = "OFFER LETTER REJECTED";
            $title = "offer letter submission to " . $olr_data['reporting_to'];
            $message = "<h3>Offer Letter Details</h3><br><p>Dear.</p><br><p>It is to inform you that a new offer letter which has been requested by ," . $olr_data['requested_by'] . ",is now rejected due to headcount unavailibilty.</p>";

            $from = $_SESSION['email'];
            $noti_query = mysqli_query($con, "INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");

            echo "<script>alert('Offer Letter Request is Rejected; Due to Headcount Unavailability(:     From " . $arr[$mon] . "');</script>";
            $update_query = mysqli_query($con, "UPDATE `offer_letters` SET `status`='3' WHERE `id`='$olr_id'");
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

            $subject = "OFFER LETTER REJECTED";
            $title = "offer letter submission to " . $olr_data['reporting_to'];
            $message = "<h3>Offer Letter Details</h3><br><p>Dear.</p><br><p>It is to inform you that a new offer letter which has been requested by ," . $olr_data['requested_by'] . ",is now rejected due to budget unavailibilty.</p>";

            $from = $_SESSION['email'];
            $noti_query = mysqli_query($con, "INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");

            $status = 3;
            echo "<script>alert('Budget Unavailability (: From " . $arr[$mon] . " ');</script>";
            $update_query = mysqli_query($con, "UPDATE `offer_letters` SET `status`='3' WHERE `id`='$olr_id'");
            break;
          }
        }
      }

      if ($valid == 1 && $status == 0) {

        $se_query = mysqli_query($con, "SELECT * from budget WHERE entity='$entity'");
        while ($row = mysqli_fetch_array($se_query)) {
          $mon = $row['month'];
          $budget = $row['budget'];
          if ($mon == $monthy) {
            $dctc = $mctc / 31;
            $d = 30 - $dates;
            $dctc = $dctc * $d;
            $budget = $budget - $dctc;
            $update_q = mysqli_query($con, "UPDATE `budget` SET `budget`='$budget' WHERE `entity`='$entity' and `month`='$mon'");
          } else if ($mon > $monthy && $mon < $jobmons) {
            $budget = $budget - $mctc;
            $update_q = mysqli_query($con, "UPDATE `budget` SET `budget`='$budget' WHERE `entity`='$entity' and `month`='$mon'");
          }
        }
        $a = array();    // HeadCount Reducing starts ...................................................................
        $sel_query1 = mysqli_query($con, "SELECT * from `$table` WHERE `position`='$job_title'");
        while ($rows = mysqli_fetch_array($sel_query1)) {
          $mons = $rows['month'];
          $hc = $rows['hc'];
          if ($mons >= $monthy && $mons < $jobmons) {
            $hc = $hc - 1;
            array_push($a, "5rr[$mons]");
            $update_query = mysqli_query($con, "UPDATE `$table` SET `hc`='$hc' WHERE `position`='$job_title'  and `month`='$mons'");
          }
        }
        $arrlength = count($a);
        for ($i = 1; $i < $arrlength; $i++) {
          $m = $m . $a[$i] . ",";
        }
        $reason = "The Budget -" . number_format($dctc, 2) . " Reduced from " . $a[0] . "; - " . number_format($mctc, 2) . "/month is Reduced for the respective months- " . $m . " as olr_sn_" . $olr_id . " Requested By " . $reqby . "";
        $bud = "-" . $ctc . "";
        $hhc = "-1/" . $job_title . "";
        $insert_query = mysqli_query($con, "INSERT INTO `$entity_tran`( `budget`, `hc`, `reason`) VALUES('$bud','$hhc','$reason')");
        if ($insert_query) {
          echo "<script>alert('" . $reason . "');</script>";
        }
      }
      if ($valid == 1 && $status == 0) {
        $template_table = str_replace(" ", "_", $entity_name) . "_templates";
        $query_temp = mysqli_query($con, "SELECT * FROM `$template_table` WHERE  `id`='$template_id'");
        $row = mysqli_fetch_array($query_temp);
        $html = $row['html'];
        $head_res_date = date("Y-m-d");



        //data for replacing tokens in the offer letter
        $datesubmitted =   $olr_data['datesubmitted'];
        $datesubmit = strtotime($datesubmitted);
        $datesubmitte = date("d-m-Y",  $datesubmit);

        $timestamp = strtotime($joining_date);
        $joining_dat = date("d-m-Y", $timestamp);


        $timestamp = strtotime($expiry_date);
        $expiry_dat = date("d-m-Y", $timestamp);

        $new = array($datesubmitte, $olr_data['cand_name'], $olr_data['pos'], $olr_data['job_title'], $joining_dat, $curr_type, $ctc, $olr_data['probation'], $olr_data['reporting_to'], $expiry_dat, $work_time, $work_days, $perks, $olr_data['cand_address']);
        $old = array('[1]', '[2]', '[3]', '[4]', '[5]', '[14]', '[6]', '[7]', '[8]', '[9]', '[10]', '[11]', '[12]', '[13]');

        for ($i = 0; $i <= 13; $i++) {

          $html = str_replace($old[$i], $new[$i], $html);
        }
        echo $template_id;
        $update = mysqli_query($con, "UPDATE `offer_letters` SET `joining_date`='$joining_date', `ctc`='$ctc', `probation`='$probation', `expiry_date`='$expiry_date', `work_time`='$work_time', `work_days`='$work_days',`perks`='$perks',`status`='$stat',`head_response_date`='$head_res_date',`html` = '$html', `template_id` = '$template_id' WHERE `id`='$olr_id'");


        if ($update) {

          echo "<script>alert('Offerletter Generated!');";
          echo 'window.location.href="adoHeadOLR_Accepted.php"</script>';
        } else {
          echo mysqli_error($con);
        }
      } else {

        echo '<script type="text/javascript">window.location.href="OLR_BudgetProb.php"</script>';
      }
    }
    ?>
