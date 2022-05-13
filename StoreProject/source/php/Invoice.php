<?php
session_start();

if (isset($_SESSION['adminEmail']) && isset($_SESSION['adminId']) ) {
    require "db_conn.php";
    function getAllItems($connection)
{
    $sql = "SELECT * FROM invoice ORDER by Invoice_ID ASC";
    $stm = $connection->prepare($sql);
    $stm->execute();

    if ($stm->rowCount() > 0) {
        $items= $stm ->fetchAll();
    } else {
        $items = 0;
    }
    return $items;

}
    $ord=getAllItems($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All the Orders</title>

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
        <?php if ($ord==0) { ?>
            No order Available 
        <?php } else { ?>
           
        
        <h4 class = "mt-5">All Orders</h4>
        <table class="table table-bordered shadow">
            <thead>
                <tr>
                
                    <th>Invoice_ID</th>
                    <th>Customer_ID</th>
                    <th>Invoice_Date</th>
                    <th>Payment_Info</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody>
                <?php  foreach ($ord as $item) { ?>
                <tr> 
    
                    <td> <?=$item['Invoice_ID'] ?> </td>
                    <td><?=$item['Customer_ID']?> </td>
                    <td><?=$item['Invoice_Date'] ?> </td>
                    <td><?=$item['Payment_Info'] ?></td>
                    <td><?=$item['Total'] ?> SAR</td>
                    <td>    
                            
                            <a  href="deleteOrder.php?id=<?=$item['Invoice_ID'] ?>"
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

<?php } else {
     $msg = "Please Login As An Admin To See Invoices";
     header("Location: LoginAdmin.php?error=$msg");
    exit;
}
?>