<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Evaluación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area {
            background-color: #FFFFFF;
        }

        .bg-custom-main-box {
            background-color: #E0F2FE;
        }

        .bg-custom-button {
            background-color: #0284C7;
        }

        .text-custom-title {
            color: #0369A1;
        }

        input[readonly],
        textarea[readonly] {
            background-color: #E5E7EB;
            cursor: default;
            border-color: #D1D5DB;
            color: #4B5563;
        }

        select:not([disabled]) {
            background-color: #FFFFFF;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="text-center my-6">
        <h3 class="text-2xl font-bold text-custom-title">Modificar una Evaluacion</h3>
    </div>

    <div class="max-w-4xl mx-auto mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="formPaso1">
            <div class="flex items-center space-x-4 mb-6">
                <label for="mes_seleccionado" class="block text-sm font-medium text-gray-700 whitespace-nowrap">Selecciona el mes de revision</label>
                <select name="mes" id="mes_seleccionado" required class="flex-grow p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione el mes</option>
                    <?php for ($i = 1; $i <= 24; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="border-t border-b border-gray-400 py-2 mb-6">
                <h1 class="text-xl font-semibold text-center text-gray-800">DATOS DEL PACIENTE</h1>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Nombre Paciente</label><input type="text" id="dp_nombre_paciente" name="nombre_paciente_display" value="<?= htmlspecialchars($datosPaciente['nombre_paciente']) ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Código Paciente</label><input type="text" id="dp_codigo_paciente" name="codigo_paciente_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['codigo_paciente']) ? $datos_paciente_para_mostrar['codigo_paciente'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label><input type="date" id="dp_fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_nacimiento']) ? $datos_paciente_para_mostrar['fecha_nacimiento'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; ?>></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Semanas de Gestacion(SDG)</label><input type="text" id="dp_sdg" name="sdg" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['sdg']) ? $datos_paciente_para_mostrar['sdg'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; ?>></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Talla</label><input type="text" id="dp_talla" name="talla" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['talla']) ? $datos_paciente_para_mostrar['talla'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; ?>></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Peso</label><input type="text" id="dp_peso" name="peso" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['peso']) ? $datos_paciente_para_mostrar['peso'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; ?>></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Perimetro Cefalico</label><input type="text" id="dp_perimetro_cefalico" name="perimetro_cefalico" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['perimetro_cefalico']) ? $datos_paciente_para_mostrar['perimetro_cefalico'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; ?>></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Evaluación Actual</label><input type="date" id="dp_fecha_inicio_tratamiento" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_inicio_tratamiento']) ? $datos_paciente_para_mostrar['fecha_inicio_tratamiento'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Edad Cronológica</label><input type="text" id="dp_edad_cronologica_ingreso_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['edad_cronologica_ingreso_display']) ? $datos_paciente_para_mostrar['edad_cronologica_ingreso_display'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha Nacimiento Corregida</label><input type="text" id="dp_edad_corregida_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['edad_corregida_display']) ? $datos_paciente_para_mostrar['edad_corregida_display'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
            </div>
            <div class="mb-6">
                <label for="factores_riesgo" class="block text-sm font-medium text-gray-700 mb-1">Factores de Riesgo</label>
                <textarea id="factores_riesgo" name="factores_riesgo" rows="3" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; ?>><?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['factores_de_riesgo']) ? $datos_paciente_para_mostrar['factores_de_riesgo'] : ''); ?></textarea>
            </div>

            <div class="flex justify-between mt-8">
                <a href="/modificar"> <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button> </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formPaso1 = document.getElementById('formPaso1');
            if (!formPaso1) return;

            function limpiarDatosPasosEvaluacion() {
                const clavesPasos = [
                    'evaluacionPaso1', 'evaluacionPaso2_mkatona', 'evaluacionPaso3_mgrueso',
                    'evaluacionPaso4_mfino', 'evaluacionPaso5_tmyubicacion',
                    'evaluacionPaso6_posturaysignos', 'evaluacionPaso7_hitomgrueso',
                    'evaluacionPaso8_hitomfino'
                ];
                clavesPasos.forEach(clave => sessionStorage.removeItem(clave));
            }

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar) && !$error_mensaje): ?>
                limpiarDatosPasosEvaluacion();
                try {
                    const datosPacienteActualesPHP = <?php echo json_encode($datos_paciente_para_mostrar); ?>;
                    sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPacienteActualesPHP));
                } catch (e) {
                    console.error("Error JS PHP block: guardar datos Paciente:", e);
                }
            <?php endif; ?>

            const datosPacienteGuardados = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let esPrimeraEvaluacionJS = false;
            let pacienteDataParaActualizar = {};

            if (datosPacienteGuardados) {
                try {
                    pacienteDataParaActualizar = JSON.parse(datosPacienteGuardados);
                    esPrimeraEvaluacionJS = pacienteDataParaActualizar.esPrimeraEvaluacion || false;

                    document.getElementById('dp_nombre_paciente').value = pacienteDataParaActualizar.nombre_paciente || '';
                    document.getElementById('dp_codigo_paciente').value = pacienteDataParaActualizar.codigo_paciente || '';
                    document.getElementById('dp_fecha_nacimiento').value = pacienteDataParaActualizar.fecha_nacimiento || '';
                    document.getElementById('dp_sdg').value = pacienteDataParaActualizar.sdg || '';
                    document.getElementById('dp_talla').value = pacienteDataParaActualizar.talla || '';
                    document.getElementById('dp_peso').value = pacienteDataParaActualizar.peso || '';
                    document.getElementById('dp_perimetro_cefalico').value = pacienteDataParaActualizar.perimetro_cefalico || '';
                    document.getElementById('dp_fecha_inicio_tratamiento').value = pacienteDataParaActualizar.fecha_inicio_tratamiento || '';
                    document.getElementById('dp_edad_cronologica_ingreso_display').value = pacienteDataParaActualizar.edad_cronologica_ingreso_display || '';
                    document.getElementById('dp_edad_corregida_display').value = pacienteDataParaActualizar.edad_corregida_display || '';
                    document.getElementById('factores_riesgo').value = pacienteDataParaActualizar.factores_de_riesgo || '';

                    const camposAfectadosPorPrimeraEval = [
                        'dp_talla', 'dp_peso', 'dp_perimetro_cefalico',
                        'dp_sdg', 'dp_fecha_nacimiento', 'factores_riesgo'
                    ];
                    camposAfectadosPorPrimeraEval.forEach(idCampo => {
                        const el = document.getElementById(idCampo);
                        if (el) {
                            el.readOnly = !esPrimeraEvaluacionJS;
                            if (el.readOnly) {
                                el.classList.add('bg-gray-200', 'cursor-default', 'text-gray-500');
                                el.classList.remove('bg-white');
                            } else {
                                el.classList.remove('bg-gray-200', 'cursor-default', 'text-gray-500');
                                el.classList.add('bg-white');
                            }
                        }
                    });
                } catch (e) {
                    console.error("Error JS: leyendo datosPacienteParaEvaluacion:", e);
                }
            } else if (formPaso1) {
                window.location.href = 'crear.view.php?error=datos_paciente_no_cargados';
            }

            const mesSelector = document.getElementById('mes_seleccionado');
            const botonSiguiente = document.getElementById('botonSiguientePaso');

            const datosPaso1Guardados = sessionStorage.getItem('evaluacionPaso1');
            if (datosPaso1Guardados) {
                try {
                    const datosJson = JSON.parse(datosPaso1Guardados);
                    if (mesSelector && datosJson.mes) mesSelector.value = datosJson.mes;
                } catch (e) {
                    sessionStorage.removeItem('evaluacionPaso1');
                }
            }

            if (botonSiguiente && mesSelector) {
                botonSiguiente.addEventListener('click', function() {
                    const mesSeleccionado = mesSelector.value;
                    if (!mesSeleccionado) {
                        alert('Por favor, selecciona un mes de revisión.');
                        return;
                    }

                    const datosPaso1 = {
                        mes: mesSeleccionado
                    };

                    if (pacienteDataParaActualizar.esPrimeraEvaluacion) {
                        pacienteDataParaActualizar.talla = document.getElementById('dp_talla').value;
                        pacienteDataParaActualizar.peso = document.getElementById('dp_peso').value;
                        pacienteDataParaActualizar.perimetro_cefalico = document.getElementById('dp_perimetro_cefalico').value;
                        pacienteDataParaActualizar.sdg = document.getElementById('dp_sdg').value;
                        pacienteDataParaActualizar.fecha_nacimiento = document.getElementById('dp_fecha_nacimiento').value;
                        pacienteDataParaActualizar.factores_de_riesgo = document.getElementById('factores_riesgo').value;
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(pacienteDataParaActualizar));
                    }

                    try {
                        sessionStorage.setItem('evaluacionPaso1', JSON.stringify(datosPaso1));
                        window.location.href = '/modificarKatona';
                    } catch (e) {
                        console.error("Error al guardar mes en sessionStorage:", e);
                        alert("Hubo un error al intentar guardar los datos.");
                    }
                });
            }
        });
    </script>
</body>

</html>