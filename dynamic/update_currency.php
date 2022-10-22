<?php
include('../includes/dbconnection.php');
error_reporting(0);


if (isset($_POST['name'])) {

$name = $_POST['name'];

        $update_curr = mysqli_query($con, "SELECT * FROM  `currency_control` WHERE `name` = '$name' ");
        $row = mysqli_fetch_array($update_curr);
        $amount = $row['amount'];
        $symbol = $row['symbol'];
}



if (isset($_POST['submit'])) {

    $name=$_POST['curr_name'];
    $amount=$_POST['new_amount'];

        $update_curr = mysqli_query($con, "INSERT INTO currency_control (`name`,`amount`) VALUES ('$name','$amount') ");
        if($update_curr)
        {
            echo "<script>alert('Currency Added Successfully!');</script>";
        }else{
                      echo "<script>alert('Something gone wrong!');</script>";

        }
   
}   
if (isset($_POST['update'])) {

    $name=$_POST['curr_name'];
    $amount=$_POST['new_amount'];

        $update_curr = mysqli_query($con, "UPDATE currency_control SET `amount`='$amount' WHERE `name`='$name'");
        if($update_curr)
        {
            echo "<script>alert('Currency Updated Successfully!');</script>";
        }else{

            echo "<script>alert('Something gone wrong!');</script>";

        }
   
}   

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <title>MROS  |  </title>

<?php 
include('includes/html_header.php');
?>

    
  </head>

  <body class="nav-md">
       <?php
include('includes/leftbar.php'); 
  ?>
<?php
include('includes/topbar.php'); 
?>
      <!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Update Currency</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
						
							<br>
							<br>
							
							<br>
							<br>
								<div class="x_content">
									<br />

																		<form name="send" id="send" data-parsley-validate class="form-horizontal form-label-left" method="POST">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Currency Name<span class="required">*</span>
											</label>
											<div class="col-md-5 col-sm-5 ">

  <input required name="name"  onblur="myFunction('send')" onfocus="this.value=''"list="curr" type="text" class="form-control" value="<?= $name ?>" placeholder="offer letter template name" autocomplete="off">
                                              <datalist id="curr">
                                                  <?php
                                                    $sel_test = mysqli_query($con, "SELECT `name` FROM `currency_control`");
                                                    if (mysqli_num_rows($sel_test)) {
                                                        while ($row = mysqli_fetch_array($sel_test)) {
                                                            echo "<option value='" . $row['name'] . "'></option>";
                                                        }
                                                    }
                                                    ?>
                                              </datalist>    
											</div>
                    </div>
                                                  </form>
                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Old Currency Value 
											</label>
											<div class="col-md-5 col-sm-5 ">
                
                         		 <input name="old_amt" step="0.001" type="number" class="form-control" name="old_curr" value="<?= $amount ?>"  placeholder="Old Currency Value" disabled>
                          
                          
											</div>
                    </div>
									<form action="" method="post" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

 <input type="text" name="curr_name" required="required" value="<?= $name ?>" class="form-control" style="display:none">


                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Update Currency Amount <span class="required">*</span>
											</label>
											<div class="col-md-5 col-sm-5 ">

                                    	 <input name="new_amount" step="0.001" type="number" class="form-control"  placeholder="New Currency Value"  required="" />
                          
											</div>
                    </div>          

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Update Currency Symbol <span class="required">*</span>
											</label>
											<div class="col-md-5 col-sm-5 ">

                                    	 <input name="symbol" type="text" class="form-control"  value="<?= $symbol ?>" placeholder="ex: ₹"  required="" />
                          
											</div>
                    </div>          
<br>
<br>
<br>
										<div class="item form-group">
											<div class="col-md-5 col-sm-5 offset-md-5">
<?php if(!$amount){ ?>


												<button name="submit" type="submit" class="btn btn-success">Submit</button>

<?php }else{ ?>

												<button name="update" type="submit" class="btn btn-warning">Update</button>

                        <?php } ?>

											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

					


				
				</div>
			</div>
	
      </div>
    </div>
   <script>

     function myFunction(x) {

if (document.forms['send'].name.value === "") {
    alert("empty input field");
    document.forms['send'].name.blur();

    return false;
  }                 document.getElementById(x).submit();
              }

</script>
    
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>