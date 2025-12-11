<?php
// vistas/modificar.datospaciente.php

require_once './funciones/funciones.php';
require_once './config/db.php';
require_once './Clases/Estudios.php';

$datos_paciente_para_mostrar = [];
$error_mensaje = null;

// Variables para el candado de fechas
$fechaMinimaPermitida = date('Y-m-d');
$fechaMaximaPermitida = date('Y-m-d');
$fechaRegistroRef = date('Y-m-d');

// 1. Si venimos de la tabla de búsqueda (POST) o recarga
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["clave_paciente"])) {
    
    $clave_paciente = $_POST["clave_paciente"];
    // Capturar ID específico de la tabla
    $id_terapia_especifica = isset($_POST["id_terapia"]) ? $_POST["id_terapia"] : null;

    $Con = conectar();
    $Estudio = new Estudios($Con);

    // Consulta básica del paciente
    $stmt = $Con->prepare("SELECT * FROM paciente WHERE clave_paciente = ?");
    $stmt->bind_param("i", $clave_paciente);
    $stmt->execute();
    $datos_db_paciente = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($datos_db_paciente) {
        $evaluacionCargada = null;

        // A) Definir qué evaluación cargar y establecer Sesión
        if ($id_terapia_especifica) {
            $stmtEval = $Con->prepare("SELECT * FROM terapia_neurov2 WHERE id_terapia_neurohabilitatoriav2 = ?");
            $stmtEval->bind_param("i", $id_terapia_especifica);
            $stmtEval->execute();
            $evaluacionCargada = $stmtEval->get_result()->fetch_assoc();
            $stmtEval->close();
            
            $_SESSION['id_terapia'] = $id_terapia_especifica;
        } else {
            // Fallback (última)
            $evaluacionCargada = $Estudio->obtenerUltimaEvaluacionPaciente($clave_paciente);
            if(isset($evaluacionCargada['id_terapia_neurohabilitatoriav2'])) {
                $_SESSION['id_terapia'] = $evaluacionCargada['id_terapia_neurohabilitatoriav2'];
            }
        }

        // --- LÓGICA PARA OBTENER EL NÚMERO DE TERAPIA (SECUENCIAL) ---
        $numero_terapia_display = 'N/A';
        if (isset($_SESSION['id_terapia'])) {
            $id_actual = $_SESSION['id_terapia'];
            // Contamos cuantas terapias existen para este paciente con ID menor o igual al actual
            // Esto nos dice si es la 1ra, 2da, 3ra...
            $stmtSeq = $Con->prepare("SELECT COUNT(*) as num FROM terapia_neurov2 WHERE clave_paciente = ? AND id_terapia_neurohabilitatoriav2 <= ?");
            $stmtSeq->bind_param("ii", $clave_paciente, $id_actual);
            $stmtSeq->execute();
            $resSeq = $stmtSeq->get_result()->fetch_assoc();
            $numero_terapia_display = $resSeq['num'];
            $stmtSeq->close();
        }

        // Recuperamos datos de la PRIMERA evaluación (Referencia)
        $stmt_primera = $Con->prepare("SELECT dat_ter_fech_nac_edad_correg, edad_cronologica, edad_corregida FROM terapia_neurov2 WHERE clave_paciente = ? ORDER BY id_terapia_neurohabilitatoriav2 ASC LIMIT 1");
        $stmt_primera->bind_param("i", $clave_paciente);
        $stmt_primera->execute();
        $primera_eval = $stmt_primera->get_result()->fetch_assoc();
        $stmt_primera->close();

        $datos_paciente_para_mostrar = [
            'clave_paciente'    => $clave_paciente,
            'id_terapia'        => $_SESSION['id_terapia'] ?? null,
            'numero_terapia'    => $numero_terapia_display, // Nuevo dato guardado
            'codigo_paciente'   => $datos_db_paciente['codigo_paciente'],
            'nombre_paciente'   => trim(($datos_db_paciente['nombre_paciente'] ?? '') . ' ' . ($datos_db_paciente['apellido_paterno_paciente'] ?? '') . ' ' . ($datos_db_paciente['apellido_materno_paciente'] ?? '')),
            
            'talla'             => $evaluacionCargada['talla'] ?? '',
            'peso'              => $evaluacionCargada['peso'] ?? '',
            'perimetro_cefalico'=> $evaluacionCargada['pc'] ?? '',
            'fecha_terapia'     => $evaluacionCargada['fecha_terapia'] ?? date('Y-m-d'),
            'factores_de_riesgo'=> $evaluacionCargada['factores_riesgo'] ?? '',
            'observaciones'     => $evaluacionCargada['observaciones'] ?? '',
            
            'sdg'               => $datos_db_paciente['semanas_gestacion'],
            'fecha_nacimiento'  => $datos_db_paciente['fecha_nacimiento_paciente'],
            
            'edad_cronologica_ingreso_display' => $primera_eval['edad_cronologica'] ?? '',
            'edad_corregida_display'           => $primera_eval['edad_corregida'] ?? '',
            'fecha_nacimiento_corregida_display'=> $primera_eval['dat_ter_fech_nac_edad_correg'] ?? '',
            
            'edad_corregida_actual_sem' => ''
        ];
        
        // Candado Fechas
        if (isset($evaluacionCargada['fecha_registro'])) {
            $fechaRegistroRef = date('Y-m-d', strtotime($evaluacionCargada['fecha_registro']));
        } else {
            $fechaRegistroRef = date('Y-m-d');
        }

    } else {
        $error_mensaje = "Paciente no encontrado.";
    }
    $Con->close();

// 2. Si venimos de sesión (navegación wizard)
} else if (isset($_SESSION['datosPacienteParaEvaluacion'])) {
    $datos_paciente_para_mostrar = $_SESSION['datosPacienteParaEvaluacion'];
    $fechaRegistroRef = $datos_paciente_para_mostrar['fecha_terapia'] ?? date('Y-m-d');
}

