<?php 
    //Start Session
    session_start();

    // //$host = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "qwertyuio0@";
    // $dbname = "login";
    //Change the values from here

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/food-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'qwertyuio0@');
    define('DB_NAME', 'food_order');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //SElecting Database


?>