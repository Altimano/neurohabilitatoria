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
        $result = $Estudio->consultarTodosLosEstudios();
    }elseif ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarTodosLosEstudiosPorNombre($Criterio);
        
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $Criterio = strtoupper($_POST['Nombre']);
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarTodosLosEstudiosPorNombreyFecha($Criterio,$fechaInicial,$fechaFinal);

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $Criterio = strtoupper($_POST['Nombre']);
        $codigo = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarTodosLosEstudiosPorNombreyCodigo($Criterio,$codigo);
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarTodosLosEstudiosPorFecha($fechaInicial,$fechaFinal);
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $codigo = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarTodosLosEstudiosPorFechaYCodigo($fechaInicial,$fechaFinal,$codigo);
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $Criterio = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarTodosLosEstudiosPorCodigo($Criterio);
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        while ($Fila = mysqli_fetch_assoc($result)) {
        $pacientes[] = $Fila;
         }
    }
    require './vistas/modificar.view.php';
}