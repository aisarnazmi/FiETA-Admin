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
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-calendar"></i>Fetch Timetable</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Input Record</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="input-stud.php">Student</a>
                                    </li>
                                    <li class="active">
                                        <a href="#">Venue</a>
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
                                    <li>
                                        <a href="input-stud.php">Student</a>
                                    </li>
                                    <li class="active">
                                        <a href="#">Venue</a>
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
                                    <div class="card-header">Enter Examination Venue Records</div>
                                    <div class="card-body card-block">
                                        <form action="import-venue.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col col-md-7">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3" style="padding-top: 8px">
                                                            <label for="campcode" class=" form-control-label">Select Campus: </label>
                                                        </div>
                                                        <div class="col-12 col-md-7">
                                                            <select name="campcode" id="campcode" class="form-control" required>
                                                                <option value="">Please select</option>
                                                                <option value="AC">AC:&nbsp;&nbsp;ACCOUNTANCY</option>
                                                                <option value="AD">AD:&nbsp;&nbsp;ART AND DESIGN</option>
                                                                <option value="AG">AG:&nbsp;&nbsp;ALOR GAJAH CAMPUS</option>
                                                                <option value="AM">AM:&nbsp;&nbsp;ADMINISTRATIVE SCIENCE & POLICY STUDIES</option>
                                                                <option value="AP">AP:&nbsp;&nbsp;ARCHITECTURE, PLANNING AND SURVEYING</option>
                                                                <option value="AR">AR:&nbsp;&nbsp;ARAU CAMPUS</option>
                                                                <option value="AS">AS:&nbsp;&nbsp;APPLIED SCIENCES</option>
                                                                <option value="A4">A4:&nbsp;&nbsp;TAPAH CAMPUS</option>
                                                                <option value="BM">BM:&nbsp;&nbsp;BUSINESS MANAGEMENT</option>
                                                                <option value="BT">BT:&nbsp;&nbsp;BUKIT MERTAJAM CAMPUS</option>
                                                                <option value="CS">CS:&nbsp;&nbsp;INFORMATION TECH. & QUANTITATIVE SCIENCES</option>
                                                                <option value="DC">DC:&nbsp;&nbsp;INSTITUTE OF EDUCATION DEVELOPMENT</option>
                                                                <option value="DU">DU:&nbsp;&nbsp;DUNGUN CAMPUS</option>
                                                                <option value="EC">EC:&nbsp;&nbsp;CIVIL ENGINEERING</option>
                                                                <option value="ED">ED:&nbsp;&nbsp;EDUCATION</option>
                                                                <option value="EE">EE:&nbsp;&nbsp;ELECTRICAL ENGINEERING</option>
                                                                <option value="EH">EH:&nbsp;&nbsp;CHEMICAL ENGINEERING</option>
                                                                <option value="EM">EM:&nbsp;&nbsp;MECHANICAL ENGINEERING</option>
                                                                <option value="HM">HM:&nbsp;&nbsp;HOTEL & TOURISM MANAGEMENT</option>
                                                                <option value="HS">HS:&nbsp;&nbsp;HEALTH SCIENCES</option>
                                                                <option value="IS">IS:&nbsp;&nbsp;INFORMATION MANAGEMENT</option>
                                                                <option value="JK">JK:&nbsp;&nbsp;JENGKA CAMPUS</option>
                                                                <option value="KK">KK:&nbsp;&nbsp;KOTA KINABALU CAMPUS</option>
                                                                <option value="KP">KP:&nbsp;&nbsp;KUALA PILAH CAMPUS</option>
                                                                <option value="LW">LW:&nbsp;&nbsp;LAW</option>
                                                                <option value="MA">MA:&nbsp;&nbsp;MACHANG CAMPUS</option>
                                                                <option value="MC">MC:&nbsp;&nbsp;COMMUNICATION AND MEDIA STUDIES</option>
                                                                <option value="OM">OM:&nbsp;&nbsp;OFFICE MANAGEMENT AND TECHNOLOGY</option>
                                                                <option value="CT">CT:&nbsp;&nbsp;ARTISTIC AND CREATIVE TECHNOLOGY</option>
                                                                <option value="PH">PH:&nbsp;&nbsp;PHARMACY</option>
                                                                <option value="SA">SA:&nbsp;&nbsp;SAMARAHAN CAMPUS</option>
                                                                <option value="SG">SG:&nbsp;&nbsp;SEGAMAT CAMPUS</option>
                                                                <option value="SI">SI:&nbsp;&nbsp;SRI ISKANDAR CAMPUS</option>
                                                                <option value="SP">SP:&nbsp;&nbsp;SG PETANI CAMPUS</option>
                                                                <option value="SR">SR:&nbsp;&nbsp;SPORT SCIENCE AND RECREATION</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col col-md-5">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3" style="padding-top: 8px">
                                                            <label for="venfile" class=" form-control-label">Venue File:</label>
                                                        </div>
                                                        <div class="col-12 col-md-5">
                                                            <input type="file" id="venfile" name="venfile" class="form-control-file" required>
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
                                <h3 class="title-5 m-b-35">Examination Venues Record</h3>

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Bil. </th>
                                                <th>Campus Code</th>
                                                <th>Subject Code</th>
                                                <th>Examination Venue</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include("connection.php");
                                            
                                            $i = 1;
                                            
                                            $sql = mysqli_query($connect, "SELECT * FROM venue ORDER BY campusCode");
                                            $cnt = mysqli_num_rows($sql);
                                            
                                            if($cnt>0) {
                                                while($data = mysqli_fetch_array($sql)){
                                        
                                        ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['campusCode']; ?></td>
                                                <td><?php echo $data['subjectCode']; ?></td>
                                                <td class="desc"><?php echo $data['venue']; ?></td>
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
                                                $i++;  
                                                }
                                            }
                                            else {
                                            
                                        ?>
                                            <tr class="tr-shadow">
                                                <td align="center" colspan="5">No Venue Record</td>
                                                
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
