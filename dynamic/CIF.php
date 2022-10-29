<?php
include('../includes/dbconnection.php');

$olr_id = $_GET['id'];

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>MROS | VIEW CIF </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <link href="../build/css/input.css" rel="stylesheet">


  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script type="text/javascript" src="script.js"></script>

  <style type="text/css">
    .required {
      color: red
    }

    p {
      color: black;
      background: darkgrey;
    }
  </style>
</head>

<body class="nav-md" id="whole">

  <!-- page content -->
  <div class="  " role="main">
    <div class="">
      <div class="page-title">
        <div class="title">
          <h3 style="text-align:center;color: white">- Candidate Information Form -</h3>
        </div>

      </div>

      <div class="box-header with-border">
        <a href="#" onclick="window.print()" class="btn btn-success btn-sm btn-flat hideOnprint"><span class="glyphicon glyphicon-print"></span> Print</a>
      </div>
      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">

            <div class="x_content">


              <!-- Smart Wizard -->

              <div id="wizard" class="form_wizard wizard_horizontal">
                <ul class="wizard_steps">
                  <li>
                    <a href="#step-1">
                      <span class="step_no">1</span>
                      <span class="step_descr">
                        Step 1<br />
                        <small>PERSONAL DETAILS</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-2">
                      <span class="step_no">2</span>
                      <span class="step_descr">
                        Step 2<br />
                        <small>EDUCATION DETAILS</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-3">
                      <span class="step_no">3</span>
                      <span class="step_descr">
                        Step 3<br />
                        <small>PREVIOUS EMPLOYMENT DETAILS</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-4">
                      <span class="step_no">4</span>
                      <span class="step_descr">
                        Step 4<br />
                        <small>REFERENCES</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-5">
                      <span class="step_no">5</span>
                      <span class="step_descr">
                        Step 5<br />
                        <small>MISCELLANEOUS</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-6">
                      <span class="step_no">6</span>
                      <span class="step_descr">
                        Last Step<br />
                        <small>Certification by Candidate</small>
                      </span>
                    </a>
                  </li>
                </ul>
                <form class="form-horizontal form-label-left" id="candidate_details" method="post" action="save_details.php" enctype="multipart/form-data">
                  <fieldset disabled>


                    <div id="step-1">
                      <?php
                      $cif = mysqli_query($con, "SELECT * FROM candidate_personal_info where `olr_id`='$olr_id'");

                      if (!$cif) {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                      }


                      while ($row = mysqli_fetch_array($cif)) {

                      ?> <div class="form-group row">
                          <div class="col-md-12 col-sm-6 ">
                            <p style="font-size: 35px" align="center">- PERSONAL DETAILS -</p>
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Full Name (First/Middle/Last): <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="candidate_name" value="<?php echo htmlentities($row['name']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="father-name">Father’s Name: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="candidate_father_name" value="<?php echo htmlentities($row['father_name']); ?>" required="required" class="form-control ">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input class="date-picker form-control" value="<?php echo htmlentities($row['dob']); ?>" name="candidate_dob" required="required" type="date">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="nationality">Nationality: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="candidate_nationality" value="<?php echo htmlentities($row['nationality']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Gender: <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" value="<?php echo htmlentities($row['gender']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">Phone Number (Land Line and/or Mobile):<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="candidate_phone_number" value="<?php echo htmlentities($row['phone_number']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="ssn">Social Security Number (If worked/studied in the US/Any other Country): <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="candidate_ssn" value="<?php echo htmlentities($row['ssn']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Current Address (Complete details like Door Number, street, locality, etc.,): <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <textarea name="candidate_current_address" value="" required="required" class="form-control  "><?php echo htmlentities($row['current_address']); ?></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Permanent Address (Complete information like Door Number, street, locality, etc.,): <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <textarea name="candidate_permanent_address" required="required" class="form-control  "><?php echo htmlentities($row['permanent_address']); ?></textarea>
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="pic">Passport Size Photo: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['photo']); ?>" height="300px" width="300px">
                          </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="mark-sheets">Driving License/Passport/Ration Card/PAN Card: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['id_proof']); ?>" height="300px" width="300px">
                          </div>
                        </div>
                        <table>
                          <tr>
                            <td style="width:50%">
                              <hr />
                            </td>
                            <td style="vertical-align:middle; text-align: center">OR</td>
                            <td style="width:50%">
                              <hr />
                            </td>
                          </tr>
                        </table>
                        <br>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="other_detail">Others<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                            <input type="text" name="other_proof_name" value="<?php echo htmlentities($row['other_proof']); ?>" required="required" class="form-control  ">
                          </div>

                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="mark-sheets"> <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['other_proof']); ?>" height="300px" width="300px">
                          </div>
                        </div>
                      <?php } ?>
                    </div>





                    <hr>


                    <div id="step-2">
                      <?php
                      $edu = mysqli_query($con, "SELECT * FROM candidate_education where `olr_id`='$olr_id'");

                      if (!$edu) {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                      }


                      while ($row = mysqli_fetch_array($edu)) {

                      ?><div class="form-group row">
                          <div class="col-md-12 col-sm-6 ">
                            <p style="font-size: 35px" align="center">- EDUCATION DETAILS -</p>
                          </div>
                        </div>

                        <div class="form-group row">

                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="institute-name">Select the type of education details: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <select id="education_type" name="education_type[]" class="form-control" required="required">
                              <option value="Secondary"><?php echo htmlentities($row['education_detail_type']); ?></option>

                            </select>

                          </div>
                        </div>

                        <div class="form-group row">

                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="institute-name">Name of the Institute/School/College: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="instituteName[]" value="<?php echo htmlentities($row['inst_name']); ?>" required="required" class="form-control  ">
                          </div>

                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="university-name">Board/University: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="universityName[]" value="<?php echo htmlentities($row['board']); ?>" required="required" class="form-control ">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="duration">Duration of Study (specify month & year): <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="duration[]" value="<?php echo htmlentities($row['duration']); ?>" required="required" class="form-control ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="division">Division/Class/% : <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="division[]" value="<?php echo htmlentities($row['percentage']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="degree-obtained">Degree Obtained : <span class="required">*</span>
                          </label>



                          <div class="col-md-6 col-sm-6 ">

                            <input type="text" value="<?php echo htmlentities($row['obtained']); ?>" class="form-control  ">

                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="course-type">Course Type: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" value="<?php echo htmlentities($row['course_type']); ?>" class="form-control  ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="major">Majored in:<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="major[]" value="<?php echo htmlentities($row['majored_in']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="roll-no">Student ID/Enrolment/Registration/Roll No: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="roll_no[]" value="<?php echo htmlentities($row['reg_no']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>
                        <br>
                        <h4>
                          <center>Address of Institute/School/College</center>
                        </h4><br>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="building-no">Building No & Street: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" name="building_no[]" required="required"><?php echo htmlentities($row['street']); ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="city">City: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" class="form-control" name="city[]" value="<?php echo htmlentities($row['city']); ?>" required="required">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="state">State: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" class="form-control" value="<?php echo htmlentities($row['state']); ?>" name="state[]" required="required">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="pin">PIN: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" class="form-control" value="<?php echo htmlentities($row['pin']); ?>" name="pin[]" required="required">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="landline">Landline: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" class="form-control" value="<?php echo htmlentities($row['contact']); ?>" name="landline[]" required="required">
                          </div>
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="mark-sheets">Mark Sheets: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['mark_sheet']); ?>" height="500px" width="500px">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="degree-certificate">Degree Certificate: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['degree']); ?>" height="500px" width="500px">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="provisional-degree">Provisional Degree certificate: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['provisional_degree']); ?>" height="500px" width="500px">
                          </div>
                        </div>
                        <div id="001">

                        </div>

                      <?php } ?>
                    </div>


                    <hr>



                    <div id="step-3">
                      <div class="form-group row">
                        <div class="col-md-12 col-sm-6 ">
                          <p style="font-size: 35px" align="center">- PREVIOUS EMPLOYMENT DETAILS -</p>
                        </div>
                      </div>
                      <?php
                      $emp = mysqli_query($con, "SELECT * FROM candidate_employment where `olr_id`='$olr_id'");

                      if (!$emp) {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                      }

                      $cnt = 1;
                      while ($row = mysqli_fetch_array($emp)) {

                      ?>

                        <div class="title">
                          <h2 style="text-align:center"><b>EMPLOYMENT-<?php echo htmlentities($cnt); ?></b></h2>
                        </div>
                        <div class="form-group row">

                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-name">Name of Company: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="company_name[]" value="<?php echo htmlentities($row['company_name']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="employee-id">Employee ID: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="employee_id[]" value="<?php echo htmlentities($row['employee_id']); ?> " required="required" class="form-control ">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="period-of-employment">Period of Employment (specify month & year): <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="employment_period[]" value="<?php echo htmlentities($row['duration']); ?>" required="required" class="form-control ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="designation-department">Designation & Department : <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="designation_department[]" value="<?php echo htmlentities($row['designation_dept']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-drawn-salary">Last drawn salary (CTC): <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="salary[]" value="<?php echo htmlentities($row['ctc']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="type-of-employment">Type of Employment : <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="salary[]" value="<?php echo htmlentities($row['employment_type']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-name-designation">Supervisor's Name & Designation: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="supervisor_name_designation[]" value="<?php echo htmlentities($row['supervisor_name_designation']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-number">Supervisor's Number: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="supervisor_number[]" value="<?php echo htmlentities($row['supervisor_number']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-mail">Supervisor's Mail Id: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="email" name="supervisor_mail[]" value="<?php echo htmlentities($row['supervisor_email']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="empoyer-availability">Can the employer be contacted now ? : <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="supervisor_mail[]" value="<?php echo htmlentities($row['contact_now']); ?>" required="required" class="form-control  ">

                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="employer-contact-date">If not, then provide an alternate date:<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="employer_contact_date[]" value="<?php echo htmlentities($row['alt_date']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reason-for-leaving">Reason for leaving: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="reason_for_leaving[]" value="<?php echo htmlentities($row['reason_for_leaving']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>
                        <br>
                        <h4>
                          <center>Company Address</center>
                        </h4><br>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="building-no">Building No & Street: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" name="company_building_no[]" required="required"><?php echo htmlentities($row['street']); ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="city">City: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" class="form-control" value="<?php echo htmlentities($row['city']); ?>" name="company_city[]" required="required">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="state">State: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" class="form-control" value="<?php echo htmlentities($row['state']); ?>" name="company_state[]" required="required">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="pin">PIN: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" class="form-control" name="company_pin[]" value="<?php echo htmlentities($row['pin']); ?>" required="required">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="landline">Landline: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" class="form-control" value="<?php echo htmlentities($row['landline']); ?>" name="company_landline[]" required="required">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="appointment-letter">Appointment Letter: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['appointment_letter']); ?>" height="500px" width="500px">
                          </div>
                        </div>
                        <br><br>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="salary-slip">Salary Slip: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['salary_slip']); ?>" height="500px" width="500px">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="relieving-letter">Relieving Letter: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['relieving_letter']); ?>" height="500px" width="500px">
                          </div>
                        </div>

                        <div id="002">

                        </div>




                      <?php $cnt++;
                      } ?>

                    </div>


                    <hr>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <div id="step-4">

                      <div class="form-group row">
                        <div class="col-md-12 col-sm-6 ">
                          <p style="font-size: 35px;" align="center">- REFERENCES -</p>
                        </div>
                      </div>
                      <?php
                      $ref = mysqli_query($con, "SELECT * FROM candidate_reference where `olr_id`='$olr_id'");

                      if (!$ref) {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                      }

                      $cnt = 1;
                      while ($row = mysqli_fetch_array($ref)) {

                      ?>




                        <div class="title">
                          <h2 style="text-align:center"><br><b> PERSON-<?php echo htmlentities($cnt); ?> </b></h2>
                        </div>


                        <h2>
                          <center><b></b></center>
                        </h2><br>
                        <div class="form-group row">

                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-name">Name: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="reference_person_name[]" value="<?php echo htmlentities($row['name']); ?>" required="required" class="form-control  ">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-organization">Organization: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="reference_person_organization[]" value="<?php echo htmlentities($row['organization']); ?>" required="required" class="form-control ">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-designation">Designation: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" value="<?php echo htmlentities($row['designation']); ?>" name="reference_person_designation[]" required="required" class="form-control ">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-association">How associated/ Known to you: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" value="<?php echo htmlentities($row['association']); ?>" name="reference_person_association[]" required="required" class="form-control  ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-association-year">Years of association: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" value="<?php echo htmlentities($row['association_years']); ?>" name="reference_person_association_year[]" required="required" class="form-control  ">
                          </div>
                        </div>

                        <div class="title">
                          <h6 style="text-align:center">--- Contact Details ---</h6>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-address">Address: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" name="reference_person_address[]" required="required"><?php echo htmlentities($row['address']); ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-landline">Landline: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" value="<?php echo htmlentities($row['landline']); ?>" class="form-control" name="reference_person_landline[]" required="required">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-mobile">Mobile: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" class="form-control" value="<?php echo htmlentities($row['mobile']); ?>" name="reference_person_mobile[]" required="required">
                          </div>
                        </div>
                        <div id="003">

                        </div>


                      <?php $cnt++;
                      } ?>
                    </div>

                    <hr>

                    <div id="step-5">
                      <?php
                      $mis = mysqli_query($con, "SELECT * FROM candidate_miscellaneous where `olr_id`='$olr_id'");

                      if (!$mis) {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                      }


                      while ($row = mysqli_fetch_array($mis)) {

                      ?><div class="form-group row">
                          <div class="col-md-12 col-sm-6 ">
                            <p style="font-size: 35px" align="center">- MISCELLANEOUS -</p>
                          </div>
                        </div>
                        <br>
                        <center><b>Please select the appropriate answers.</b></center>
                        <center>If the answer is ‘Yes’, please provide details on a separate sheet of paper.</center><br>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="employee-miscellaneous1">Have you ever been convicted for felony or any serious crime ? : <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">


                            <textarea class="form-control" id="yes1_reason" name="yes1_reason" required="required"><?php echo htmlentities($row['reason1']); ?></textarea>

                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="employee-miscellaneous2">Have you ever been “Laid off” or Terminated from employment? : <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">


                            <textarea class="form-control" id="yes2_reason" name="yes2_reason" required="required"><?php echo htmlentities($row['reason2']); ?></textarea>

                          </div>
                        </div>


                      <?php
                      } ?>
                    </div>

                    <hr>

                    <div id="step-6">
                      <?php
                      $sig = mysqli_query($con, "SELECT * FROM candidate_signature where `olr_id`='$olr_id'");

                      if (!$sig) {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                      }


                      while ($row = mysqli_fetch_array($sig)) {

                      ?><div class="form-group row">
                          <div class="col-md-12 col-sm-6 ">
                            <p style="font-size: 35px" align="center">- Certification by Candidate -</p>


                            <br>
                            <ol>
                              <li>I certify that the information provided in this form is true and correct to the best of my knowledge.</li>
                              <li> I further certify that I have furnished the answers in Step '5' on my own accord, free of any duress.</li>
                              <li> I authorize ‘Get Ahead Education Ltd’ or its agency to verify my credentials.</li>
                              <li> I understand that if any information furnished by me is found to be false, I could be denied employment/be terminated.</li>
                              <li> I will cooperate and facilitate the process of verification of my credentials.</li>
                            </ol>
                          </div>
                        </div>

                        <!-- Details pan card or adhar -->

                        <div class="row">
                          <div class="col-md-12" align="center">
                            <h2 class="StepTitle">--- Signature ---</h2>

                          </div>
                        </div>
                        <div class="row">

                          <div class="col-md-12" align="center">


                            <img src="upload/<?php echo "OLR_SN_" . htmlentities($row['olr_id']); ?>/<?php echo htmlentities($row['signature']); ?>" height="300px" width="300px" align="center">

                          </div>
                        </div>


                      <?php
                      } ?>
                      <!-- end of  attachment -->

                    </div>

                  </fieldset>
                </form>
              </div>
              <!-- End SmartWizard Content -->






            </div>

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
        <!-- jQuery Smart Wizard -->
        <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard1.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>


</body>

</html>