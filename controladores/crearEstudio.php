<?php
session_start();
include './config/db.php';
include './Clases/Estudios.php';
$pacientes = [];
/*$filtros = [
    'Nombre' => isset($_POST['Nombre']) ? $_POST['Nombre'] : null,
    'codigo' => isset($_POST['codigo']) ? $_POST['codigo'] : null,
    'fechaInicial' => isset($_POST['fechaInicial']) ? $_POST['fechaInicial'] : null,
    'fechaFinal' => isset($_POST['fechaFinal']) ? $_POST['fechaFinal'] : null,
];*/


if ($_SESSION["session"] === 'okA') {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientes($Criterio);
        
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['codigo'])) {
        $Criterio = strtoupper($_POST['codigo']);
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientesPorCodigo($Criterio);

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])) {
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientesPorAno($fechaInicial, $fechaFinal);
        
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        while ($Fila = mysqli_fetch_assoc($result)) {
        $pacientes[] = $Fila;
         }
    }
    require './vistas/crear.view.php';
}