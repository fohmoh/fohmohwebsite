<?php 
// We need to use sessions, so you should always start sessions using the below code.
session_start();

$company = $_SESSION['company'];
$alert = $_SESSION['alert'];
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

 if($alert != null){
  echo "<div class=\"alert alert-success alert-dismissable\" id=\"flash-msg\">
        <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
        <h4><i class=\"icon fa fa-check\"></i>$alert!</h4>
        </div>"; $alert = null;}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fohmoh</title>
    <link rel="icon" href="am.png">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css\common.css">
    <link rel="stylesheet" href="css\style.css">
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

<body class="posr">
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning d-flex d-xl-none">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto text-center">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Menu Builder</a>
          </li>
          <!--li class="nav-item">
            <a class="nav-link" href="comingsoon.html">Blogs & Articles</a>
          </li-->
          <li class="nav-item">
            <a class="nav-link" href="comingsoon.html">Style Guide</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="menu d-xl-block d-none" id="menu">
      <div class="posr h-100 w-100">
        <a href="index.php" class="p-3 d-block text-center pt-4">
          <img src="img/logo.png" width="90%" alt="">
        </a>
        <ul class="list-unstyled  mt-md-5">
          <li class="mb-1">
            <a href="index.php" class="px-4 pl-5 btn py-2">Dashboard</a>
          </li>
          <li class="mb-1">
            <a href="#" class="px-4 pl-5 btn active py-2">Menu Builder</a>
          </li>
          <li class="mb-1">
            <a href="comingsoon.html" class="px-4 pl-5 btn py-2">Blogs & Articles</a>
          </li>
          <li class="mb-1">
            <a href="comingsoon.html" class="px-4 pl-5 btn py-2">Style Guide</a>
          </li>
        </ul>
        <ul class="BL w-100 text-center list-unstyled">
          <!--li class="my-1"><a href="comingsoon.html" class="text-dark">Terms & Conditions</a></li-->
          <li class="my-1"><a href="comingsoon.html" class="text-dark">Private Policy</a></li>
          <li class="my-1"><a href="logout.php" class="text-dark">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-xl-10 py-4 px-xl-0">
          <h2 class="fw-6 mb-4 pl-2">Hi, <?php echo "$company"; ?></h2>
          <div class="box br-10 bg-white p-xl-3 px-xl-5 px-2 py-2 shadow shadow-sm mb-4">
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <form action="newcatagory.php" method="POST">
                                    <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input name="newcatagory" type="text" class="form-control"
                                                    placeholder="Catagory Name" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                                <button type="submit"
                                                    class="btn btn-primary">Add Catagory To Menu</button>
                                                    <a class="btn btn-outline-primary" href="menubuilder.php"> Back To Menu Builder </a>
                                        </div>
                                    </div>
                                    <br><br>
                                    <h1 class="lead">Current Catagories</h1>
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
                                                echo "<h3 value=\"", $row['catagory'], "\">", $row['catagory'], "</h3>";                                                                                                    
                                                echo "<div class=\"form-group\">";

                                                echo "<button name=\"cremove\" type=\"submit\"class=\"btn btn-danger\" value=\"", $row['id'] ,"\" onclick=\"return confirm('Are you sure?');\">Remove</button></div><br><br></div></div>";
                                            }   
                                            mysqli_close($con);
                                        ?>
                                </form>
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
    <footer class="bg-dark pt-4 pb-2 d-block d-xl-none LST">
      <ul class="list-unstyled text-center text-md-right px-3 d-flex flex-md-row flex-column justify-content-end">
        <li class="px-2"><a href="comingsoon.html" class="text-white">Terms & Conditions</a></li>
        <li class="px-2"><a href="comingsoon.html" class="text-white">Private Policy</a></li>
        <li class="px-2"><a href="logout.php" class="text-white">Logout</a></li>
      </ul>
    </footer>
    <footer class=" bg-dark py-2">
      <div class="container-fluid">
        <div class="row text-white">
          <div class="col-12">
            <p class="m-0 text-right small">Copyright Fohmoh 2020</p>
          </div>
        </div>
      </div>
    </footer>


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