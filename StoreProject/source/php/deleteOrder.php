<?php
    session_start();
   
    if (isset($_SESSION['adminEmail']) &&
        isset($_SESSION['adminId']) ) {
        
        if (isset($_GET['id'])) { # if product selected 
            include "db_conn.php";
            $id = $_GET['id'];  
            $sql = "DELETE FROM invoice WHERE Invoice_ID=?";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1,$id);
            $res  = $stmt->execute();
            
            if ($res) {
                # success message
                $successMsg = "Order Deleted Successfully.";
                header("Location: Invoice.php?success=$successMsg");
            }else {
                $fillMsg = "Error Occurred!";
                header("Location: Invoice.php?error=$fillMsg");
               exit;
            }               
        }
        else { # if order not selected 
            header("Location: admin.php?error=not selected order");
        }
             
     
    } else { # if the admin not login 
        $msg = "Please Login As An Admin To Delete Orders";
        header("Location: LoginAdmin.php?error=$msg");
        exit; } 
?>