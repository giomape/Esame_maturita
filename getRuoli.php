<?php
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
$sql = "SELECT * FROM ruoli";

try
{ 
  $stmt = $db->prepare($sql);
  $stmt->execute();
}
catch(PDOException $e)
{
  echo $e;
}
$i=0;
$response=array();
while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
	$response[$i]=array('id_ruolo' => $data["id_ruolo"], 'nome' => $data["nome"], 'gruppo' => $data["gruppo"]);
  $i++;
}
http_response_code(200);
header("Content-type: application/json; charset: UTF-8");
echo json_encode($response);
?>