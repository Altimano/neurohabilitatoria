<?php
    session_start();
    include './funciones/funciones.php';
    include './config/db.php';
    include './Clases/Estudios.php';

    /*$nombresEvaluaciones = [
        'Control cefálico' => ['id' => 'control_cefalico', 'nombre' => 'Control cefálico'],
        'Control de tronco' => ['id' => 'control_tronco', 'nombre' => 'Control de tronco'], 
        'Sobre el abdomen levanta tórax apoyando brazos' => 'levanta_torax',
        'Sentado con reacción de protección delantera' => 'reaccion_delantera', 
        'Cambio de decúbito prono a decúbito supino' => 'cambio_decubito_prono_supino',
        'Sentado sin apoyo' => 'sentado_sin_apoyo', 
        'Reacciones de protección laterales y delanteras' => 'reaccion_lateral_delantera',
        'Cambio de posición sedente a decúbito prono' => 'cambio_posicion_sedente_prono', 
        'Patrón de arrastre*' => 'patron_arrastre',
        'Cambio de posición cuatro puntos a hincado' => 'cambio_posicion_cuatro_hincado', 
        'Patrón de gateo independiente*' => 'patron_gateo_independiente',
        'Gateo en diferentes niveles (colchón, planos, etc.)' => 'gateo_niveles', 
        'Transición gateo a bipedestación*' => 'transicion_gateo_bipedestacion',
        'Comienza el patrón de marcha*' => 'comienza_patron_marcha', 
        'Se pone de pie momentáneamente sin apoyarse' => 'pone_pie_sin_apoyo',
        'Camina hacia atrás' => 'camina_atras'
    ];
    foreach ($nombresEvaluaciones as $clave => $valor) {
        echo $clave; 
    }*/
    $Con = conectar();
    var_dump($_POST);
    //QUEDA PENDIENTE AGREGAR FUNCION PARA IR GUARDANDO TEMPORALMENTE LOS DATOS ENTRE PAGINAS
    $Estudio = new Estudios($Con);
    $result = $Estudio->consultarEstudioPorId($_POST["terapia_id"]);
    var_dump($_POST);
    if (isset($_POST["area"])) {
        //QUEDA PENDIENTE LLENAR TODOS LOS CAMPOS DE LA FUNCION modificarEstudio();
        //$Estudio->modificarEstudio();
      
    }else {
        print("NO HAY SUBMIT");
    }
    $evaluaciones = mysqli_fetch_assoc($result);
    $columnas = mysqli_fetch_fields($result);
    require './vistas/modificarEvaluacion.view.php';
