<?php


require('db_conn.php');

$email=$_POST["email"];
$sanitizeMail = filter_var($email,FILTER_SANITIZE_EMAIL);

$name=$_POST["name"];
$sanitizename = filter_var($name,FILTER_SANITIZE_STRING);

$text= $_POST["text"];
$sanitizeText = filter_var($text,FILTER_SANITIZE_STRING);

if(isset($name,$email,$text))
{
    $sql = "INSERT into feedback (name,email,text,id) VALUES(?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(1,$sanitizename);
    $stmt->bindValue(2,$sanitizeMail);
    $stmt->bindValue(3,$sanitizeText);
    $stmt->bindValue(4,'');
    $res  = $stmt->execute();

}




if (!$res) {

    die("Couldn't enter data: ".$mysqli->error);

}


echo "<script>alert('Thank You For Contacting Us');
              window.location.replace('contact.php')
      </script> ";



?>