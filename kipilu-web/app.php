<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'inicio';

include 'resources/reutilize/menu.php';

include 'resources/views/inicio.php';

?>
