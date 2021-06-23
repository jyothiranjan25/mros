<?php
        include('../includes/dbconnection.php');
$olr_id="3";

 $entity_query=mysqli_query($con,"SELECT * FROM `offer_letters` WHERE `id` = '$olr_id'");
 $row=mysqli_fetch_array($entity_query);

 $name=$row['cand_name'];$entity=$row['entity_name'];$type=$row['jobtype'];$jobmonth=$row['jobmonths'];$date=$row['joining_date'];$ctc=$row['ctc'];$status=10;
 $table=strtolower($entity." new_emp");$role="New Employee";


$insert_new_employee_table=mysqli_query($con,"INSERT INTO `$table` (`emp_id`,`name`,`role`) 
                                                            VALUES ('$olr_id','$name','$role')");

                                                            if($insert_new_employee_table){
                                                                echo '<script type="text/javascript">'; 
                                                                echo 'alert("s");'; 
                                                                //echo 'window.location.href = "index.html";';
                                                                echo '</script>';
                                                            }
                                                            else{
                                                                echo '<script type="text/javascript">'; 
                                                                echo 'alert("'.$table.'");'; 
                                                                //echo 'window.location.href = "index.html";';
                                                                echo '</script>';
                                                            }
?>