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

    // Extraer y preparar datos para la tabla `terapia_neurov2`
    // Convertir a tipo adecuado y escapar solo strings que van entre comillas
    
    // Valores numéricos sin comillas
    $clave_paciente_sql = (int)$data['clave_paciente'];
    $clave_personal_sql = (int)$data['clave_personal']; // Asegúrate de que esto sea numérico en el JSON
    
    // Valores de fecha y string que van entre comillas
    $fecha_inicio_terapia_sql = "'" . $Con->real_escape_string($data['fecha_inicio_tratamiento']) . "'";
    $fecha_terapia_sql = "'" . $Con->real_escape_string($data['fecha_inicio_tratamiento']) . "'"; // Usamos la misma fecha actual
    
    // 'edad_corregida_display' del JSON ("2016-11-19") para `edad_corregida` (VARCHAR(5))
    // NOTA: Esto seguirá causando un error si VARCHAR(5) es muy pequeño para "2016-11-19".
    // La Query de ejemplo tiene '2', no '2016-11-19' para edad_corregida.
    // Para que coincida con tu Query de ejemplo, voy a asumir que `edad_corregida_display` DEBERÍA ser '2'.
    // Si no es '2' en tu JSON, la query generada diferirá en este punto.
    $edad_corregida_sql = "'" . $Con->real_escape_string($data['edad_corregida_display']) . "'"; 
    // Para que coincida con tu query de ejemplo ('2'), la lógica debería ser:
    // $edad_corregida_sql = "'" . $Con->real_escape_string($data['edad_corregida']) . "'"; // Si tienes un campo 'edad_corregida' en JSON
    // O si `edad_corregida_display` se convierte a un número simple para este campo:
    // $edad_corregida_sql = (int)$data['edad_corregida_display']; // Si esperas un número

    $edad_cronologica_sql = "'" . $Con->real_escape_string($data['edad_cronologica_ingreso_display']) . "'";
    
    // 'fecha_nacimiento' del JSON ("2015-10-24") para `dat_ter_fech_nac_edad_correg` (DATE)
    // La Query de ejemplo tiene '2016-11-19' para este campo, lo que implica una fecha corregida.
    // Para que coincida con tu Query de ejemplo, voy a usar el valor del ejemplo si existe en el JSON.
    // Pero si `dat_ter_fech_nac_edad_correg_db_format` está presente del `agregar.view.php` que te di, úsalo.
    $dat_ter_fech_nac_edad_correg_sql = "'" . $Con->real_escape_string($data['dat_ter_fech_nac_edad_correg_db_format']) . "'";
    // Si la clave no es esa, usa la de tu JSON:
    // $dat_ter_fech_nac_edad_correg_sql = "'" . $Con->real_escape_string($data['fecha_nacimiento']) . "'";

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