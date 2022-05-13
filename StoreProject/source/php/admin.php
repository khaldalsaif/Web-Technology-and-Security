<?php
session_start();

 if (isset($_SESSION['adminEmail']) && isset($_SESSION['adminId']) ) {
    require "db_conn.php";
   include "Products.php";
    $items=getAllItems($connection); // to get all the product from the database
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap JS bundle 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                        href="AddProduct.php">
                        Add Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                        href="customerQustions.php">
                        Customer questions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                        href="Invoice.php">
                        Orders
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link"
                        href="logout.php">
                        Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
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
        <!-- if no items in the database -->
        <?php if ($items==0) { ?> 
            No Items Added Yet 
        <?php } else { ?>
        
        <h4 class = "mt-5">All Product</h4>
        <table class="table table-bordered shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($items as $item) { ?>
                <tr>
                    <td> <?=$item['Product_ID'] ?> </td>
                    <td>
                        <? $Base64=base64_encode( $item['Image'] );?> 
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $item['Image'] ).'"style: height="100px;"/>'; ?>
                    </td>
                    <td><?=$item['Product_Name']?> </td>
                    <td><?=$item['Product_Description'] ?> </td>
                    <td><?=$item['Product_Price'] ?> SAR</td>
                    <td>    
                            <a  href="editItem.php?id=<?=$item['Product_ID'] ?>"
                                class="btn btn-warning" >
                                Edit
                            </a> 
                            
                            <a  href="deleteProduct.php?id=<?=$item['Product_ID'] ?>"
                                class="btn btn-danger" >
                                Delete
                            </a> 
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }  ?>
    </div>
</body>
</html>

<?php
 } else {
    $msg = "Please Login As An Admin";
    header("Location: LoginAdmin.php?error=$msg");
    exit;
}
?>

