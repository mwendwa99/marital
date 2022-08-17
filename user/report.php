<?php
include("header.php");

?>
<?php

//This file creates the User interface for the administrator's dashboard
//It displays all the data fetched from the database. 
include('../controllers/connect.php');
$all = $connection->query("SELECT * from cases WHERE user_id = '" . $_SESSION['user_id'] . "' ");
$allcases = mysqli_num_rows($all);
$cases = $connection->query("SELECT * from cases where user_id = '" . $_SESSION['user_id'] . "'  AND cur_status = 'Active' limit 10");
$active = $connection->query("SELECT * from cases where user_id = '" . $_SESSION['user_id'] . "'  AND cur_status = 'Active'");
$activecases = mysqli_num_rows($active);


$resolved = $connection->query("SELECT * from cases where user_id = '" . $_SESSION['user_id'] . "'  AND cur_status = 'Resolved'");
$resolvedcases = mysqli_num_rows($resolved);

?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="dashboard.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>PL</b>AN</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>MyPlan</b></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">



                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../dist/img/art.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $_SESSION['Fname'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/art.png" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $_SESSION['Fname'] ?>

                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat" id="myBtn">Profile</a>
                                    </div>
                                    <div id="myModal" class="modal">
                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <span class="close" style="float: right">&times;</span>
                                            <div id="main-card" style="max-width: 400px; margin: auto; box-shadow: -5px 2px 18px 4px #ccc;">
                                                <div class="cover-photo" style="background: #0ab581; width: 400px; height: 100px;"></div>
                                                <div class="photo" style="background: #f9f9f9; width: 400px; height: 
                                                            100px; display: -webkit-box; display: -ms-flexbox; display: flex; 
                                                            -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center;">
                                                    <img src="./dist/img/art.png" alt="" style="position: relative; top: -50px;
                                                     max-width: 100%; max-height: 100%; border-radius: 50%; box-shadow: -1px 1px 11px 6px rgba(189, 172, 172, 0.33);">
                                                </div>
                                                <div class="content" style="background: #f9f9f9; width: 400px; 
                                                height: 100px; position: relative; top: -35px; margin-bottom:30px;">
                                                    <h2 class="name">First Name: <?php echo $_SESSION['Fname'] ?></h2>
                                                    <h2 class="name">Last Name: <?php echo $_SESSION['Lname'] ?></h2>
                                                    <h2 class="name">Email: <?php echo $_SESSION['email'] ?></h2>
                                                    <h2 class="name">Phone: <?php echo $_SESSION['pno'] ?></h2>
                                                </div>
                                                <div class="contact" style="background: #30354d; width: 400px; height: 50px; display: -webkit-box;
                                                 display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center;
                                                 justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../dist/img/art.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION['Fname'] ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>

                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Reported Cases</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="active treeview-menu">
                            <li><a href="dashboard.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                            <li><a href="report.php"><i class="fa fa-circle-o"></i> Report </a></li>
                            <li><a href="allcases.php"><i class="fa fa-circle-o"></i> All Cases</a></li>
                            <li><a href="closedcases.php"><i class="fa fa-circle-o"></i> Closed Cases</a></li>

                        </ul>
                    </li>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>MaritalReports 1.0</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Incidences</span>
                                <span class="info-box-number"><?php echo number_format($allcases) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Active Cases</span>
                                <span class="info-box-number"><?php echo number_format($activecases) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Resolved</span>
                                <span class="info-box-number"><?php echo number_format($resolvedcases) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Reports</span>
                                <span class="info-box-number"><?php echo number_format($allcases) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>


                <!-- Main row -->
                <div class="col-lg-8 mt-15 mt-lg-0 " style=" width: 100%; padding-top: 80px">

                    <form action="../controllers/save_incident.php" method="post" role="form" class="php-email-form" style=" width: 70%; margin: auto">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION['Fname']; ?>" style="padding :20px; font-size: 18px">
                                <input type="hidden" name="user_id" class="form-control" id="name" value="<?php echo $_SESSION['user_id']; ?>" style="padding :20px; font-size: 18px">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="text" class="form-control" id="name" value="<?php echo $_SESSION['Lname']; ?>" style="padding :20px; font-size: 18px">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" style="padding :20px; font-size: 18px">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $_SESSION['pno']; ?>" style="padding :20px; font-size: 18px">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" style="padding :20px; font-size: 18px" required>
                        </div>
                        <div class="form-group mt-3">
                            <select class="form-select" name="category" aria-label="Default select example" style="padding :10px; font-size: 18px">
                                <option selected>----Select Incident Category -----</option>
                                <option value="1">Domestic Violence</option>
                                <option value="2">Child Abuse</option>

                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" style="padding :20px; font-size: 18px" required></textarea>
                        </div>

                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Action will be taken ASAP. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit" style="padding :20px; font-size: 18px; border-radius:5px ">Send Message</button></div>
                    </form>

                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2022 <a href="#">Project</a>.</strong> All rights reserved.
        </footer>


        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="../bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

    <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>


    <script src="../assets/js/main.js"></script>
</body>

</html>