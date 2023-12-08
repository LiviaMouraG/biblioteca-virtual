<?php
class LivroModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para listar Livros
    public function listarLivros() {
        $sql = "SELECT * FROM livros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function consultarQuantidade($livroID) {
        $consultaLivro = $this->pdo->prepare("SELECT quantidade FROM livros WHERE id_livro = ?");
        $consultaLivro->execute([$livroID]);
        return $consultaLivro->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarQuantidade($livroID, $novaQuantidade) {
        $atualizarQuantidade = $this->pdo->prepare("UPDATE livros SET quantidade = ? WHERE id_livro = ?");
        $atualizarQuantidade->execute([$novaQuantidade, $livroID]);
    }
}
?>