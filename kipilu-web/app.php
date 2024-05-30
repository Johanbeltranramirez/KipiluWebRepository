<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'inicio';

// Incluir la cabecera
include 'resources/reutilize/menu.php';

// Incluir la página solicitada
$file = 'resources/views/inicio' . $page . '.php';
if (file_exists($file)) {
    include $file;
} else {
    include '404.php';
}

?>
