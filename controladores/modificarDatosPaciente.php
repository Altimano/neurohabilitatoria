<?php
session_start();
include './funciones/funciones.php';
include './config/db.php';
include './Clases/Estudios.php';
$datos_paciente_para_mostrar = [];
$error_mensaje = null;
$esPrimeraEvaluacion = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["terapia_id"])) {
    date_default_timezone_set('America/Mexico_City');
    $Con = conectar();

    $Estudio = new Estudios($Con);
    $id_terapia = $_POST["terapia_id"];
    $resultPaciente = $Estudio->consultarDatosPacientev2($id_terapia);
    $datosPaciente = mysqli_fetch_assoc($resultPaciente);
    $resultKatona = $Estudio->consultarResultadosKatona($id_terapia);
    $datosKatona = mysqli_fetch_all($resultKatona);
    $resultSubMG = $Estudio->consultarResultadosSubMG($id_terapia);
    $datosSubMG = mysqli_fetch_all($resultSubMG);
    $resultSubMF = $Estudio->consultarResultadosSubMF($id_terapia);
    $datosSubMF = mysqli_fetch_all($resultSubMF);
    $resultTono = $Estudio->consultarResultadosTonoMuscUbi($id_terapia);
    $datosTono = mysqli_fetch_all($resultTono);
    $resultSignos = $Estudio->consultarResultadosSignosAlarma($id_terapia);
    $datosSignos = mysqli_fetch_all($resultSignos);
    $resultPostura = $Estudio->consultarResultadosPostura($id_terapia);
    $datosPostura = mysqli_fetch_all($resultPostura);
    $resultLenguaje = $Estudio->consultarResultadosLenguaje($id_terapia);
    $datosLenguaje = mysqli_fetch_all($resultLenguaje);
    $resultCamposSignos = $Estudio->consultarCamposSignosAlarma();
    $datosCamposSignos = mysqli_fetch_all($resultCamposSignos);


    $datos_paciente_para_mostrar = [
        'id_terapia'            => $id_terapia,
        'clave_paciente'        => $datosPaciente['clave_paciente'],
        'codigo_paciente'       => $datosPaciente['codigo_paciente'],
        'fecha_terapia'         => $datosPaciente['fecha_terapia'],
        'nombre_paciente'       => $datosPaciente['nombre_paciente'],
        'talla'                 => $datosPaciente['talla'],
        'peso'                  => $datosPaciente['peso'],
        'perimetro_cefalico'    => $datosPaciente['pc'],
        'sdg'                   => $datosPaciente['semanas_gestacion'],
        'fecha_inicio_terapia'   => $datosPaciente['fecha_inicio_terapia'],
        'fecha_nacimiento'      => $datosPaciente['fecha_nacimiento_paciente'],
        'edad_corregida'        => $datosPaciente['edad_corregida'] ,
        'edad_cronologica'     => $datosPaciente['edad_cronologica'] ,
        'fecha_nacimiento_edad_corregida' => $datosPaciente['dat_ter_fech_nac_edad_correg'],
        
        'edad_corregida_display'   => $datosPaciente['edad_corregida'],
        'edad_cronologica_ingreso_display' => $datosPaciente['edad_cronologica_al_ingr_sem'],
        'factores_de_riesgo'    => $datosPaciente['factores_riesgo'],
        'esPrimeraEvaluacion'   => $esPrimeraEvaluacion
    ];
} /*else if (isset($_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'])) {
    $datos_paciente_para_mostrar = $_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'];
    $esPrimeraEvaluacion = isset($datos_paciente_para_mostrar['esPrimeraEvaluacion']) ? $datos_paciente_para_mostrar['esPrimeraEvaluacion'] : false;
} */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar)) {
    $_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'] = $datos_paciente_para_mostrar;
}

$dicKatona = generarDiccionario($datosKatona);
$dicSubMG = generarDiccionario($datosSubMG);
$dicSubMF = generarDiccionario($datosSubMF);
$dicTono = generarDiccionario($datosTono);
$dicSignos = generarDiccionario($datosSignos);
$dicPostura = generarDiccionario($datosPostura);
$dicLenguaje = generarDiccionario($datosLenguaje);
$dicCamposSignos = generarDiccionario($datosCamposSignos);
echo "El array con los contenidos de POST";
var_dump($_POST);
echo "<br>";
echo var_dump($datos_paciente_para_mostrar);
require './vistas/modificar.datospaciente.php';
