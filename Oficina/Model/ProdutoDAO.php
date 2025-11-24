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
<<<<<<< HEAD
            CREATE TABLE IF NOT EXISTS bebidas (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(100) NOT NULL UNIQUE,
                categoria VARCHAR(50) NOT NULL,
                volume VARCHAR(20) NOT NULL,
                valor DECIMAL(10,2) NOT NULL,
                peca INT NOT NULL
=======
            CREATE TABLE IF NOT EXISTS Produtos (
                Id_Produto INT AUTO_INCREMENT PRIMARY KEY,
                Nome VARCHAR(255) NOT NULL,
                Especificacoes VARCHAR(255) NOT NULL,
                Preco_Produto DECIMAL(6,2) NOT NULL
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
            )
        ");
    }

    // CREATE - Cadastrar novo produto
    public function criarProduto(Produto $produto) {
        $stmt = $this->conn->prepare("
<<<<<<< HEAD
            INSERT INTO bebidas (nome, categoria, volume, valor, peca)
            VALUES (:nome, :categoria, :volume, :valor, :peca)
        ");
        $stmt->execute([
            ':nome' => $bebida->getNome(),
            ':categoria' => $bebida->getCategoria(),
            ':volume' => $bebida->getVolume(),
            ':valor' => $bebida->getValor(),
            ':peca' => $bebida->getPlaca()
=======
            INSERT INTO Produtos (Nome, Especificacoes, Preco_Produto)
            VALUES (:nome, :especificacoes, :preco)
        ");
        $stmt->execute([
            ':nome' => $produto->getNome(),
            ':especificacoes' => $produto->getEspecificacoes(),
            ':preco' => $produto->getPreco()
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
        ]);
    }

    // READ - Listar todos os produtos
    public function lerProdutos() {
        $stmt = $this->conn->query("SELECT * FROM Produtos ORDER BY Nome");
        $result = [];
<<<<<<< HEAD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Bebida(
                $row['nome'],
                $row['categoria'],
                $row['volume'],
                $row['valor'],
                $row['peca']
=======
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = new Produto(
                $row['Nome'],
                $row['Especificacoes'],
                $row['Preco_Produto'],
                $row['Id_Produto']
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
            );
        }
        return $result;
    }

<<<<<<< HEAD
    // UPDATE
    public function atualizarBebida($nomeOriginal, $novoNome, $categoria, $volume, $valor, $peca) {
        $stmt = $this->conn->prepare("
            UPDATE bebidas
            SET nome = :novoNome, categoria = :categoria, volume = :volume, valor = :valor, peca = :peca
            WHERE nome = :nomeOriginal
        ");
        $stmt->execute([
            ':novoNome' => $novoNome,
            ':categoria' => $categoria,
            ':volume' => $volume,
            ':valor' => $valor,
            ':peca' => $peca,
            ':nomeOriginal' => $nomeOriginal
=======
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
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
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
<<<<<<< HEAD
            return new Bebida(
                $row['nome'],
                $row['categoria'],
                $row['volume'],
                $row['valor'],
                $row['peca']
=======
            return new Produto(
                $row['Nome'],
                $row['Especificacoes'],
                $row['Preco_Produto'],
                $row['Id_Produto']
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
            );
        }
        return null;
    }
}
?>