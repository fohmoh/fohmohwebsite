<?php 
  // We need to use sessions, so you should always start sessions using the below code.
  session_start();
  date_default_timezone_set('NZ');
  include_once('config.php');
  $company = $_SESSION['company'];
  //$_SESSION['alert'] = 'testing';
  $alert = $_SESSION['alert'];

  $_SESSION['addtitle'] = "";
  $_SESSION['addfooddesc'] = "";
  $_SESSION['addprice'] = "";


  // If the user is not logged in redirect to the login page...
  if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {
      $hideid = $_POST['hide'];
      $showid = $_POST['show'];
      
      if(isset($hideid)){
          $sql = "update menu set hide = 1 where id = $hideid" ;
      }
      if(isset($showid)){
        $sql = "update menu set hide = 0 where id = $showid" ;
      }      
      if ($connection->query($sql) === TRUE) {
            header('Location: index.php');
      } 

      


      
  }
  if($alert != null){
    echo "<div class=\"alert alert-success alert-dismissable\" id=\"flash-msg\">
          <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
          <h4><i class=\"icon fa fa-check\"></i>$alert!</h4>
          </div>"; $_SESSION['alert'] = null;}
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
    <script src="js/charts/Chart.js"></script>

    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-156346281-1');
    </script>
  </head>
  <body class="posr">
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning d-flex d-xl-none">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="50%" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto text-center">
          <li class="nav-item active">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menubuilder.php">Menu Builder</a>
          </li>
          <!--li class="nav-item">
            <a class="nav-link" href="comingsoon.html">Blogs & Articles</a>
          </li-->
          <li class="nav-item">
            <a class="nav-link" href="comingsoon.html">Style Guide</a>
          </li>
          <li class="nav-item">
            <?php echo "<img class=\"main-logo\" width=\"170px\" src=\"https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://fohmoh.com/", $company ,"\"/>"; ?>
            <p>Hold Image To Save</p>
          </li>
        </ul>
      </div>
    </nav>
    <div class="menu d-xl-block d-none" id="menu">
      <div class="posr h-100 w-100">
        <a href="index.php" class="p-3 d-block text-center pt-4">
          <img src="img/logo.png" width="90%" alt="">
        </a>
        <ul class="list-unstyled mt-md-5">
          <li class="mb-1">
            <a href="#" class="px-4 pl-5 btn active py-2">Dashboard</a>
          </li>
          <li class="mb-1">
            <a href="menubuilder.php" class="px-4 pl-5 btn py-2">Menu Builder</a>
          </li>
          <!--li class="mb-1">
            <a href="comingsoon.html" class="px-4 pl-5 btn py-2">Blogs & Articles</a>
          </li-->
          <li class="mb-1">
            <a href="comingsoon.html" class="px-4 pl-5 btn py-2">Style Guide</a>
          </li>
          <li class="mb-1">
            <?php echo "<img class=\"main-logo px-4 pl-5 btn py-2\" width=\"170px\" src=\"https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://fohmoh.com/", $company ,"\"/>"; ?>
            <p class="px-4 pl-5 btn py-2">Right Click To Save</p>
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
          <div class="d-flex justify-content-between">
            <div>
              <h2 class="fw-6 mb-4 pl-2">Hi, <?php echo "$company"; ?></h2>
            </div>
            <div>
              <h2 ><?php echo date("h:i a"); ?></h2>
            </div>
          </div>
          <div class="box br-10 bg-white p-xl-3 px-2 py-2 shadow shadow-sm mb-4">
            <div class="d-flex justify-content-between">
              <a class="btn btn-secondary btn-lg btn-block" href=<?php echo "\"http://fohmoh.com/", str_replace(' ', '%20', $company) ,"\""?>>Live Preview</a>
            </div>
          </div>

          <div class="box br-10 bg-white p-xl-3 px-2 py-2 shadow shadow-sm mb-4">
            <div class="d-flex justify-content-between">
              <h5 class="m-0 fw-7">Analytics</h5>
              <div class="dropdown">
                <a class="btn btn-outline-dark fw-7 border-0 py-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  7 Days
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" id="hourly">Today</a>
                  <a class="dropdown-item" id="weekly">7 days</a>
                  <a class="dropdown-item" id="30days">30 days</a>
                </div>
              </div>
            </div>
            <hr class="m-0 my-2">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="today">
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <p>In NZT</p>
                    </div>
                    <h1 id="todayviews"></h1>
                    <div id="bar1-chart">
                        <canvas id="barchart1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="month">
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <p>In NZT (Day-Month-Year)</p>
                    </div>
                    <div id="bar2-chart">
                        <canvas id="barchart2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="week">
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <p>In NZT (Day-Month-Year)</p>
                    </div>
                    <div id="bar3-chart">
                        <canvas id="barchart3"></canvas>
                    </div>
                </div>
            </div>
          </div>
          <div class="box br-10 bg-white p-xl-3 px-2 py-2 shadow shadow-sm mb-4">
            <div class="d-md-flex justify-content-between">
              <h5 class="mn-0 fw-7">Menu Builder</h5>
              <div class="dropdown">
                <a class="btn btn-outline-dark fw-7 border-0 py-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php $cataget = $_GET["catagory"]; 
                  if(isset($_GET["catagory"])){
                    echo $cataget;
                  } 
                  else {
                  echo "All";
                  }
                  ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php 
                session_start();
                
                $company = $_SESSION['company'];
                $qz = "SELECT * FROM menu WHERE company = \"$company\"";
                $result = mysqli_query($connection,$qz);
                
                $catagoryarr = [];


                while($row = mysqli_fetch_array($result))
                {
                    $id = $row['id'];
                    $image = $row['image'];
                    $title = $row['title'];
                    $catagory = $row['catagory'];
                    $fooddesc = $row['fooddesc'];
                    $price = $row['price'];
                    $hide = $row['hide'];
                    if(!in_array ($row["catagory"], $catagoryarr)){
                      array_push($catagoryarr, $row['catagory']);
                      echo "<a class=\"dropdown-item\" href=\"index.php?catagory=$catagory#currentMenuStart\" id=\"$catagory\">$catagory</a>";
                    }
                }
                echo "<a class=\"dropdown-item\" href=\"index.php#currentMenuStart\" id=\"all\">All</a>";
                
                $catagoryarr = [];
                
              ?>
                </div>
              </div>
            </div>
            <hr class="m-0 my-2">
            <ul class="list-inline list-unstyled py-2 text-center" id="currentMenuStart">
              <li class="list-inline-item py-3">
                <a href="menubuilder.php">
                  <div class="item border-warning border br-10 d-flex justify-content-center flex-column text-warning">
                    <p class="m-0 text-center"><i class="fas fa-plus"></i></p>
                  </div>
                </a>
                <p class="m-0 fz-12 py-2 fw-7 px-1">
                  <span>Add New Item</span>
                </p>
              </li>
              <?php 
                session_start();
                
                $company = $_SESSION['company'];
                if(isset($_GET['catagory'])){
                  $tcat = $_GET['catagory'];
                  $qz = "SELECT * FROM menu WHERE company = \"$company\" and catagory = \"$tcat\"";
                }
                else{
                $qz = "SELECT * FROM menu WHERE company = \"$company\"";}

                $result = mysqli_query($connection,$qz);
                

                while($row = mysqli_fetch_array($result))
                {
                    $id = $row['id'];
                    $image = $row['image'];
                    $title = $row['title'];
                    $catagory = $row['catagory'];
                    $fooddesc = $row['fooddesc'];
                    $price = $row['price'];
                    $hide = $row['hide'];

                    if ($hide == 1){
                      $showhide = "<button name=\"show\" value=\"$id\" type=\"submit\" class=\"btn m-0 small text-warning small btn-lg btn-block\">In Stock</button>                      ";
                      $blurstyle = "notinstock";
                    }
                    else if ($hide == 0){
                      $showhide = "<button name=\"hide\" value=\"$id\" type=\"submit\" class=\"btn m-0 small text-warning small btn-lg btn-block\">Out of Stock</button>";
                      $blurstyle = "  ";
                    }
                                                                                    
                    echo "<li class=\"list-inline-item py-3\">
                        <div class=\"item br-10 d-flex flex-column oh posr\">
                          <img src=\"$image\" class=\"w-100 h-100 $blurstyle\" alt=\"\">
                          <div class=\"hov bg-warning posa w-100 h-100 text-center d-flex justify-content-end flex-column\">
                            <a href=\"menuupdate.php?id=$id\" class=\"d-block\">
                              <span class=\"fw-6 text-white pb-1\">Edit</span>
                            </a>
                            <form action=\"index.php\" method=\"post\">
                              <div class=\"txt bg-white py-1 mt-3\">
                                $showhide                            
                              </div>
                            </form>
                          </div>
                        </div>
                      <p class=\"m-0 fz-12 py-2  px-1 d-flex justify-content-between\">
                        <span class=\"fw-7\">$title</span>
                        <span class=\"\">$price</span>
                      </p>
                    </li>";   
                }
                
              ?>
            </ul>
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
    <script type="text/javascript">
        var ctx = document.getElementById("barchart1");
        var ctx2 = document.getElementById("barchart2");
        var ctx3 = document.getElementById("barchart3");
	    
        var barchart1 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["1am", "2am", "3am", "4am", "5am", "6am", "7am", "8am", "9am", "10am", "11am", "12pm", "1pm", "2pm", "3pm", "4pm", "5pm", "6pm", "7pm", "8pm", "9pm", "10pm", "11pm", "12am"],
			datasets: [{
                label: 'Users: ',
                <?php
                                $company = $_SESSION['company'];
                                $qz = "SELECT * FROM stats WHERE company = \"$company\"";
                                $result = mysqli_query($connection,$qz);
                                
                                echo "data: [";
                                while($row = mysqli_fetch_array($result))
                                {
                                    $today = $row['today'];
                                    echo $row['1am'];
                                    echo ", ";
                                    echo $row['2am'];
                                    echo ", ";
                                    echo $row['3am'];
                                    echo ", ";
                                    echo $row['4am'];
                                    echo ", ";
                                    echo $row['5am'];
                                    echo ", ";
                                    echo $row['6am'];
                                    echo ", ";
                                    echo $row['7am'];
                                    echo ", ";
                                    echo $row['8am'];
                                    echo ", ";
                                    echo $row['9am'];
                                    echo ", ";
                                    echo $row['10am'];
                                    echo ", ";
                                    echo $row['11am'];
                                    echo ", ";
                                    echo $row['12pm'];
                                    echo ", ";
                                    echo $row['1pm'];
                                    echo ", ";
                                    echo $row['2pm'];
                                    echo ", ";
                                    echo $row['3pm'];
                                    echo ", ";
                                    echo $row['4pm'];
                                    echo ", ";
                                    echo $row['5pm'];
                                    echo ", ";
                                    echo $row['6pm'];
                                    echo ", ";
                                    echo $row['7pm'];
                                    echo ", ";
                                    echo $row['8pm'];
                                    echo ", ";
                                    echo $row['9pm'];
                                    echo ", ";
                                    echo $row['10pm'];
                                    echo ", ";
                                    echo $row['11pm'];
                                    echo ", ";
                                    echo $row['12am'];
                                }
                                echo "],";
                                mysqli_close($con);

                ?>
				//  data: [6, 1, 31, 5, 20, 3, 100],
				backgroundColor: [
					'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)',
                    'rgba(250, 20, 132, 0.5)'
                    
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					
				],
				borderWidth: 1
			}]
		},
		options: {
    scaleShowValues: true,
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }],
    xAxes: [{
    ticks: {
    autoSkip: false
    }
    }]
    }
    }
	});


    var barchart2 = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: [<?php echo "\"" . date('d-m-y', strtotime('-30 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-29 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-28 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-27 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-26 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-25 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-24 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-23 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-22 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-21 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-20 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-19 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-18 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-17 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-16 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-15 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-14 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-13 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-12 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-11 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-10 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-9 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-8 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-7 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-6 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-5 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-4 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-3 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-2 days')) . "\""; ?>, "Today"],
			datasets: [{
                label: 'Users: ',
                <?php
                                $company = $_SESSION['company'];
                                $qz = "SELECT * FROM stats WHERE company = \"$company\"";
                                $result = mysqli_query($connection,$qz);
                                
                                echo "data: [";
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['day30'];
                                    echo ", ";
                                    echo $row['day29'];
                                    echo ", ";
                                    echo $row['day28'];
                                    echo ", ";
                                    echo $row['day27'];
                                    echo ", ";
                                    echo $row['day26'];
                                    echo ", ";
                                    echo $row['day25'];
                                    echo ", ";
                                    echo $row['day24'];
                                    echo ", ";
                                    echo $row['day23'];
                                    echo ", ";
                                    echo $row['day22'];
                                    echo ", ";
                                    echo $row['day21'];
                                    echo ", ";
                                    echo $row['day20'];
                                    echo ", ";
                                    echo $row['day19'];
                                    echo ", ";
                                    echo $row['day18'];
                                    echo ", ";
                                    echo $row['day17'];
                                    echo ", ";
                                    echo $row['day16'];
                                    echo ", ";
                                    echo $row['day15'];
                                    echo ", ";
                                    echo $row['day14'];
                                    echo ", ";
                                    echo $row['day13'];
                                    echo ", ";
                                    echo $row['day12'];
                                    echo ", ";
                                    echo $row['day11'];
                                    echo ", ";
                                    echo $row['day10'];
                                    echo ", ";
                                    echo $row['day9'];
                                    echo ", ";
                                    echo $row['day8'];
                                    echo ", ";
                                    echo $row['day7'];
                                    echo ", ";
                                    echo $row['day6'];
                                    echo ", ";
                                    echo $row['day5'];
                                    echo ", ";
                                    echo $row['day4'];
                                    echo ", ";
                                    echo $row['day3'];
                                    echo ", ";
                                    echo $row['day2'];
                                    echo ", ";
                                    echo $row['day1'];
                                }
                                echo "],";
                                mysqli_close($con);

                ?>
				//  data: [6, 1, 31, 5, 20, 3, 100],
				backgroundColor: [
					'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
                    
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					
				],
				borderWidth: 1
			}]
		},
		options: {
    scaleShowValues: true,
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }],
    xAxes: [{
    ticks: {
      autoSkip: true,
      maxTicksLimit: 10
    }
    }]
    }
    }
	});
    var barchart3 = new Chart(ctx3, {
		type: 'bar',
		data: {
			labels: [<?php echo "\"" . date('d-m-y', strtotime('-7 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-6 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-5 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-4 days')) . "\""; ?>,  <?php echo "\"" . date('d-m-y', strtotime('-3 days')) . "\""; ?>, <?php echo "\"" . date('d-m-y', strtotime('-2 days')) . "\""; ?>, "Today"],
			datasets: [{
                label: 'Users: ',
                <?php
                                $company = $_SESSION['company'];
                                $qz = "SELECT * FROM stats WHERE company = \"$company\"";
                                $result = mysqli_query($connection,$qz);
                                
                                echo "data: [";
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['day7'];
                                    echo ", ";
                                    echo $row['day6'];
                                    echo ", ";
                                    echo $row['day5'];
                                    echo ", ";
                                    echo $row['day4'];
                                    echo ", ";
                                    echo $row['day3'];
                                    echo ", ";
                                    echo $row['day2'];
                                    echo ", ";
                                    echo $row['day1'];
                                }
                                echo "],";
                                mysqli_close($con);

                ?>
				//  data: [6, 1, 31, 5, 20, 3, 100],
				backgroundColor: [
					'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
				],
				borderWidth: 1
			}]
		},
		options: {
    scaleShowValues: true,
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }],
    xAxes: [{
    ticks: {
    autoSkip: false
    }
    }]
    }
    }
	});
    </script>
    <script>
        $(document).ready(function(){
            $("#today").hide();
            $("#month").hide();
            $("#week").show();
            $("#30days").click(function(){
                $("#today").hide();
                $("#month").show();
                $("#week").hide();
            });
            $("#hourly").click(function(){
                $("#today").show();
                $("#month").hide();
                $("#week").hide();
            });
            $("#weekly").click(function(){
                $("#week").show();
                $("#month").hide();
                $("#today").hide();
            });

            <?php 
                session_start();
                
                $company = $_SESSION['company'];
                $qz = "SELECT * FROM menu WHERE company = \"$company\"";
                $result = mysqli_query($connection,$qz);
                
                $catagoryarr = [];


                while($row = mysqli_fetch_array($result))
                {
                    $id = $row['id'];
                    $image = $row['image'];
                    $title = $row['title'];
                    $catagory = $row['catagory'];
                    $fooddesc = $row['fooddesc'];
                    $price = $row['price'];
                    $hide = $row['hide'];
                    if(!in_array ($row["catagory"], $catagoryarr)){
                      array_push($catagoryarr, $row['catagory']);
                      echo "
                      $(\"#$catagory\").click(function(){
                        $('#dropdownMenuLink').text(\"$catagory\");
                    });
                    ";
                    }
                }                
                $catagoryarr = [];
                
              ?>

        });
        $('#todayviews').text(<?php echo "\"$today\""; ?> + " People Today");
    </script>

  </body>
</html>

