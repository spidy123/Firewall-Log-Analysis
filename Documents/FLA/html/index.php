<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Firewall Log Analysis</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
<!-- amcharts files-->  
<script type="text/javascript" src="amcharts/amcharts.js"></script>
<script type="text/javascript" src="amcharts/pie.js"> </script>
<script type="text/javascript" src="dataloader.min.js"> </script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<!--- -->

<style type="text/css">
div.amcharts-chart-div > a[style]
{
    display: none !important;
}

</style>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
  
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                     
                    </li>
                    <li>
                        <center><h3  style="color:white;margin-right:550px"><span><img src="../plugins/images/favicon.png" width="25" height="25"/></span>irewall Log Analysis</h3></center>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.php" class="waves-effect"><i class="fa fa-th-large fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                  <li style="padding: 20px 0 0;">
                        <a href="policy_improvement.php" class="waves-effect"><i class="fa fa-wrench fa-fw" aria-hidden="true"></i>Policy Improvement</a>
                    </li>
                    <li style="padding: 20px 0 0;">
                        <a href="periodic_analysis.php" class="waves-effect"><i class="fa fa-line-chart fa-fw" aria-hidden="true"></i>Periodic Analysis</a>
                    </li>
                    <li style="padding: 20px 0 0;">
                        <a href="resource_utilization.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Resource Utilization</a>
                    </li>
                    <li style="padding: 20px 0 0;">
                        <a href="profile_generation.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>User Profile Generation</a>
                    </li>
                    <li style="padding: 20px 0 0;">
                        <a href="404.html" class="waves-effect"><i class="fa fa-pie-chart fa-fw" aria-hidden="true"></i>Clustering</a>
                    </li>
                    
                    

                </ul>
                <div class="center p-20">
                     
                 </div>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Users</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
<?php
include "connection.php";
$qur = "SELECT COUNT(userid) as cnt from student";
$res = mysql_query($qur);
$row = mysql_fetch_array($res);
$number_of_rows = $row['cnt'];
?>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo $number_of_rows;?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Gateways</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
<?php
$qur = "SELECT COUNT(gateway) as cnt from uniquegat";
$res = mysql_query($qur);
$row = mysql_fetch_array($res);
$number_of_rows = $row['cnt'];
?>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $number_of_rows;?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Categories</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
<?php
$qur = "SELECT COUNT(category) as cnt from uniquecat";
$res = mysql_query($qur);
$row = mysql_fetch_array($res);
$number_of_rows = $row['cnt'];
?>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $number_of_rows;?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Top Users</h3>
                                <div id="topUsers" style="width: 100%; height: 400px;overflow:auto"></div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Top Gateways</h3>
                                <div id="topGateways" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>            
                </div>    

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Top Categories</h3>
                                <div id="topCategories" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>

                </div>    

	<script type="text/javascript">
AmCharts.makeChart("topUsers", {
  "type": "pie",
  "theme": "none",
  "dataLoader": {
    "url": "top_users.php",
    "format": "json"
  },

  "titleField": "userid",
  "valueField": "hits",
    "outlineAlpha": 0.4,
                "depth3D": 15,
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "angle": 25,
  "legend":{
    "align": "center",
    "markerType": "circle"
  },
  
    "export": {
    "enabled": true
  }            

});
</script>

<script type="text/javascript">
AmCharts.makeChart("topGateways", {
  "type": "pie",
  "theme": "none",
  "dataLoader": {
    "url": "top_gateways.php",
    "format": "json"
  },

  "titleField": "gateway",
  "valueField": "hits",
    "outlineAlpha": 0.4,
                "depth3D": 15,
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "angle": 25,
  "legend":{
    "align": "center",
    "markerType": "circle"
  },

    "export": {
    "enabled": true
  }        
  
               

} );
</script>

<script type="text/javascript">
AmCharts.makeChart("topCategories", {
  "type": "pie",
  "theme": "none",
  "dataLoader": {
    "url": "top_categories.php",
    "format": "json"
  },

  "titleField": "category",
  "valueField": "hits",
    "outlineAlpha": 0.4,
                "depth3D": 15,
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "angle": 25,
  "legend":{
    "align": "center",
    "markerType": "circle"
  },

    "export": {
    "enabled": true
  }        
  
               

} );
</script>

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
              
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
               
                   
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> Firewall Log Analysis </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="../plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>
