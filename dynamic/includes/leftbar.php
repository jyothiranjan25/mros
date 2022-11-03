<?php
include('../includes/dbconnection.php');
$entity_id = $_SESSION['entity_id'];

if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['mailid']);
  unset($_SESSION['role']);
  unset($_SESSION['entity']);
  header("location: sign.php");
}


if ($_POST['post_entity']) {

  // $post_entity  = $_POST['post_entity'];

  // $inst_query = mysqli_query($con, "SELECT * from `entity` WHERE `entity_name`='$post_entity'");
  // $inst_row = mysqli_fetch_array($inst_query);
  // $ses_entity_id = $inst_row['id'];
  // // echo "<script>alert('" . $ses_entity_id . "');</script>";


  // $adm_email = $_SESSION['email'];
  // $login_query = mysqli_query($con, "SELECT * from `login` WHERE email='$adm_email' AND entity_id='$ses_entity_id'");
  // $count = mysqli_num_rows($login_query);
  // $fet = mysqli_fetch_array($login_query);
  if ($count > 0) {

    unset($_SESSION['entity']);
    unset($_SESSION['entity_id']);
    $_SESSION['entity_id'] = $ses_entity_id;
    // $_SESSION['entity']=$post_entity;
    $_SESSION['entity'] =  str_replace(" ", "_", $post_entity);
    $_SESSION['entity_name'] = $post_entity;
    $_SESSION['role'] = $fet['role'];
  } else {
    echo "<script>alert('You do not have any access to the system, Please contact SuperAdmin!');</script>";
    echo "<script>
                window.location.href='sign.php';</script>";
  }
}

$sesentity = $_SESSION['entity'];
$ses_entity_id = $_SESSION['entity_id'];

