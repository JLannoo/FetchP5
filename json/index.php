<?php
    require_once __DIR__.'/../utils/fetchP5.php';
    $response = fetchP5();

    header('Content-Type: application/json');
    echo $response;
    exit;
?>