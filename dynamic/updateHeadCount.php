<?php
include('../includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
   $arr= array('1' => 'April' ,'2' => 'May' ,'3' => 'June' ,'4' => 'July' ,'5' => 'August' ,'6' => 'September' ,'7' => 'October' ,'8' => 'November' ,'9' => 'December' ,'10' => 'January' ,'11' => 'February' ,'12' => 'March' , );

$entity=$_POST['entity'];
  $hc=$_POST['hc'];
   $position=$_POST['position'];
  $month=$_POST['month'];
 
 
      $tomonth=$_POST['tomonth'];
          $months=$tomonth-$month;
$reason=$_POST['reason'];

$table=strtolower($entity." headcount");

$qry=mysqli_query($con,"SELECT * FROM `$table` WHERE position='$position' and month='$month' ");
$rowCheck=mysqli_num_rows($qry);
    if ($rowCheck>0) { // if data exist update the data
         for($i=0; $i<=$months; $i++){
      $query1=mysqli_query($con,"UPDATE `$table` set  `hc`='$hc' where  position='$position' and month='$month' ");
         $query2=mysqli_query($con,"INSERT INTO hc_changes (entity,position,month,hc,reason) VALUES('$entity','$position','$arr[$month]','$hc','$reason')"); 
       
           $month++;  
       } 
    }
    else{ // insert the data if data is not exist
      //echo "<script>alert('F');</script>";
        $query=mysqli_query($con,"INSERT INTO headcount (entity,position,month,hc) VALUES('$entity','$position','$month','$hc')");
         $query3=mysqli_query($con,"INSERT INTO hc_changes (entity,position,month,hc,reason) VALUES('$entity','$position','$month','$hc','$reason')");
    }
 if ($query1) {
  echo "<script>alert(' HeadCount Updated Successfully...');</script>";
 }
elseif ($query) {
    echo "<script>alert('Entity, HeadCount Inserted Successfully...');</script>";
}

 else 
{
 echo "<script>alert('Something went wrong:( Please try once more...!');</script>";
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
      <script>
    // function  selectentity(str){
    //  var req=new XMLHttpRequest();
    //  req.open("get","position_list.php?entity="+str,true);
    //  req.send();
    //  req.onreadystatechange=function(){
    //    if(req.readyState==4&&req.status==200){
    //      document.getElementById("position").innerHTML=req.responseText;
    //    }
    //  }
    // } 
    </script>
    <script>
    function  select_pos_name(str){
     var req=new XMLHttpRequest();
     req.open("get","select_pos_name.php?type="+str,true);
     req.send();
     req.onreadystatechange=function(){
       if(req.readyState==4&&req.status==200){
         document.getElementById("position").innerHTML=req.responseText;
       }
     }
    } 
    </script>
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
                <h3>Update HeadCount<small></small></h3>
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


                               <form id="budgets" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                             <div class="row">




                              <div class="col-form-label col-md-2 col-sm-2 label-align">
                                  <label  for="number"><b style="
                                    color: black;
                                "> Entity :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    
              <select  name="entity" id="entity" title="Select a Entity" class="form-control" onchange="selectentity(this.value);" required>
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

                        <div class="col-form-label col-md-2 col-sm-3 label-align">
                            <label  for="number"><b style="color: black">Position Type:</b><span class="required">*</span></label> 
                        </div>
                        <div class="col-md-3 col-sm-6 ">
                              
                 
                       
                                <select  name="" id="position_type" title="Select a Position Type" class="form-control" disabled="true" required="" onchange="select_pos_name(this.value);">
                                  <option value=0>--Select  Position Type--</option>
                                  <?php
                                   $pos_type_query=mysqli_query($con,"Select Distinct type from `position`");
                                   while ($row=mysqli_fetch_array($pos_type_query))
                                       {
                                          ?>
                                           <option value=<?php echo $row['type']; ?>><?php echo $row['type']; ?></option>
                                          <?php
                                       }
                                  
                                  ?>
                                </select>
                         
                         </div>

                  

                              <div class="col-md-0 col-sm-0 ">

                                      
                                            <label  for="number"><b style="color: black;"> Title :</b><span class="required">*</span>
                                            </label> 

                                  </div>
                                      
                                  <div class="col-md-3 col-sm-2 ">
                                  <select  name="position" id="position" title="Select a Position" class="form-control" disabled="true" required="">
                                           <option value=0>--First Select Position Type--</option>
                                  </select>    

                                  </div>

                          </div>

                          <br>
                          

                          <div class="row">
                          
                       
                        <div class="col-form-label col-md-2 col-sm-3 label-align">



    
          <label  for="number"><b style="color: black;">From Month :</b><span class="required">*</span>
          </label> 

 </div>
     
<div class="col-md-2 col-sm-2 ">
  <select  name="month" id="month"  class="form-control" disabled="true"  required="" >
                     <option>--From Month--</option>

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
                      <h6 style="margin-top:6px; color: red" id="prevhc"></h6>
                 
           
                              </div>
                                

                              <div class="col-md-0 col-sm-0 ">

                                      
                                            <label  for="number"><b style="color: black;"> To Month :</b><span class="required">*</span>
                                            </label> 

                                  </div>

          <div class="col-md-2 col-sm-2 ">
                                    
              <select  name="tomonth" id="tomonth"  class="form-control" disabled="true"  required="" >
                     <option>--To Month--</option>

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
                  <h6 style="margin-top:6px; color: red" id="toprevhc"></h6>
           
                              </div>                          </div>
<br>
            
                              <div class="row">



                              <div class="col-md-2 col-sm-2 ">
                                    
             
                              </div>
                          </div>
                           
                       
                           <div class="row">
  <div class="col-form-label col-md-1 col-sm-1 label-align">

                              </div>
                              <div class="col-form-label col-md-1 col-sm-1 label-align">
                                  <label  for="hc"><b style="
                                    color: black;"> Head Count :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="hc" name="hc" min="0" required="required"  placeholder="Head Count"  class="form-control">
                              </div>
                          </div>
                           <br>
                          
                          <div class="row">
      
                              <div class="col-form-label col-md-2 col-sm-3 label-align">
                                  <label  for="reason"><b style="
                                    color: black;">Reason for HeadCount Update :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                    <textarea name="reason" id="reason" required="required" class="form-control"  ></textarea>
                              </div>
                          </div>
                          <br>
                          <div class="col-md-2 offset-md-9">
                     <button type="submit" name="submit" onclick="return confirm('Confirm to update the HeadCount!')" class="btn btn-warning">UPDATE</button>
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
 
  
      document.getElementById("position_type").disabled=false;
      document.getElementById("position").disabled=false;

  });


  $("#budgets").on('change','#position',function(){
 
  
      document.getElementById("month").disabled=false;
      document.getElementById("tomonth").disabled=false;
  

  });

    $("#budgets").on('change','#month',function()
    {

 
        var entity = $('#entity').val();
      
        var month = $('#month').val();
          var position = $('#position').val();
      
        
        
        $.ajax({
        
        url: 'hc.php', //this should be url to your PHP file
        data: {entity:entity, month:month , position:position},
        
        type: 'POST',
        success: function(data) {


 var x = parseInt(data);
   

  document.getElementById("prevhc").innerHTML = x ;
 
        }
        });
    });

    $("#budgets").on('change','#tomonth',function()
    {

    var entity = $('#entity').val();
      
        var month = $('#tomonth').val();
          var position = $('#position').val();
      
        
        
        $.ajax({
        
        url: 'hc.php', //this should be url to your PHP file
        data: {entity:entity, month:month , position:position},
        
        type: 'POST',
        success: function(data) {


 var x = parseInt(data);
   

  document.getElementById("toprevhc").innerHTML = x ;
 
        }
        });
    });





});



     function numberWithCommas() {

   var x = document.getElementById("valbudget");
   x=x.value;

           var a = document.getElementById("budget");
          b = a.value;

            c=b-x;
            console.log(c);
        
        d = c.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
         document.getElementById("commactc").innerHTML = "&#8377; "  +  d + " / Annum";

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