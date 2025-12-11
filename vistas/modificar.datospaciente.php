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

// 1. Lógica para recuperar datos (Híbrido entre sesión y POST como solicitaste)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["clave_paciente"])) {
    // Si vienen datos por POST (como en agregar)
    $clave_paciente = $_POST["clave_paciente"];
    $Con = conectar();
    $Estudio = new Estudios($Con);

    // Consulta básica del paciente
    $stmt = $Con->prepare("SELECT * FROM paciente WHERE clave_paciente = ?");
    $stmt->bind_param("i", $clave_paciente);
    $stmt->execute();
    $datos_db_paciente = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($datos_db_paciente) {
        // Recuperamos la última evaluación para llenarla en el formulario
        $ultimaEvaluacion = $Estudio->obtenerUltimaEvaluacionPaciente($clave_paciente);
        
        $datos_paciente_para_mostrar = [
            'clave_paciente'     => $clave_paciente,
            'codigo_paciente'    => $datos_db_paciente['codigo_paciente'],
            'nombre_paciente'    => trim(($datos_db_paciente['nombre_paciente'] ?? '') . ' ' . ($datos_db_paciente['apellido_paterno_paciente'] ?? '') . ' ' . ($datos_db_paciente['apellido_materno_paciente'] ?? '')),
            'talla'              => $ultimaEvaluacion['talla'] ?? '',
            'peso'               => $ultimaEvaluacion['peso'] ?? '',
            'perimetro_cefalico' => $ultimaEvaluacion['pc'] ?? '',
            'sdg'                => $datos_db_paciente['semanas_gestacion'],
            'fecha_nacimiento'   => $datos_db_paciente['fecha_nacimiento_paciente'],
            'fecha_terapia'      => $ultimaEvaluacion['fecha_terapia'] ?? date('Y-m-d'), // Fecha de la evaluación
            'factores_de_riesgo' => $ultimaEvaluacion['factores_riesgo'] ?? '',
            // Datos calculados iniciales (se recalcularán con JS)
            'edad_cronologica_ingreso_display' => '', 
            'edad_corregida_display' => '', 
            'fecha_nacimiento_corregida_display' => ''
        ];
        
        // --- LOGICA DEL CANDADO DE 7 DÍAS ---
        // Buscamos la fecha REAL de registro en la base de datos para esta evaluación
        // Si no tenemos ID específico, asumimos la última registrada para este paciente
        $stmtFecha = $Con->prepare("SELECT fecha_registro FROM terapia_neurov2 WHERE clave_paciente = ? ORDER BY id_terapia_neurohabilitatoriav2 DESC LIMIT 1");
        $stmtFecha->bind_param("i", $clave_paciente);
        $stmtFecha->execute();
        $stmtFecha->bind_result($fechaRegistroBD);
        if ($stmtFecha->fetch()) {
            $fechaRegistroRef = date('Y-m-d', strtotime($fechaRegistroBD));
        }
        $stmtFecha->close();
    } else {
        $error_mensaje = "Paciente no encontrado.";
    }
    $Con->close();

} else if (isset($_SESSION['datosPacienteParaEvaluacion'])) {
    // Si ya están en sesión (flujo normal de modificar)
    $datos_paciente_para_mostrar = $_SESSION['datosPacienteParaEvaluacion'];
    
    // Recalcular candado basado en lo que haya en sesión o consultar BD si es necesario
    // Aquí asumimos que si está en sesión, mantenemos la fecha de terapia actual como referencia si no hacemos query
    $fechaRegistroRef = $datos_paciente_para_mostrar['fecha_terapia'] ?? date('Y-m-d');
}

// Calcular rangos permitidos (+/- 7 días desde el REGISTRO)
$fechaMinimaPermitida = date('Y-m-d', strtotime($fechaRegistroRef . ' - 7 days'));
$fechaMaximaPermitida = date('Y-m-d', strtotime($fechaRegistroRef . ' + 7 days'));

