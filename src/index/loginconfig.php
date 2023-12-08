<?php
session_start();
include '../config/config.php';

if(empty($_POST['nome_u']) || empty($_POST['senha'])) {
    $_SESSION['nao_autenticado'] = true;
    header('Location: login.php');
    exit();
}

$usuario = $_POST['nome_u'];
$senha = $_POST['senha'];

try {
    $query = "SELECT nome_u FROM usuarios WHERE nome_u = :usuario AND senha = :senha";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        $_SESSION['nome_u'] = $usuario;
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['senha_incorreta'] = true; // Adicionando a mensagem de senha incorreta
        header('Location: login.php');
        exit();
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
