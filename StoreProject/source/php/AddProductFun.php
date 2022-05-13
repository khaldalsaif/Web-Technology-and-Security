<?php
    session_start();
    
    if (isset($_SESSION['adminEmail']) &&
        isset($_SESSION['adminId']) ) {
        
        require "db_conn.php";
          
        $image = $_FILES['productImage']['tmp_name'];
        $name = $_POST['ProductName'];
        $desc = $_POST['ProductDesc'];
        $price = $_POST['ProductPrice']; 
       
        if (isset($image) &&
            isset($name) &&
            isset($desc) &&
            isset($price) 
             )  {
                
                if (empty($image) ||
                    empty($name)  ||
                    empty($desc)  ||
                    empty($price) ) {
                    $fillMsg = "All the fields are required";
                    header("Location: AddProduct.php?error=$fillMsg");
                } else { # if all fields filled
                            $image=file_get_contents($image);
                            $fileName = basename($_FILES["productImage"]["name"]); 
                            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);                   
                            
                                // Allow certain file formats 
                                $allowTypes = array('jpg','png','jpeg','bmp'); 
                                if(in_array($fileType, $allowTypes)){ 
                                $sql = "INSERT INTO products  (Image, Product_Description, Product_ID,
                                        Product_Name, Product_Price) VALUES (?, ?, ?, ?, ?)"; 
                                $stmt = $connection->prepare($sql);
                                $stmt->bindValue(1,$image);
                                $stmt->bindValue(2,$desc);
                                $stmt->bindValue(3,"");
                                $stmt->bindValue(4,$name);
                                $stmt->bindValue(5,$price);
                                $stmt->execute(); 
                                    if($stmt){ 
                                        $successMsg = "Product Added successfully."; 
                                        header("Location: admin.php?success=$successMsg");
                                    }else{ # if some error happens during adding the product 
                                            $fillMsg = "Product failed to added, please try again.";
                                            header("Location: AddProduct.php?error=$fillMsg");
                                        }                     
                            }else{ // if file type not allowed
                                        $fillMsg = 'Sorry, only JPG, JPEG, PNG, and GIF files are allowed to upload.'; 
                                        header("Location: AddProduct.php?error=$fillMsg");
                                    }                   
                       }
        }
         else { # if some fields not filled
            $fillMsg = "Some fields are not filled, please try again.";
            header("Location: AddProduct.php?error=$fillMsg");
              }

    } else { # if the admin not login 
        $msg = "Please Login As An Admin";
        header("Location: LoginAdmin.php?error=$msg");
        exit; } 
?>