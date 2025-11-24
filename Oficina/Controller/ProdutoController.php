<?php

namespace Oficina\Controller;

require_once __DIR__ . '/ProdutoDAO.php';
require_once __DIR__ . '/../Model/Produto.php';

use Oficina\Produto;

class ProdutoController {

    private $dao;

    public function __construct() {
        $this->dao = new ProdutoDAO();
    }

    public function criar($nome, $especificacoes, $preco) {
        $produto = new Produto($nome, $especificacoes, $preco);
        $this->dao->criarProduto($produto);
    }

    public function ler() {
        return $this->dao->lerProdutos();
    }

    public function deletar($id) {
        $this->dao->excluirProduto($id);
    }

    public function editar($idOriginal, $nome, $especificacoes, $preco) {
        $this->dao->editarProduto($idOriginal, $nome, $especificacoes, $preco);
    }

    public function buscarPorId($id) {
        return $this->dao->buscarProdutoPorId($id);
    }
}
