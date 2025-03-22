<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Arquivos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../imagens/boby.png'); /* Caminho da imagem atualizado*/
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }

        header {
            background-color: rgba(51, 51, 51, 0.8);
            color: #fff;
            padding: 70px 0 20px; /* Ajuste o padding-top para 70px */
            text-align: center;
            position: relative;
        }

        header h1 {
            margin: 0; /* Remove margens padrão */
        }

        main {
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 20px auto;
            max-width: 600px;
            border-radius: 10px;
        }

        footer {
            background-color: rgba(51, 51, 51, 0.8);
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        label {
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            padding: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center; /* Centraliza o texto digitado */
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #555;
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

        .btn-pdf {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #007bff; /* Cor azul */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-pdf:hover {
            background-color: #0056b3; /* Cor azul mais escura ao passar o mouse */
        }
        .btn-download {
    position: absolute;
    top: 10px;
    left: 200px; /* Ajuste a posição conforme necessário */
    background-color: #28a745; /* Cor verde */
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.btn-download:hover {
    background-color: #218838; /* Cor verde mais escura ao passar o mouse */
}
    </style>
</head>
<body>
    <header>
    <!-- Botão de Início -->
    <a href="/" class="btn-inicio">Início</a>

    <!-- Botão PDF -->
    <a href="GerenciarPDF.php" class="btn-pdf">PDF</a>

    <!-- Botão para baixar todos os arquivos -->
    <a href="download_all.php" class="btn-download">Baixar Todos os Arquivos</a>

    <!-- Botão de Sair -->
    <form method="post" action="admin.php?action=logout" onsubmit="return confirm('Tem certeza que deseja sair?');">
        <button type="submit" class="btn logout-button">Sair</button>
    </form>

    <h1>Gerenciar Arquivos</h1>
</header>
    <main>
        <!-- Formulário de Upload de Arquivos -->
        <form method="post" action="admin.php?action=uploadArquivo" enctype="multipart/form-data">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="000.000.000-00" required />
            </div>
            <div class="form-group">
                <label for="pedido">Pedido:</label>
                <input type="text" id="pedido" name="pedido" class="form-control" inputmode="numeric" required />
            </div>
            <div class="form-group">
                <label for="arquivo">Selecione um arquivo para upload:</label>
                <input type="file" id="arquivo" name="arquivo" class="form-control" required />
            </div>
            <button type="submit">Enviar</button>
        </form>

        <!-- Exibir Mensagens de Sucesso ou Erro -->
        <?php if (!empty($mensagem)): ?>
            <div class="alert <?php echo strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?> mt-3">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2025 Clinica Mais Viver</p>
    </footer>

    <script>
        // Validar campo "Pedido" para aceitar apenas números
        document.getElementById('pedido').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
        });

        // Validação do CPF (mantido do código anterior)
        document.getElementById('cpf').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
            e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + (x[3] ? '.' + x[3] : '') + (x[4] ? '-' + x[4] : '');
        });
    </script>
</body>
</html>
