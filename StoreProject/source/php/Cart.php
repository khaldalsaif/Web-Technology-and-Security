<?php
try
{
session_start();

if (isset($_SESSION['userEmail']) && isset($_SESSION['userId']) ) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart UI</title>
	<link rel="stylesheet" type="text/css" href="../css/CartStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">

    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap JS bundle 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>

<div class="CartContainer">
   	   <div class="Header">
   	   	<h3 class="Heading">Here's your Shopping Cart</h3>

   	   </div>
		  <?php if(isset($_GET['success'])) {?>
            <div class="alert alert-success" 
                 role="alert">
                <?=filter_var($_GET['success'],FILTER_SANITIZE_STRING); ?>
            </div>
            <?php } ?>

        <?php if(isset($_GET['error'])) {?>
            <div class="alert alert-danger" 
                 role="alert">
                <?=filter_var($_GET['error'],FILTER_SANITIZE_STRING); ?>
            </div>
        <?php } ?>
<?php
// if the user update the Quantity 
if(isset($_POST["Update"]))
{
	$id = $_POST["Update"];
	$qq = $_POST['qunt']; 
	require "db_conn.php";
	$sql = "UPDATE cart SET Quantity=? WHERE Product_ID=?";
	$stmt = $connection->prepare($sql);
	$stmt->bindValue(1,$qq);
	$stmt->bindValue(2,$id);
	$res  = $stmt->execute();
	if ($res) {
		# success message
		$successMsg = "Product Quantity Updated Successfully.";
		header("Location: Cart.php?success=$successMsg");
	}else {
		$fillMsg = "Product Quantity can not be Updated Error Occurred!";
		header("Location: Cart.php?error=$fillMsg");
	   exit;
	}

}
// if the user click remove 
if(isset($_POST["Deleted"]))
{
require "db_conn.php";
$deleted= $_POST["Deleted"];
$DeleteQ= "DELETE FROM cart WHERE Product_ID =?;";
$stmt = $connection->prepare($DeleteQ);
$stmt->bindValue(1,$deleted);
$stmt->execute();
}


require "db_conn.php";

$sql = "SELECT * FROM cart where customer_ID=?";
$stmt = $connection->prepare($sql);
$stmt->bindValue(1,$_SESSION['userId']);
$stmt->execute();
if ($stmt->rowCount() > 0) {
$Array=[];
while($CartData=$stmt->fetch())
{
	
		$Products=$CartData['Product_ID'];
		$Array[]=$Products;
		$q=$CartData['Quantity'];
		$qun[]=$q; 
	
	
}	


$counter=0;
foreach($Array as $product)
{

$Psql = "SELECT * FROM products WHERE Product_ID=?";
$stmt = $connection->prepare($Psql);
$stmt->bindValue(1,$product);
$stmt->execute();

while($row=$stmt->fetch())
	{
	
$Base64=base64_encode( $row['Image'] );

 
?>

   	   <div class="Cart-Items">
   	   	  <div class="image-box">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'"style: height="120px;"/>'; ?>        
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h3 class=""  ><?php echo $row["Product_Name"];?> </h3> 
   	   	  	<p class="" style="color:grey;"><?php echo $row["Product_Description"];?></p>
   	   	  	<img src="../images/limted.png" style={{ height="15px" }}/>
   	   	  </div>


				
				<div class="counter">
			<form method="POST" action="Cart.php">
			
				 
				<div class="update">

				<input name="qunt" type="number" class="form-control" id="qunt" min="1" value="<?php echo $qun[$counter]?>">
					<button name="Update" value=<?php echo $row["Product_ID"]; ?> style="background-color: white; border: none; border-radius: 5px; color: #333; /* Dark grey */ padding: 15px 32px color:blue"> 
						<u>Update</u>
					</button>
				</div>
            </form>
			</div>

   	   	  <div class="prices">
   	   	  	<div class="amount"><?php echo $row["Product_Price"];?></div>
   	   	  	
            <form method="POST" action="Cart.php">
                    
   	   	  	<div class="remove"><button name="Deleted" value=<?php echo $row["Product_ID"]; ?> style="background-color: white; border: none; border-radius: 5px; color: #333; /* Dark grey */ padding: 15px 32px color:blue"> <u>Remove</u></button> </div>
            </form>
   	   	  </div>
				
				
   	   </div>
<?php 
++$counter;
	}
}
  	}
else
{
	echo "<h3> Empty Cart, Please Add Some Product To The Cart </h3>";
}
?>
<div class="clear">
<form method="POST" action="order.php"> 
	<button name="order" id="order" >Place Order</button> 
</form>
<a href="../../index.php" >Back</a>
	</div>
<?php } else {  //if the user is not logged in
	$msg= "Please Login To See the Shopping Cart";
    header("Location: Login.php?error=$msg");
    exit;
}
?>
</body>
</html>

<?php
}
catch(Exception $e)
{
header("Location: Cart.php");

}

?>