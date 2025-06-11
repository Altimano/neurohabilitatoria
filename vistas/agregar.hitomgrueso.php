<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitos de Desarrollo Motor Grueso</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; }
        .bg-custom-main-box { background-color: #E0F2FE; }
        .bg-custom-button { background-color: #0284C7; }
        .text-custom-title { color: #0369A1; }
        input[readonly] { background-color: #f3f4f6; cursor: default; }
        input[type="date"][readonly] { background-color: #f3f4f6; cursor: default; }
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

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3></div>

    <div class="max-w-4xl mx-auto mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionHitoMGruesoForm" class="text-center">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-2"><h1 class="text-xl font-semibold text-center text-gray-800">HITOS DE DESARROLLO MOTOR GRUESO</h1></div>

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
                <a href="agregar.signos_alarma.php">
                    <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionP8_hitomgrueso'; // Clave para los datos de Hitos de Desarrollo Motor Grueso
            
            // 1. Recupera el objeto de datos del paciente principal (acumulado hasta ahora)
            const datosPacienteRaw = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let datosPaciente = {};
            if (datosPacienteRaw) {
                try {
                    datosPaciente = JSON.parse(datosPacienteRaw);
                } catch (e) {
                    console.error("Error al parsear datosPacienteParaEvaluacion en Hitos Motor Grueso:", e);
                    window.location.href = 'agregar.view.php?error=datos_corruptos';
                    return;
                }
            } else {
                console.error("No se encontraron datos del paciente en sessionStorage en Hitos Motor Grueso. Redirigiendo...");
                window.location.href = 'agregar.view.php?error=datos_faltantes';
                return;
            }

            // 2. Recupera los datos específicos de Hitos Motor Grueso para este paso (si existen)
            const datosHitoMgruesoGuardados = sessionStorage.getItem(sessionKey);
            let datosHitoMgrueso = {};
            if (datosHitoMgruesoGuardados) { 
                try { 
                    datosHitoMgrueso = JSON.parse(datosHitoMgruesoGuardados); 
                } catch(e) { 
                    console.error(`Error Paso 8 (Hito M. Grueso) al parsear datos guardados:`, e);
                    sessionStorage.removeItem(sessionKey); 
                } 
            }

            // Lógica para cargar la fecha de evaluación
            if (dateInput) {
                if(datosHitoMgrueso.fecha_evaluacion) { 
                    dateInput.value = datosHitoMgrueso.fecha_evaluacion; 
                } else {
                    // Prioriza la fecha del Paso 1 (fecha_inicio_tratamiento) si no hay fecha guardada para este paso
                    if (datosPaciente.fecha_inicio_tratamiento) {
                        dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                    } else { // Si aún no hay fecha, usar la fecha actual
                        const t = new Date(); 
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                    }
                }
            }

            // Lógica para cargar el mes de evaluación
            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            if (mesDisplay && datosPaciente.mes) { 
                mesDisplay.textContent = datosPaciente.mes;
            } else if (mesDisplay) { 
                mesDisplay.textContent = 'No disponible'; 
            }

            const form = document.getElementById('evaluacionHitoMGruesoForm');
            
            // Cargar los datos del Paso 3 (Motor Grueso) para precargar los hitos
            // Es crucial que 'datosPaciente.mgrueso' contenga los datos de Motor Grueso del paso anterior
            let datosMotorGruesoPasoAnterior = datosPaciente.mgrueso || {}; 
            
            // Mapeo de valores numéricos a descripciones legibles
            const resultados_mgrueso_display = {
                '0': 'No lo logra (0)',
                '1': 'Lo intenta pero no lo logra (1)',
                '2': 'En proceso (2)',
                '3': 'Lo realiza inhábilmente (3)',
                '4': 'Normal (4)',
                '': 'Aún no se evalúa' // Para casos donde el valor es nulo o indefinido
            };

            // Función para actualizar los elementos de display y los campos hidden
            function setHitoDisplay(baseId, valorNumericoDelCampoAnterior) {
                const displayElement = document.getElementById(baseId + '_display');
                const valueElement = document.getElementById(baseId + '_value');
                
                let valorAGuardar = '';
                let textoAMostrar = resultados_mgrueso_display['']; // Default a 'Aún no se evalúa'

                // Primero, intentar precargar desde los datos de este paso si ya están guardados
                if (datosHitoMgrueso[baseId]) {
                    valorAGuardar = datosHitoMgrueso[baseId];
                    textoAMostrar = resultados_mgrueso_display[String(datosHitoMgrueso[baseId])] || resultados_mgrueso_display[''];
                } 
                // Si no hay datos guardados para este paso, usar los del paso anterior (Motor Grueso)
                else if (valorNumericoDelCampoAnterior !== undefined && valorNumericoDelCampoAnterior !== null && typeof resultados_mgrueso_display[String(valorNumericoDelCampoAnterior)] !== 'undefined') {
                    valorAGuardar = String(valorNumericoDelCampoAnterior);
                    textoAMostrar = resultados_mgrueso_display[String(valorNumericoDelCampoAnterior)];
                }

                if (displayElement && valueElement) {
                    displayElement.textContent = textoAMostrar;
                    valueElement.value = valorAGuardar;
                }
            }
            
            // Mapeo de los IDs de los elementos HTML con los nombres de las claves en datosMotorGruesoPasoAnterior
            const mapeoHitosMG = {
                'hg_control_cefalico': datosMotorGruesoPasoAnterior.control_cefalico,
                'hg_posicion_sentado': datosMotorGruesoPasoAnterior.sentado_sin_apoyo,
                'hg_reacciones_proteccion': datosMotorGruesoPasoAnterior.reaccion_lateral_delantera,
                'hg_patron_arrastre': datosMotorGruesoPasoAnterior.patron_arrastre,
                'hg_patron_gateo': datosMotorGruesoPasoAnterior.patron_gateo_independiente,
                'hg_mov_posturales_autonomos': datosMotorGruesoPasoAnterior.transicion_gateo_bipedestacion,
                'hg_patron_marcha_independiente': datosMotorGruesoPasoAnterior.comienza_patron_marcha
            };

            // Recorrer el mapeo y actualizar los displays y hidden inputs
            for (const idHito in mapeoHitosMG) {
                setHitoDisplay(idHito, mapeoHitosMG[idHito]);
            }

            // --- Console.log para ver los datos cargados al inicio de la página ---
            console.log('DEBUG (JS - al cargar la página - Hitos Motor Grueso): datosPacienteParaEvaluacion (acumulado):', datosPaciente);
            console.log('DEBUG (JS - al cargar la página - Hitos Motor Grueso): datosHitoMgrueso (específico de este paso):', datosHitoMgrueso);
            console.log('DEBUG (JS - al cargar la página - Hitos Motor Grueso): datosMotorGruesoPasoAnterior (del paso 3):', datosMotorGruesoPasoAnterior);
            // --- Fin Console.log ---

            // Lógica para guardar datos al hacer clic en "Siguiente"
            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const currentHitoMgruesoData = {};
                    if(dateInput) currentHitoMgruesoData['fecha_evaluacion'] = dateInput.value;
                    
                    // Recolectar los valores de los campos hidden
                    const hitoInputs = form.querySelectorAll('input[type="hidden"]');
                    hitoInputs.forEach(input => {
                        // Guardar solo si el valor es "4" (Normal)
                        if (input.value === '4') {
                            currentHitoMgruesoData[input.name] = input.value;
                        } else {
                            // Si el valor no es 4, guardarlo como vacío o simplemente no incluirlo
                            // Decidamos no incluirlo si no es '4' para evitar valores vacíos innecesarios.
                            // Si necesitas un placeholder para valores no "4", puedes poner:
                            // currentHitoMgruesoData[input.name] = ''; 
                        }
                    });

                    // 7. Fusiona los datos del paso actual con el objeto principal del paciente
                    datosPaciente.hitomgrueso = currentHitoMgruesoData; 

                    // 8. console.log para verificar los datos ANTES de guardarlos
                    console.log('DEBUG (JS - Botón Siguiente - Hitos Motor Grueso): datosPaciente (fusionado) A PUNTO DE GUARDAR:', datosPaciente);

                    try {
                        // 9. Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // 10. Opcional: guardar los datos de Hitos Motor Grueso por separado
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentHitoMgruesoData)); 

                        // 11. console.log para verificar los datos DESPUÉS de guardarlos
                        const datosVerificados = sessionStorage.getItem('datosPacienteParaEvaluacion');
                        console.log('DEBUG (JS - Botón Siguiente - Hitos Motor Grueso): datosPaciente (RECUPERADO DE SESSIONSTORAGE DESPUÉS DE GUARDAR):', JSON.parse(datosVerificados));


                        window.location.href = 'agregar.hitomfino.php'; // Redirige al siguiente paso
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage (Hitos Motor Grueso):", e);
                        alert("Hubo un error al guardar los Hitos de Desarrollo Motor Grueso."); 
                    }
                });
            }
        });
    </script>
</body>
</html>