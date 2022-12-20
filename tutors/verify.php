<?php

    session_start();
    require_once 'config/db.php';

    $tcardid = $_GET['tid'];
    $tverify = $_GET['tverify'];
    $sql = $conn->prepare("UPDATE info SET  tverify = '$tverify' WHERE tid = '$tcardid'");
    $sql->execute();
    header('location:admin.php');
?>