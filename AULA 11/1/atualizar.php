<?php 
$conn = new mysqli("localhost","root","senaisp","ReservaEquipamentos");

$id = $_POST['cpf'];
$nome = $_POST['nome'];     
$email = $_POST['email'];

$sql = "UPDATE cliente_novo SET NOME='$nome', EMAIL='$email' WHERE CPF='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Registro atualizado com sucesso!";
    echo "</br>
    <a href='index.php'>
    <button type='button'>Voltar
    </button>
    </a>";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();

?>