<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <!-- bootstrap 5 CDN -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- bootstrap JS bundle 5 CDN -->
    <link href="WelcomeStyle.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<link rel="stylesheet" href="WelcomeStyle.css">
<body>
<img src="Promotion.jpg" style="maxheight:100%">    
<?php include "pages.html" ?>
<?php if(isset($_GET['success'])) {?>
            <div class="alert alert-success" 
                 role="alert">
                <?=htmlspecialchars($_GET['success']); ?>
            </div>
            <?php } ?>

        <?php if(isset($_GET['error'])) {?>
            <div class="alert alert-danger" 
                 role="alert">
                <?=htmlspecialchars($_GET['error']); ?>
            </div>
        <?php } ?>  
    <form action="" method="POST" enctype="multipart/form-data">
            <?php
$conn = mysqli_connect('localhost','root','','shop db');//connecting to database
if(!$conn){
    echo 'connection error: ' . mysqli_connect_error();
}
$sql = 'SELECT * FROM products';//write the query

$result = mysqli_query($conn,$sql);//sending the query and save the result

While($row = mysqli_fetch_array($result))
{
    ?>
<div class="color">
        <?php echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="width: 200px; height: 200px;border-radius: 8px;">'; ?>

        <?php echo $row['Product_Name'].' '.$row['Product_Description'] ?>
         <button name="select" class="button" Id="<?php echo $row['Product_ID']; ?>" onclick="func()" value="<?php echo $row['Product_ID']; ?>"><span><?php echo $row['Product_Price'] ?> SAR Add to Cart</span</buuton>
    </div>
    </div>
    <?php

}
//if statement that check the database that if there is exist p_ID cancel the operation
//part 2 needs to secure this POST
if(isset($_POST['select'])){ // if any product selected 
    if(is_numeric($_POST['select'])){
    if (isset($_SESSION['userEmail']) && isset($_SESSION['userId']) ) { // user should login first 
  $sql2 = "SELECT * FROM cart where customer_ID=".$_SESSION['userId']." AND Product_ID=".$_POST['select'].""; //write the query
    $result2 = mysqli_query($conn,$sql2);
    if(!$row2 = mysqli_fetch_array($result2)){
    $item_ID[]=$_POST['select'];
    ?>
<?php

echo '<script type="text/javascript">

            window.onload = function () { alert("Item has been added successfully"); }

</script>';

?>
<?php
    $query = "INSERT INTO cart (customer_ID, Product_ID, Quantity,CartID)
    VALUES (".$_SESSION['userId'].", ".$_POST['select'].", '1','')";
    $new = mysqli_query($conn,$query);
}else{ // if the item already in the cart  
echo '<script type="text/javascript">
            window.onload = function () { alert("The Item is already in the cart, To add more quantities please go to cart"); }
      </script>';

    }
}else { // if the user trying to add product in the cart should be login first 
    echo '<script type="text/javascript">
    window.location.replace("source/php/Login.php?error= Please Login Before Adding Items To the Cart !!");
    </script>';
}
    }
else{
    echo '<script type="text/javascript">
    window.onload = function () { alert("Invalid input"); }
    window.location.replace("welcome.php");
    </script>';
  }}


?>    
</form>
</body>