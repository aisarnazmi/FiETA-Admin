<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title></title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- CSS -->
    <link href="./css/uitmlogo.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="./css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="./css/toastr.min.css">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body>
    <?php
    
        session_start();
        
        if(isset($_SESSION["startAdmin"])){

    ?>

    <div class="se-pre-con"></div>

    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="dashboard.php">
                            <img style="max-height: 10px" src="images/icon/logo.png" alt="FiETA Admin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li class="active">
                                <a href="#">
                                    <i class="fas fa-calendar"></i>Fetch Timetable</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-desktop"></i>Input Record</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="input-stud.php">Student</a>
                                    </li>
                                    <li>
                                        <a href="input-venue.php">Venue</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="reg-admin.php">
                                    <i class="fas fa-users"></i>Register Admin</a>
                            </li>
                            <li>
                                &nbsp;
                            </li>
                            <hr>
                            <li>
                                <a href="logout.php">
                                    <i class="fas fa-power-off"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img style="height: 62px!important; margin-right: 15px" src="images/icon/ic_launcher.png" alt="FiETA Admin" /><span>
                        <font size='4'>FiETA Admin</font>
                    </span>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a href="#">
                                <i class="fas fa-calendar"></i>Fetch Timetable</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Input Record</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="input-stud.php">Student</a>
                                </li>
                                <li>
                                    <a href="input-venue.php">Venue</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="reg-admin.php">
                                <i class="fas fa-users"></i>Register Admin</a>
                        </li>
                        <li>
                            &nbsp;
                        </li>
                        <hr>
                        <li>
                            <a href="logout.php">
                                <i class="fas fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END HEADER MOBILE-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">&nbsp;</div>
                                    <div class="card-body">
                                        <div class="card-title" style="padding-bottom: 30">
                                            <h3 class="text-center title-1">Click The Button To Fetch Final Examination Timetable</h3>
                                        </div>
                                        <br>
                                        <div class="text-center title-7" style="padding-bottom: 30">
                                            <font color="#C0C0C0">Notes: Fetching Timetable May Take Several Minutes</font>
                                        </div>
                                        <hr>
                                        <form method="get" id="inputForm" hidden>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                                                <select class="form-control" id="progcode" name="progcode" data-width="100%">
                                                    <option value="">Choose Programme</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="progcode" class="control-label mb-1">Card number</label>
                                                <select class="coursecode form-control" name="coursecode[]" data-width="100%">
                                                    <option value="">Choose Course</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div align="center">
                                            <button id="fetch" class="btn btn-outline-primary btn-lg btn-block" style="width: 400px">
                                                <span>Fetch Timetable</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <!-- Select2 -->
    <script src="./js/select2.min.js"></script>
    <!-- Toastr -->
    <script src="./js/toastr.min.js"></script>
    <!-- JS Codes -->
    <script src="./js/script.js"></script>

    <?php

            }
            else{

                header("Location: Location: ./index.php");

            }

        ?>

</body>

</html>
<!-- end document-->
