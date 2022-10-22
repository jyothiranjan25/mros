<?php
 $id=$_GET['id'];
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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript">
      function contact()
      {
        if (document.getElementById("define_contact").value == "Mobile") 
        {
          document.getElementById("candidate_phone_number2").setAttribute("disabled", "true");
          document.getElementById("candidate_phone_number2").value = "000";
        }
        else
        {
          document.getElementById("candidate_phone_number2").removeAttribute("disabled");
          document.getElementById("candidate_phone_number2").value = "";
        }
      }

    </script>
    <style type="text/css">
      .required{color: red}
      .buttonFinish{display: none;}
    </style>
  </head>

  <body class="nav-md" id="whole" onload="contact();">
   
        <!-- page content -->
        <div class="  " role="main" >
          <div class="">
            <div class="page-title">
              <div class="title">
                <h3 style="text-align:center"> Candidate Information Form</h3>
              </div>

              
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
                      <form class="form-horizontal form-label-left" id="candidate_details" method="post" action="save_details.php?id=<?php echo $id;?>" enctype="multipart/form-data">


                      <div id="step-1">
                        

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Full Name (First/Middle/Last): <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="candidate_name" required="required" class="form-control" maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')">
                            </div>  
                          </div>
  <!-- maxlength="30" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" -->

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="father-name">Father’s Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="candidate_father_name" required="required" class="form-control " maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')">
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input  class="date-picker form-control" name="candidate_dob" required="required" type="date">
                            </div>
                          
                            <label class="col-form-label col-md-2 col-sm-3 label-align" for="nationality">Nationality: <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="text" name="candidate_nationality" required="required" class="form-control  " maxlength="50" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')">
                            </div>  
                          </div>


                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Gender: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <p style="
                                margin-top:8px;">
                                       <input type="radio" class="flat" name="candidate_gender"  value="Male"  required="required" /> Male   &nbsp;
                                

                                      <input type="radio" class="flat" name="candidate_gender"  value="Female" /> Female   &nbsp;
                               

                                     <input type="radio" class="flat" name="candidate_gender"  value="Other" /> Other
                                   

                                </p>
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">Phone Number (Land Line and/or Mobile):<span class="required">*</span>
                            </label>
                            <select class="col-md-1 col-sm-6 " id="define_contact" style="height: 40px;" required="" onchange="contact();">
                              <option value="Landline" selected="true">Landline</option>
                              <option value="Mobile">Mobile</option>
                            </select>
                            <div class="col-md-1 col-sm-6 ">
                              <input type="number" name="candidate_phone_number1" required="required" class="form-control  ">Country Code &nbsp;
                            </div>
                            <div class="col-md-1 col-sm-6 ">
                              <input type="number" name="candidate_phone_number2" id="candidate_phone_number2" required="required" class="form-control  ">Area Code(Optional) &nbsp;
                            </div>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="number" name="candidate_phone_number" required="required" maxlength="15" class="form-control  ">Phone/Mobile Number
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ssn">Social Security Number (If worked/studied in the US/Any other Country otherwise write N/a): <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="number" name="candidate_ssn" required="required" class="form-control  " maxlength="9" oninvalid="this.setCustomValidity('Please enter valid ssn of 9 digits')" oninput="this.setCustomValidity('')" pattern="[0-9]{9}" >
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Current Address (Complete details like Door Number, street, locality, etc.,): <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <textarea  name="candidate_current_address" required="required" maxlength="150" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" class="form-control  "></textarea>
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Permanent Address (Complete information like Door Number, street, locality, etc.,): <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <textarea name="candidate_permanent_address"  required="required" maxlength="150" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" class="form-control  "></textarea>
                            </div>  
                          </div>

                          <div class="form-group row">
                            
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="blood_group">Select your blood group: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                            <select id="blood_group" name="blood_group" class="form-control" required="required">
                              <option value="AB+">AB+</option>
                              <option value="A+">A+</option>
                              <option value="B+">B+</option>
                              <option value="O+">O+</option>
                              <option value="A-">A-</option>
                              <option value="B-">B-</option>
                              <option value="O-">O-</option>
                            </select>  

                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pic">Passport Size Photo: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                              <input type="file" name="photo" accept="image/*"  required="required" >
                            </div>
                          </div>
                          <br>
                          <hr>
                          <br>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="mark-sheets">PAN Card: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                              <input type="file" name="identity_proof" accept="image/*" required="required" >
                            </div>
                          </div>
                          <table><tr>
                            <td style="width:50%"><hr/></td>
                            <td style="vertical-align:middle; text-align: center">AND</td>
                            <td style="width:50%"><hr/></td>
                            </tr></table>
                            <br>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="other_detail">Adhar Card<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 " style="margin-top: 6px;" >
                              <input type="text" name="other_proof_name" required="required" class="form-control  ">
                            </div> 
                             
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="mark-sheets"> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                              <input type="file" name="other_proof" accept="image/*" required="required" >
                            </div>
                          </div>
                      </div>
                    
                


                      <div id="step-2">
                          
                            <div class="form-group row">
                            
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="institute-name">Select the type of education details: <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                              <select id="education_type" name="education_type[]" class="form-control" required="required">
                                <option value="Secondary">Secondary Education</option>
                                <option value="Senior Secondary">Senior Secondary Education</option>
                                <option value="Graduation">Graduate Education</option>
                                <option value="Post Graduation">Post Graduate Education</option>
                                <option value="Doctorate">Doctorate Education</option>
                              </select>  

                              </div>
                            </div>

                            <div class="form-group row">
                            
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="institute-name">Name of the Institute/School/College: <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="instituteName[]" required="required" class="form-control  " maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')">
                              </div>  

                            </div>


                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="university-name">Board/University: <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                              <input type="text"  name="universityName[]" required="required" class="form-control " maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')">
                              </div>
                            </div>


                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="duration">Duration of Study (specify month & year): <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="number"  name="duration[]" required="required" class="form-control "> Months &nbsp; 
                            </div>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="number"  name="duration1[]" required="required" class="form-control "> Years
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="division">Division/Class/% : <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="text"  name="division[]" required="required" class="form-control  ">
                            </div>  
                          </div>

                            <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="degree-obtained">Degree Obtained : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <p style="
                                margin-top:8px;">
                                    Yes:
                                    <input type="radio" class="flat" name="obtained[0]"  value="YES" required="required" /> &nbsp;
                                    No:
                                    <input type="radio" class="flat" name="obtained[0]"  value="NO" />
                                </p>
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="course-type">Course Type: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <p style="
                                margin-top:8px;">
                                    Regular:
                                    <input type="radio" class="flat" name="course_type[0]"  value="REGULAR" required="required" /> &nbsp; 
                                    Distance:
                                    <input type="radio" class="flat" name="course_type[0]"  value="DISTANCE" />
                                </p>
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="major">Majored in:<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 ">
                              <input type="text"  name="major[]" required="required" class="form-control  ">
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="roll-no">Student ID/Enrolment/Registration/Roll No: <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 ">
                              <input type="text"  name="roll_no[]" required="required" class="form-control  ">
                            </div>  
                          </div>
                          <br><h4><center>Address of Institute/School/College</center></h4><br>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="building-no">Building No & Street: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <textarea class="form-control"  name="building_no[]" maxlength="150" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" required="required" ></textarea>
                            </div>
<!-- maxlength="150" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity("Only alphanumeric characters with (-)&(,)&(.) is allowed.")" oninput="this.setCustomValidity("")" -->
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="city">City: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" class="form-control"  name="city[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="state">State: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" class="form-control"  name="state[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pin">PIN: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="number" class="form-control" maxlength="10" name="pin[]" required="required" >
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="landline">Landline: <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="number" class="form-control" maxlength="15" name="landline[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="mark-sheets">Mark Sheets: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="file" accept="image/*" name="mark_sheets[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="degree-certificate">Degree Certificate: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="file" accept="image/*" name="degree_certificate[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row" >
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="provisional-degree">Provisional Degree certificate: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="file" accept="image/*" name="provisional_degree[]" required="required" >
                            </div>
                          </div>
                          <div id="001">
                            
                          </div>
                
                          <div class="row" style="margin-top:40px;">
                            <div class="col-md-2 offset-md-10">
                              <button type="button" name="add1" value="Add more" id="add1" class="btn btn-success btn-lg" style=" padding: 12px; width: 154px;border-radius: 10px;">Add more</button>
                              
                              
                            </div>
                          </div>
                        
                    </div>


                          
    
                      <div id="step-3">
                        
                          <div class="title">
                            <h2 style="text-align:center"><b>EMPLOYMENT-1</b></h2>
                          </div>
                          <div class="form-group row">
                            
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-name">Name of Company: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="company_name[]" required="required" maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" class="form-control  ">
                            </div>  
                          </div>
<!-- maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")" -->

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="employee-id">Employee ID: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="employee_id[]" required="required" class="form-control ">
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="period-of-employment">Period of Employment (specify month & year): <span class="required">*</span>
                            </label>
                             &nbsp; From: 
                            <div class="col-md-1 col-sm-6 ">
                              <input type="number" name="employment_period1[]" required="required" class="form-control "> Months &nbsp;
                            </div>
                            <div class="col-md-1 col-sm-6 ">
                              <input type="number" name="employment_period2[]" required="required" class="form-control "> Years &nbsp;
                            </div> &nbsp; &nbsp;&nbsp;&nbsp;To:
                            <div class="col-md-1 col-sm-6 ">
                              <input type="number" name="employment_period3[]" required="required" class="form-control "> Months &nbsp;
                            </div>
                            <div class="col-md-1 col-sm-6 ">
                              <input type="number" name="employment_period4[]" required="required" class="form-control "> Years &nbsp;
                            </div>
                          </div>
<!-- &nbsp; From: <div class="col-md-1 col-sm-6 "><input type="number" name="employment_period[]1" required="required" class="form-control "> Months &nbsp;</div><div class="col-md-1 col-sm-6 "><input type="number" name="employment_period[]2" required="required" class="form-control "> Years &nbsp;</div> &nbsp; &nbsp;&nbsp;&nbsp;To:<div class="col-md-1 col-sm-6 "><input type="number" name="employment_period[]3" required="required" class="form-control "> Months &nbsp;</div><div class="col-md-1 col-sm-6 "><input type="number" name="employment_period[]4" required="required" class="form-control "> Years &nbsp;</div> -->
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="designation-department">Designation & Department : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="designation_department[]" required="required" class="form-control  ">
                            </div>  
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-drawn-salary">Last drawn salary (CTC): <span class="required">*</span>
                            </label>
<div class="col-md-2 col-sm-6 "><select name="salary1[]" class="form-control" required="" ><option value="">---</option><option value="AED">UAE Dirham</option><option value="AFN">Afghan afghani</option><option value="ALL">Albanian lek</option><option value="AMD">Armenian dram</option><option value="AOA">Angolan kwanza</option><option value="ARS">Argentine peso</option><option value="AUD">Australian dollar</option><option value="AWG">Aruban florin</option><option value="AZN">Azerbaijani manat</option><option value="BAM">Bosnia and Herzegovina convertible mark</option><option value="BBD">Barbadian dollar</option><option value="BDT">Bangladeshi taka</option><option value="BGN">Bulgarian lev</option><option value="BHD">Bahraini dinar</option><option value="BIF">Burundian franc</option><option value="BMD">Bermudian dollar</option><option value="BND">Brunei dollar</option><option value="BOB">Bolivian boliviano</option><option value="BRL">Brazilian real</option><option value="BSD">Bahamian dollar</option><option value="BTN">Bhutanese ngultrum</option><option value="BWP">Botswana pula</option><option value="BYR">Belarusian ruble</option><option value="BZD">Belize dollar</option><option value="CAD">Canadian dollar</option><option value="CDF">Congolese franc</option><option value="CHF">Swiss franc</option><option value="CLP">Chilean peso</option><option value="CNY">Chinese yuan</option><option value="COP">Colombian peso</option><option value="CRC">Costa Rican colón</option><option value="CUP">Cuban convertible peso</option><option value="CVE">Cape Verdean escudo</option><option value="CZK">Czech koruna</option><option value="DJF">Djiboutian franc</option><option value="DKK">Danish krone</option><option value="DOP">Dominican peso</option><option value="DZD">Algerian dinar</option><option value="EGP">Egyptian pound</option><option value="ERN">Eritrean nakfa</option><option value="ETB">Ethiopian birr</option><option value="EUR">Euro</option><option value="FJD">Fijian dollar</option><option value="FKP">Falkland Islands pound</option><option value="GBP">British pound</option><option value="GEL">Georgian lari</option><option value="GHS">Ghana cedi</option><option value="GMD">Gambian dalasi</option><option value="GNF">Guinean franc</option><option value="GTQ">Guatemalan quetzal</option><option value="GYD">Guyanese dollar</option><option value="HKD">Hong Kong dollar</option><option value="HNL">Honduran lempira</option><option value="HRK">Croatian kuna</option><option value="HTG">Haitian gourde</option><option value="HUF">Hungarian forint</option><option value="IDR">Indonesian rupiah</option><option value="ILS">Israeli new shekel</option><option value="IMP">Manx pound</option><option value="INR">Indian rupee</option><option value="IQD">Iraqi dinar</option><option value="IRR">Iranian rial</option><option value="ISK">Icelandic króna</option><option value="JEP">Jersey pound</option><option value="JMD">Jamaican dollar</option><option value="JOD">Jordanian dinar</option><option value="JPY">Japanese yen</option><option value="KES">Kenyan shilling</option><option value="KGS">Kyrgyzstani som</option><option value="KHR">Cambodian riel</option><option value="KMF">Comorian franc</option><option value="KPW">North Korean won</option><option value="KRW">South Korean won</option><option value="KWD">Kuwaiti dinar</option><option value="KYD">Cayman Islands dollar</option><option value="KZT">Kazakhstani tenge</option><option value="LAK">Lao kip</option><option value="LBP">Lebanese pound</option><option value="LKR">Sri Lankan rupee</option><option value="LRD">Liberian dollar</option><option value="LSL">Lesotho loti</option><option value="LTL">Lithuanian litas</option><option value="LVL">Latvian lats</option><option value="LYD">Libyan dinar</option><option value="MAD">Moroccan dirham</option><option value="MDL">Moldovan leu</option><option value="MGA">Malagasy ariary</option><option value="MKD">Macedonian denar</option><option value="MMK">Burmese kyat</option><option value="MNT">Mongolian tögrög</option><option value="MOP">Macanese pataca</option><option value="MRO">Mauritanian ouguiya</option><option value="MUR">Mauritian rupee</option><option value="MVR">Maldivian rufiyaa</option><option value="MWK">Malawian kwacha</option><option value="MXN">Mexican peso</option><option value="MYR">Malaysian ringgit</option><option value="MZN">Mozambican metical</option><option value="NAD">Namibian dollar</option><option value="NGN">Nigerian naira</option><option value="NIO">Nicaraguan córdoba</option><option value="NOK">Norwegian krone</option><option value="NPR">Nepalese rupee</option><option value="NZD">New Zealand dollar</option><option value="OMR">Omani rial</option><option value="PAB">Panamanian balboa</option><option value="PEN">Peruvian nuevo sol</option><option value="PGK">Papua New Guinean kina</option><option value="PHP">Philippine peso</option><option value="PKR">Pakistani rupee</option><option value="PLN">Polish złoty</option><option value="PRB">Transnistrian ruble</option><option value="PYG">Paraguayan guaraní</option><option value="QAR">Qatari riyal</option><option value="RON">Romanian leu</option><option value="RSD">Serbian dinar</option><option value="RUB">Russian ruble</option><option value="RWF">Rwandan franc</option><option value="SAR">Saudi riyal</option><option value="SBD">Solomon Islands dollar</option><option value="SCR">Seychellois rupee</option><option value="SDG">Singapore dollar</option><option value="SEK">Swedish krona</option><option value="SGD">Singapore dollar</option><option value="SHP">Saint Helena pound</option><option value="SLL">Sierra Leonean leone</option><option value="SOS">Somali shilling</option><option value="SRD">Surinamese dollar</option><option value="SSP">South Sudanese pound</option><option value="STD">São Tomé and Príncipe dobra</option><option value="SVC">Salvadoran colón</option><option value="SYP">Syrian pound</option><option value="SZL">Swazi lilangeni</option><option value="THB">Thai baht</option><option value="TJS">Tajikistani somoni</option><option value="TMT">Turkmenistan manat</option><option value="TND">Tunisian dinar</option><option value="TOP">Tongan paʻanga</option><option value="TRY">Turkish lira</option><option value="TTD">Trinidad and Tobago dollar</option><option value="TWD">New Taiwan dollar</option><option value="TZS">Tanzanian shilling</option><option value="UAH">Ukrainian hryvnia</option><option value="UGX">Ugandan shilling</option><option value="USD">United States dollar</option><option value="UYU">Uruguayan peso</option><option value="UZS">Uzbekistani som</option><option value="VEF">Venezuelan bolívar</option><option value="VND">Vietnamese đồng</option><option value="VUV">Vanuatu vatu</option><option value="WST">Samoan tālā</option><option value="XAF">Central African CFA franc</option><option value="XCD">East Caribbean dollar</option><option value="XOF">West African CFA franc</option><option value="XPF">CFP franc</option><option value="YER">Yemeni rial</option><option value="ZAR">South African rand</option><option value="ZMW">Zambian kwacha</option><option value="ZWL">Zimbabwean dollar</option></select></div>
                            <div class="col-md-3 col-sm-6 ">
                              <input type="number" name="salary[]" required="required" class="form-control  ">
                            </div>  
                          </div>

                            <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="type-of-employment">Type of Employment : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <p style="
                                margin-top:8px;">
                                    Permanent:
                                    <input type="radio" class="flat" name="type_of_employment[0]"  value="PERMANENT" required="required" /> &nbsp;  
                                    Contractual:
                                    <input type="radio" class="flat" name="type_of_employment[0]"  value="CONTRACTUAL" /> &nbsp; 
                                    Part-Time:
                                    <input type="radio" class="flat" name="type_of_employment[0]"  value="PART-TIME"  />  &nbsp; 
                                    Full-Time:
                                    <input type="radio" class="flat" name="type_of_employment[0]"  value="FULL-TIME" />
                                </p>
                            </div>  
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-name-designation">Supervisor's Name & Designation: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="supervisor_name_designation[]" required="required" class="form-control  " maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')">
                            </div>  
<!-- maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")" -->
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-number">Supervisor's Number: <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="number" name="supervisor_number[]" maxlength="15" required="required" class="form-control  ">
                            </div>  
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-mail">Supervisor's Mail Id: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="email" name="supervisor_mail[]" required="required" class="form-control  ">
                            </div>  
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="empoyer-availability">Can the employer be contacted now ? : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <p style="
                                margin-top:8px;">
                                    Yes:
                                    <input type="radio" class="flat" name="employer_availability[0]"  value="Yes" required="required" /> &nbsp;
                                    No:
                                    <input type="radio" class="flat" name="employer_availability[0]"  value="No" />
                                </p>
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="employer-contact-date">If not, then provide an alternate date:
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="date" name="employer_contact_date[]" class="date-picker form-control">
                            </div>  
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="reason-for-leaving">Reason for leaving: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="reason_for_leaving[]" required="required" class="form-control  ">
                            </div>  
                          </div>
                          <br><h4><center>Company Address</center></h4><br>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="building-no">Building No & Street: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <textarea class="form-control" name="company_building_no[]" maxlength="150" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" required="required" ></textarea>
                            </div>

                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="city">City: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" class="form-control" name="company_city[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="state">State: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" class="form-control" name="company_state[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pin">PIN: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="number" class="form-control" maxlength="10" name="company_pin[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="landline">Landline: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="number" class="form-control" maxlength="15" name="company_landline[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="appointment-letter">Appointment Letter: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="file" accept="image/*" name="appointment_letter[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="salary-slip">Salary Slip: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="file" accept="image/*" name="salary_slip[]" required="required" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="relieving-letter">Relieving Letter: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="file" accept="image/*" name="relieving_letter[]" required="required" >
                            </div>
                          </div>

                          <div id="002">
                            
                          </div>

                          <div class="row" style="margin-top:40px;">
                            <div class="col-md-2 offset-md-10">
                              <input type="button" name="add2" value="Add more" id="add2" class="btn btn-success btn-lg" style=" padding: 12px;
                                    width: 154px;border-radius: 10px;
                                    ">
                              
                            </div>
                          </div>


                          
                        
                      </div>



                      
                      <div id="step-4">
                        
                          <div class="title">
                            <h2 style="text-align:center">Names of ‘Two people’ who can be used as references to verify your credentials.<br>(Please DO NOT include family members or friends. References should be college professors/teachers/supervisors/seniors at work, etc…)<br><br><b>PERSON-1</b></h2>
                          </div>
                          
           
                          <h2><center><b></b></center></h2><br>
                          <div class="form-group row">
                            
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-name">Name: <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="reference_person_name[]" required="required" class="form-control  " maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')">
                              </div>  
                          </div>


                          <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-organization">Organization: <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="reference_person_organization[]" required="required" class="form-control " maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')">
                              </div>
                          </div>


                          <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-designation">Designation: <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="reference_person_designation[]" required="required" class="form-control ">
                              </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-association">How associated/ Known to you: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="reference_person_association[]" required="required" class="form-control  ">
                            </div>  
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-association-year">Years of association: <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 ">
                              <input type="number" name="reference_person_association_year[]" required="required" class="form-control  ">
                            </div>  
                          </div>

                          <div class="title">
                            <h6 style="text-align:center">Contact Details</h6>
                          </div>  
                          
                          <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-address">Address: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <textarea class="form-control" name="reference_person_address[]" maxlength="150" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" required="required" ></textarea>
                                </div>
                          </div>
                          <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-landline">Landline: <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-6 ">
                                  <input type="number" class="form-control" name="reference_person_landline[]" maxlength="15" required="required" >
                                </div>
                          </div>
                          <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-mobile">Mobile: <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-6 ">
                                  <input type="number" class="form-control" name="reference_person_mobile[]" maxlength="15" required="required" >
                                </div>
                          </div>
                          <div id="003">
                            
                          </div>
                
                          <div class="row" style="margin-top:40px;">
                            <div class="col-md-2 offset-md-10">
                              <button type="button" name="add3" value="Add more" id="add3" class="btn btn-success btn-lg" style=" padding: 12px;
                                    width: 154px;border-radius: 10px;
                                    ">Add more</button>
                              
                              
                            </div>
                          </div>
                          
                        
                      </div>



                      <div id="step-5">
                        <center><b>Please select the appropriate answers.</b></center>
                        <center>If the answer is ‘Yes’, please provide details on a separate sheet of paper.</center>
                              
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="employee-miscellaneous1">Have you ever been convicted for felony or any serious crime ? : <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <p style="
                                    margin-top:8px;">
                                        Yes:
                                        <input type="radio" class="flat" name="employee_miscellaneous1" id="yes1" value="Yes" required="required" /> 
                                        No:
                                        <input type="radio" class="flat" name="employee_miscellaneous1" id="no1" value="No" checked="" />
                                    
                                    <textarea class="form-control" id="yes1_reason" name="yes1_reason" disabled="" required="required" ></textarea>
                                    </p>
                                </div>  
                              </div>

                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="employee-miscellaneous2">Have you ever been “Laid off” or Terminated from employment? : <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <p style="
                                    margin-top:8px;">
                                        Yes:
                                        <input type="radio" class="flat" name="employee_miscellaneous2" id="yes2" value="Yes" required="required" /> 
                                        No:
                                        <input type="radio" class="flat" name="employee_miscellaneous2" id="no2" value="No" checked="" />
                                    
                                    <textarea class="form-control" id="yes2_reason" name="yes2_reason" disabled="" required="required" ></textarea>
                                    </p>
                                </div>  
                              </div>
                        
                      </div>


                      <div id="step-6">
                                  <ul>
                                    <li>I certify that the information provided in this form is true and correct to the best of my knowledge.</li>
                                    <li> I further certify that I have furnished the answers in Step '5' on my own accord, free of any duress.</li>
                                    <li> I authorize ‘Get Ahead Education Ltd’ or its agency to verify my credentials.</li>
                                    <li>  I understand that if any information furnished by me is found to be false, I could be denied employment/be terminated.</li>
                                    <li> I will cooperate and facilitate the process of verification of my credentials.</li>
                                </ul>
                                                                                      
                              <!-- Details pan card or adhar -->

                                      <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="StepTitle">Upload Your Signature</h2>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                          
                                            <div class="btn-group">
                                                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                                <input type="file" data-role="magic-overlay" accept="image/*" data-target="#pictureBtn" data-edit="insertImage" name="signature" />
                                            </div>
                                            <hr>
                                        </div>
                                    </div>           
                                  <div class="row" style="margin-top:40px;">
                                    <div class="col-md-2 offset-md-10">
                                      <input type="submit" name="save" form="candidate_details" value="SUBMIT" id="save" class="btn btn-success btn-lg" style=" padding: 12px;
                                          width: 154px;border-radius: 10px;
                                          ">
                                    
                                    </div>
                                  </div>
                                              
                                                  
                                                  
                                                    
                                            <!-- end of  attachment -->
                                  
                      </div>
                    </form>
                    </div>
                    <!-- End SmartWizard Content -->





        
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
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
    <!-- jQuery Smart Wizard -->

 <!--    <script src="../vendors/iCheck/icheck.min.js"></script> -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


  
  </body>
</html>
<html><head><META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8"><meta name="Robots" content="NOINDEX " /></head><body></body>
                <script type="text/javascript">
                 var gearPage = document.getElementById('GearPage');
                 if(null != gearPage)
                 {
                     gearPage.parentNode.removeChild(gearPage);
                     document.title = "Error";
                 }
                 </script>
                 <style type="text/css">
                   .stepContainer{position: absolute;}
                 </style>
                 </html>