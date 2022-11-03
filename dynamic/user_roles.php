<?php
include('../includes/dbconnection.php');
$entity_id = $_GET['entity_id'];

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['mailid']);
    unset($_SESSION['role']);
    unset($_SESSION['entity']);
    header("location: login.php");
}
if (isset($_GET['role'])) {
    $_SESSION['entity'] =  str_replace(" ", "_", $_GET['entity_name']);
    $_SESSION['entity_name'] = $_GET['entity_name'];
    $_SESSION['role'] = $_GET['role'];
    $_SESSION['entity_id'] = $_GET['entity_id'];
    // $entity_id =  $_SESSION['entity_id'];
    header("location: index.php?id=$entity_id");
}

// $_SESSION['email'] = $email;
$email = $_SESSION['email'];
// echo $email;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MROS | User Role</title>
    <?php
    include('includes/html_header.php');
    ?>
</head>

<body class="nav-md">
    <?php
    // include('includes/leftbar.php'); 

    include('includes/topbar1.php');
    ?>


    <body class="nav-md">


        <!-- page content -->
        <div class="right_col" role="main">
            <div class="panel panel-default" style="margin-left:20px">
                <div class="page-title">
                    <div class="title_left">
                        <h3> User Role</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                <div style="display:flex; flex-wrap: wrap; gap: 20px 0px; ">
                    <?php
                    $query_entity = "SELECT e.entity_name as entity_name, e.name as name, r.name as role_name , emp.entity_id
                FROM `employee` emp
                INNER JOIN `role` r
                ON r.id=emp.role
                INNER JOIN `entity` e
                ON e.id=emp.entity_id 
                WHERE email='$email'";
                    $login_result = mysqli_query($con, $query_entity);
                    while ($row = mysqli_fetch_array($login_result)) {
                        $entity_id = $row['entity_id'];
                        $entity_name = $row['entity_name'];
                        $entity_name1 = $row['name'];
                        $role_name = $row['role_name'];
                    ?>

                        <div class="col-md-3 col-sm-3">
                            <div class="card box-shadow-hover">
                                <div class="card-body text-primary" style="text-align:center">
                                    <a href="user_roles.php?role=<?= $role_name ?>&entity_id=<?= $entity_id ?>&entity_name=<?= $entity_name ?>">
                                        <img src="images/profile.jpg" alt="John" style="width:50%">
                                        <h5 class="card-title"><?= $role_name ?></h5>
                                    </a>
                                    <h6 class="card-text" id="emp"><?= $entity_name1 ?></h6>
                                </div>
                            </div>
                        </div>

                    <?php }
                    ?>
                </div>
            </div>
        </div>

        <?php
        include('includes/html_footer1.php');
        ?>
    </body>

</html>