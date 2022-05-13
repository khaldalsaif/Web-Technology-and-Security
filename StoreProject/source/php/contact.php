<!DOCTYPE html>

<html>

<head>

    <title> Contact Us</title>

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
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Signup</a>
          </li>
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

<div class="container">

    <h3>Contact Us</h3>

    <form action="feedback.php" method="POST">

        <div class="form-group">

            <label>Name:</label>

            <input type="text" name="name" class="form-control" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">

        </div>

        <div class="form-group">

            <label>Email:</label>

            <input type="email" name="email" class="form-control" required>

        </div>

        <div class="form-group">

            <label>Message:</label>

            <textarea class="form-control" name="text" required pattern="[a-zA-Z][a-zA-Z0-9\s]*"></textarea>

        </div>

        <div class="form-group">

            <button class="btn btn-success" type="submit"
            style="background-color:SlateBlue;">Submit</button>

        </div>

    </form>

</div>


</body>

</html>