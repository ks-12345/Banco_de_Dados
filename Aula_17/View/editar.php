<?php

namespace Aula_17;

require_once __DIR__. '\\..\\Controller\\MecanicaController.php'; // ajustado para Windows

$controller = new CarroController(); // instancia o controller

$carroParaEditar = null; // carro que sera editada
$modeloOriginal = '';  // modelo original da carro

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') { // verifica se o formulario foi submetido para atualizar
    
    $modeloOriginal = $_POST['modeloOriginal'] ?? ''; // modelo original da carro
    $marca    = $_POST['marca'] ?? '';
    $cor       = $_POST['Cor'] ?? ''; 
    $ano        = $_POST['Ano'] ?? '';  
    $placa         = $_POST['placa'] ?? 0;

    $controller->editar($modeloOriginal, $marca, $cor, $ano, $placa); // chama o metodo editar do controller
    
    header('Location: index.php'); // redireciona para a lista apos a edicao
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modelo'])) { 
    $modeloOriginal = $_POST['modelo'];
    $carroParaEditar = $controller->buscar($modeloOriginal);
    
    // Se a carro não for encontrada, algo deu errado, redireciona.
    if (!$carroParaEditar) { // carro nao encontrada
        header('Location: index.php'); // redireciona
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Carros</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; max-width: 400px; margin: 20px 0; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            display: inline-block;
            border: 1px solid #ffc5ecff;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px; 
            background-color: #e39dd9ff; 
            color: black; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Editar Carros: <?php echo htmlspecialchars($carroParaEditar->getModelo()); ?></h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar"> 
        
        <input type="hidden" name="modeloOriginal" value="<?php echo htmlspecialchars($modeloOriginal); ?>"> 
        
        
        <label for="modelo_display">Modelo (Chave, não editável):</label>
        <input type="text" id="modelo_display" value="<?php echo htmlspecialchars($carroParaEditar->getModelo()); ?>" disabled> 
        

        <label for="marca">Marca:</label>
        <select name="marca" Id_Veic="marca" required>
            <?php $currentCat = $carroParaEditar->getMarca(); ?>
            <option value="FIAT" <?php if ($currentCat === 'FIAT') echo 'selected'; ?>>FIAT</option>
            <option value="CHEVROLET" <?php if ($currentCat === 'CHEVROLET') echo 'selected'; ?>>CHEVROLET</option>
            <option value="JEEP" <?php if ($currentCat === 'JEEP') echo 'selected'; ?>>JEEP</option>
            <option value="TOYOTA" <?php if ($currentCat === 'TOYOTA') echo 'selected'; ?>>TOYOTA</option>
            <option value="HYUNDAI" <?php if ($currentCat === 'HYUNDAI') echo 'selected'; ?>>HYUNDAI</option>
            <option value="VOLKSWAGEN" <?php if ($currentCat === 'VOLKSWAGEN') echo 'selected'; ?>>VOLKSWAGEN</option>
            <option value="CITROEN" <?php if ($currentCat === 'CITROEN') echo 'selected'; ?>>CITROEN</option>
             <option value="RENAULT" <?php if ($currentCat === 'RENAULT') echo 'selected'; ?>>RENAULT</option>
            <option value="PEUGEOT" <?php if ($currentCat === 'PEUGEOT') echo 'selected'; ?>>PEUGEOT</option>
            <option value="HONDA" <?php if ($currentCat === 'HONDA') echo 'selected'; ?>>HONDA</option>
            <option value="MITSUBISHI" <?php if ($currentCat === 'MITSUBISHI') echo 'selected'; ?>>MITSUBISHI</option>
            <option value="KIA" <?php if ($currentCat === 'KIA') echo 'selected'; ?>>KIA</option>
            <option value="BMW" <?php if ($currentCat === 'BMW') echo 'selected'; ?>>BMW</option>

        </select>
        
        <label for="cor">Cor:</label>
        <input type="text" name="Cor" Id_Veic="cor" value="<?php echo htmlspecialchars($carroParaEditar->getCor()); ?>" required>
        

        <label for="ano">Ano:</label>
        <input type="number" name="Ano" Id_Veic="ano" value="<?php echo htmlspecialchars($carroParaEditar->getAno()); ?>" required>
        

        <label for="placa">QuantId_Veicade:</label>
        <input type="number" name="placa" Id_Veic="placa" value="<?php echo htmlspecialchars($carroParaEditar->getPlaca()); ?>" required>
        

        <button type="submit">Salvar Alterações</button>
    </form>
    
    <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>