<?php
require("https.php");
$username=$_GET["username"];

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
$sql = "UPDATE calciatori SET verificato=1 WHERE username=?; UPDATE societa SET verificato=1 WHERE username=?;";


try
{ 
$stmt = $db->prepare($sql);
$stmt->execute([$username, $username]);
}
catch(PDOException $e)
{
echo $e;
}

http_response_code(200);
header('Location: email_verificata.php');


?>