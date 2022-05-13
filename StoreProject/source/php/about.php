<!DOCTYPE html>
<html>
<head>
   <!-- bootstrap 5 CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap JS bundle 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>about</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
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
<div class="about-section">
  <h1>About Us </h1>
  <p>we are 6 Saudi guys who can make store</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Khalid Al-Saif</h2>
        <p class="title">CEO & Founder</p>
        <p> <a href="mailto:2190003853@iau.edu.sa">2190003853@iau.edu.sa</a></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Saif Al-Sayegh</h2>
        <p class="title">Art Director</p>
        <p> <a href="mailto:2190005084@iau.edu.sa">2190005084@iau.edu.sa</a></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Mohammed Al-Zahrani</h2>
        <p class="title">Designer</p>
        <p> <a href="mailto:2190000000@iau.edu.sa">2190000000@iau.edu.sa</a></p>
      </div>
    </div>
  </div>
</div>

<div class="column">
    <div class="card">
      <div class="container">
        <h2>Mohammed Al-Qahtani</h2>
        <p class="title">Markiting</p>
        <p> <a href="mailto:2190003259@iau.edu.sa">2190003259@iau.edu.sa</a></p>
      </div>
    </div>
  </div>
</div>

<div class="column">
    <div class="card">
      <div class="container">
        <h2>Malik Al-Qarni</h2>
        <p class="title">Web developer</p>
        <p> <a href="mailto:2190001371@iau.edu.sa">2190001371@iau.edu.sa</a></p>
      </div>
    </div>
  </div>
</div>

<div class="column">
    <div class="card">
      <div class="container">
        <h2>Abdulaziz Al-Hassan </h2>
        <p class="title">HR</p>
        <p> <a href="mailto:2190001931@iau.edu.sa">2190001931@iau.edu.sa</a></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
