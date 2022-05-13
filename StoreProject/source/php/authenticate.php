<?php 
session_start();
try
{

if(isset($_POST['email']) && isset($_POST['pass']) &&(!empty($_POST['pass'])&&!empty($_POST['email'])))
{
  include "vald.php";
  //Get data from the request
  
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    
  require "db_conn.php";
    
    $text = "Email";
    $loc = "login.php";
    $ms = "error";
    is_empty($email,$text,$loc,$ms, "");

    $text = "Password";
    $loc = "login.php";
    $ms = "error";
    is_empty($pass,$text,$loc,$ms, "");

$sql = "SELECT * FROM customer WHERE email=?";
$stmt = $connection->prepare($sql);
$stmt->bindValue(1,$email);
$stmt->execute();
$row=$stmt->fetch();


if(($email===$row["Email"]) && (password_verify($pass, $row['Password']))) 
{
$_SESSION['userId'] = $row["Customer_ID"];
$_SESSION['userEmail'] = $row["Email"];
header("Location: ../../index.php");;

} 
else {
$msg = "incorrect user name or password";
    header("Location: Login.php?error=$msg");
   exit();
      }

}}

catch(Exception $e)
{
  
  header("Location: Login.php");
}


?>