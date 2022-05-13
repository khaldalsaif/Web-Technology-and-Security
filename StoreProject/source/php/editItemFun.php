<?php
    session_start();
    
    if (isset($_SESSION['adminEmail']) &&
        isset($_SESSION['adminId']) ) {
        
        require "db_conn.php";
          
        $image = $_FILES['productImage']['tmp_name'];
        $name = $_POST['ProductName'];
        $desc = $_POST['ProductDesc'];
        $price = $_POST['ProductPrice'];    
        $id = $_POST['ID'];    
        if (isset($image) &&
            isset($name) &&
            isset($desc) &&
            isset($price) )  {
                
                if (empty($image) ||
                    empty($name)  ||
                    empty($desc)  ||
                    empty($price) ) {
                    $fillMsg = "All the fields are required";
                    header("Location: editItem.php?error=$fillMsg");
                } else { # if all fields not empty
                            $image=file_get_contents($image);
                            $fileName = basename($_FILES["productImage"]["name"]); 
                            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);                   
                            
                                // Allow certain file formats 
                                $allowTypes = array('jpg','png','jpeg','gif'); 
                                if(in_array($fileType, $allowTypes)){ 
                                $sql = "UPDATE products SET Image=?, Product_Description=?, Product_Name=?,
                                         Product_Price=? WHERE Product_ID=?"; 
                                $stmt = $connection->prepare($sql);
                                $stmt->bindValue(1,$image);
                                $stmt->bindValue(2,$desc);
                                $stmt->bindValue(3,$name);
                                $stmt->bindValue(4,$price);
                                $stmt->bindValue(5,$id);
                                $stmt->execute(); 
                                    if($stmt){ 
                                        $successMsg = "Product Updated successfully."; 
                                        header("Location: admin.php?success=$successMsg");
                                    }else{ # if some error happens during updateing the product 
                                            $fillMsg = "Product failed to Updated, please try again.";
                                            header("Location: editItem.php?error=$fillMsg");
                                        }                     
                            }else{ // if file type not allowed
                                        $fillMsg = 'Sorry, only JPG, JPEG, PNG, and GIF files are allowed to upload.'; 
                                        header("Location: editItem.php?error=$fillMsg");
                                    }                   
                       }
        }
         else { # if some fields not filled
            $fillMsg = "Some fields not filled, please try again.";
            header("Location: editItem.php?error=$fillMsg");
              }

    } else { # if the admin not login 
        $msg = "Please Login As An Admin To Update Products";
        header("Location: LoginAdmin.php?error=$msg");
        exit; } 
?>