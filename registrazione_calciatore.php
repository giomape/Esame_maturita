<?php
require("https.php");
session_start();
$data=json_decode(file_get_contents('php://input'),1);

$nome=$data["nome"];
$cognome=$data["cognome"];
$data_nascita=$data["data_nascita"];
$email=$data["email"];
$username=$data["username"];
$inpass=$data["password"];
$password=password_hash($inpass, PASSWORD_BCRYPT);
$nome_residenza=$data["nome_residenza"];
$latitudine=$data["latitudine"];
$longitudine=$data["longitudine"];
$piede=$data["piede"];
$biografia=$data["biografia"];
$max_serie=$data["max_serie"];
$current_serie=$data["current_serie"];
$ruoli=$data["ruoli"];

$_SESSION["username"]=$username;
$_SESSION["password"]=$password;
$_SESSION["email"]=$email;

try {
	  $hostname = "localhost";
    $dbname = "my_giovannimapelli10";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    echo $e->getMessage();
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO `calciatori`(`nome`, `cognome`, `data_nascita`, `email`, `username`, `password`, `nome_residenza`, `latitudine`, `longitudine`, `piede`, `biografia`, `max_serie`, `current_serie`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";


try
{ 
  $stmt = $db->prepare($sql);
  $stmt->execute([$nome, $cognome, $data_nascita, $email, $username, $password, $nome_residenza, $latitudine, $longitudine, $piede, $biografia, $max_serie, $current_serie]);
}
catch(PDOException $e)
{
  echo $e;
}

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

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
	$id=$data["id_calciatore"];
}


$sql = "INSERT INTO `calciatori_ruoli`(`id_calciatore`, `id_ruolo`) VALUES (?,?)";

try
{ 
  $stmt = $db->prepare($sql);
}
catch(PDOException $e)
{
  echo $e;
}

for($i=0;$i<count($ruoli);$i++){
  try
  { 
    $stmt->execute([$id, $ruoli[$i]]);
  }
  catch(PDOException $e)
  {
    echo $e;
  }
}

http_response_code(200);
?>