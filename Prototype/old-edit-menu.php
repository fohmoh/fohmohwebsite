
<!doctype html>
<html class="no-js" lang="en">

<script type="text/javascript">
    window.onbeforeunload = function() {
        return "Refreshing will submit data. Are you sure you want that?";
    }
</script>
<?php
   // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit();
    }

    $_SESSION["lastpage"] = "edit-menu.php";
    
    if($_POST["uploadid"]){
        $_SESSION['uploadid'] = $_POST['uploadid'];        
        header("Location: crop.php"); 
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
    

        $sql = "INSERT INTO catagory(catagory, company) VALUES (\"$ncatagory\", \"$ncompany\")";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }

    if($_POST["addtitle"] != "" && $_POST["addfooddesc"] != ""  && $_POST["addprice"] != ""  && $_POST["addcatagory"]){
        // username and password sent from form 
      
        $acatagory = $_POST["addcatagory"];
        $atitle = $_POST["addtitle"];  
        $afooddesc = $_POST["addfooddesc"];
        $aprice = $_POST["addprice"];
        $acompany = $_SESSION['company'];
        // Create connection
        $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    

        $sql = "INSERT INTO menu(title, fooddesc, price, catagory, company) VALUES (\"$atitle\", \"$afooddesc\", \"$aprice\", \"$acatagory\", \"$acompany\")";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

        //echo "<meta http-equiv='refresh' content='0'>";
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

    else if($eremove != null){
        $sql = "DELETE FROM menu WHERE id=$eremove";
    }
    else{
        $sql = "UPDATE menu SET title=\"$etitle\", fooddesc=\"$efooddesc\", price=\"$eprice\", catagory=\"$ecatagory\" WHERE id=$eid";
    }

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

   }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Menu</title>
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
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
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
                <a href="index.php">
                    <img class="main-logo" src="img/logo/menubro.png" width="170px" alt="" />
                    <!--h1 class="main-logo">MenuBro</h1-->
                </a>
                <strong><a href="index.php"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
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
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="img/logo/menubro.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 colorheader">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">

                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <!--img src="img/product/pro4.jpg" alt="" /-->
                                                            <?php
                                                                session_start();
                                                                echo "<span class=\"admin-name\">", $_SESSION['name'],"</span>";
                                                            ?>
															
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
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
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <!--form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..."
                                                    class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form-->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">
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
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li><a href="#catagories">Catagories</a></li>
                                <li class="active"><a href="#add">Add</a></li>
                                <li><a href="#edit">Edit</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="add">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div ><!--id="dropzone1" class="pro-ad"-->
                                                    <form action="edit-menu.php" method="POST"><!--class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload"-->
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="addtitle" type="text" class="form-control"
                                                                        placeholder="Item Name" value="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="addfooddesc" type="text" class="form-control"
                                                                        placeholder="Menu description" value="">
                                                                </div>

                                                                <select class="form-control" name="addcatagory">
                                                                  <?php
                                                                    session_start();
                                                                    // Create connection
                                                                    $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                                                    $company = $_SESSION['company'];
                                                                    $qz = "SELECT * FROM catagory WHERE company = \"$company\"";
                                                                    $result = mysqli_query($con,$qz);
                                                                    

                                                                    while($row = mysqli_fetch_array($result))
                                                                    {
                                                                        echo "<option value=\"", $row["catagory"], "\">", $row["catagory"], "</option>";
                                                                    }
                                                                    mysqli_close($con);
                                                                  ?>
                                                                </select>
                                                                <br>

                                                                <div class="form-group">
                                                                        <input name="addprice" type="number" min="1" step="any" class="form-control"
                                                                            placeholder="Item Price $" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit"
                                                                        class="btn btn-primary waves-effect waves-light">Add Item</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="edit">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            
                                                            <?php
                                                            session_start();
                                                            // Create connection
                                                            $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                                            $company = $_SESSION['company'];
                                                            $qz = "SELECT * FROM menu WHERE company = \"$company\"";
                                                            $result = mysqli_query($con,$qz);
                                                            

                                                            while($row = mysqli_fetch_array($result))
                                                            {
                                                                $image = $row['image'];
                                                                $title = $row['title'];
                                                                $catagory = $row['catagory'];
                                                                $fooddesc = $row['fooddesc'];
                                                                $price = $row['price'];
                                                                $id = $row['id'];                                                                
                                                                echo "<img src=\"", $image ,"\">";

                                                                echo "                                                            
                                                                <form action=\"edit-menu.php\" method=\"post\" enctype=\"multipart/form-data\">
                                                                    Select image to upload:
                                                                    <small class=\"text-muted\">Please try to upload square images (1x1)</small>
                                                                    <br>
                                                                    <input class=\"btn btn-success\" type=\"submit\" value=\"Upload Image\" name=\"submit\">
                                                                    <input type=\"hidden\" id=\"uploadid\" name=\"uploadid\" value=\"$id\">
                                                                </form>";

                                                                echo 
                                                                "<form action=\"edit-menu.php\" method=\"POST\"><div class=\"form-group\">
                                                                    <input name=\"title\" type=\"text\" class=\"form-control\" placeholder=\"Title of item\" id=\"", $id ,"\" value=\"", $title ,"\">
                                                                </div>";
                                                                echo 
                                                                "<div class=\"form-group\">
                                                                    <input name=\"fooddesc\" type=\"text\" class=\"form-control\" placeholder=\"Description\" value=\"", $fooddesc ,"\">
                                                                </div>";
                                                                /*echo 
                                                                "<div class=\"form-group\">
                                                                    <input name=\"catagory\" type=\"text\" class=\"form-control\" placeholder=\"Catagory\" value=\"", $catagory ,"\">
                                                                </div>";*/

                                                                echo
                                                                "
                                                                <select class=\"form-control\" name=\"catagory\">";
                                                                echo "<option value=\"", $catagory, "\">", $catagory, "</option>";
                                                                    // Create connection
                                                                    $con2=mysqli_connect("localhost","menubro","Menubro123","menubromain");
                                                                    $qz2 = "SELECT * FROM catagory WHERE company = \"$company\"";
                                                                    $result2 = mysqli_query($con2,$qz2);
                                                                    

                                                                    while($row2 = mysqli_fetch_array($result2))
                                                                    {
                                                                        echo "<option value=\"", $row2["catagory"], "\">", $row2["catagory"], "</option>";
                                                                    }
                                                                echo "</select>";

                                                                echo 
                                                                "<div class=\"form-group\">
                                                                    <input name=\"price\" type=\"text\" class=\"form-control\" placeholder=\"Price $\" value=\"", $price ,"\">
                                                                </div>";
                                                                echo "<button name=\"id\" type=\"submit\" class=\"btn btn-primary waves-effect waves-light\" value=\"", $id ,"\">Edit</button>";
                                                                echo "<button name=\"remove\" type=\"submit\" class=\"btn btn-danger waves-effect waves-light\" value=\"", $id ,"\">Remove</button>";
                                                                echo "</form><br><br>";
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
                                <div class="product-tab-list tab-pane fade" id="catagories">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="devit-card-custom">
                                                            <form action="edit-menu.php" method="POST">
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
                                                                            echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">";
                                                                            echo "<div class=\"form-group\">";
                                                                            echo "<h2 value=\"", $row['catagory'], "\">", $row['catagory'], "</h2>";                                                                                                    
                                                                            echo "<form action=\"edit-menu.php\" method=\"POST\"><div class=\"form-group\">";

                                                                            echo "<button name=\"cremove\" type=\"submit\"class=\"btn btn-danger waves-effect waves-light\" value=\"", $row['id'] ,"\">Remove</button></form><br><br></div></div>";
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
                                                                                class="btn btn-primary waves-effect waves-light">Add Catagory</button>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright MenuBro Ltd © 2020. All rights reserved.></p>
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
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/datepicker/jquery-ui.min.js"></script>
    <script src="js/datepicker/datepicker-active.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/form-validation/jquery.form.min.js"></script>
    <script src="js/form-validation/jquery.validate.min.js"></script>
    <script src="js/form-validation/form-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>