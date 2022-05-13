<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap JS bundle 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../../index.php">Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="LoginAdmin.php">Login For Admin</a>
          </li>
          
        </ul>
  
      </div>
      </div>
    </nav>
  </div>
    <div class="d-flex justify-content-center align-items-center">

    <form class="shadow-lg p-3 mb-5 bg-white rounded"
          style="max-width: 60rem;width: 100%;"
          method="POST"
          action="authenticate.php"
        >
        <h1>Login</h1><br>

        <?php if(isset($_GET['success'])) {?>
                <div class="alert alert-success" 
                     role="alert">
                <?=htmlspecialchars($_GET['success']); ?>
                </div>
            <?php } ?>
        <?php if(isset($_GET['error'])) {?>
            <div   
                class="alert alert-danger" 
                role="alert">
                <?=htmlspecialchars($_GET['error']); ?>
            </div>
        <?php } ?>

        <div class="mb-3">
            <label for="exampleInputEmail1"
                   class="form-label">Email</label>

            <input type="email" 
                   class="form-control" 
                   id="exampleInputEmail1" 
                   aria-describedby="emailHelp"
                   name="email" >
        </div>
        <div class="mb-3">

            <label for="exampleInputPassword1"
                   class="form-label">
                   Password
            </label>

            <input type="password"
                   class="form-control"
                   id="exampleInputPassword1"
                   name=pass>

        </div>

        <button type="submit" 
                class="btn btn-primary"
                style="background-color:SlateBlue;">
                Login
        </button><br><br>
        

    </form>
    </div>
</body>
</html>