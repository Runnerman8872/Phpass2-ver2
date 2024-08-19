<li><a class="dropdown-item" href="Signuppage.php"><ntc>Sign up</ntc></a></li>
            <?php


            $stmt5 = $pdo -> query("SELECT UserName FROM isaacsbooksuser");
            $stmt4 = $pdo -> query("SELECT UserPassword FROM isaacsbooksuser");
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
              if (empty($_POST["loname"])){
                echo "empty";
              } else{
                $_SESSION["UserLogin"] = test_input($_POST["loname"]);
              }
              if(empty ($_POST["lopassword"])){
                echo "empy";
              } else{
                $_SESSION["PwordLogin"] = test_input(($_POST["lopassword"]));
              }
              }

              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }



            ?>

            <?php if ($_SESSION["logged_in"] == false):?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                Username:<input type = "text" name = "loname">
                <br></br>
                Password:<input type = "text" name = "lopassword">
                <input type="submit" name="Login" value="Login" />
                </form>

            
            <?php else: ?>
                <form method="post">
                <input type="submit" name="Logout"
                class="button" value="Logout" />
                </form> 
            <?php endif;?>
          </ul>