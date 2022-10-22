<!DOCTYPE html>
<html lang="en">

<head>
  <title>MROS | </title>

 <?php 
include('includes/html_header.php');
?>

  <style>
    .login_content {
      margin: 110px auto;
    }
    .glow {

  box-shadow:
    0 0 20px 5px grey,
    0 0 72px 10px grey,
    0 0 140px 1px grey;
}
.fade {

  box-shadow:
    0 0 20px 10px black,
    0 0 72px 20px black,
    0 0 140px 1px black;
}
  </style>


</head>

<body style="background:white">
  <div>
    <br>     <br> 
  

    <div class="login_wrapper glow" style="border-radius:5px; padding:20px; margin-top:60px; ">
    
      <img style="text-align:center" class="img-fluid" src="../images/mros_logo.jpeg" alt="MROS Logo">
      <div class="animate form login_form">


          <br>
        <section class="login_content" style="margin-left:-30px">
          <br>     <br>    <br>
      
            
          <form action="" method="post" enctype="multipart/form-data" id="form" data-parsley-validate class="form-horizontal form-label-left">
         
            <h1 style="color:black;">Login with Microsoft</h1>
           
            <br>
              <a href="signin.php" class="btn btn-primary" Style="padding:20px;text-decoration:none;border-radius:10px;text-shadow:0px !important" >Log In</a>
           
      </div>

        <br />


      </div>
      </form>
      </section>
    </div>

  </div>
  </div>

</body>

</html>