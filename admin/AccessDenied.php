<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Negado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('imagens/boby.png'); /* Caminho da imagem atualizad
            background-size: cover; /* Faz a imagem cobrir todo o fundo */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Evita repetição da imagem */
            background-attachment: fixed; /* Fixa o fundo para que ele não role com a página */
            color: #333; /* Cor do texto para contraste */
        }

        header {
            background-color: rgba(51, 51, 51, 0.8); /* Fundo semi-transparente para melhor legibilidade */
            color: #fff;
            padding: 10px 20px; /* Adiciona padding nas laterais */
            overflow: hidden; /* Limpa o float */
        }

        header h1 {
            text-align: center; /* Centraliza o título */
            margin: 0; /* Remove margens padrão */
        }

        .btn-inicio {
            float: left; /* Alinha o botão à esquerda */
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
            max-width: 400px; /* Largura máxima do conteúdo */
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
    </style>
</head>
<body>
    <header>
        <a href="/" class="btn-inicio">Início</a>
        <h1>Acesso Negado</h1>
    </header>
    <main>
        <p>Você não tem permissão para acessar esta página.</p>
    </main>
    <footer>
        <p>&copy; 2025 Clinica Mais Viver</p>
    </footer>
</body>
</html>
