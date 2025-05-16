<?php
require_once 'db_connection.php';
 if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//   header("Location: Packages.php");

//   die();
 }

 $name= $_POST['name'];
 $email= $_POST['email'];
//  $user_type= $_POST['user_type'];
$password= $_POST['password'];$t="Customer";
$b1=1999;
$b2=19;
$b3=19;
 $conn = DB_connection::getInstance()->getConnection();
 if($conn->connect_error){
     die('Connection Failed : '.$conn->connect_error);
 }

//  $result = $conn->query("SELECT * FROM User WHERE email = '$email'");
//  if ($result->num_rows > 0) {
// //   header("Location: /GoTravel/register.html");
//   die();
//  }

$stmt =$conn->prepare("insert into users (name,email,password,type,birth_year,birth_month,birth_day) values (?,?,?,?,?,?,?)");
$stmt->bind_param("ssssiii",$name,$email,$password,$t,$b1,$b2,$b3);
$stmt->execute();
die("registration Successfully...") ;
 $stmt->close();
 $conn->close();

 setcookie('signed_in', 'true', 0, '/');
//  switch ($user_type) {
//   case 'Customer': {
//    header('Location: /GoTravel/Packages.php');
//    setcookie('user_type', 'customer', 0, '/');
//   } break;
//   case 'Admin': {
//    header('Location: /GoTravel/AddPackage.php');
//    setcookie('user_type', 'admin', 0, '/');
//   } break;
 //}
?>