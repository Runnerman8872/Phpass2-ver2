<?php
  require_once("Connection.php")
?>

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
          <a class="nav-link" aria-current="page" href="Shoppage.php"><ntc>Shop</ntc></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Shippage.php"><ntc>Basket</ntc></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <ntc>User</ntc>
          </a>
          <ul class="dropdown-menu">
            <?php

            $stmt2 = $pdo -> query(("SELECT UserName FROM isaacsbooksuser"));
            $stmt4 = $pdo -> query(("SELECT UserPassword FROM isaacsbooksuser"));
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
              if (empty($_POST["loname"])){
                echo "empty";
              } else{
                $UserLogin = test_input($_POST["loname"]);
              }
              if(empty ($_POST["lopassword"])){
                echo "empy";
              } else{
                $PwordLogin = test_input(($_POST["lopassword"]));
              }
              }

              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }


            ?>

            <?php if ($logged_in):?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                Username:<input type = "text" name = "loname">
                <br></br>
                Password:<input type = "text" name = "lopassword">
                <input type="submit" name="submit" value="submit" />
                </form>

            
            <?php else: ?>
                <form method="post">
                <input type="submit" name="Logout"
                class="button" value="Logout" />
                </form> 
            <?php endif;?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  </nav>
  <div class="flex-container">
    <p>this text is a test for formattings sake</p>
    <?php 
    if ($logged_in == true){
      echo "true $UserLogin, $PwordLogin";
    }
    else{
      echo "false $UserLogin, $PwordLogin";
    }
    ?>
  </div>
    </body>
  <footer>
    <p>this text is a test for formattings sake</p>
  </footer>
</html>