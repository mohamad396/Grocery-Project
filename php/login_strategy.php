<?php
 require_once "account_strategy.php";
 require_once "db_connection.php";

 class Login_Strategy implements Account_Strategy {
  private $user;

  public function __construct($user) {
   $this->user = $user;
  }
  
  public function execute() {
   $user = $this->user;

   $email = $user->email;
   $password = $user->password;
  
   $conn = DB_connection::getInstance()->getConnection();
   if($conn->connect_error){
    die("Connection Failed: {$conn->connect_error}");
   }
  
   $result = $conn->query("SELECT id, type FROM users WHERE email = '$email' AND password = '$password'");
   if ($result->num_rows == 0) {
       die("$email $password");
    header("Location: /AwlaadMasood_Project/");
   }
   
   $row = $result->fetch_assoc();
   setcookie('signed_in', 'true', 0, '/');
   setcookie('user_id', $row['id'], 0, '/');
   setcookie('user_type', $row['type'], 0, '/');
   $user->userID = $row['id'];
   $conn->close();
  
   $user->redirect();
  }
 }
?>