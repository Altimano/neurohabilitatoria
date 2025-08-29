<?php
header('Content-Type: text/html; charset=UTF-8');
//archivo encargado de cargar los datos del paciente en el area de subescalas motor fino para mostrarlos en la vista de modificar fino
include './Clases/Estudios.php';
include './config/db.php';
include './funciones/funciones.php';

$id_terapia = $_SESSION['id_terapia'];
$Con = conectar();
$Estudio = new Estudios($Con);
$resultadosSubMF = $Estudio->consultarResultadosSubMF($id_terapia);
$datosFinos = mysqli_fetch_all($resultadosSubMF, MYSQLI_ASSOC);
/*echo "<br>";
echo "Prueba de Fino " . $datosFinos[1]['resultadosKatona'];
echo "<br>";
echo var_dump($datosFinos);*/

require './vistas/modificar.mfino.php';