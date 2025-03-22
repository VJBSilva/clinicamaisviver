<?php
// Caminho relativo para a pasta uploads a partir do local do script
$folderPath = '../uploads/'; // Volta um nível e acessa a pasta uploads

// Verifica se a pasta existe
if (!is_dir($folderPath)) {
    die("A pasta 'uploads' não existe.");
}

// Nome do arquivo ZIP que será gerado
$zipFileName = 'backup_uploads.zip';

// Inicializa o objeto ZipArchive
$zip = new ZipArchive();

// Abre o arquivo ZIP para escrita
if ($zip->open($zipFileName, ZipArchive::CREATE) !== TRUE) {
    die("Não foi possível criar o arquivo ZIP.");
}

// Adiciona todos os arquivos da pasta ao ZIP
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($folderPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
    // Verifica se é um arquivo (ignora pastas)
    if (!$file->isDir()) {
        // Obtém o caminho relativo do arquivo
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($folderPath));

        // Adiciona o arquivo ao ZIP
        $zip->addFile($filePath, $relativePath);
    }
}

// Fecha o arquivo ZIP
$zip->close();

// Verifica se o arquivo ZIP foi criado com sucesso
if (!file_exists($zipFileName)) {
    die("Erro ao criar o arquivo ZIP.");
}

// Configura os headers para forçar o download
header('Content-Description: File Transfer');
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($zipFileName));

// Lê o arquivo ZIP e envia para o navegador
readfile($zipFileName);

// Remove o arquivo ZIP após o download
unlink($zipFileName);

exit;
?>
