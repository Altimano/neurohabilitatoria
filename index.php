<?php
// index.php
session_start();
require_once './config/config.php';

// Obtener URI relativa
$uriData = parse_url($_SERVER["REQUEST_URI"]);
$uri = isset($uriData["path"]) ? $uriData["path"] : "/";
$basePath = rtrim(str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME'])), '');
if ($basePath && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

// Array de rutas de la app
$rutas = [
    "/" => "controladores/login.php",
    "/login" => "controladores/login.php",
    "/inicio" => "controladores/inicio.php",
    
    // --- RUTAS PARA AGREGAR EVALUACIÓN ---
    "/crear" => "controladores/crearEstudio.php", // Muestra la búsqueda de pacientes
    "/agregar" => "vistas/agregar.view.php", // Muestra el primer paso
    "/agregarKatona" => "vistas/agregar.mkatona.php",
    "/agregarGrueso" => "vistas/agregar.mgrueso.php",
    "/agregarFino" => "vistas/agregar.mfino.php",
    "/agregarLenguaje" => "vistas/agregar.lenguaje.php",
    "/agregarPostura" => "vistas/agregar.posturas_tmyu.php",
    "/agregarSignos" => "vistas/agregar.signos_alarma.php",
    "/agregarHitosMG" => "vistas/agregar.hitomgrueso.php",
    "/agregarHitosMF" => "vistas/agregar.hitomfino.php",
    "/guardarEvaluacion" => "controladores/guardarEvaluacionCompleta.php", // Guarda todo al final

    // --- RUTAS PARA CONSULTAR ---
    "/consultar" => "controladores/consultar.php",
    "/consultarPaciente" => "controladores/consultarPaciente.php",
    
    // --- RUTAS PARA MODIFICAR ---
    "/modificar" => "controladores/modificarEvaluacion.php",
    "/modificarDatosPaciente" => "controladores/modificarDatosPaciente.php",
    "/realizarModificacion" => "controladores/realizarModificacion.php",
    "/modificarKatona" => "controladores/modificarKatona.php",
    "/modificarGrueso" => "controladores/modificarGrueso.php",
    "/modificarFino" => "controladores/modificarFino.php",
    "/modificarLenguaje" => "controladores/modificarLenguaje.php",
    "/modificarPostura" => "controladores/modificarPostura.php",
    "/modificarSignos" => "controladores/modificarSignos.php",
    "/modificarHitosMG" => "controladores/modificarHitosMG.php",
    "/modificarHitosMF" => "controladores/modificarHitosMF.php",
    
    // --- RUTAS PARA ELIMINAR ---
    "/eliminar" => "controladores/eliminar_Estudio.php",
    "/eliminarEvaluacion" => "controladores/eliminar.php",
    
    // --- SALIR ---
    "/salir" => "controladores/salir.php",
];

// =========================
// Carga del controlador
// =========================
if (array_key_exists($uri, $rutas)) {
    if (file_exists($rutas[$uri])) {
        require $rutas[$uri];
    } else {
        http_response_code(500);
        echo "<h1>Error 500</h1>";
        echo "<p>Controlador no encontrado: " . htmlspecialchars($rutas[$uri]) . "</p>";
        echo "<p><a href='" . base_url('/') . "'>Volver al inicio</a></p>";
    }
} else {
    // 404 personalizado
    http_response_code(404);
    echo "<h1>404 - Página no encontrada</h1>";
    echo "<p>URI solicitada: " . htmlspecialchars($uri) . "</p>";
    echo "<p>Rutas disponibles:</p>";
    echo "<ul>";
    foreach (array_keys($rutas) as $ruta) {
        echo "<li><a href='" . base_url($ruta) . "'>" . $ruta . "</a></li>";
    }
    echo "</ul>";
    echo "<p><a href='" . base_url('/?debug=1') . "'>Ver información de debug</a></p>";
}