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

$username=$_GET["username"];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="";

if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT societa.id_societa AS id FROM societa WHERE societa.username=?";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT calciatori.id_calciatore AS id FROM calciatori WHERE calciatori.username=?";
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


if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT ruoli.nome FROM societa_ruoli, ruoli WHERE ruoli.id_ruolo=societa_ruoli.id_ruolo AND societa_ruoli.id_societa=?";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT ruoli.nome FROM calciatori_ruoli, ruoli WHERE ruoli.id_ruolo=calciatori_ruoli.id_ruolo AND calciatori_ruoli.id_calciatore=?";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$id["id"]]);
}
catch(PDOException $e)
{
echo $e;
}

$info=array();
$i=0;

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $info[$i]=array('nome' => $data["nome"]);
    $i++;
}


echo json_encode($info);
http_response_code(200);


?>