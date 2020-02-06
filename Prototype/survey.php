<!doctype html>

<script type="text/javascript">
    window.onbeforeunload = function() {
        return "Refreshing will submit data. Are you sure you want that?";
    }
</script>
<html class="no-js" lang="en">

    <?php



    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $addusername = $_SESSION['username'];
      $unencoded = $_POST['company'];
      $addcompany = rawurlencode($unencoded);
      // Create connection
      $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");
      // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //echo $addusername, $addpassword, $addemail, $addconfirmemail, $addconfirmpassword, $addmenucount, $addcompany;
    if($addusername == "" ||  $addcompany == "")
    {
      echo "Please fill in all fields";
      echo $addusername . $unencoded; 
    }
    else {
      //if($addpassword == $addconfirmpassword && strlen($addpassword) >= 6)
      //{
        $sql = "INSERT INTO survey(username, company) VALUES (\"$addusername\", \"$addcompany\")";
        $sql2 = "update users set company = \"$addcompany\" where username = \"$addusername\"";
        $sql3 = "INSERT INTO stats(company) VALUES (\"$addcompany\")";

      //}
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        mkdir("../{$unencoded}", 0777, true);

        mkdir("../{$unencoded}/css", 0777, true);
        mkdir("../{$unencoded}/vendor/bootstrap/css", 0777, true);
        mkdir("../{$unencoded}/vendor/jquery", 0777, true);
        mkdir("../{$unencoded}/vendor/bootstrap/js", 0777, true);
        mkdir("../{$unencoded}/vendor/jquery-easing", 0777, true);
        mkdir("../{$unencoded}/js", 0777, true);
        chmod("../{$unencoded}", 0777);                



        copy("../client/index.php", "../{$unencoded}/index.php");
        copy("../client/css/scrolling-nav.css", "../{$unencoded}/css/scrolling-nav.css");
        copy("../client/vendor/jquery/jquery.min.js", "../{$unencoded}/vendor/jquery/jquery.min.js");
        copy("../client/vendor/bootstrap/js/bootstrap.bundle.min.js", "../{$unencoded}/vendor/bootstrap/js/bootstrap.bundle.min.js");
        copy("../client/vendor/jquery-easing/jquery.easing.min.js", "../{$unencoded}/vendor/jquery-easing/jquery.easing.min.js");
        copy("../client/js/scrolling-nav.js", "../{$unencoded}/js/scrolling-nav.js");
        copy("../client/vendor/bootstrap/css/bootstrap.min.css", "../{$unencoded}/vendor/bootstrap/css/bootstrap.min.css");

        
    } else {
        //echo "Error updating record: " . $conn->error;
        echo "Unfortunately there was a problem with your request. Please make sure that all fields are filled out.";
    }

    if ($conn->query($sql2) === TRUE) {
      if ($conn->query($sql3) === TRUE) {
        //echo $addusername;
        header('Location: login.php');
      }
    } 
    else 
    {
        //echo "Error updating record: " . $conn->error;
        echo "Unfortunately there was a problem with your request. Please make sure that all fields are filled out.";
    }

    $conn->close();

   }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Survey</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
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
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
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
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>One more thing</h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
          <div class="panel-body">
              <form action="survey.php" method="post" id="loginForm">
                  <div class="row">
                      <div class="form-group col-lg-12">
                          <label>What is the name of your company?</label>
                          <input name="company" class="form-control">
                      </div>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-success loginbtn" type="submit">Upload info</button>
                  </div>
              </form>
          </div>
        </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright Menu Bro Ltd © 2020. All rights reserved.</p>
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
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
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