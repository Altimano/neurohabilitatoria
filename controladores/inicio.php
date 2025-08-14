<?php
session_start();
//Controlador encargado de la pagina de inicio, por el momento solo verifica si la sesion esta activa y redirige a la vista de inicio
if ($_SESSION["session"] === 'okA') {
    require './vistas/inicio.view.php';
} else {
    require './vistas/inicio.view.php';
}
?>
