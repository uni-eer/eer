<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eer";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
return "Server error";
}