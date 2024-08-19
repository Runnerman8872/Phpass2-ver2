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
            require_once("Loginpage.php")
            ?>
        </li>
        <?php if ($_SESSION["AdminLogin"] == 1):?>
        <li class="nav-item">
          <a class="nav-link" href="Itempage.php"><ntc>Add Item</ntc></a>
        </li>
        <?php endif?>
      </ul>
    </div>
  </div>
  </nav>
  <div class="flex-container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if(empty($_POST["name"])){
            $Inameerror = "Name is required";
        } else{
            $ItemName = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $ItemName)){
                $Inameerror = "only Letters and space is allowed";
            }
        }
        if(empty($_POST["quant"])){
            $Quanterror = "quantity is required";
        } else{
            $ItemQuantity = test_input(($_POST["quant"]));
        }

        if(empty($_POST["price"])){
            $Priceerror = "price is needed";
        } else{
            $ItemPrice = test_input(($_POST["price"]));
            if(!preg_match("/^\d+(\.\d{1,2})?$/", $ItemPrice)){
                $Priceerror =  "this isn't a valid currency input";
            }
        }
        if(empty($_POST["genre"])){
            $Genreerror = "A genre is needed";
        } else{
            $ItemGenre = test_input(($_POST["genre"]));
            if (!preg_match("/^[a-zA-Z-' ]*$/", $ItemGenre)){
                $Inameerror = "only Letters and space is allowed";
        }
    }
}
    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }
            
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Item Name: <input type="text" name="name">
        Item quantitiy: <input type="text" name="quant">
        Price £: <input type="text" name="price">
        Genre: <input type="text" name="genre">
        <input type="submit" name="submit" value="submit">
    </form>
  </div>
    </body>
  <footer>
    <p>this text is a test for formattings sake</p>
  </footer>
</html>