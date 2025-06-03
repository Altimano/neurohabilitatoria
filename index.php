<?php
$uriData = parse_url($_SERVER["REQUEST_URI"]);
$uri = isset($uriData["path"]) ? $uriData["path"] : "/";

$rutas = [
    "/" => "controladores/login.php",
    "/inicio" => "controladores/inicio.php",
    "/crear" => "controladores/crearEstudio.php",
    "/crearEstudio" => "controladores/crear.php",
    "/consultar" => "controladores/consultar.php",
    "/consultarPaciente" => "controladores/consultarPaciente.php",
    "/modificar" => "controladores/modificarEvaluacion.php",
    "/modificarEvaluacion" => "controladores/modificar.php",
    "/realizarModificacion" => "controladores/realizarModificacion.php",
    "/eliminar" => "controladores/eliminar_Estudio.php",
    "/eliminar_Estudio" => "controladores/eliminar.php",
    "/salir" => "controladores/salir.php",
    "/generarExcel" => "controladores/generarExcel.php"
];

if (array_key_exists($uri, $rutas)) {
    require $rutas[$uri];
} else {
    require "vistas/404.view.php";
}
?>
