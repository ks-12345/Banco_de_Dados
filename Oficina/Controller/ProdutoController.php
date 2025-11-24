<?php

<<<<<<< HEAD
namespace Oficina\Controller;

require_once __DIR__ . '/ProdutoDAO.php';
=======
namespace Oficina\Controllers;

require_once __DIR__ . '/../Model/ProdutoDAO.php';
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
require_once __DIR__ . '/../Model/Produto.php';

use Oficina\Model\ProdutoDAO;
use Oficina\Produto;

class ProdutoController {
<<<<<<< HEAD

=======
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
    private $dao;

    public function __construct() {
        $this->dao = new ProdutoDAO();
    }

<<<<<<< HEAD
=======
    // Criar novo produto
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
    public function criar($nome, $especificacoes, $preco) {
        $produto = new Produto($nome, $especificacoes, $preco);
        $this->dao->criarProduto($produto);
    }

<<<<<<< HEAD
=======
    // Ler todos os produtos
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
    public function ler() {
        return $this->dao->lerProdutos();
    }

<<<<<<< HEAD
    public function deletar($id) {
        $this->dao->excluirProduto($id);
    }

    public function editar($idOriginal, $nome, $especificacoes, $preco) {
        $this->dao->editarProduto($idOriginal, $nome, $especificacoes, $preco);
    }

    public function buscarPorId($id) {
=======
    // Editar produto existente
    public function editar($idOriginal, $nome, $especificacoes, $preco) {
        $this->dao->editarProduto($idOriginal, $nome, $especificacoes, $preco);
    }

    // Deletar produto
    public function deletar($id) {
        $this->dao->excluirProduto($id);
    }

    // Buscar produto por ID
    public function buscar($id) {
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad
        return $this->dao->buscarProdutoPorId($id);
    }
}
