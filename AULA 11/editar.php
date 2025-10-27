<?php

$conn = mysqli_connect("localhost","root","senaisp","ReservaEquipamentos");

$id = $_GET['CPF'];
$result = $conn->query("SELECT * FROM usuarios WHERE CPF = '$id'");
$now = $result->fetch_assoc();
?>

<form action="atualizar.php" method="post">

<input type="hidden" name="CPF" value="<?php echo $row['CPF']; ?>">
Nome: <input type="text" name="nome" value="<?php echo $now['nome']; ?>"><br>
Email: <input type="email" name="email" value="<?php echo $now['email']; ?>"><br>
CPF: <input type="text" name="cpf" value="<?php echo $now['cpf']; ?>"><br>
<input type="submit" value="Atualizar">
      
</form>