<!DOCTYPE html>
<html>
<head>
    <title>Lista de Visitantes</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Visitantes</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Senha</th>
                    </tr>
                </thead>
                <?php foreach ($usuarios as $usuario): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $usuario['id_usuario']; ?></td>
                            <td><?php echo $usuario['nome']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo $usuario['senha']; ?></td>
                        </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
    </fieldset>
</body>
</html>