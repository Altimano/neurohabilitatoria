<?php
// Incluye la configuración de la base de datos y funciones auxiliares.
require_once './config/db.php';
require_once './funciones/funciones.php';

// Establece la zona horaria para un manejo consistente de fechas y horas.
date_default_timezone_set('America/Mexico_City');

// Define el tipo de contenido de la respuesta como JSON.
header('Content-Type: application/json');

// Inicializa la respuesta por defecto con éxito falso.
$response = ['success' => false, 'message' => ''];

try {
    // Recibe y decodifica el JSON con los datos de la evaluación enviados desde el frontend.
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    // Verifica si la decodificación JSON fue exitosa y si los datos están presentes.
    if (json_last_error() !== JSON_ERROR_NONE || empty($data) || !isset($data['clave_paciente'])) {
        throw new Exception("Datos de evaluación incompletos o inválidos.");
    }

    // Establece la conexión a la base de datos.
    $Con = conectar();
    if ($Con->connect_error) {
        throw new Exception("Error al conectar con la base de datos: " . $Con->connect_error);
    }

    // --- Mapeo de evaluaciones ---
    $evaluation_maps = [
        'katona' => [
            'mk_elev_tronco_manos' => 1, 'mk_elev_tronco_espalda' => 2, 'mk_sentado_aire' => 3,
            'mk_rotacion_izq_der' => 11, 'mk_gateo_asistido' => 4, 'mk_gateo_asistido_mod' => 5,
            'mk_arrastre_horizontal' => 6, 'mk_marcha_plano_horizontal' => 7, 'mk_marcha_plano_ascendente' => 8,
            'mk_arrastre_inclinado_desc' => 9, 'mk_arrastre_inclinado_asc' => 10,
        ],
        'mgrueso' => [
            'control_cefalico' => 1, 'levanta_torax' => 2, 'reaccion_delantera' => 3,
            'cambio_decubito_prono_supino' => 4, 'sentado_sin_apoyo' => 5, 'reaccion_lateral_delantera' => 6,
            'cambio_posicion_sedente_prono' => 7, 'patron_arrastre' => 8, 'cambio_posicion_cuatro_hincado' => 9,
            'patron_gateo_independiente' => 10, 'gateo_niveles' => 11, 'transicion_gateo_bipedestacion' => 12,
            'comienza_patron_marcha' => 13, 'pone_pie_sin_apoyo' => 14, 'camina_atras' => 15,
            'camina_solo_cae_frecuencia' => 16, 'Sube_escaleras_apoyo_manos' => 17, 'patea_pelota' => 18,
            'sube_escaleras_gateando' => 19, 'corre_rigidez' => 20, 'camina_solo_cae_raravez' => 21,
            'sube_baja_escaleras' => 22, 'lanza_pelota' => 23, 'salta_sitio' => 24, 'juega_cuclillas' => 25,
        ],
        'mfino' => [
            'mf_manos_linea_media' => 1, 'mf_mantiene_objeto' => 2, 'mf_estira_ambas_manos' => 3,
            'mf_estruja_papel' => 4, 'mf_transfiere_manos' => 5, 'mf_examina_objetos' => 6,
            'mf_desarrolla_agarre' => 7, 'mf_inserta_agujero' => 8, 'mf_pinza_superior' => 9,
            'mf_senala_indice' => 10, 'mf_torre_2_cubos' => 11, 'mf_garabatea_imitacion' => 12,
            'mf_toma_2_cubos_mano' => 13, 'mf_torre_3_4_cubos' => 14, 'mf_introduce_bolitas' => 15,
            'mf_vueltas_paginas' => 16, 'mf_intenta_quitar_rosca' => 17, 'mf_imita_trazo_vertical' => 18,
            'mf_torre_6_cubos' => 19, 'mf_arma_tren_3_cubos' => 20,
        ],
        'lenguaje' => [
            'lenguaje_atencion_conjunta' => 1, 'lenguaje_realiza_voca_uao' => 2, 'lenguaje_juego_vocalico' => 3,
            'lenguaje_mama_baba' => 4, 'lenguaje_emergencia_gestos' => 5, 'lenguaje_comprende_NO' => 6,
            'lenguaje_primera_palabra' => 7, 'lenguaje_gestos_reconocimiento' => 8, 'lenguaje_emplea_palabras' => 9,
            'lenguaje_forma_frases_2' => 10, 'lenguaje_dice_nombre' => 11, 'lenguaje_forma_frases_3' => 12,
        ],
        'postura' => [
            'Asimetria' => 1,
        ],
        'tono_muscular_tipos' => [
            'tu_hipotonia' => 1, 'tu_hipertonia' => 2, 'tu_mixto' => 3, 'tu_fluctuante' => 4,
        ],
        'signos_alarma_detalles' => [
            'ps_aduccion_pulgares' => 1, 'ps_estrabismo' => 2, 'ps_irritabilidad' => 3,
            'ps_marcha_en_punta_presencia' => 4, 'ps_marcha_cruzada_presencia' => 5,
            'ps_punos_cerrados_presencia' => 6, 'ps_reflejo_hiperextension' => 7,
            'ps_lenguaje_escaso' => 8, 'ps_marcha_en_punta_lado' => 9,
            'ps_marcha_cruzada_lado' => 10, 'ps_punos_cerrados_lado' => 11,
        ],
        'hitos_mg_fechas' => [
            'hg_control_cefalico' => 1, 'hg_posicion_sentado' => 2, 'hg_reacciones_proteccion' => 3,
            'hg_patron_arrastre' => 4, 'hg_patron_gateo' => 5, 'hg_mov_posturales_autonomos' => 6,
            'hg_patron_marcha_independiente' => 7,
        ],
        'hitos_mf_fechas' => [
            'hf_fijacion_ocular' => 1, 'hf_cubito_palmar' => 2, 'hf_presion_r' => 3,
            'hf_pinza_inferior' => 4, 'hf_pinza_fina' => 5, 'hf_abajamiento_voluntario' => 6,
            'hf_coordinacion_oculomanual' => 7,
        ],
    ];

    // Prepara los datos principales para la tabla 'terapia_neurov2'.
    $clave_paciente_sql = (int)$data['clave_paciente'];
    $clave_personal_sql = (int)$data['clave_personal'];
    $fecha_terapia_actual_sql = "'" . $Con->real_escape_string($data['fecha_inicio_tratamiento']) . "'";
    
    // Corroboramos si la fecha de inicio de terapia existente.
    $existing_fecha_inicio_terapia_sql = 'NULL';
    $sql_check_fecha_inicio = "SELECT `fecha_inicio_terapia` FROM `terapia_neurov2` WHERE `clave_paciente` = {$clave_paciente_sql} ORDER BY `id_terapia_neurohabilitatoriav2` ASC LIMIT 1";
    $result_check = $Con->query($sql_check_fecha_inicio);

    // Si encuentra un registro previo, usa su fecha de inicio; de lo contrario, usa la fecha de la evaluación actual.
    if ($result_check && $result_check->num_rows > 0) {
        $row = $result_check->fetch_assoc();
        $existing_fecha_inicio_terapia_sql = "'" . $Con->real_escape_string($row['fecha_inicio_terapia']) . "'";
    } else {
        $existing_fecha_inicio_terapia_sql = $fecha_terapia_actual_sql;
    }

    // Prepara la edad corregida (en semanas) desde el frontend.
    if (isset($data['edad_corregida_display']) && ($data['edad_corregida_display'] === '0' || !empty($data['edad_corregida_display']))) {
        $edad_corregida_sql = "'" . $Con->real_escape_string($data['edad_corregida_display']) . "'";
    } else {
        throw new Exception("El dato 'edad_corregida_display' (Edad Corregida en Semanas) no fue enviado o está vacío.");
    }

    // Prepara la edad cronológica desde el frontend.
    if (isset($data['edad_cronologica_ingreso_display']) && !empty($data['edad_cronologica_ingreso_display'])) {
        $edad_cronologica_sql = "'" . $Con->real_escape_string($data['edad_cronologica_ingreso_display']) . "'";
    } else {
        throw new Exception("El dato 'edad_cronologica_ingreso_display' (Edad Cronológica) no fue enviado o está vacío.");
    }
    
    // Determina la fecha de nacimiento corregida (YYYY-MM-DD) desde el frontend.
    if (isset($data['fecha_nacimiento_corregida_display']) && !empty($data['fecha_nacimiento_corregida_display'])) {
        $dat_ter_fech_nac_edad_correg_sql = "'" . $Con->real_escape_string($data['fecha_nacimiento_corregida_display']) . "'";
    } else {
        throw new Exception("El dato 'fecha_nacimiento_corregida_display' (Fecha Nacimiento Corregida YYYY-MM-DD) no fue enviado o está vacío.");
    }

    $edad_cronologica_al_ingr_sem_sql = isset($data['sdg']) && !empty($data['sdg']) ? "'" . $Con->real_escape_string($data['sdg']) . "'" : 'NULL';
    $edad_correg_al_ingr_sem_sql = isset($data['sdg']) && !empty($data['sdg']) ? "'" . $Con->real_escape_string($data['sdg']) . "'" : 'NULL';
    
    $peso_sql = isset($data['peso']) && is_numeric($data['peso']) ? (int)$data['peso'] : 'NULL';
    $talla_sql = isset($data['talla']) && is_numeric($data['talla']) ? (int)$data['talla'] : 'NULL';
    
    $pc_sql = isset($data['perimetro_cefalico']) && !empty($data['perimetro_cefalico']) ? "'" . $Con->real_escape_string($data['perimetro_cefalico']) . "'" : 'NULL';
    $factores_riesgo_sql = isset($data['factores_de_riesgo']) && !empty($data['factores_de_riesgo']) ? "'" . $Con->real_escape_string($data['factores_de_riesgo']) . "'" : 'NULL';

    // --- Obtener observaciones del apartado de Signos de Alarma ---
    $observaciones_generales_sql = 'NULL';
    if (isset($data['signos_alarma']['observaciones']) && !empty($data['signos_alarma']['observaciones'])) {
        $observaciones_generales_sql = "'" . $Con->real_escape_string($data['signos_alarma']['observaciones']) . "'";
    }

    // --- Lógica para determinar el número de evaluación ---
    $num_evaluacion_sql = 1; // Por defecto, si no hay estudios previos, es la evaluación #1
    $sql_get_last_eval = "SELECT MAX(num_evaluacion) as last_eval FROM `terapia_neurov2` WHERE `clave_paciente` = {$clave_paciente_sql}";
    $result_last_eval = $Con->query($sql_get_last_eval);

    if ($result_last_eval && $result_last_eval->num_rows > 0) {
        $row_last_eval = $result_last_eval->fetch_assoc();
        if ($row_last_eval['last_eval'] !== null) {
            $num_evaluacion_sql = $row_last_eval['last_eval'] + 1;
        }
    }

    // -- aqui agregar el timestamp
    $timestamp_sql = "'" . date('Y-m-d H:i:s') . "'";


    // Inserta los datos principales de la terapia en la tabla `terapia_neurov2`.
    $sql = "INSERT INTO `terapia_neurov2` (
                `clave_paciente`, `clave_personal`, `fecha_inicio_terapia`, `fecha_terapia`, 
                `edad_corregida`, `edad_cronologica`, `dat_ter_fech_nac_edad_correg`, 
                `edad_cronologica_al_ingr_sem`, `edad_correg_al_ingr_sem`, 
                `peso`, `talla`, `pc`, `factores_riesgo`,
                `observaciones`, `num_evaluacion`, `fecha_registro`
            ) VALUES (
                {$clave_paciente_sql}, {$clave_personal_sql}, {$existing_fecha_inicio_terapia_sql}, {$fecha_terapia_actual_sql}, 
                {$edad_corregida_sql}, {$edad_cronologica_sql}, {$dat_ter_fech_nac_edad_correg_sql}, 
                {$edad_cronologica_al_ingr_sem_sql}, {$edad_correg_al_ingr_sem_sql}, 
                {$peso_sql}, {$talla_sql}, {$pc_sql}, {$factores_riesgo_sql},
                {$observaciones_generales_sql}, {$num_evaluacion_sql}, {$timestamp_sql}
            )";

    if (!$Con->query($sql)) {
        throw new Exception("Error al insertar en `terapia_neurov2`: " . $Con->error);
    }

    // Obtiene el ID del registro recién insertado para usarlo en tablas relacionadas.
    $id_terapia_neuro_generado = $Con->insert_id;

    // --- Maniobras de Katona ---   
    if (isset($data['katona']) && is_array($data['katona'])) {
        foreach ($evaluation_maps['katona'] as $key => $id_katona) {
            $tono_muscular_topografia_sql = 'NULL'; 
            
            if (isset($data['katona'][$key])) {
                $katona_values = $data['katona'][$key];
                
                // Asegurar que sea un array
                if (!is_array($katona_values)) {
                    $katona_values = [$katona_values];
                }
                
                // Filtrar valores vacíos y concatenar con separador
                $katona_values = array_filter($katona_values, function($val) { 
                    return !empty($val); 
                });
                
                if (!empty($katona_values)) {
                    $concatenated_values = implode(', ', $katona_values);
                    $tono_muscular_topografia_sql = "'" . $Con->real_escape_string($concatenated_values) . "'";
                }
            }
            
            // Solo inserta si $tono_muscular_topografia_sql no es 'NULL'
            if ($tono_muscular_topografia_sql !== 'NULL') {
                $sql_katona = "INSERT INTO `resultados_maniobras_katona` 
                                (`id_terapia_neuro`, `id_katona`, `tono_muscular_topografia`) 
                                VALUES ({$id_terapia_neuro_generado}, {$id_katona}, {$tono_muscular_topografia_sql})";
                                
                if (!$Con->query($sql_katona)) {
                    $response['message'] .= " Error al guardar Katona {$key}: " . $Con->error . ".";
                }
            }
        }
    }
    

    // --- Motor Grueso ---
