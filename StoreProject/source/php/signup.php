<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap JS bundle 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</head>

<body>
    
<style>
        span{
            color: red;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
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

    <div class="d-flex justify-content-center align-items-center">
           
        <form class="shadow-lg p-3 mb-5 bg-white rounded" 
              style="max-width: 60rem;width: 100%;" 
              method="POST"
              action="signFun.php">
            <h1>Sign Up</h1><br>
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
             
            <div class="mb-3">

                <label for="exampleInputFullName" class="form-label">Full Name <span>*</span></label>

                <input type="text" class="form-control" id="exampleInputFullName" name="fullName" placeholder="John Doe/Jane Doe" pattern="^(\w\w+)\s(\w+)$" required>
            </div>


            <div class="mb-3">
                <label for="exampleInputGender" class="form-label">Gender <span>*</span></label> <br>
                <input type="radio" class="form-contorl" id="exampleInputMale" value="male" name="gender" required>
                
                <label for="exampleInputMale" class="form-label">Male</label> <br>
                <input type="radio" class="form-contorl" id="exampleInputFemale" value="female" name="gender" required>
                <label for="exampleInputFemale" class="form-label">Female</label>
            </div>

            <div class="mb-3">

                <label for="exampleInputPassword1" class="form-label">Password <span>*</span></label>
                <input type="password" class="form-control" id="exampleInputPassword1" name=pass pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                
            </div>

            <div class="mb-3">

                <label for="exampleInputEmail1" class="form-label">Email <span>*</span></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="example@example.example" required>

            </div>

            <div class="mb-3">
                <label for="exampleInputTel" class="form-label">Phone Number <span>*</span></label>
                <input type="tel" class="form-control" id="exampleInputTel" aria-describedby="telHelp" name="tel" pattern="[0-9]{10}" required placeholder="0123456789">
            </div>

            <div class="mb-3">
                <label for="exampleInputCountry" class="form-label">Country <span>*</span></label><br>
                <select name="country" id="country" required>
                <?php include "country.html"; ?>

            </div>

            <div class="mb-3">
                <label for="exampleInputCity" class="form-label">City <span>*</span></label>
                <input type="text" class="form-control" id="exampleInputCity" name="city" pattern="[a-zA-Z]+" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputStreet" class="form-label">Street <span>*</span></label>
                <input type="text" class="form-control" id="exampleInputStreet" name="street" pattern="[a-zA-Z]+" required >

            </div>

            <div class="mb-3">
                <label for="exampleInputPayment" class="form-label">Card Number <span>*</span></label>
                <input type="number" class="form-control" id="exampleInputPayment" name="payment" required>

            </div>

        <button type="submit " name="submitted"  class="btn btn-primary " style="background-color:SlateBlue; ">Sign Up</button><br><br>
        </form>
    </div>

</body>

</html>
