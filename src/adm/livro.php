<?php
require_once '../Config/config.php';
require_once 'app/Controllers/LivroController.php';

$livroController = new LivroController($pdo);

if (isset($_POST['nome']) && 
    isset($_POST['preco']) &&
    isset($_POST['quantidade'])) 
{
    $livroController->criarLivro($_POST['nome'], $_POST['preco'], $_POST['quantidade']);
    header('Location: #');
}

// Atualiza Livro
if (isset($_POST['id_livro']) && isset($_POST['atualizar_nome']) && isset($_POST['atualizar_preco']) && isset($_POST['atualizar_quantidade'])) {
    $livroController->atualizarLivro($_POST['id_livro'], $_POST['atualizar_nome'], $_POST['atualizar_preco'], $_POST['atualizar_quantidade']);
}

// Excluir Livro
if (isset($_POST['excluir_id_livro'])) {
    $livroController->excluirLivro($_POST['excluir_id_livro']);
}

$livros = $livroController->listarLivros();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Livro</title>
</head>
<body>
<style>
        body {
            background-image: url('../../img/profesion-bibliotecario.jpg');
            background-size:cover;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #deba83;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input, select, button {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus, button:focus {
            border-color: #7a5d2b;
        }

        button {
            background-color: #7a5d2b;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #ac8c57;
            transform: scale(1.05);
        }

        ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        ul li {
            margin-bottom: 8px;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        a {
            color: #7a5d2b;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color:#ac8c57;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #7a5d2b;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
<div class="container">
    <h2>Adicionar Livro</h2>
    <form action="adicionar_livro.php" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome do Livro:</label>
        <input type="text" name="nome" required>
        
        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required>

        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem" accept="image/*" required>

        <button type="submit" value="Enviar">Adicionar Livro</button>

       
    </form>
    <h2>Lista de Livros</h2>
    <ul>
        <?php foreach ($livros as $livro): ?>
            <li><?php echo $livro['nome']; ?> - <?php echo $livro['preco']; ?></li>
        <?php endforeach; ?>
    </ul>

<?php
$livroController->exibirListaLivros();
?>

<h2>Atualizar Livro</h2>
    <form method="post">
        <select name="id_livro">
        <?php foreach ($livros as $livro): ?>
                                <option value="<?php echo $livro['id_livro']; ?>"><?php echo $livro['id_livro']; ?></option>
                                <?php endforeach; ?>
        </select>
                <input type="text" name="atualizar_nome" placeholder="Novo Nome" required>
                <input type="text" name="atualizar_preco" placeholder="Nova preço" required>
                <input type="number" name="atualizar_quantidade" placeholder="Nova qntd De Livros" min="1"  required>
        <button type="submit">Atualizar Livro</button>
    </form>

    <h2>Excluir Livro</h2>
    <form method="post">
        <select name="excluir_id_livro">
            <?php foreach ($livros as $livro): ?>
                <option value="<?php echo $livro['id_livro']; ?>"><?php echo $livro['nome']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir Livro</button>
    </form>
    <a href="index.php">Voltar</a>
  
</body>
</html>
