<?php
session_start();

$file = $_FILES['croppedImage'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$tid = $_POST["id"];

$after = $_SESSION["lastpage"];
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $x = 1;

    while (file_exists($target_file)){
        $extension=end(explode(".", $target_file));
        $newfilename= $target_dir . strval($x) .".".$extension;
        echo $newfilename;

        if(file_exists($newfilename)){
            $newfilename= $target_dir . strval($x) .".".$extension;
            $x += 1;
        }
        else{
            $target_file = $newfilename;
            $uploadOk = 1;
        }
    }

    
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file $target_file has been uploaded.";



        // Create connection
        $conn=mysqli_connect("localhost","menubro","Menubro123","menubromain");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        

        $sql = "UPDATE menu
                SET image = \"$target_file\"
                WHERE id=$tid";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();



    } else {
        echo "Sorry, there was an error uploading your file.";
        print_r(error_get_last());
    }
}
?>