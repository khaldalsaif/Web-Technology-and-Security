<?php
session_start();
if (isset($_SESSION['userEmail']) && 
    isset($_SESSION['userId']) )  {
        
        if(isset($_POST["order"]))
        {
            $total=0;
            require "db_conn.php";
            //return all the items for the customer 
            $sql = "SELECT * FROM cart WHERE customer_ID=?";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1,$_SESSION['userId']);
            $res = $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $items= $stmt ->fetchAll();
            } else {
                $items = 0;
                $fillMsg = "The cart Is Empty Please Add Some Products To Place An Order";
                header("Location: cart.php?error=$fillMsg");
                exit;
            }
            foreach ($items as $item) {
                // know each product id will call the product table to get the price
                $sql = "SELECT * FROM products WHERE Product_ID=?";
                $stmt = $connection->prepare($sql);
                $stmt->bindValue(1,$item['Product_ID']);
                $res = $stmt->execute();
            
                if ($stmt->rowCount() > 0) {
                    $products= $stmt ->fetchAll();
                } else {
                    $products = 0;
                }
                foreach ($products as $pro) {
                    //calculate the total
                    $x=$item['Quantity'] *  $pro['Product_Price'];
                    $total+=$x;
                }   
            }
            // return the payment informations from customer table 
            $sql = "SELECT Payment_Info FROM customer  WHERE Customer_ID=? ";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1,$_SESSION['userId']);
            $stmt->execute();

            while ($pay = $stmt->fetch())
            {
                // Creat Invoice and add it to invoice table
                $sql = "INSERT INTO invoice  (Customer_ID, Invoice_Date, Invoice_ID,
                                            Payment_Info, Total) VALUES (?, ?, ?, ?, ?)"; 
                                    $stmt = $connection->prepare($sql);
                                    $stmt->bindValue(1,$_SESSION['userId']);
                                    $stmt->bindValue(2,date("Y/m/d"));
                                    $stmt->bindValue(3," ");
                                    $stmt->bindValue(4,$pay['Payment_Info']); 
                                    $stmt->bindValue(5,$total);
                                $res = $stmt->execute(); 
            }
            if ($res) { //if the invoice crated  
                // after added the order to the invoice_table, delete the order from cart
                $sql = "DELETE FROM cart WHERE customer_ID=?";
                $stmt = $connection->prepare($sql);
                $stmt->bindValue(1,$_SESSION['userId']);
                $res  = $stmt->execute();
                 if ($res) {
                    # success message
                    $successMsg = "Order Has Been Placed Successfully.";
                    header("Location: ../../index.php?success=$successMsg");
                }else {
                    $fillMsg = "Order Has Not Been Placed Successfully Some Error Occurred!";
                    header("Location: cart.php?error=$fillMsg");
                exit;
                }

            }else {
                $fillMsg = "Order Has Not Been Placed Successfully Some Error Occurred!";
                header("Location: cart.php?error=$fillMsg");
               exit;
            }
        }
    }
        else {
            header("Location: Login.php");
            exit;
        }
        
?>