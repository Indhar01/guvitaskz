<?php

// Developement Environment
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "guvi";

// Connection credentials
$servername = "remotemysql.com";
$username = "BYDnDVpF3b";
$password = "lnpBzqXxJq";
$dbname = "BYDnDVpF3b";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

?>