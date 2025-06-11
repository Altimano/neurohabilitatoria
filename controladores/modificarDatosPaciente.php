<?php
session_start();
//PORFIN YA SE VE BONITO FAK FAK FAK
header('Content-Type: text/html; charset=UTF-8');
include './funciones/funciones.php';
include './config/db.php';
include './Clases/Estudios.php';
$datos_paciente_para_mostrar = [];
$error_mensaje = null;
$esPrimeraEvaluacion = false;

//terapia id va a ser el la variable de sesión que se va a usar para identificar al paciente
//y cargar sus datos, si no se ha enviado por POST, se va a buscar en la sesion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["terapia_id"])) {
    date_default_timezone_set('America/Mexico_City');
    $Con = conectar();

    $Estudio = new Estudios($Con);
    $id_terapia = $_POST["terapia_id"];
    $_SESSION['id_terapia'] = $id_terapia;
    // Usamos el id_terapia para realizar los metodos que se encargan de realizar las consultas y regresar los datos del paciente
    $resultPaciente = $Estudio->consultarDatosPacientev2($id_terapia);

    //En este caso como so es una fila usamos mysqli_fetch_assoc para obtener los datos del paciente para mas facilidad
    $datosPaciente = mysqli_fetch_assoc($resultPaciente);

    // Verificamos si este paciente ya tiene una terapia registrada con el metodo de la clase Estudios
    $esPrimeraEvaluacion = $Estudio->validarEvaluacionInicial($id_terapia);

    //Un array para almacenar los datos del paciente que se van a mostrar en la vista
    $datos_paciente_para_mostrar = [
        'id_terapia'            => $id_terapia,
        'clave_paciente'        => $datosPaciente['clave_paciente'],
        'fecha_terapia'         => $datosPaciente['fecha_terapia'],
        'nombre_paciente'       => $datosPaciente['nombre_paciente'],
        'talla'                 => $datosPaciente['talla'],
        'peso'                  => $datosPaciente['peso'],
        'perimetro_cefalico'    => $datosPaciente['pc'],
        'sdg'                   => $datosPaciente['semanas_gestacion'],
        'fecha_inicio_terapia'   => $datosPaciente['fecha_inicio_terapia'],
        'fecha_nacimiento'      => $datosPaciente['fecha_nacimiento_paciente'],
        'edad_corregida'        => $datosPaciente['edad_corregida'] ,
        'edad_cronologica'     => $datosPaciente['edad_cronologica'] ,
        'fecha_nacimiento_edad_corregida' => $datosPaciente['dat_ter_fech_nac_edad_correg'],
        
        'edad_corregida_display'   => $datosPaciente['edad_corregida'],
        'edad_cronologica_ingreso_display' => $datosPaciente['edad_cronologica_al_ingr_sem'],
        'factores_de_riesgo'    => $datosPaciente['factores_riesgo'],
        'esPrimeraEvaluacion'   => $esPrimeraEvaluacion
    ];
} 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar)) {
    $_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'] = $datos_paciente_para_mostrar;
}

/*$dicKatona = generarDiccionario($datosKatona);
$dicSubMG = generarDiccionario($datosSubMG);
$dicSubMF = generarDiccionario($datosSubMF);
$dicTono = generarDiccionario($datosTono);
$dicSignos = generarDiccionario($datosSignos);
$dicPostura = generarDiccionario($datosPostura);
$dicLenguaje = generarDiccionario($datosLenguaje);
$dicCamposSignos = generarDiccionario($datosCamposSignos);
*/
//Solo para ver si algo se esta filtrando por post y si los datos estan llegando correctamente
/*echo "El array con los contenidos de POST";
var_dump($_POST);
echo "<br>";
echo var_dump($datos_paciente_para_mostrar);*/
require './vistas/modificar.datospaciente.php';
