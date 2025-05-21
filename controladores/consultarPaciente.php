<?php
session_start();
require './config/db.php';
require './Clases/Estudios.php';
$id_terapia = $_POST["terapia_id"];
$Con = conectar();
$Estudio = new Estudios($Con);
$result = $Estudio->consultarDatosPacientev2($id_terapia);
$filas = [];
while ($fila = mysqli_fetch_assoc($result)) {
    $filas[] = $fila;
}
echo $filas[0]["clave_paciente"];
require './vistas/consultarPaciente.view.php';