<?php
namespace Aula_17;


class Carros { //atributos
    private $modelo; 
    private $marca;
    private $cor;
    private $ano;
    private $placa;

    public function __construct($modelo, $marca, $cor, $ano, $placa) { //metodo construtor
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->cor = $cor;
        $this->ano = $ano;
        $this->placa = $placa;
    }
    public function getModelo() //getters e setters
    {
        return $this->modelo;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }
    public function getCor()
    {
        return $this->cor;
    }
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    public function getAno()
    {
        return $this->ano;
    }
 
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }
 
    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }
}