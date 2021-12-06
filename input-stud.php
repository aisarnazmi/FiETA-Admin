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
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-calendar"></i>Fetch Timetable</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Input Record</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li class="active">
                                        <a href="#">Student</a>
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
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-calendar"></i>Fetch Timetable</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Input Record</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li class="active">
                                        <a href="#">Student</a>
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
        <!-- END MENU SIDEBAR-->

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
                                    <div class="card-header">Enter Student Records</div>
                                    <div class="card-body card-block" align="center">
                                        <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col-lg-12">
                                                    <div class="row form-group">
                                                        <div class="col col-md-2" style="padding-top: 8px">
                                                            <label for="file-input" class=" form-control-label">Student Record File:</label>
                                                        </div>
                                                        <div class="col col-md-10">
                                                            <input type="file" id="file-input" name="file-input" class="form-control-file" required>
                                                            <input type="text" name="submit" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer" align="center" style="padding-top: 30px">
                                                <button type="submit" class="btn btn-outline-secondary btn-lg btn-block" style="width: 500px">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Students Record</h3>

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Campus Code</th>
                                                <th>Programme Code</th>
                                                <th>Subject Code</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include("connection.php");
                                            
                                            
                                            $sql = mysqli_query($connect, "SELECT * FROM student ORDER BY studProgramme ASC");
                                            $cnt = mysqli_num_rows($sql);
                                            
                                            if($cnt>0) {
                                                while($data = mysqli_fetch_array($sql)){
                                        
                                        ?>
                                            <tr class="tr-shadow">
                                                <td class="desc"><?php echo $data['studID']; ?></td>
                                                <td><?php echo $data['studName']; ?></td>
                                                <td><?php echo $data['studCampus']; ?></td>
                                                <td><?php echo $data['studProgramme']; ?></td>
                                                <td><?php echo $data['studSubject']; ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        <?php 
                                                  
                                                }
                                            }
                                            else {
                                            
                                        ?>
                                            <tr class="tr-shadow">
                                                <td align="center" colspan="5">No Students Record</td>
                                                
                                            </tr>
                                            <tr class="spacer"></tr>
                                        <?php 
                                            }
                                            
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 <a href="#">FiETA</a>. All rights reserved.</p>
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
    
    <?php

            }
            else{

                header("Location: Location: ./index.php");

            }

        ?>

</body>

</html>
<!-- end document-->
