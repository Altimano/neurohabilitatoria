<!-- Index con las rutas, router basico
<?php
$uriData = parse_url($_SERVER["REQUEST_URI"]);
$uri = isset($uriData["path"]) ? $uriData["path"] : "/";

//Variable con todas las rutas de la app web
//Si queremos agregar o eliminar nuevas paginas, agregar el nombre a usar y su correspondiente controlador
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
    "/modificarGrueso" => "controladores/modificarGrueso.php",
    "/modificarFino" => "controladores/modificarFino.php",
    "/modificarLenguaje" => "controladores/modificarLenguaje.php",
    "/modificarPostura" => "controladores/modificarPostura.php",
    "/modificarSignos" => "controladores/modificarSignos.php",
    "/modificarHitosMG" => "controladores/modificarHitosMG.php",
    "/modificarHitosMF" => "controladores/modificarHitosMF.php",
];

//Si encuentra que la ruta actual existe en el array de rutas, carga la ruta con match else pagina de error
if (array_key_exists($uri, $rutas)) {
    require $rutas[$uri];
} else {
    require "vistas/404.view.php";
}
?>
