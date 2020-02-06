<?php
  session_start();
  include_once('config.php');
  $error = false;

  // We need to use sessions, so you should always start sessions using the below code.
    
  $alert = $_SESSION['alert'];

   if(isset($_POST["submit"]) && $_POST["submit"] == "register") {
      // username and password sent from form 
      $addusername = $_POST['username'];
      $addemail = $_POST['email'];
      

      if($addusername == "")
            $error .= "Name Required.<br>";
        if($addemail != "")
        {
            if (!filter_var($addemail, FILTER_VALIDATE_EMAIL)) // Validate email address
            {
                $error .="Invalid email address please type a valid email<br>";
            } 
        }
        else
            $error .= "Email Required.<br>";
        
        if($error == false){
          session_regenerate_id();
          $_SESSION['username'] = $addusername;
          $_SESSION['email'] = $addemail;
          header('Location: survey.php');
        } else {
          //echo "Error updating record: " . $conn->error;
          $error = "Unfortunately there was a problem with your request. Please make sure that all fields are filled out.";
        }
  }

   

   if($alert != null){
    echo "<div class=\"alert alert-success alert-dismissable\" id=\"flash-msg\">
          <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
          <h4><i class=\"icon fa fa-check\"></i>$alert!</h4>
          </div>"; $alert = null;}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="icon" href="am.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css\common.css">
    <link rel="stylesheet" href="css\Project-name.css">
  </head>
  <body>
    <section class="content text-dark fz-14">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-4 col-lg-5 col-md-6 col-sm-9">
              <a href="#" class="d-block tdn">
                <p class=" fz-12 my-5 py-5 text-center">
                  <img src="img/logo.png" class="img-fluid d-block mx-auto" alt="">
                </p>
              </a>
              <form action="signup.php" method="post" class="m-0 fw-6 text-secondary">
                <p class="m-0 fw-4 text-center fw-15 mb-3">Get your FREE visual menu now.</p>
                <div class="item mb-3">
                  <label for="" class="text-uppercase m-0">FULL NAME</label>
                  <input type="text" class="form-control py-4" name="username" autofocus="" required="" placeholder="e.g. John Smith">
                </div>
                <div class="item mb-3">
                  <label for="" class="text-uppercase m-0">EMAIL ADDRESS</label>
                  <input type="email" class="form-control py-4" name="email" required="" placeholder="your@email.com">
                </div>
                <button class="btn btn-danger w-100 py-3 mt-4" name="submit" value="register" type="submit">Let’s Get Started</button>
                <p class="text-center my-3">
                  <span>Already have an account?</span>
                  <a href="login.php" class="border-bottom border-danger text-danger fw-4 tdn">Sign in here</a>
                </p>
              </form>
          </div>
        </div>
      </div>
    </section>



    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    
  </body>
</html>