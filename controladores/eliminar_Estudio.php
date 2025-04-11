<?php
session_start();
//error_reporting(E_ERROR | E_PARSE);
include './config/db.php';
include './Clases/Estudios.php';

$pacientes = [];
if ($_SESSION["session"] === 'okA') {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorNombreEliminar($Criterio);
        
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['codigo'])) {
        $Criterio = strtoupper($_POST['codigo']);
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorCodigoEliminar($Criterio);

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])) {
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorFechaEliminar($fechaInicial, $fechaFinal);
        
    }
    while ($Fila = mysqli_fetch_assoc($result)) {
        $pacientes[] = $Fila;
    }
    require './vistas/eliminar.view.php';
}