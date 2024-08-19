<li><a class="dropdown-item" href="Signuppage.php"><ntc>Sign up</ntc></a></li>
            <?php
            $LGError = "";
            $LPError = "";
            $LG = "";
            $LP = "";
            $ADM = 0;
            $LGID = 3333333333;
            $LPID = 3333333334;
            $LGMatch = false;
            $stmt4 = $pdo -> query("SELECT UserPassword, UserID, UserAdmin FROM isaacsbooksuser");
            $stmt5 = $pdo -> query("SELECT UserName, UserID FROM isaacsbooksuser");
            $stmt6 = $pdo -> query("SELECT UserID FROM isaacsbooksuser");
            
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
              if (empty($_POST["loname"])){
                echo "empty";
              } else{
                $LG = test_input($_POST["loname"]);
              }
              if(empty ($_POST["lopassword"])){
                echo "empy";
              } else{
                $LP = test_input(($_POST["lopassword"]));
              }
              }

              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
                  
        foreach($stmt5 as $row){
          if ($LG == $row["UserName"]){
             echo "nameright";
             $LGID = $row["UserID"];
             
            }
          else{
            $LGError = "Username is incorrect";
            }
        foreach($stmt4 as $row){
            if ($LP == $row["UserPassword"]){
                echo "passwordright";
                $LPID = $row["UserID"];
                $ADM = $row["UserAdmin"];
            }
            else{
                $LGError = "Password is incorrect";
            }
        }

        if ($LGID == $LPID){
            $LGMatch = true;
            $_SESSION["UserLogin"] = $LG;
             $_SESSION["PwordLogin"] = $LP;
             $_SESSION["AdminLogin"] = $ADM;

            }
        else{
             $LGMatch = false;
        }

        if(isset($_POST["Logout"])){
            $_SESSION["logged_in"] = false;
          }
          
          if(isset($_POST["Login"]) && ($LGMatch == true)){
            $_SESSION["logged_in"] = true;
          }
      }
            ?>

            <?php if ($_SESSION["logged_in"] == false):?>
                <?php
                $_SESSION["UserLogin"] = null;
                $_SESSION["PwordLogin"] = null;
                $_SESSION["AdminLogin"] = null;
                ?>
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