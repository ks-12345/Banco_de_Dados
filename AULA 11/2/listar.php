<?php
$conn = new mysqli("localhost", "root", "senaisp", "CURSOS");
$result = $conn->query("SELECT * FROM ALUNOS");

echo"<h2>Lista de Alunos</h2>";
echo"<table border='1'>";
echo"<tr><th>id_aluno</th>
<th>Nome</th>
<th>Email</th>
<th>Data Nascimento</th>
</tr>";

while ($row = $result->fetch_assoc()) {
echo"<tr>
     <td>{$row['id_aluno']}</td>
        <td>{$row['nome_aluno']}</td>
        <td>{$row['email']}</td>
        <td>{$row['data_nascimento']}</td>
        <td><a href='editar.php?id={$row['id_aluno']}'>Editar</a></td>
    </tr>";
}
echo"</table>";
$conn->close();
?>

<a hred="index.html"><button type="button">Página Inicial</button></a>