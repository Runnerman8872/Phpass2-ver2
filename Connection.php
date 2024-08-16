<p>H test</p>

<?php
#useful assistant https://www.w3schools.com/php/php_form_url_email.asp
$type = "mysql";
$server = "localhost"; #V
$db = "isaacsbooks"; #V
$port = "3306";
$charset = "utf8mb4";

$username = "root"; #V
$password = ""; #V
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset";
try{
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), $e->getCode());
}
$name = "Tim";

$stmt = $pdo -> query("SELECT UserName FROM isaacsbooksuser");
#$stmt -> execute([$name]);
#$user = $stmt->fetch();



foreach ($stmt as $row)
{
    echo $row["UserName"]."\n";
}

$logged_in = false;
if(isset($_POST["Logout"])){
  $logged_in = true;
}

if(isset($_POST["Login"])){
  $logged_in = false;
}
  echo"php test";



/* Signup page */
$Username = "";
$UserPword = "";
$UserEmail = "";
$nameerror = "";
$passworderror = "";
$emailerror = "";
$NameRepeat = false;
$EmailRepeat = false;
Class NewUser{

}

?>