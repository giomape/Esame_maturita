<?php
session_start();
require("https.php");
header("Content-type: application/json; charset: UTF-8");
$data=json_decode(file_get_contents('php://input'),1);

$mittente=$data["mittente"];
$destinatario=$data["destinatario"];
$messaggio=$data["messaggio"];

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

$sql="";

if($_SESSION["type"]=="calciatore"){
    $sql="INSERT INTO messaggi(mittente, destinatario, messaggio) VALUES (?,?,?)";
}

else if($_SESSION["type"]=="societa"){
    $sql="INSERT INTO messaggi(mittente, destinatario, messaggio) VALUES (?,?,?)";
}



try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$mittente, $destinatario, $messaggio]);
}
catch(PDOException $e)
{
echo $e;
}

http_response_code(200);


?>