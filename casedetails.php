<?php 

//This id specifies the case to be oppened
//
$id = $_GET["id"];
//Connect to the database
include( 'controllers/connect.php' );
//query the database for the case, using the CASE ID
$casedetails = $connection->query("SELECT * from cases where case_id = $id");
//From the returned results, get the case details
$case =  $casedetails->fetch_assoc();
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
    <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="dist/fontawesome-free/css/all.min.css">

    
  <script src="sweetaleart/sweetalert.min.js"></script>
  <link href="sweetaleart/sweetalert.min.css" rel="stylesheet" type="text/css">

   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo">
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
                                <span class="hidden-xs">Logged In User</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/art.png" class="img-circle" alt="User Image">

                                    <p>
                                        Logged In User

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
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
                        <img src="dist/img/art.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>User Logged</p>
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

        
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CASE DETAILS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">  Cases</a></li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="art.png" alt="User profile picture">

              <h3 class="profile-username text-center">CASE DETAILS </h3>

              

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Reported On</b> <a class="pull-right"><?php echo $case['case_date']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php echo $case['cur_status']; ?></a>
                </li>
               
              </ul>

              <a href="allcases.php" class="btn btn-primary btn-block"><b>Back to All Cases</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Details</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="art.png" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo $case['case_date']; ?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared on - <?php echo $case['case_date']; ?> </span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                  <?php echo $case['case_description']."<br>"; ?>
                  <?php echo "Address: ".$case['address']."<br>"; ?>
                  <?php echo "Phone: ".$case['phone']."<br>"; ?>
                  <?php echo "Email: ".$case['email']."<br>"; ?>
                  </p>
                 

                </div>
                <!-- /.post -->

                

                  
                </div>
                <!-- /.post -->

                <!-- Post -->
                
                <!-- /.post -->
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>



  







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
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>

    <script src="dist/js/pages/dashboard2.js"></script>
 
    <script src="dist/js/demo.js"></script>

    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Resolved?',
        text: 'Do you wish to set this case as RESOLVED?',
        icon: 'success',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});

</script>


</body>

</html>