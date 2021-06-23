<?php
include('../includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
    
    $entity_name=$_POST['entity'];
    $template_name=($_POST['template_name']);

    $target_dir = "../Offer_Letter_Templates/".$entity_name."/";


    $table_name= strtolower($entity_name."_Templates");
    $flag=mysqli_query($con,"SHOW TABLES LIKE `$table_name`");

    if(empty($flag))
    {
      $create_template_table=mysqli_query($con,"CREATE TABLE `$table_name` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `template_name` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      $insert=mysqli_query($con,"INSERT INTO `$table_name` (`template_name`) 
         VALUES ('$template_name')");
       if(!$insert)
        {
          echo mysqli_error($con);
        }
        else
        {
         echo "<script>alert('".$template_name." created');</script>";
        }
    }
    else
    {
        $insert=mysqli_query($con,"INSERT INTO `$table_name` (`template_name`) 
         VALUES ('$template_name')");
       if(!$insert)
        {
          echo mysqli_error($con);
        }
        else
        {
         echo "<script>alert('".$template_name." created');</script>";
        }
    }
    



    if(! is_dir($target_dir))
    {
      
      mkdir($target_dir, 0755, true);
     
    }

    file_put_contents($target_dir.$template_name.".html", $_POST['edit_template']);
    // $ext=".rtf";
    // require_once('php-html-to-rtf-converter-master/src/HtmlToRtf.php');
    // $htmlToRtfConverter = new HtmlToRtf\HtmlToRtf($_POST['edit_template']);
    // $htmlToRtfConverter->getRTFFile($target_dir,$template_name.$ext);
    

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
    <title>MROS  | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      .site_title{
         overflow: inherit;
     }
     .nav_title{
         height: 198px;
         margin-top: -59px;
     }
 </style>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="js/tinymce/init-tinymce.js"></script>

  </head>

  <body class="nav-md">
<?php
    include('includes/leftbar.php'); 
  
    include('includes/topbar.php'); 
?>
      <!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Add Template </h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Fill the Following Details</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
									
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form action="" method="post" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" class="form-control" for="entity_name">Select the entity for which the new template is being generated:<span class="required">*</span>
                            </label>
                      <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                      <select class="form-control" name="entity" id="entity" required="required" >
                             
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



              
										</div>

                    <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" class="form-control" for="template_name">Name of template:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 " style="margin-top: 6px;">
                              <input type="text" name="template_name" required="required" class="form-control  ">
                            </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" class="form-control" for="edit_template">Enter the template details: <span class="required">*</span>
                            </label>
                      <div class="col-md-9 col-sm-8 ">
                        <textarea name="edit_template" id="edit_template" class="tinymce"></textarea>
                      </div>
                    </div>


                    
     					
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-9">
												<button name="submit" type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
                            <pre>
<h2>Variables</h2>
<b>
[1] for Date
[2] for Candidate Name
[3] for Position
[4] for Job Title
[5] for Joining Date
[6] for CTC
[7] for Probation
[8] for Reporting_to
[9] for Expirydate
[10] for Work timings
[11] for Working days
[12] for Perks
[13] for Candidate Address
[14] for CTC currency
</b>
</pre>

								</div>
							</div>
						</div>
					</div>



				
				</div>
			</div>
			<!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           <a href="#">GO TO TOP</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('dep');
 if(val=='Cordinator' || val=='Program_Head'  ){
  element.value='';
   element.style.display='block';

  }
 else  {
   element.value=val;
   element.style.display='none';

  }
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