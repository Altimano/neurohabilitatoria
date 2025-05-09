<?php
session_start();
//error_reporting(E_ERROR | E_PARSE);
include './config/db.php';
include './Clases/Estudios.php';

$pacientes = [];
if ($_SESSION["session"] === 'okA') {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudiosParaEliminar();

    }elseif ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorNombreEliminar($Criterio);
        
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $Criterio = strtoupper($_POST['Nombre']);
        $fechaInicio = $_POST['fechaInicial'];
        $fechaFin = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorNombreYFechaEliminar($Criterio,$fechaInicio,$fechaFin);

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $Criterio = strtoupper($_POST['Nombre']);
        $codigo_paciente = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorNombreYCodigoEliminar($Criterio, $codigo_paciente);

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $fechaInicio = $_POST['fechaInicial'];
        $fechaFin = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorFechaEliminar($fechaInicio, $fechaFin);

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $fechaInicio = $_POST['fechaInicial'];
        $fechaFin = $_POST['fechaFinal'];
        $codigo_paciente = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorFechaYCodigoEliminar($fechaInicio, $fechaFin, $codigo_paciente);

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $Criterio = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarEstudioPorCodigoEliminar($Criterio);
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        while ($Fila = mysqli_fetch_assoc($result)) {
        $pacientes[] = $Fila;
         }
    }
    require './vistas/eliminar.view.php';
}