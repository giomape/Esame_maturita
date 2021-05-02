<?php
try{
    $hostname = "localhost";
    $dbname = "progetto";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    echo $e->getMessage();
}

$username=$_GET["username"];
$i=0;

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT COUNT(username) AS Numero FROM calciatori WHERE username='$username'";

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
    if($data["Numero"]!=0)
        $i++;
}



$sql = "SELECT COUNT(username) AS Numero FROM societa WHERE username='$username'";

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
    if($data["Numero"]!=0)
        $i++;
}

if($i==0){
    echo json_encode("correct");
}
else{
    echo json_encode("wrong");
}
http_response_code(200);
header("Content-type: application/json; charset: UTF-8");
?>