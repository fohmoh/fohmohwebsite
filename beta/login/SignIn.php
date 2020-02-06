<?php

    session_start();
    include_once('config.php');
    $alert = $_SESSION['alert'];
    

   // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $connection->prepare('SELECT id, passcode, company FROM users WHERE username = ?')) {
      // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
      $stmt->bind_param('s', $_POST['username']);
      $stmt->execute();
      // Store the result so we can check if the account exists in the database.
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $company);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (($_POST['password']) === $password) //password_verify ,$password 
        {
          // Verification success! User has loggedin!
          // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
          session_regenerate_id();
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['name'] = $_POST['username'];
          $_SESSION['company'] = urldecode($company);
          $_SESSION['id'] = $id;
          header('Location: ../index.php');
        } else {
          //echo 'Incorrect password!';
        }
      } else {
        //echo 'Incorrect username!';
      }
      $stmt->close();
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
    <title>Fiverr.com/ibrahm</title>
    <link rel="icon" href="am.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css\common.css">
    <link rel="stylesheet" href="css\Project-name.css">
  </head>
  <!-- This Page is Developed By M.Ibrahim -->
  <!-- URl: fiverribrahm.000webhostapp.com -->
  <!-- Profile: fiverr.com/ibrahm -->
  <body>
    <section class="content text-dark fz-14">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-4 col-lg-5 col-md-6 col-sm-9">
              <a href="#" class="d-block tdn">
                <p class=" fz-12 my-5 py-5 text-center">
                  <img src="img/logo.jpg" class="img-fluid d-block mx-auto" alt="">
                  <span class="d-block pl-3 text-dark font-italic">Noun. Prounounced (Fo.Mo)</span>
                  <span class="d-block pl-3 text-dark">Definition: Your menu in photos.</span>
                </p>
              </a>
              <form action="" method="post" class="m-0 fw-6 text-secondary">
                <div class="item mb-3">
                  <label for="" class="text-uppercase m-0">Email address</label>
                  <input type="email" class="form-control py-4" autofocus="" required="">
                </div>
                <div class="item mb-3">
                  <label for="" class="text-uppercase m-0">Password</label>
                  <input type="Password" class="form-control py-4" required="">
                </div>
                <button class="btn btn-danger w-100 py-3 mt-4">Sign In</button>
                <p class="text-center my-3">
                  <a href="#" class="border-bottom border-danger text-dark fw-4 tdn">Forgot your password?</a>
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