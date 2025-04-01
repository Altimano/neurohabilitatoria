<?php
    session_start();
    include '../funciones/funciones.php';
    date_default_timezone_set('America/Mexico_City');
    $codigo_paciente =  $_POST["codigo_paciente"];
    $fechaNacimiento = $_POST["fecha_nacimiento_paciente"];
    $semanasEnGestacion = $_POST["semanas_gestacion"];
    $fechaInicioTratamiento = new DateTime();
    $fechaInicioTratamiento = $fechaInicioTratamiento->format('Y-m-d');
    echo $fechaInicioTratamiento;
    //calcularEdadCorregidaSemanas();
     echo calcularEdadCronologicaIngreso($fechaInicioTratamiento, $fechaNacimiento);
     echo calcularFechaNacimientoCorregida($fechaNacimiento, $semanasEnGestacion);
