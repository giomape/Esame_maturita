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
$utente=$_SESSION["username"];
echo $username;
echo $utente;

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if($_SESSION["type"]=="calciatore"){
    $sql="SELECT societa.id_societa as societa, calciatori.id_calciatore as calciatore from societa, calciatori where calciatori.username=? and societa.username=?";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT societa.id_societa as societa, calciatori.id_calciatore as calciatore from societa, calciatori where societa.username=? and calciatori.username=?";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$utente, $username]);
}
catch(PDOException $e)
{
echo $e;
}

$id=array();

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo var_dump($id);
    $id=array('id_calciatore' => $data["calciatore"], 'id_societa' => $data["societa"]);
}

echo var_dump($id);

$sql="";

if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT count(id_calciatore) as num from follow_calciatori where id_calciatore=? and id_societa=?";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT count(id_societa) as num from follow_societa where id_calciatore=? and id_societa=?";
}

echo var_dump($sql);

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$id["id_calciatore"], $id["id_societa"]]);
}
catch(PDOException $e)
{
echo $e;
}

$conta=0;
while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo var_dump($data);
    if($data["num"]==0){
        $conta++;
    }
}

if($conta==0){
    http_response_code(200);
}
else{
    http_response_code(404);
}

?>