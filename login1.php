<?php
require("https.php");
header("Content-type: application/json; charset: UTF-8");
$data=json_decode(file_get_contents('php://input'),1);


$username=$data["username"];
$inpass=$data["password"];

$_SESSION["username"]=$username;
$_SESSION["password"]=$password;

try{
    $hostname = "localhost";
    $dbname = "my_giovannimapelli10";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    echo $e->getMessage();
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT password FROM societa WHERE username=? UNION SELECT password FROM calciatori WHERE username=?;";

try
{ 
    $stmt = $db->prepare($sql);
    $stmt->execute([$username, $username]);
} catch(PDOException $e) {
    echo $e;
}

$hash = '';
while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $hash=$data["password"];
}

if (password_verify($inpass, $hash)) {
    http_response_code(200);
    die();
} else {
    http_response_code(401);
}


?>