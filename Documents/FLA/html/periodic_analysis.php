<?php
include "connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Firewall Log Analysis</title>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

<script type="text/javascript">
$(document).ready(function(){
    $("#selectMe").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});

function showDiv() {
   document.getElementById('analysisGraph').style.display = "block";
   document.getElementById('analysisResult').style.display = "block";
}

 $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
 $(document).ready(function() {
    $("#datepicker2").datepicker();
});

</script>
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
<script type="text/javascript" src="amcharts/serial.js"> </script>
<script type="text/javascript" src="dataloader.min.js"> </script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<!--- -->
<style type="text/css">
    
    .hide {
  display: none;
}

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
                        <h4 class="page-title">Periodic Analysis</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Periodic Analysis</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
<form action="periodic_analysis.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                            <h3 class="box-title">Start Date</h3>
                        <?php
                          if(isset($_POST['submit']))
                          {
                          ?> 
                                <input id="datepicker1" name="start_date" class="form-control" value="<?php echo $_POST['start_date']?>"/>
                        <?php
                            }
                            else
                            {
                        ?>
                                <input id="datepicker1" name="start_date" class="form-control"/>
                            <?php
                            }    
                            ?>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                            <h3 class="box-title">Start Time</h3>
                        <?php
                          if(isset($_POST['submit']))
                          {
                          ?> 
                                <input type="number" min="0" max="23" name="timepicker1" id="timepicker1" class="form-control" value="<?php echo $_POST['timepicker1']?>"/>
                        <?php
                          }
                          else
                          {
                        ?>
                            <input type="number" min="0" max="23" name="timepicker1" id="timepicker1" class="form-control"/>
                            <?php
                        }
                            ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <div class="row">   
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                            <h3 class="box-title">End Date</h3>
                        <?php
                          if(isset($_POST['submit']))
                          {
                          ?>    
                                <input id="datepicker2" name="end_date" class="form-control " value="<?php echo $_POST['end_date']?>"/>
                        <?php
                           }
                           else
                           {
                            ?>

                                <input id="datepicker2" name="end_date" class="form-control "/>
                            <?php
                           }
                        ?>
                           

                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                            <h3 class="box-title">End Time</h3>
                        <?php
                          if(isset($_POST['submit']))
                          {
                          ?>            
                               <input type="number"  min="0" max="23" name="timepicker2" id="timepicker2" class="form-control" value="<?php echo $_POST['timepicker2']?>"/>
                            <?php
                          }
                        else
                        {
                            ?>
                            <input type="number"  min="0" max="23" name="timepicker2" id="timepicker2" class="form-control" value="<?php $_POST['timepicker2']?>"/>
                        <?php
                        }
                        ?>    
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Select Criteria</h3>
                              <select id="selectMe" name="criteria" class="form-control ">
                                <?php
                          if(isset($_POST['submit']))
                          {
                          ?>    
                                    <option><?php echo $_POST['criteria'];?></option>
                         <?php
                          }
                          else
                          {
                            ?>

                                    <option>Choose Criteria</option>
                            <?php
                          }
                          ?>
                                    <option value="student">Student</option>
                                    <option value="batch">Batch</option>
                                    <option value="class">Class</option>
                                    <option value="gateway">Gateway</option>
                                </select>
                        </div>
                    </div>
                </div>

<div class="row">
 <div class="student box  col-lg-12 col-sm-12 col-xs-12">
    <h3 class="box-title">Enter Username</h3>
    <input type="text" name="username" class="form-control "/>
 
 </div>
 </div>
        <div class="row">

    <div class="batch box">
       
        <div class="col-lg-6 col-sm-6 col-xs-6">
            <h3 class="box-title">Enter Class</h3>
                <select id="selectClass" name="class1" class="form-control ">
                    <option>Choose Class</option>
                    <option value="BTECH">BTECH</option>
                    <option value="TY">TY</option>
                    <option value="SY">TY</option>
                </select>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-6">
            <h3 class="box-title">Enter Batch</h3>
                <select id="selectBatch" name="batch" class="form-control ">
                    <option>Choose Batch</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
        </div>
        </div>
    </div>

    <div class="row">

    <div class="class box">
       
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Enter Class</h3>
                <select id="selectClass" name="class2" class="form-control ">
                    <option>Choose Class</option>
                    <option value="BTECH">BTECH</option>
                    <option value="TY">TY</option>
                    <option value="SY">SY</option>
                </select>
        </div>
        </div>
    </div>
    
    <div class="row">

    <div class="gateway box">
       
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Enter Gateway</h3>
                <select id="selectGateway" name="gateway" class="form-control ">
                    <option>Choose Gateway</option>
                    <option value="10_10_10">10_10_10</option>
                    <option value="10_10_13">10_10_13</option>
                    <option value="10_10_2">10_10_2</option>
                    <option value="10_10_21">10_10_21</option>
                    <option value="10_10_24">10_10_24</option>
                    <option value="10_10_25">10_10_25</option>
                    <option value="10_10_26">10_10_26</option>
                    <option value="10_10_27">10_10_27</option>
                    <option value="10_10_3">10_10_3</option>
                    <option value="10_10_4">10_10_4</option>
                    <option value="10_10_5">10_10_5</option>
                    <option value="10_10_6">10_10_6</option>
                    <option value="10_10_8">10_10_8</option>
                    <option value="10_7_2">10_7_2</option>
                    <option value="10_7_3">10_7_3</option>
                    <option value="10_7_4">10_7_4</option>
                    <option value="192_168_0">192_168_0</option>
                </select>
        </div>
        </div>
    </div>

