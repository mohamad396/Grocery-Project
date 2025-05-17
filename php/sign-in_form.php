<?php
 require_once 'db_connection.php';
 require_once 'login_strategy.php';
 require_once 'customer.php';
 require_once 'admin.php';
 
 if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//   header("Location: Packages.php");

//   die();
 }

 $email = $_POST['email'];
 $password = $_POST['password'];
 $user = null;

 $conn = DB_connection::getInstance()->getConnection();
 if($conn->connect_error){
     die("Connection Failed: {$conn->connect_error}");
 }

 $result = $conn->query("SELECT type FROM users WHERE email = '$email' AND password = '$password'");
 if ($result->num_rows == 0) {
  header("Location: /AwlaadMasood_Project/");
  die('User does not exist');
 }

 $row = $result->fetch_assoc();
 switch ($row['type']) {
  case 'Customer': {
   $user = new Customer("", $email, $password, 0, 0, 0);
  } break;
  case 'Admin': {
   $user = new Admin("", $email, $password, 0, 0, 0);
  } break;
 }

 $user->setAccountStrategy(new Login_Strategy($user));
 $user->Login();
?>