if (isset($data['mgrueso']) && is_array($data['mgrueso'])) {
    foreach ($evaluation_maps['mgrueso'] as $key => $id_sub_grueso) {

        // Verificamos si existe un valor y no es una cadena vacía
        if (isset($data['mgrueso'][$key]) && $data['mgrueso'][$key] !== '') {
            
            // Preparamos el valor numérico
            $resultado_sql = (int)$data['mgrueso'][$key];

            // Construimos y ejecutamos la consulta SOLO SI hay un valor válido
            $sql_mgrueso = "INSERT INTO `resultados_sub_mg` (`id_terapia_neuro`, `id_sub_grueso`, `resultado`) VALUES ({$id_terapia_neuro_generado}, {$id_sub_grueso}, {$resultado_sql})";

            if (!$Con->query($sql_mgrueso)) {
                $response['message'] .= " Error al guardar Motor Grueso {$key}: " . $Con->error . ".";
            }
        }
    }
}

    // --- Motor Fino ---
if (isset($data['mfino']) && is_array($data['mfino'])) {
    foreach ($evaluation_maps['mfino'] as $key => $id_sub_fino) {
        
        // Verificamos si existe un valor y no es una cadena vacía
        if (isset($data['mfino'][$key]) && $data['mfino'][$key] !== '') {
            
            // Preparamos el valor numérico
            $resultado_sql = (int)$data['mfino'][$key];

            // Construimos y ejecutamos la consulta SOLO SI hay un valor válido
            $sql_mfino = "INSERT INTO `resultados_sub_mf` (`id_terapia_neuro`, `id_sub_fino`, `resultado`) VALUES ({$id_terapia_neuro_generado}, {$id_sub_fino}, {$resultado_sql})";
            if (!$Con->query($sql_mfino)) {
                $response['message'] .= " Error al guardar Motor Fino {$key}: " . $Con->error . ".";
            }
        }
    }
}

