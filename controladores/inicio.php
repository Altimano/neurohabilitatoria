<?php
session_start();
if ($_SESSION["session"] === 'okA') {
    require './vistas/partials/header.php';
    require './vistas/inicio.view.php';
} else {
    header("Location: /login");
    exit();
}
?>
