<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Fino</title>
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
    <form id="evaluacionMotorFinoForm" action="?" method="post">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">MOTOR FINO</h1></div>
            <div class="border-b border-gray-400 py-5 mb-6"><h2 class="text-base md:text-lg font-semibold text-center text-gray-800 px-2"> No lo logra (0) | Lo intenta pero no lo logra (1) | En proceso (2) | Lo realiza inhábilmente (3) | Normal (4) </h2></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                 <div>
                     <label for="mf_manos_linea_media" class="block text-sm font-medium text-gray-700 mb-1"><strong>Lleva las manos a la linea media*</strong></label>
                     <select name="mf_manos_linea_media" id="mf_manos_linea_media" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_mantiene_objeto" class="block text-sm font-medium text-gray-700 mb-1">Tiene y mantiene firmemente un objeto con la mano</label>
                     <select name="mf_mantiene_objeto" id="mf_mantiene_objeto" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_estira_ambas_manos" class="block text-sm font-medium text-gray-700 mb-1">Se estira para tomar un objeto con ambas manos</label>
                     <select name="mf_estira_ambas_manos" id="mf_estira_ambas_manos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_estruja_papel" class="block text-sm font-medium text-gray-700 mb-1"><strong>Estruja papel, sabanas, ropa, etc...*</strong></label>
                     <select name="mf_estruja_papel" id="mf_estruja_papel" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_transfiere_manos" class="block text-sm font-medium text-gray-700 mb-1"><strong>Toma un objeto y la tranfiere entre sus manos*</strong></label>
                     <select name="mf_transfiere_manos" id="mf_transfiere_manos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_examina_objetos" class="block text-sm font-medium text-gray-700 mb-1">Toma objetos que estan a su alcance y los examina</label>
                     <select name="mf_examina_objetos" id="mf_examina_objetos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_desarrolla_agarre" class="block text-sm font-medium text-gray-700 mb-1"><strong>Comienza a desarrollar agarre indice-pulgar*</strong></label>
                     <select name="mf_desarrolla_agarre" id="mf_desarrolla_agarre" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_inserta_agujero" class="block text-sm font-medium text-gray-700 mb-1">Inserta objetos en un agujero grande</label>
                     <select name="mf_inserta_agujero" id="mf_inserta_agujero" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_pinza_superior" class="block text-sm font-medium text-gray-700 mb-1"><strong>Pinza superior*</strong></label>
                     <select name="mf_pinza_superior" id="mf_pinza_superior" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_senala_indice" class="block text-sm font-medium text-gray-700 mb-1">Señala con el dedo indice</label>
                     <select name="mf_senala_indice" id="mf_senala_indice" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_torre_2_cubos" class="block text-sm font-medium text-gray-700 mb-1"><strong>Forma una torre de 2 cubos*</strong></label>
                     <select name="mf_torre_2_cubos" id="mf_torre_2_cubos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_garabatea_imitacion" class="block text-sm font-medium text-gray-700 mb-1">Garabatea espontaneamente por imitacion</label>
                     <select name="mf_garabatea_imitacion" id="mf_garabatea_imitacion" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_toma_2_cubos_mano" class="block text-sm font-medium text-gray-700 mb-1">Toma 2 cubos en una mano</label>
                     <select name="mf_toma_2_cubos_mano" id="mf_toma_2_cubos_mano" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_torre_3_4_cubos" class="block text-sm font-medium text-gray-700 mb-1">Forma una torre con 3 o 4 cubos</label>
                     <select name="mf_torre_3_4_cubos" id="mf_torre_3_4_cubos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_introduce_bolitas" class="block text-sm font-medium text-gray-700 mb-1">Introduce bolitas en la botella</label>
                     <select name="mf_introduce_bolitas" id="mf_introduce_bolitas" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_vueltas_paginas" class="block text-sm font-medium text-gray-700 mb-1">Da vueltas a las paginas de un libro(2 o 3 a la vez)</label>
                     <select name="mf_vueltas_paginas" id="mf_vueltas_paginas" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_intenta_quitar_rosca" class="block text-sm font-medium text-gray-700 mb-1">Intenta quitar la rosca o tapa de un frasco pequeño</label>
                     <select name="mf_intenta_quitar_rosca" id="mf_intenta_quitar_rosca" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_imita_trazo_vertical" class="block text-sm font-medium text-gray-700 mb-1">Imita trazo vertical</label>
                     <select name="mf_imita_trazo_vertical" id="mf_imita_trazo_vertical" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_torre_6_cubos" class="block text-sm font-medium text-gray-700 mb-1"><strong>Arma torre de 6 cubos*</strong></label>
                     <select name="mf_torre_6_cubos" id="mf_torre_6_cubos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
                 <div>
                     <label for="mf_arma_tren_3_cubos" class="block text-sm font-medium text-gray-700 mb-1">Arma tren de 3 cubos</label>
                     <select name="mf_arma_tren_3_cubos" id="mf_arma_tren_3_cubos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                          <option value="" disabled selected>Seleccione una opción</option>
                         <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                     </select>
                 </div>
            </div>

            <div class="flex justify-between mt-8">
                 <a href="agregar.mgrueso.php">
                     <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                 </a>
                 <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionPaso4_mfino';
            const datosGuardados = sessionStorage.getItem(sessionKey);
            let datosJson = {};
            if (datosGuardados) { 
                try { 
                    datosJson = JSON.parse(datosGuardados); 
                } catch(e) { 
                    console.error("Error P4_M Fino al parsear datos guardados:", e); 
                    sessionStorage.removeItem(sessionKey); 
                } 
            }
            
            if (dateInput) {
                if(datosJson.fecha_evaluacion) { 
                    dateInput.value = datosJson.fecha_evaluacion; 
                } else { 
                    const dP3R = sessionStorage.getItem('evaluacionPaso3_mgrueso');
                    if(dP3R){ 
                        try{ 
                            const dP3 = JSON.parse(dP3R); 
                            if(dP3.fecha_evaluacion) dateInput.value = dP3.fecha_evaluacion; 
                        } catch(e){} 
                    }
                    if(!dateInput.value) { 
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
                } catch(e){ 
                    if(mesDisplay) mesDisplay.textContent = 'Error';
                }
            } else if(mesDisplay) { 
                mesDisplay.textContent = 'No disponible'; 
            }

            const form = document.getElementById('evaluacionMotorFinoForm');
            if(form && datosJson) {
                const selects = form.querySelectorAll('select');
                selects.forEach(select => { 
                    if(datosJson[select.name] !== undefined) {
                        select.value = datosJson[select.name]; 
                    } 
                });
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const formDataFino = new FormData(form);
                    const datosPaso = {};
                    
                    console.log("Contenido de FormData en agregar.mfino.php:");
                    for (let [key, value] of formDataFino.entries()) {
                        console.log(key + ': ' + value);
                        datosPaso[key] = value; 
                    }

                    if(dateInput) datosPaso['fecha_evaluacion'] = dateInput.value;

                    try {
                        console.log(`Datos guardados en ${sessionKey} (Motor Fino):`)
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso));
                        window.location.href = 'agregar.lenguaje.php';
                    } catch(e) { 
                        console.error("Error guardando P4_M Fino:", e); 
                        alert("Hubo un error al guardar."); 
                    }
                });
            }
        });
    </script>
</body>
</html>