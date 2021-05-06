<?php
require("https.php");
session_start();
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
$conta=false;

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT COUNT(id_calciatore) AS numero FROM calciatori WHERE verificato=1 AND username='$username' union SELECT COUNT(id_societa) AS numero FROM societa WHERE verificato=1 AND username='$username'";

try
{ 
$stmt = $db->prepare($sql);
$stmt->execute();
}
catch(PDOException $e)
{
echo $e;
}

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($data["numero"]==1){
        $conta=true;
    }
    echo $data["numero"];
    echo var_dump($conta);
}

if($conta==true){
    http_response_code(200);
}
else{
    http_response_code(401);
}


?>