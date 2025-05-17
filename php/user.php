<?php
 class User {
  public $userID;
  public $name, $email, $password;
  public $year, $month, $day;
  private $accountStrategy;

  public function __construct($name, $email, $password, $year, $month, $day) {
   $this->name = $name;
   $this->email = $email;
   $this->password =  $password;
   $this->year = $year;
   $this->month = $month;
   $this->day = $day;
  }

  public function setAccountStrategy($newStrategy) {
   $this->accountStrategy = $newStrategy;
  }

  public function Login() {
   $this->accountStrategy->execute();
  }

  public function redirect() {
   
  }
 }
?>