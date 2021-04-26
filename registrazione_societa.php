<?php

$data=json_decode(file_get_contents('php://input'),1);

$nome=$data["nome"];
$email=$data["email"];
$username=$data["username"];
$inpass=$data["password"];
$password=password_hash($inpass, PASSWORD_BCRYPT);
$nome_residenza=$data["nome_residenza"];
$latitudine=$data["latitudine"];
$longitudine=$data["longitudine"];
$current_serie=$data["current_serie"];

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
$sql = "INSERT INTO `societa`(`nome`, `email`, `username`, `password`, `nome_residenza`, `latitudine`, `longitudine`, `current_serie`) VALUES (?,?,?,?,?,?,?,?)";


try
{ 
  $stmt = $db->prepare($sql);
  $stmt->execute([$nome, $email, $username, $password, $nome_residenza, $latitudine, $longitudine, $current_serie]);
}
catch(PDOException $e)
{
  echo $e;
}
http_response_code(200);
?>