<?php 
// We need to use sessions, so you should always start sessions using the below code.
session_start();

$company = $_SESSION['company'];
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $hideid = $_POST['hide'];
    $showid = $_POST['show'];
    // Create connection
    $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($hideid)){
        $sql = "update menu set hide = 1 where id = $hideid" ;
    }
    if(isset($showid)){
        $sql = "update menu set hide = 0 where id = $showid" ;
    }
    if ($conn->query($sql) === TRUE) {
          header('Location: index.php');
    } 

    $conn->close();

}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MenuBro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156346281-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156346281-1');
</script>



    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <br>
                <a href="index.php"><img class="main-logo" src="img/logo/menubro.png" alt="" /></a>
                <br>
                <a href="index.php">
                    <?php 
                        echo "<img class=\"main-logo\" width=\"170px\" src=\"https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://35.189.41.45/", $company ,"\"/>";
                    ?> 
                    <!--img class="main-logo" src="img/logo/menubro.png" width="170px" alt="" />
                    <h1 class="main-logo">MenuBro</h1-->
                </a>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            
                            <a href=<?php
                                    $company = $_SESSION['company'];
                                    echo "\"http://35.189.41.45/", $company;
                                ?>" target=”_blank” aria-expanded="true"><span
                                    class="educate-icon educate-interface icon-wrap"></span> <span
                                    class="mini-click-non">Live Preview</span></a>
                        </li>
                        <li>
                            <a href="index.php" aria-expanded="true" class=""><span
                                    class="educate-icon educate-apps icon-wrap"></span> <span
                                    class="mini-click-non">Dashboard</span></a>
                        </li>
                        <li>
                            <a href="edit-menu.php" aria-expanded="true"><span
                                    class="educate-icon educate-menu icon-wrap"></span> <span
                                    class="mini-click-non">Menu</span></a>
                        </li>
                        <li>
                            <a href="profile.php" aria-expanded="true"><span
                                    class="educate-icon educate-settings icon-wrap"></span> <span
                                    class="mini-click-non">Profile</span></a>
                        </li>
                        <li>
                            <a href="style.html" target=”_blank” aria-expanded="true"><span
                                    class="educate-icon educate-interface icon-wrap"></span> <span
                                    class="mini-click-non">Style Guide</span></a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li>
                                            <a href="index.php"><img class="main-logo" src="img/logo/menubro.png" alt="" /></a>
                                        </li>
                                        <li>
                                            <?php 
                                                echo "<img src=\"https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://35.189.41.45/", $company ,"\"/>";
                                            ?> 
                                        </li>
                                        <li>
                                            <a href="index.php" aria-expanded="true"><span
                                                    class="educate-icon educate-apps icon-wrap"></span> <span
                                                    class="mini-click-non">Dashboard</span></a>
                                        </li>
                                        <li>
                                            <a href="edit-menu.php" aria-expanded="true"><span
                                                    class="educate-icon educate-menu icon-wrap"></span> <span
                                                    class="mini-click-non">Menu</span></a>
                                        </li>
                                        <li>
                                            <a href="profile.php" aria-expanded="true"><span
                                                    class="educate-icon educate-settings icon-wrap"></span> <span
                                                    class="mini-click-non">Profile</span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rounded">
                            <div class="breadcome-list">
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><?php 
                                                    echo "<h1 class=\"lead\">Hi, ", $company ,"!</h1>";
                                                ?> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Visits in last 24h</h5>
                                <h2 class="counter">
                                <?php
                                session_start();
                                // Create connection
                                $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                $company = $_SESSION['company'];
                                $qz = "SELECT * FROM stats WHERE company = \"$company\"";
                                $result = mysqli_query($con,$qz);
                                

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['today'];
                                }
                                mysqli_close($con);
                                ?>
                                </h2>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <button id="hourly" class="btn btn-default">Today</button>
                                            <button id="weekly" class="btn btn-default">Last 7 Days</button>
                                            <button id="30days" class="btn btn-default">Last 30 Days</button>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="today">
                                            <div class="charts-single-pro responsive-mg-b-30">
                                                <div class="alert-title">
                                                    <h2>Today's Views</h2>
                                                    <p>In GMT</p>
                                                </div>
                                                <div id="bar1-chart">
                                                    <canvas id="barchart1"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="month">
                                            <div class="charts-single-pro responsive-mg-b-30">
                                                <div class="alert-title">
                                                    <h2>Last 30 Days Views</h2>
                                                    <p>In GMT (Day-Month-Year)</p>
                                                </div>
                                                <div id="bar2-chart">
                                                    <canvas id="barchart2"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="week">
                                            <div class="charts-single-pro responsive-mg-b-30">
                                                <div class="alert-title">
                                                    <h2>Last 7 Days Views</h2>
                                                    <p>In GMT (Day-Month-Year)</p>
                                                </div>
                                                <div id="bar3-chart">
                                                    <canvas id="barchart3"></canvas>
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
        </div>
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rounded">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h1>Current Menu</h1>
                                <div class="container">
                                    <div class="row">
                                
                                        <?php
                                            session_start();
                                            // Create connection
                                            $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                            $company = $_SESSION['company'];
                                            $qz = "SELECT * FROM menu WHERE company = \"$company\"";
                                            $result = mysqli_query($con,$qz);
                                            

                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $id = $row['id'];
                                                echo "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">
                                                <a href=\"edit-item.php?id=$id\">";
                                                $image = $row['image'];
                                                $title = $row['title'];
                                                $catagory = $row['catagory'];
                                                $fooddesc = $row['fooddesc'];
                                                $price = $row['price'];
                                                                                                                
                                                echo "<img src=\"", $image ,"\">";

                                                echo "<form action=\"index.php\" method=\"post\"><button name=\"hide\" value=\"$id\" type=\"submit\">hide</button><button name=\"show\" value=\"$id\" type=\"submit\">Show</button></form>";

                                                echo 
                                                "<p>", $title ," ", $price ,"</p>";
                                                echo "</div></a>";
                                                
                                            }
                                            mysqli_close($con);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright MenuBro Ltd © 2020. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>


    <script src="js/charts/Chart.js"></script>
    


    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>



    <script type="text/javascript">
        var ctx = document.getElementById("barchart1");
        var ctx2 = document.getElementById("barchart2");
        var ctx3 = document.getElementById("barchart3");
	    
        var barchart1 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["1am", "2am", "3am", "4am", "5am", "6am", "7am", "8am", "9am", "10am", "11am", "12pm", "1pm", "2pm", "3pm", "4pm", "5pm", "6pm", "7pm", "8pm", "9pm", "10pm", "11pm", "12am"],
			datasets: [{
                label: 'Users: ',
                <?php
                                session_start();
                                // Create connection
                                $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                $company = $_SESSION['company'];
                                $qz = "SELECT * FROM stats WHERE company = \"$company\"";
                                $result = mysqli_query($con,$qz);
                                
                                echo "data: [";
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['1am'];
                                    echo ", ";
                                    echo $row['2am'];
                                    echo ", ";
                                    echo $row['3am'];
                                    echo ", ";
                                    echo $row['4am'];
                                    echo ", ";
                                    echo $row['5am'];
                                    echo ", ";
                                    echo $row['6am'];
                                    echo ", ";
                                    echo $row['7am'];
                                    echo ", ";
                                    echo $row['8am'];
                                    echo ", ";
                                    echo $row['9am'];
                                    echo ", ";
                                    echo $row['10am'];
                                    echo ", ";
                                    echo $row['11am'];
                                    echo ", ";
                                    echo $row['12pm'];
                                    echo ", ";
                                    echo $row['1pm'];
                                    echo ", ";
                                    echo $row['2pm'];
                                    echo ", ";
                                    echo $row['3pm'];
                                    echo ", ";
                                    echo $row['4pm'];
                                    echo ", ";
                                    echo $row['5pm'];
                                    echo ", ";
                                    echo $row['6pm'];
                                    echo ", ";
                                    echo $row['7pm'];
                                    echo ", ";
                                    echo $row['8pm'];
                                    echo ", ";
                                    echo $row['9pm'];
                                    echo ", ";
                                    echo $row['10pm'];
                                    echo ", ";
                                    echo $row['11pm'];
                                    echo ", ";
                                    echo $row['12am'];
                                }
                                echo "],";
                                mysqli_close($con);

                ?>
				//  data: [6, 1, 31, 5, 20, 3, 100],
				backgroundColor: [
					'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)'
                    
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					},
					ticks: {
					  fontColor: "#fff", beginAtZero: true, 
					}
				}],
				yAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					},
					ticks: {
					  fontColor: "#fff", // this here
					}
				}]
			}
		}
	});


    var barchart2 = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: ["Today", "Yesterday",  <?php echo "\"" . date('d-m-y', strtotime('-3 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-4 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-5 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-6 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-7 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-8 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-9 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-10 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-11 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-12 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-13 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-14 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-15 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-16 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-17 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-18 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-19 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-20 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-21 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-22 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-23 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-24 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-25 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-26 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-27 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-28 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-29 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-30 days')) . "\""; ?>, ],
			datasets: [{
                label: 'Users: ',
                <?php
                                session_start();
                                // Create connection
                                $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                $company = $_SESSION['company'];
                                $qz = "SELECT * FROM stats WHERE company = \"$company\"";
                                $result = mysqli_query($con,$qz);
                                
                                echo "data: [";
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['day1'];
                                    echo ", ";
                                    echo $row['day2'];
                                    echo ", ";
                                    echo $row['day3'];
                                    echo ", ";
                                    echo $row['day4'];
                                    echo ", ";
                                    echo $row['day5'];
                                    echo ", ";
                                    echo $row['day6'];
                                    echo ", ";
                                    echo $row['day7'];
                                    echo ", ";
                                    echo $row['day8'];
                                    echo ", ";
                                    echo $row['day9'];
                                    echo ", ";
                                    echo $row['day10'];
                                    echo ", ";
                                    echo $row['day11'];
                                    echo ", ";
                                    echo $row['day12'];
                                    echo ", ";
                                    echo $row['day13'];
                                    echo ", ";
                                    echo $row['day14'];
                                    echo ", ";
                                    echo $row['day15'];
                                    echo ", ";
                                    echo $row['day16'];
                                    echo ", ";
                                    echo $row['day17'];
                                    echo ", ";
                                    echo $row['day18'];
                                    echo ", ";
                                    echo $row['day19'];
                                    echo ", ";
                                    echo $row['day20'];
                                    echo ", ";
                                    echo $row['day21'];
                                    echo ", ";
                                    echo $row['day22'];
                                    echo ", ";
                                    echo $row['day23'];
                                    echo ", ";
                                    echo $row['day24'];
                                    echo ", ";
                                    echo $row['day25'];
                                    echo ", ";
                                    echo $row['day26'];
                                    echo ", ";
                                    echo $row['day27'];
                                    echo ", ";
                                    echo $row['day28'];
                                    echo ", ";
                                    echo $row['day29'];
                                    echo ", ";
                                    echo $row['day30'];
                                }
                                echo "],";
                                mysqli_close($con);

                ?>
				//  data: [6, 1, 31, 5, 20, 3, 100],
				backgroundColor: [
					'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
                    
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					},
					ticks: {
					  fontColor: "#fff", // this here
					}
				}],
				yAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					},
					ticks: {
					  fontColor: "#fff", // this here
					}
				}]
			}
		}
	});
    var barchart3 = new Chart(ctx3, {
		type: 'bar',
		data: {
			labels: ["Today", "Yesterday", <?php echo "\"" . date('d-m-y', strtotime('-3 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-4 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-5 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-6 days')) . "\""; ?>,  <?php echo "\"" . date('d-m-y', strtotime('-7 days')) . "\""; ?>],
			datasets: [{
                label: 'Users: ',
                <?php
                                session_start();
                                // Create connection
                                $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                $company = $_SESSION['company'];
                                $qz = "SELECT * FROM stats WHERE company = \"$company\"";
                                $result = mysqli_query($con,$qz);
                                
                                echo "data: [";
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['day1'];
                                    echo ", ";
                                    echo $row['day2'];
                                    echo ", ";
                                    echo $row['day3'];
                                    echo ", ";
                                    echo $row['day4'];
                                    echo ", ";
                                    echo $row['day5'];
                                    echo ", ";
                                    echo $row['day6'];
                                    echo ", ";
                                    echo $row['day7'];
                                }
                                echo "],";
                                mysqli_close($con);

                ?>
				//  data: [6, 1, 31, 5, 20, 3, 100],
				backgroundColor: [
					'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					},
					ticks: {
					  fontColor: "#fff", // this here
					}
				}],
				yAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					},
					ticks: {
					  fontColor: "#fff", // this here
					}
				}]
			}
		}
	});
    </script>
    
    <script>
        $(document).ready(function(){
            $("#today").show();
            $("#month").hide();
            $("#week").hide();
            $("#30days").click(function(){
                $("#today").hide();
                $("#month").show();
                $("#week").hide();
            });
            $("#hourly").click(function(){
                $("#today").show();
                $("#month").hide();
                $("#week").hide();
            });
            $("#weekly").click(function(){
                $("#week").show();
                $("#month").hide();
                $("#today").hide();
            });
        });
    </script>
</body>

</html>