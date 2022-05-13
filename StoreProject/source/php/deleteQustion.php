<?php
    session_start();
   
    if (isset($_SESSION['adminEmail']) &&
        isset($_SESSION['adminId']) ) {
        
        if (isset($_GET['id'])) { # if product selected 
            include "db_conn.php";
            $id = $_GET['id'];  
            $sql = "DELETE FROM feedback WHERE id=?";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1,$id);
            $res  = $stmt->execute();
            
            if ($res) {
                # success message
                $successMsg = "Qustion Deleted Successfully.";
                header("Location: customerQustions.php?success=$successMsg");
            }else {
                $fillMsg = "Error Occurred!";
                header("Location: customerQustions.php?error=$fillMsg");
               exit;
            }               
        }
        else { # if Qustion not selected 
            header("Location: customerQustions.php?error=not selected Qustion");
        }
             
     
    } else { # if the admin not login 
        $msg = "Please Login As An Admin To Delete Questions";
        header("Location: LoginAdmin.php?error=$msg");
        exit; } 
?>