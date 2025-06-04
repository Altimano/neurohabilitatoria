<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitos de Desarrollo Motricidad Fina - Finalizar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; }
        .bg-custom-main-box { background-color: #E0F2FE; }
        .bg-custom-button { background-color: #0284C7; } /* Botón primario (Sí) */
        .bg-custom-button-no { background-color: #6B7280; } /* Botón secundario (No) */
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
        /* Estilos para el Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }
        .modal-icon { 
            font-size: 2.5rem;
            color: #F59E0B; /* Tailwind amber-500 */
            margin-bottom: 1rem;
        }
        .modal-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #1F2937; /* Tailwind gray-800 */
        }
        .modal-message {
            font-size: 1rem;
            color: #4B5563; /* Tailwind gray-600 */
            margin-bottom: 1.5rem;
        }
        .modal-buttons button {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            color: white;
            margin: 0 0.5rem;
            cursor: pointer;
        }
        .hidden { display: none; } /* Para ocultar el modal */
    </style>
</head>
<body class="bg-gray-100">

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3></div>

    <div class="max-w-4xl mx-auto mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionHitoMFinoForm" class="text-center">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-2"><h1 class="text-xl font-semibold text-center text-gray-800">HITOS DE DESARROLLO (MOTOR FINO)</h1></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6 text-left">
                <div>
                    <label for="hf_fijacion_ocular_display" class="block text-sm font-medium text-gray-700 mb-1">Fijación Ocular (FO)</label>
                    <p id="hf_fijacion_ocular_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_fijacion_ocular" id="hf_fijacion_ocular_value">
                </div>
                <div>
                    <label for="hf_cubito_palmar_display" class="block text-sm font-medium text-gray-700 mb-1">Cubito-Palmar (CP)</label>
                    <p id="hf_cubito_palmar_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_cubito_palmar" id="hf_cubito_palmar_value">
                </div>
                <div>
                    <label for="hf_presion_r_display" class="block text-sm font-medium text-gray-700 mb-1">Prensión "Rascado" (PR)</label>
                    <p id="hf_presion_r_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_presion_r" id="hf_presion_r_value">
                </div>
                <div>
                    <label for="hf_pinza_inferior_display" class="block text-sm font-medium text-gray-700 mb-1">Pinza Inferior (PI)</label>
                    <p id="hf_pinza_inferior_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_pinza_inferior" id="hf_pinza_inferior_value">
                </div>
                <div>
                    <label for="hf_pinza_fina_display" class="block text-sm font-medium text-gray-700 mb-1">Pinza Fina (PF)*</label>
                    <p id="hf_pinza_fina_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_pinza_fina" id="hf_pinza_fina_value">
                </div>
                <div>
                    <label for="hf_abajamiento_voluntario_display" class="block text-sm font-medium text-gray-700 mb-1">Alojamiento Voluntario (AV)</label>
                    <p id="hf_abajamiento_voluntario_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_abajamiento_voluntario" id="hf_abajamiento_voluntario_value">
                </div>
                <div>
                    <label for="hf_coordinacion_oculomanual_display" class="block text-sm font-medium text-gray-700 mb-1">Coordinación Oculomanual (CO)</label>
                    <p id="hf_coordinacion_oculomanual_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_coordinacion_oculomanual" id="hf_coordinacion_oculomanual_value">
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="/modificarHitosMG" class="inline-block"> 
                    <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <button type="button" id="botonFinalizarEvaluacion" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">FINALIZAR EVALUACIÓN</button>
            </div>
        </form>
    </div>

    <div id="confirmacionModal" class="modal-overlay hidden">
        <div class="modal-content">
            <div class="modal-icon">⚠️</div>
            <h3 class="modal-title">Finalizar Evaluación</h3>
            <p class="modal-message">¿Seguro que quieres finalizar la evaluación?</p>
            <div class="modal-buttons">
                <button id="modalBotonSi" class="bg-custom-button">Sí</button>
                <button id="modalBotonNo" class="bg-custom-button-no">No</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKeyThisStep = 'evaluacionPaso9_hitomfino'; 
            
            const datosGuardadosEstePaso = sessionStorage.getItem(sessionKeyThisStep);
            let datosJsonEstePaso = {};
            if (datosGuardadosEstePaso) { 
                try { 
                    datosJsonEstePaso = JSON.parse(datosGuardadosEstePaso); 
                } catch(e) { 
                    console.error(`Error Paso 9 (Hito M. Fino) al parsear datos guardados:`, e);
                    sessionStorage.removeItem(sessionKeyThisStep); 
                } 
            }

            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
            if (datosPaso1Raw) { 
                try { 
                    const dP1 = JSON.parse(datosPaso1Raw); 
                    if (mesDisplay && dP1.mes) mesDisplay.textContent = dP1.mes; 
                    else if (mesDisplay) mesDisplay.textContent = 'No disponible';
                } catch(e){ 
                    if(mesDisplay) mesDisplay.textContent = 'Error al cargar mes';
                    console.error("Error Paso 9 (Hito M. Fino): No se pudo parsear JSON de evaluacionPaso1 para el mes.", e);
                } 
            } else if(mesDisplay) { 
                mesDisplay.textContent = 'No disponible'; 
            }

            if (dateInput) {
                if(datosJsonEstePaso.fecha_evaluacion) { 
                    dateInput.value = datosJsonEstePaso.fecha_evaluacion; 
                } else {
                    const datosPaso8Raw = sessionStorage.getItem('evaluacionPaso8_hitomgrueso'); 
                    if(datosPaso8Raw){ 
                        try{ 
                            const dP8 = JSON.parse(datosPaso8Raw); 
                            if(dP8.fecha_evaluacion) dateInput.value = dP8.fecha_evaluacion; 
                        } catch(e){
                            console.error("Error Paso 9 (Hito M. Fino): No se pudo parsear JSON de evaluacionPaso8_hitomgrueso.", e);
                        } 
                    }
                    if(!dateInput.value) { 
                        const t = new Date(); 
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                    }
                }
            }

            const form = document.getElementById('evaluacionHitoMFinoForm');
            const datosMfinoRaw = sessionStorage.getItem('evaluacionPaso4_mfino'); 
            let datosMfino = {};
            if(datosMfinoRaw){ 
                try{ 
                    datosMfino = JSON.parse(datosMfinoRaw); 
                } catch(e){ 
                    datosMfino = {}; 
                    console.error("Error Paso 9 (Hito M. Fino): No se pudo parsear JSON de evaluacionPaso4_mfino.", e);
                } 
            }
            console.log("Datos de Motor Fino (Paso 4) leídos para Hitos:", datosMfino);

            const resultados_mfino = {
                '0': 'No lo logra (0)', '1': 'Lo intenta pero no lo logra (1)',
                '2': 'En proceso (2)', '3': 'Lo realiza inhábilmente (3)',
                '4': 'Normal (4)', '': 'Aún no se evalúa'
            };

            function setHitoDisplay(baseId, valorNumericoDelCampoAnterior) {
                const displayElement = document.getElementById(baseId + '_display');
                const valueElement = document.getElementById(baseId + '_value');
                let valorAGuardar = '';
                let textoAMostrar = resultados_mfino['']; 

                if (valorNumericoDelCampoAnterior && typeof resultados_mfino[String(valorNumericoDelCampoAnterior)] !== 'undefined') {
                    valorAGuardar = String(valorNumericoDelCampoAnterior);
                    textoAMostrar = resultados_mfino[String(valorNumericoDelCampoAnterior)];
                }
                
                if (displayElement && valueElement) {
                    displayElement.textContent = textoAMostrar;
                    valueElement.value = valorAGuardar;
                }
            }
            
            const mapeoHitosMF = {
                'hf_fijacion_ocular': datosMfino.mf_manos_linea_media, 
                'hf_cubito_palmar': datosMfino.mf_estruja_papel, 
                'hf_presion_r': datosMfino.mf_transfiere_manos, 
                'hf_pinza_inferior': datosMfino.mf_desarrolla_agarre, 
                'hf_pinza_fina': datosMfino.mf_pinza_superior,
                'hf_abajamiento_voluntario': datosMfino.mf_torre_2_cubos, 
                'hf_coordinacion_oculomanual': datosMfino.mf_arma_tren_3_cubos 
            };

            for (const idHito in mapeoHitosMF) {
                setHitoDisplay(idHito, mapeoHitosMF[idHito]);
            }
            
            const botonFinalizar = document.getElementById('botonFinalizarEvaluacion');
            const modal = document.getElementById('confirmacionModal');
            const modalBotonSi = document.getElementById('modalBotonSi');
            const modalBotonNo = document.getElementById('modalBotonNo');

            if (botonFinalizar && form && modal && modalBotonSi && modalBotonNo) {
                botonFinalizar.addEventListener('click', function() {
                    const datosPasoActual = {};
                    if(dateInput) datosPasoActual['fecha_evaluacion'] = dateInput.value;
                    
                    const hitoInputs = form.querySelectorAll('input[type="hidden"]');
                    hitoInputs.forEach(input => {
                        const valor = input.value;
                    if (valor !== '' && valor !== 'Aún no se evalúa') {
                        datosPasoActual[input.name] = valor;
                    }
                    });

                    console.log(`Datos guardados en ${sessionKeyThisStep} (Hitos Motor Fino):`, datosPasoActual);
                    try {
                        sessionStorage.setItem(sessionKeyThisStep, JSON.stringify(datosPasoActual));
                    } catch(e) { 
                        console.error(`Error guardando datos de ${sessionKeyThisStep} antes de mostrar modal:`, e);
                        alert("Hubo un error al guardar los Hitos de Desarrollo Motor Fino actuales."); 
                        return; 
                    }
                    modal.classList.remove('hidden');
                });

                modalBotonNo.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });

                modalBotonSi.addEventListener('click', function() {
                    modal.classList.add('hidden');

                    const todosLosDatos = {};
                    const clavesDePasos = [
                        'evaluacionPaso1',
                        'evaluacionPaso2_mkatona',
                        'evaluacionPaso3_mgrueso',
                        'evaluacionPaso4_mfino',
                        'evaluacionPaso5_lenguaje',
                        'evaluacionPaso6_posturas_tmyu',
                        'evaluacionPaso7_signos_alarma',
                        'evaluacionPaso8_hitomgrueso',
                        sessionKeyThisStep 
                    ];

                    console.log("--- INICIO: RECOLECCIÓN DE TODOS LOS DATOS DE LA EVALUACIÓN ---");
                    clavesDePasos.forEach(clave => {
                        const datosGuardados = sessionStorage.getItem(clave);
                        if (datosGuardados) {
                            try {
                                todosLosDatos[clave] = JSON.parse(datosGuardados);
                                console.log(`Datos para ${clave}:`, todosLosDatos[clave]);
                            } catch (e) {
                                console.error(`Error parseando datos para ${clave}:`, e, datosGuardados);
                                todosLosDatos[clave] = { error: "No se pudieron parsear los datos", raw: datosGuardados };
                            }
                        } else {
                            console.warn(`No se encontraron datos para ${clave} en sessionStorage.`);
                            todosLosDatos[clave] = null;
                        }
                    });
                    console.log("--- Objeto consolidado con TODOS LOS DATOS DE LA EVALUACIÓN: ---", todosLosDatos);
                    console.log("--- FIN: RECOLECCIÓN DE TODOS LOS DATOS DE LA EVALUACIÓN ---");
                    //aqui poner la coneccion 
                    
                    limpiarSessionStorageYRedirigir(clavesDePasos);
                });
            }

            function limpiarSessionStorageYRedirigir(claves) {
                console.log("Limpiando datos de sessionStorage...");
                claves.forEach(clave => {
                    sessionStorage.removeItem(clave);
                    console.log(`Removido: ${clave}`);
                });
                console.log("Limpieza de sessionStorage completada.");
                window.location.href = '/inicio';
            }
        });
    </script>
</body>
</html>