// --- Lenguaje ---
if (isset($data['lenguaje']) && is_array($data['lenguaje'])) {
    foreach ($evaluation_maps['lenguaje'] as $key => $id_sub_leng) {

        // Verificamos si existe un valor y no es una cadena vacía
        if (isset($data['lenguaje'][$key]) && $data['lenguaje'][$key] !== '') {

            // Preparamos el valor numérico
            $resultado_sql = (int)$data['lenguaje'][$key];

            // Construimos y ejecutamos la consulta SOLO SI hay un valor válido
            $sql_lenguaje = "INSERT INTO `resultados_sub_leng` (`id_terapia_neuro`, `id_sub_leng`, `resultado`) VALUES ({$id_terapia_neuro_generado}, {$id_sub_leng}, {$resultado_sql})";
            if (!$Con->query($sql_lenguaje)) {
                $response['message'] .= " Error al guardar Lenguaje {$key}: " . $Con->error . ".";
            }
        }
    }
}

    // --- Postura y Tono Muscular ---
    if (isset($data['posturas_tmyu']) && is_array($data['posturas_tmyu'])) {
        // Guarda Asimetría en la tabla 'resultados_postura' con concatenación.
        if (isset($data['posturas_tmyu']['Asimetria'])) {
            $id_postura = $evaluation_maps['postura']['Asimetria'];
            $resultado_postura = 'NULL';
            
            if (isset($data['posturas_tmyu']['Asimetria'])) {
                $asimetria_values = $data['posturas_tmyu']['Asimetria'];
                
                // Asegurar que sea un array
                if (!is_array($asimetria_values)) {
                    $asimetria_values = [$asimetria_values];
                }
                
                // Filtrar valores vacíos y concatenar con separador
                $asimetria_values = array_filter($asimetria_values, function($val) {
                    return !empty($val);
                });
                
                if (!empty($asimetria_values)) {
                    $concatenated_values = implode(', ', $asimetria_values);
                    $resultado_postura = "'" . $Con->real_escape_string($concatenated_values) . "'";
                }
            }
            
            // Solo inserta si $resultado_postura no es 'NULL'
            if ($resultado_postura !== 'NULL') {
                $sql_postura = "INSERT INTO `resultados_postura` (`id_terapia_neuro`, `id_postura`, `resultado`) VALUES ({$id_terapia_neuro_generado}, {$id_postura}, {$resultado_postura})";
                if (!$Con->query($sql_postura)) {
                    $response['message'] .= " Error al guardar Postura (Asimetria): " . $Con->error . ".";
                }
            }
        }

        // Guarda los tipos de tono muscular con concatenación.
        foreach ($evaluation_maps['tono_muscular_tipos'] as $key => $id_tono_muscular_ubicacion) {
            $resultado_tono_muscular = 'NULL';
            
            if (isset($data['posturas_tmyu'][$key])) {
                $tono_values = $data['posturas_tmyu'][$key];
                
                // Asegurar que sea un array
                if (!is_array($tono_values)) {
                    $tono_values = [$tono_values];
                }
                
                // Filtrar valores vacíos y concatenar con separador
                $tono_values = array_filter($tono_values, function($val) {
                    return !empty($val);
                });
                
                if (!empty($tono_values)) {
                    $concatenated_values = implode(', ', $tono_values);
                    $resultado_tono_muscular = "'" . $Con->real_escape_string($concatenated_values) . "'";
                }
            }
            // Solo inserta si $resultado_tono_muscular no es 'NULL'
            if ($resultado_tono_muscular !== 'NULL') {
                $sql_tono_muscular = "INSERT INTO `resultados_tono_muscular` (`id_terapia_neuro`, `id_tono_muscular_ubicacion`, `resultado`) VALUES ({$id_terapia_neuro_generado}, {$id_tono_muscular_ubicacion}, {$resultado_tono_muscular})";
                if (!$Con->query($sql_tono_muscular)) {
                    $response['message'] .= " Error al guardar Tono Muscular {$key}: " . $Con->error . ".";
                }
            }
        }
    }

    // --- Signos de Alarma ---
    // NOTA: Las observaciones ya se extrajeron de $data['signos_alarma']['observaciones']
    // y se insertaron en `terapia_neurov2`.
    if (isset($data['signos_alarma']) && is_array($data['signos_alarma'])) {
        foreach ($evaluation_maps['signos_alarma_detalles'] as $key => $id_signos_alarma) {
            // Inserta solo si el signo de alarma está presente (valor '1' o no vacío).
            // Excluir 'observaciones' de este bucle ya que ya se manejó.
            if ($key !== 'observaciones' && isset($data['signos_alarma'][$key]) && (!empty($data['signos_alarma'][$key]) || $data['signos_alarma'][$key] === '1')) {
                $sql_signos_alarma = "INSERT INTO `resultados_signos_alarma` (`id_terapia_neuro`, `id_signos_alarma`) VALUES ({$id_terapia_neuro_generado}, {$id_signos_alarma})";
                if (!$Con->query($sql_signos_alarma)) {
                    $response['message'] .= " Error al guardar Signo de Alarma {$key}: " . $Con->error . ".";
                }
            }
        }
    }

    // --- Hitos Motor Grueso ---
