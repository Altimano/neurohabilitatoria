<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
//archivo encargado de cargar los datos del paciente en el area de subescalas motor grueso para mostrarlos en la vista de modificar grueso
include './Clases/Estudios.php';
include './config/db.php';
include './funciones/funciones.php';

$id_terapia = $_SESSION['id_terapia'];
$Con = conectar();
$Estudio = new Estudios($Con);
$resultadosSubMG = $Estudio->consultarResultadosSubMG($id_terapia);
$datosGruesos = mysqli_fetch_all($resultadosSubMG, MYSQLI_ASSOC);
/*echo "<br>";
echo "Prueba de Grueso " . $datosGruesos[1]['resultadosKatona'];
echo "<br>";
echo var_dump($datosGruesos);*/

require './vistas/modificar.mgrueso.php';