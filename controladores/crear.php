<?php
    session_start();
    include '../funciones/funciones.php';
    include '../config/db.php';
    include '../Clases/Estudios.php';
    
    date_default_timezone_set('America/Mexico_City');
    $Con = conectar();
    $Estudio = new Estudios($Con);
    $clave_paciente = $_POST["clave_paciente"];
    $codigo_paciente =  $_POST["codigo_paciente"];
    $fechaNacimiento = $_POST["fecha_nacimiento_paciente"];
    $semanasEnGestacion = $_POST["semanas_gestacion"];
    $fechaInicioTratamiento = new DateTime();
    $fechaInicioTratamiento = $fechaInicioTratamiento->format('Y-m-d');
    //calcularEdadCorregidaSemanas();
    if ($Estudio->validarEvaluacionInicial($clave_paciente) == true) {
    echo "Ya existe una evaluacion inicial para este paciente";
    }else{
        echo "Primera evaluacion para paciente";
    };
?>