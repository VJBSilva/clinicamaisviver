<?php
$requestId = $_SERVER['REQUEST_ID'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>
</head>
<body>
    <h1>Erro</h1>
    <?php if (!empty($requestId)): ?>
        <p>Request ID: <?php echo $requestId; ?></p>
    <?php endif; ?>
</body>
</html>