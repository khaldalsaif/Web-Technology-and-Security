<?php
    session_start();
   
    if (isset($_SESSION['adminEmail']) &&
        isset($_SESSION['adminId']) ) {
        
        if (isset($_GET['id'])) { # if product selected 
            include "db_conn.php";
            $id = $_GET['id'];  
            $sql = "DELETE FROM products WHERE Product_ID=?";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1,$id);
            $res  = $stmt->execute();
            
            if ($res) {
                # success message
                $successMsg = "Product Deleted Successfully.";
                header("Location: admin.php?success=$successMsg");
            }else {
                $fillMsg = "Error Occurred!";
                header("Location: admin.php?error=$fillMsg");
               exit;
            }               
        }
        else { # if product not selected 
            header("Location: admin.php?error=not selected product");
        }
             
     
    } else { # if the admin not login 
        $msg = "Please Login As An Admin To Delete Products";
        header("Location: LoginAdmin.php?error=$msg");
        exit; } 
?>