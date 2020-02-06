<?php
session_start();
include_once('config.php');
$error = false;
    function copy_directory($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    // We need to use sessions, so you should always start sessions using the below code.
    
    $alert = $_SESSION['alert'];

   if(isset($_POST["submit"]) && $_POST["submit"] == "register") {
      // username and password sent from form 
      $addusername = $_POST['username'];
      $addpassword = $_POST['password'];
      $addemail = $_POST['email'];
      $addconfirmpassword = $_POST['confirmpassword'];
      

      if($addusername == "")
            $error .= "Username Required.<br>";
        if($addemail != "")
        {
            if (!filter_var($addemail, FILTER_VALIDATE_EMAIL)) // Validate email address
            {
                $error .="Invalid email address please type a valid email<br>";
            } 
        }
        else
            $error .= "Email Required.<br>";
        
            
        if($addpassword == "")
            $error .= "Password Required.<br>";

        if($addconfirmpassword == "")
            $error .= "Confirm Password Required.<br>";

        if($addpassword != $addconfirmpassword)
            $error .= "Passwords dose't match.<br>";

        if($error == false){
    //echo $addusername, $addpassword, $addemail, $addconfirmemail, $addconfirmpassword, $addmenucount, $addcompany;
    //if($addusername == "" ||  $addpassword == "" || $addemail == "" || $addconfirmemail == "" || $addconfirmpassword == "" || $addmenucount == "" || $addcompany == "")
    //{
     // echo "Please fill in all fields";
    //}
    //else {
      //if($addpassword == $addconfirmpassword && strlen($addpassword) >= 6)
      //{
        $sql = "INSERT INTO users(username, passcode, email) VALUES (\"$addusername\", \"$addpassword\", \"$addemail\")";
      //}
    //}

    if ($connection->query($sql) === TRUE) {
        /*echo "Record updated successfully";
        $oldmask = umask(0);
        mkdir("$addcompany", 0777);
        umask($oldmask);
        copy_directory('/Client','/$addcompany');*/
        session_regenerate_id();
        $_SESSION['username'] = $addusername;
        header('Location: survey.php');
    } else {
        //echo "Error updating record: " . $conn->error;
        $error = "Unfortunately there was a problem with your request. Please make sure that all fields are filled out.";
    }
  }

   

   }
   if($alert != null){
    echo "<div class=\"alert alert-success alert-dismissable\" id=\"flash-msg\">
          <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
          <h4><i class=\"icon fa fa-check\"></i>$alert!</h4>
          </div>"; $alert = null;}
?>
<!doctype html>

<script type="text/javascript">
    window.onbeforeunload = function() {
        return "Refreshing will submit data. Are you sure you want that?";
    }
</script>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register</title>
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
				<h3>Registration</h3>
				<p>Let's get started on your menu!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                      
          <?php if (isset($error) && $error != false) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error;?>
                            </div>
                          <?php } ?>
                        <form action="register.php" method="post" id="loginForm"  data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" id="pass1" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Confirm Password</label>
                                    <input name="confirmpassword" data-match="#pass1"  type="password" class="form-control" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <!--div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks" checked> Sigh up for our newsletter
                                </div-->
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn" name="submit" value="register" type="submit">Register</button>
                                <br><br>
                                <a class="btn btn-default btn-block" href="login.php">Or Login</a>
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
    <script src="https://1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>
</body>

</html>