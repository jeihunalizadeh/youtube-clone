<?php 
require_once("includes/header.php");
require_once("includes/classes/videoUploadData.php");
require_once("includes/classses/videoProcessor.php");
?>

<?php

if(!isset($POST["uploadButton"])) {
    echo "No file sent to page.";
    exit();
}
//1) create file upload data
$videoUploadData = new VideoUploadData(
                $_POST["fileInput"],
                $_POST["titleInput"],
                $_POST["descriptionInput"],
                $_POST["privacyInput"],
                $_POST["categoryInput"],
                "Have to change"
);
//2) process video data (upload)
$videoProcessor = new VideoProcessor($con);
$wasSuccesful = $videoProcessor->upload($videoUploadData);


//3) check if upload succesfull