<?php
include('../includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
   
$entity=$_POST['entity'];
  $hc=$_POST['hc'];
  $budget=$_POST['budget'];
$reason=$_POST['reason'];


$qry=mysqli_query($con,"SELECT * FROM budget WHERE entity='$entity' ");
$rowCheck=mysqli_num_rows($qry);
    if ($rowCheck>0) { // if data exist update the data
        $query1=mysqli_query($con,"UPDATE `budget` set  `hc`='$hc',`budget`='$budget',`reason`='$reason' where `entity`='$entity'");
         $query=mysqli_query($con,"INSERT INTO transactions (entity,budget,hc,reason) VALUES('$entity','$budget','$hc','$reason')");  
    }
    else{ // insert the data if data is not exist
        $query=mysqli_query($con,"INSERT INTO budget (entity,budget,hc,reason) VALUES('$entity','$budget','$hc','$reason')");
         $query=mysqli_query($con,"INSERT INTO transactions (entity,budget,hc,reason) VALUES('$entity','$budget','$hc','$reason')");
    }
 if ($query1) {
  echo "<script>alert('Budget & HeadCount Updated Successfully...');</script>";
 }
elseif ($query) {
    echo "<script>alert('Entity, Budget & HeadCount Inserted Successfully...');</script>";
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
    <link href="../build/css/custom.min.css" rel="stylesheet">    <link href="../build/css/input.css" rel="stylesheet">

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
                <h3>Update Budget & HeadCount<small></small></h3>
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


                               <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                    
              <select  name="entity" id="entity" title="Select a Entity" class="form-control"  required="" onchange="selectentity(this.value);">
                     <option value="0">Select Entity</option>
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

                                <h6 style="margin-top:6px; color: red" id="prevbudget"> BUDGET</h6>
                              </div>

                              <div class="col-form-label col-md-1 col-sm-1 label-align">

                              
                                  <label  for="budget"><b style="
                                    color: black;
                                "> Budget :</b><span class="required">*</span>
                                  </label> 
                              </div>
                              <div class="col-md-6 col-sm-6 ">

                                <input type="text" name="valbudget" id="valbudget" style="display: none" >
                                       <input name="budget" type="number" id="budget" required="required" class="form-control" step="0.001" placeholder="&#8377; Per Annum" onfocusout="numberWithCommas()">
                              </div>
                              <div class="col-md-4 col-sm-4 ">
                         <b> <h6 style="margin-top:6px; color: blue" id="commactc">DIFFERENCE </h6></b>
                        
                          </div>
                          </div>
                          <br>
                           <div class="row">
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
                     <button type="submit" name="submit" onclick="return confirm('confirm to update the budget & headcount!')" class="btn btn-warning">UPDATE</button>
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
    function  selectentity(str){


     var req=new XMLHttpRequest();
     req.open("get","hc.php?entity="+str,true);
     req.send();
     req.onreadystatechange=function(){
       if(req.readyState==4&&req.status==200){

  document.getElementById("prevhc").innerHTML =  parseInt(req.responseText);



       }
     }

 var reqs=new XMLHttpRequest();
     reqs.open("get","budget.php?entity="+str,true);
     reqs.send();
     reqs.onreadystatechange=function(){
       if(reqs.readyState==4&&reqs.status==200){
      
      
 var x = parseInt(reqs.responseText);
   


         z = x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");


  document.getElementById("prevbudget").innerHTML = "&#8377;"  +  z ;
  v=document.getElementById("valbudget");

v.value=x;

       }
     }


    } 

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