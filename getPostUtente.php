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

$username=$_SESSION["username"];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="";

if($_SESSION["type"]=="societa"){
    $sql = "SELECT societa.id_societa AS id FROM societa WHERE societa.username=?";
}

else if($_SESSION["type"]=="calciatore"){
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

//-----------------------------------------------------------------------------------------------------------------------------

if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT calciatori.username, calciatori.current_serie, post_calciatori.titolo, post_calciatori.descrizione, post_calciatori.data, post_calciatori.id_post FROM post_calciatori, calciatori WHERE post_calciatori.id_calciatore=calciatori.id_calciatore AND post_calciatori.id_calciatore=? ORDER BY post_calciatori.data DESC";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT societa.username, societa.current_serie, post_societa.titolo, post_societa.descrizione, post_societa.data, post_societa.id_post FROM post_societa, societa WHERE post_societa.id_societa=societa.id_societa AND post_societa.id_societa=? ORDER BY post_societa.data DESC";
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

$res=array();
$i=0;

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $res[$i]=array('username' => $data["username"], 'current_serie' => $data["current_serie"], 'titolo' => $data["titolo"], 'descrizione' => $data["descrizione"], 'data' => $data["data"], 'id_post' => $data["id_post"]);
    $i++;
}

echo json_encode($res);
http_response_code(200);


?>