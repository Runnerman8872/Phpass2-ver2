<p>H test</p>
<?php
  $logged_in = false;
  if(isset($_POST["Logout"])){
    $logged_in = true;
  }

  if(isset($_POST["Login"])){
    $logged_in = false;
  }
    echo"php test";
?>