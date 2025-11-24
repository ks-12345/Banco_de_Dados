<?php

require_once __DIR__ . '/../Controller/ProdutoController.php';

<<<<<<< HEAD
use Oficina\Controller\ProdutoController;

=======
use Oficina\Controllers\ProdutoController;
>>>>>>> 430f8c8c7eca6cbefc42f3d3b090cfc01b7b8cad

$controller = new ProdutoController();

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega a ação do formulário, se não existir usa '' (string vazia)
    $acao = $_POST['acao'] ?? '';
    
    // Se a ação for 'criar', cadastra novo produto
    if ($acao === 'criar') {
        $controller->criar(
            $_POST['nome'],
            $_POST['especificacoes'],
            $_POST['preco']
        );
    } 
    // Se a ação for 'deletar', exclui o produto
    elseif ($acao === 'deletar') {
        $controller->deletar($_POST['id']);
    }
}

// Carrega todos os produtos para exibir na tabela
$produtos = $controller->ler();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina Mecânica - Gestão de Produtos</title>
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
            max-width: 1200px;
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
            font-size: 1.1em;
        }
        
        /* Formulário de Cadastro */
        .form-cadastro {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 40px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .form-cadastro h2 {
            color: white;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            color: white;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 6px;
            font-size: 14px;
            background: rgba(255,255,255,0.9);
            transition: all 0.3s;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: white;
            background: white;
        }
        
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        .btn-cadastrar {
            background: white;
            color: #667eea;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-cadastrar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        /* Tabela */
        h2 {
            color: #333;
            margin: 30px 0 20px 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 0.5px;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        
        tr:hover {
            background: #f8f9ff;
        }
        
        tr:last-child td {
            border-bottom: none;
        }
        
        /* Botões de Ação */
        .acoes {
            display: flex;
            gap: 10px;
        }
        
        .btn-acao {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
            font-size: 0.9em;
        }
        
        .btn-editar {
            background: #4CAF50;
            color: white;
        }
        
        .btn-editar:hover {
            background: #45a049;
            transform: translateY(-2px);
        }
        
        .btn-excluir {
            background: #f44336;
            color: white;
        }
        
        .btn-excluir:hover {
            background: #da190b;
            transform: translateY(-2px);
        }
        
        .preco {
            font-weight: bold;
            color: #4CAF50;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Oficina Mecânica</h1>
        <p class="subtitle">Sistema de Gestão de Produtos e Peças</p>
        
        <!-- Formulário de Cadastro -->
        <div class="form-cadastro">
            <h2>📦 Cadastrar Novo Produto</h2>
            <form method="POST">
                <!-- Campo hidden que indica a ação a ser executada -->
                <input type="hidden" name="acao" value="criar">
                
                <div class="form-group">
                    <label for="nome">Nome do Produto:</label>
                    <input type="text" id="nome" name="nome" placeholder="Ex: Óleo Motor 5W30" required>
                </div>
                
                <div class="form-group">
                    <label for="especificacoes">Especificações:</label>
                    <textarea id="especificacoes" name="especificacoes" placeholder="Ex: Sintético, para motores a gasolina" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="preco">Preço (R$):</label>
                    <input type="number" id="preco" name="preco" step="0.01" placeholder="Ex: 89.90" required>
                </div>
                
                <button type="submit" class="btn-cadastrar">✓ Cadastrar Produto</button>
            </form>
        </div>
        
        <!-- Lista de Produtos -->
        <h2>📋 Produtos Cadastrados</h2>
        
        <?php if (empty($produtos)): ?>
            <div class="empty-state">
                <p>Nenhum produto cadastrado ainda.</p>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Especificações</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto->getIdProduto()); ?></td>
                        <td><?php echo htmlspecialchars($produto->getNome()); ?></td>
                        <td><?php echo htmlspecialchars($produto->getEspecificacoes()); ?></td>
                        <td class="preco">R$ <?php echo number_format($produto->getPreco(), 2, ',', '.'); ?></td>
                        <td>
                            <div class="acoes">
                                <!-- Formulário para editar -->
                                <form method="POST" action="editar.php" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $produto->getIdProduto(); ?>">
                                    <button type="submit" class="btn-acao btn-editar">✏️ Editar</button>
                                </form>
                                
                                <!-- Formulário para excluir -->
                                <form method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                    <input type="hidden" name="acao" value="deletar">
                                    <input type="hidden" name="id" value="<?php echo $produto->getIdProduto(); ?>">
                                    <button type="submit" class="btn-acao btn-excluir">🗑️ Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>