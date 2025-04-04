<?php
session_start();
include './config/db.php';
include './Clases/Estudios.php';
error_reporting(E_ERROR | E_PARSE);
$pacientes = [];
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
    while ($Fila = mysqli_fetch_assoc($result)) {
        $pacientes[] = $Fila;
    }
    require './vistas/crear.view.php';
}