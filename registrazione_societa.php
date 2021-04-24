<?php

$nome=$_POST["nome"];
$email=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["password"];
$nome_residenza=$_POST["nome_residenza"];
$latitudine=$_POST["latitudine"];
$longitudine=$_POST["longitudine"];
$current_serie=$_POST["current_serie"];

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
$sql = "INSERT INTO `societa`(`id_societa`, `nome`, `email`, `username`, `password`, `nome_residenza`, `latitudine`, `longitudine`, `current_serie`) VALUES (?,?,?,?,?,?,?,?,?)";


try
{ 
  $stmt = $db->prepare($sql);
  $stmt->bind_param(NULL, '$nome', '$email', '$username', '$password', '$nome_residenza', '$latitudine', '$longitudine', '$current_serie');
  $stmt->execute();
}
catch(PDOException $e)
{
  echo $e;
}
http_response_code(200);
?>