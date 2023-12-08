<!DOCTYPE html>
<html>
<head>
    <title>Lista de logins</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de logins</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                      
                    </tr>
                </thead>
                <?php foreach ($logins as $login): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $login['id_usuario']; ?></td>
                            <td><?php echo $login['nome_u']; ?></td>
                            <td><?php echo $login['email']; ?></td>
                            <td><?php echo $login['senha']; ?></td>
                        </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
    </fieldset>
</body>
</html>