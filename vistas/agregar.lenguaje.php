<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenguaje</title>
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
    <form id="evaluacionLenguajeForm"> <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

        <div class="mb-6 text-center">
            <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
            <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
        </div>

        <div class="border-t border-b border-gray-400 py-2 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">LENGUAJE</h1></div>
        <div class="border-b border-gray-400 py-5 mb-6"><h2 class="text-base md:text-lg font-semibold text-center text-gray-800 px-2"> No lo logra (0) | Lo intenta pero no lo logra (1) | En proceso (2) | Lo realiza inhábilmente (3) | Normal (4) </h2></div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
            <div>
                <label for="lenguaje_atencion_conjunta" class="block text-sm font-medium text-gray-700 mb-1">Atencion Conjunta</label>
                <select name="lenguaje_atencion_conjunta" id="lenguaje_atencion_conjunta" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_realiza_voca_uao" class="block text-sm font-medium text-gray-700 mb-1">Realizacion de vocalizaciones u, a, o</label>
                <select name="lenguaje_realiza_voca_uao" id="lenguaje_realiza_voca_uao" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_juego_vocalico" class="block text-sm font-medium text-gray-700 mb-1">Juego Vocálico</label>
                <select name="lenguaje_juego_vocalico" id="lenguaje_juego_vocalico" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_mama_baba" class="block text-sm font-medium text-gray-700 mb-1">Balbuceo reduplicativo/mama/baba</label>
                <select name="lenguaje_mama_baba" id="lenguaje_mama_baba" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_emergencia_gestos" class="block text-sm font-medium text-gray-700 mb-1">Emergencia de gestos deicticos(dar,mostrar,señalar)</label>
                <select name="lenguaje_emergencia_gestos" id="lenguaje_emergencia_gestos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_comprende_NO" class="block text-sm font-medium text-gray-700 mb-1">Comprende la palabra NO acompañada del gesto</label>
                <select name="lenguaje_comprende_NO" id="lenguaje_comprende_NO" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_primera_palabra" class="block text-sm font-medium text-gray-700 mb-1">Aparece la primera palabra (solo si se designa a un objeto)</label>
                <select name="lenguaje_primera_palabra" id="lenguaje_primera_palabra" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_gestos_reconocimiento" class="block text-sm font-medium text-gray-700 mb-1">Emplea gestos de reconocimientos</label>
                <select name="lenguaje_gestos_reconocimiento" id="lenguaje_gestos_reconocimiento" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_emplea_palabras" class="block text-sm font-medium text-gray-700 mb-1">Emplea por lo menos tres palabras (papá, mamá, sopa, agua)</label>
                <select name="lenguaje_emplea_palabras" id="lenguaje_emplea_palabras" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_forma_frases_2" class="block text-sm font-medium text-gray-700 mb-1">Forma frases de dos palabras </label>
                <select name="lenguaje_forma_frases_2" id="lenguaje_forma_frases_2" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_dice_nombre" class="block text-sm font-medium text-gray-700 mb-1">Dice su nombre</label>
                <select name="lenguaje_dice_nombre" id="lenguaje_dice_nombre" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
            <div>
                <label for="lenguaje_forma_frases_3" class="block text-sm font-medium text-gray-700 mb-1">Forma frases de tres palabras</label>
                <select name="lenguaje_forma_frases_3" id="lenguaje_forma_frases_3" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
            </div>
        </div>

        <div class="flex justify-between mt-8">
            <a href="agregar.mfino.php"> <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
            </a>
            <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
        </div>
    </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionP5_lenguaje'; // Clave para los datos de Lenguaje

            // 1. Recupera el objeto de datos del paciente principal (acumulado hasta ahora)
            const datosPacienteRaw = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let datosPaciente = {};
            if (datosPacienteRaw) {
                try {
                    datosPaciente = JSON.parse(datosPacienteRaw);
                } catch (e) {
                    console.error("Error al parsear datosPacienteParaEvaluacion en Lenguaje:", e);
                    window.location.href = 'agregar.view.php?error=datos_corruptos'; // Redirige si los datos base están corruptos
                    return;
                }
            } else {
                console.error("No se encontraron datos del paciente en sessionStorage en Lenguaje. Redirigiendo...");
                window.location.href = 'agregar.view.php?error=datos_faltantes'; // Redirige si faltan los datos base
                return;
            }

            // 2. Recupera los datos específicos de Lenguaje para este paso (si existen)
            const datosLenguajeGuardados = sessionStorage.getItem(sessionKey);
            let datosLenguaje = {};
            if (datosLenguajeGuardados) { 
                try { 
                    datosLenguaje = JSON.parse(datosLenguajeGuardados); 
                } catch(e) { 
                    console.error("Error Paso 5 (Lenguaje) al parsear datos guardados:", e);
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
                if(datosLenguaje.fecha_evaluacion) { 
                    dateInput.value = datosLenguaje.fecha_evaluacion; 
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
            const form = document.getElementById('evaluacionLenguajeForm'); 
            if(form && Object.keys(datosLenguaje).length > 0) { // Asegúrate de que datosLenguaje tiene propiedades
                const selects = form.querySelectorAll('select');
                selects.forEach(select => { 
                    if(datosLenguaje[select.name] !== undefined) { // Usa !== undefined para aceptar valores como 0
                        select.value = datosLenguaje[select.name]; 
                    } else {
                        select.value = ""; 
                    }
                });
            }

            // --- Console.log para ver los datos cargados al inicio de la página ---
            console.log('DEBUG (JS - al cargar la página - Lenguaje): datosPacienteParaEvaluacion (acumulado):', datosPaciente);
            console.log('DEBUG (JS - al cargar la página - Lenguaje): datosLenguaje (específico de este paso):', datosLenguaje);
            // --- Fin Console.log ---

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // 6. Recopila los datos del formulario de Lenguaje
                    const formDataLenguaje = new FormData(form);
                    const currentLenguajeData = {};
                    
                    // Iterar sobre todos los selects y guardar sus valores
                    const allSelects = form.querySelectorAll('select');
                    allSelects.forEach(select => {
                        currentLenguajeData[select.name] = select.value;
                    });

                    // Asegúrate de incluir la fecha de evaluación del formulario en los datos del paso actual
                    if(dateInput) currentLenguajeData['fecha_evaluacion'] = dateInput.value;

                    // NOTA: No hay validación de campos obligatorios en este paso,
                    // se guardarán todos los valores de los selects (incluidos los vacíos).

                    // 7. Fusiona los datos del paso actual con el objeto principal del paciente
                    datosPaciente.lenguaje = currentLenguajeData; 

                    // 8. console.log para verificar los datos ANTES de guardarlos
                    console.log('DEBUG (JS - Botón Siguiente - Lenguaje): datosPaciente (fusionado) A PUNTO DE GUARDAR:', datosPaciente);

                    try {
                        // 9. Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // 10. Opcional: guardar los datos de Lenguaje por separado
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentLenguajeData)); 

                        // 11. console.log para verificar los datos DESPUÉS de guardarlos
                        const datosVerificados = sessionStorage.getItem('datosPacienteParaEvaluacion');
                        console.log('DEBUG (JS - Botón Siguiente - Lenguaje): datosPaciente (RECUPERADO DE SESSIONSTORAGE DESPUÉS DE GUARDAR):', JSON.parse(datosVerificados));


                        window.location.href = 'agregar.posturas_tmyu.php'; // Redirige al siguiente paso
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage (Lenguaje):", e);
                        alert("Hubo un error al guardar los datos de Lenguaje."); 
                    }
                });
            }
        });
    </script>
</body>
</html>