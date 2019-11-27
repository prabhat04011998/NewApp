<?php
ob_start();
session_start();
// getting req. variables for connection string from env vars
$localhost = 'localhost';
$DBNAME = 'shri';
$USERNAME = 'phpmyadmin';
$PASSWORD = 'prabhat';
$DBPORT='3306';

$apiKey="";

$db=mysqli_connect($localhost,$USERNAME,$PASSWORD,$DBNAME);
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

