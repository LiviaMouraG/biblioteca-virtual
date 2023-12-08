<?php
require_once 'C:\xampp\htdocs\bibliotecaa\src\adm\app\Controllers\LivroController.php'
?>


<!DOCTYPE html>
<html>
<head>
    <title>Lista de Livros</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Livros</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <?php foreach ($livros as $livro): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $livro['id_livro']; ?></td>
                            <td><?php echo $livro['nome']; ?></td>
                            <td><?php echo $livro['preco']; ?></td>
                            <td><?php echo $livro['quantidade']; ?></td>
                        </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
    </fieldset>
</body>
</html>