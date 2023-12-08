<?php
class LivroModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function adicionarLivro($nome, $preco, $imagem, $quantidade) {
        $sql = "INSERT INTO livros (nome, preco, imagem, quantidade) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $preco, $imagem, $quantidade]);
    }
    // Model para listar Livros
    public function listarLivros() {
        $sql = "SELECT * FROM livros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar Livros
    public function atualizarLivro($id_livro, $nome, $preco, $quantidade){
        $sql = "UPDATE livros SET nome = ?, preco = ?, quantidade = ? WHERE id_livro = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $preco, $quantidade, $id_livro]);
    }
    
    // Model para deletar Livro
    public function excluirLivro($id_livro) {
        $sql = "DELETE FROM livros WHERE id_livro = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_livro]);
    }
    

}
?>