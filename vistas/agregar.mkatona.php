<?php
//para verificacion de la version descomentar
//phpinfo();
?>
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
                <strong>Normal(N), Hipotonía(-), Hipertonía(+), Miembros Torácicos(MTs), Miembro Pélvico(MP), Extremidades(E), Hemicuerpo(H), Contralateral(CL), Derecha(D), Izquierda(I), Ausente(A)</strong> 
            </div>

            <div class="overflow-x-auto">
                <table class="katona-table">
                    <thead>
                        <tr>
                            <th>Maniobra</th>
                            <th>Normal</th>     <th>Hipotonía</th>  <th>Hipertonía</th>   <th>M. Torácicos</th><th>M. Pélvicos</th>  <th>Extremidades</th><th>Hemicuerpo</th>    <th>Contralateral</th>   <th>Derecha</th>     <th>Izquierda</th>   <th>Ausente</th>     </tr>
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
                            <td></td>
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
            const sessionKey = 'evaluacionP2_mkatona'; // Clave para los datos de Katona en sessionStorage

            // Recupera todos los datos del paciente (Paso 1)
            const datosPacienteRaw = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let datosPaciente = {};
            if (datosPacienteRaw) {
                try {
                    datosPaciente = JSON.parse(datosPacienteRaw);
                } catch (e) {
                    console.error("Error al parsear datosPacienteParaEvaluacion:", e);
                    // Opcional: redirigir o mostrar un error fatal si los datos base están corruptos
                    window.location.href = 'agregar.view.php?error=datos_corruptos';
                    return;
                }
            } else {
                console.error("No se encontraron datos del paciente en sessionStorage. Redirigiendo...");
                window.location.href = 'agregar.view.php?error=datos_faltantes';
                return;
            }

            // Recupera los datos específicos de Katona para este paso (si existen)
            const datosKatonaGuardados = sessionStorage.getItem(sessionKey);
            let datosKatona = {};
            if (datosKatonaGuardados) { 
                try { 
                    datosKatona = JSON.parse(datosKatonaGuardados); 
                } catch(e) { 
                    console.error("Error Paso 2 (Katona) al parsear datos guardados:", e);
                }
            }
            
            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            if (mesDisplay && datosPaciente.mes) { // Usa datosPaciente.mes
                mesDisplay.textContent = datosPaciente.mes;
            } else if (mesDisplay) {
                mesDisplay.textContent = 'No disponible';
            }

            if (dateInput) {
                // Si ya hay una fecha guardada para Katona, úsala
                if(datosKatona.fecha_evaluacion) { 
                    dateInput.value = datosKatona.fecha_evaluacion; 
                } 
                // Si no hay fecha para Katona, pero hay una fecha de inicio de tratamiento del Paso 1, úsala
                else if(datosPaciente.fecha_inicio_tratamiento) {
                    dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                }
                // Si ninguna de las anteriores, usa la fecha actual
                else { 
                    const t = new Date(); 
                    dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                }
            }

            const form = document.getElementById('evaluacionKatonaForm');
            const checkboxGroupsNames = [
                'mk_elev_tronco_manos', 'mk_elev_tronco_espalda', 'mk_sentado_aire',
                'mk_rotacion_izq_der', 'mk_gateo_asistido', 'mk_gateo_asistido_mod',
                'mk_arrastre_horizontal', 'mk_marcha_plano_horizontal', 'mk_marcha_plano_ascendente',
                'mk_arrastre_inclinado_desc', 'mk_arrastre_inclinado_asc'
            ];

            // Rellenar checkboxes con datos previamente guardados para Katona
            if(form && Object.keys(datosKatona).length > 0) { // Asegúrate de que datosKatona tiene propiedades
                checkboxGroupsNames.forEach(groupName => {
                    if (datosKatona[groupName] && Array.isArray(datosKatona[groupName])) {
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            if (datosKatona[groupName].includes(checkbox.value)) {
                                checkbox.checked = true;
                            } else {
                                checkbox.checked = false;
                            }
                        });
                    } else {
                        // Si no hay datos guardados para este grupo, asegúrate de que todos estén desmarcados
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            checkbox.checked = false;
                        });
                    }
                });
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // Recopila los datos específicos de Katona
                    const currentKatonaData = {};
                    currentKatonaData['fecha_evaluacion'] = dateInput.value;
                    
                    checkboxGroupsNames.forEach(groupName => {
                        const checkedBoxes = form.querySelectorAll(`input[name="${groupName}[]"]:checked`);
                        const values = [];
                        checkedBoxes.forEach(checkbox => { values.push(checkbox.value); });
                        currentKatonaData[groupName] = values;
                    });

                    // Fusiona los datos del paciente (Paso 1) con los datos de Katona (Paso 2)
                    // datosPaciente ya contiene los datos del Paso 1, ahora le agregamos los de Katona
                    Object.assign(datosPaciente, { katona: currentKatonaData }); // Opcional: encapsular Katona en una propiedad 'katona'

                    // console.log para verificar los datos antes de guardarlos
                    console.log('DEBUG (JS - Botón Siguiente - Katona): datosPaciente (fusionado) a guardar:', datosPaciente);

                    try {
                        // Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // Opcional: guardar los datos de Katona por separado si necesitas acceder a ellos directamente
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentKatonaData)); 

                        window.location.href = 'agregar.mgrueso.php'; // Redirige al siguiente paso
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage (Katona):", e);
                        alert("Hubo un error al guardar los datos de Katona."); 
                    }
                });
            }
        });
    </script>
</body>
</html>