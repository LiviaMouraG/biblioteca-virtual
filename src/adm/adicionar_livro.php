<?php
require_once 'C:\xampp\htdocs\bibliotecaa\src\config\config.php';
require_once 'C:\xampp\htdocs\bibliotecaa\src\adm\app\Controllers\LivroController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $livroController = new LivroController($pdo);

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    
    $uploadDir = '..\index\public\assets\img\uploads\\';
    $nomeOriginal = $_FILES['imagem']['name'];
    $imagem = $uploadDir . $nomeOriginal;
    
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem)) {
        $livroController->adicionarLivro($nome, $preco, $imagem, $quantidade);
        echo "<script>alert('Upload bem-sucedido.'); window.location.href = 'livro.php';</script>";
    } else {
        echo "Erro no upload da imagem.";
        // Verifique se há erros específicos de upload
        echo "Erro: " . $_FILES['imagem']['error'];
    }
    
}
?>
