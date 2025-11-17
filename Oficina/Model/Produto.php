<?php

namespace Oficina;

class Produto {
    private $id_produto;
    private $nome;
    private $especificacoes;
    private $preco_produto;

    public function __construct($nome, $especificacoes, $preco_produto, $id_produto = null) {
        $this->nome = $nome;
        $this->especificacoes = $especificacoes;
        $this->preco_produto = $preco_produto;
        $this->id_produto = $id_produto;
    }

    // Getters
    public function getIdProduto() {
        return $this->id_produto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEspecificacoes() {
        return $this->especificacoes;
    }

    public function getPreco() {
        return $this->preco_produto;
    }

    // Setters
    public function setIdProduto($id_produto) {
        $this->id_produto = $id_produto;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setEspecificacoes($especificacoes) {
        $this->especificacoes = $especificacoes;
        return $this;
    }

    public function setPreco($preco_produto) {
        $this->preco_produto = $preco_produto;
        return $this;
    }
}
?>