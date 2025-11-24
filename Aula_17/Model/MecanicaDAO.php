<?php

namespace Aula_17;

use PDO;

require_once 'Mecanicas.php';
require_once 'Connection.php';

class MecanicaDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Cria a tabela se não existir
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS veiculo (
                Id_Veic INT AUTO_INCREMENT PRIMARY KEY,
                modelo VARCHAR(255) NOT NULL UNIQUE,
                marca VARCHAR(255) NOT NULL,
                cor VARCHAR(100) NOT NULL,
                ano INT(4) NOT NULL,
                placa VARCHAR (7) NOT NULL
            )
         ");
        
    }
    

    // CREATE
    public function criarCarros(Carros $carro) {
        $stmt = $this->conn->prepare("
            INSERT INTO veiculo (modelo, marca, cor, ano, placa)
            VALUES (:modelo, :marca, :cor, :ano, :placa)");
        $stmt->execute([
            ':modelo' => $carro->getModelo(),
            ':marca' => $carro->getMarca(),
            ':cor' => $carro->getCor(),
            ':ano' => $carro->getAno(),
            ':placa' => $carro->getPlaca()
        ]);
    }

    // READ
    public function lerCarros() {
        $stmt = $this->conn->query("SELECT * FROM veiculo ORDER BY modelo");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Carros(
                $row['modelo'],
                $row['marca'],
                $row['cor'],
                $row['ano'],
                $row['placa']
            );
        }
        return $result;
    }

    // UPDATE
    public function atualizarCarro($modeloOriginal, $novoModelo, $marca, $cor, $ano, $placa) {
        $stmt = $this->conn->prepare("
            UPDATE veiculo
            SET modelo = :novoModelo, marca = :marca, cor = :cor, ano = :ano, placa = :placa
            WHERE modelo = :modeloOriginal
        ");
        $stmt->execute([
            ':novoModelo' => $novoModelo,
            ':marca' => $marca,
            ':cor' => $cor,
            ':ano' => $ano,
            ':placa' => $placa,
            ':modeloOriginal' => $modeloOriginal 
        ]);
    }

    // DELETE
    public function excluirCarro($modelo) {
        $stmt = $this->conn->prepare("DELETE FROM veiculo WHERE modelo = :modelo");
        $stmt->execute([':modelo' => $modelo]);
    }

    // BUSCAR POR NOME
    public function buscarPorModelo($modelo) {
        $stmt = $this->conn->prepare("SELECT * FROM veiculo WHERE modelo = :modelo LIMIT 1");
        $stmt->execute([':modelo' => $modelo]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Carros(
                $row['modelo'],
                $row['marca'],
                $row['cor'],
                $row['ano'],
                $row['placa']
            );
        }
        return null;
    }
}