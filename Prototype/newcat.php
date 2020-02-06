<?php 
// We need to use sessions, so you should always start sessions using the below code.
session_start();

$company = $_SESSION['company'];
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}

if($_POST["newcatagory"]){
    $ncatagory = $_POST["newcatagory"];
    $ncompany = $_SESSION['company'];
    // Create connection
    $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $newsql = "INSERT INTO catagory(catagory, company) VALUES (\"$ncatagory\", \"$ncompany\")";

    if ($conn->query($newsql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $eremove = $_POST['remove'];
    $cremove = $_POST['cremove'];
    $eid = $_POST['id'];
    echo $eid;
    $etitle = $_POST['title'];
    $efooddesc = $_POST['fooddesc'];
    $eprice = $_POST['price'];
    $ecatagory = $_POST['catagory'];
    // Create connection
    $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");
    // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
      
  if($cremove != null){
      $sql = "DELETE FROM catagory WHERE id=$cremove";
  }

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
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
                                                    echo "<h1 class=\"lead\">", $company ,"</h1>";
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
                                <h1 class="lead">Add Catagory</h1>
                                <form action="newcat.php" method="POST">
                                    <div class="row">
                                        <?php
                                            session_start();
                                            // Create connection
                                            $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                            $company = $_SESSION['company'];
                                            $qz = "SELECT * FROM catagory WHERE company = \"$company\"";
                                            $result = mysqli_query($con,$qz);
                                            

                                            while($row = mysqli_fetch_array($result))
                                            {
                                                echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
                                                echo "<div class=\"form-group\">";
                                                echo "<h2 value=\"", $row['catagory'], "\">", $row['catagory'], "</h2>";                                                                                                    
                                                echo "<div class=\"form-group\">";

                                                echo "<button name=\"cremove\" type=\"submit\"class=\"btn btn-danger\" value=\"", $row['id'] ,"\">Remove</button></div><br><br></div></div>";
                                            }   
                                            mysqli_close($con);
                                        ?>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input name="newcatagory" type="text" class="form-control"
                                                    placeholder="Item Name" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="payment-adress">
                                                <button type="submit"
                                                    class="btn btn-primary">Add Catagory</button>
                                                    <a class="btn btn-success" href="edit-menu.php">Back To Menu</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                <h1 class="lead">Current Menu</h1>
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
                                                echo "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">
                                                <a href=\"edit-menu.php\">";
                                                $image = $row['image'];
                                                $title = $row['title'];
                                                $catagory = $row['catagory'];
                                                $fooddesc = $row['fooddesc'];
                                                $price = $row['price'];
                                                $id = $row['id'];                                                                
                                                echo "<img src=\"", $image ,"\">";

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

</body>

</html>