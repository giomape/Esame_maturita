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

if($_SESSION["type"]=="calciatore"){
    $sql = "SELECT username FROM societa";
}

else if($_SESSION["type"]=="societa"){
    $sql = "SELECT username FROM calciatori";
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

$info=array();
$i=0;

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $info[$i]=array('username' => $data["username"]);
    $i++;
}


echo json_encode($info);
http_response_code(200);


?>