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
    


];

if(isset($datos_recibidos)){
    echo "Datos recibidos correctamente.\n";
} else {
    echo "No se recibieron datos válidos.\n";
}
if (isset($datos_recibidos['evaluacionPaso2_mkatona'])) {
    $mkatonaData = $datos_recibidos['evaluacionPaso2_mkatona'];

    foreach ($datos_recibidos as $evaluacion => $campos) {
       foreach ($campos as $nombreEvaluacion => $resultados) {
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