$fechaMinimaPermitida = date('Y-m-d', strtotime($fechaRegistroRef . ' - 7 days'));
$fechaMaximaPermitida = date('Y-m-d', strtotime($fechaRegistroRef . ' + 7 days'));

if (!empty($datos_paciente_para_mostrar)) {
    $_SESSION['datosPacienteParaEvaluacion'] = $datos_paciente_para_mostrar;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Evaluación</title>
    <link href="<?=base_url("/assets/output.css")?>" rel="stylesheet" />
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; }
        .bg-custom-main-box { background: linear-gradient(135deg, #E0F2FE 0%, #F0F9FF 100%); }
        .bg-custom-button { background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%); }
        .text-custom-title { color: #0369A1; }

        input[readonly], textarea[readonly] {
            background-color: #F3F4F6;
            cursor: default;
            border-color: #D1D5DB;
            color: #4B5563;
        }

        .form-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            transition: all 0.2s ease-in-out;
        }

        .form-section:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .form-field {
            background: white;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            transition: all 0.2s ease-in-out;
            font-size: 0.95rem;
            width: 100%;
        }

        .form-field:focus {
            outline: none;
            border-color: #0284C7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
            transform: translateY(-1px);
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.9rem;
            letter-spacing: 0.025em;
        }

        .section-divider {
            background: linear-gradient(90deg, transparent 0%, #D1D5DB 50%, transparent 100%);
            height: 2px;
            margin: 2rem 0;
            border-radius: 1px;
        }

        .floating-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #E5E7EB;
        }

        .progress-indicator {
            background: linear-gradient(90deg, #10B981 0%, #059669 100%);
            height: 4px;
            border-radius: 2px;
            transition: width 0.3s ease-in-out;
        }

        .navigation-buttons {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            margin-top: 2rem;
        }

        .btn-navigation {
            background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.2);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 120px;
        }

        .btn-navigation:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(2, 132, 199, 0.35);
            background: linear-gradient(135deg, #0369A1 0%, #1E40AF 100%);
        }

        .patient-data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .textarea-field {
            min-height: 120px;
            resize: vertical;
        }

        .date-locked {
            background-color: #FFFBEB !important;
            border-color: #FCD34D !important;
            color: #92400E !important;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Modificar Evaluación - Datos del Paciente
            </h3>
            <div class="mt-3 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator bg-blue-500 h-2 rounded-full" style="width: 11%;"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            
            <?php if ($error_mensaje): ?>
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded shadow-sm">
                    <strong>Error:</strong> <?php echo htmlspecialchars($error_mensaje); ?>
                    <p class="mt-2"><a href="<?=base_url("/modificar")?>" class="underline hover:text-red-900">Volver a la búsqueda</a></p>
                </div>
            <?php else: ?>

            <form id="formPaso1">
                <div class="form-section">
                    <div class="text-center mb-8">
                        <div class="inline-block bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-2xl px-8 py-4 shadow-lg">
                            <h1 class="text-2xl md:text-3xl font-bold">
                                DATOS DEL PACIENTE 
                                <span class="text-sm font-light block mt-1">(Editando Terapia N° <?= htmlspecialchars($datos_paciente_para_mostrar['numero_terapia'] ?? 'N/A') ?>)</span>
                            </h1>
                        </div>
                    </div>

                    <div class="patient-data-grid">
                        <div>
                            <label class="form-label">Nombre Paciente</label>
                            <input type="text" id="dp_nombre_paciente"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['nombre_paciente'] ?? '') ?>"
                                class="form-field" readonly>
                        </div>
                        <div>
                            <label class="form-label">Clave Paciente</label>
                            <input type="text" id="dp_clave_paciente"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['codigo_paciente'] ?? '') ?>"
                                class="form-field" readonly>
                        </div>
                        <div>
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" id="dp_fecha_nacimiento"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['fecha_nacimiento'] ?? '') ?>"
                                class="form-field" readonly>
                        </div>
                        <div>
                            <label class="form-label">Semanas de Gestación (SDG)</label>
                            <input type="text" id="dp_sdg"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['sdg'] ?? '') ?>"
                                class="form-field" readonly>
                        </div>

                        <div>
                            <label class="form-label text-blue-700">Talla (cm)</label>
                            <input type="text" id="dp_talla"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['talla'] ?? '') ?>"
                                class="form-field border-blue-200 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="form-label text-blue-700">Peso (kg)</label>
                            <input type="text" id="dp_peso"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['peso'] ?? '') ?>"
                                class="form-field border-blue-200 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="form-label text-blue-700">Perímetro Cefálico (cm)</label>
                            <input type="text" id="dp_perimetro_cefalico"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['perimetro_cefalico'] ?? '') ?>"
                                class="form-field border-blue-200 focus:border-blue-500">
                        </div>

                        <div>
                            <label class="form-label text-blue-700">Fecha de Evaluación</label>
                            <input type="date" id="dp_fecha_inicio_tratamiento"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['fecha_terapia'] ?? '') ?>"
                                min="<?= $fechaMinimaPermitida ?>"
                                max="<?= $fechaMaximaPermitida ?>"
                                class="form-field date-locked cursor-pointer">
                            <p class="text-xs text-orange-600 mt-1 font-medium">
                                Rango permitido: <?= date('d/m', strtotime($fechaMinimaPermitida)) ?> al <?= date('d/m', strtotime($fechaMaximaPermitida)) ?>
                            </p>
                        </div>

                        <div>
                            <label class="form-label">Edad Cronológica (Ingreso)</label>
                            <input type="text" id="dp_edad_cronologica_ingreso_display"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['edad_cronologica_ingreso_display'] ?? '') ?>"
                                class="form-field" readonly>
                        </div>
                        <div>
                            <label class="form-label">Fecha Nacimiento Corregida</label>
                            <input type="date" id="dp_fecha_nacimiento_corregida_display"
                                value="<?= htmlspecialchars($datos_paciente_para_mostrar['fecha_nacimiento_corregida_display'] ?? '') ?>"
                                class="form-field" readonly>
                        </div>
                        <div>
                            <label class="form-label text-green-700">Edad Corregida Actual (Semanas)</label>
                            <input type="text" id="dp_edad_corregida_actual_sem"
                                value=""
                                class="form-field bg-green-50 border-green-200 text-green-800 font-bold text-center" readonly>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <div>
                        <label for="factores_riesgo" class="form-label text-lg mb-3">Factores de Riesgo</label>
                        <textarea id="factores_riesgo" name="factores_riesgo" rows="3"
                            class="form-field textarea-field w-full"
                            placeholder="Describir los factores de riesgo..."><?= htmlspecialchars($datos_paciente_para_mostrar['factores_de_riesgo'] ?? '') ?></textarea>
                    </div>

                    <div class="mt-6">
                        <label for="observaciones" class="form-label text-lg mb-3">Observaciones</label>
                        <textarea id="observaciones" name="observaciones" rows="3"
                            class="form-field textarea-field w-full"
                            placeholder="Notas adicionales..."><?= htmlspecialchars($datos_paciente_para_mostrar['observaciones'] ?? '') ?></textarea>
                    </div>

                </div>

                <div class="navigation-buttons">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <a href="<?=base_url("/modificar")?>" class="btn-navigation bg-gray-500 hover:bg-gray-600">
                            ← CANCELAR
                        </a>
                        <button type="button" id="botonSiguientePaso" class="btn-navigation">
                            SIGUIENTE →
                        </button>
                    </div>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Limpiar sesiones antiguas si es carga nueva
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar)): ?>
                const clavesPasos = [
                    'evaluacionPaso1', 'evaluacionPaso2_mkatona', 'evaluacionPaso3_mgrueso',
                    'evaluacionPaso4_mfino', 'evaluacionPaso5_tmyubicacion',
                    'evaluacionPaso6_posturaysignos', 'evaluacionPaso7_hitomgrueso',
                    'evaluacionPaso8_hitomfino'
                ];
                clavesPasos.forEach(clave => sessionStorage.removeItem(clave));
            <?php endif; ?>

            const fechaEvalInput = document.getElementById('dp_fecha_inicio_tratamiento');
            const fechaNacCorregidaInput = document.getElementById('dp_fecha_nacimiento_corregida_display');
            const outputSemanasActual = document.getElementById('dp_edad_corregida_actual_sem');
            const btnSiguiente = document.getElementById('botonSiguientePaso');

            // Cálculo dinámico de semanas
            function calcularSemanasActuales() {
                if (!fechaEvalInput || !fechaNacCorregidaInput || !outputSemanasActual) return;
                
                const fechaEvaluacionStr = fechaEvalInput.value;
                const fechaNacCorregidaStr = fechaNacCorregidaInput.value;

                if (!fechaEvaluacionStr || !fechaNacCorregidaStr) {
                    outputSemanasActual.value = 'N/A';
                    return;
                }

                const fechaEvaluacion = new Date(fechaEvaluacionStr + 'T00:00:00');
                const fechaNacCorregida = new Date(fechaNacCorregidaStr + 'T00:00:00');

                if (isNaN(fechaEvaluacion.getTime()) || isNaN(fechaNacCorregida.getTime())) {
                    outputSemanasActual.value = 'Error Fecha';
                    return;
                }

                const diffMs = fechaEvaluacion.getTime() - fechaNacCorregida.getTime();
                const diffDias = Math.floor(diffMs / (1000 * 60 * 60 * 24));

                if (diffDias < 0) {
                     outputSemanasActual.value = '0'; 
                     return;
                }

                const semanas = Math.floor(diffDias / 7);
                outputSemanasActual.value = semanas.toString();
            }

            if (fechaEvalInput) {
                fechaEvalInput.addEventListener('change', calcularSemanasActuales);
                calcularSemanasActuales(); // Al cargar
            }

            // Guardar y avanzar
            if (btnSiguiente) {
                btnSiguiente.addEventListener('click', function() {
                    const datosActualizados = {
                        id_terapia: "<?= $datos_paciente_para_mostrar['id_terapia'] ?? '' ?>",
                        
                        talla: document.getElementById('dp_talla').value,
                        peso: document.getElementById('dp_peso').value,
                        perimetro_cefalico: document.getElementById('dp_perimetro_cefalico').value,
                        fecha_terapia: document.getElementById('dp_fecha_inicio_tratamiento').value,
                        factores_de_riesgo: document.getElementById('factores_riesgo').value,
                        observaciones: document.getElementById('observaciones').value,
                        
                        // Datos calculados
                        edad_corregida_actual_sem: document.getElementById('dp_edad_corregida_actual_sem').value,
                        fecha_nacimiento_edad_corregida: document.getElementById('dp_fecha_nacimiento_corregida_display').value,
                        
                        // Mantener numero de terapia en sesion JS
                        numero_terapia: "<?= $datos_paciente_para_mostrar['numero_terapia'] ?? 'N/A' ?>"
                    };

                    try {
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosActualizados));
                        
                        if(!sessionStorage.getItem('evaluacionPaso1')) {
                            sessionStorage.setItem('evaluacionPaso1', JSON.stringify({}));
                        }

                        window.location.href = "<?= base_url('/modificarKatona') ?>";
                    } catch (e) {
                        console.error("Error al guardar en sessionStorage:", e);
                        alert('Error local al procesar los datos. Revise la consola.');
                    }
                });
            }
        });
    </script>
</body>
</html>