if (isset($data['hitomgrueso']) && is_array($data['hitomgrueso'])) {
    // Se obtiene la fecha de evaluación general para este bloque
    $fecha_evaluacion_hitos_mg = isset($data['hitomgrueso']['fecha_evaluacion']) && !empty($data['hitomgrueso']['fecha_evaluacion']) 
                                ? "'" . $Con->real_escape_string($data['hitomgrueso']['fecha_evaluacion']) . "'" : 'NULL';

    foreach ($evaluation_maps['hitos_mg_fechas'] as $key => $id_hito_motor_grueso) {
        
        // La condición principal: solo proceder si el dato existe y no es una cadena vacía
        if (isset($data['hitomgrueso'][$key]) && $data['hitomgrueso'][$key] !== '') {

            // Preparamos el valor de "semanas"
            $fecha_consolidacion_semanas_sql = "'" . $Con->real_escape_string($data['hitomgrueso'][$key]) . "'";
            
            // Falta haver bien la consolidacion en semanas
            $fecha_consolidacion_sql = 'NULL'; 

            // Si el valor es '4', usamos la fecha de evaluación como fecha de consolidación
            if ($data['hitomgrueso'][$key] === '4') {
                $fecha_consolidacion_sql = $fecha_evaluacion_hitos_mg;
            }

            // Construimos y ejecutamos la consulta INSERT solo dentro de la condición
            $sql_hitos_mg = "INSERT INTO `resultados_hitos_mg` (`id_terapia_neuro`, `id_hito_motor_grueso`, `fecha_consolidacion`, `fecha_consolidacion_semanas`) VALUES ({$id_terapia_neuro_generado}, {$id_hito_motor_grueso}, {$fecha_consolidacion_sql}, {$fecha_consolidacion_semanas_sql})";
            if (!$Con->query($sql_hitos_mg)) {
                $response['message'] .= " Error al guardar Hito Motor Grueso {$key}: " . $Con->error . ".";
            }
        }
    }
}

