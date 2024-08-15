<p>signuppage</p>
<?php
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

?>