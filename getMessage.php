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

$destinatario=$_GET["username"];
$mittente=$_SESSION["username"];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM messaggi WHERE (mittente=? OR mittente=?) AND (destinatario=? OR destinatario=?) ORDER BY data ASC";

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$mittente,$destinatario,$mittente,$destinatario]);
}
catch(PDOException $e)
{
echo $e;
}

$res=array();
$i=0;

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $res[$i]=array('mittente' => $data["mittente"], 'destinatario' => $data["destinatario"], 'messaggio' => $data["messaggio"], 'data' => $data["data"]);
    $i++;
}

if($i!=0){
    echo json_encode($res);
    http_response_code(200);
}
else{
    http_response_code(404);
}

?>