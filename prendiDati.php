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


$sql = "SELECT * FROM `societa` WHERE username=?";

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
}
catch(PDOException $e)
{
echo $e;
}

$info=array();
$i=0;

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($data["id_societa"]!=""){
        $info=array('nome' => $data["nome"], 'email' => $data["email"], 'username' => $data["username"], 'nome_residenza' => $data["nome_residenza"], 'latitudine' => $data["latitudine"], 'longitudine' => $data["longitudine"], 'current_serie' => $data["current_serie"], 'tipo' => "societa");
        $i++;
    }
}
$_SESSION["type"]="societa";

if($i==0){
    $_SESSION["type"]="calciatore";
    $sql = "SELECT * FROM `calciatori` WHERE username=?";

    try
    { 
    $stmt = $db->prepare($sql);
    $stmt->execute([$username]);
    }
    catch(PDOException $e)
    {
    echo $e;
    }

    $info=array();
    $i=0;

    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($data["id_calciatore"]!=""){
            $info=array('nome' => $data["nome"], 'email' => $data["email"], 'username' => $data["username"], 'nome_residenza' => $data["nome_residenza"], 'latitudine' => $data["latitudine"], 'longitudine' => $data["longitudine"], 'current_serie' => $data["current_serie"], 'cognome' => $data["cognome"], 'data_nascita' => $data["data_nascita"], 'piede' => $data["piede"], 'biografia' => $data["biografia"], 'max_serie' => $data["max_serie"], 'tipo' => "calciatore");
            $i++;
        }
    }
}

echo json_encode($info);
http_response_code(200);


?>