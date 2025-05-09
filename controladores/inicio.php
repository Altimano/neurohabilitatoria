<?php
session_start();
if ($_SESSION["session"] === 'okA') {
    require './vistas/inicio.view.php';
} else {
    header("Location: /login");
    exit();
}
?>
