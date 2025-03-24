<?php
session_start();
require './funciones/funciones.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];
    if (validarAcceso($user, $password)) {
        $_SESSION["user"] = $user;
        $_SESSION["password"] = $password;
        $_SESSION["session"] = 'okA';
        header("Location: /eliminar");
        exit();
    } else {
        echo "Acceso denegado";
    }
}
require './vistas/login.view.php';