<?php
session_start();
require("https.php");
header("Content-type: application/json; charset: UTF-8");
try{
    $hostname = "localhost";
    $dbname = "my_giovannimapelli10";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    echo $e->getMessage();
}

$lat=$_GET["lat"];
$long=$_GET["long"];
$username=$_SESSION["username"];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="";

if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT username, current_serie, (6371 * acos (cos ( radians(?) )* cos( radians( latitudine ) )* cos( radians( longitudine ) - radians(?) )+ sin ( radians(?) )* sin( radians( latitudine ) ))) AS distance FROM societa HAVING distance < 30 ORDER BY distance LIMIT 0 , 20;";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT username, current_serie, (6371 * acos (cos ( radians(?) )* cos( radians( latitudine ) )* cos( radians( longitudine ) - radians(?) )+ sin ( radians(?) )* sin( radians( latitudine ) ))) AS distance FROM calciatori HAVING distance < 30 ORDER BY distance LIMIT 0 , 20;";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$lat, $long, $lat]);
}
catch(PDOException $e)
{
echo $e;
}

$res=array();
$i=0;

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $res[$i]=array('username' => $data["username"], 'distanza' => $data["distance"], 'current_serie' => $data["current_serie"]);
    $i++;
}

echo json_encode($res);
http_response_code(200);


?>