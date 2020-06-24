<?php

class Users {

  private $conn;
	private $tableUsers = 'vs_users';
  public $userId;
  public $firstname;
  public $surname;
  public $role;
  public $email;
  public $password;

  public function __construct($db){
		$this->conn = $db;
	}

  public function registerUser(){
    $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

    $query = 'INSERT INTO '.$this->tableUsers.' (firstname, surname, email, password) VALUES (:firstname, :surname, :email, :hashedPassword)';
    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(':firstname', $this->firstname,PDO::PARAM_STR);
    $stmt->bindValue(':surname', $this->surname,PDO::PARAM_STR);
    $stmt->bindValue(':email', $this->email,PDO::PARAM_STR);
    $stmt->bindValue(':hashedPassword', $hashedPassword,PDO::PARAM_STR);

    $stmt->execute();
    $count = $stmt->rowCount();

    if($count > 0) {
      $result['result'] = "true";
      return $result;
    } else {
      $error = $stmt->errorInfo();
      $result['result'] = 'failed';
      $result['db_error'] = $error; //not displaying errors on production site
      return $result;
    }
  }

  public function loginUser(){

    $query = "SELECT * FROM ".$this->tableUsers." WHERE email = :email ORDER BY userId DESC LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    // if email account exists
    if($count > 0) {
        $user = $stmt->fetch();
        if(password_verify($this->password, $user['password'])){

            $_SESSION['user_id'] = $user['userId'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['surname']= $user['surname'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['authenticated'] = "authenticated";

            $result['result'] = "true";
            $result['message'] = "Successfully logged in!";
            return $result;
        // if email doesn't exist show error
        } else {
            $result['result'] = "false";
            return $result;
        }
    } else {
      $error = $stmt->errorInfo();
      $result['result'] = 'failed';
      $result['db_errror'] = $error[2];
      return $result;
    }
  }

  public function logoutUser(){

    session_unset();
    session_destroy();

  }

}
