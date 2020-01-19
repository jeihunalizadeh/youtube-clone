<?php
ob_start(); //output buffering

date_default_timezone_set("Asia/Baku");

try {
    $con = new PDO("mysql:dbname=youtube-clone;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}





?>