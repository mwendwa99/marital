<?php
// session_start();
//This file creates the User interface for the administrator's dashboard
//It displays all the data fetched from the database. 
include('controllers/connect.php');
$all = $connection->query("SELECT * from cases");
$allcases = mysqli_num_rows($all);
$cases = $connection->query("SELECT * from cases where cur_status = 'Active' limit 10");
$active = $connection->query("SELECT * from cases where cur_status = 'Active'");
$activecases = mysqli_num_rows($active);


$resolved = $connection->query("SELECT * from cases where cur_status = 'Resolved'");
$resolvedcases = mysqli_num_rows($resolved);



?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyPlan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- Favicons -->
    <link href="assets/img/ribbon.png" rel="icon">

    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="./assets/css/modal.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

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
                                <img src="dist/img/art.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Admin</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/art.png" class="img-circle" alt="User Image">

                                    <p>
                                        Admin

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
                                    <!-- <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat" id="myBtn">Profile</a>
                                    </div> -->
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
                                        <a href="./logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
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
                        <img src="dist/img/art.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Admin</p>
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
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-12 ">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Cases</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>Case ID</th>
                                                <th>Date</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            while ($row = $cases->fetch_assoc()) {
                                                $case_id = $row['case_id'];
                                                $date = $row['case_date'];
                                                $case_description =  $row['case_description'];
                                                $name = $row['reportername'];
                                                $phone = $row['phone'];
                                                $email = $row['email'];
                                                $address = $row['address'];
                                                $status = $row['cur_status']; ?>


                                                <tr>
                                                    <td><a href="allcases.php"><?php echo "CSOR" . $case_id; ?></a></td>
                                                    <td><?php echo $date; ?></td>
                                                    <td><?php echo $phone; ?></td>
                                                    <td><?php echo $address; ?></td>

                                                    <?php
                                                    if ($status == 'Resolved') {
                                                        echo "<td><span class=\"label label-success\"> $status </span></td>";
                                                    } else if ($status == 'Active') {
                                                        echo "<td><span class=\"label label-danger\"> $status </span></td>";
                                                    }

                                                    ?>

                                                </tr>



                                            <?php } ?>



                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <a href="allcases.php" class="btn btn-sm btn-info btn-flat pull-left">Urgent Action Cases</a>
                                <a href="allcases.php" class="btn btn-sm btn-default btn-flat pull-right">View All Cases</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>

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
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="./assets/js/modal.js"></script>
</body>


</html>