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



if(isset($_POST["remove"])){
  $eremove = $_POST["remove"];
  $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");
      // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM menu WHERE id=$eremove";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $conn->close();

}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $edittitle = $_POST["addtitle"];
    $editfooddesc = $_POST["addfooddesc"];
    $editprice = $_POST["addprice"];
    $editcatagory = $_POST["addcatagory"];
    $editid = $_POST["uploadid"];
    if(isset($_POST["vg"])){
      $vg = 1;
    }
    else{
        $vg = 0;
    }
    if(isset($_POST["v"])){
        $v = 1;
    }
    else{
        $v = 0;
    }
    if(isset($_POST["gf"])){
        $gf = 1;
    }
    else{
        $gf = 0;
    }

    $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");

    $sql = "UPDATE menu SET title=\"$edittitle\", fooddesc=\"$editfooddesc\", price=\"$editprice\", catagory=\"$editcatagory\", vegan=\"$vg\", vegetarian=\"$v\", gf=\"$gf\" WHERE id=$editid";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        $ok = true; 
    } else {
        echo "Error updating record: " . $conn->error;
        $ok = true;
    }

    $conn->close();
}
$ok = false;
$con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
if(isset($_GET["id"])){
    $id = $_GET["id"];  
    $sql = "SELECT * from menu where id=$id and company = \"$company\"";

    $result = mysqli_query($con,$sql);
                                                

    while($row = mysqli_fetch_array($result))
    {
        $ok = true;
        $image = $row['image'];
        $title = $row['title'];
        $catagory = $row['catagory'];
        $fooddesc = $row['fooddesc'];
        $price = $row['price'];
        $id = $row['id'];       
        $vg = $row['vegan'];
        $v = $row['vegetarian'];
        $gf = $row['gf'];
    }
    
    mysqli_close($con);
    
}
if($ok == true){
    //
}
else{
    header('Location: edit-menu.php');
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
                                <h1 class="lead">Edit Item On Menu</h1>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <?php
                                    echo "<img src=\"", $image ,"\">";

                                    echo "                                                            
                                    <form action=\"edit-item.php?id=$id\" method=\"post\" enctype=\"multipart/form-data\">
                                        Select image to upload:
                                        <small class=\"text-muted\">Please try to upload square images (1x1)</small>
                                        <br>
                                        <input class=\"btn btn-success\" type=\"submit\" value=\"Upload Image\" name=\"submit\">
                                        <input type=\"hidden\" id=\"uploadid\" name=\"uploadid\" value=\"$id\">
                                    </form>";
                                    ?>
                                    
                                </div>
                                <br>    
                                <form action=<?php echo "\"edit-item.php?$id\""?> method="POST"><!--class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload"-->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input name="addtitle" type="text" class="form-control"
                                                    placeholder="Item Name" value=<?php echo "\"$title\""; ?>>
                                            </div>
                                            <div class="form-group">
                                                    <input name="addprice" type="number" min="1" step="any" class="form-control"
                                                        placeholder="Item Price $" value=<?php echo "\"$price\""; ?>>
                                            </div>
                                            <div class="form-group">
                                                <input name="addfooddesc" type="text" class="form-control"
                                                    placeholder="Menu description" value=<?php echo "\"$fooddesc\""; ?>>
                                            </div>

                                            <?php echo "<input type=\"hidden\" id=\"uploadid\" name=\"uploadid\" value=\"$id\">"; ?>

                                            <input type="checkbox" name="vg" value="vg" <?php if($vg == 1){echo "checked";}?>> VG<br>
                                            <input type="checkbox" name="v" value="v" <?php if($v == 1){echo "checked";}?>> V<br>
                                            <input type="checkbox" name="gf" value="gf" <?php if($gf == 1){echo "checked";}?>> GF<br>
                                            <br>

                                            <div>
                                                <p>Catagory:</p>
                                                <?php
                                                session_start();
                                                // Create connection
                                                $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                                $company = $_SESSION['company'];
                                                $qz = "SELECT * FROM catagory WHERE company = \"$company\"";
                                                $result = mysqli_query($con,$qz);
                                                

                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<div class=\"form-check form-check-inline\">";
                                                    echo "<input class=\"form-check-input\" type=\"radio\" "; if($catagory == $row["catagory"]){echo "checked=\"checked\"";} echo " name=\"addcatagory\" id=\"", $row["catagory"],"\" value=\"", $row["catagory"], "\">";
                                                    echo "<label class=\"form-check-label\" for=\"", $row["catagory"],"\">", $row["catagory"] ,"</label></div>";
                                                }
                                                mysqli_close($con);
                                                ?>
                                            </div>
                                            <a class="btn btn-warning" href="newcat.php">Add Catagory</a>
                                            <br>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="payment-adress">
                                                <button type="submit"
                                                    class="btn btn-primary">Edit Item</button>
                                                    <?php echo "<button name=\"remove\" type=\"submit\" class=\"btn btn-danger waves-effect waves-light\" value=\"", $id ,"\">Remove</button>"; ?>
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