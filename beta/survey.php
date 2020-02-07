<?php
    session_start();

    //Database Information
    include_once('config.php');


    $error = false;
   if(isset($_POST['company']) && $_POST['company'] != "") {
      // username and password sent from form 
      $addusername = $_SESSION['username'];
      $addemail = $_SESSION['email'];
      $addpassword = $_POST['password'];

      //Company Name Url Friendly And Not
      $unencoded = clean($_POST['company']);
      $addcompany = rawurlencode($unencoded);
      


    // Check if password or company name isn't filled in
    if($addpassword == "" ||  $addcompany == "")
    {
      $error = "Please fill in all fields";
      $error .= $addusername . $unencoded; 
    }
    else {
        // Insert all information we have receiced into database and make default catagories
        $sql = "INSERT INTO survey(username, company) VALUES (\"$addusername\", \"$addcompany\")";
        $sql2 = "INSERT INTO users(company, username, email, passcode) values (\"$addcompany\", \"$addusername\", \"$addemail\", \"$addpassword\")";
        $sql3 = "INSERT INTO stats(company) VALUES (\"$addcompany\")";
        $sql4 = "INSERT INTO catagory(company, catagory) VALUES (\"$addcompany\", \"Breakfast\")";
        $sql5 = "INSERT INTO catagory(company, catagory) VALUES (\"$addcompany\", \"Lunch\")";
        $sql6 = "INSERT INTO catagory(company, catagory) VALUES (\"$addcompany\", \"Dinner\")";
    }

    if ($connection->query($sql) === TRUE) {
      // Copy Diner Files Accross

        $message = "Record updated successfully";
        mkdir("../{$unencoded}", 0777, true);
        chmod("../{$unencoded}", 0777);                

        copy("../client/index.php", "../{$unencoded}/index.php");
        copy("../client/list-view.php", "../{$unencoded}/list-view.php");
        copy("../client/card-view.php", "../{$unencoded}/card-view.php");
                
    } else {
        $error = "Unfortunately there was a problem with your request. Please make sure that all fields are filled out.";
    }

    if ($connection->query($sql2) === TRUE) {
      if ($connection->query($sql3) === TRUE && $connection->query($sql4) === TRUE && $connection->query($sql5) === TRUE && $connection->query($sql6) === TRUE) {
        //echo $addusername;
        header('Location: login.php');
      }
    } 
    else 
    {
        //echo "Error updating record: " . $conn->error;
        $error = "Unfortunately there was a problem with your request. Please make sure that all fields are filled out.";
    }

    

   }
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
                  <span class="d-block pl-3 text-dark">Welcome!</span>
                </p>
              </a>
              <form action="survey.php" method="post" class="m-0 fw-6 text-secondary">
                <div class="item mb-3">
                  <label for="" class="text-uppercase m-0">Company Name</label>
                  <input type="" name="company" class="form-control py-4" required="">
                </div>
                <div class="item mb-3">
                  <label for="" class="text-uppercase m-0">Password</label>
                  <input type="Password" name="password" class="form-control py-4" required="">
                </div>
                <div class="item mb-3">
                  <label for="" class="text-uppercase m-0">Password Strength:</label>
                  <hr class="m-0 mt-1">
                  <ul class="list-inline list-unstyled fz-12 mt-2 mb-4">
                    <li class="list-inline-item "><span class="text-danger fz-20 lh-14">&bull;</span> One uppercase character</li>
                    <li class="list-inline-item "><span class="text-danger fz-20 lh-14">&bull;</span> One lowercase character</li>
                    <li class="list-inline-item "><span class="text-danger fz-20 lh-14">&bull;</span> 8 Characters minimum</li>
                  </ul>
                </div>
                <div class="form-check mb-0 mt-4 item">
                  <input class="form-check-input" type="checkbox" value="">
                  <label class="form-check-label fw-4" for="defaultCheck1">I accept the Terms of Service</label>
                </div>
                <button type="submit" class="btn btn-danger w-100 py-3 mt-2">Next</button>
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