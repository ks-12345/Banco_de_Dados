<?php

$conn = mysqli_connect("localhost","root","senaisp","CURSOS");

$id = isset($_GET['id_aluno']) ? $_GET['id_aluno'] : null;
$result = $conn->query("SELECT * FROM ALUNOS WHERE id_aluno = '$id'");
$now = $result->fetch_assoc();
?>

<form action="atualizar.php" method="post">

<input type="hidden" name="id_aluno" value="<?php echo $row['id_aluno']; ?>">
Nome: <input type="text" name="nome_aluno" value="<?php echo $now['nome']; ?>"><br>
Email: <input type="email" name="email" value="<?php echo $now['email']; ?>"><br>
Email: <input type="date" name="data_nasc" value="<?php echo $now['data_nascimento']; ?>"><br>
<input type="submit" value="Atualizar">

</form>