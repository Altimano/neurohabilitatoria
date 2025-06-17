<?php
session_start();
//error_reporting(E_ERROR | E_PARSE);
include './config/db.php';
include './Clases/Estudios.php';
$pacientes = [];
var_dump($_SESSION);

if ($_SESSION["session"] === 'okA') {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarTodosLosEstudiosv2();
    }elseif ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarDatosPacienteNombre($Criterio);
        
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $Criterio = strtoupper($_POST['Nombre']);
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarDatosPacienteNombreyFecha($Criterio,$fechaInicial,$fechaFinal);

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $Criterio = strtoupper($_POST['Nombre']);
        $codigo = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarDatosPacienteNombreyClave($Criterio,$codigo);
        echo $Criterio;
        echo $codigo;
        echo $_POST;
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarDatosPacienteFecha($fechaInicial,$fechaFinal);
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $codigo = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarDatosPacienteFechayClave($fechaInicial,$fechaFinal,$codigo);
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $Criterio = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarDatosPacienteClave($Criterio);
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        while ($Fila = mysqli_fetch_assoc($result)) {
        $pacientes[] = $Fila;
         }
    }
        require './vistas/consultar.view.php';
    }
