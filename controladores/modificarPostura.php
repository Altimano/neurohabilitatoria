<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
//archivo encargado de cargar los datos del paciente en el area de postura para mostrarlos en la vista de modificar postura
include './Clases/Estudios.php';
include './config/db.php';
include './funciones/funciones.php';

$id_terapia = $_SESSION['id_terapia'];
$Con = conectar();
$Estudio = new Estudios($Con);

$resultadosPostura = $Estudio->consultarResultadosPostura($id_terapia);
$datosPostura = mysqli_fetch_all($resultadosPostura, MYSQLI_ASSOC);

$resultadosTono = $Estudio->consultarResultadosTonoMuscUbi($id_terapia);
$datosTono = mysqli_fetch_all($resultadosTono, MYSQLI_ASSOC);
/*echo "<br>";
echo "Prueba de Postura " . $datosPostura[0]['resultadosKatona'];
echo "<br>";
echo var_dump($datosPostura);
echo "<br>";
echo "Prueba de Tono " . $datosTono[0]['resultadosKatona'];
echo "<br>";
echo var_dump($datosTono);*/

require './vistas/modificar.posturas_tmyu.php';