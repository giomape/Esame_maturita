<?php

$data=json_decode(file_get_contents('php://input'),1);

$ruoli=$data;

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
$sql = "INSERT INTO `societa_ruoli`(`id_societa`, `id_ruolo`) VALUES (?,?)";


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