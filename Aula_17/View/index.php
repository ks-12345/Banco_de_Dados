<?php 

namespace Aula_17;

require_once __DIR__. '\\..\\Controller\\MecanicaController.php';
$controller = new CarroController();

if ($_SERVER ['REQUEST_METHOD'] === 'POST'){ // verifica se o formulario foi submetido
    $acao = $_POST['acao'] ?? ''; // obtém a ação do formulário
    if ($acao === 'criar'){ // cria nova carro
        $controller->criar(
            $_POST['modelo'],
            $_POST['marca'],
            $_POST['Cor'],
            $_POST['Ano'],
            $_POST['placa']
        );
    } elseif ($acao === 'deletar'){
        $controller->deletar($_POST['modelo']); // deleta a carro pelo modelo
    }
}
$veiculo = $controller->ler(); // obtém a lista de veiculo
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de veiculo</title>
</head>
<body>
   <style>
    /* Estilos Gerais */
    body { 
        font-family: 'Georgia', serif; /* Fonte clássica */
        padding: 40px; 
        background-color: #f7f3e8; /* Bege claro (papel antigo) */
        color: #3e2723; /* Marrom escuro para o texto */
    }
    
    h1, h2 { 
        color: #5d4037; /* Marrom mais quente para títulos */
        border-bottom: 3px solid #bcaaa4; /* Linha de separação discreta (cor de madeira clara) */
        padding-bottom: 12px;
        margin-top: 30px;
        font-weight: normal;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Estilo do Formulário de Cadastro (Simula uma mesa ou balcão) */
    form { 
        background-color: #ffffff; /* Fundo branco/papel */
        padding: 30px; 
        border-radius: 6px; 
        max-width: 650px; 
        margin: 25px 0; 
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* Sombra suave */
        border: 1px solid #d7ccc8; /* Borda fina para dar acabamento */
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        display: flex;
        justify-content: center;
    }

    .form-group {
        flex-grow: 1;
        min-width: 200px;
        display: flex;
        flex-direction: column;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #5d4037;
        font-size: 15px;
    }

    input[type="text"], input[type="number"], select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #a1887f; /* Borda que remete à madeira escura */
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
        background-color: #fff8e1; /* Fundo levemente amarelado para os campos */
        color: #3e2723;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus, input[type="number"]:focus, select:focus {
        border-color: #795548; /* Marrom de foco mais escuro */
        outline: none;
        box-shadow: 0 0 0 2px rgba(121, 85, 72, 0.2);
    }
    
    /* Botão de Cadastro (Simula um carimbo ou selo) */
    .btn-cadastrar {
        height: 40px; 
        padding: 0 25px;
        background-color: #795548 !important; /* Marrom de madeira */
        color: white !important; 
        border: none !important; 
        border-radius: 4px !important; 
        cursor: pointer !important;
        font-weight: bold !important;
        transition: background-color 0.3s, transform 0.1s;
        align-self: flex-end; 
        text-transform: uppercase;
    }
    .btn-cadastrar:hover {
        background-color: #5d4037 !important;
        transform: translateY(-1px);
    }

    /* Estilo da Tabela de Carros (Simula uma estante ou catálogo) */
    table {
        width: 100%;
        border-collapse: separate; /* Permite o border-spacing */
        border-spacing: 0 5px; /* Espaçamento entre as linhas */
        margin-top: 30px;
        background-color: transparent; 
    }
    
    thead th {
        background-color: #5d4037; /* Cabeçalho em Marrom escuro (madeira de estante) */
        color: white;
        text-transform: uppercase;
        font-size: 14px;
        border: none;
        padding: 15px;
    }

    tbody tr {
        background-color: #ffffff; /* Fundo branco para cada carro */
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.3s;
    }

    tbody tr:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Destaca o carro ao passar o mouse */
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: none;
    }
    
    /* Remove a cor zebrada antiga, usando a sombra na TR para diferenciar */
    tr:nth-child(even) {
        background-color: #ffffff; 
    }

    /* Estilo dos Botões de Ações */
    td:last-child {
        white-space: nowrap; 
        width: 1%;
    }

    .form-acao {
        background: none !important; 
        padding: 0 !important; 
        box-shadow: none !important; 
        display: inline-block !important; 
        margin: 0 5px 0 0;
    }
    
    .form-acao button[type="submit"] {
        padding: 7px 10px; 
        border: 1px solid #795548; /* Borda marrom */
        border-radius: 4px; 
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s;
        font-size: 13px;
        text-transform: uppercase;
    }
    
    /* Botão Excluir */
    .btn-deletar {
        background-color: #fff; 
        color: #795548;
    }
    .btn-deletar:hover {
        background-color: #bcaaa4 !important; /* Marrom claro ao passar o mouse */
        color: white !important;
        border-color: #bcaaa4;
    }

    /* Botão Editar */
    .btn-editar {
        background-color: #795548; 
        color: white;
    }
    .btn-editar:hover {
        background-color: #5d4037;
        border-color: #5d4037;
    }
