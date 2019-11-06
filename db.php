<?php

// $mysqli = new mysqli('localhost', 'id10676327_aa111', 'ANTI-Bribery', 'id10676327_anti');

// $mysqli->set_charset("utf8");

// $link = mysqli_connect('localhost', 'id10676327_aa111', 'ANTI-Bribery', 'id10676327_anti');

$mysqli = new mysqli('127.0.0.1', 'root', '50718888', 'vote');

$mysqli->set_charset("utf8");

$link = mysqli_connect('127.0.0.1', 'root', '50718888', 'vote');

// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    // The connection failed. What do you want to do? 
    // You could contact yourself (email?), log the error, show a nice page, etc.
    // You do not want to reveal sensitive information

    // Let's try this:
    echo "Sorry, 資料庫連接有錯誤";

    // Something you should not do on a public site, but this example will show you
    // anyways, is print out MySQL error related information -- you might log this
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    // You might want to show them something nice, but we will simply exit
    exit;
}
?>