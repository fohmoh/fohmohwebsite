<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include_once('config.php');
$company = $_SESSION['company'];
$alert = $_SESSION['alert'];
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit();
}




if (isset($_POST["remove"])) {
  $eremove = clean($_POST["remove"]);


  $sql = "DELETE FROM menu WHERE id=$eremove";

  if ($connection->query($sql) === TRUE) {
    // echo "Record updated successfully";
  } else {
    $error = "Error updating record: " . $connection->error;
  }
}

if (isset($_POST["submit"]) && $_POST["submit"] == "Add") {
  // username and password sent from form 
  $error = false;
  $editcatagory = clean($_POST["cat"]);
  $edittitle = clean($_POST["addtitle"]);
  $editfooddesc = clean($_POST["addfooddesc"]);
  $editprice = clean($_POST["addprice"]);
  $editid = clean($_GET["id"]);
  $extra1 = clean($_POST["extra1"]);
  $extraP1 = clean($_POST["extraP1"]);
  $extra2 = clean($_POST["extra2"]);
  $extraP2 = clean($_POST["extraP2"]);
  $extra3 = clean($_POST["extra3"]);
  $extraP3 = clean($_POST["extraP3"]);
  $extra4 = clean($_POST["extra4"]);
  $extraP4 = clean($_POST["extraP4"]);
  $extra5 = clean($_POST["extra5"]);
  $extraP5 = clean($_POST["extraP5"]);


  // validation
  if ($editid == "")
    $error .= "Some error occured please try again<br>";

  if ($editcatagory == "")
    $error .= "Category Required<br>";

  if ($edittitle == "")
    $error .= "Name Required<br>";

  if ($editfooddesc == "")
    $error .= "Description Required<br>";


  if ($editprice != "") {
    if (!is_numeric($editprice))
      $error .= "Price should be Numeric<br>";
  } else
    $error .= "Price Required<br>";

  if ($error == false) {

    if (isset($_POST["vg"])) {
      $vg = 1;
    } else {
      $vg = 0;
    }
    if (isset($_POST["v"])) {
      $v = 1;
    } else {
      $v = 0;
    }
    if (isset($_POST["gf"])) {
      $gf = 1;
    } else {
      $gf = 0;
    }


    $sql = "UPDATE menu SET title=\"$edittitle\", fooddesc=\"$editfooddesc\", price=\"$editprice\", catagory=\"$editcatagory\", vegan=\"$vg\", vegetarian=\"$v\", gf=\"$gf\", extra1=\"$extra1\", extra2=\"$extra2\", extra3=\"$extra3\", extra4=\"$extra4\", extra5=\"$extra5\", extraP1=\"$extraP1\", extraP2=\"$extraP2\", extraP3=\"$extraP3\", extraP4=\"$extrap4\", extraP5=\"$extraP5\" WHERE id=$editid";
    if ($connection->query($sql) === TRUE) {
      // echo "Record updated successfully";
      $ok = true;
      header('Location: index.php');
    } else {
      $error = "Error updating record: " . $connection->error;
      $ok = true;
    }

    
    if ($alert != null) {
      echo "<div class=\"alert alert-success alert-dismissable\" id=\"flash-msg\">
            <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
            <h4><i class=\"icon fa fa-check\"></i>$alert!</h4>
            </div>";
      $alert = null;
    }
  }
}
$ok = false;
if (isset($_GET["id"])) {
  $id = clean($_GET["id"]);
  $sql = "SELECT * from menu where id=$id and company = \"$company\"";

  $result = mysqli_query($connection, $sql);


  while ($row = mysqli_fetch_array($result)) {
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
    $extra1 = $row["extra1"];
    $extraP1 = $row["extraP1"];
    $extra2 = $row["extra2"];
    $extraP2 = $row["extraP2"];
    $extra3 = $row["extra3"];
    $extraP3 = $row["extraP3"];
    $extra4 = $row["extra4"];
    $extraP4 = $row["extraP4"];
    $extra5 = $row["extra5"];
    $extraP5 = $row["extraP5"];

  }
}
if ($ok == true) {
  //
} else {
  header('Location: index.php');
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
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="30%" alt=""></a>
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
        <img src="img/logo.png" width="90%" alt="">
      </a>
      <ul class="list-unstyled  mt-md-5">
        <li class="mb-1">
          <a href="index.php" class="px-4 pl-5 btn py-2">Dashboard</a>
        </li>
        <li class="mb-1">
          <a href="#" class="px-4 pl-5 btn active py-2">Menu Builder</a>
        </li>
        <!--li class="mb-1">
            <a href="comingsoon.html" class="px-4 pl-5 btn py-2">Blogs & Articles</a>
          </li-->
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
          <div class="d-flex justify-content-center">
            <h5 class="m-0 fw-7 mb-4">Edit Item</h5>
          </div>
          <?php if (isset($error) && $error != false) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error; ?>
            </div>
          <?php } ?>
          <form action="<?php echo "\"menuupdate.php?id=$id\""; ?>" id="newForm" method="POST" data-toggle="validator">
            <label for="">Add Photo</label>
            <p>
              <a href=<?php $_SESSION['uploadid'] = $id;
                      echo "\"crop.php?$id\""; ?> class="btn btn-outline-warning item br-10 d-flex justify-content-center flex-column UPLD"><i class="fas fa-plus"></i></a>
              <!--input type="file" class="sr-only" id="imgInp"-->
            </p>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2">
                  <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-3">Name</p>
                  <input type="text" class="form-control py-0 border-0 bg-light fz-14" name="addtitle" value="<?php echo $title; ?>" required>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group py-2">
                  <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-4">Price</p>
                  <input type="number" class="form-control py-0 border-0 bg-light fz-14" placeholder="$" required name="addprice" value="<?php echo $price; ?>">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-12">
                <div class="py-2 form-group">
                  <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-4">Description</p>
                  <textarea cols="30" rows="3" class="form-control py-0 border-0 bg-light fz-14" required name="addfooddesc"><?php echo "$fooddesc"; ?></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-lg-7 mt-3">
                <h6>Extra <span class="small text-muted">Optional (Full price of item including extra)</span></h6>
                <div class="d-flex">
                  <div class="d-md-flex py-2">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Item</p>
                    <input type="text" name="extra1" value=<?php echo "\"$extra1\"" ?> placeholder="Extra Cheese" class="form-control py-0 border-0 bg-light fz-12">
                  </div>
                  <div class="d-md-flex py-2 pl-3">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Price</p>
                    <input type="text" name="extraP1" value=<?php echo "\"$extraP1\"" ?> class="form-control py-0 border-0 bg-light fz-12" placeholder="$23">
                  </div>
                </div>
                <div class="d-flex">
                  <div class="d-md-flex py-2">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Item</p>
                    <input type="text" name="extra2" value=<?php echo "\"$extra2\"" ?> placeholder="Without Octopus" class="form-control py-0 border-0 bg-light fz-12">
                  </div>
                  <div class="d-md-flex py-2 pl-3">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Price</p>
                    <input type="text" name="extraP2" value=<?php echo "\"$extraP2\"" ?> class="form-control py-0 border-0 bg-light fz-12" placeholder="$17">
                  </div>
                </div>
                <div class="d-flex">
                  <div class="d-md-flex py-2">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Item</p>
                    <input type="text" name="extra3" value=<?php echo "\"$extra3\"" ?> placeholder="With Coffee Beans" class="form-control py-0 border-0 bg-light fz-12">
                  </div>
                  <div class="d-md-flex py-2 pl-3">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Price</p>
                    <input type="text" name="extraP3" value=<?php echo "\"$extraP3\"" ?> class="form-control py-0 border-0 bg-light fz-12" placeholder="$20">
                  </div>
                </div>
                <div class="d-flex">
                  <div class="d-md-flex py-2">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Item</p>
                    <input type="text" name="extra4" value=<?php echo "\"$extra4\"" ?> placeholder="" class="form-control py-0 border-0 bg-light fz-12">
                  </div>
                  <div class="d-md-flex py-2 pl-3">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Price</p>
                    <input type="text" name="extraP4" value=<?php echo "\"$extraP4\"" ?> class="form-control py-0 border-0 bg-light fz-12" placeholder="$">
                  </div>
                </div>
                <div class="d-flex">
                  <div class="d-md-flex py-2">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Item</p>
                    <input type="text" name="extra5" value=<?php echo "\"$extra5\"" ?> placeholder="" class="form-control py-0 border-0 bg-light fz-12">
                  </div>
                  <div class="d-md-flex py-2 pl-3">
                    <p class="m-0 mb-1 mb-md-0 d-flex justify-content-center flex-column pr-2 small">Price</p>
                    <input type="text" name="extraP5" value=<?php echo "\"$extraP5\"" ?> class="form-control py-0 border-0 bg-light fz-12" placeholder="$">
                  </div>
                </div>
                <br><br>

                <h6>Category</h6>
                <ul class="list-inline list-unstyled">
                  <li class="list-inline-item">
                    <a href="newcatagory.php" class="btn btn-sm btn-outline-warning py-0">Edit Catagories</a>
                  </li>
                  <?php

                  $company = $_SESSION['company'];
                  $qz = "SELECT * FROM catagory WHERE company = \"$company\"";
                  $result = mysqli_query($connection, $qz);


                  while ($row = mysqli_fetch_array($result)) {
                    echo "<li class=\"list-inline-item\">";
                    echo "<a href=\"#\" class=\"CAT btn btn-sm btn-outline-warning OPT ";
                    if ($catagory == $row["catagory"]) {
                      echo "active";
                    }
                    echo " py-0\">", $row["catagory"], "</a>";
                    echo "<input ";
                    if ($catagory == $row["catagory"]) {
                      echo "checked=\"checked\"";
                    }
                    echo " name=\"cat\" type=\"radio\" class=\"sr-only\" value=\"", $row["catagory"], "\"></li>";
                  }



                  ?>
                </ul>

                <div class="help-block with-errors help-block2"></div>
                <h6>Dietary</h6>
                <ul class="list-inline list-unstyled">
                  <li class="list-inline-item">
                    <a href="#" class=<?php echo "\" CAT btn btn-sm btn-outline-warning OPTCH py-0 ";
                                      if ($vg == 1) {
                                        echo "active\"";
                                      } else {
                                        echo "\"";
                                      } ?>>Vegan</a>
                    <input name="vg" type="checkbox" class="sr-only" <?php if ($vg == 1) {
                                                                        echo "checked";
                                                                      } ?>>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class=<?php echo "\"CAT btn btn-sm btn-outline-warning OPTCH py-0 ";
                                      if ($v == 1) {
                                        echo "active\"";
                                      } else {
                                        echo "\"";
                                      } ?>>Vegeterian</a>
                    <input name="v" type="checkbox" class="sr-only" <?php if ($v == 1) {
                                                                      echo "checked";
                                                                    } ?>>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class=<?php echo "\"CAT btn btn-sm btn-outline-warning OPTCH py-0 ";
                                      if ($gf == 1) {
                                        echo "active\"";
                                      } else {
                                        echo "\"";
                                      } ?>>Gluten Free</a>
                    <input name="gf" type="checkbox" class="sr-only" <?php if ($gf == 1) {
                                                                        echo "checked";
                                                                      } ?>>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class=<?php echo "\"CAT btn btn-sm btn-outline-warning OPTCH py-0 ";
                                      if ($gf != 1 && $v != 1 && $vg != 1) {
                                        echo "active\"";
                                      } else {
                                        echo "\"";
                                      } ?>>N/A</a>
                    <input name="na" type="checkbox" class="sr-only" <?php if ($gf == 1) {
                                                                        echo "checked";
                                                                      } ?>>
                  </li>
                </ul>
                <div class="help-block with-errors help-block1"></div>
                
                <button style="float: left;" type="submit" name="submit" value="Add" class="btn btn-primary submitBtn">Edit Item</button>
          </form>
          <form action="<?php echo "menuupdate.php?id=$id"; ?>" id="newForm" method="POST" data-toggle="validator">
            <?php echo "<button style=\"margin-left: 15px;\" name=\"remove\" type=\"submit\" class=\"btn btn-danger waves-effect waves-light\" value=\"", $id, "\" onclick=\"return confirm('Are you sure?');\">Remove</button>"; ?>
        </div>
      </div>
      </form>
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
  <script src="https://1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>
  <!--script>
      $('.UPLD').on('click', function(event) {
        event.preventDefault();
        $(this).siblings('input').trigger('click');
      });
    </script>
    <script>
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
                  $('.UPLD').css('background-image', 'url(' + e.target.result + ')');
                  $('.UPLD').children('i.fas').hide('fast');
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      
      $("#imgInp").change(function(){
          readURL(this);
      });
    </script-->

  <script>
    // A $( document ).ready() block.
    $(document).ready(function() {
      <?php if (isset($image)) {
        echo "
        $('.UPLD').css('background-image', 'url($image)');
        $('.UPLD').children('i.fas').hide('fast');
        ";
      } ?>
    });
  </script>
  <script>
    $('.OPT').on('click', function(event) {
      event.preventDefault();
      var x = $(this);
      if (x.hasClass("CAT")) {
        console.log('if');
        $('.OPT.CAT').removeClass('active');
        x.addClass('active');
      } else {
        console.log('else');
        x.toggleClass('active');
      }
      x.siblings('input').trigger('click');

    });
    $('.OPTCH').on('click', function(event) {
      event.preventDefault();
      $(this).siblings('input').trigger('click');
      $(this).toggleClass('active');
    });


    $(document).ready(function() {
      var submitBtn = $('.submitBtn');

      submitBtn.click(function(e) {
        $(".help-block2").html("");
        $(".help-block1").html("");
        var myForm = $("#newForm");
        myForm.validator();
        // var hasErrors = myForm.validator('validate').has('.has-error:visible').length;
        myForm.validator('validate');
        var isValid = true;
        if ($('input[name="cat"]:checked').length == 0) {
          isValid = false;
          $(".help-block2").html("<ul class=\"list-unstyled\"><li>Select a Category.</li></ul>");
        }

        if ($('input[name="vg"]:checked').length == 0 && $('input[name="v"]:checked').length == 0 && $('input[name="gf"]:checked').length == 0 && $('input[name="na"]:checked').length == 0) {
          isValid = false;
          $(".help-block1").html("<ul class=\"list-unstyled\"><li>Select a Dietary.</li></ul>");


        }
        if (!isValid)
          return false;


      });
    });
  </script>
</body>

</html>