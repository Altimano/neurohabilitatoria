<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitos de Desarrollo Motor Grueso</title>
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

        input[readonly] {
            background-color: #f3f4f6;
            cursor: default;
        }

        input[type="date"][readonly] {
            background-color: #f3f4f6;
            cursor: default;
        }

        .hito-display {
            padding: 0.5rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.375rem;
            background-color: #E5E7EB;
            color: #4B5563;
            min-height: 2.5rem;
            display: flex;
            align-items: center;
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="text-center my-6">
        <h3 class="text-2xl font-bold text-custom-title">Modificar Evaluacion</h3>
    </div>

    <div class="max-w-4xl mx-auto mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionHitoMGruesoForm" class="text-center">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-2">
                <h1 class="text-xl font-semibold text-center text-gray-800">HITOS DE DESARROLLO (MOTOR GRUESO)</h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6 text-left">
                <div>
                    <label for="hg_control_cefalico_display" class="block text-sm font-medium text-gray-700 mb-1">Control cefálico</label>
                    <p id="hg_control_cefalico_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_control_cefalico" id="hg_control_cefalico_value">
                </div>
                <div>
                    <label for="hg_posicion_sentado_display" class="block text-sm font-medium text-gray-700 mb-1">Posición de sentado</label>
                    <p id="hg_posicion_sentado_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_posicion_sentado" id="hg_posicion_sentado_value">
                </div>
                <div>
                    <label for="hg_reacciones_proteccion_display" class="block text-sm font-medium text-gray-700 mb-1">Reacciones de protección</label>
                    <p id="hg_reacciones_proteccion_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_reacciones_proteccion" id="hg_reacciones_proteccion_value">
                </div>
                <div>
                    <label for="hg_patron_arrastre_display" class="block text-sm font-medium text-gray-700 mb-1">Patrón de arrastre</label>
                    <p id="hg_patron_arrastre_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_patron_arrastre" id="hg_patron_arrastre_value">
                </div>
                <div>
                    <label for="hg_patron_gateo_display" class="block text-sm font-medium text-gray-700 mb-1">Patrón de gateo</label>
                    <p id="hg_patron_gateo_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_patron_gateo" id="hg_patron_gateo_value">
                </div>
                <div>
                    <label for="hg_mov_posturales_autonomos_display" class="block text-sm font-medium text-gray-700 mb-1">Movimientos posturales autónomos</label>
                    <p id="hg_mov_posturales_autonomos_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_mov_posturales_autonomos" id="hg_mov_posturales_autonomos_value">
                </div>
                <div>
                    <label for="hg_patron_marcha_independiente_display" class="block text-sm font-medium text-gray-700 mb-1">Patrón de marcha independiente</label>
                    <p id="hg_patron_marcha_independiente_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_patron_marcha_independiente" id="hg_patron_marcha_independiente_value">
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="/modificarSignos">
                    <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('fecha_evaluacion');
        const sessionKeyThisStep = 'evaluacionPaso8_hitomgrueso';

        const datosGuardadosEstePaso = sessionStorage.getItem(sessionKeyThisStep);
        let datosJsonEstePaso = {};
        if (datosGuardadosEstePaso) {
            try {
                datosJsonEstePaso = JSON.parse(datosGuardadosEstePaso);
            } catch (e) {
                console.error(`Error Paso 8 (Hito M. Grueso) al parsear datos guardados:`, e);
                sessionStorage.removeItem(sessionKeyThisStep);
            }
        }

        if (dateInput) {
            if (datosJsonEstePaso.fecha_evaluacion) {
                dateInput.value = datosJsonEstePaso.fecha_evaluacion;
            } else {
                const datosPaso7Raw = sessionStorage.getItem('evaluacionPaso7_signos_alarma');
                if (datosPaso7Raw) {
                    try {
                        const dP7 = JSON.parse(datosPaso7Raw);
                        if (dP7.fecha_evaluacion) dateInput.value = dP7.fecha_evaluacion;
                    } catch (e) {
                        console.error("Error Paso 8 (Hito M. Grueso): No se pudo parsear JSON de evaluacionPaso7_signos_alarma.", e);
                    }
                }
                if (!dateInput.value) {
                    const t = new Date();
                    dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`;
                }
            }
        }

        const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
        const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
        if (datosPaso1Raw) {
            try {
                const dP1 = JSON.parse(datosPaso1Raw);
                if (mesDisplay && dP1.mes) mesDisplay.textContent = dP1.mes;
                else if (mesDisplay) mesDisplay.textContent = 'No disponible';
            } catch (e) {
                if (mesDisplay) mesDisplay.textContent = 'Error al cargar mes';
                console.error("Error Paso 8 (Hito M. Grueso): No se pudo parsear JSON de evaluacionPaso1 para el mes.", e);
            }
        } else if (mesDisplay) {
            mesDisplay.textContent = 'No disponible';
        }

        const form = document.getElementById('evaluacionHitoMGruesoForm');

        const datosMgruesoRaw = sessionStorage.getItem('evaluacionPaso3_mgrueso');
        let datosMgrueso = {};
        if (datosMgruesoRaw) {
            try {
                datosMgrueso = JSON.parse(datosMgruesoRaw);
            } catch (e) {
                datosMgrueso = {};
                console.error("Error Paso 8 (Hito M. Grueso): No se pudo parsear JSON de evaluacionPaso3_mgrueso.", e);
            }
        }

        const resultados_mgrueso = {
            '0': 'No lo logra (0)',
            '1': 'Lo intenta pero no lo logra (1)',
            '2': 'En proceso (2)',
            '3': 'Lo realiza inhábilmente (3)',
            '4': 'Normal (4)',
            '': 'Aún no se evalúa'
        };

        function setHitoDisplay(baseId, valorNumericoDelCampoAnterior) {
            const displayElement = document.getElementById(baseId + '_display');
            const valueElement = document.getElementById(baseId + '_value');
            let valorAGuardar = '';
            let textoAMostrar = resultados_mgrueso[''];

            if (valorNumericoDelCampoAnterior && typeof resultados_mgrueso[String(valorNumericoDelCampoAnterior)] !== 'undefined') {
                valorAGuardar = String(valorNumericoDelCampoAnterior);
                textoAMostrar = resultados_mgrueso[String(valorNumericoDelCampoAnterior)];
            }

            if (displayElement && valueElement) {
                displayElement.textContent = textoAMostrar;
                valueElement.value = valorAGuardar;
            }
        }

        const mapeoHitosMG = {
            'hg_control_cefalico': datosMgrueso.mg_control_cefalico,
            'hg_posicion_sentado': datosMgrueso.mg_sentado_sin_apoyo,
            'hg_reacciones_proteccion': datosMgrueso.mg_reaccion_lateral_delantera,
            'hg_patron_arrastre': datosMgrueso.mg_patron_arrastre,
            'hg_patron_gateo': datosMgrueso.mg_patron_gateo_independiente,
            'hg_mov_posturales_autonomos': datosMgrueso.mg_transicion_gateo_bipedestacion,
            'hg_patron_marcha_independiente': datosMgrueso.mg_comienza_patron_marcha
        };

        for (const idHito in mapeoHitosMG) {
            setHitoDisplay(idHito, mapeoHitosMG[idHito]);
        }

        const botonSiguiente = document.getElementById('botonSiguientePaso');
        if (botonSiguiente && form) {
            botonSiguiente.addEventListener('click', function() {
                const datosPasoActual = {};
                if (dateInput) datosPasoActual['fecha_evaluacion'] = dateInput.value;

                const hitoInputs = form.querySelectorAll('input[type="hidden"]');
                hitoInputs.forEach(input => {
                    const valor = input.value;
                    if (valor !== '' && valor !== 'Aún no se evalúa') {
                        datosPasoActual[input.name] = valor;
                    }
                });

                // FILTRA explícitamente campos vacíos o con "Aún no se evalúa"
                const camposHitos = [
                    'hg_control_cefalico',
                    'hg_posicion_sentado',
                    'hg_reacciones_proteccion',
                    'hg_patron_arrastre',
                    'hg_patron_gateo',
                    'hg_mov_posturales_autonomos',
                    'hg_patron_marcha_independiente'
                ];

                camposHitos.forEach(function(campoId) {
                    const valor = document.getElementById(`${campoId}_value`).value;
                    if (valor !== '' && valor !== 'Aún no se evalúa') {
                        datosPasoActual[campoId] = valor;
                    }
                });

                console.log(`Datos guardados en ${sessionKeyThisStep} (Hitos Motor Grueso):`, datosPasoActual);

                try {
                    sessionStorage.setItem(sessionKeyThisStep, JSON.stringify(datosPasoActual));
                    window.location.href = '/modificarHitosMF';
                } catch (e) {
                    console.error(`Error guardando datos de ${sessionKeyThisStep}:`, e);
                    alert("Hubo un error al guardar los Hitos de Desarrollo Motor Grueso.");
                }
            });
        }
    });
</script>
</body>

</html>