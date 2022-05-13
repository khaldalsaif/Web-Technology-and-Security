<?php
        require "db_conn.php";

        $sql = "SELECT MAX(Customer_ID) FROM customer";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $max=$stmt->fetch();
        foreach ($max as $id){
            $id = $id + 1;
        }
        $id = $id + 1;

        $sql = "INSERT INTO customer (Customer_ID, Password, Full_name, Email, Phone, Gender, Payment_Info, Street, City, Country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        if(isset($_POST["submitted"])){
        // require "db_conn.php";
        //$password = $_POST["pass"];
        if (empty($_POST["pass"])    || empty($_POST["fullName"]) ||
            empty($_POST["tel"])     || empty($_POST["gender"])   ||
            empty($_POST["payment"]) || empty($_POST["city"])     ||
            empty($_POST["country"]) || empty($_POST["city"])) 
            {
                $er="All fields are required";
                header("Location: signup.php?error=$er");
                exit;
            }

       
        $password = password_hash($_POST["pass"],PASSWORD_DEFAULT);
        
        $fullName = filter_var($_POST["fullName"], FILTER_SANITIZE_STRING);
      
        $email = $_POST["email"];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)==0)
        {
            $er="Enter a valid email ";
            header("Location: signup.php?error=$er");
            exit();

        }
    
        $phoneNumber =$_POST["tel"];
        $validatednum= (int)$_POST["tel"];

     
        if (($phoneNumber!=$validatednum))
        {
            $er="Enter a valid phone number";
            header("Location: signup.php?error=$er");
            exit();

        }
        
        $gender = $_POST["gender"];
        if(($gender=="male"||$gender=='female')==0)
        {
            $er="Enter a valid gender";
            header("Location: signup.php?error=$er");
            exit();
        }



        $cardNumber = $_POST["payment"];
        $validatedcard= (int)$_POST["payment"];
        if (($cardNumber!=$validatedcard))
        {
            $er="Enter a valid card number";
            header("Location: signup.php?error=$er");
            exit();

        }
        
        

        $street = $_POST["street"];

        if(!ctype_alpha($street))
        {
            $er="Enter a valid street";
            header("Location: signup.php?error=$er");
            exit(); 
        }


        $city = $_POST["city"];
        if(!ctype_alpha($city))
        {
            $er="Enter a valid city";
            header("Location: signup.php?error=$er");
            exit(); 
        }
        $country = $_POST["country"];
        $country = filter_var($country, FILTER_SANITIZE_STRING);
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->bindValue(2,$password);
        $stmt->bindValue(3,$fullName);
        $stmt->bindValue(4,$email);
        $stmt->bindValue(5,$phoneNumber);
        $stmt->bindValue(6,$gender);
        $stmt->bindValue(7,$cardNumber);
        $stmt->bindValue(8,$street);
        $stmt->bindValue(9,$city);
        $stmt->bindValue(10,$country);
        // $res = $stmt->execute();
        // if($res) {
        //     //echo "Good";
        //     $successMsg = "Account Created successfully."; 
        //     header("Location: Login.php?success=$successMsg");
            
        //     } else {
        //         //echo "Bad";
        //          #echo '<script>alert("Email already exists.")</script>';
        //          $fillMsg = 'Some error occured!!'; 
        //          header("Location: signup.php?error=fillMsg");
        //          exit();
        //     }
        try {
        $stmt->execute();
        $successMsg = "Account Created successfully."; 
        header("Location: Login.php?success=$successMsg");
        exit();
        } catch(Exception $e) {
            $fillMsg = 'Email already exists!!'; 
        header("Location: signup.php?error=$fillMsg");
        }
    }
    ?>