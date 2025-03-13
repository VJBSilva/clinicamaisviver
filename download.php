<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = str_replace(['.', '-'], '', $_POST['cpf']);
    $codigo = $_POST['codigo'];
    $fileName = $cpf . '_' . $codigo . '.pdf';
    $filePath = 'uploads/' . $fileName;

    if (file_exists($filePath)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        readfile($filePath);
        exit;
    } else {
        http_response_code(404);
        echo "Arquivo não encontrado.";
        exit;
    }
}
?>