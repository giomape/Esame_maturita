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

$idpost=$_GET["idpost"];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_SESSION["type"]=="calciatore"){
    $sql = "DELETE FROM post_calciatori WHERE id_post=?";
}

else if($_SESSION["type"]=="societa"){
    $sql = "DELETE FROM post_societa WHERE id_post=?";
}

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$idpost]);
}
catch(PDOException $e)
{
echo $e;
}

http_response_code(200);


?>