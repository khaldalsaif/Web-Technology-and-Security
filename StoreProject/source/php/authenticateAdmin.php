<?php
try
{
session_start();
if(isset($_POST['email']) && isset($_POST['pass']) &&!empty($_POST['pass'] && !empty($_POST['email'])))
{
  require "db_conn.php";
  include "vald.php";
  /**Get data from the request*/
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $text = "Email";
  $loc = "LoginAdmin.php";
  $ms = "error";
  is_empty($email,$text,$loc,$ms, "");

  $$text = "Password";
 
  is_empty($pass,$text,$loc,$ms, "");

  #search for the email 
  $sql = "SELECT * FROM admin
          WHERE email=?";

  $stmt = $connection->prepare($sql);
  $stmt->execute([$email]);

  $user = $stmt->fetch();

  $userId = $user['ID'];
  $userEmail = $user['email'];
  $userPass = $user['password'];
  // Check the Password and the Email

  if ($email === $userEmail && password_verify($pass, $userPass) && !is_null($userEmail) && !is_null($userPass) ) {
    $_SESSION['adminId'] = $userId;
    $_SESSION['adminEmail'] = $userEmail;
    header("Location: admin.php");
    }else { // if the password or Email incorrect
    	        $msg = "Incorrect Email or Password";
    	        header("Location: LoginAdmin.php?error=$msg");
    		  }

}else {
	$msg = "All fields are required";
	header("Location: LoginAdmin.php?error=$msg");
}
}

catch(Exception $e)
{
  $msg = "incorrect user name or password";
  header("Location: LoginAdmin.php?error=$msg");
}


?>