</style>
    <h1>Formulário para preenchimento de veiculo</h1>
    <form method="POST">
    <input type="hidden" name="acao" value="criar">
    <input type="text" name="modelo" placeholder="Modelo de carro:" required>
    <select name="marca" required>
        <option value="">Selecione a Marca</option>
            <option value="FIAT">FIAT</option>
            <option value="CHEVROLET">CHEVROLET</option>
            <option value="JEEP">JEEP</option>
            <option value="TOYOTA">TOYOTA</option>
            <option value="HYUNDAI">HYUNDAI</option>
            <option value="VOLKSWAGEN">VOLKSWAGEN</option>
            <option value="CITROEN">CITROEN</option>
             <option value="RENAULT">RENAULT</option>
            <option value="PEUGEOT">PEUGEOT</option>
            <option value="HONDA">HONDA</option>
            <option value="MITSUBISHI">MITSUBISHI</option>
            <option value="KIA">KIA</option>
            <option value="BMW" >BMW</option>

</select>
    <input type="text" name="Cor" placeholder="Cor:" required>
    <input type="number" name="Ano" step="0.01" placeholder="Ano (Ex: 1999):" required>
    <input type="text" name="placa" placeholder="Placa: (ex:000-0000)" required>
    <?php
    echo '<button type="submit" style="padding: 10px 20px; 
    background-color: #0a0effff;
     color: black; 
     border: none; 
     border-radius: 4px; 
     cursor: pointer;">Cadastrar</button>';
    ?>
    </form>
    <h2>veiculo Cadastradas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Cor</th>
                <th>Ano</th>
                <th>Placa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculo as $carro): ?>
            <tr>
                <td><?php echo htmlspecialchars($carro->getModelo()); ?></td>
                <td><?php echo htmlspecialchars($carro->getMarca()); ?></td>
                <td><?php echo htmlspecialchars($carro->getCor()); ?></td>
                <td><?php echo htmlspecialchars($carro->getAno()); ?></td>
                <td><?php echo htmlspecialchars($carro->getPlaca()); ?></td>
                <td>
                    <form method="POST" class="form-acao" style="display: inline;">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="hidden" name="modelo" value="<?php echo htmlspecialchars($carro->getModelo()); ?>">
                        <button type="submit" style="background-color: #0a0effff; border-radius: 4px; cursor: pointer;">Excluir</button>
                    </form>
                    <form method="POST" class="form-acao" action="editar.php" style="display: inline;">
                       <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="modelo" value="<?php echo htmlspecialchars($carro->getModelo()); ?>">
                        <button type="submit" style="background-color: #0a0effff; border-radius: 4px; cursor: pointer;">Editar</button>
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

        <p><a href="AdicinarCliente.php">Voltar para a lista</a></p>
</body>
</html>