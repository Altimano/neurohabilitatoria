<?php
session_start();
include './config/db.php';
include './Clases/Estudios.php';
$pacientes = [];


// Verifica si la sesión está activa
if ($_SESSION["session"] === 'okA') {
    $Con = conectar();
    $Estudio = new Estudios($Con);
    $Criterio = strtoupper($_POST['Nombre']);
    $fechaInicial = $_POST['fechaInicial'];
    $fechaFinal = $_POST['fechaFinal'];
    $codigo = $_POST['codigo'];
    
    //Si no se envian criterios de busqueda, se consultan los ultimos 100 estudios mas recientes
    if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $result = $Estudio->consultarTodosLosEstudiosv2();

    //Si solo se escribe el campo de nombre envia los datos en base a un like del nombre ingresado
    }elseif ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
        $result = $Estudio->consultarDatosPacienteNombre($Criterio);
        
    //Si se envia el campo de nombre y fechas
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $result = $Estudio->consultarDatosPacienteNombreyFecha($Criterio,$fechaInicial,$fechaFinal);

        //Si se envia el campo de nombre y clave
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $result = $Estudio->consultarDatosPacienteNombreyClave($Criterio,$codigo);

        //Si se envia el campo de fechas
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $result = $Estudio->consultarDatosPacienteFecha($fechaInicial,$fechaFinal);

        //Si se envia el campo de fechas y clave
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])){
        $result = $Estudio->consultarDatosPacienteFechayClave($fechaInicial,$fechaFinal,$codigo);

        //Si se envia solo el campo de clave
    }elseif($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])){
        $result = $Estudio->consultarDatosPacienteClave($codigo);
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        // Del  resultado regresado lo agregamos a un array para luego iterarlo en la vista
        while ($Fila = mysqli_fetch_assoc($result)) {
        $pacientes[] = $Fila;
         }
    }
    //Carga la vista de eliminación
    require './vistas/eliminar.view.php';
}