<?php
$servername = "localhost";
$username = "fareegmh_tandy";
$password = "Jaan54321@";
$dbname = "fareegmh_tandy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>