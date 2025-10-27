<?php
$conn = new mysqli("localhost", "root", "senaisp", "ReservaEquipamentos");
$result = $conn->query("SELECT * FROM clinte_novo");

echo"<h2>Lista de Equipamentos</h2>";
echo"<table border='1'>";
echo"<tr><th>CPF</th>
<th>Nome</th>
<th>Email</th></tr>";

while ($row = $result->fetch_assoc()) {
echo"<tr>
     <td>{$row['CPF']}</td>
        <td>{$row['nome']}</td>
        <td>{$row['email']}</td>
        <td><a href='editar.php?CPF={$row['CPF']}'>Editar</a></td>
    </tr>";
}
echo"</table>";
$conn->close();
?>

<a hred="index.html"><button type="button">Página Inicial</button></a>