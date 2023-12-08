<?php
session_start()
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Bookers©</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="public/assets/img/letter-b.png" type="image/x-icon">
	
	
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
    align-items: center;
    justify-content: center;
    height: 100vh;
}

form {
    position: absolute;
    right: 561px;
    text-align: center;
    /* background: #fff; */
    background-color: #deba83;
    padding: 30px;
    border-radius: 101px;
    box-shadow: 0px 2px 2px 2px rgba(0, 0, 0, 0.177);
    max-width: 389px;
    width: 100%;
    transition: all 0.8s ease;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 12px;
    background-color:#7a5d2b;
    color: #fff;
    border: none;
    border-radius: 94px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #ac8c57;
}

.error-message {
    color: #e74c3c;
    margin-top: 10px;
}

</style>
	
    
	<form action="loginconfig-adm.php" method="POST">
	
	<h2>Login-adm</h2>
   
	<input type="text" name="nome_u" placeholder="Usuário">
	<input type="password" name="senha" placeholder="Senha">
	<?php
    if (isset($_SESSION['senha_incorreta'])) {
        echo "<h2 class='error-message'>Usuário ou Senha incorretos</h2>";
        unset($_SESSION['senha_incorreta']);
    }
    ?>					
	<button type="submit">
	Login
	</button>
	
</form>	

					
			
</body>
</html>