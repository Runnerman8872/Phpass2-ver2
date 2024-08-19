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
    require_once ("Connection.php");



    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (empty($_POST["name"])){
        $nameerror = "Name is required";
        $SUNameRepeat = true;
      } else{
        $Username = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$Username)){
          $nameerror = "Only Letters and space is allowed";
        }
        $SUNameRepeat = false;
      }

      if (empty($_POST["password"])){
        $passworderror = "Password is required";
      } else{
        $UserPword = test_input(($_POST["password"]));
        if (!preg_match("/^[a-zA-Z-' ]*$/",$UserPword)){
          $passworderror = "Only Letters and space is allowed";
      }
    }
      
      if (empty($_POST["email"])){
        $emailerror = "email is required";
        $SUEmailRepeat = true;
      } else{
        $UserEmail = test_input(($_POST["email"]));
        if (!filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
          $emailerror = "Invalid email format";
        }
        $SUEmailRepeat = false;
      }
    if (empty($_POST["admin"])){
      $UserAdmin = 0;
    } else{
      $UserAdmin = 1;
    }
      $stmt2 = $pdo -> query("SELECT UserName FROM isaacsbooksuser");
      $stmt3 = $pdo -> query("SELECT UserEmail FROM isaacsbooksuser");

        foreach ($stmt2 as $row)
      {
        if ($Username == $row["UserName"]){
          echo (" Same name \n");
          $SUNameRepeat = true;
        }
     }
     foreach ($stmt3 as $row2)
     {
       if ($UserEmail == $row2["UserEmail"]){
         echo (" Same email \n");
         $SUEmailRepeat = true;
       }
    }
#Primary issue: can add info via below code VV but cant add data via the $ system (I.E. $Username wont add the inputted user data but Test1 as shown below does)
    if ($SUEmailRepeat == false && $SUNameRepeat == false){
      $AddUser = $pdo -> query("INSERT INTO isaacsbooksuser (UserName, UserEmail, UserPassword, UserAdmin) VALUES('$Username', '$UserEmail', '$UserPword', '$UserAdmin');");
    }
    }
  
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    echo "Name: $Username, password: $UserPword, Email: $UserEmail";



    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      Name: <input type="text" name="name">
      <span class="error">* <?php echo $nameerror;?></span>
      Password: <input type="text" name="password">
      <span class="error">* <?php echo $passworderror;?></span>
      Email: <input type="text" name="email">
      <span class="error">* <?php echo $emailerror;?></span>
      Admin: <input type="checkbox" name="admin" value="1">
      <input type="submit" name="submit" value="submit"> 
    </form>
    <?php

    

    if ($SUEmailRepeat == false){
      echo("email has no repeated \n");
    } else{
      echo("email has repeated unfortunately \n");
    }

    if ($SUNameRepeat == false){
      echo("name has no repeated \n");
    } else{
      echo("name has repeated unfortunately \n");
    }
    if ($_SESSION["logged_in"] == true){
      echo "true ". $_SESSION["UserLogin"]. $_SESSION["PwordLogin"];
    }
    else{
      echo "false ".  $_SESSION["UserLogin"], $_SESSION["PwordLogin"];
    }

    ?>
    </body>
  <footer>
    <p>this text is a test for formattings sake</p>
  </footer>
</html>