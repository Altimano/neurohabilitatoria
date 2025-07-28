<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
//archivo encargado de cargar los datos del paciente en el area de katona para mostrarlos en la vista de modificar katona
include './Clases/Estudios.php';
include './config/db.php';
include './funciones/funciones.php';
$id_terapia = $_SESSION['id_terapia'];
$Con = conectar();
$Estudio = new Estudios($Con);
$resultadosKatona = $Estudio->consultarResultadosKatona($id_terapia);
$datosKatona = mysqli_fetch_all($resultadosKatona, MYSQLI_ASSOC);
//var_dump($datosKatona); para ver los datos que se estan obteniendo
require './vistas/modificar.mkatona.php';