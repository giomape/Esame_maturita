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


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="";

if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT societa.username, societa.current_serie, count(follow_calciatori.id_societa) as numero from societa, follow_calciatori where societa.id_societa=follow_calciatori.id_societa group by societa.id_societa order by numero desc";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT calciatori.username, calciatori.current_serie, count(follow_societa.id_calciatore) as numero from calciatori, follow_societa where calciatori.id_calciatore=follow_societa.id_calciatore group by calciatori.id_calciatore order by numero desc";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute();
}
catch(PDOException $e)
{
echo $e;
}

$res=array();
$i=0;

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $res[$i]=array('username' => $data["username"], 'current_serie' => $data["current_serie"], 'numero' => $data["numero"]);
    $i++;
}

echo json_encode($res);
http_response_code(200);


?>