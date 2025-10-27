<?php 
$conn = new mysqli("localhost","root","senaisp","CURSOS");

$id = $_POST['id_aluno'];
$nome = $_POST['nome_aluno'];     
$email = $_POST['email'];
$data_nasc = $_POST['data_nascimento'];


$sql = "UPDATE ALUNOS SET $id_aluno = 'id', $nome_aluno = 'nome' $email ='email' WHERE
$data_nasc = 'data_nascimento'";

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