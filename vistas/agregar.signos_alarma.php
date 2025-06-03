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
                    <div id="ps_marcha_en_punta_lado_group" class="radio-group-laterality">
                        <input type="radio" id="mep_izq" name="ps_marcha_en_punta_lado" value="izquierdo"><label for="mep_izq">Izquierdo</label>
                        <input type="radio" id="mep_der" name="ps_marcha_en_punta_lado" value="derecho"><label for="mep_der">Derecho</label>
                        <input type="radio" id="mep_ambos" name="ps_marcha_en_punta_lado" value="ambos"><label for="mep_ambos">Ambos</label>
                    </div>
                </div>

                <div>
                    <label for="ps_marcha_cruzada_presencia" class="block text-sm font-medium text-gray-700 mb-1">Marcha Cruzada</label>
                     <select name="ps_marcha_cruzada_presencia" id="ps_marcha_cruzada_presencia" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    <div id="ps_marcha_cruzada_lado_group" class="radio-group-laterality">
                        <input type="radio" id="mc_izq" name="ps_marcha_cruzada_lado" value="izquierdo"><label for="mc_izq">Izquierdo</label>
                        <input type="radio" id="mc_der" name="ps_marcha_cruzada_lado" value="derecho"><label for="mc_der">Derecho</label>
                        <input type="radio" id="mc_ambos" name="ps_marcha_cruzada_lado" value="ambos"><label for="mc_ambos">Ambos</label>
                    </div>
                </div>

                <div>
                    <label for="ps_punos_cerrados_presencia" class="block text-sm font-medium text-gray-700 mb-1">Puños cerrados</label>
                     <select name="ps_punos_cerrados_presencia" id="ps_punos_cerrados_presencia" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    <div id="ps_punos_cerrados_lado_group" class="radio-group-laterality">
                        <input type="radio" id="pc_izq" name="ps_punos_cerrados_lado" value="izquierdo"><label for="pc_izq">Izquierdo</label>
                        <input type="radio" id="pc_der" name="ps_punos_cerrados_lado" value="derecho"><label for="pc_der">Derecho</label>
                        <input type="radio" id="pc_ambos" name="ps_punos_cerrados_lado" value="ambos"><label for="pc_ambos">Ambos</label>
                    </div>
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
            const sessionKey = 'evaluacionPaso7_signos_alarma'; 
            const datosGuardados = sessionStorage.getItem(sessionKey);
            let datosJson = {};

            if (datosGuardados) { 
                try { 
                    datosJson = JSON.parse(datosGuardados); 
                } catch(e) { 
                    console.error(`Error Paso 7 (Signos Alarma) al parsear datos guardados:`, e); 
                    sessionStorage.removeItem(sessionKey); 
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
                    console.error("Error Paso 7 (Signos Alarma): No se pudo parsear JSON de evaluacionPaso1 para el mes.", e);
                }
            } else if(mesDisplay) {
                mesDisplay.textContent = 'No disponible';
            }

            if (dateInput) {
                if(datosJson.fecha_evaluacion) { 
                    dateInput.value = datosJson.fecha_evaluacion; 
                } else { 
                    const datosPaso6Raw = sessionStorage.getItem('evaluacionPaso6_posturas_tmyu'); 
                    if(datosPaso6Raw){ 
                        try{ 
                            const dP6 = JSON.parse(datosPaso6Raw); 
                            if(dP6.fecha_evaluacion) dateInput.value = dP6.fecha_evaluacion; 
                        } catch(e){
                            console.error("Error Paso 7 (Signos Alarma): No se pudo parsear JSON de evaluacionPaso6_posturas_tmyu.", e);
                        } 
                    }
                    if(!dateInput.value) { 
                        const t = new Date(); 
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                    }
                }
            }

            const form = document.getElementById('evaluacionSignosAlarmaForm');
            
            const camposConLateralidad = [
                { selectId: 'ps_marcha_en_punta_presencia', radioGroupId: 'ps_marcha_en_punta_lado_group', radioName: 'ps_marcha_en_punta_lado' },
                { selectId: 'ps_marcha_cruzada_presencia', radioGroupId: 'ps_marcha_cruzada_lado_group', radioName: 'ps_marcha_cruzada_lado' },
                { selectId: 'ps_punos_cerrados_presencia', radioGroupId: 'ps_punos_cerrados_lado_group', radioName: 'ps_punos_cerrados_lado' }
            ];

            function toggleLateralityGroup(selectElement, radioGroupId) {
                const radioGroup = document.getElementById(radioGroupId);
                if (selectElement.value === '1') {
                    radioGroup.style.display = 'block';
                } else {
                    radioGroup.style.display = 'none';
                    const radios = form.querySelectorAll(`input[name="${selectElement.id.replace('_presencia', '_lado')}"]`);
                    radios.forEach(radio => radio.checked = false);
                }
            }

            if(form && Object.keys(datosJson).length > 0 ) {
                const selects = form.querySelectorAll('select');
                selects.forEach(select => { 
                    if(datosJson[select.name] !== undefined) { 
                        select.value = datosJson[select.name]; 
                    } 
                });

                camposConLateralidad.forEach(campo => {
                    const selectElement = document.getElementById(campo.selectId);
                    if (selectElement.value === '1') {
                        toggleLateralityGroup(selectElement, campo.radioGroupId);
                        const ladoGuardado = datosJson[campo.radioName];
                        if (ladoGuardado) {
                            const radioToCheck = form.querySelector(`input[name="${campo.radioName}"][value="${ladoGuardado}"]`);
                            if (radioToCheck) radioToCheck.checked = true;
                        }
                    } else {
                         const radioGroup = document.getElementById(campo.radioGroupId);
                         if(radioGroup) radioGroup.style.display = 'none';
                    }
                });
            } else { 
                 camposConLateralidad.forEach(campo => {
                    const radioGroup = document.getElementById(campo.radioGroupId);
                    if(radioGroup) radioGroup.style.display = 'none';
                });
            }

            camposConLateralidad.forEach(campo => {
                const selectElement = document.getElementById(campo.selectId);
                if (selectElement) {
                    selectElement.addEventListener('change', function() {
                        toggleLateralityGroup(this, campo.radioGroupId);
                    });
                }
            });

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const datosPaso = {};
                    if(dateInput) datosPaso['fecha_evaluacion'] = dateInput.value;

                    const allSelects = form.querySelectorAll('select');
                    allSelects.forEach(select => {
                        datosPaso[select.name] = select.value;
                    });

                    camposConLateralidad.forEach(campo => {
                        const selectElement = document.getElementById(campo.selectId);
                        if (selectElement.value === '1') { 
                            const radioChecked = form.querySelector(`input[name="${campo.radioName}"]:checked`);
                            if (radioChecked) {
                                datosPaso[campo.radioName] = radioChecked.value;
                            } else {
                                datosPaso[campo.radioName] = ""; 
                            }
                        } else {
                             datosPaso[campo.radioName] = ""; 
                        }
                    });
                    
                    console.log(`Datos guardados en ${sessionKey} (Signos de Alarma):`, datosPaso);

                    try {
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso));
                        window.location.href = 'agregar.hitomgrueso.php';
                    } catch(e) { 
                        console.error(`Error guardando datos de ${sessionKey}:`, e); 
                        alert("Hubo un error al guardar los Signos de Alarma."); 
                    }
                });
            }
        });
    </script>
</body>
</html>