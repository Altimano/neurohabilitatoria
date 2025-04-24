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
    if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientes();
        //FUNCIONA

    }elseif ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientesPorNombre($Criterio);
        //FUNCIONA
        
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $Criterio = strtoupper($_POST['Nombre']);
        $fechaInicio = $_POST['fechaInicial'];
        $fechaFin = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientesPorNombreYFecha($Criterio,$fechaInicio,$fechaFin);
        //FUNCIONA

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $Criterio = strtoupper($_POST['Nombre']);
        $codigo_paciente = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientesPorNombreYCodigo($Criterio,$codigo_paciente);
        //QUEDA PENDIENTE RESOLVER
        
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $fechaInicio = $_POST['fechaInicial'];
        $fechaFin = $_POST['fechaFinal'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientesPorFecha($fechaInicio,$fechaFin);
        //FUNCIONA

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $fechaInicio = $_POST['fechaInicial'];
        $fechaFin = $_POST['fechaFinal'];
        $codigo_paciente = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientePorFechaYCodigo($fechaInicio,$fechaFin,$codigo_paciente);
        //FUNCIONA

    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $Criterio = $_POST['codigo'];
        $Con = conectar();
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientesPorCodigo($Criterio);
        //FUNCIONA
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        while ($Fila = mysqli_fetch_assoc($result)) {
        $pacientes[] = $Fila;
         }
         
    }
    var_dump($_POST);
    require './vistas/crear.view.php';
}