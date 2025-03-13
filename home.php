<?php
function index() {
    include 'index.php';
}

function privacy() {
    include 'privacy.php';
}

function error() {
    include 'error.php';
}

// Roteamento
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'privacy':
        privacy();
        break;
    case 'error':
        error();
        break;
    default:
        index();
        break;
}
?>