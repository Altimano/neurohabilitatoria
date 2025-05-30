<?php
    session_start();
    include './funciones/funciones.php';
    include './config/db.php';
    include './Clases/Estudios.php';


    $id_terapia = $_POST["terapia_id"];
    $Con = conectar();
    $Estudio = new Estudios($Con);
    $resultPaciente = $Estudio->consultarDatosPacientev2($id_terapia);
    $datosPaciente = mysqli_fetch_assoc($resultPaciente);
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
    $resultCamposSignos = $Estudio->consultarCamposSignosAlarma();
    $datosCamposSignos = mysqli_fetch_all($resultCamposSignos);
    $dicKatona = generarDiccionario($datosKatona);
    $dicSubMG = generarDiccionario($datosSubMG);
    $dicSubMF = generarDiccionario($datosSubMF);
    $dicTono = generarDiccionario($datosTono);
    $dicSignos = generarDiccionario($datosSignos);
    $dicPostura = generarDiccionario($datosPostura);
    $dicLenguaje = generarDiccionario($datosLenguaje);
    $dicCamposSignos = generarDiccionario($datosCamposSignos);
    $_SESSION["dicKatona"] = $dicKatona;
    $_SESSION["dicSubMG"] = $dicSubMG;
    $_SESSION["dicSubMF"] = $dicSubMF;
    $_SESSION["dicTono"] = $dicTono;
    $_SESSION["dicSignos"] = $dicSignos;
    $_SESSION["dicPostura"] = $dicPostura;
    $_SESSION["dicLenguaje"] = $dicLenguaje;
    $_SESSION["dicCamposSignos"] = $dicCamposSignos;
    echo "El array con los datos de Katona es : "; print_r($datosKatona);
    foreach ($datosKatona as $dato) {
        echo "<br>";
        echo "El dato de Katona es: " . $dato[0] . " con el valor: " . $dato[1] . " y el id: " . $dato[2];
    }
    echo "<br>";
    echo $_SESSION["dicKatona"];
    echo "<br>";
    echo "El diccionario de las evaluaciones en katona que se ha registrado que el paciente ya tiene registrado "; var_dump($dicKatona);
    echo "<br>";
    echo "El diccionario de las evaluaciones en subMG que se ha registrado que el paciente ya tiene registrado "; var_dump($dicSubMG);
    echo "<br>";    
    echo "El array con los contenidos de POST"; var_dump($_POST);
    echo "<br>";
    require './vistas/modificarEvaluacion.view.php';