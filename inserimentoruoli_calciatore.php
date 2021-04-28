<?php

$data=json_decode(file_get_contents('php://input'),1);

$ruoli=$data["ruoli"];
$username=$data["username"];

try {
	$hostname = "localhost";
    $dbname = "progetto";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    echo $e->getMessage();
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id_calciatore FROM calciatori WHERE username='$username'";


try
{ 
  $stmt = $db->prepare($sql);
  $stmt->execute();
}
catch(PDOException $e)
{
  echo $e;
}
$id=0;
while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
	$id=$data;
}


$sql = "INSERT INTO `calciatori_ruoli`(`id_calciatore`, `id_ruolo`) VALUES (?,?)";


try
{ 
  $stmt = $db->prepare($sql);
  $stmt->execute([]);
}
catch(PDOException $e)
{
  echo $e;
}
http_response_code(200);
echo var_dump($ruoli);
?>