// Guardar en sesión para persistencia
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
    <link href="<?=base_url("/assets/output.css")?>" rel="stylesheet"/>
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; }
        .bg-custom-main-box { background: linear-gradient(135deg, #E0F2FE 0%, #F0F9FF 100%); }
        .bg-custom-button { background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%); }
        .text-custom-title { color: #0369A1; }
        input[readonly], textarea[readonly] { background-color: #E5E7EB; cursor: default; border-color: #D1D5DB; color: #4B5563; }
        
        /* Estilos específicos del modo modificar */
        .input-editable { background-color: #FFFFFF; border-color: #9CA3AF; }
        .input-editable:focus { border-color: #0284C7; ring: 2px; }
        
        .date-locked {
            background-color: #FFFBEB; /* Amarillo muy suave */
            border-color: #FCD34D;
            color: #92400E;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Modificar Evaluación</h3></div>

    <div class="max-w-4xl mx-auto mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <?php if ($error_mensaje): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                <?php echo htmlspecialchars($error_mensaje); ?>
                <p><a href="modificar.view.php" class="underline">Volver a la búsqueda</a></p>
            </div>
        <?php else: ?>
            <form id="formPaso1">
                <div class="border-t border-b border-gray-400 py-2 mb-6">
                    <h1 class="text-xl font-semibold text-center text-gray-800">DATOS DEL PACIENTE</h1>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Paciente</label>
                        <input type="text" id="dp_nombre_paciente" value="<?php echo htmlspecialchars($datos_paciente_para_mostrar['nombre_paciente'] ?? ''); ?>" class="w-full p-2 border rounded-md" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Código Paciente</label>
                        <input type="text" id="dp_codigo_paciente" value="<?php echo htmlspecialchars($datos_paciente_para_mostrar['codigo_paciente'] ?? ''); ?>" class="w-full p-2 border rounded-md" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label>
                        <input type="date" id="dp_fecha_nacimiento" value="<?php echo htmlspecialchars($datos_paciente_para_mostrar['fecha_nacimiento'] ?? ''); ?>" class="w-full p-2 border rounded-md" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Semanas de Gestación</label>
                        <input type="text" id="dp_sdg" value="<?php echo htmlspecialchars($datos_paciente_para_mostrar['sdg'] ?? ''); ?>" class="w-full p-2 border rounded-md" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Talla (cm)*</label>
                        <input type="text" id="dp_talla" value="<?php echo htmlspecialchars($datos_paciente_para_mostrar['talla'] ?? ''); ?>" class="w-full p-2 border rounded-md input-editable">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Peso (kg)*</label>
                        <input type="text" id="dp_peso" value="<?php echo htmlspecialchars($datos_paciente_para_mostrar['peso'] ?? ''); ?>" class="w-full p-2 border rounded-md input-editable">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Perímetro Cefálico (cm)*</label>
                        <input type="text" id="dp_perimetro_cefalico" value="<?php echo htmlspecialchars($datos_paciente_para_mostrar['perimetro_cefalico'] ?? ''); ?>" class="w-full p-2 border rounded-md input-editable">
                    </div>

                    <div class="relative">
                        <label class="block text-sm font-medium text-blue-800 mb-1">Fecha de Evaluación*</label>
                        <input type="date" id="dp_fecha_inicio_tratamiento" 
                               value="<?php echo htmlspecialchars($datos_paciente_para_mostrar['fecha_terapia'] ?? ''); ?>" 
                               min="<?= $fechaMinimaPermitida ?>"
                               max="<?= $fechaMaximaPermitida ?>"
                               class="w-full p-2 border rounded-md date-locked cursor-pointer">
                        <p class="text-xs text-orange-600 mt-1">
                            Solo modificable entre <?= date('d/m', strtotime($fechaMinimaPermitida)) ?> y <?= date('d/m', strtotime($fechaMaximaPermitida)) ?>.
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Edad Cronológica (Calc)</label>
                        <input type="text" id="dp_edad_cronologica_ingreso_display" class="w-full p-2 border rounded-md" readonly>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Edad Corregida (Semanas)</label>
                        <input type="text" id="dp_edad_corregida_sem" class="w-full p-2 border rounded-md" readonly>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fecha Nac. Corregida</label>
                        <input type="date" id="dp_fecha_nacimiento_corregida_display" class="w-full p-2 border rounded-md" readonly>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="factores_riesgo" class="block text-sm font-medium text-gray-700 mb-1">Factores de Riesgo</label>
                    <textarea id="factores_riesgo" rows="3" class="w-full p-2 border rounded-md input-editable"><?php echo htmlspecialchars($datos_paciente_para_mostrar['factores_de_riesgo'] ?? ''); ?></textarea>
                </div>
                
                 <div class="mb-6">
                    <label for="observaciones" class="block text-sm font-medium text-gray-700 mb-1">Observaciones</label>
                    <textarea id="observaciones" rows="2" class="w-full p-2 border rounded-md input-editable"><?php echo htmlspecialchars($datos_paciente_para_mostrar['observaciones'] ?? ''); ?></textarea>
                </div>

                <div class="flex justify-between mt-8">
                    <a href="<?=base_url("/modificar")?>"> 
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">CANCELAR</button> 
                    </a>
                    <div class="text-sm text-gray-600 text-center hidden sm:block pt-2">
                        Paso 1 de 9 - Modificación
                    </div>
                    <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Referencias
            const els = {
                fechaEval: document.getElementById('dp_fecha_inicio_tratamiento'),
                fechaNac: document.getElementById('dp_fecha_nacimiento'),
                sdg: document.getElementById('dp_sdg'),
                edadCron: document.getElementById('dp_edad_cronologica_ingreso_display'),
                edadCorrSem: document.getElementById('dp_edad_corregida_sem'),
                fechaNacCorr: document.getElementById('dp_fecha_nacimiento_corregida_display'),
                talla: document.getElementById('dp_talla'),
                peso: document.getElementById('dp_peso'),
                pc: document.getElementById('dp_perimetro_cefalico'),
                riesgo: document.getElementById('factores_riesgo'),
                obs: document.getElementById('observaciones'),
                btnNext: document.getElementById('botonSiguientePaso')
            };

            // Datos base PHP
            const fechaRegistroRef = "<?= $fechaRegistroRef ?>";
            const minDate = "<?= $fechaMinimaPermitida ?>";
            const maxDate = "<?= $fechaMaximaPermitida ?>";
            const datosOriginales = <?php echo json_encode($datos_paciente_para_mostrar); ?>;

            // 1. FUNCIÓN DE CÁLCULO
            function recalcularEdades() {
                if (!els.fechaEval.value || !els.fechaNac.value) return;

                const fEval = new Date(els.fechaEval.value + 'T00:00:00');
                const fNac = new Date(els.fechaNac.value + 'T00:00:00');
                const sdg = parseInt(els.sdg.value, 10) || 40;

                // Diferencia en días
                const diffTime = fEval - fNac;
                const totalDias = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                // Formatear Edad Cronológica
                const anios = Math.floor(totalDias / 365.25);
                const meses = Math.floor((totalDias % 365.25) / 30.4375);
                const dias = Math.floor((totalDias % 365.25) % 30.4375);
                els.edadCron.value = `${anios} A, ${meses} M, ${dias} D`;

                // Calcular Corregida
                let diasCorregidos = totalDias;
                let diasPrematurez = 0;
                if (sdg < 39) {
                    diasPrematurez = (39 - sdg) * 7;
                    diasCorregidos = totalDias - diasPrematurez;
                }

                // Semanas Corregidas
                const semanasCorr = Math.floor(diasCorregidos / 7);
                els.edadCorrSem.value = semanasCorr;

                // Fecha Nacimiento Corregida
                const fNacCorr = new Date(fNac);
                fNacCorr.setDate(fNacCorr.getDate() + diasPrematurez);
                els.fechaNacCorr.value = fNacCorr.toISOString().split('T')[0];
            }

            // 2. VALIDACIÓN DE FECHA (CANDADO)
            if (els.fechaEval) {
                els.fechaEval.addEventListener('change', function() {
                    const val = this.value;
                    if (val < minDate || val > maxDate) {
                        alert(`⚠️ FECHA NO VÁLIDA\n\nSolo se permiten cambios de +/- 7 días respecto al registro original (${fechaRegistroRef}).`);
                        this.value = datosOriginales.fecha_terapia; // Restaurar
                    }
                    recalcularEdades();
                });
            }

            // 3. GUARDAR Y CONTINUAR
            if (els.btnNext) {
                els.btnNext.addEventListener('click', function() {
                    const dataToSave = {
                        ...datosOriginales,
                        talla: els.talla.value,
                        peso: els.peso.value,
                        perimetro_cefalico: els.pc.value,
                        fecha_terapia: els.fechaEval.value, // Nueva fecha
                        factores_de_riesgo: els.riesgo.value,
                        observaciones: els.obs.value,
                        // Guardar cálculos actualizados
                        edad_cronologica_ingreso_display: els.edadCron.value,
                        edad_corregida_display: els.edadCorrSem.value,
                        fecha_nacimiento_corregida_display: els.fechaNacCorr.value
                    };

                    sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(dataToSave));
                    
                    // Inicializar pasos si no existen
                    if(!sessionStorage.getItem('evaluacionPaso1')) sessionStorage.setItem('evaluacionPaso1', JSON.stringify({}));

                    window.location.href = "<?= base_url('/modificarKatona') ?>";
                });
            }

            // Ejecutar cálculo inicial
            recalcularEdades();
        });
    </script>
</body>
</html>