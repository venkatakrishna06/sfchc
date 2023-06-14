<?php

if(!isset($_SESSION)) 
{ 
  session_start(); 
}
//Enter the following details
$hostname = "localhost";
$username = "root";
$password = "";
$dbname="project";

$conn = new mysqli($hostname, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";

?>