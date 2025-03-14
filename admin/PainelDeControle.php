<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../imagens/boby.png'); /* Caminho da imagem atualizado*/
            background-size: cover; /* Faz a imagem cobrir todo o fundo */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Evita repetição da imagem */
            background-attachment: fixed; /* Fixa o fundo para que ele não role com a página */
            color: #333; /* Cor do texto para contraste */
        }

        header {
            background-color: rgba(51, 51, 51, 0.8); /* Fundo semi-transparente para melhor legibilidade */
            color: #fff;
            padding: 70px 20px 20px; /* Ajuste o padding-top para 70px */
            text-align: center;
            position: relative;
        }

        header h1 {
            margin: 0; /* Remove margens padrão */
            display: inline-block; /* Permite centralização com text-align */
        }

        .btn-inicio {
            position: absolute; /* Posiciona o botão à esquerda */
            top: 20px;
            left: 20px;
            background-color: #4CAF50; /* Cor de fundo verde */
            color: white; /* Cor do texto */
            padding: 10px 20px; /* Espaçamento interno */
            text-decoration: none; /* Remove sublinhado do link */
            border-radius: 5px; /* Bordas arredondadas */
            font-size: 16px; /* Tamanho da fonte */
        }

        .btn-inicio:hover {
            background-color: #45a049; /* Efeito ao passar o mouse */
        }

        main {
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8); /* Fundo semi-transparente para o conteúdo */
            margin: 20px auto; /* Centraliza o conteúdo */
            max-width: 600px; /* Largura máxima do conteúdo */
            border-radius: 10px; /* Bordas arredondadas */
        }

        footer {
            background-color: rgba(51, 51, 51, 0.8); /* Fundo semi-transparente */
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

        input {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #555; /* Efeito ao passar o mouse */
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
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
        <a href="/" class="btn-inicio">Início</a>
        <h1>Painel de Controle</h1>
    </header>
    <main>
        <h2>Login</h2>
        <form method="post" action="admin.php?action=painelDeControle">
            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required />
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required />
            </div>
            <button type="submit">Entrar</button>
        </form>

        <?php if (isset($mensagem)): ?>
            <div class="alert alert-danger mt-3">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2025 Clinica Mais Viver</p>
    </footer>
</body>
</html>
