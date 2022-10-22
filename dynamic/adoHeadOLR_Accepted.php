<?php
include('../includes/dbconnection.php');
// error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MROS </title>

<?php
include('includes/html_header.php'); ?>

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
                <h3>Approved Offer Letter Requests<small></small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                   
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                         </li>
                      
                      
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>SNo.</th>
                          <th>Candidate Name</th>
                          <th>Mail Id</th>
                          <th>Joining Date</th>
                          <th>CTC/Annum</th>
                          <th>Position</th>
                          <th>Job Title</th>
                          <th>Requested By</th>
                          <th>Approved on</th>
                          <th>Offer Letter</th>
                          <th>Upload Offer Letter</th>
                        </tr>
                      </thead>
                       <tbody>
                        <?php 



                        $offerletter_query=mysqli_query($con,"SELECT of.*,e.entity_name FROM offer_letters of LEFT JOIN entity e ON e.id=of.entity_id where status >= 1  order by datesubmitted desc ");
$cnt=1;
while ($row=mysqli_fetch_array($offerletter_query))
{
   ?>
  
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($row['cand_name']);?></td>
                                                            <td><?php echo htmlentities($row['personal_mail_id']);?></td>
                                                                <td><?php echo htmlentities(date("d-M-Y", strtotime($row['joining_date'])));?></td>
                                                              <td><b><?php echo htmlentities(inr_format($row['ctc']));?></b></td>
                                                            <td><?php echo htmlentities($row['pos']);?></td>
                                                            <td><?php echo htmlentities($row['job_title']);?></td>
                                                               <!--  <td><?php echo htmlentities($row['reporting_to']);?></td> -->
                                                                <td><?php echo htmlentities($row['requested_by']);?></td>
 
<td><?php echo htmlentities(date("d-M-Y", strtotime($row['datesubmitted'])));?></td>

  <td><a href="view_offer_letter.php?olr_id=<?= $row['id'];?>" target="_blank" class="btn btn-primary" > view  </a></td>
  <td>

   <input type="button" data-toggle="modal" data-target="#myModal" value="upload" class="btn btn-warning" >

  
</td>
</tr>   


 <!-- Modal -->
     <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                         <h4 class="modal-title">Upload Offer Letter File</h4>
                         <a class="close" data-dismiss="modal" style="cursor: pointer;"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
 <form name="ex<?php echo $cnt;?>" action="adoHeadOLR_signed.php?entity=<?php echo htmlentities($row['entity_name']);?>&olr_id=<?php echo htmlentities($row['id']);?>&name=<?php echo htmlentities($username); ?>" method="post" enctype="multipart/form-data">
Signed Copy: <br><br>
  <input type="file" name="img" accept=".pdf" required/> <br>
  <br>


                       
                    </div>

  <div class="modal-footer">
                                             <button  class="btn btn-secondary" data-dismiss="modal"  >Cancel </button>
                                             
                                             <input type="submit" name="submit" id="submit<?php echo $cnt; ?>" value="Submit" class="btn btn-primary" > 
</form>

     </div>

               </div>
          </div>
     </div>

<?php $cnt=$cnt+1;





} 


   function inr_format($amount) {
    $inr = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
    return $inr;
}

?>
                </tbody>
                
                
              </table>
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

<?php include('includes/html_footer.php'); ?>
  </body>
</html>


    
