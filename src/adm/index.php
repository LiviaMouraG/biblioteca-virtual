<?php
include_once 'gerar_pdf.php'
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
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
            min-height: 100vh;
        }

        .container {
            background-color: #deba83;
    border-radius: 96px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 392px;
    text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        
        button{
            width: 10vw;
            padding: 8px;
            margin-bottom: 10px;
            background-color: #7a5d2b;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            
        }
        

        button:hover, a:hover {
            background-color: #ac8c57;
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            color: #fff;
        }
    </style>
    <?php
        session_start();
        
    ?>
    <div class="container">


  <h2>Olá, ADM!</h2><br> 
    
  <button><a href="livro.php">Livros</a></button><br>

  <button><a href="usuario.php">Usuários</a></button>
    <br>
    <a href="<?= $filename ?>" download="<?= $filename ?>">
    <button type="button">Baixar PDF</button>
</a>
<br>
<button><a href="../index/login.php">Sair</a></button><br>
   
</body>
</html>