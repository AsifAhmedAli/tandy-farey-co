<?php
include("db.php");
$username = $_POST['email'];
$password = $_POST['password'];
// echo "<script>alert('".$username.$password."');</script>";
$sql = "SELECT * FROM users where email1 = '$username' and pass1 = '$password' and role1 = 'agent' and status = 'active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  session_start();
  $_SESSION['employee_username1'] = $username;
  $_SESSION['firstname1'] = $row['firstname'];
  $_SESSION['role2'] = $row['role1'];
  // $_SESSION['employee_password'] = $password;
  // echo "<script>alert('".$username."');</script>";
  echo "<script>window.location.replace('index.php');</script>";
} else {
  echo "<script>
  Swal.fire(
  'Error',
  'Username or Password is wrong!',
  'error'
)</script>";
}
// echo "<script>alert('".$username.$password."')</script>";

?>