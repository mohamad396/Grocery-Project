<?php
 require_once "user.php";

 class Admin extends User {
  public function redirect() {
   // header('Location: /GoTravel/AddPackage.php');
   // setcookie('user_type', 'admin', 0, '/');
  }
 }
?>