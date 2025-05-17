<?php
require_once 'db_connection.php';
require_once 'customer.php';
require_once 'registration_strategy.php';
 if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//   header("Location: Packages.php");

//   die();
 }

 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $year = 1999;
 $month = 19;
 $day = 19;
 
 $user = new Customer($name, $email, $password, $year, $month, $day);
 $user->setAccountStrategy(new Registration_Strategy($user));
 $user->Login()
?>