<?php 

$conn = new mysqli("localhost","root","senaisp","CURSOS");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);

}

$id - $_GET["id"];

//Prepara a declaraçao 

$star =  $conn->prepare ("DELETE FROM ALUNOS WHERE id_aluno = ?");
//Vincular o parametro 'id' como um inteiro (i)
$star->bind_param("i", $id);

//executar e verificar
if ($star->execute()) {
    echo "Registro deletado com sucesso!";
} else {
    echo "Erro ao deletar registro: " . $stmt->error;
}
echo"<br><a href='index.html'>Voltar ao listar</a>";





?>