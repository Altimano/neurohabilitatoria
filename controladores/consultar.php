<?php
session_start();
include './config/db.php';
include './Clases/Estudios.php';

$pacientes = [];

if ($_SESSION["session"] === 'okA') {

    //Si se recibió una accion desde el modal (esto nomas pal consultar)
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['accion'])) {
        if ($_POST['accion'] === 'consultar') {
            $_SESSION['consulta_paciente'] = [
                'id' => isset($_POST['id_terapia']) ? $_POST['id_terapia'] : ''
            ];
            require './vistas/consultarPaciente.view.php';
            exit;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['accion'])) {
        $Con = conectar();
        $Estudio = new Estudios($Con);

        if (empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
            $result = $Estudio->consultarTodosLosEstudiosv2();

        } elseif (!empty($_POST['Nombre']) && empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
            $Criterio = strtoupper($_POST['Nombre']);
            $result = $Estudio->consultarDatosPacienteNombre($Criterio);

        } elseif (!empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])) {
            $Criterio = strtoupper($_POST['Nombre']);
            $fechaInicial = $_POST['fechaInicial'];
            $fechaFinal = $_POST['fechaFinal'];
            $result = $Estudio->consultarDatosPacienteNombreyFecha($Criterio, $fechaInicial, $fechaFinal);

        } elseif (!empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
            $Criterio = strtoupper($_POST['Nombre']);
            $codigo = $_POST['codigo'];
            $result = $Estudio->consultarDatosPacienteNombreyClave($Criterio, $codigo);

        } elseif (empty($_POST['Nombre']) && empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])) {
            $fechaInicial = $_POST['fechaInicial'];
            $fechaFinal = $_POST['fechaFinal'];
            $result = $Estudio->consultarDatosPacienteFecha($fechaInicial, $fechaFinal);

        } elseif (empty($_POST['Nombre']) && !empty($_POST['codigo']) && !empty($_POST['fechaInicial']) && !empty($_POST['fechaFinal'])) {
            $fechaInicial = $_POST['fechaInicial'];
            $fechaFinal = $_POST['fechaFinal'];
            $codigo = $_POST['codigo'];
            $result = $Estudio->consultarDatosPacienteFechayClave($fechaInicial, $fechaFinal, $codigo);

        } elseif (empty($_POST['Nombre']) && !empty($_POST['codigo']) && empty($_POST['fechaInicial']) && empty($_POST['fechaFinal'])) {
            $Criterio = $_POST['codigo'];
            $result = $Estudio->consultarDatosPacienteClave($Criterio);
        }

        if (isset($result)) {
            while ($Fila = mysqli_fetch_assoc($result)) {
                $pacientes[] = $Fila;
            }
        }
    }

    require './vistas/consultar.view.php';
}