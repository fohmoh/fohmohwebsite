<?php
session_start();
$uploadid = $_SESSION['uploadid'];
$imagedata = $_POST['imgtemp'];
$alert = $_SESSION['alert'];

if(isset($imagedata)){
    $data = $imagedata;
    $_SESSION["addimage"] = $data;
    header('Location: menubuilder.php');
}
if($alert != null){
	echo "<div class=\"alert alert-success alert-dismissable\" id=\"flash-msg\">
		  <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
		  <h4><i class=\"icon fa fa-check\"></i>$alert!</h4>
		  </div>"; $alert = null;}
?>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156346281-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156346281-1');
</script>


<style>
/* Limit image width to avoid overflow the container */
img {
  max-width: 100%; /* This rule is very important, please do not ignore this! */
}

#canvas {
  height: 300px;
  width: 90%;
  background-color: #ffffff;
  cursor: default;
  border: 1px solid black;
}
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.css" rel="stylesheet">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.js" ></script>

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
          <h1 class="fw-6 mb-4 pl-2">Select the file you would like to upload</h1>
          <div class="box br-10 bg-white p-xl-3 px-xl-5 px-2 py-2 shadow shadow-sm mb-4">
			<div>
			<canvas id="canvas">
				Your browser does not support the HTML5 canvas element.
			</canvas>
			</div>		

			<div id="result"></div>
			<div>
				<!-- Below are a series of inputs which allow file selection and interaction with the cropper api -->
				<input class="btn btn-lg btn-block" type="file" id="fileInput" accept="image/*" />
				<a id="reset" class="btn btn-success btn-lg btn-block" href="crop.php" />Reset</a>
				<input class="btn btn-success btn-lg btn-block" type="button" id="btnCrop" value="Update" />
				<!--input class="btn btn-warning" type="button" id="btnRestore" value="Restore" /-->
			</div>

<br />
<br />
<hr />
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
	<footer>
<script>
	
	var canvas  = $("#canvas"),
	    context = canvas.get(0).getContext("2d"),
	    $result = $('#result');

	$('#fileInput').on( 'change', function(){
	    if (this.files && this.files[0]) {
	      if ( this.files[0].type.match(/^image\//) ) {
	        var reader = new FileReader();
	        reader.onload = function(evt) {
	           var img = new Image();
	           img.onload = function() {
	             context.canvas.height = img.height;
	             context.canvas.width  = img.width;
	             context.drawImage(img, 0, 0);
	             var cropper = canvas.cropper({
					aspectRatio: 1,
					viewMode: 1,
					cropBoxResizable: false,
					dragMode: 'move',
					zoomable: true,
					zoomOnTouch: false,
					toggleDragModeOnDblclick: false,
					cropBoxMovable: false,
					autoCropArea: 1,
					guides: false,
					checkOrientation: 1,
					background: false
	             });
	             $('#btnCrop').click(function() {
	                // Get a string base 64 data url
	                var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/jpeg", 0.7); 
					$result.append( $('<img>').attr('src', croppedImageDataURL) );
					// Creating a cookie after the document is ready 
					//$(document).ready(function () { 
					//	createCookie("imgtemp", croppedImageDataURL, 3);
					//}); 
					function autoUpload(it) {
						var form = document.createElement("form");
						var element1 = document.createElement("input"); 

						form.method = "POST";
						form.action = "addcrop.php";   

						element1.value=it;
						element1.name="imgtemp";
						form.appendChild(element1);  


						document.body.appendChild(form);

						form.submit();
					}

					autoUpload(croppedImageDataURL);

					//window.location.href = "edit-menu.php";
					
	             });
	             $('#btnRestore').click(function() {
	               canvas.cropper('reset');
	               $result.empty();
	             });
	           };
	           img.src = evt.target.result;
					};
	        reader.readAsDataURL(this.files[0]);
	      }
	      else {
	        alert("Invalid file type! Please select an image file.");
	      }
	    }
	    else {
	      alert('No file(s) selected.');
	    }
	});

</script>

</footer>

</body>
</html>