</div>
                <button type="submit" name="submit" style="margin-left:25px;margin-bottom:10px" class="btn btn-success btn-lg">Show Analysis    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
</button>
</form>
                <br/>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
<?php

if(isset($_POST['submit']))
{
    $start_date = $_POST['start_date']; 
    $start_time = $_POST['timepicker1'];

    $end_date = $_POST['end_date'];
    $end_time = $_POST['timepicker2'];

    $criteria = $_POST['criteria'];

    /*echo "  st da:".$start_date;
    echo "  ed da:".$end_date;
    echo "  st tm:".$start_time;
    echo "  ed tm".$end_time;
    echo "  crit:".$criteria;*/
    $pieces1 = explode("/",$start_date);
    $pieces2 = explode("/",$end_date);
//echo "fff:".$pieces1[0]."gg:".$pieces1[1];

    $date1 = $pieces1[2]."-".$pieces1[0]."-".$pieces1[1]." ".$start_time.":00:00";
    $date2 = $pieces2[2]."-".$pieces2[0]."-".$pieces2[1]." ".$end_time.":00:00";
//echo "fdf:".$date1."ddd:".$date2;
    $username = $_POST['username']; 
    $batch = $_POST['batch'];
    $gateway = $_POST['gateway'];
    $class1 = $_POST['class1'];
    $class2 = $_POST['class2'];

    if($criteria == "student")
    {
        ?>


<div class="row">
                    <div id="analysisGraph" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Student Analysis</h3>
                            <h5> <b>Username :</b> <?php echo $username?></h5>
                            <h5> <b>Start Time :</b> <?php echo $date1?></h5>
                            <h5> <b>End Time : </b><?php echo $date2?></h5>
                                <div id="pa_student" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>

                </div>


        <?php

    }
    if($criteria == "batch")
    {

?>


                <div class="row">
                    <div id="analysisGraph" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Batch Analysis</h3>
                            <h5><b> Class :</b> <?php echo $class1?>       <b>Batch :</b> <?php echo $batch?></h5>
                            <h5><b>Start Time :</b> <?php echo $date1?></h5>
                            <h5><b>End Time :</b> <?php echo $date2?></h5>
                                <div id="pa_batch" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>

                </div>

        <?php

    }
    if($criteria == "class")
    {


        ?>


                <div class="row">
                    <div id="analysisGraph" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Batch Analysis</h3>
                            <h5><b> Class :</b> <?php echo $class2?></h5>
                            <h5><b>Start Time :</b> <?php echo $date1?></h5>
                            <h5><b>End Time :</b> <?php echo $date2?></h5>
                                <div id="pa_class" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>

                </div>

        <?php

    }
    if($criteria == "gateway")
    {
        ?>


<div class="row">
                    <div id="analysisGraph" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Gateway Analysis</h3>
                            <h5><b> Gateway :</b> <?php echo $gateway?></h5>
                            <h5><b>Start Time :</b> <?php echo $date1?></h5>
                            <h5><b>End Time :</b> <?php echo $date2?></h5>
                                <div id="pa_gateway" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>

                </div>

        <?php
    }

    $_SESSION["class1"] = $class1;
    $_SESSION["class2"] = $class2;
    $_SESSION["date1"] = $date1;
    $_SESSION["date2"] = $date2;
    $_SESSION["username"] = $username;
    $_SESSION["batch"] = $batch;
    $_SESSION["gateway"] = $gateway;
    

}

?>    


	<script type="text/javascript">
AmCharts.makeChart("pa_gateway", {
  "type": "pie",
  "theme": "none",
  "dataLoader": {
    "url": "pa_gateway.php",
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
  
               

});
</script>

<script type="text/javascript">
AmCharts.makeChart("pa_student", {
  "type": "pie",
  "theme": "none",
  "dataLoader": {
    "url": "pa_student.php",
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
               

});
</script>

<script type="text/javascript">
AmCharts.makeChart("pa_batch", {
  "type": "pie",
  "theme": "none",
  "dataLoader": {
    "url": "pa_batch.php",
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
               

});
</script>

<script type="text/javascript">
AmCharts.makeChart("pa_class", {
  "type": "pie",
  "theme": "none",
  "dataLoader": {
    "url": "pa_class.php",
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
               

});
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
    <!--<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
