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

$titolo=$_GET["titolo"];
$descrizione=$_GET["descrizione"];
$username=$_SESSION["username"];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="";

if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT calciatori.id_calciatore AS id FROM calciatori WHERE calciatori.username=?";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT societa.id_societa AS id FROM societa WHERE societa.username=?";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
}
catch(PDOException $e)
{
echo $e;
}

$id=array();

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $id=array('id' => $data["id"]);
}

//-----------------------------------------------------------------------------------------------------------------------------

if($_SESSION["type"]=="calciatore"){
    $sql = "INSERT INTO `post_calciatori`(`id_calciatore`, `titolo`, `descrizione`) VALUES (?,?,?)";
}

else if($_SESSION["type"]=="societa"){
    $sql = "INSERT INTO `post_societa`(`id_societa`, `titolo`, `descrizione`) VALUES (?,?,?)";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$id["id"], $titolo, $descrizione]);
}
catch(PDOException $e)
{
echo $e;
}


http_response_code(200);


?>