<?php

namespace Oficina;

require_once __DIR__ . '/../Controller/ProdutoController.php';

$controller = new ProdutoController();

$produtoParaEditar = null;
$idOriginal = 0;

// ===== EXPLICAÇÃO DESTA PARTE =====
// Verifica se o formulário foi enviado (POST) E se a ação é 'atualizar'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') {
    
    // Pega os dados do formulário, usando '' ou 0 como valor padrão se não existir
    $idOriginal = $_POST['idOriginal'] ?? 0;
    $nome = $_POST['nome'] ?? '';
    $especificacoes = $_POST['especificacoes'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    
    // Chama o método editar do controller
    $controller->editar($idOriginal, $nome, $especificacoes, $preco);
    
    // ===== EXPLICAÇÃO DESTA PARTE =====
    // header() redireciona para a página principal
    // exit() para a execução do script (SEMPRE usar após header)
    header('Location: index.php');
    exit();
}

// Verifica se recebeu o ID do produto para editar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $idOriginal = $_POST['id'];
    $produtoParaEditar = $controller->buscar($idOriginal);
    
    // Se o produto não for encontrado, redireciona
    if (!$produtoParaEditar) {
        header('Location: index.php');
        exit();
    }
} else {
    // Se não recebeu ID, volta para a página principal
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto - Oficina Mecânica</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2em;
        }
        
        .subtitle {
            color: #666;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            color: #333;
            font-weight: bold;
            margin-bottom: 8px;
        }
        
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
        }
        
        input:disabled {
            background: #f5f5f5;
            color: #999;
            cursor: not-allowed;
        }
        
        textarea {
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }
        
        .btn-salvar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s;
            width: 100%;
        }
        
        .btn-salvar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-voltar {
            display: inline-block;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .btn-voltar:hover {
            color: #764ba2;
        }
        
        .info-box {
            background: #f0f4ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #667eea;
        }
        
        .info-box p {
            color: #555;
            margin: 5px 0;
        }
        
        .info-box strong {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✏️ Editar Produto</h1>
        <p class="subtitle">Atualize as informações do produto</p>
        
        <div class="info-box">
            <p><strong>ID do Produto:</strong> <?php echo htmlspecialchars($produtoParaEditar->getIdProduto()); ?></p>
        </div>
        
        <form method="POST">
            <!-- Campo hidden que indica a ação -->
            <input type="hidden" name="acao" value="atualizar">
            
            <!-- Campo hidden que guarda o ID original do produto -->
            <input type="hidden" name="idOriginal" value="<?php echo htmlspecialchars($idOriginal); ?>">
            
            <div class="form-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" 
                       id="nome" 
                       name="nome" 
                       value="<?php echo htmlspecialchars($produtoParaEditar->getNome()); ?>" 
                       required>
            </div>
            
            <div class="form-group">
                <label for="especificacoes">Especificações:</label>
                <textarea id="especificacoes" 
                          name="especificacoes" 
                          required><?php echo htmlspecialchars($produtoParaEditar->getEspecificacoes()); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="preco">Preço (R$):</label>
                <input type="number" 
                       id="preco" 
                       name="preco" 
                       step="0.01" 
                       value="<?php echo htmlspecialchars($produtoParaEditar->getPreco()); ?>" 
                       required>
            </div>
            
            <button type="submit" class="btn-salvar">💾 Salvar Alterações</button>
        </form>
        
        <a href="index.php" class="btn-voltar">← Voltar para a lista</a>
    </div>
</body>
</html>