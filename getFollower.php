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

$sql="SELECT (SELECT COUNT(*) FROM calciatori WHERE username=?) AS calciatore, (SELECT COUNT(*) FROM societa WHERE username=?) AS societa";

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$username, $username]);
}
catch(PDOException $e)
{
echo $e;
}

$tipo="";

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($data["calciatore"]!=0){
        $tipo="calciatore";
    }
    else if($data["societa"]!=0){
        $tipo="societa";
    }
}


$sql="";

if($tipo=="calciatore"){
    $sql = "SELECT calciatori.id_calciatore AS id FROM calciatori WHERE calciatori.username=?";
}

else if($tipo=="societa"){
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




if($tipo=="calciatore"){
    $sql = "SELECT count(*),
    (SELECT COUNT(follow_calciatori.id_calciatore) from follow_calciatori WHERE follow_calciatori.id_calciatore=?) as seguiti, 
    (SELECT COUNT(follow_societa.id_calciatore) FROM follow_societa WHERE follow_societa.id_calciatore=?) as seguaci 
    FROM follow_calciatori";
}

else if($tipo=="societa"){
    $sql = "SELECT count(*),
    (SELECT COUNT(follow_societa.id_societa) from follow_societa WHERE follow_societa.id_societa=?) as seguiti, 
    (SELECT COUNT(follow_calciatori.id_societa) FROM follow_calciatori WHERE follow_calciatori.id_societa=?) as seguaci 
    FROM follow_societa";
}


try
{ 
    $stmt = $db->prepare($sql);
    $stmt->execute([$id["id"], $id["id"]]);
}
catch(PDOException $e)
{
    echo $e;
}

$numeri=array();
while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $numeri=array("follower" => $data["seguaci"], "following" => $data["seguiti"]);
}



echo json_encode($numeri);
http_response_code(200);

?>