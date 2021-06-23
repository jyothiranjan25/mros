<?php
include('../includes/dbconnection.php');
error_reporting(0);
session_start(); 
if(isset($_POST['submit']))
{
    
    $check_entity=$_POST['entity'];
  $entity="";
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $entity = mysqli_real_escape_string($con, $_POST['entity']);
    $role = $_POST['role'];
    // if($check_entity==="ALL"){
    //   $entity_problem = "SELECT * FROM `entity` ORDER BY id desc";
    //   $entity_results = mysqli_query($con, $entity_problem);
    //   $row=mysqli_fetch_array($entity_results);
    //   $entity=$row['entity_name'];
    // }
    // else{
    //   $entity=$check_entity;
    // }

      if($role!="New Employee")
      {
        $emp=strtolower($entity." emp");
        $query = "SELECT * FROM `$emp` WHERE email='$email' and role='$role'";
        $results = mysqli_query($con, $query);

        if (mysqli_num_rows($results) == 1) 
        {
          $row=mysqli_fetch_array($results);
            $_SESSION['email'] = $email;
            $_SESSION['entity'] =$entity;
            $_SESSION['role']=$role;
            $_SESSION['dep']=$row['dep'];
            $_SESSION['empid']=$row['emp_id'];
           header('location: index.php'); 
           // echo "<script>alert('".$_SESSION['success']."');</script>";
        }
        else{
            echo "<script>alert('Please Enter proper details ');</script>";
        }
       

      } 
      else
      {
        $emp=strtolower($entity." New_Emp");
        $query = "SELECT * FROM `$emp` WHERE email='$email' and role='$role'";
        $results = mysqli_query($con, $query);

        if (mysqli_num_rows($results) == 1) 
        {
          $row=mysqli_fetch_array($results);
            $_SESSION['email'] = $email;
            $_SESSION['entity'] =$entity;
            $_SESSION['role']=$role;
            $_SESSION['dep']=$row['dep'];
            $_SESSION['empid']=$row['emp_id'];
           header('location: index.php'); 
           // echo "<script>alert('".$_SESSION['success']."');</script>";
        }
        else{
            echo "<script>alert('".$role." ');</script>";
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

    <title>MROS | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
<style>
.login_content {
    margin: 110px auto;
}
</style>
    <script>
    function  selectentity(str){
     var req=new XMLHttpRequest();
     req.open("get","login_roles.php?entity="+str,true);
     req.send();
     req.onreadystatechange=function(){
       if(req.readyState==4&&req.status==200){
         document.getElementById("role").innerHTML=req.responseText;
       }
     }
    } 
    </script>

  </head>

  <body class="login">
    <div>
    
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
      <img style="" src="../images/mros_logo.jpeg" alt="..." >     
        <div class="animate form login_form">
       
         
          <section class="login_content">
          <img style="    height: 142px;
         margin-left: -25px;" src="../images/outlook.webp" alt="..." >
          <img style="margin-left: 130px;" src="../images/ifim_logo.jpg" alt="..." >
            <form action="" method="post" enctype="multipart/form-data"  id="form" data-parsley-validate class="form-horizontal form-label-left">
              <h1>Login Form</h1>
              <div>
                <input name="email" type="text" class="form-control" placeholder="Email" required="" />
              </div>


              <div>
              <select  name="entity" id="entity" title="Select a Entity" class="form-control"  required="" onchange="selectentity(this.value);">
                     <option value="0">--SELECT ENTITY---</option>
                   
                  <?php
                                                    
                        $entity_query=mysqli_query($con,"Select * from `entity`");
                           while ($row=mysqli_fetch_array($entity_query))
                               {
                               ?>
                                   <option  required="required" value="<?php echo  $row['entity_name']; ?>"><?php echo $row['entity_name']; ?></option>
                              <?php
                              }
                  ?>
                </select>
              </div>
              
              <br>
              <div>
              <select  name="role" id="role" title="Select a Role" class="form-control"  required="">
                <option value=0>First Select Entity</option>
              </select>
              </div>

              <br>
                <button type="submit" name="submit" class="btn btn-primary submit"  style="text-decoration: none;">Log in</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              

                <div class="clearfix"></div>
                <br />

               
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
   
  </body>
</html>
