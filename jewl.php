<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$dbname="coaching";
$conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) 
{
        die("Connection failed: " . mysqli_connect_error());
}
error_reporting(0);
?>