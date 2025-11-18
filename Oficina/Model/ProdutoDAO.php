<?php

namespace Oficina\Model;

require_once __DIR__ . '/Produto.php';
require_once __DIR__ . '/Connection.php';

use Oficina\Produto;
use Oficina\Connection;

class ProdutoDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Cria a tabela Produtos se não existir
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS Produtos (
                Id_Produto INT AUTO_INCREMENT PRIMARY KEY,
                Nome VARCHAR(255) NOT NULL,
                Especificacoes VARCHAR(255) NOT NULL,
                Preco_Produto DECIMAL(6,2) NOT NULL
            )
        ");
    }

    // CREATE - Cadastrar novo produto
    public function criarProduto(Produto $produto) {
        $stmt = $this->conn->prepare("
            INSERT INTO Produtos (Nome, Especificacoes, Preco_Produto)
            VALUES (:nome, :especificacoes, :preco)
        ");
        $stmt->execute([
            ':nome' => $produto->getNome(),
            ':especificacoes' => $produto->getEspecificacoes(),
            ':preco' => $produto->getPreco()
        ]);
    }

    // READ - Listar todos os produtos
    public function lerProdutos() {
        $stmt = $this->conn->query("SELECT * FROM Produtos ORDER BY Nome");
        $result = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = new Produto(
                $row['Nome'],
                $row['Especificacoes'],
                $row['Preco_Produto'],
                $row['Id_Produto']
            );
        }
        return $result;
    }

    // UPDATE - Atualizar produto existente
    public function editarProduto($idOriginal, $nome, $especificacoes, $preco) {
        $stmt = $this->conn->prepare("
            UPDATE Produtos
            SET Nome = :nome, 
                Especificacoes = :especificacoes, 
                Preco_Produto = :preco
            WHERE Id_Produto = :id
        ");
        $stmt->execute([
            ':nome' => $nome,
            ':especificacoes' => $especificacoes,
            ':preco' => $preco,
            ':id' => $idOriginal
        ]);
    }

    // DELETE - Excluir produto
    public function excluirProduto($id) {
        $stmt = $this->conn->prepare("DELETE FROM Produtos WHERE Id_Produto = :id");
        $stmt->execute([':id' => $id]);
    }

    // BUSCAR por ID
    public function buscarProdutoPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Produtos WHERE Id_Produto = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Produto(
                $row['Nome'],
                $row['Especificacoes'],
                $row['Preco_Produto'],
                $row['Id_Produto']
            );
        }
        return null;
    }
}
?>