// --- Hitos Motor Fino ---
if (isset($data['hitomfino']) && is_array($data['hitomfino'])) {
    // Se obtiene la fecha de evaluación general para este bloque
    $fecha_evaluacion_hitos_mf = isset($data['hitomfino']['fecha_evaluacion']) && !empty($data['hitomfino']['fecha_evaluacion']) 
                                ? "'" . $Con->real_escape_string($data['hitomfino']['fecha_evaluacion']) . "'" : 'NULL';

    foreach ($evaluation_maps['hitos_mf_fechas'] as $key => $id_hito_mf) {
        
        // La condición principal: solo proceder si el dato existe y no es una cadena vacía
        if (isset($data['hitomfino'][$key]) && $data['hitomfino'][$key] !== '') {

            // Preparamos el valor de "semanas"
            $fecha_consolidacion_semanas_sql = "'" . $Con->real_escape_string($data['hitomfino'][$key]) . "'";

            // Falta haver bien la consolidacion en semanas
            $fecha_consolidacion_sql = 'NULL'; 
            
            // Si el valor es '4', usamos la fecha de evaluación como fecha de consolidación
            if ($data['hitomfino'][$key] === '4') {
                $fecha_consolidacion_sql = $fecha_evaluacion_hitos_mf;
            }

            // Construimos y ejecutamos la consulta INSERT solo dentro de la condición
            $sql_hitos_mf = "INSERT INTO `resultados_hitos_mf` (`id_terapia_neuro`, `id_hito_mf`, `fecha_consolidacion`, `fecha_consolidacion_semanas`) VALUES ({$id_terapia_neuro_generado}, {$id_hito_mf}, {$fecha_consolidacion_sql}, {$fecha_consolidacion_semanas_sql})";
            if (!$Con->query($sql_hitos_mf)) {
                $response['message'] .= " Error al guardar Hito Motor Fino {$key}: " . $Con->error . ".";
            }
        }
    }
}

    // Cierra la conexión a la base de datos.
    $Con->close();

    // Establece la respuesta de éxito.
    $response['success'] = true;
    $response['message'] = "Evaluación guardada exitosamente. ID de Terapia Neuro: " . $id_terapia_neuro_generado;
    $response['id_terapia_neuro'] = $id_terapia_neuro_generado;

} catch (Exception $e) {
    // Manejo de errores: establece el mensaje de error en la respuesta.
    $response['message'] = "Error: " . $e->getMessage();
    // Cierra la conexión a la base de datos en caso de error.
    if (isset($Con) && $Con->ping()) {
        $Con->close();
    }
}

// Envía la respuesta JSON al frontend.
echo json_encode($response);
?>