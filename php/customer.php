<?php
 require_once "user.php";

 class Customer extends User {
  public function redirect() {
   header("Location: /AwlaadMasood_Project/");
   setcookie('user_type', 'customer', 0, '/');
  }
 }
?>