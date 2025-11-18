<?php

namespace Oficina\Controllers;

require_once __DIR__ . '/../Model/ProdutoDAO.php';
require_once __DIR__ . '/../Model/Produto.php';

use Oficina\Model\ProdutoDAO;
use Oficina\Produto;

class ProdutoController {
    private $dao;

    public function __construct() {
        $this->dao = new ProdutoDAO();
    }

    // Criar novo produto
    public function criar($nome, $especificacoes, $preco) {
        $produto = new Produto($nome, $especificacoes, $preco);
        $this->dao->criarProduto($produto);
    }

    // Ler todos os produtos
    public function ler() {
        return $this->dao->lerProdutos();
    }

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
        return $this->dao->buscarProdutoPorId($id);
    }
}
?>