<?php
require_once 'app/Models/EmprestimoModel.php';

class EmprestimoController {
    private $emprestimoModel;

    public function __construct($pdo) {
        $this->emprestimoModel = new EmprestimoModel($pdo);
        
    }

    public function listarHistorico($usuarioNome) {
       
       
    
        return $this->emprestimoModel->listarHistorico($usuarioNome);
    }
    
    public function adicionarHistorico($livroID, $usuarioNome, $acao) {
        return $this->emprestimoModel->adicionarHistorico($livroID, $usuarioNome, $acao);
    }
    

    public function emprestarLivro($livroID, $livroNome, $usuarioNome) {
        if ($this->emprestimoModel->emprestarLivro($livroID, $livroNome, $usuarioNome)) {
            header('Location: index.php');
            exit();
        } else {
            echo "Não foi possível realizar o empréstimo.";
        }
    }

    public function devolverLivro($livroID) {
        // Correção: Passando $_SESSION['nome_u'] como o segundo argumento
        if ($this->emprestimoModel->devolverLivro($livroID, $_SESSION['nome_u'])) {
            header('Location: index.php');
            exit();
        } else {
            echo "Não foi possível realizar a devolução.";
        }
    
    }
    public function listarLivrosEmprestados($usuarioNome) {
        return $this->emprestimoModel->listarLivrosEmprestados($usuarioNome);
    }
}
?>
