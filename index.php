<?php
$uriData = parse_url($_SERVER["REQUEST_URI"]);
$uri = isset($uriData["path"]) ? $uriData["path"] : "/";

$rutas = [
    "/" => "controladores/login.php",
    "/inicio" => "controladores/inicio.php",
    "/crear" => "controladores/crearEstudio.php",
    "/consultar" => "controladores/consultar.php",
    "/modificar" => "controladores/modificarEstudio.php",
    "/eliminar" => "controladores/eliminar_Estudio.php",
    "/salir" => "controladores/salir.php"
];

if (array_key_exists($uri, $rutas)) {
    require $rutas[$uri];
} else {
    require "vistas/404.view.php";
}
?>
