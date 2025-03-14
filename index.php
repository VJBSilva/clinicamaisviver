<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Mais Viver</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('imagens/boby.png'); /* Caminho da imagem atualizado */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }

        .btn-painel {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            z-index: 1000;
        }

        .btn-painel:hover {
            background-color: #45a049;
        }

        header {
            background-color: rgba(51, 51, 51, 0.8);
            color: #fff;
            padding: 70px 20px 20px; /* Ajuste o padding-top para 70px */
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

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
            width: 100%;
        }

        .input-group div {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
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
    </style>
</head>
<body>
    <a href="admin/admin.php" class="btn-painel">Painel de Controle</a>
    <header>
        <h1>Clinica Mais Viver</h1>
    </header>
    <main>
        <h1>Baixar Resultado</h1>
        <form action="download.php" method="post">
            <div class="input-group">
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required />
                </div>
                <div>
                    <label for="codigo">Pedido:</label>
                    <input type="text" id="codigo" name="codigo" required />
                </div>
            </div>
            <button type="submit">Baixar</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Clinica Mais Viver</p>
    </footer>

    <script>
        document.getElementById('cpf').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
            e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + (x[3] ? '.' + x[3] : '') + (x[4] ? '-' + x[4] : '');
        });
    </script>
</body>
</html>
