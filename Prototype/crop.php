<?php
session_start();
$uploadid = $_SESSION['uploadid'];
$imagedata = $_POST['imgtemp'];

if(isset($imagedata)){
$data = $imagedata;


		// Create connection
        $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        

        $sql = "UPDATE menu
                SET image = \"$data\"
                WHERE id=$uploadid";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('Location: edit-menu.php	');
        } else {
            echo "Error updating record: " .	 $conn->error;
        }

        $conn->close();
	}

//file_put_contents('uploads/image.png', $data);

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
  height: 600px;
  width: 600px;
  background-color: #ffffff;
  cursor: default;
  border: 1px solid black;
}
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.css" rel="stylesheet">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.js" ></script>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<p class="btn-group">
<!-- Below are a series of inputs which allow file selection and interaction with the cropper api -->
		<input class="btn btn-default" type="file" id="fileInput" accept="image/*" />
		<input class="btn btn-success" type="button" id="btnCrop" value="Ok" />
		<input class="btn btn-warning" type="button" id="btnRestore" value="Center" />
</p>
<div>
  <canvas id="canvas">
    Your browser does not support the HTML5 canvas element.
  </canvas>
</div>		

<div id="result"></div>

<br />
<br />
<hr />
		
</body>
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
	               aspectRatio: 1
	             });
	             $('#btnCrop').click(function() {
	                // Get a string base 64 data url
	                var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png"); 
					$result.append( $('<img>').attr('src', croppedImageDataURL) );
					// Creating a cookie after the document is ready 
					//$(document).ready(function () { 
					//	createCookie("imgtemp", croppedImageDataURL, 3);
					//}); 
					function autoUpload(it) {
						var form = document.createElement("form");
						var element1 = document.createElement("input"); 

						form.method = "POST";
						form.action = "crop.php";   

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
</html>