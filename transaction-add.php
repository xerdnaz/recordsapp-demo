<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
        
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">

            <div class="sidebar-wrapper">
                <?php include('includes/sidebar.php'); ?>

            </div>
        </div>
        <div class="main-panel">
            <?php include('includes/navbar.php'); ?>
            <?php 
                require('config/config.php');
                require('config/db.php');

                //check if submitted
                if(isset($_POST['submit'])) {
                    // Get form data
                    $documentcode = mysqli_real_escape_string($conn, $_POST['documentcode']);
                    $action = mysqli_real_escape_string($conn, $_POST['action']);
                    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
                    $employee_id = mysqli_real_escape_string($conn, $_POST['employee']);
                    $office_id = mysqli_real_escape_string($conn, $_POST['office']);

                    // Create insert query

                    $query = "INSERT INTO record_app.transaction(documentcode, action, remarks, employee_id, office_id)
                    VALUES('$documentcode', '$action', '$remarks', '$employee_id', '$office_id')";

                    // Execute query

                    if(mysqli_query($conn, $query)){
                       
                    }else{
                        echo 'ERRO: '. mysqli_error($conn);
                    }

                }


            ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="section">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Office</h4>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                        <div class="row">
                                        <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label>Document Code</label>
                                                    <input type="text" class="form-control" name="documentcode">
                                                </div>
                                        </div> 
                                        <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Action</label>
                                                    <select class="form-control" name='action'>
                                                        <option>IN</option>
                                                        <option>OUT</option>
                                                        <option>COMPLETE</option>
                                                    </select>
                                                </div>
                                        </div> 
                                        
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Remarks</label>
                                                <input name="remarks" type="text" class="form-control"> 
                                            </div>
                                                
                                        </div>

                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Employee</label>
                                                <!-- <input name="email" type="email" class="form-control" placeholder="Email"> -->
                                                <select class="form-control" name='employee'>
                                                    <option>Select....</option>
                                                    <?php 
                                                    $query = "SELECT id, CONCAT(lastname, ', ', firstname) as employee_fullname FROM employee";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_array($result)){
                                                        echo "<option value=" . $row['id'] . ">" . $row['employee_fullname'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div> 
                                        
                                            <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Office</label>
                                                <!-- <input name="email" type="email" class="form-control" placeholder="Email"> -->
                                                <select class="form-control" name='office'>
                                                    <option>Select....</option>
                                                    <?php 
                                                    $query = "SELECT id, name FROM office";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_array($result)){
                                                        echo "<option value=" . $row['id'] . ">" . $row['name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" name="submit" value="Submit" class="btn btn-info btn-fill pull-right">Save Profile</button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                            <img class="avatar border-gray" src="../assets/img/faces/face-3.jpg" alt="...">
                                            <h5 class="title">Mike Andrew</h5>
                                        </a>
                                        <p class="description">
                                            michael24
                                        </p>
                                    </div>
                                    <p class="description text-center">
                                        "Lamborghini Mercy
                                        <br> Your chick she so thirsty
                                        <br> I'm in that two seat Lambo"
                                    </p>
                                </div>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-google-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
