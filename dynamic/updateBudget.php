<?php
include('../includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
      $arr= array('1' => 'April' ,'2' => 'May' ,'3' => 'June' ,'4' => 'July' ,'5' => 'August' ,'6' => 'September' ,'7' => 'October' ,'8' => 'November' ,'9' => 'December' ,'10' => 'January' ,'11' => 'February' ,'12' => 'March' , );
$entity=$_POST['entity'];
  $month=$_POST['month'];
    $tomonth=$_POST['tomonth'];
    $months=$tomonth-$month;
  
  $budget=$_POST['budget'];
$reason=$_POST['reason'];


$qry=mysqli_query($con,"SELECT * FROM budget WHERE entity='$entity' and month='$month' ");
$rowCheck=mysqli_num_rows($qry);
    if ($rowCheck>0) { // if data exist update the data
      for($i=0; $i<=$months; $i++){

        $query1=mysqli_query($con,"UPDATE `budget` set  `month`='$month',`budget`='$budget' where `entity`='$entity' and month='$month'");
         $queryr=mysqli_query($con,"INSERT INTO budgetchanges (entity,budget,month,reason) VALUES('$entity','$budget','$arr[$month]','$reason')");
         $month++;  
       }
    }
    else{ // insert the data if data is not exist
        $query=mysqli_query($con,"INSERT INTO budget (entity,budget,month) VALUES('$entity','$budget','$month')");
         $querys=mysqli_query($con,"INSERT INTO budgetchanges (entity,budget,month,reason) VALUES('$entity','$budget','$month','$reason')");
    }
 if ($query1) {
  echo "<script>alert('Budget Updated Successfully...');</script>";
 }
elseif ($query) {
    echo "<script>alert('Entity, Budget Inserted Successfully...');</script>";
}

 else 
{
 echo "<script>alert('Something went wrong:( Please try once more...!');</script>";
  echo "<script>alert('".$months."');</script>";
   echo "<script>alert('".$month."');</script>"; echo "<script>alert('".$tomonth."');</script>";
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

    <title>MROS </title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      .site_title{
         overflow: inherit;
     }
     .nav_title{
         height: 198px;
         margin-top: -59px;
     }
     .required{color: red}
 </style>
 <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  </head>

  <body class="nav-md">
     <?php
include('includes/leftbar.php'); ?>
<?php
include('includes/topbar.php'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Budget<small></small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              


              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                            <h2>Fill the Details </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                         </li>
                      
                      
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>


                               <form action="" id="budgets" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                             <div class="row">




                              <div class="col-form-label col-md-2 col-sm-3 label-align">
                                  <label  for="number"><b style="
                                    color: black;
                                "> Entity :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    
              <select  name="entity" id="entity" title="Select a Entity" class="form-control"  required="">
                     <option value="0">---Select Entity---</option>
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
                           <br>

                             <div class="row">


<div class="col-form-label col-md-1 col-sm-1 label-align">

                              
                              </div>

                              <div class="col-form-label col-md-1 col-sm-1 label-align">
                                  <label  for="number"><b style="
                                    color: black;
                                "> Months :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-2 col-sm-2 ">
                                    
              <select  name="month" id="month"  class="form-control" disabled="true"  required="" >
                     <option>--Select From Month--</option>

    <option value='1'>April</option>
    <option value='2'>May</option>
    <option value='3'>June</option>
    <option value='4'>July</option>
    <option value='5'>August</option>
    <option value='6'>September</option>
    <option value='7'>October</option>
    <option value='8'>November</option>
    <option value='9'>December</option>
   <option value='10'>January</option>
    <option value='11'>February</option>
    <option value='12'>March</option>
 
                </select>
                      <h6 style="margin-top:6px; color: red" id="prevbudget"></h6>
                       <b> <h6 style="margin-top:6px; color: blue" id="commactc"></h6></b>
           
                              </div>

          <div class="col-md-2 col-sm-2 ">
                                    
              <select  name="tomonth" id="tomonth"  class="form-control" disabled="true"  required="" >
                     <option>--Select To Month--</option>

    <option value='1'>April</option>
    <option value='2'>May</option>
    <option value='3'>June</option>
    <option value='4'>July</option>
    <option value='5'>August</option>
    <option value='6'>September</option>
    <option value='7'>October</option>
    <option value='8'>November</option>
    <option value='9'>December</option>
    <option value='10'>January</option>
    <option value='11'>February</option>
    <option value='12'>March</option>
 
                </select>
                 <h6 style="margin-top:6px; color: red" id="toprevbudget"></h6>
                       <b> <h6 style="margin-top:6px; color: blue" id="tocommactc"></h6></b>
           
                              </div>                          </div>
<br>

                            <div class="row">

                              <div class="col-form-label col-md-1 col-sm-1 label-align">

                            
                              </div>

                              <div class="col-form-label col-md-1 col-sm-1 label-align">

                              
                                  <label  for="budget"><b style="
                                    color: black;
                                "> Budget :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">

                                <input type="text" name="valbudget" id="valbudget" style="display: none" >

                                <input type="text" name="tovalbudget" id="tovalbudget" style="display: none" >
                                       <input name="budget" type="number" id="budget" required="required" class="form-control" step="0.001" placeholder="&#8377; Per Month" onfocusout="numberWithCommas()">
                              </div>
                            
                          </div>
                          <br>
                          <!--  <div class="row">
  <div class="col-form-label col-md-1 col-sm-1 label-align">

                                <h6 style="margin-top:6px; color: red" id="prevhc"></h6>
                              </div>
                              <div class="col-form-label col-md-1 col-sm-1 label-align">
                                  <label  for="hc"><b style="
                                    color: black;
                                "> Head Count :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="hc" name="hc" min="0" required="required"  placeholder="Head Count"  class="form-control">
                              </div>
                          </div>
                           <br>
                           -->
                          <div class="row">
      
                              <div class="col-form-label col-md-2 col-sm-3 label-align">
                                  <label  for="reason"><b style="
                                    color: black;
                                ">Reason for Budget Update :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    <textarea name="reason" id="reason" required="required" class="form-control"  ></textarea>
                              </div>
                          </div>
                          <br>
                          <div class="col-md-2 offset-md-9">
                     <button type="submit" name="submit" onclick="return confirm('confirm to update the Budget!')" class="btn btn-warning">UPDATE</button>
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
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           <a href="#"> Go to Top  <span class="fa fa-chevron-up"> </span></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

 <script>

$(document).ready(function()
{ 

  $("#budgets").on('change','#entity',function(){
 
  
      document.getElementById("month").disabled=false;
  

  });
  $("#budgets").on('change','#month',function(){
 
  
       document.getElementById("tomonth").disabled=false;
  

  });

    $("#budgets").on('change','#month',function()
    {

    //some even that will run ajax request - for example click on a button
        // var myform = document.getElementById("save-pdf");
        // var fd = new FormData(myform );
        var entity = $('#entity').val();
      
        var month = $('#month').val();
      
        
        
        $.ajax({
        
        url: 'budget.php', //this should be url to your PHP file
        data: {entity:entity, month:month },
        
        type: 'POST',
        success: function(data) {


 var x = parseInt(data);
   


         z = x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");


  document.getElementById("prevbudget").innerHTML = "&#8377;"  +  z ;
  v=document.getElementById("valbudget");

v.value=x;
        }
        });
    });
     $("#budgets").on('change','#tomonth',function()
    {

    //some even that will run ajax request - for example click on a button
        // var myform = document.getElementById("save-pdf");
        // var fd = new FormData(myform );
        var entity = $('#entity').val();
      
        var month = $('#tomonth').val();
      
        
        
        $.ajax({
        
        url: 'budget.php', //this should be url to your PHP file
        data: {entity:entity, month:month },
        
        type: 'POST',
        success: function(data) {


 var x = parseInt(data);
   


         z = x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");


  document.getElementById("toprevbudget").innerHTML = "&#8377;"  +  z ;
  v=document.getElementById("tovalbudget");

v.value=x;
        }
        });
    });





});





     function numberWithCommas() {

   var x = document.getElementById("valbudget");
    var y = document.getElementById("tovalbudget");
   x=x.value;
      y=y.value;

           var a = document.getElementById("budget");
          b = a.value;

            c=b-x;
             d=b-y;
           
        
        e = c.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
           f = d.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
         document.getElementById("commactc").innerHTML = "&#8377; "  +  e ;

document.getElementById("tocommactc").innerHTML = "&#8377; "  +  f ;

       }
         



    </script>




    <script type="text/javascript">
     

        // x.value = x.value.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
     // return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");


    </script>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html><html><head><META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8"><meta name="Robots" content="NOINDEX " /></head><body></body>
                <script type="text/javascript">
                 var gearPage = document.getElementById('GearPage');
                 if(null != gearPage)
                 {
                     gearPage.parentNode.removeChild(gearPage);
                     document.title = "Error";
                 }
                 </script>
                 </html>