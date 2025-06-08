<?php
$json_input = file_get_contents('php://input');
$datos_recibidos = json_decode($json_input, true);
var_dump($datos_recibidos); 
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
    'control_cefalico' => 1,
    'levanta_torax' => 2,
    'reaccion_delantera' => 3,
    'cambio_decubito_prono_supino' => 4,
    'sentado_sin_apoyo' => 5,
    'reaccion_lateral_delantera' => 6,
    'cambio_posicion_sedente_prono' => 7,
    'patron_arrastre' => 8,
    'cambio_posicion_cuatro_hincado' => 9,
    'patron_gateo_independiente' => 10,
    'gateo_niveles' => 11, 
    'transicion_gateo_bipedestacion' => 12,
    'comienza_patron_marcha' => 13,
    'pone_pie_sin_apoyo' => 14,
    'camina_atras' => 15,
    'camina_solo' => 16, 
    'Sube_escaleras_apoyo_manos' => 17, 
    'patea_pelota' => 18,
    'sube_escaleras_gateando' => 19,
    'corre_rigidez' => 20, 
    'camina_solo_rara' => 21, 
    'sube_baja_escaleras' => 22,
    'lanza_pelota' => 23,
    'salta_sitio' => 24,
    'juega_cuclillas' => 25,
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
    'lenguaje_atencion_conjunta' => 1,
    'lenguaje_realiza_voca_uao' => 2,
    'lenguaje_juego_vocalico' => 3,
    'lenguaje_mama_baba' => 4,
    'lenguaje_emergencia_gestos' => 5,
    'lenguaje_comprende_NO' => 6,
    'lenguaje_primera_palabra' => 7,
    'lenguaje_gestos_reconocimiento' => 8,
    'lenguaje_emplea_palabras' => 9,
    'lenguaje_forma_frases_2' => 10,
    'lenguaje_dice_nombre' => 11,
    'lenguaje_forma_frases_3' => 12,
    'tu_hipotonia' => 1,
    'tu_hipertonia' => 2,
    'tu_mixto' => 3,
    'tu_fluctuante' => 4,
    //Queda pendiente tu Nomral? => 5
    'Asimetria' => 1,
    'ps_aduccion_pulgares' => 1,
    'ps_estrabismo' => 2,
    'ps_irritabilidad' => 3,
    'ps_marcha_en_punta_presencia' => 4,
    'ps_marcha_cruzada_presencia' => 5,
    'ps_punos_cerrados_presencia' => 6,
    'ps_reflejo_hiperextension' => 7,
    'ps_lenguaje_escaso' => 8,
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

if(isset($datos_recibidos)){
    echo "Datos recibidos correctamente.\n";
} else {
    echo "No se recibieron datos válidos.\n";
}
if (isset($datos_recibidos['evaluacionPaso2_mkatona'])) {
    $mkatonaData = $datos_recibidos['evaluacionPaso2_mkatona'];
    //Tambien estaria mejor hacer un switch case para ver si isset una parte de los datos recibidos en especifico
    //Varias ideas, primero normalizar los nombres de los campos en las vistas para que sus iniciales coincidan con el tipo de evaluacion ej= mk_etc
    //Luego en el foreach recorrer los campos y adentro un case para que cada campo que encuentre con prefijos especificos se guarden en un array especifico para esos datos
    //De ahi usar esos arrays para hacer las modificaciones necesarias en la base de datos
    foreach ($datos_recibidos as $evaluacion => $campos) {
       foreach ($campos as $nombreEvaluacion => $resultados) {
            if ($campo === 'fecha_evaluacion') continue; // Saltar fecha
            $campo_id = $mapeo_campos_id[$nombreEvaluacion];
            if (isset($mapeo_campos_id[$nombreEvaluacion])) {
                if(is_array($resultados)){
                    $resultado_final = implode(', ', $resultados);
                }
                echo "Campo: $nombreEvaluacion, Resultado: $resultado_final ID: $campo_id\n";
            } else {
                echo "Campo: $nombreEvaluacion no encontrado en el mapeo.\n";
            }
        }
    }
    
    foreach ($mkatonaData as $campo => $valor) {
        if ($campo === 'fecha_evaluacion') continue; // Saltar fecha
        
        if (isset($mapeo_campos_id[$campo])) {
            $campo_id = $mapeo_campos_id[$campo];
            
            // Procesar el valor dependiendo si es array o no
            if (is_array($valor)) {
                // Si es array, convertir a string separado por comas
                $valor_final = implode(', ', $valor);
                echo "Campo: $campo, ID: $campo_id, Valores: $valor_final\n";
                
                // O si prefieres procesar cada valor por separado:
                foreach ($valor as $index => $item) {
                    echo "Campo: $campo, ID: $campo_id, Índice: $index, Valor: $item\n";
                }
            } else {
                // Si no es array, usar directamente
                echo "Campo: $campo, ID: $campo_id, Valor: $valor\n";
            }
        }
    }
}else {
    echo "No se encontraron datos de mkatona en la solicitud.\n";
}
$log_data = [
    //'timestamp' => date('Y-m-d H:i:s'),
    'datos_recibidos' => $datos_recibidos,
    'json_crudo' => $json_input
];

file_put_contents('debug_ajax.log', print_r($log_data, true), FILE_APPEND);

?>