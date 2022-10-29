<?php 
                  include('../includes/dbconnection.php');
        //  
                  if(isset($_POST['save']))
                  {
                    $olr_id=$_GET['id'];
                    
                    //step-1 data-------------------------------------------------------------------------

                    $candidate_name= $_POST['candidate_name'];
                    $candidate_father_name= $_POST['candidate_father_name'];
                    $candidate_dob= $_POST['candidate_dob'];
                    $candidate_nationality= $_POST['candidate_nationality'];
                    $candidate_gender= $_POST['candidate_gender'];
                    if (isset($_POST['candidate_phone_number2'])) {
                      $candidate_phone_number= $_POST['candidate_phone_number1']."-".$_POST['candidate_phone_number2']."-".$_POST['candidate_phone_number'];
                    }
                    else{
                    $candidate_phone_number= $_POST['candidate_phone_number1']."-".$_POST['candidate_phone_number']; }
                    $candidate_ssn= $_POST['candidate_ssn'];
                    $candidate_current_address= $_POST['candidate_current_address'];
                    $candidate_permanent_address= $_POST['candidate_permanent_address'];
                    $blood_group = $_POST['blood_group'];
                    $photo= $_FILES['photo']['name'];
                    $identity_proof= $_FILES['identity_proof']['name'];
                    $other_proof_name= $_POST['other_proof_name'].'.jpg';
                    $other_proof= $_FILES['other_proof']['name'];

                    //step-2 data-------------------------------------------------------------------------
                    
                    $education_type= $_POST['education_type'];
                    $instituteName= $_POST['instituteName'];
                    $universityName= $_POST['universityName'];
                    $duration0= $_POST['duration'];
                    $duration1= $_POST['duration1'];
                    // $duration = $duration0." Months".$duration1." Years";
                    $division= $_POST['division'];
                    $obtained= $_POST['obtained'];
                    $course_type= $_POST['course_type'];
                    $major= $_POST['major'];
                    $roll_no= $_POST['roll_no'];
                    $building_no= $_POST['building_no'];
                    $city= $_POST['city'];
                    $state= $_POST['state'];
                    $pin= $_POST['pin'];
                    $landline= $_POST['landline'];
                    $mark_sheets= ($_FILES['mark_sheets']['name']);
                    $degree_certificate= ($_FILES['degree_certificate']['name']);
                    $provisional_degree= ($_FILES['provisional_degree']['name']);

                    //step-3 data----------------------------------------------------------------------------

                    $company_name= $_POST['company_name'];
                    $employee_id= $_POST['employee_id'];
                    $employment_period1= $_POST['employment_period1'];
                    $employment_period2= $_POST['employment_period2'];
                    $employment_period3= $_POST['employment_period3'];
                    $employment_period4= $_POST['employment_period4'];
                    $designation_department= $_POST['designation_department'];
                    $salary= $_POST['salary'];
                    $type_of_employment= $_POST['type_of_employment'];
                    $supervisor_name_designation= $_POST['supervisor_name_designation'];
                    $supervisor_number= $_POST['supervisor_number'];
                    $supervisor_mail= $_POST['supervisor_mail'];
                    $employer_availability= $_POST['employer_availability'];
                    $employer_contact_date= $_POST['employer_contact_date'];
                    $reason_for_leaving= $_POST['reason_for_leaving'];
                    $company_building_no= $_POST['company_building_no'];
                    $company_city= $_POST['company_city'];
                    $company_state= $_POST['company_state'];
                    $company_pin= $_POST['company_pin'];
                    $company_landline= $_POST['company_landline'];
                    $appointment_letter= $_FILES['appointment_letter']['name'];
                    $salary_slip= $_FILES['salary_slip']['name'];
                    $relieving_letter= $_FILES['relieving_letter']['name'];


                    $reference_person_name= $_POST['reference_person_name'];
                    $reference_person_organization= $_POST['reference_person_organization'];
                    $reference_person_designation= $_POST['reference_person_designation'];
                    $reference_person_association= $_POST['reference_person_association'];
                    $reference_person_association_year= $_POST['reference_person_association_year'];
                    $reference_person_address= $_POST['reference_person_address'];
                    $reference_person_landline= $_POST['reference_person_landline'];
                    $reference_person_mobile= $_POST['reference_person_mobile'];
                    
                    //step-5 data------------------------------------------------------------------------------

                    $employee_miscellaneous1= $_POST['employee_miscellaneous1'];
                    if($employee_miscellaneous1 == "Yes")
                    {
                      $yes1_reason= $_POST['yes1_reason'];
                    }
                    else
                    {
                      $yes1_reason= "N/a";
                    }
                    $employee_miscellaneous2= $_POST['employee_miscellaneous2'];
                    if($employee_miscellaneous2 == "Yes")
                    {
                      $yes2_reason= $_POST['yes2_reason'];
                    }
                    else
                    {
                      $yes2_reason= "N/a";
                    }

                    //step-6 data------------------------------------------------------------------------------

                    $signature= $_FILES['signature']['name'];

                    //End of data requests

                    //Creating Directory if it does not exist.

                      $target_dir = "upload/OLR_SN_".$olr_id."/";
                      if(! is_dir($target_dir))
                      {
                        
                        mkdir($target_dir, 0755, true);
                      }

                    //Process for step-1------------------------------------------------------------------------
                      
                         // Upload file
                        $photo = "profile_photo.jpg";
                        if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photo))
                        {
                      //    echo('photo success');
                          echo "</br>";
                        }
                        else
                        {
                       //   echo ('photo failed');
                          echo "</br>";
                        }

                       $identity_proof = "identity_proof.jpg";
                       if(move_uploaded_file($_FILES['identity_proof']['tmp_name'],$target_dir.$identity_proof))
                        {
                       //   echo('identity success');
                          echo "</br>";
                        }
                        else
                        {
                     //     echo ('identity failed');
                          echo "</br>";
                        }

                        if(move_uploaded_file($_FILES['other_proof']['tmp_name'],$target_dir.$other_proof_name))
                        {
                      //    echo('other success');
                          echo "</br>";
                        }
                        else
                        {
                       //   echo ('other failed');
                          echo "</br>";
                        }

                      //Inserting tuple in database for personal info--------------------------------

                      $save= "INSERT INTO `candidate_personal_info`(`olr_id`,`name`,`father_name`,`dob`,`nationality`,`gender`,`phone_number`,`ssn`,`current_address`,`permanent_address`,`blood_group`,`photo`,`id_proof`,`other_proof`)
                                                           VALUES ('$olr_id','$candidate_name','$candidate_father_name','$candidate_dob','$candidate_nationality','$candidate_gender','$candidate_phone_number','$candidate_ssn','$candidate_current_address','$candidate_permanent_address','$blood_group','$photo','$identity_proof','$other_proof_name')";

                      $query = mysqli_query($con, $save);
                      if(!$query)
                      {
                        echo mysqli_error($con);
                      }
                      else
                      {
    
                        echo '<script type="text/javascript">'; 
                       // echo 'alert("Step-1 Complete.");'; 
                        //echo 'window.location.href = "index.html";';
                        echo '</script>';
                      }

                    //End of Step-1 Process--------------------------------------------------

                    //Step-2 Process---------------------------------------------------------
                    $i = 0;
                    foreach($_FILES['mark_sheets']['tmp_name'] as $key => $tmp_name)
                    {
                        
                        $file_name = "Mark_Sheet_".$i.".jpg";
                        $file_size =$_FILES['mark_sheets']['size'][$key];
                        $file_tmp =$_FILES['mark_sheets']['tmp_name'][$key];
                        $file_type=$_FILES['mark_sheets']['type'][$key];  
                        if(move_uploaded_file($file_tmp,$target_dir.$file_name))
                        {
                        //  echo('MArksheet success');
                          echo "</br>";
                        }
                        else
                        {
                     //     echo ('MArksheet failed');
                          echo "</br>";
                        }
                        $i++;
                    }
                    $i = 0;
                    foreach($_FILES['degree_certificate']['tmp_name'] as $key => $tmp_name)
                    {
                        
                        $file_name = "Degree_Certificate_".$i.".jpg";
                        $file_size =$_FILES['degree_certificate']['size'][$key];
                        $file_tmp =$_FILES['degree_certificate']['tmp_name'][$key];
                        $file_type=$_FILES['degree_certificate']['type'][$key];  
                        if(move_uploaded_file($file_tmp,$target_dir.$file_name))
                        {
                      //    echo('Degree Certificate success');
                          echo "</br>";
                        }
                        else
                        {
                      //    echo ('Degree Certificate failed');
                          echo "</br>";
                        }
                        $i++;
                    }
                    $i = 0;
                    foreach($_FILES['provisional_degree']['tmp_name'] as $key => $tmp_name)
                    {
                        
                        $file_name = "Provisional_Degree_".$i.".jpg";
                        $file_size =$_FILES['provisional_degree']['size'][$key];
                        $file_tmp =$_FILES['provisional_degree']['tmp_name'][$key];
                        $file_type=$_FILES['provisional_degree']['type'][$key];  
                        if(move_uploaded_file($file_tmp,$target_dir.$file_name))
                        {
                    //      echo('Provisional Degree success');
                          echo "</br>";
                        }
                        else
                        {
                     //     echo ('Provisional Degree failed');
                          echo "</br>";
                        }
                        $i++;
                    }

                    $i = 0;
                    foreach ($instituteName as $key => $value) 
                    {
                      
                      $mark_sheet = "Mark_Sheet_".$i.".jpg";
                      $degree_certificate = "Degree_Certificate_".$i.".jpg";
                      $provisional_degree = "Provisional_Degree_".$i.".jpg";
                      $duration[$key] = $duration0[$key]." Months ".$duration1[$key]." Years";
                      $save= "INSERT INTO `candidate_education`(`olr_id`,`education_detail_type`,`inst_name`,`board`,`duration`,`percentage`,`obtained`,`course_type`,`majored_in`,`reg_no`,`street`,`city`,`state`,`pin`,`contact`,`mark_sheet`,`degree`,`provisional_degree`) VALUES ('$olr_id','$education_type[$key]','$value','$universityName[$key]','$duration[$key]','$division[$key]','$obtained[$key]','$course_type[$key]','$major[$key]','$roll_no[$key]','$building_no[$key]','$city[$key]','$state[$key]','$pin[$key]','$landline[$key]','$mark_sheet','$degree_certificate','$provisional_degree')";

                      $query = mysqli_query($con, $save);
                      if(!$query)
                      {
                        echo mysqli_error($con);
                      }
                      else
                      {
    
                        echo '<script type="text/javascript">'; 
                       // echo 'alert("Step-2 Complete.");'; 
                        //echo 'window.location.href = "index.html";';
                        echo '</script>';
                      }
                      $i++;
                    }

                    //End of Step-2 Process------------------------------------------------

                    //Step-3 Process-------------------------------------------------------
                    $i = 0;
                    foreach($_FILES['appointment_letter']['tmp_name'] as $key => $tmp_name)
                    {
                        
                        $file_name = "Appointment_Letter_".$i.".jpg";
                        $file_size =$_FILES['appointment_letter']['size'][$key];
                        $file_tmp =$_FILES['appointment_letter']['tmp_name'][$key];
                        $file_type=$_FILES['appointment_letter']['type'][$key];  
                        if(move_uploaded_file($file_tmp,$target_dir.$file_name))
                        {
                   //       echo('Appointment Letter success');
                          echo "</br>";
                        }
                        else
                        {
                    //      echo ('Appointment Letter failed');
                          echo "</br>";
                        }
                        $i++;
                    }

                    $i = 0;
                    foreach($_FILES['salary_slip']['tmp_name'] as $key => $tmp_name)
                    {
                        
                        $file_name = "Salary_Slip_".$i.".jpg";
                        $file_size =$_FILES['salary_slip']['size'][$key];
                        $file_tmp =$_FILES['salary_slip']['tmp_name'][$key];
                        $file_type=$_FILES['salary_slip']['type'][$key];  
                        if(move_uploaded_file($file_tmp,$target_dir.$file_name))
                        {
                   //       echo('Salary Slip success');
                          echo "</br>";
                        }
                        else
                        {
                    //      echo ('Salary Slip failed');
                          echo "</br>";
                        }
                        $i++;
                    }

                    $i = 0;
                    foreach($_FILES['relieving_letter']['tmp_name'] as $key => $tmp_name)
                    {
                        
                        $file_name = "Relieving_Letter_".$i.".jpg";
                        $file_size =$_FILES['relieving_letter']['size'][$key];
                        $file_tmp =$_FILES['relieving_letter']['tmp_name'][$key];
                        $file_type=$_FILES['relieving_letter']['type'][$key];  
                        if(move_uploaded_file($file_tmp,$target_dir.$file_name))
                        {
                  //        echo('Relieving Letter success');
                          echo "</br>";
                        }
                        else
                        {
                  //        echo ('Relieving Letter failed');
                          echo "</br>";
                        }
                        $i++;
                    }

                    //Inserting tuple in emplyment table
                    $i = 0;
                    foreach ($employee_id as $key => $value) 
                    {
                      
                      $appointment_letter = "Appointment_Letter_".$i.".jpg";
                      $salary_slip = "Salary_Slip_".$i.".jpg";
                      $relieving_letter = "Relieving_Letter_".$i.".jpg";
                      $employment_period[$key]= "From: ".$employment_period1[$key]."/".$employment_period2[$key]." To: ".$employment_period3[$key]."/".$employment_period4[$key];
                      $save= "INSERT INTO `candidate_employment`(`olr_id`,`company_name`,`employee_id`,`duration`,`designation_dept`,`ctc`,`employment_type`,`supervisor_name_designation`,`supervisor_number`,`supervisor_email`,`contact_now`,`alt_date`,`reason_for_leaving`,`street`,`city`,`state`,`pin`,`landline`,`appointment_letter`,`salary_slip`,`relieving_letter`) VALUES ('$olr_id','$company_name[$key]','$value','$employment_period[$key]','$designation_department[$key]','$salary[$key]','$type_of_employment[$key]','$supervisor_name_designation[$key]','$supervisor_number[$key]','$supervisor_mail[$key]','$employer_availability[$key]','$employer_contact_date[$key]','$reason_for_leaving[$key]','$company_building_no[$key]','$company_city[$key]','$company_state[$key]','$company_pin[$key]','$company_landline[$key]','$appointment_letter','$salary_slip','$relieving_letter')";

                      $query = mysqli_query($con, $save);
                      if(!$query)
                      {
                        echo mysqli_error($con);
                      }
                      else
                      {
    
                        echo '<script type="text/javascript">'; 
                //        echo 'alert("Step-3 Complete.");'; 
                        //echo 'window.location.href = "index.html";';
                        echo '</script>';
                      }
                      $i++;
                    }

                    //End of Step-3--------------------------------------------

                    //Step-4 Process-------------------------------------------

                    //Inserting tuple in reference table

                    foreach ($reference_person_mobile as $key => $value) 
                    {

                      $save= "INSERT INTO `candidate_reference`(`olr_id`,`name`,`organization`,`designation`,`association`,`association_years`,`address`,`landline`,`mobile`) VALUES ('$olr_id','$reference_person_name[$key]','$reference_person_organization[$key]','$reference_person_designation[$key]','$reference_person_association[$key]','$reference_person_association_year[$key]','$reference_person_address[$key]','$reference_person_landline[$key]','$value')";

                      $query = mysqli_query($con, $save);
                      if(!$query)
                      {
                        echo mysqli_error($con);
                      }
                      else
                      {
    
                        echo '<script type="text/javascript">'; 
                  //      echo 'alert("Step-4 Complete.");'; 
                        //echo 'window.location.href = "index.html";';
                        echo '</script>';
                      }
                    }

                    //End of step-4 process------------------------------------

                    //STep-5 Process-------------------------------------------

                    //Inserting tuple in miscellaneous table

                      $save= "INSERT INTO `candidate_miscellaneous`(`olr_id`,`question1`,`reason1`,`question2`,`reason2`) VALUES ('$olr_id','$employee_miscellaneous1','$yes1_reason','$employee_miscellaneous2','$yes2_reason')";

                      $query = mysqli_query($con, $save);
                      if(!$query)
                      {
                        echo mysqli_error($con);
                      }
                      else
                      {
    
                        echo '<script type="text/javascript">'; 
                       // echo 'alert("Step-5 Complete.");'; 
                        //echo 'window.location.href = "index.html";';
                        echo '</script>';
                      }

                      //STep-6 Process
                      $signature = "Candidate_Signature.jpg";
                      if(move_uploaded_file($_FILES['signature']['tmp_name'],$target_dir.$signature))
                        {
                    //      echo('signature success');
                          echo "</br>";
                        }
                        else
                        {
                          echo ('signature failed');
                          echo "</br>";
                        }

                        //Inserting tuple in signature table

                      $save= "INSERT INTO `candidate_signature`(`olr_id`,`signature`) VALUES ('$olr_id','$signature')";

                      $query = mysqli_query($con, $save);
                      if(!$query)
                      {
                        echo mysqli_error($con);
                      }
                      else
                      {
    
                        echo '<script type="text/javascript">'; 
                       echo 'alert("You have completed the document verification. Please wait for our response");'; 
                        echo 'window.close();';
                      
                        echo '</script>';
                      }
                      $curr_date=date("Y-m-d");
                      $status=8;
                      $query = "UPDATE offer_letters SET status='$status',date_sent='$curr_date' WHERE id='$olr_id'";
                      $results = mysqli_query($con, $query);
                         echo '<script type="text/javascript">'; 
                      echo "window.location.href='closing.php"; 
                      echo '</script>';

                      // $message_query=mysqli_query($con,"Select * from `offer_letters` WHERE id='$olr_id'");
                      // $message_data=mysqli_fetch_array($message_query);
                      // $subject="ASSET PREPERATION";
                      // $title="Asset to be make available for new employee";
                      // $message="ASSET PREPERATION<h3></h3><br><p>Greetings,</p><br><p>This is to inform you that a new candidate of ,".$message_data['job_title'].",will be joining our organisation from  ".$message_data['joining_date']."</p>";
                              
                    //   $from="SYSTEM"; 
                    //   $entity=$message_data['entity_name']; 
                    //   $notification_table=$entity." notification";
                    //  $noti_query=mysqli_query($con,"INSERT INTO `$notification_table` (`from_mail`, `subject`, `title`, `message`, `timestamp`) VALUES ('$from', '$subject', '$title', '$message', CURRENT_TIMESTAMP)");


                    // $entity=$_SESSION['entity'];
                    // $query123 = "SELECT * FROM `hr_email` ";
                    // $results1 = mysqli_query($con, $query123);
                    // $results123=mysqli_fetch_array($results1);
                    // require 'phpmailer/PHPMailerAutoload.php';
                    
                    // $mail = new PHPMailer;
                    
                    
                    // //$mail->SMTPDebug = 3;   
                    // $xyz=$results123['email'];                            // Enable verbose debug output
                    
                    // $mail->isSMTP();                                      // Set mailer to use SMTP
                    // $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
                    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    // $mail->Username = $results123['email'];                 // SMTP username
                    // $mail->Password = $results123['password'];                           // SMTP password
                    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    // $mail->Port = 587;                                    // TCP port to connect to
                    
                    // $mail->setFrom($results123['email'], 'IFIM HR');
                    //                  // Name is optional
                    // $mail->addReplyTo($results123['email'], 'IFIM HR');
                    
                    // $table=$entity." emp";
                    // $mailing = "SELECT * FROM `$table` ";
                    // $mail->addAddress($results123['email'],'IFIM HR'); //to
                    // $mail->isHTML(true);  

                    // $name=mysqli_query($con,"SELECT * FROM offer_letters where `id`='$olr_id' ");
    
                    // $row=mysqli_fetch_array($name);
                     
                    //       $cand_name=$row['cand_name'];

                    // $message="<p>Dear HR,</p><p>This is to inform you a new candidate, ".$cand_name.", has just completed his/her CIF details.</p><p><b>Please verify and revert ASAP.</b></p>";

                    // $mail->Subject = "CIF form ";
                  
                    // $mail->Body= $message;
                    // $mail->AltBody = 'This is to inform you '.$candidate_name.'[candidate] has recently completed his/her documentation .';
                    // if(!$mail->send()) 
                    // {
                    //     echo '<script type="text/javascript">'; 
                    //     echo 'alert("Notification not sent.");'; 
                    //     echo '</script>';
                    // }
                    // else{
                    //   echo '<script type="text/javascript">'; 
                    //   echo "window.location.href='closing.php'"; 
                    //   echo '</script>';

                    // }

                   

                  }
