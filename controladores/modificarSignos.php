<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

include './Clases/Estudios.php';
include './config/db.php';
include './funciones/funciones.php';

$id_terapia = $_SESSION['id_terapia'];
$Con = conectar();
$Estudio = new Estudios($Con);

$resultadosSignos = $Estudio->consultarResultadosSignosAlarma($id_terapia);
$datosSignos = mysqli_fetch_all($resultadosSignos, MYSQLI_ASSOC);
/*echo "<br>";
echo "Prueba de Postura " . $datosSignos[0]['resultadosKatona'];
echo "<br>";
echo var_dump($datosSignos);*/
    require './vistas/modificar.signos_alarma.php';