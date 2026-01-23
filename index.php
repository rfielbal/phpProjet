<?php
session_start();
require_once 'config/connexion.php';
require_once 'header.php';
if ($dbh != null) {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'accueil';
    }
    if (file_exists('controller/' . $page . '.php')) {
        require_once 'controller/' . $page . '.php';
    } else {
        require_once 'controller/404.php';
    }
}
else {
    require_once 'controller/maintenance.php';
}
require_once 'footer.php';
