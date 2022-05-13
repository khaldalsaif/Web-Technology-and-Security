<?php
session_start();

if (isset($_SESSION['adminEmail']) && isset($_SESSION['adminId']) ) {
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

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
                        Customer Questions
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
        
        <form method="POST"
              action="AddProductFun.php";
              class="shadow p-4 rounded mt-5"
              style="width: 90%; max-width: 50rem;"
              enctype="multipart/form-data">
            <h1 class="text-center pb-5 display-4 fs-3">
                Add New Product
            </h1>
            <?php if(isset($_GET['error'])) {?>
            <div class="alert alert-danger" 
                 role="alert">
                <?=htmlspecialchars($_GET['error']); ?>
            </div>
            <?php } ?>
                
            
            <label class="form-label">Product Name</label>

            <input type="text" 
                   class="form-control" 
                   name="ProductName">
            
                   <label class="form-label">Product Description</label>

            <input type="text" 
                   class="form-control" 
                   name="ProductDesc">

            <label class="form-label">Product Price</label>

            <input type="text" 
                   class="form-control" 
                   name="ProductPrice">

            <label class="form-label">Upload Image</label>

            <input type="file"
                   class="form-control" 
                   name="productImage">
                   <br><br>
            <button type="submit" 
                    class="btn btn-primary"
                    style="background-color:SlateBlue;">
                    Add Product
            </button><br><br>
        </div>

        </form>
    </div>

</body>
</html>

<?php } else {
    $msg = "Please Login As An Admin";
    header("Location: LoginAdmin.php?error=$msg");
    exit;
}
?>