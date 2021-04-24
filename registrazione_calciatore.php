<?php

$nome=filter_input(INPUT_POST, 'nome');
$cognome=filter_input(INPUT_POST, 'nome');
$data_nascita=filter_input(INPUT_POST, 'nome');
$email=filter_input(INPUT_POST, 'nome');
$username=filter_input(INPUT_POST, 'nome');
$inpass=filter_input(INPUT_POST, 'nome');
$password=password_hash($inpass, PASSWORD_BCRYPT);
$nome_residenza=filter_input(INPUT_POST, 'nome');
$latitudine=filter_input(INPUT_POST, 'nome');
$longitudine=filter_input(INPUT_POST, 'nome');
$piede=filter_input(INPUT_POST, 'nome');
$biografia=filter_input(INPUT_POST, 'nome');
$max_serie=filter_input(INPUT_POST, 'nome');
$current_serie=filter_input(INPUT_POST, 'nome');

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
$sql = "INSERT INTO `calciatori`(`id_calciatore`, `nome`, `cognome`, `data_nascita`, `email`, `username`, `password`, `nome_residenza`, `latitudine`, `longitudine`, `piede`, `biografia`, `max_serie`, `current_serie`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


try
{ 
  $stmt = $db->prepare($sql);
  $stmt->bind_param(NULL, '$nome', '$cognome', '$datanascita', '$email', '$username', '$password', '$nomeresidenza', '$latitudine', '$longitudine', '$piede', '$biografia', '$max_serie', '$current_serie');
  $stmt->execute();
}
catch(PDOException $e)
{
  echo $e;
}
http_response_code(200);
?>