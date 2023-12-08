<?php
session_start();

if (empty($_SESSION['nome_u']) && empty($_SESSION['senha'])) {
    header('Location: login.php');
    exit();
}
?>
