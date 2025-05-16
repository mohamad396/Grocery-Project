<?php
require_once 'db_connection.php';
 if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//   header("Location: Packages.php");

//   die();
 }

 $email= $_POST['email'];
 $password= $_POST['password'];

 $conn = DB_connection::getInstance()->getConnection();
 if($conn->connect_error){
     die('Connection Failed : '.$conn->connect_error);
 }

 $result = $conn->query("SELECT type FROM users WHERE email = '$email' AND password = '$password'");
 if ($result->num_rows == 0) {
  header("Location: /AwlaadMasood_Project/HomePage.html");
  die();
 }

 $conn->close();
 setcookie('signed_in', 'true', 0, '/');

 $row = $result->fetch_assoc();
 switch ($row['type']) {
  case 'Customer': {
  header("Location: /AwlaadMasood_Project/HomePage.html");
   setcookie('user_type', 'customer', 0, '/');
  } break;
//   case 'Admin': {
//    header('Location: /GoTravel/AddPackage.php');
//    setcookie('user_type', 'admin', 0, '/');
//   } break;
 }
?>