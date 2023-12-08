<?php
require_once '../config/config.php';
require_once 'app/Controllers/LoginController.php';

$LoginController = new LoginController($pdo);

if (isset($_POST['nome_u']) && 
    isset($_POST['email']) &&
    isset($_POST['senha'])) 
{
    $LoginController->criarLogin($_POST['nome_u'], $_POST['email'], $_POST['senha']);
    header('Location: #');
}

// Atualiza Login
if (isset($_POST['id_usuario']) && isset($_POST['atualizar_nome']) && isset($_POST['atualizar_email']) && isset($_POST['atualizar_senha'])) {
    $LoginController->atualizarLogin($_POST['id_usuario'], $_POST['atualizar_nome'], $_POST['atualizar_email'], $_POST['atualizar_senha']);
}

// Excluir Login
if (isset($_POST['excluir_id'])) {
    $LoginController->excluirLogin($_POST['excluir_id']);
}

$Logins = $LoginController->listarLogins();

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD com MVC e PDO</title>
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
            background-color: #c5a36d;
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
            color: #c5a36d;
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
            background-color: #ac8c57;
        }
    </style>
    <div class="container">
    
    <h1>Logins</h1>
    <form method="post">
        <input type="text" name="nome_u" placeholder="Nome Usuário" required>
        <input type="text" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Adicionar Usuário</button>
    </form>

    <h2>Lista de Logins</h2>
    <ul>
        <?php foreach ($Logins as $Login): ?>
            <li><?php echo $Login['nome_u']; ?> - <?php echo $Login['email']; ?> - <?php echo $Login['senha']; ?></li>
        <?php endforeach; ?>
    </ul>

<?php
$LoginController->exibirListaLogins();
?>

<h2>Atualizar Login</h2>
    <form method="post">
        <select name="id_usuario">
        <?php foreach ($Logins as $Login): ?>
                                <option value="<?php echo $Login['id_usuario']; ?>"><?php echo $Login['id_usuario']; ?></option>
                                <?php endforeach; ?>
        </select>
                <input type="text" name="atualizar_nome" placeholder="Novo Nome" required>
                <input type="text" name="atualizar_email" placeholder="Nova E-mail" required>
                <input type="password" name="atualizar_senha" placeholder="Nova Senha" required>
        <button type="submit">Atualizar Login</button>
    </form>

    <h2>Excluir Login</h2>
    <form method="post">
        <select name="excluir_id">
            <?php foreach ($Logins as $Login): ?>
                <option value="<?php echo $Login['id_usuario']; ?>"><?php echo $Login['nome_u']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir Login</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>