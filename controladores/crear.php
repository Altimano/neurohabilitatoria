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
    var_dump($_POST);
    echo "<br>";
    echo $clave_paciente;
    echo "<br>";
    echo $fechaInicioTratamiento;
    echo "<br>";
    echo $fechaNacimiento;
    echo "<br>";
    echo $semanasEnGestacion;
    echo "<br>";
    echo $codigo_paciente;
    echo "<br>";
    //calcularEdadCorregidaSemanas();
     echo calcularEdadCronologicaIngreso($fechaInicioTratamiento, $fechaNacimiento);
    echo "<br>";
     echo calcularFechaNacimientoCorregida($fechaNacimiento, $semanasEnGestacion);
    echo "<br>";
    var_dump($clave_paciente);
    echo "<br>";
    if ($Estudio->validarEvaluacionInicial($clave_paciente) == true) {
    echo "Ya existe una evaluacion inicial para este paciente";
    }else{
        echo "Primera evaluacion para paciente";
    };
