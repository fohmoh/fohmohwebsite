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

?>
<!DOCTYPE html>
<html lang="en">
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
          <img src="img/logo.png" alt="">
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


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>
</html>