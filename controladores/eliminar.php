<?php
session_start();
//Controlador encargado de manejar la eliminacion de un estudio especifico en la pagina de consultar eliminar, al presionar el boton de eliminar se ejecuta el controlador
include './config/db.php';
include './Clases/Estudios.php';
if (isset($_POST['terapia_id'])) {
    $terapia_id = $_POST['terapia_id'];
    $Con = conectar();
    $Estudios = new Estudios($Con);
    $Estudios->eliminarEstudio($terapia_id);
    //En progreso hacer mas bonita la alerta
    echo "<script type='text/javascript'>alert('Evaluacion eliminada exitosamente');</script>";
}else{
    echo "No se ha podido eliminar el estudio.";
}