<?php
session_start();

function painelDeControle() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($usuario) || empty($senha)) {
            $_SESSION['mensagem'] = "Usuário e senha são obrigatórios.";
            header('Location: PainelDeControle.php');
            exit;
        }

        // Exemplo de senha criptografada
        $senhaHash = password_hash('senha123', PASSWORD_DEFAULT);

        if ($usuario === 'admin' && password_verify($senha, $senhaHash)) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['role'] = 'Admin';
            header('Location: GerenciarArquivos.php');
            exit;
        } else {
            $_SESSION['mensagem'] = "Usuário ou senha inválidos.";
            header('Location: PainelDeControle.php');
            exit;
        }
    }

    include __DIR__ . '/PainelDeControle.php';
}

function logout() {
    session_destroy();
    header('Location: PainelDeControle.php');
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
        $_SESSION['mensagem'] = "Nenhum arquivo selecionado.";
        header('Location: GerenciarArquivos.php');
        exit;
    }

    $cpf = str_replace(['.', '-'], '', $_POST['cpf']);
    $pedido = $_POST['pedido'];

    if (!preg_match('/^\d{11}$/', $cpf)) {
        $_SESSION['mensagem'] = "CPF inválido.";
        header('Location: GerenciarArquivos.php');
        exit;
    }

    if (!preg_match('/^\d+$/', $pedido)) {
        $_SESSION['mensagem'] = "Número do pedido inválido.";
        header('Location: GerenciarArquivos.php');
        exit;
    }

    $extensoesPermitidas = ['pdf', 'jpg', 'png'];
    $extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));

    if (!in_array($extensao, $extensoesPermitidas)) {
        $_SESSION['mensagem'] = "Tipo de arquivo não permitido.";
        header('Location: GerenciarArquivos.php');
        exit;
    }

    $nomeArquivo = $cpf . '_' . $pedido . '.' . $extensao;
    $caminho = __DIR__ . '/../uploads/' . $nomeArquivo;

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho)) {
        $_SESSION['mensagem'] = "Arquivo $nomeArquivo enviado com sucesso.";
    } else {
        $_SESSION['mensagem'] = "Erro ao enviar o arquivo.";
    }

    header('Location: GerenciarArquivos.php');
    exit;
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
