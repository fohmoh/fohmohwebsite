

<!DOCTYPE html>
<html lang="en">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!--div id="circle">
  <div class="loader">
    <div class="loader">
        <div class="loader">
           <div class="loader">

           </div>
        </div>
    </div>
  </div>
</div--> 
<!--script type="text/javascript">
  $(document).ready(function(){
    $("circle").remove();
  });

</script-->


<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156346281-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-156346281-1');
</script>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php 
          $url = $_SERVER['REQUEST_URI']; //returns the current URL
          $parts = explode('/',$url);
          $dir = $_SERVER['SERVER_NAME'];
        
          end($parts);
          $dircompany = prev($parts); 
          $dircompany = urldecode($dircompany);

          echo $dircompany;
          ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Navigation -->
  <?php
  // Create connection
  $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
  //$company = $_SESSION['company'];
  $qz = "SELECT * FROM survey where company = \"$dircompany\"";
  $result = mysqli_query($con,$qz);
  
  
  $image = [];
  $title = [];
  $catagory = [];
  $fooddesc = [];
  $price = [];
  $id = [];

  while($row = mysqli_fetch_array($result))
  {
    $color = $row["maincolour"];
    echo "<nav class=\"navbar navbar-expand-lg navbar-light fixed-top\" style=\"background-color: ", $color, "\" id=\"mainNav\">";
  }
  ?>

  
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php
          echo $dircompany;
          ?>  </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      


      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php 
          // Create connection
          $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
          //$company = $_SESSION['company'];
          $qz = "SELECT * FROM menu where company = \"$dircompany\"";
          $result = mysqli_query($con,$qz);
          $catagory = [];

          while($row = mysqli_fetch_array($result))
          {
            if(!in_array ($row["catagory"], $catagory)){
            array_push($catagory, $row['catagory']);
            }
          }
          foreach($catagory as $c){
            echo "
            <li class=\"nav-item\">
              <a class=\"nav-link js-scroll-trigger\" href=\"#$c\">$c</a>
              </li>
            
            ";
          }
          mysqli_close($con);
          ?>
         
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-dark text-white">
    <div class="container text-center">
      <h1><?php 

          echo $dircompany;
          ?></h1>
      <!--p class="lead">A landing page template freshly redesigned for Bootstrap 4</p-->
    </div>
  </header>

  <?php
  session_start();

  // Create connection
  $con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
  //$company = $_SESSION['company'];
  $qz = "SELECT * FROM menu where company = \"$dircompany\"";
  $result = mysqli_query($con,$qz);
  
  
  $image = [];
  $title = [];
  $catagory = [];
  $fooddesc = [];
  $price = [];
  $id = [];

  while($row = mysqli_fetch_array($result))
  {
    if(!in_array ($row["catagory"], $catagory)){
    array_push($catagory, $row['catagory']);
    }

   //echo $row['id'];
  }

  

  foreach($catagory as $c){
    echo "
    <section id=\"$c\">
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-lg-8 mx-auto\">
            <h1>$c</h1><br>
          </div>
          ";
          $qz = "SELECT * FROM menu where catagory = \"$c\" and hide = 0";
          $result = mysqli_query($con,$qz);
        
          while($row = mysqli_fetch_array($result))
          {
            echo "
              <div class=\"col-lg-8 mx-auto\">
                <div class=\"card\">
                  <img src=\"", $row["image"] , "\" class=\"card-img-top\" alt=\"...\">
                  <div class=\"card-body\">
                    <h5 class=\"card-title\">", $row["title"], "</h5>
                    <p class=\"card-text\">", $row["fooddesc"],"</p>
                    <p class=\"btn btn-primary\">", $row["price"] ,"</p>
                  </div>
                </div>
              </div>";

                /*<img src=\"../Prototype/", $row["image"] , "\">
                <h2>", $row["title"], "</h2>
                <p class=\"lead\">", $row["price"] ,"</p>
                <ul>
                  <li>", $row["fooddesc"],"</li>
                </ul>
              </div>";*/
          }
          echo "
        </div>
      </div>
    </section>
    
    
    "; 
    } 
    

  mysqli_close($con);
  ?>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Menu Bro Ltd 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>


</body>

</html>

<?php 
// Create connection
$con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
//$company = $_SESSION['company'];
$qz = "UPDATE stats set today = today + 1 where company = \"$dircompany\"";
$result = mysqli_query($con,$qz);
mysqli_close($con);
date_default_timezone_set('GMT');
$time = ((string) (int) date("h")) . date("a");
$ampm = date("a");
echo $time;


// Create connection
$con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
//$company = $_SESSION['company'];
$qz = "UPDATE stats set $time = $time + 1 where company = \"$dircompany\"";
$result = mysqli_query($con,$qz);
mysqli_close($con);


// Create connection
$con=mysqli_connect("localhost","menubro","Menubro123","menubromain");
//$company = $_SESSION['company'];
$qz = "UPDATE stats set day1 = today where company = \"$dircompany\"";
$result = mysqli_query($con,$qz);
mysqli_close($con);

?>