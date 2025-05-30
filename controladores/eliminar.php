<?php
session_start();
include './config/db.php';
include './Clases/Estudios.php';
if (isset($_POST['terapia_id'])) {
    $terapia_id = $_POST['terapia_id'];
    $Con = conectar();
    $Estudios = new Estudios($Con);
    $Estudios->eliminarEstudio($terapia_id);
    echo "<script type='text/javascript'>alert('Evaluacion eliminada exitosamente');</script>";
}else{
    echo "No se ha podido eliminar el estudio.";
}