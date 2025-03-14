<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: AccessDenied.php');
    exit;
}

// Diretório onde os arquivos PDF estão salvos
$diretorio = 'uploads/';

// Excluir arquivo se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    $arquivo = $_POST['arquivo'];
    $caminhoCompleto = $diretorio . $arquivo;

    if (file_exists($caminhoCompleto)) {
        unlink($caminhoCompleto); // Remove o arquivo
        $mensagem = "Arquivo '$arquivo' excluído com sucesso!";
    } else {
        $mensagem = "Erro: Arquivo '$arquivo' não encontrado.";
    }
}

// Listar arquivos PDF no diretório
$arquivos = array_filter(scandir($diretorio), function ($arquivo) {
    return pathinfo($arquivo, PATHINFO_EXTENSION) === 'pdf';
});
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Arquivos PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../imagens/boby.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }

        header {
            background-color: rgba(51, 51, 51, 0.8);
            color: #fff;
            padding: 70px 0 20px;
            text-align: center;
            position: relative;
        }

        header h1 {
            margin: 0;
        }

        main {
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 20px auto;
            max-width: 800px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-excluir {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-excluir:hover {
            background-color: #c82333;
        }

        .btn-inicio {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-inicio:hover {
            background-color: #45a049;
        }

        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #dc3545;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <header>
        <!-- Botão de Início -->
        <a href="/" class="btn-inicio">Início</a>
        <h1>Gerenciar Arquivos PDF</h1>
        <!-- Botão de Sair -->
        <form method="post" action="admin.php?action=logout" onsubmit="return confirm('Tem certeza que deseja sair?');">
            <button type="submit" class="btn logout-button">Sair</button>
        </form>
    </header>
    <main>
        <!-- Exibir Mensagens de Sucesso ou Erro -->
        <?php if (!empty($mensagem)): ?>
            <div class="alert <?php echo strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <!-- Tabela de Arquivos PDF -->
        <h2>Arquivos PDF Salvos</h2>
        <?php if (count($arquivos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome do Arquivo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arquivos as $arquivo): ?>
                        <tr>
                            <td><?php echo $arquivo; ?></td>
                            <td>
                                <form method="post" onsubmit="return confirm('Tem certeza que deseja excluir este arquivo?');">
                                    <input type="hidden" name="arquivo" value="<?php echo $arquivo; ?>">
                                    <button type="submit" name="excluir" class="btn-excluir">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum arquivo PDF encontrado.</p>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2025 Clinica Mais Viver</p>
    </footer>
</body>
</html>
