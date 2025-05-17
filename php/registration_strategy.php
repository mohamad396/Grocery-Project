<?php
 require_once "account_strategy.php";
 require_once "db_connection.php";

 class Registration_Strategy implements Account_Strategy {
  private $user;

  public function __construct($user) {
   $this->user = $user;
  }
  
  public function execute() {
   $user = $this->user;
   $name = $user->name;
   $email = $user->email;
   $password = $user->password;
   $year = $user->year;
   $month = $user->month;
   $day = $user->day;
   
   $conn = DB_connection::getInstance()->getConnection();
   if ($conn->connect_error) {
    die("Connection Failed: {$conn->connect_error}");
   }
  
   $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
   if ($result->num_rows > 0) {
    header("Location: /AwlaadMasood_Project");
    die("There is already an account with that email.");
   }

   $conn->query("
    INSERT INTO users (name, email, password, type, birth_year, birth_month, birth_day)
    VALUES ('$name', '$email', '$password', 'Customer', $year, $month, $day)
   ");

   setcookie('user_id', $conn->insert_id, 0, '/');
   $conn->close();
  
   setcookie('signed_in', 'true', 0, '/');
   $user->redirect();
  }
 }
?>