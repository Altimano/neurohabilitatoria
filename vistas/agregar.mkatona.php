<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katona</title>
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
        .katona-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
        .katona-table th, .katona-table td {
            border: 1px solid #D1D5DB;
            padding: 0.5rem;
            text-align: center;
            vertical-align: middle;
        }
        .katona-table th {
            background-color: #F3F4F6;
            font-weight: 600;
            white-space: normal;
        }
        .katona-table td:first-child {
            text-align: left;
            font-weight: 500;
            white-space: normal;
        }
        .katona-table input[type="checkbox"] {
            height: 1.25rem;
            width: 1.25rem;
            color: #2563EB;
            border-color: #9CA3AF;
            display: block;
            margin: auto;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3></div>

    <div class="mx-6 md:mx-10 mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionKatonaForm">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">MANIOBRAS DE KATONA</h1></div>

            <div class="text-sm text-center text-gray-700 border-b border-gray-400 pb-4 mb-2">
                <strong>Normal(N), Hipotonía(-), Hipertonía(+), Miembros Toracicos(MTs), Miembro Pelvico(MP), Extremidades(E), Hemicuerpo(H), Contralateral(CL), Derecha(D), Izquierda(I), Ausente(A)</strong> 
            </div>

            <div class="overflow-x-auto">
                <table class="katona-table">
                    <thead>
                        <tr>
                            <th>Maniobra</th>
                            <th>Normal</th>     <th>Hipotonía</th>  <th>Hipertonía</th>  <th>M. Torácicos</th><th>M. Pélvicos</th> <th>Extremidades</th><th>Hemicuerpo</th>   <th>Contralateral</th>  <th>Derecha</th>     <th>Izquierda</th>   <th>Ausente</th>     </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Elevación de tronco (tracción de manos)</td>
                            <td><input type="checkbox" id="mk_elev_tronco_manos_N" name="mk_elev_tronco_manos[]" value="Normal"></td>
                            <td><input type="checkbox" id="mk_elev_tronco_manos_Hneg" name="mk_elev_tronco_manos[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_elev_tronco_manos_Hpos" name="mk_elev_tronco_manos[]" value="Hipertonía(+)"></td>
                            <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td><input type="checkbox" id="mk_elev_tronco_manos_A" name="mk_elev_tronco_manos[]" value="Ausente(A)"></td>
                        </tr>

                        <tr>
                            <td>Elevación de tronco (espalda-cadera)</td>
                            <td><input type="checkbox" id="mk_elev_tronco_espalda_N" name="mk_elev_tronco_espalda[]" value="Normal"></td>
                            <td><input type="checkbox" id="mk_elev_tronco_espalda_Hip" name="mk_elev_tronco_espalda[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_elev_tronco_espalda_Hiper" name="mk_elev_tronco_espalda[]" value="Hipertonía(+)"></td>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td><input type="checkbox" id="mk_elev_tronco_espalda_A" name="mk_elev_tronco_espalda[]" value="Ausente(A)"></td>
                        </tr>

                        <tr>
                            <td>Sentado al aire</td>
                            <td><input type="checkbox" id="mk_sentado_aire_N" name="mk_sentado_aire[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_sentado_aire_Hneg" name="mk_sentado_aire[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_sentado_aire_Hpos" name="mk_sentado_aire[]" value="Hipertonía(+)"></td>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td><input type="checkbox" id="mk_sentado_aire_A" name="mk_sentado_aire[]" value="Ausente(A)"></td>
                        </tr>
                        
                        <tr>
                            <td>Rotacion izquierda y derecha</td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_N" name="mk_rotacion_izq_der[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_Hneg" name="mk_rotacion_izq_der[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_Hpos" name="mk_rotacion_izq_der[]" value="Hipertonía(+)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_MTs" name="mk_rotacion_izq_der[]" value="Miembros Toracicos(MTs)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_MP" name="mk_rotacion_izq_der[]" value="Miembro Pelvico(MP)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_E1" name="mk_rotacion_izq_der[]" value="Extremidades(E)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_H" name="mk_rotacion_izq_der[]" value="Hemicuerpo(H)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_CL" name="mk_rotacion_izq_der[]" value="Contralateral(CL)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_D" name="mk_rotacion_izq_der[]" value="Derecha(D)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_I" name="mk_rotacion_izq_der[]" value="Izquierda(I)"></td>
                            <td><input type="checkbox" id="mk_rotacion_izq_der_A" name="mk_rotacion_izq_der[]" value="Ausente(A)"></td>
                        </tr>

                        <tr>
                            <td>Gateo asistido</td>
                            <td><input type="checkbox" id="mk_gateo_asistido_N" name="mk_gateo_asistido[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_Hneg" name="mk_gateo_asistido[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_Hpos" name="mk_gateo_asistido[]" value="Hipertonía(+)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_MTs" name="mk_gateo_asistido[]" value="Miembros Toracicos(MTs)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_MP" name="mk_gateo_asistido[]" value="Miembro Pelvico(MP)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_E1" name="mk_gateo_asistido[]" value="Extremidades(E)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_H" name="mk_gateo_asistido[]" value="Hemicuerpo(H)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_CL" name="mk_gateo_asistido[]" value="Contralateral(CL)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_D" name="mk_gateo_asistido[]" value="Derecha(D)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_I" name="mk_gateo_asistido[]" value="Izquierda(I)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_A" name="mk_gateo_asistido[]" value="Ausente(A)"></td>
                        </tr>
                        
                        <tr>
                            <td>Gateo asistido modificado</td>
                            <td><input type="checkbox" id="mk_gateo_asistido_mod_N" name="mk_gateo_asistido_mod[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_mod_Hneg" name="mk_gateo_asistido_mod[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_mod_Hpos" name="mk_gateo_asistido_mod[]" value="Hipertonía(+)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_mod_MTs" name="mk_gateo_asistido_mod[]" value="Miembros Toracicos(MTs)"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_mod_D" name="mk_gateo_asistido_mod[]" value="Derecha(D)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_mod_I" name="mk_gateo_asistido_mod[]" value="Izquierda(I)"></td>
                            <td><input type="checkbox" id="mk_gateo_asistido_mod_A" name="mk_gateo_asistido_mod[]" value="Ausente(A)"></td>
                        </tr>

                        <tr>
                            <td>Arrastre horizontal</td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_N" name="mk_arrastre_horizontal[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_Hneg" name="mk_arrastre_horizontal[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_Hpos" name="mk_arrastre_horizontal[]" value="Hipertonía(+)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_MTs" name="mk_arrastre_horizontal[]" value="Miembros Toracicos(MTs)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_MP" name="mk_arrastre_horizontal[]" value="Miembro Pelvico(MP)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_E1" name="mk_arrastre_horizontal[]" value="Extremidades(E)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_H" name="mk_arrastre_horizontal[]" value="Hemicuerpo(H)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_CL" name="mk_arrastre_horizontal[]" value="Contralateral(CL)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_D" name="mk_arrastre_horizontal[]" value="Derecha(D)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_I" name="mk_arrastre_horizontal[]" value="Izquierda(I)"></td>
                            <td><input type="checkbox" id="mk_arrastre_horizontal_A" name="mk_arrastre_horizontal[]" value="Ausente(A)"></td>
                        </tr>
                        
                        <tr>
                            <td>Marcha en plano horizontal</td>
                            <td><input type="checkbox" id="mk_marcha_plano_horizontal_N" name="mk_marcha_plano_horizontal[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_marcha_plano_horizontal_Hneg" name="mk_marcha_plano_horizontal[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_marcha_plano_horizontal_Hpos" name="mk_marcha_plano_horizontal[]" value="Hipertonía(+)"></td>
                            <td></td>
                            <td><input type="checkbox" id="mk_marcha_plano_horizontal_MP" name="mk_marcha_plano_horizontal[]" value="Miembro Pelvico(MP)"></td>
                            <td></td>
                            <td></td>
                            <td>    </td>
                            <td><input type="checkbox" id="mk_marcha_plano_horizontal_D" name="mk_marcha_plano_horizontal[]" value="Derecha(D)"></td>
                            <td><input type="checkbox" id="mk_marcha_plano_horizontal_I" name="mk_marcha_plano_horizontal[]" value="Izquierda(I)"></td>
                            <td><input type="checkbox" id="mk_marcha_plano_horizontal_A" name="mk_marcha_plano_horizontal[]" value="Ausente(A)"></td>
                        </tr>

                        <tr>
                            <td>Marcha en plano ascendente</td>
                            <td><input type="checkbox" id="mk_marcha_plano_ascendente_N" name="mk_marcha_plano_ascendente[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_marcha_plano_ascendente_Hneg" name="mk_marcha_plano_ascendente[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_marcha_plano_ascendente_Hpos" name="mk_marcha_plano_ascendente[]" value="Hipertonía(+)"></td>
                            <td></td>
                            <td><input type="checkbox" id="mk_marcha_plano_ascendente_MP" name="mk_marcha_plano_ascendente[]" value="Miembro Pelvico(MP)"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" id="mk_marcha_plano_ascendente_D" name="mk_marcha_plano_ascendente[]" value="Derecha(D)"></td>
                            <td><input type="checkbox" id="mk_marcha_plano_ascendente_I" name="mk_marcha_plano_ascendente[]" value="Izquierda(I)"></td>
                            <td><input type="checkbox" id="mk_marcha_plano_ascendente_A" name="mk_marcha_plano_ascendente[]" value="Ausente(A)"></td>
                        </tr>
                        
                        <tr>
                            <td>Arrastre en plano inclinado descendente</td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_N" name="mk_arrastre_inclinado_desc[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_Hneg" name="mk_arrastre_inclinado_desc[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_Hpos" name="mk_arrastre_inclinado_desc[]" value="Hipertonía(+)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_MTs" name="mk_arrastre_inclinado_desc[]" value="Miembros Toracicos(MTs)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_MP" name="mk_arrastre_inclinado_desc[]" value="Miembro Pelvico(MP)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_E1" name="mk_arrastre_inclinado_desc[]" value="Extremidades(E)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_H" name="mk_arrastre_inclinado_desc[]" value="Hemicuerpo(H)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_CL" name="mk_arrastre_inclinado_desc[]" value="Contralateral(CL)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_D" name="mk_arrastre_inclinado_desc[]" value="Derecha(D)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_I" name="mk_arrastre_inclinado_desc[]" value="Izquierda(I)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_desc_A" name="mk_arrastre_inclinado_desc[]" value="Ausente(A)"></td>
                        </tr>

                        <tr>
                            <td>Arrastre en plano inclinado ascendente</td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_N" name="mk_arrastre_inclinado_asc[]" value="Normal(N)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_Hneg" name="mk_arrastre_inclinado_asc[]" value="Hipotonía(-)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_Hpos" name="mk_arrastre_inclinado_asc[]" value="Hipertonía(+)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_MTs" name="mk_arrastre_inclinado_asc[]" value="Miembros Toracicos(MTs)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_MP" name="mk_arrastre_inclinado_asc[]" value="Miembro Pelvico(MP)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_E1" name="mk_arrastre_inclinado_asc[]" value="Extremidades(E)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_H" name="mk_arrastre_inclinado_asc[]" value="Hemicuerpo(H)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_CL" name="mk_arrastre_inclinado_asc[]" value="Contralateral(CL)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_D" name="mk_arrastre_inclinado_asc[]" value="Derecha(D)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_I" name="mk_arrastre_inclinado_asc[]" value="Izquierda(I)"></td>
                            <td><input type="checkbox" id="mk_arrastre_inclinado_asc_A" name="mk_arrastre_inclinado_asc[]" value="Ausente(A)"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between mt-8">
                <a href="agregar.view.php"> 
                    <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            // Define la clave que se usará en sessionStorage para guardar los datos de este paso del formulario.
            const sessionKey = 'evaluacionPaso2_mkatona';
            // Intenta obtener los datos previamente guardados en sessionStorage para esta clave.
            const datosGuardados = sessionStorage.getItem(sessionKey);
            // Inicializa un objeto vacío para almacenar los datos del formulario parseados desde JSON.
            let datosJson = {};

            // Si se encontraron datos guardados en sessionStorage...
            if (datosGuardados) { 
                try { 
                    // Intenta convertir la cadena JSON de sessionStorage a un objeto JavaScript.
                    datosJson = JSON.parse(datosGuardados); 
                } catch(e) { 
                    console.error("Error Paso 2 (Katona) al parsear datos guardados:", e);
                }
            }
            
            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
            // Si se encontraron datos del Paso 1
            if (datosPaso1Raw) {
                try {
                    // Parsea los datos del Paso 1.
                    const dP1 = JSON.parse(datosPaso1Raw);
                    if (mesDisplay && dP1.mes) {
                        // Muestra el mes.
                        mesDisplay.textContent = dP1.mes;
                    } else if (mesDisplay) {
                        //No muestra el mes
                        mesDisplay.textContent = 'No disponible';
                    }
                } catch(e){
                    if(mesDisplay) mesDisplay.textContent = 'Error al cargar mes';
                    console.error("Error Paso 2 (Katona): No se pudo parsear JSON de evaluacionPaso1 para el mes.", e);
                }
            } else if(mesDisplay) {
                mesDisplay.textContent = 'No disponible';
            }

            if (dateInput) {
                if(datosJson.fecha_evaluacion) { 
                    dateInput.value = datosJson.fecha_evaluacion; 
                } else { 
                    if(datosPaso1Raw) {
                        try {
                            const dP1 = JSON.parse(datosPaso1Raw); 
                            if(dP1.fecha_evaluacion) dateInput.value = dP1.fecha_evaluacion;
                        } catch(e) {
                            console.warn("Advertencia: No se pudo parsear fecha de evaluacionPaso1, se usará la fecha actual si no hay otra.", e);
                        }
                    }
                    if(!dateInput.value) { 
                        const t = new Date(); 
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                    }
                }
            }

            // Obtiene la referencia al formulario.
            const form = document.getElementById('evaluacionKatonaForm');
            // Define un array con los nombres de los grupos de checkboxes (para cada maniobra), y debe de coincidir con name.
            const checkboxGroupsNames = [
                'mk_elev_tronco_manos', 
                'mk_elev_tronco_espalda', 
                'mk_sentado_aire',
                'mk_rotacion_izq_der', 
                'mk_gateo_asistido', 
                'mk_gateo_asistido_mod',
                'mk_arrastre_horizontal', 
                'mk_marcha_plano_horizontal', 
                'mk_marcha_plano_ascendente',
                'mk_arrastre_inclinado_desc', 
                'mk_arrastre_inclinado_asc'
            ];

            // Si el formulario existe y el objeto datosJson tiene al menos una propiedad
            if(form && Object.keys(datosJson).length > 0) {
                // Itera sobre cada nombre de grupo de checkboxes.
                checkboxGroupsNames.forEach(groupName => {
                    if (datosJson[groupName] && Array.isArray(datosJson[groupName])) {
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            if (datosJson[groupName].includes(checkbox.value)) {
                                // Marca el checkbox.
                                checkbox.checked = true;
                            } else {
                                // Desmarca el checkbox.
                                checkbox.checked = false;
                            }
                        });
                    } else {
                        // se asegura de que todos los checkboxes de este grupo estén desmarcados.
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            checkbox.checked = false;
                        });
                    }
                });
            }

            // Obtiene la referencia al botón 'Siguiente'.
            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // Crea un objeto vacío para almacenar los datos de este paso del formulario.
                    const datosPaso2 = {};
                    if(dateInput) datosPaso2['fecha_evaluacion'] = dateInput.value;
                    
                    // Itera sobre cada nombre de grupo de checkboxes.
                    checkboxGroupsNames.forEach(groupName => {
                        // Selecciona solo los checkboxes marcados dentro del grupo actual.
                        const checkedBoxes = form.querySelectorAll(`input[name="${groupName}[]"]:checked`);
                        // Crea un array vacío para almacenar los valores de los checkboxes marcados.
                        const values = [];
                        // Itera sobre los checkboxes marcados y añade sus valores al array 'values'.
                        checkedBoxes.forEach(checkbox => { values.push(checkbox.value); });
                        // Asigna el array de valores al nombre del grupo correspondiente en el objeto datosPaso2.
                        datosPaso2[groupName] = values;
                    });

                    // Muestra en la consola los datos que se van a guardar (útil para depuración).
                    console.log(`Datos guardados en ${sessionKey} (Katona):`, datosPaso2);

                    try {
                        // Intenta guardar el objeto datosPaso2 en sessionStorage.
                        // Primero lo convierte a una cadena JSON porque sessionStorage solo almacena cadenas.
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso2));
                        // Redirige al usuario a la siguiente página del formulario.
                        window.location.href = 'agregar.mgrueso.php';
                    } catch(e) { 
                        // Si ocurre un error al guardar en sessionStorage (ej. almacenamiento lleno),
                        // lo muestra en consola y alerta al usuario.
                        console.error(`Error guardando datos de ${sessionKey}:`, e);
                        alert("Hubo un error al guardar los datos de Katona."); 
                    }
                });
            }
        });
    </script>
</body>
</html>