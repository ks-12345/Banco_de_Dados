<?php
// Recebe os dados do formulário
$nome = $_POST['nome_aluno'];
$email = $_POST['email'];
$data_nasc = $_POST['data_nascimento'];


// Conexão com o banco
$conn = new mysqli("localhost", "root", "senaisp", "CURSOS");

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    $message = "Falha na conexão: " . $conn->connect_error;
    $status = "erro";
} else {
    // Monta o comando SQL
    $sql = "INSERT INTO ALUNOS (nome_aluno, email, data_nascimento)
            VALUES ('$nome', '$email', '$data_nasc')";

    // Executa o comando SQL
    if ($conn->query($sql) === TRUE) {
        $message = "Novo registro criado com sucesso!";
        $status = "sucesso";
    } else {
        $message = "Erro: " . $conn->error;
        $status = "erro";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cadastro</title>
    <link rel="stylesheet" href="insert.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <div class="message <?php echo $status; ?>">
            <?php echo $message; ?>
        </div>
        <a href="index.html" class="btn-voltar">Voltar ao Formulário</a>
    </div>
</body>
</html>
