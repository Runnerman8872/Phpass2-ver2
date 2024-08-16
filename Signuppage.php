<html>
    <head>
    <meta charset="utf-8">
        <title>Isaacs Books</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel = "stylesheet" href = "Shop.css">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <nav class="navbar navbar-expand-lg" style="background-color: #A84E4F;" data-bs-theme="dark"
    <div class="container-fluid">
    <a class="navbar-brand" href="HomePage.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="Landingpage.php"><ntc>Home</ntc></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Shoppage.php"><ntc>Shop</ntc></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Shippage.php"><ntc>Basket</ntc></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <ntc>User</ntc>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Loginpage.php"><ntc>Login</ntc></a></li>
            <li><a class="dropdown-item" href="Logoutpage.php"><ntc>Log out</ntc></a></li>
            <li><a class="dropdown-item" href="Signuppage.php"><ntc>Sign up</ntc></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  </nav>
  <div class="flex-container">
    <?php
    $Username = "";
    $UserPword = "";
    $UserEmail = "";
    $nameerror = "";
    $passworderror = "";
    $emailerror = "";

    /*if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (empty($_POST["name"])){
        $nameerror = "Name is required";
      } else{
        $Username = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$Username)){
          $nameerror = "Only Letters and space is allowed";
        }
      }
    */
    if (isset($_POST["name"])){
      $Username = ($_POST["name"]);
    }
    else{
      echo "Name is required";
    }

    if (isset($_POST["password"])){
      $UserPword = ($_POST["password"]);
    }
    else{
      echo "Password is required";
    }

    if (isset($_POST["email"])){
      $UserEmail = ($_POST["email"]);
    }
    else{
      echo "Email is required";
    }

    echo "Name: $Username, Password: $UserPword, Email: $UserEmail";

    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      Name: <input type="text" name="name">
      Password: <input type="text" name="password">
      Email: <input type="text" name="email">
      <input type="submit" name="submit" value="submit"> 
    </form>
   <!--
  <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
  </div>
  <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
-->
    </body>
  <footer>
    <p>this text is a test for formattings sake</p>
  </footer>
</html>