<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signos de Alarma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; }
        .bg-custom-main-box { background-color: #E0F2FE; }
        .bg-custom-button { background-color: #0284C7; }
        .text-custom-title { color: #0369A1; }
        input[readonly], textarea[readonly] {
            background-color: #E5E7EB;
            cursor: default;
            border-color: #D1D5DB;
            color: #4B5563;
        }
        select:not([disabled]) { background-color: #FFFFFF; cursor: pointer; }
        /* Mantener display:none por defecto para ocultar los grupos de lateralidad */
        .radio-group-laterality { display: none; margin-top: 0.5rem; padding-left: 1rem;}
        .radio-group-laterality label { margin-left: 0.25rem; margin-right: 0.75rem; font-weight: normal;}
    </style>
</head>
<body class="bg-gray-100">

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3></div>

    <div class="mx-6 md:mx-10 mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionSignosAlarmaForm">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="section-title border-t border-b border-gray-400 py-2 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">SIGNOS DE ALARMA</h1></div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div>
                    <label for="ps_aduccion_pulgares" class="block text-sm font-medium text-gray-700 mb-1">Aducción de pulgares</label>
                    <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">0</option> 
                        <option value="1">1</option>
                    </select>
                </div>
                <div>
                    <label for="ps_estrabismo" class="block text-sm font-medium text-gray-700 mb-1">Estrabismo</label>
                    <select name="ps_estrabismo" id="ps_estrabismo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">0</option> 
                        <option value="1">1</option>
                    </select>
                </div>
                <div>
                    <label for="ps_irritabilidad" class="block text-sm font-medium text-gray-700 mb-1">Irritabilidad</label>
                    <select name="ps_irritabilidad" id="ps_irritabilidad" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">0</option> 
                        <option value="1">1</option>
                    </select>
                </div>

                <div>
                    <label for="ps_marcha_en_punta_presencia" class="block text-sm font-medium text-gray-700 mb-1">Marcha en punta</label>
                    <select name="ps_marcha_en_punta_presencia" id="ps_marcha_en_punta_presencia" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    </div>

                <div>
                    <label for="ps_marcha_cruzada_presencia" class="block text-sm font-medium text-gray-700 mb-1">Marcha Cruzada</label>
                    <select name="ps_marcha_cruzada_presencia" id="ps_marcha_cruzada_presencia" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    </div>

                <div>
                    <label for="ps_punos_cerrados_presencia" class="block text-sm font-medium text-gray-700 mb-1">Puños cerrados</label>
                    <select name="ps_punos_cerrados_presencia" id="ps_punos_cerrados_presencia" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    </div>

                <div>
                    <label for="ps_reflejo_hiperextension" class="block text-sm font-medium text-gray-700 mb-1">Reflejo de hiperextensión</label>
                    <select name="ps_reflejo_hiperextension" id="ps_reflejo_hiperextension" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option> 
                        <option value="0">0</option> 
                        <option value="1">1</option>
                    </select>
                </div>
                <div>
                    <label for="ps_lenguaje_escaso" class="block text-sm font-medium text-gray-700 mb-1">Lenguaje escaso</label>
                    <select name="ps_lenguaje_escaso" id="ps_lenguaje_escaso" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option> 
                        <option value="0">0</option> 
                        <option value="1">1</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="agregar.posturas_tmyu.php">
                    <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionP7_signos_alarma'; // Clave para los datos de Signos de Alarma

            // 1. Recupera el objeto de datos del paciente principal (acumulado hasta ahora)
            const datosPacienteRaw = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let datosPaciente = {};
            if (datosPacienteRaw) {
                try {
                    datosPaciente = JSON.parse(datosPacienteRaw);
                } catch (e) {
                    console.error("Error al parsear datosPacienteParaEvaluacion en Signos de Alarma:", e);
                    window.location.href = 'agregar.view.php?error=datos_corruptos';
                    return;
                }
            } else {
                console.error("No se encontraron datos del paciente en sessionStorage en Signos de Alarma. Redirigiendo...");
                window.location.href = 'agregar.view.php?error=datos_faltantes';
                return;
            }

            // 2. Recupera los datos específicos de Signos de Alarma para este paso (si existen)
            const datosSignosAlarmaGuardados = sessionStorage.getItem(sessionKey);
            let datosSignosAlarma = {};
            if (datosSignosAlarmaGuardados) { 
                try { 
                    datosSignosAlarma = JSON.parse(datosSignosAlarmaGuardados); 
                } catch(e) { 
                    console.error(`Error Paso 7 (Signos Alarma) al parsear datos guardados:`, e); 
                    sessionStorage.removeItem(sessionKey); 
                } 
            }
            
            // 3. Muestra el mes seleccionado (del Paso 1)
            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            if (mesDisplay && datosPaciente.mes) { 
                mesDisplay.textContent = datosPaciente.mes;
            } else if (mesDisplay) { 
                mesDisplay.textContent = 'No disponible'; 
            }

            // 4. Establece la fecha de evaluación
            if (dateInput) {
                if(datosSignosAlarma.fecha_evaluacion) { 
                    dateInput.value = datosSignosAlarma.fecha_evaluacion; 
                } else { 
                    // Obtener fecha de la evaluación del paso anterior si no está guardada aquí
                    const datosPaso6Raw = sessionStorage.getItem('evaluacionP6_posturas_tmyu'); 
                    if(datosPaso6Raw){ 
                        try{ 
                            const dP6 = JSON.parse(datosPaso6Raw); 
                            if(dP6.fecha_evaluacion) dateInput.value = dP6.fecha_evaluacion; 
                        } catch(e){
                            console.error("Error Paso 7 (Signos Alarma): No se pudo parsear JSON de evaluacionP6_posturas_tmyu para la fecha.", e);
                        } 
                    }
                    // Si aún no hay fecha, usar la fecha actual
                    if(!dateInput.value) { 
                        const t = new Date(); 
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                    }
                }
            }

            const form = document.getElementById('evaluacionSignosAlarmaForm');
            
            // Define los selectores para los campos de lateralidad. Los radios quedarán deshabilitados para guardar.
            const camposConLateralidad = [
                { selectId: 'ps_marcha_en_punta_presencia', radioGroupId: 'ps_marcha_en_punta_lado_group', radioName: 'ps_marcha_en_punta_lado' },
                { selectId: 'ps_marcha_cruzada_presencia', radioGroupId: 'ps_marcha_cruzada_lado_group', radioName: 'ps_marcha_cruzada_lado' },
                { selectId: 'ps_punos_cerrados_presencia', radioGroupId: 'ps_punos_cerrados_lado_group', radioName: 'ps_punos_cerrados_lado' }
            ];

            // Función para mostrar u ocultar el grupo de radios de lateralidad
            function toggleLateralityGroup(selectElement, radioGroupId) {
                const radioGroup = document.getElementById(radioGroupId);
                if (radioGroup) {
                    if (selectElement.value === '1') {
                        // radioGroup.style.display = 'block'; // Puedes mantenerlo visible si quieres que el usuario interactúe
                                                              // aunque no se guarde. Si quieres que se muestre pero no se guarde,
                                                              // comentar la lógica de guardado de los radios.
                        radioGroup.style.display = 'none'; // Ocultar si queremos desactivar la interacción
                    } else {
                        radioGroup.style.display = 'none';
                        // No es necesario desmarcar los radios si no se van a guardar
                        // const radios = radioGroup.querySelectorAll(`input[name="${selectElement.id.replace('_presencia', '_lado')}"]`);
                        // radios.forEach(radio => radio.checked = false);
                    }
                }
            }

            // Cargar datos al iniciar la página
            if(form && Object.keys(datosSignosAlarma).length > 0 ) {
                // Cargar valores de todos los selects
                const allSelects = form.querySelectorAll('select');
                allSelects.forEach(select => { 
                    if(datosSignosAlarma[select.name] !== undefined) { 
                        select.value = datosSignosAlarma[select.name]; 
                    } 
                });

                // NO cargar valores de radios de lateralidad ni mostrar/ocultar dinámicamente si la funcionalidad está deshabilitada
                // El CSS '.radio-group-laterality { display: none; }' se encarga de ocultarlos
            } else { 
                // Si no hay datos guardados, asegurarse de que los grupos de radio estén ocultos por defecto (ya lo hace el CSS)
                // camposConLateralidad.forEach(campo => {
                //     const radioGroup = document.getElementById(campo.radioGroupId);
                //     if(radioGroup) radioGroup.style.display = 'none';
                // });
            }

            // Añadir event listeners para los selects que controlan la lateralidad
            // Comentados para desactivar la interacción dinámica con los radios, si se desea
            // camposConLateralidad.forEach(campo => {
            //     const selectElement = document.getElementById(campo.selectId);
            //     if (selectElement) {
            //         selectElement.addEventListener('change', function() {
            //             toggleLateralityGroup(this, campo.radioGroupId); // Esta función ahora solo oculta
            //         });
            //     }
            // });

            // --- Console.log para ver los datos cargados al inicio de la página ---
            console.log('DEBUG (JS - al cargar la página - Signos de Alarma): datosPacienteParaEvaluacion (acumulado):', datosPaciente);
            console.log('DEBUG (JS - al cargar la página - Signos de Alarma): datosSignosAlarma (específico de este paso):', datosSignosAlarma);
            // --- Fin Console.log ---

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // 6. Recopila los datos del formulario (solo los valores de los select)
                    const currentSignosAlarmaData = {};
                    if(dateInput) currentSignosAlarmaData['fecha_evaluacion'] = dateInput.value;

                    // Recolectar todos los valores de los select
                    const allSelects = form.querySelectorAll('select');
                    allSelects.forEach(select => {
                        currentSignosAlarmaData[select.name] = select.value;
                    });

                    // >>> LÓGICA PARA RADIOS DE LATERALIDAD COMENTADA PARA NO GUARDAR <<<
                    // No se recolectan los valores de los radios de lateralidad
                    // camposConLateralidad.forEach(campo => {
                    //     const selectElement = document.getElementById(campo.selectId);
                    //     if (selectElement && selectElement.value === '1') { 
                    //         const radioChecked = form.querySelector(`input[name="${campo.radioName}"]:checked`);
                    //         if (radioChecked) {
                    //             currentSignosAlarmaData[campo.radioName] = radioChecked.value;
                    //         } else {
                    //             currentSignosAlarmaData[campo.radioName] = ""; 
                    //         }
                    //     } else {
                    //         currentSignosAlarmaData[campo.radioName] = ""; 
                    //     }
                    // });
                    // >>> FIN LÓGICA PARA RADIOS DE LATERALIDAD COMENTADA <<<
                    
                    // NOTA: No hay validación de campos obligatorios en este paso,
                    // se guardarán todos los valores de los selects (incluidos los vacíos).

                    // 7. Fusiona los datos del paso actual con el objeto principal del paciente
                    datosPaciente.signos_alarma = currentSignosAlarmaData; 

                    // 8. console.log para verificar los datos ANTES de guardarlos
                    console.log('DEBUG (JS - Botón Siguiente - Signos de Alarma): datosPaciente (fusionado) A PUNTO DE GUARDAR:', datosPaciente);

                    try {
                        // 9. Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // 10. Opcional: guardar los datos de Signos de Alarma por separado
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentSignosAlarmaData)); 

                        // 11. console.log para verificar los datos DESPUÉS de guardarlos
                        const datosVerificados = sessionStorage.getItem('datosPacienteParaEvaluacion');
                        console.log('DEBUG (JS - Botón Siguiente - Signos de Alarma): datosPaciente (RECUPERADO DE SESSIONSTORAGE DESPUÉS DE GUARDAR):', JSON.parse(datosVerificados));


                        window.location.href = 'agregar.hitomgrueso.php'; // Redirige al siguiente paso
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage (Signos de Alarma):", e);
                        alert("Hubo un error al guardar los Signos de Alarma."); 
                    }
                });
            }
        });
    </script>
</body>
</html>