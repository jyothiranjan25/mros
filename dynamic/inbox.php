<?php
include('../includes/dbconnection.php');
error_reporting(0);
$title="";$message="";
$subject="";
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
                <h3>Inbox </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Messages </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
                      
                        
                         
                            <?php
                            $entity=$_SESSION['entity'];
                            if($entity=="All")
                            {
                              $sel_entity_query=mysqli_query($con,"Select * from `entity`");
                              while ($row=mysqli_fetch_array($sel_entity_query))
                              {
                                  $table=strtolower($row['entity_name']." notification");
                                  $sel_noti_query=mysqli_query($con,"Select * from `$table` ORDER BY id DESC");
                                  while ($rows=mysqli_fetch_array($sel_noti_query))
                                  {
                                    
                                    echo '<a href="inbox.php?id='.$rows['id'].'&entity='.$table.'">';
                                    echo ' <div class="mail_list">
                                    <div class="left">
                                      <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                    </div>
                                    <div class="right">';
                                    echo "<h3>".$rows['subject']."</h3>";
                                    echo "<p>".$rows['title']."</p>";
                                    echo '</div></div>';
                                    echo '</a>';
                                  }
                                  
                              }
                            }
                            else
                            {
                              $notification_table=$entity." notification";
                              $sel_query=mysqli_query($con,"Select * from `$notification_table` ORDER BY id DESC");
                              while ($rows=mysqli_fetch_array($sel_query))
                              {
                                echo '<a href="inbox.php?id='.$rows['id'].'&entity='.$notification_table.'">';
                               echo ' <div class="mail_list">
                               <div class="left">
                                 <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                               </div>
                               <div class="right">';
                                echo "<h3>".$rows['subject']."</h3>";
                                echo "<p>".$rows['title']."</p>";
                                echo '</div></div>';
                                echo '</a>';
                              }
                            }
                           
                            
                            ?>
                            
                            
                         
                        
                       
                      </div>
                      <!-- /MAIL LIST -->
<?php
  $enity_table=$_GET['entity'];
  $id=$_GET['id'];
if($id)
{


?>
                      <!-- CONTENT MAIL -->
                      <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                             
                            </div>
                            <?php
                           
                             $mesage_query=mysqli_query($con,"Select * from `$enity_table` WHERE `id`='$id'");
                            $message_data=mysqli_fetch_array($mesage_query);
                            $subject=$message_data['subject'];   $title=$message_data['title'];
                            $message=$message_data['message'];   $time=$message_data['timestamp'];
                            $from=$message_data['from_mail'];
                             
                            ?>
                            <div class="col-md-4 text-right">
                              <p class="date"><?php echo $time; ?></p>
                            </div>
                            <div class="col-md-12">
                              <h4></h4>
                            </div>
                          </div>

                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong>Aman Dixit</strong>
                                <span>(<?php echo $from; ?>)</span> to
                                <strong>me</strong> 
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div>
                            </div>
                          </div>
                          <br> 
                          <div class="view-mail">
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                            <p>Riusmod tempor incididunt ut labor erem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                              mollit anim id est laborum.</p>
                            <p>Modesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
  
                          <?php
                          echo "<p>".$message."</p>";
                          
                          ?>
  
                          </div>
                         
                         
                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
        <?php
        }
        else
        {
          ?>
          
             <!-- CONTENT MAIL -->
             <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                             
                            </div>
                          
                            <div class="col-md-4 text-right">
                              <p class="date"> </p>
                            </div>
                            <div class="col-md-12">
                              <h4></h4>
                            </div>
                          </div>

                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong></strong>
                              
                                <strong></strong> 
                             
                              </div>
                            </div>
                          </div>
                          <br> 
                          <div class="view-mail">
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                            <p>Riusmod tempor incididunt ut labor erem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                              mollit anim id est laborum.</p>
                            <p>Modesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
  
                          
                          </div>
                         
                         
                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
          
          <?php
        }
        ?>
                    </div>
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
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
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>