<?php
require_once 'C:\xampp\htdocs\bibliotecaa\src\adm\app\Models\LivroModel.php';

class LivroController {
    private $livroModel;

    public function __construct($pdo) {
        $this->livroModel = new LivroModel($pdo);
    }

    public function adicionarLivro($nome, $preco, $imagem, $quantidade) {
        $this->livroModel->adicionarLivro($nome, $preco, $imagem, $quantidade);
    }

    
    public function listarLivros() {
        return $this->livroModel->listarLivros();
    }

    public function exibirListaLivros() {
        $livros = $this->livroModel->listarLivros();
        include 'app/Views/Livros/lista.php';
    }

    public function atualizarLivro($id_livro, $nome, $preco, $quantidade) {
        $this->livroModel->atualizarLivro($id_livro, $nome, $preco, $quantidade);
    }
    
    public function excluirLivro ($id_livro) {
        $this->livroModel->excluirLivro($id_livro);
    }
}
?>
