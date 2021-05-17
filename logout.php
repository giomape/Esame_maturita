<?php
    session_start();
    session_abort();
    header('Location: homepage.php');
?>