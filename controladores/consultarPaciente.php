<?php
//Este archivo se encarga de al seleccionar a un paciente en especifico, todos sus datos son cargados en variables para manipular y mostrar
require './config/db.php';
require './Clases/Estudios.php';
//Los metodos como argumento toman el id de la terapia, esta se toma de un campo escondido en la pagina de consultar donde se buscan por filtros 
//consultar.view.php en linea 127
$id_terapia = $_POST["terapia_id"];
$Con = conectar();
$Estudio = new Estudios($Con);

//Usamos el metodo consultarDatosPacientev2 para obtener los datos del paciente generales como nombre, clave, fechas, etc.
$resultPaciente = $Estudio->consultarDatosPacientev2($id_terapia);

//Almacenamos los datos del paciente en un array asociativo 
$datosPaciente = mysqli_fetch_assoc($resultPaciente);

//Ahora a cada tipo de estudio se hace lo mismo, se toman los resultados del metodo en una variable y posteriormente se almacenan en un array
$resultKatona = $Estudio->consultarResultadosKatona($id_terapia);
$datosKatona = mysqli_fetch_all($resultKatona);

$resultSubMG = $Estudio->consultarResultadosSubMG($id_terapia);
$datosSubMG = mysqli_fetch_all($resultSubMG);

$resultSubMF = $Estudio->consultarResultadosSubMF($id_terapia);
$datosSubMF = mysqli_fetch_all($resultSubMF);

$resultTono = $Estudio->consultarResultadosTonoMuscUbi($id_terapia);
$datosTono = mysqli_fetch_all($resultTono);

$resultSignos = $Estudio->consultarResultadosSignosAlarma($id_terapia);
$datosSignos = mysqli_fetch_all($resultSignos);

$resultPostura = $Estudio->consultarResultadosPostura($id_terapia);
$datosPostura = mysqli_fetch_all($resultPostura);

$resultLenguaje = $Estudio->consultarResultadosLenguaje($id_terapia);
$datosLenguaje = mysqli_fetch_all($resultLenguaje);
//var_dump($datosLoQueQuierasVer) para examinar los datos
require './vistas/consultarPaciente.view.php';