<?php
session_start();
include '../config/db.php';
include '../Clases/Estudios.php';
if (isset($_POST['row_id'])) {
    $row_id = $_POST['row_id'];
    $Con = conectar();
    $Estudios = new Estudios($Con);
    $Estudios->eliminarEstudio($row_id);
}else{
    echo "No se ha podido eliminar el estudio.";
}