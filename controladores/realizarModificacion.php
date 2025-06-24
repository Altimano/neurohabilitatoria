<?php
session_start();
$json_input = file_get_contents('php://input');
$datos_recibidos = json_decode($json_input, true);
require './config/db.php';
require './funciones/funciones.php';
require './Clases/Estudios.php';
//var_dump($datos_recibidos);
date_default_timezone_set('America/Mexico_City');
$mapeo_campos_id = [
    'mk_elev_tronco_manos' => 1,
    'mk_elev_tronco_espalda' => 2,
    'mk_sentado_aire' => 3,
    'mk_rotacion_izq_der' => 4,
    'mk_gateo_asistido' => 5,
    'mk_gateo_asistido_mod' => 6,
    'mk_arrastre_horizontal' => 7,
    'mk_marcha_plano_horizontal' => 8,
    'mk_marcha_plano_ascendente' => 9,
    'mk_arrastre_inclinado_desc' => 10,
    'mk_arrastre_inclinado_asc' => 11,
    'mg_control_cefalico' => 1,
    'mg_levanta_torax' => 2,
    'mg_reaccion_delantera' => 3,
    'mg_cambio_decubito_prono_supino' => 4,
    'mg_sentado_sin_apoyo' => 5,
    'mg_reaccion_lateral_delantera' => 6,
    'mg_cambio_posicion_sedente_prono' => 7,
    'mg_patron_arrastre' => 8,
    'mg_cambio_posicion_cuatro_hincado' => 9,
    'mg_patron_gateo_independiente' => 10,
    'mg_gateo_niveles' => 11,
    'mg_transicion_gateo_bipedestacion' => 12,
    'mg_comienza_patron_marcha' => 13,
    'mg_pone_pie_sin_apoyo' => 14,
    'mg_camina_atras' => 15,
    'mg_camina_solo' => 16,
    'mg_sube_escaleras_apoyo_manos' => 17,
    'mg_patea_pelota' => 18,
    'mg_sube_escaleras_gateando' => 19,
    'mg_corre_rigidez' => 20,
    'mg_camina_solo_rara' => 21,
    'mg_sube_baja_escaleras' => 22,
    'mg_lanza_pelota' => 23,
    'mg_salta_sitio' => 24,
    'mg_juega_cuclillas' => 25,
    'mf_manos_linea_media' => 1,
    'mf_mantiene_objeto' => 2,
    'mf_estira_ambas_manos' => 3,
    'mf_estruja_papel' => 4,
    'mf_transfiere_manos' => 5,
    'mf_examina_objetos' => 6,
    'mf_desarrolla_agarre' => 7,
    'mf_inserta_agujero' => 8,
    'mf_pinza_superior' => 9,
    'mf_senala_indice' => 10,
    'mf_torre_2_cubos' => 11,
    'mf_garabatea_imitacion' => 12,
    'mf_toma_2_cubos_mano' => 13,
    'mf_torre_3_4_cubos' => 14,
    'mf_introduce_bolitas' => 15,
    'mf_vueltas_paginas' => 16,
    'mf_intenta_quitar_rosca' => 17,
    'mf_imita_trazo_vertical' => 18,
    'mf_torre_6_cubos' => 19,
    'mf_arma_tren_3_cubos' => 20,
    'lng_atencion_conjunta' => 1,
    'lng_realiza_voca_uao' => 2,
    'lng_juego_vocalico' => 3,
    'lng_mama_baba' => 4,
    'lng_emergencia_gestos' => 5,
    'lng_comprende_NO' => 6,
    'lng_primera_palabra' => 7,
    'lng_gestos_reconocimiento' => 8,
    'lng_emplea_palabras' => 9,
    'lng_forma_frases_2' => 10,
    'lng_dice_nombre' => 11,
    'lng_forma_frases_3' => 12,
    'tu_hipotonia' => 1,
    'tu_hipertonia' => 2,
    'tu_mixto' => 3,
    'tu_fluctuante' => 4,
    // tu Nomral? => 5
    'pt_Asimetria' => 1,
    'sa_aduccion_pulgares' => 1,
    'sa_estrabismo' => 2,
    'sa_irritabilidad' => 3,
    'sa_marcha_en_punta_presencia' => 4,
    'sa_marcha_cruzada_presencia' => 5,
    'sa_punos_cerrados_presencia' => 6,
    'sa_reflejo_hiperextension' => 7,
    'sa_lenguaje_escaso' => 8,
    'hg_control_cefalico' => 1,
    'hg_posicion_sentado' => 2,
    'hg_reacciones_proteccion' => 3,
    'hg_patron_arrastre' => 4,
    'hg_patron_gateo' => 5,
    'hg_mov_posturales_autonomos' => 6,
    'hg_patron_marcha_independiente' => 7,
    'hf_fijacion_ocular' => 1,
    'hf_cubito_palmar' => 2,
    'hf_presion_r' => 3,
    'hf_pinza_inferior' => 4,
    'hf_pinza_fina' => 5,
    'hf_abajamiento_voluntario' => 6,
    'hf_coordinacion_oculomanual' => 7,
];

