<?php

$conn = mysqli_connect("localhost","root","senaisp","ReservaEquipamentos");

$id = $_GET['CPF'];
$result = $conn->query("SELECT * FROM cliente_novo WHERE CPF = '$id'");
$now = $result->fetch_assoc();
?>

<form action="atualizar.php" method="post">

<input type="hidden" name="cpf" value="<?php echo $row['CPF']; ?>">
Nome: <input type="text" name="nome" value="<?php echo $now['NOME']; ?>"><br>
Email: <input type="email" name="email" value="<?php echo $now['EMAIL']; ?>"><br>
CPF: <input type="text" name="cpf" value="<?php echo $now['CPF']; ?>"><br>
<input type="submit" value="Atualizar">
      
</form>