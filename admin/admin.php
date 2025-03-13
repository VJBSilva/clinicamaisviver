<?php
session_start();

function painelDeControle() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($usuario) || empty($senha)) {
            $mensagem = "Usuário e senha são obrigatórios.";
            include __DIR__ . '/PainelDeControle.php';
            return;
        }

        if ($usuario === 'admin' && $senha === 'senha123') {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['role'] = 'Admin';
            header('Location: GerenciarArquivos.php');
            exit;
        } else {
            $mensagem = "Usuário ou senha inválidos.";
            include __DIR__ . '/PainelDeControle.php';
            return;
        }
    }

    include __DIR__ . '/PainelDeControle.php';
}

function logout() {
    session_start(); // Inicia a sessão
    session_destroy(); // Destrói a sessão
    header('Location: PainelDeControle.php'); // Redireciona para a página de login
    exit;
}

function gerenciarArquivos() {
    if (!isset($_SESSION['usuario'])) {
        header('Location: AccessDenied.php');
        exit;
    }

    include __DIR__ . '/GerenciarArquivos.php';
}

function uploadArquivo() {
    if (!isset($_SESSION['usuario'])) {
        header('Location: AccessDenied.php');
        exit;
    }

    if (empty($_FILES['arquivo']['name'])) {
        $mensagem = "Nenhum arquivo selecionado.";
        include __DIR__ . '/GerenciarArquivos.php';
        return;
    }

    $cpf = str_replace(['.', '-'], '', $_POST['cpf']);
    $pedido = $_POST['pedido'];
    $nomeArquivo = $cpf . '_' . $pedido . '.' . pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
    $caminho = __DIR__ . '/../uploads/' . $nomeArquivo;

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho)) {
        $mensagem = "Arquivo $nomeArquivo enviado com sucesso.";
    } else {
        $mensagem = "Erro ao enviar o arquivo.";
    }

    include __DIR__ . '/GerenciarArquivos.php';
}

function accessDenied() {
    include __DIR__ . '/AccessDenied.php';
}

// Roteamento
$action = $_GET['action'] ?? 'painelDeControle';

switch ($action) {
    case 'logout':
        logout();
        break;
    case 'gerenciarArquivos':
        gerenciarArquivos();
        break;
    case 'uploadArquivo':
        uploadArquivo();
        break;
    case 'accessDenied':
        accessDenied();
        break;
    default:
        painelDeControle();
        break;
}
?>