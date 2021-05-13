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

$seguito=$_GET["seguito"];
$username=$_SESSION["username"];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="";

if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT calciatori.id_calciatore AS id_calciatore, societa.id_societa AS id_societa FROM calciatori, societa WHERE calciatori.username=? AND societa.username=?";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT societa.id_societa AS id_societa, calciatori.id_calciatore AS id_calciatore FROM calciatori, societa WHERE societa.username=? AND calciatori.username=?";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$username, $seguito]);
}
catch(PDOException $e)
{
echo $e;
}

$id=array();

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $id=array('id_calciatore' => $data["id_calciatore"], 'id_societa' => $data["id_societa"]);
}

//-----------------------------------------------------------------------------------------------------------------------------

if($_SESSION["type"]=="calciatore"){
    $sql = "DELETE FROM `follow_calciatori` WHERE `id_calciatore`=? AND `id_societa`=?";
}

else if($_SESSION["type"]=="societa"){
    $sql = "DELETE FROM `follow_societa` WHERE `id_calciatore`=? AND `id_societa`=?";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$id["id_calciatore"], $id["id_societa"]]);
}
catch(PDOException $e)
{
echo $e;
}


http_response_code(200);


?>