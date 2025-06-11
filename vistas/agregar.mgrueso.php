<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Grueso</title>
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
    </style>
</head>
<body class="bg-gray-100">

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3></div>

    <div class="mx-6 md:mx-10 mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
    <form id="evaluacionMotorGruesoForm">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-5 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">MOTOR GRUESO/MOVIMIENTOS POSTURALES</h1></div>
            <div class="border-b border-gray-400 py-5 mb-6"><h2 class="text-base md:text-lg font-semibold text-center text-gray-800 px-2"> No lo logra (0) | Lo intenta pero no lo logra (1) | En proceso (2) | Lo realiza inhábilmente (3) | Normal (4) </h2></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div>
                    <label for="control_cefalico" class="block text-sm font-medium text-gray-700 mb-1"><strong>Control cefálico*</strong></label>
                    <select name="control_cefalico" id="control_cefalico" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                    </select>
                </div>
                <div>
                    <label for="levanta_torax" class="block text-sm font-medium text-gray-700 mb-1">Sobre el abdomen levanta tórax apoyando brazos</label>
                    <select name="levanta_torax" id="levanta_torax" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                    </select>
                </div>
                <div>
                     <label for="reaccion_delantera" class="block text-sm font-medium text-gray-700 mb-1">Sentado con reacción de protección delantera</label>
                     <select name="reaccion_delantera" id="reaccion_delantera" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                </div>
                <div>
                    <label for="cambio_decubito_prono_supino" class="block text-sm font-medium text-gray-700 mb-1">Cambio de decúbito prono a decúbito supino</label>
                    <select name="cambio_decubito_prono_supino" id="cambio_decubito_prono_supino" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                   </select>
                </div>
                <div>
                    <label for="sentado_sin_apoyo" class="block text-sm font-medium text-gray-700 mb-1"><strong>Sentado sin apoyo*</strong></label>
                    <select name="sentado_sin_apoyo" id="sentado_sin_apoyo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                   </select>
                </div>
                <div>
                    <label for="reaccion_lateral_delantera" class="block text-sm font-medium text-gray-700 mb-1"><strong>Reacciones de protección laterales y delanteras*</strong></label>
                    <select name="reaccion_lateral_delantera" id="reaccion_lateral_delantera" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                   </select>
                </div>
                <div>
                    <label for="cambio_posicion_sedente_prono" class="block text-sm font-medium text-gray-700 mb-1">Cambio de posición sedente a decúbito prono</label>
                    <select name="cambio_posicion_sedente_prono" id="cambio_posicion_sedente_prono" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                   </select>
                </div>
                <div>
                    <label for="patron_arrastre" class="block text-sm font-medium text-gray-700 mb-1"><strong>Patrón de arrastre*</strong></label>
                    <select name="patron_arrastre" id="patron_arrastre" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                   </select>
                </div>
                <div>
                    <label for="cambio_posicion_cuatro_hincado" class="block text-sm font-medium text-gray-700 mb-1">Cambio de posición cuatro puntos a hincado</label>
                    <select name="cambio_posicion_cuatro_hincado" id="cambio_posicion_cuatro_hincado" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                   </select>
                </div>
                 <div>
                   <label for="patron_gateo_independiente" class="block text-sm font-medium text-gray-700 mb-1"><strong>Patrón de gateo independiente*</strong></label>
                   <select name="patron_gateo_independiente" id="patron_gateo_independiente" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="gateo_niveles" class="block text-sm font-medium text-gray-700 mb-1">Gateo en diferentes niveles (colchón, planos, etc.)</label>
                   <select name="gateo_niveles" id="gateo_niveles" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
                <div>
                   <label for="transicion_gateo_bipedestacion" class="block text-sm font-medium text-gray-700 mb-1"><strong>Transición gateo a bipedestación*</strong></label>
                   <select name="transicion_gateo_bipedestacion" id="transicion_gateo_bipedestacion" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
                <div>
                   <label for="comienza_patron_marcha" class="block text-sm font-medium text-gray-700 mb-1"><strong>Comienza el patrón de marcha*</strong></label>
                   <select name="comienza_patron_marcha" id="comienza_patron_marcha" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="pone_pie_sin_apoyo" class="block text-sm font-medium text-gray-700 mb-1">Se pone de pie momentáneamente sin apoyarse</label>
                   <select name="pone_pie_sin_apoyo" id="pone_pie_sin_apoyo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="camina_atras" class="block text-sm font-medium text-gray-700 mb-1">Camina hacia atrás</label>
                   <select name="camina_atras" id="camina_atras" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="camina_solo_cae_frecuencia" class="block text-sm font-medium text-gray-700 mb-1">Camina solo(cae frecuencia)</label>
                   <select name="camina_solo_cae_frecuencia" id="camina_solo_cae_frecuencia" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="Sube_escaleras_apoyo_manos" class="block text-sm font-medium text-gray-700 mb-1">Sube escaleras apoyandose en ambas manos</label>
                   <select name="Sube_escaleras_apoyo_manos" id="Sube_escaleras_apoyo_manos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="patea_pelota" class="block text-sm font-medium text-gray-700 mb-1">Patea una pelota</label>
                   <select name="patea_pelota" id="patea_pelota" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="sube_escaleras_gateando" class="block text-sm font-medium text-gray-700 mb-1">Sube escaleras gateando</label>
                   <select name="sube_escaleras_gateando" id="sube_escaleras_gateando" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="corre_rigidez" class="block text-sm font-medium text-gray-700 mb-1">Corre(con rigidez)</label>
                   <select name="corre_rigidez" id="corre_rigidez" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="camina_solo_cae_raravez" class="block text-sm font-medium text-gray-700 mb-1">Camina solo(cae rara vez)</label>
                   <select name="camina_solo_cae_raravez" id="camina_solo_cae_raravez" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="sube_baja_escaleras" class="block text-sm font-medium text-gray-700 mb-1">Sube y baja escaleras sostenido de una mano</label>
                   <select name="sube_baja_escaleras" id="sube_baja_escaleras" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="lanza_pelota" class="block text-sm font-medium text-gray-700 mb-1">Lanza la pelota</label>
                   <select name="lanza_pelota" id="lanza_pelota" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="salta_sitio" class="block text-sm font-medium text-gray-700 mb-1">Salta en el sitio</label>
                   <select name="salta_sitio" id="salta_sitio" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
               <div>
                   <label for="juega_cuclillas" class="block text-sm font-medium text-gray-700 mb-1">Juega en Cuclillas</label>
                   <select name="juega_cuclillas" id="juega_cuclillas" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                       <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                  </select>
               </div>
                </div>

            <div class="flex justify-between mt-8">
                <a href="agregar.mkatona.php">
                    <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionP3_mgrueso'; // Clave para los datos de Motor Grueso

            // 1. Recupera el objeto de datos del paciente principal (acumulado hasta ahora)
            const datosPacienteRaw = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let datosPaciente = {};
            if (datosPacienteRaw) {
                try {
                    datosPaciente = JSON.parse(datosPacienteRaw);
                } catch (e) {
                    console.error("Error al parsear datosPacienteParaEvaluacion en Motor Grueso:", e);
                    window.location.href = 'agregar.view.php?error=datos_corruptos'; // Redirige si los datos base están corruptos
                    return;
                }
            } else {
                console.error("No se encontraron datos del paciente en sessionStorage en Motor Grueso. Redirigiendo...");
                window.location.href = 'agregar.view.php?error=datos_faltantes'; // Redirige si faltan los datos base
                return;
            }

            // 2. Recupera los datos específicos de Motor Grueso para este paso (si existen)
            const datosMgresoGuardados = sessionStorage.getItem(sessionKey);
            let datosMgreso = {};
            if (datosMgresoGuardados) { 
                try { 
                    datosMgreso = JSON.parse(datosMgresoGuardados); 
                } catch(e) { 
                    console.error("Error Paso 3 (Motor Grueso) al parsear datos guardados:", e);
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
                if(datosMgreso.fecha_evaluacion) { 
                    dateInput.value = datosMgreso.fecha_evaluacion; 
                } 
                // Prioriza la fecha del Paso 1 (fecha_inicio_tratamiento) si no hay fecha guardada para este paso
                else if (datosPaciente.fecha_inicio_tratamiento) {
                    dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                }
                else { 
                    const t = new Date(); 
                    dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                }
            }

            // 5. Precarga los valores de los <select> si existen datos guardados
            const form = document.getElementById('evaluacionMotorGruesoForm');
            if(form && Object.keys(datosMgreso).length > 0) { // Asegúrate de que datosMgreso tiene propiedades
                const selects = form.querySelectorAll('select');
                selects.forEach(select => { 
                    if(datosMgreso[select.name] !== undefined) { 
                        select.value = datosMgreso[select.name]; 
                    } else {
                        select.value = ""; 
                    }
                });
            }

            // --- Console.log para ver los datos cargados al inicio de la página ---
            console.log('DEBUG (JS - al cargar la página - Motor Grueso): datosPacienteParaEvaluacion (acumulado):', datosPaciente);
            console.log('DEBUG (JS - al cargar la página - Motor Grueso): datosMgreso (específico de este paso):', datosMgreso);
            // --- Fin Console.log ---

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // 6. Recopila los datos del formulario de Motor Grueso
                    const formData = new FormData(form);
                    const currentMotorGruesoData = {};
                    
                    // Iterar sobre todos los selects y guardar sus valores, seleccionados o no
                    const allSelects = form.querySelectorAll('select');
                    allSelects.forEach(select => {
                        currentMotorGruesoData[select.name] = select.value;
                    });
                    
                    // Asegúrate de incluir la fecha de evaluación del formulario en los datos del paso actual
                    if(dateInput) currentMotorGruesoData['fecha_evaluacion'] = dateInput.value;

                    // NOTA: La validación de campos obligatorios ha sido ELIMINADA según tu solicitud.
                    // Los campos se guardarán independientemente de si fueron seleccionados o no.


                    // 7. Fusiona los datos del paso actual con el objeto principal del paciente
                    datosPaciente.mgrueso = currentMotorGruesoData; 

                    // 8. console.log para verificar los datos ANTES de guardarlos
                    console.log('DEBUG (JS - Botón Siguiente - Motor Grueso): datosPaciente (fusionado) A PUNTO DE GUARDAR:', datosPaciente);

                    try {
                        // 9. Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // 10. Opcional: guardar los datos de Motor Grueso por separado
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentMotorGruesoData)); 

                        // 11. console.log para verificar los datos DESPUÉS de guardarlos
                        const datosVerificados = sessionStorage.getItem('datosPacienteParaEvaluacion');
                        console.log('DEBUG (JS - Botón Siguiente - Motor Grueso): datosPaciente (RECUPERADO DE SESSIONSTORAGE DESPUÉS DE GUARDAR):', JSON.parse(datosVerificados));


                        window.location.href = 'agregar.mfino.php'; // Redirige al siguiente paso
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage (Motor Grueso):", e);
                        alert("Hubo un error al guardar los datos de Motor Grueso."); 
                    }
                });
            }
        });
    </script>
</body>
</html>