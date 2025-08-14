<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
//archivo encargado de cargar los datos del paciente en el area de lenguaje para mostrarlos en la vista de modificar lenguaje
include './Clases/Estudios.php';
include './config/db.php';
include './funciones/funciones.php';

$id_terapia = $_SESSION['id_terapia'];
$Con = conectar();
$Estudio = new Estudios($Con);
$resultadosLenguaje = $Estudio->consultarResultadosLenguaje($id_terapia);
$datosLenguaje = mysqli_fetch_all($resultadosLenguaje, MYSQLI_ASSOC);
/*echo "<br>";
echo "Prueba de Fino " . $datosLenguaje[1]['resultadosKatona'];
echo "<br>";
echo var_dump($datosLenguaje);*/

    require './vistas/modificar.lenguaje.php';