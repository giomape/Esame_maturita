<?php
    session_start();
    $data=$_GET["data"];
    $_SESSION["data"]=$data;
    echo $_SESSION["data"];
    http_response_code(200);
?>