$campos_modificar_paciente = [
    'talla' => 'talla',
    'peso' => 'peso',
    'perimetro_cefalico' => 'pc',
    'factores_de_riesgo' => 'factores_riesgo',
    'observaciones' => 'observaciones'
];

$datosPaciente = [];
$datosKatonaConID = [];
$datosMG = [];
$datosMF = [];
$datosLenguaje = [];
$datosPostura = [];
$datosTono = [];
$datosSignos = [];
$datosHitoMG = [];
$datosHitoMF = [];

if (isset($datos_recibidos)) {
    echo "Datos recibidos correctamente.\n";


    foreach ($datos_recibidos as $evaluacion => $campos) {

        foreach ($campos as $nombreEvaluacion => $resultados) {

            if (isset($campos_modificar_paciente[$nombreEvaluacion])) {
                $campo_modificado = $campos_modificar_paciente[$nombreEvaluacion];
                $datosPaciente[] = [
                    'campo' => $campo_modificado,
                    'resultados' => $resultados,
                ];
            } else {
                echo "Campo no encontrado: " . $nombreEvaluacion . "\n";
            }
            if ($nombreEvaluacion === 'fecha_evaluacion') continue; // Saltar fecha

            $campo_id = $mapeo_campos_id[$nombreEvaluacion];
            if (isset($mapeo_campos_id[$nombreEvaluacion])) {
                if (is_array($resultados)) {
                    $resultado_final = implode(', ', $resultados);
                }

                //echo "Campo: $nombreEvaluacion, Resultado: $resultado_final ID: $campo_id\n";

                if (strpos($nombreEvaluacion, 'mk') === 0) {
                    $datosKatonaConID[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultado_final,
                        'campo_id' => $campo_id,
                    ];
                } elseif (strpos($nombreEvaluacion, 'mg') === 0) {
                    $datosMG[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultados,
                        'campo_id' => $campo_id,
                    ];
                } elseif (strpos($nombreEvaluacion, 'mf') === 0) {
                    $datosMF[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultados,
                        'campo_id' => $campo_id,
                    ];
                } elseif (strpos($nombreEvaluacion, 'lng') === 0) {
                    $datosLenguaje[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultados,
                        'campo_id' => $campo_id,
                    ];
                } elseif (strpos($nombreEvaluacion, 'pt') === 0) {
                    $datosPostura[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultado_final,
                        'campo_id' => $campo_id,
                    ];
                } elseif (strpos($nombreEvaluacion, 'tu') === 0) {
                    $datosTono[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultado_final,
                        'campo_id' => $campo_id,
                    ];
                } elseif (strpos($nombreEvaluacion, 'sa') === 0) {
                    $datosSignos[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultados,
                        'campo_id' => $campo_id,
                    ];
                } elseif (strpos($nombreEvaluacion, 'hg') === 0) {
                    $datosHitoMG[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultados,
                        'campo_id' => $campo_id,
                    ];
                } elseif (strpos($nombreEvaluacion, 'hf') === 0) {
                    $datosHitoMF[] = [
                        'nombre_evaluacion' => $nombreEvaluacion,
                        'resultado' => $resultados,
                        'campo_id' => $campo_id,
                    ];
                }
            } else {
                echo "Campo: $nombreEvaluacion no encontrado en el mapeo.\n";
            }
        }
    }
    $log_data = [
        //'timestamp' => date('Y-m-d H:i:s'),
        'datos_recibidos' => $datos_recibidos,
        'json_crudo' => $json_input
    ];

    /*echo "Datos Finales del Paciente: ";
    print_r($datosPaciente);
    echo "Datos Finales para Katona:";
    print_r($datosKatonaConID);
    echo "\n";
    foreach ($datosKatonaConID as $campos => $resultados) {
        echo "Evaluacion?: " . $campos . "Resultado: " . $resultados;
    }
    echo "Datos Finales para MG:";
    print_r($datosMG);
    echo "\n";
    echo "Datos Finales para MF:";
    print_r($datosMF);
    echo "\n";
    echo "Datos Finales para LNG:";
    print_r($datosLenguaje);
    echo "\n";
    echo "Datos Finales para PT:";
    print_r($datosPostura);
    echo "\n";
    echo "Datos Finales para TU:";
    print_r($datosTono);
    echo "\n";
    echo "Datos Finales para SA:";
    print_r($datosSignos);
    echo "\n";
    echo "Datos Finales para HG:";
    print_r($datosHitoMG);
    echo "\n";
    echo "Datos Finales para HF:";
    print_r($datosHitoMF);*/

    $tabla = '';
    $nombreEval = '';
    $columnaEvaluacion = '';
    $columnaResultados = '';
    $resultado = '';
    $terapia_id = $_SESSION['id_terapia'];
    $id_evaluacion = '';
    $Con = conectar();

    if (isset($datosPaciente)) {
        $tabla = 'terapia_neurov2';
        foreach ($datosPaciente as $item) {
            $campo = $item['campo'];
            $resultado = mysqli_real_escape_string($Con, $item['resultados']);
            $sql = "UPDATE $tabla SET $campo = '$resultado' WHERE id_terapia_neurohabilitatoriav2 = $terapia_id";
            //echo $sql . "\n";
            Ejecutar($Con, $sql);
        }
    }

    if (isset($datosKatonaConID)) {
        $tabla = 'resultados_maniobras_katona';
        $columnaResultados = 'tono_muscular_topografia';
        $columnaEvaluacion = 'id_katona';
        foreach ($datosKatonaConID as $datosKatona) {
            $resultado = mysqli_real_escape_string($Con, $datosKatona['resultado']);
            $id_evaluacion = $datosKatona['campo_id'];
            $sql = "UPDATE $tabla SET $columnaResultados = '$resultado' WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
            //echo $sql . "\n";
            Ejecutar($Con, $sql);
        }
    }

    if (isset($datosMG)) {
        $tabla = 'resultados_sub_mg';
        $columnaResultados = 'resultado';
        $columnaEvaluacion = 'id_sub_grueso';
        foreach ($datosMG as $datosMGID) {
            $resultado = mysqli_real_escape_string($Con, $datosMGID['resultado']);
            $id_evaluacion = $datosMGID['campo_id'];
            $sql = "UPDATE $tabla SET $columnaResultados = '$resultado' WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
            // echo $sql . "\n";
            Ejecutar($Con, $sql);
        }
    }

    if (isset($datosMF)) {
        $tabla = 'resultados_sub_mf';
        $columnaResultados = 'resultado';
        $columnaEvaluacion = 'id_sub_fino';
        foreach ($datosMF as $datosMFID) {
            $resultado = mysqli_real_escape_string($Con, $datosMFID['resultado']);
            $id_evaluacion = $datosMFID['campo_id'];
            $sql = "UPDATE $tabla SET $columnaResultados = '$resultado' WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
            // echo $sql . "\n";
            Ejecutar($Con, $sql);
        }
    }

    if (isset($datosLenguaje)) {
        $tabla = 'resultados_sub_leng';
        $columnaResultados = 'resultado';
        $columnaEvaluacion = 'id_sub_leng';
        foreach ($datosLenguaje as $datosLenguajeID) {
            $resultado = mysqli_real_escape_string($Con, $datosLenguajeID['resultado']);
            $id_evaluacion = $datosLenguajeID['campo_id'];
            $sql = "UPDATE $tabla SET $columnaResultados = '$resultado' WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
            // echo $sql . "\n";
            Ejecutar($Con, $sql);
        }
    }

    if (isset($datosPostura)) {
        $tabla = 'resultados_postura';
        $columnaResultados = 'resultado';
        $columnaEvaluacion = 'id_postura';
        foreach ($datosPostura as $datosPosturaID) {
            $resultado = mysqli_real_escape_string($Con, $datosPosturaID['resultado']);
            $id_evaluacion = $datosPosturaID['campo_id'];
            $sql = "UPDATE $tabla SET $columnaResultados = '$resultado' WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
            // echo $sql . "\n";
            Ejecutar($Con, $sql);
        }
    }

    if (isset($datosTono)) {
        $tabla = 'resultados_tono_muscular';
        $columnaResultados = 'resultado';
        $columnaEvaluacion = 'id_tono_muscular_ubicacion';
        foreach ($datosTono as $datosTonoID) {
            $resultado = mysqli_real_escape_string($Con, $datosTonoID['resultado']);
            $id_evaluacion = $datosTonoID['campo_id'];
            $sql = "UPDATE $tabla SET $columnaResultados = '$resultado' WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
            // echo $sql . "\n";
            Ejecutar($Con, $sql);
        }
    }

    if (isset($datosSignos)) {
        $tabla = 'resultados_signos_alarma';
        $columnaResultados = 'resultado';
        $columnaEvaluacion = 'id_signos_alarma';
        foreach ($datosSignos as $datosSignoID) {
            $resultado = mysqli_real_escape_string($Con, $datosSignoID['resultado']);
            $id_evaluacion = $datosSignoID['campo_id'];
            if ($resultado === '0') {
                $sql = "DELETE FROM $tabla  WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
                //  echo $sql . "\n";
                Ejecutar($Con, $sql);
            }
        }
    }

    $datosPacienteSession = $_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'];
    $fechaEvaluacion = $datosPacienteSession['fecha_terapia'];
    $fechaNacimientoCorregida = $datosPacienteSession['fecha_nacimiento_edad_corregida'];
    echo "Fecha de Evaluación: " . $fechaEvaluacion . "\n";
    echo "Fecha de Nacimiento Corregida: " . $fechaNacimientoCorregida . "\n";
    $fechaEnSemana = calcularFechaEnSemana($fechaEvaluacion, $fechaNacimientoCorregida);
    $prueba = calcularFechaEnSemana('2023-10-01', '2023-01-01');
    echo $fechaEnSemana;
    $Estudio = new Estudios($Con);

    if (isset($datosHitoMG)) {
        $tabla = 'resultados_hitos_mg';
        $columnaEvaluacion = 'id_hito_motor_grueso';
        foreach ($datosHitoMG as $datosHitoMGID) {
            $resultado = mysqli_real_escape_string($Con, $datosHitoMGID['resultado']);
            $id_evaluacion = $datosHitoMGID['campo_id'];
            if ($Estudio->verificarEvaluacionesRepetidas($tabla, $terapia_id, $columnaEvaluacion, $id_evaluacion) === false) {
                if ($resultado === '4') {
                    $sql = "INSERT INTO $tabla (id_terapia_neuro, $columnaEvaluacion, fecha_consolidacion, fecha_consolidacion_semanas) VALUES ($terapia_id,$id_evaluacion,'$fechaEvaluacion',$fechaEnSemana)";
                    echo $sql . "\n";
                    Ejecutar($Con, $sql);
                } else {
                    $sql = "DELETE FROM $tabla WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
                    echo $sql . "\n";
                    Ejecutar($Con, $sql);
                }
            } else {
                if ($resultado === '4') {
                    echo "Ya hay un hito en la bd con ese mismo id";
                } else {
                    $sql = "DELETE FROM $tabla WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
                    echo $sql . "\n";
                    Ejecutar($Con, $sql);
                }
            }
        }
    }

        if (isset($datosHitoMF)) {
            $tabla = 'resultados_hitos_mf';
            $columnaEvaluacion = 'id_hito_mf';
            foreach ($datosHitoMF as $datosHitoMFID) {
                $resultado = mysqli_real_escape_string($Con, $datosHitoMFID['resultado']);
                $id_evaluacion = $datosHitoMFID['campo_id'];
                if($Estudio->verificarEvaluacionesRepetidas($tabla,$terapia_id,$columnaEvaluacion,$id_evaluacion) === false){
                    if($resultado === '4'){
                        $sql = "INSERT INTO $tabla (id_terapia_neuro, $columnaEvaluacion, fecha_consolidacion, fecha_consolidacion_semanas) VALUES ($terapia_id,$id_evaluacion,'$fechaEvaluacion',$fechaEnSemana)";
                        echo $sql . "\n";
                        Ejecutar($Con,$sql);
                    }else{
                        $sql = "DELETE FROM $tabla WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
                        echo $sql . "\n";
                        Ejecutar($Con,$sql);
                    }
                }else{
                    if($resultado === '4'){
                        echo "Ya hay un hito en la bd con ese mismo id";
                    }else{
                        $sql = "DELETE FROM $tabla WHERE id_terapia_neuro = $terapia_id AND $columnaEvaluacion = $id_evaluacion";
                        echo $sql . "\n";
                        Ejecutar($Con,$sql);
                    }
                }
            }
        }




    Cerrar($Con);

    file_put_contents('debug_ajax.log', print_r($log_data, true), FILE_APPEND);
} else {
    echo "No se recibieron datos válidos.\n";
}
