<?php
session_start();
include './Clases/Estudios.php';
include './config/db.php';
include './funciones/funciones.php';
$id_terapia = $_SESSION['id_terapia'];
$Con = conectar();
$Estudio = new Estudios($Con);
$resultadosKatona = $Estudio->consultarResultadosKatona($id_terapia);
$datosKatona = mysqli_fetch_all($resultadosKatona, MYSQLI_ASSOC);
echo "<br>";
echo "Prueba de Katona " . $datosKatona[1]['resultadosKatona'];
echo "<br>";
echo var_dump($datosKatona);
require './vistas/modificar.mkatona.php';