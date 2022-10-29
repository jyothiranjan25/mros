<?php
include('../includes/dbconnection.php');
$entity = $_GET['entityid'];

if (isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $entity = $_POST['entity'];
    $jobtype = $_POST['jobtype'];
    $jobmonths = $_POST['jobmonths'];
    $pos = $_POST['pos'];
    $job_title = $_POST['job_title'];
    $email = $_POST['email'];
    $joining_date = $_POST['joining_date'];
    $ctc = $_POST['ctc'];
    $status = 0;
    $insert = mysqli_query($con, "INSERT INTO `employee_details` (`emp_id`,`name`,`entity`,`jobtype`,`jobmonths`,`pos`,`job_title`,`email`,`joining_date`,`ctc`,`status`) VALUES ('$emp_id', '$name','$entity','$jobtype','$jobmonths','$pos','$job_title','$email','$joining_date','$ctc','$status')");
    if ($insert) {
        echo "<script>alert('Data Added Successfully');</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}
?>

<script>
    function selectjobtitle(str) {
        var req = new XMLHttpRequest();
        req.open("get", "selectjobtitle.php?name=" + str, true);
        req.send();
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById("job_title").innerHTML = req.responseText;
            }
        }
    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/ifim_logo.jpg" type="image/ico" />
    <title>MROS | </title>

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
    <link href="../build/css/input.css" rel="stylesheet">

    <style>
        .site_title {
            overflow: inherit;
        }

        .nav_title {
            height: 198px;
            margin-top: -59px;
        }
    </style>

    <?php
    include('includes/leftbar.php');
    ?>
    <?php
    include('includes/html_header.php');
    include('includes/topbar.php');
    ?>

</head>

<body class="nav-md">
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add Employee</h3>
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
                            <div class="clearfix">
                                <h6 style="text-align:right ;"><a href="update_bulk_employee_details.php">Bulk Upload</a></h6>
                            </div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form action="" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input name="name" type="text" id="name" required="required" class="form-control ">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Employee ID <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input name="emp_id" id="emp_id" type="text" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email ID <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="email" name="email" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Position<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="pos" id="pos" title="Select a position" class="form-control" required="" onchange="selectjobtitle(this.value);">
                                            <option value="0">Select Position</option>
                                            <?php
                                            $name_query = mysqli_query($con, "Select * from `position_type`");
                                            while ($row = mysqli_fetch_array($name_query)) {
                                                if ($row['name'] != " ") {
                                            ?>
                                                    <option required="required" value="<?php echo  $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                                } else {
                                                    $value = "disabled";
                                                }
                                                ?>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Job Title<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="job_title" id="job_title" title="Select a Job Title" class="form-control" required="">
                                            <option>First Select Position</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Job Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select id="jobtype" name="jobtype" required="required" class="form-control">
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <!-- <option value=""></option>
                                            <option value=""></option> -->
                                        </select>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Job Months <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="jobmonths" name="jobmonths" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Joining Date <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="joining_date" name="joining_date" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">CTC <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="ctc" name="ctc" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">entity<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="entity" id="entity" title="Select entity" class="form-control" required="">
                                            <?php
                                            $entity_query = mysqli_query($con, "SELECT * FROM `entity`");
                                            while ($row = mysqli_fetch_array($entity_query)) {
                                            ?>
                                                <option required="required" value="<?php echo  $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <input type="hidden" value="<?php echo $entity ?>"> -->
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
    </div>
    </div>

    <?php
    include('includes/html_footer.php');
    ?>
</body>

</html>