// $role_table = strtolower(str_replace(" ", "_", $_SESSION['entity']) . "_Role");
$role_name = $_SESSION['role'];
$username = "";
$generate_olr = 0;
$accept_reject_olr = 0;
$approve_olr = 0;
$olr_sent_to_cand = 0;
$view_olr = 0;
$accounts = 0;
$edit_olr = 0;
$asset_req_manage = 0;
$super_admin = 0;
$new_emp = 0;
$it = 0;
$email = $_SESSION['email'];
$query_role = mysqli_query($con, "SELECT * from `role` Where name='$role_name' ");
while ($row = mysqli_fetch_array($query_role)) {
  $generate_olr = $row['generate_olr'];

  $accept_reject_olr = $row['accept_reject_olr'];

  $approve_olr = $row['approve_olr'];

  $olr_sent_to_cand = $row['olr_sent_to_cand'];

  $view_olr = $row['view_olr'];

  $accounts = $row['accounts'];

  $asset_req_manage = $row['asset_req_manage'];

  $super_admin = $row['super_admin'];

  $new_emp = $row['new_emp'];

  $it = $row['IT'];
}
?>
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col hideOnprint">
      <div class="left_col scroll-view ">
        <div class="navbar nav_title " style="background:white;padding:0px;    padding-top: 81px; margin-top: -97px;border: 0;">
          <a href="index.php?id=<?= $entity_id ?>" class="site_title"><span><img style=" height: 109%;
    width: 89%;" src="../images/logomain.png" alt="..."></span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="images/profile.jpg" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?php
                $c = 1;
                $email = $_SESSION['email'];
                if ($_SESSION['role'] != "New Employee") {
                  $entity_table = strtolower($_SESSION['entity'] . "_Emp");
                } else {
                  $entity_table = strtolower($_SESSION['entity'] . "_New_Emp");
                }

                $query = mysqli_query($con, "SELECT * from `$entity_table` WHERE role='$role_name' and email='$email'");
                while ($row = mysqli_fetch_array($query)) {
                  if ($c > 1) {
                  } else {
                    echo $row['name'];
                    $c++;
                    // ." <br><span style='margin-left: 27px;font-size:17px;'>As</span><br> ".$_SESSION['role'];
                    $username = $row['name'];
                  }
                }
                //  $username="Aman";
                ?></h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <?php
        $offerletter_pending_query = mysqli_query($con, "SELECT * FROM offer_letters where `entity_id`='$ses_entity_id' and status = 0");
        $offerletter_accepted_query = mysqli_query($con, "SELECT * FROM offer_letters where `entity_id`='$ses_entity_id' and status >= 1");
        $offerletter_denied_query = mysqli_query($con, "SELECT * FROM offer_letters where `entity_id`='$ses_entity_id' and status = -2");
        $offerletter_budget_query = mysqli_query($con, "SELECT * FROM offer_letters where `entity_id`='$ses_entity_id' and status = -3");

        if ($super_admin == 1) {
          $offerletter_pending_query = mysqli_query($con, "SELECT * FROM offer_letters where status = 0");
          $offerletter_accepted_query = mysqli_query($con, "SELECT * FROM offer_letters where  status >= 1");
          $offerletter_denied_query = mysqli_query($con, "SELECT * FROM offer_letters where status = -2");
          $offerletter_budget_query = mysqli_query($con, "SELECT * FROM offer_letters where status = -3");
        } elseif ($olr_sent_to_cand == 1 && $view_olr == 1) {
          $offerletter_pending_query = mysqli_query($con, "SELECT * FROM offer_letters where status = 0");
          $offerletter_accepted_query = mysqli_query($con, "SELECT * FROM offer_letters where  status >= 1");
          $offerletter_denied_query = mysqli_query($con, "SELECT * FROM offer_letters where status = -2");
          $offerletter_budget_query = mysqli_query($con, "SELECT * FROM offer_letters where status = -3");
        } elseif ($generate_olr == 1) {
          $offerletter_pending_query = mysqli_query($con, "SELECT * FROM offer_letters where requested_by='$email' and status = 0");
          $offerletter_accepted_query = mysqli_query($con, "SELECT * FROM offer_letters where requested_by='$email' and status >= 1");
          $offerletter_denied_query = mysqli_query($con, "SELECT * FROM offer_letters where requested_by='$email' and status = -2");
          $offerletter_budget_query = mysqli_query($con, "SELECT * FROM offer_letters where requested_by='$email' and status = -3");
        }



        $cnt = mysqli_num_rows($offerletter_pending_query);
        $cnt1 = mysqli_num_rows($offerletter_accepted_query);
        $cnt2 = mysqli_num_rows($offerletter_denied_query);
        $cnt3 = mysqli_num_rows($offerletter_budget_query);
        ?>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">

            <h3>Menu</h3>

            <ul class="nav side-menu">

              <?php
              if ($super_admin == 1) {
              ?>
                <li><a><i class="fa fa-users"></i>Add Masters <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <?php

                    $entity_query = mysqli_query($con, "SELECT * FROM entity WHERE id='$entity_id'");
                    while ($row = mysqli_fetch_array($entity_query)) {
                      echo "<li><a href='add_masters.php?page=" . $row['entity_name'] . '&id=' . $row['id'] . "'>" . $row['name'] . "</a></li>";
                    }
                    ?>
                    <!-- <li><a href="add_masters_bschool.php">B-School</a></li>
              <li><a href="add_masters_ifim.php">Ifim College</a></li>
               -->
                  </ul>
                </li>


                <li><a><i class="fa fa-edit"></i>Manage Masters <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <?php
                    $entity_query = mysqli_query($con, "SELECT * from entity WHERE id='$entity_id'");
                    while ($row = mysqli_fetch_array($entity_query)) {
                      echo "<li><a href='manage_masters.php?page=" . $row['entity_name'] . '&id=' . $row['id'] . "'>" . $row['name'] . "</a></li>";
                    }
                    ?>
                    <!-- <li><a href="add_masters_bschool.php">B-School</a></li>
              <li><a href="add_masters_ifim.php">Ifim College</a></li>
               -->
                  </ul>
                </li>
                <li><a href="update_currency.php?id=<?= $entity_id ?>"> <i class="fa fa-usd"></i> Currency<span class="fa fa-chevron-right"></span></a>
                </li>



                <li><a><i class="fa fa-building"></i>Add Department <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <?php
                    $entity_query = mysqli_query($con, "SELECT * from entity WHERE id='$entity_id'");
                    while ($row = mysqli_fetch_array($entity_query)) {
                      echo "<li><a href='add_dep.php?page=" . $row['entity_name'] . '&id=' . $row['id'] . "'>" . $row['name'] . "</a></li>";
                    }
                    ?>

                  </ul>
                </li>


                <li>
                  <a><i class="fa fa-address-book-o"></i>Add Roles <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <?php
                    $entity_query = mysqli_query($con, "SELECT * from entity WHERE id='$entity_id'");
                    while ($row = mysqli_fetch_array($entity_query)) {
                      echo "<li><a href='add_role.php?page=" . str_replace(" ", "_", $row['entity_name']) . '&id=' . $row['id'] . "'>" . $row['name'] . "</a></li>";
                    }
                    ?>

                  </ul>
                </li>


                <li><a><i class="fa fa-address-book"></i>Manage Roles <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <?php
                    $entity_query = mysqli_query($con, "SELECT * from entity WHERE id='$entity_id'");
                    while ($row = mysqli_fetch_array($entity_query)) {
                      echo "<li><a href='manage_role.php?page=" .  str_replace(" ", "_", $row['entity_name']) . '&id=' . $row['id'] . "'>" . $row['name'] . "</a></li>";
                    }
                    ?>

                  </ul>
                </li>


                <li><a> <i class="fa fa-file-text" aria-hidden="true"></i>Offer Letter Template<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href='addTemplate.php?id=<?= $entity_id ?>'>Add Template</a></li>
                    <?php $entity_query = mysqli_query($con, "SELECT * from entity WHERE id='$entity_id'");
                    while ($row = mysqli_fetch_array($entity_query)) {
                      echo "<li><a href='viewTemplates.php?page=" . str_replace(" ", "_", $row['entity_name']) . '&id=' . $row['id'] .  "'> <i class='fa fa-eye' aria-hidden='true'></i>" . $row['name'] . "</a></li>";
                    }
                    ?>

                  </ul>
                </li>
                <li>
                  <a href="add_pos.php?id=<?php echo $entity_id ?>"><i class="fa fa-user" aria-hidden="true"></i>Add Positions <span class="fa fa-chevron-right"></span></a>
                </li>
                <li><a><i class="fa fa-suitcase" aria-hidden="true"></i> Add Job Title <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <?php
                    $entity_query = mysqli_query($con, "SELECT * FROM `position_type` WHERE `entity_id`='$entity_id' ");
                    while ($row = mysqli_fetch_array($entity_query)) {

                      echo "<li><a href='add_job_title.php?type=" . $row['name'] . '&id=' . $entity_id . "'>" . $row['name'] . "</a></li>";
                    }
                    ?>
                  </ul>
                </li>


                <!-- <li><a href="add_entitlement.php"><i class="fa fa-edit"></i>Add Entitlement <span class="fa fa-chevron-right"></span></a>
           
          </li>
          <li><a href="assign_entitlement.php"><i class="fa fa-edit"></i>Assign Entitlement <span class="fa fa-chevron-right"></span></a>
            
          </li> -->
                <!-- <li><a href="add_entity.php"> <i class="fa fa-university" aria-hidden="true"></i>
                    Add Entity <span class="fa fa-chevron-right"></span></a>

                </li> -->




              <?php
              }
              if ($olr_sent_to_cand == 1) {
              ?>
                <li><a href="hr_new_employee_list.php?id=<?= $entity_id ?>"><i class="fa fa-plus-circle"></i>New Employee<span class="fa fa-chevron-right"></span></a></li>

              <?php
              }
              ?>
              <?php
              if ($accept_reject_olr == 1) {
              ?>

                <li><a><i class="fa fa-user"></i> Recruitment <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href="OLR_Pending.php?id=<?= $entity_id ?>">Offer Letter Requested <span class="badge badge-light"> <?php echo $cnt; ?></span> </a></li>
                    <li><a href="adoHeadOLR_Accepted.php?id=<?= $entity_id ?>">Approved <span class="badge badge-light"><?php echo $cnt1; ?></span> </a></li>
                    <li><a href="adoHeadOLR_Denied.php?id=<?= $entity_id ?>">Denied <span class="badge badge-light"><?php echo $cnt2; ?></span> </a></li>
                    <li><a href="OLR_BudgetProb.php?id=<?= $entity_id ?>">Budget Unavailability <span class="badge badge-light"> <?php echo $cnt3; ?> </span></a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-gear"></i> Budget Requests<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href="adoHeadSendRequest.php?id=<?= $entity_id ?>">Send Request <span class="fa fa-edit"></span></a></li>

                    <li><a href="adoHeadBudgetRequested.php?id=<?= $entity_id ?>">Requested<span class="fa fa-check"></span></a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i>View Transactions <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <?php
                    if ($super_admin == 1) {
                      $entity_query = mysqli_query($con, "SELECT * FROM entity WHERE id=$entity_id");
                      while ($row = mysqli_fetch_array($entity_query)) {
                        echo "<li><a href='entity_transaction.php?page=" . $row['entity_name'] . '&id=' . $row['id'] . "'>" . $row['name'] . "</a></li>";
                      }
                    } else {

                      echo "<li><a href='entity_transaction.php?page=" . $_SESSION['entity'] . '&id=' . $row['id'] . "'>" . str_replace("_", " ", $_SESSION['entity']) . "</a></li>";
                    }
                    ?>

                  </ul>
                </li>
                <li><a href="adoSeparationResults.php?id=<?= $entity_id ?>"><i class="fa fa-eject"></i>Separation Requests<span class="fa fa-chevron-right"></span></a></li>

              <?php
              }
              ?>

              <?php
              if ($accounts == 1) {
              ?>

                <li><a href="requestedBudget.php?id=<?= $entity_id ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Budget Requests <span class="fa fa-chevron-right"></span></a></li>
                <li><a><i class="fa fa-gear"></i> Budget & HeadCount <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href="updateBudget.php?id=<?= $entity_id ?>">Update Budget <span class="fa fa-edit"></span></a></li>
                    <li><a href="updateHeadCount.php?id=<?= $entity_id ?>">Update HeadCount <span class="fa fa-edit"></span></a></li>



                  </ul>
                </li>

                <li><a><i class="fa fa-list-alt"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href="budgetChanges.php?id=<?= $entity_id ?>">Budget Changes<span class="fa fa-check"></span></a></li>
                    <li><a href="headcountChanges.php?id=<?= $entity_id ?>">Headcount Changes<span class="fa fa-check"></span></a></li>

                  </ul>
                </li>

              <?php
              }

              ?>



              <?php
              if ($generate_olr == 1 || $super_admin == 1 || $view_olr == 1 || $olr_sent_to_cand == 1) {
              ?>
                <li><a><i class="fa fa-edit"></i> Offer Letter Details <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <?php
                    if ($generate_olr == 1) {
                    ?>
                      <li><a href="OLR.php?id=<?= $entity_id ?>" .$entity_id.>Apply for Offer Letter</a></li>

                    <?php
                    }
                    if ($generate_olr == 1 || $super_admin == 1 || $view_olr == 1) {
                    ?>
                      <li><a href="OLR_Pending.php?id=<?= $entity_id ?>">Pending <span class="badge badge-light"><?php echo $cnt; ?> </span> </a></li>
                      <li><a href="OLR_Accepted.php?id=<?= $entity_id ?>">Approved <span class="badge badge-light"> <?php echo $cnt1; ?> </span></a></li>
                      <li><a href="OLR_Denied.php?id=<?= $entity_id ?>">Denied <span class="badge badge-light"> <?php echo $cnt2; ?> </span></a></li>

                    <?php
                    }
                    ?>
                    <?php
                    if ($olr_sent_to_cand == 1) {
                    ?>
                      <li><a href="olr_list_approved.php?id=<?= $entity_id ?>">Send Offer Letter</a></li>
                      <li><a href="olr_list_sent.php?id=<?= $entity_id ?>">Candidate Response</a></li>
                      <li><a href="change_date.php?id=<?= $entity_id ?>">Change Date of joining</a></li>
                      <!-- <li><a href="report_olr.php">Report</a></li> -->
                    <?php
                    }
                    ?>

                  </ul>

                </li>
                <?php
                if ($generate_olr == 1) {
                ?>
                  <li><a><i class="fa fa-usd"></i>Currency <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="update_currency.php?id=<?= $entity_id ?>">Update Currency </a>
                      </li>

                    </ul>
                  </li>
                <?php
                }
                ?>

              <?php
              }
              ?>


              <?php
              if ($olr_sent_to_cand == 1) {
              ?>
                <li><a><i class="fa fa-edit"></i> Reports <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="report_olr.php?id=<?= $entity_id ?>">Offer Letter</a></li>
                    <li><a href="report_emp.php?id=<?= $entity_id ?>">Employee Details</a></li>
                    <li><a href="report_sep_emp.php?id=<?= $entity_id ?>">Seperation Details</a></li>
                    <?php

                    ?>

                  </ul>

                </li>

              <?php
              }
              ?>

              <?php
              if ($new_emp == 1) {
              ?>
                <li><a><i class="fa fa-edit"></i> Onboarding <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <?php
                    //$connect = mysqli_connect("localhost", "root", "password", "MROS");
                    $email = $_SESSION['email'];
                    $status = 10;
                    $query = mysqli_query($con, "SELECT `status` FROM `employee_details` WHERE `email`='$email' and `status`='$status' ");
                    $flag = mysqli_num_rows($query);
                    if ($flag != 0) {
                    ?>
                      <li><a href="confirmAssets.php?id=<?= $entity_id ?>">Assets</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="form_wizards.php?id=<?= $entity_id ?>">Form</a></li>

                  </ul>
                </li>
                <li>
                  <?php

                  $query = mysqli_query($con, "SELECT `status` FROM `employee_details` WHERE `email`='$email' and `status`='5' or `status`='6' ");

                  $flag = mysqli_num_rows($query);
                  if ($flag != 0) {

                    $emp_id = $_SESSION['empid'];
                  ?>
                <li><a href="exit_interview.php?empid=<?php echo $emp_id; ?>&id=<?= $entity_id ?>"><i class="fa fa-envelope"></i> EXIT INTERVIEW FORM <span class="fa fa-chevron-right"></span></a>

                <?php
                  }
                ?>
                </li>
              <?php
              }
              ?>
              <?php
              if ($olr_sent_to_cand == 1) {
              ?>
                <li><a><i class="fa fa-edit"></i>Equipment Updates<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href="hr_view_asset_status.php?&id=<?= $entity_id ?>">View</a></li>


                  </ul>
                </li>
              <?php
              }
              ?>
              <?php
              if ($asset_req_manage == 1) {
              ?>
                <li><a><i class="fa fa-edit"></i>Assign Equipments <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href="newEMPassets.php?&id=<?= $entity_id ?>">Assign</a></li>
                    <li><a href="separateEMPassets.php?&id=<?= $entity_id ?>">Seperate</a></li>

                  </ul>
                </li>
              <?php
              }
              ?>
              <?php
              if ($it == 1) {
              ?>
                <li><a href="assign_mail.php?&id=<?= $entity_id ?>"><i class="fa fa-edit"></i>Assign Mail and Id <span class="fa fa-chevron-right"></span></a>

                </li>
              <?php
              }
              ?>

              <?php
              if ($olr_sent_to_cand == 1) {
              ?>
                <li> <a href="hr_exit_interview.php?&id=<?= $entity_id ?>"> <i class="fa fa-ban"></i> Termination EIF <span class="fa fa-chevron-right"></span> </a></li>
                <li> <a href="view_exit_interview.php?&id=<?= $entity_id ?>"> <i class="fa fa-file-text"></i> View Exit Interview <span class="fa fa-chevron-right"></span> </a></li>
                <!-- <li> <a href="asset_not_recieved.php?&id=<?= $entity_id ?>"> <i class="fa fa-ban"></i> Asset Not Recieved <span class="fa fa-chevron-right"></span> </a></li>   -->
                <li> <a href="cifResults.php?&id=<?= $entity_id ?>"> <i class="fa fa-address-book"></i> CIF Forms <span class="fa fa-chevron-right"></span> </a></li>
                <li> <a href="feedbackResults.php?&id=<?= $entity_id ?>"> <i class="fa fa-comments"></i> Feedback Forms <span class="fa fa-chevron-right"></span> </a></li>
                <li><a href='separationResults.php?&id=<?= $entity_id ?>'><i class="fa fa-eject"></i>Employee Separation <span class="fa fa-chevron-right"></span></a></li>
              <?php
              }
              ?>

              <?php
              if ($super_admin == 1) {
              ?>
                <li> <a href="update_employee_details.php?&id=<?= $entity_id ?>"> <i class="fa fa-address-card"></i> Update Emp. Details <span class="fa fa-chevron-right"></span> </a></li>

              <?php
              }
              ?>
            </ul>
          </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Logout" href="index.php?logout=1">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>