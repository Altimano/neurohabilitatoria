<?php
$uriData = parse_url($_SERVER["REQUEST_URI"]);
$uri = isset($uriData["path"]) ? $uriData["path"] : "/";

$rutas = [
    "/" => "controladores/login.php",
    "/inicio" => "controladores/inicio.php",
    "/crear" => "controladores/crearEstudio.php",
    "/consultar" => "controladores/consultar.php",
    "/consultarPaciente" => "controladores/consultarPaciente.php",
    "/modificar" => "controladores/modificarEvaluacion.php",
    "/modificarDatosPaciente" => "controladores/modificarDatosPaciente.php",
    "/realizarModificacion" => "controladores/realizarModificacion.php",
    "/eliminar" => "controladores/eliminar_Estudio.php",
    "/eliminarEvaluacion" => "controladores/eliminar.php",
    "/salir" => "controladores/salir.php",
    "/modificarKatona" => "controladores/modificarKatona.php",
    "/modificarGrueso" => "controladores/modificarGrueso.php"
];

if (array_key_exists($uri, $rutas)) {
    require $rutas[$uri];
} else {
    require "vistas/404.view.php";
}
?>
