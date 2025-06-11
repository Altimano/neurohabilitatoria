<?php
// Este archivo recibirá el JSON completo de la evaluación desde el frontend.

// Deshabilitar la visualización de errores para producción
// ini_set('display_errors', 0);
// error_reporting(0);

// Incluye tu archivo de configuración de base de datos y funciones
// RUTA CORREGIDA: Subir un nivel (..) para acceder a la carpeta 'config' en la raíz
require_once '../config/db.php'; 
require_once '../funciones/funciones.php'; // Si tienes funciones auxiliares, también corrige su ruta

// Establecer la zona horaria
date_default_timezone_set('America/Mexico_City');

header('Content-Type: application/json'); // Indicar que la respuesta es JSON

$response = ['success' => false, 'message' => ''];

try {
    // Obtener el JSON enviado en el cuerpo de la solicitud
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true); // Decodificar el JSON a un array asociativo

    // Log para depuración: Muestra los datos recibidos del frontend
    error_log("Datos recibidos en guardarEvaluacionCompleta.php: " . print_r($data, true));

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Error al decodificar JSON: " . json_last_error_msg());
    }

    if (empty($data) || !isset($data['clave_paciente'])) {
        throw new Exception("Datos incompletos o inválidos recibidos.");
    }

    // Conectar a la base de datos
    $Con = conectar();
    if ($Con->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $Con->connect_error);
    }

    // --- Mapeo de evaluaciones (catalogos) ---
    // Este arreglo define las relaciones entre las claves de los datos de evaluación
    // y los IDs en las tablas de referencia de la base de datos.
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
    // --- Fin mapeo de evaluaciones ---


    // Extraer y preparar datos para la tabla `terapia_neurov2`
    // Convertir a tipo adecuado y escapar solo strings que van entre comillas
    
    // Valores numéricos sin comillas
    $clave_paciente_sql = (int)$data['clave_paciente'];
    $clave_personal_sql = (int)$data['clave_personal']; // Asegúrate de que esto sea numérico en el JSON
    
    // Valores de fecha y string que van entre comillas
    $fecha_inicio_terapia_sql = "'" . $Con->real_escape_string($data['fecha_inicio_tratamiento']) . "'";
    $fecha_terapia_sql = "'" . $Con->real_escape_string($data['fecha_inicio_tratamiento']) . "'"; // Usamos la misma fecha actual
    
    // 'edad_corregida_display' del JSON ("2015-08-22" en tu ejemplo) para `edad_corregida` (VARCHAR)
    // Asegúrate de que el tipo de dato en la base de datos sea lo suficientemente grande.
    $edad_corregida_sql = isset($data['edad_corregida_display']) ? "'" . $Con->real_escape_string($data['edad_corregida_display']) . "'" : 'NULL'; 
    
    $edad_cronologica_sql = isset($data['edad_cronologica_ingreso_display']) ? "'" . $Con->real_escape_string($data['edad_cronologica_ingreso_display']) . "'" : 'NULL';
    
    // --- CORRECCIÓN CRÍTICA para dat_ter_fech_nac_edad_correg ---
    // Asegurarse de insertar el NULL de SQL (sin comillas) o una fecha válida (con comillas).
    $dat_ter_fech_nac_edad_correg_sql = 'NULL'; // Valor por defecto: NULL de SQL
    if (isset($data['dat_ter_fech_nac_edad_correg_db_format']) && !empty($data['dat_ter_fech_nac_edad_correg_db_format'])) {
        $dat_ter_fech_nac_edad_correg_sql = "'" . $Con->real_escape_string($data['dat_ter_fech_nac_edad_correg_db_format']) . "'";
    } elseif (isset($data['fecha_nacimiento']) && !empty($data['fecha_nacimiento'])) {
        $dat_ter_fech_nac_edad_correg_sql = "'" . $Con->real_escape_string($data['fecha_nacimiento']) . "'";
    }
    // Si ambas no existen o están vacías, se mantiene 'NULL' como valor SQL.
    // -------------------------------------------------------------

    // Si tu JSON en `sdg` tiene "45" y "35" como strings, se usarán tal cual.
    // Si tiene un número, se convertirán a string y se citarán.
    $edad_cronologica_al_ingr_sem_sql = isset($data['sdg']) && !empty($data['sdg']) ? "'" . $Con->real_escape_string($data['sdg']) . "'" : 'NULL';
    $edad_correg_al_ingr_sem_sql = isset($data['sdg']) && !empty($data['sdg']) ? "'" . $Con->real_escape_string($data['sdg']) . "'" : 'NULL';
    
    $peso_sql = isset($data['peso']) && is_numeric($data['peso']) ? (int)$data['peso'] : 'NULL';
    $talla_sql = isset($data['talla']) && is_numeric($data['talla']) ? (int)$data['talla'] : 'NULL';
    
    $pc_sql = isset($data['perimetro_cefalico']) && !empty($data['perimetro_cefalico']) ? "'" . $Con->real_escape_string($data['perimetro_cefalico']) . "'" : 'NULL';
    $factores_riesgo_sql = isset($data['factores_de_riesgo']) && !empty($data['factores_de_riesgo']) ? "'" . $Con->real_escape_string($data['factores_de_riesgo']) . "'" : 'NULL';

    // Construir la consulta SQL con los valores directamente (¡PELIGROSO SIN PREPARED STATEMENTS!)
    $sql = "INSERT INTO `terapia_neurov2` (
                `clave_paciente`, `clave_personal`, `fecha_inicio_terapia`, `fecha_terapia`, 
                `edad_corregida`, `edad_cronologica`, `dat_ter_fech_nac_edad_correg`, 
                `edad_cronologica_al_ingr_sem`, `edad_correg_al_ingr_sem`, 
                `peso`, `talla`, `pc`, `factores_riesgo`
            ) VALUES (
                {$clave_paciente_sql}, {$clave_personal_sql}, {$fecha_inicio_terapia_sql}, {$fecha_terapia_sql}, 
                {$edad_corregida_sql}, {$edad_cronologica_sql}, {$dat_ter_fech_nac_edad_correg_sql}, 
                {$edad_cronologica_al_ingr_sem_sql}, {$edad_correg_al_ingr_sem_sql}, 
                {$peso_sql}, {$talla_sql}, {$pc_sql}, {$factores_riesgo_sql}
            )";

    // Log para depuración: Muestra la consulta SQL completa que se intentará ejecutar
    error_log("SQL para `terapia_neurov2`: " . $sql);

    // Ejecutar la consulta
    if (!$Con->query($sql)) {
        throw new Exception("Error al ejecutar la inserción en `terapia_neurov2`: " . $Con->error);
    }

    $id_terapia_neuro_generado = $Con->insert_id; // Obtener el ID recién insertado

    // --- SECCIÓN PARA GUARDAR RESULTADOS DE MANIOBRAS DE KATONA ---
    if (isset($data['katona']) && is_array($data['katona'])) {
        error_log("Procesando datos de Katona.");
        foreach ($evaluation_maps['katona'] as $key => $id_katona) {
            $tono_muscular_topografia_sql = 'NULL'; 
            
            if (isset($data['katona'][$key]) && is_array($data['katona'][$key]) && !empty($data['katona'][$key])) {
                $tono_muscular_topografia_sql = "'" . $Con->real_escape_string($data['katona'][$key][0]) . "'";
            } else if (isset($data['katona'][$key]) && !is_array($data['katona'][$key]) && !empty($data['katona'][$key])) {
                 $tono_muscular_topografia_sql = "'" . $Con->real_escape_string($data['katona'][$key]) . "'";
            }

            $sql_katona = "INSERT INTO `resultados_maniobras_katona` (
                                `id_terapia_neuro`, 
                                `id_katona`, 
                                `tono_muscular_topografia`
                            ) VALUES (
                                {$id_terapia_neuro_generado}, 
                                {$id_katona}, 
                                {$tono_muscular_topografia_sql}
                            )";

            error_log("SQL para `resultados_maniobras_katona` (Key: {$key}): " . $sql_katona);

            if (!$Con->query($sql_katona)) {
                error_log("Error al insertar Katona (Key: {$key}): " . $Con->error);
                $response['message'] .= " Error al guardar Katona " . $key . ": " . $Con->error . ".";
            }
        }
    } else {
        error_log("No se encontraron datos de Katona o el formato es incorrecto.");
    }
    // --- FIN SECCIÓN PARA GUARDAR RESULTADOS DE MANIOBRAS DE KATONA ---

    // --- SECCIÓN PARA GUARDAR RESULTADOS DE MOTOR GRUESO (sub_mg) ---
    if (isset($data['mgrueso']) && is_array($data['mgrueso'])) {
        error_log("Procesando datos de Motor Grueso (mgrueso).");
        foreach ($evaluation_maps['mgrueso'] as $key => $id_sub_grueso) {
            $resultado_sql = 'NULL'; 

            // El valor de mgrueso es un número, así que se espera directamente el '0' o '1' etc.
            if (isset($data['mgrueso'][$key]) && is_numeric($data['mgrueso'][$key])) {
                $resultado_sql = (int)$data['mgrueso'][$key];
            } else if (isset($data['mgrueso'][$key]) && !empty($data['mgrueso'][$key])) {
                // En caso de que se envíe como string pero sea convertible a número
                $resultado_sql = (int)$data['mgrueso'][$key];
            }

            $sql_mgrueso = "INSERT INTO `resultados_sub_mg` (
                                `id_terapia_neuro`, 
                                `id_sub_grueso`, 
                                `resultado`
                            ) VALUES (
                                {$id_terapia_neuro_generado}, 
                                {$id_sub_grueso}, 
                                {$resultado_sql}
                            )";

            error_log("SQL para `resultados_sub_mg` (Key: {$key}): " . $sql_mgrueso);

            if (!$Con->query($sql_mgrueso)) {
                error_log("Error al insertar Motor Grueso (Key: {$key}): " . $Con->error);
                $response['message'] .= " Error al guardar Motor Grueso " . $key . ": " . $Con->error . ".";
            }
        }
    } else {
        error_log("No se encontraron datos de Motor Grueso o el formato es incorrecto.");
    }
    // --- FIN SECCIÓN PARA GUARDAR RESULTADOS DE MOTOR GRUESO ---


    // Cerrar la conexión a la base de datos
    $Con->close();

    $response['success'] = true;
    $response['message'] = "Datos iniciales de la evaluación guardados exitosamente. ID de Terapia Neuro: " . $id_terapia_neuro_generado;
    $response['id_terapia_neuro'] = $id_terapia_neuro_generado;

} catch (Exception $e) {
    $response['message'] = "Error: " . $e->getMessage();
    error_log("Error en guardarEvaluacionCompleta.php: " . $e->getMessage());
    if (isset($Con) && $Con->ping()) {
        $Con->close();
    }
}

echo json_encode($response);
?>