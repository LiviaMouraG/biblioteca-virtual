<?php
include_once 'verifica_login.php';
require_once 'C:\xampp\htdocs\bibliotecaa\src\config\config.php';
require_once 'app/Controllers/LivroController.php';
require_once 'app/Controllers/EmprestimoController.php';


?>

<?php
if (!isset($_SESSION['nome_u'])) {
    header('Location: login.php');
    exit();
}

$stmt = $pdo->query('SELECT * FROM livros');
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

$livroController = new LivroController($pdo);
$emprestimoController = new EmprestimoController($pdo);

$livros = $livroController->listarLivros();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emprestar'])) {
    $livroID = $_POST['id_livro'];
    $livroNome = $_POST['nome'];
    $usuarioNome = $_SESSION['nome_u'];

    $emprestimoController->emprestarLivro($livroID, $livroNome, $usuarioNome);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['devolver'])) {
    $livroID = $_POST['id_livro'];

    $emprestimoController->devolverLivro($livroID);
}
?>	
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca Virtual</title>
    <link rel="stylesheet" href="public/css/02index-biblio.css">

    <script src="public/assets/js/script.js"></script>
</head>
<body>
    <header>
        <div class="esq">
        <div class="text-logo">
        <h1 class="text">Biblioteca Virtual</h1>
</div>
</div>
    </header>

    <div class="container">
        <nav>
            <div class="user-container">
            <div class="user-icon" id="user-icon" onclick="showUserInfo()">
            <div class="user-ico">
            <img src="../../img/5987462-removebg-preview.png">
</div>
            <div class="user-info" id="user-info">
            <button class= "exitbutton" onclick="logout()">
                    
                    
                
                </div>
            <div class="user-title">
            <h1>
                <?php echo "Olá, " . $_SESSION['nome_u'] . ""; ?>
            <span class="user-level">Usuário</span>
            </h1>
            
             
            </div>
            </div>
            </div>

            <script>
function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('.icon').src = "public/assets/menu_white_36dp.svg";
    } else {
        menuMobile.classList.add('open');
        document.querySelector('.icon').src = "public/assets/close_white_36dp.svg";
    }
}

// ICON INTERATIVO
function showUserInfo() {
    const userInfo = document.getElementById('user-info');
    
    // Verifique se o elemento está visível ou oculto
    if (userInfo.style.display === 'block') {
        // Se estiver visível, oculte-o
        userInfo.style.display = 'none';
    } else {
        // Se estiver oculto, mostre-o
        userInfo.style.display = 'block';
    }
}

function logout() {
    alert('Você foi desconectado.');
    window.location.href = "logout.php";
}
</script>
            <aside class="list">
            <ul>
                
            <li><a href="index.php"><span class="images"><img width="20" height="20" src="../../img/png-clipart-book-intention-critical-creativity-in-the-classroom-education-computer-icons-book-angle-text-removebg-preview.png" alt="book"/></span>Livros</a></li>
                <li><a href="emprestados.php"><span class="images"><img  width="20" height="20" src="../../img/kisspng-leadership-computer-icons-team-leader-management-t-leader-5b4a59ed31f657.2487462115315993412047-removebg-preview.png"/></span>Empréstimos</a></li>
                <li><a href="historico.php"><span class="images"><img width="20" height="20" src="../../img/historique-icone-de-l-historique-noir-removebg-preview.png" alt="historical"/></span>Histórico</a></li>
            </ul>
                
</aside>
        </nav>
        
        <section class="livros-container">
            <?php foreach ($livros as $livro): ?>
                
                <div class="livro-1">
                    <div class="livro-img">
                    <img src="<?php echo $livro['imagem']; ?>">
                    </div>
                    <div class="livro-nome">
                        <h3><?php echo $livro['nome']; ?><br><span class="livro-preco"><?php echo 'R$' . number_format($livro['preco'], 2, ',', '.'); ?></span></h3>
                        Quantidade - <?php echo $livro['quantidade']; ?> 
                    </div>
                    <div class="livro-button">
                    <form method="post" action="index.php">
                    <input type="hidden" name="id_livro" value="<?php echo $livro['id_livro']; ?>">
                    <input type="hidden" name="nome" value="<?php echo $livro['nome']; ?>">
                    <button type="submit" name="emprestar">Emprestar</button>
            </form>
                    </div>
                </div>
                
            <?php endforeach; ?>
        </section>
    </div>


   

    <footer>
        <p>&copy; 2023 Biblioteca Virtual. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
