<?php
namespace Aula_17;

require_once __DIR__. "\\..\\Model\\MecanicaDAO.php";
require_once __DIR__. "\\..\\Model\\Mecanicas.php";

class CarroController {
    private $dao;

    public function __construct() {
        $this->dao = new MecanicaDAO();
    }

    //lista todas as veiculo 
    public function ler() {
        return $this->dao->lerCarros();

    }

    //cadastra nova carro

    public function criar($modelo,$marca,$cor,$ano,$placa) {
        $Id_Veic = time();
        $carro = new Carros( $modelo, $marca, $cor, $ano, $placa);
        $this->dao->criarCarros($carro);

    }

    //atualiza carro existente
    public function atualizar($modeloOriginal, $novoModelo, $marca, $cor, $ano, $placa) {
        $this->dao->atualizarCarro($modeloOriginal, $novoModelo, $marca, $cor, $ano, $placa);
    }

    public function deletar($modelo) {
        $this->dao->excluirCarro($modelo);
    }

     //editar mantém o mesmo modelo, atualiza os outros campos
    public function editar($modelo, $marca, $cor, $ano, $placa) {
        $this->dao->atualizarCarro($modelo, $modelo, $marca, $cor, $ano, $placa);
    }

    public function buscar($modelo) {
        return $this->dao->buscarPorModelo($modelo);
    }
}
