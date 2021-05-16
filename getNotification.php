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
$data=$_SESSION["data"];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM messaggi WHERE destinatario=? and data>'$data' ORDER BY data DESC";

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
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