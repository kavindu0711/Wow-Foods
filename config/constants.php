<?php

//Start Session
session_start();
define('SITEURL','http://localhost/Wow-Foods/');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Wow-Foods";


    //3. Executing Query and Saving Data into Database
    $conn = mysqli_connect($servername,$username,$password) or die(mysqli_error());
    $db_select = mysqli_select_db($conn , $dbname ) or die(mysqli_error());

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>