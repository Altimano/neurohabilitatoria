<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postura, Tono Muscular y Ubicacion</title>
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
        .evaluation-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            margin-bottom: 2rem;
            font-size: 0.875rem;
        }
        .evaluation-table th, .evaluation-table td {
            border: 1px solid #D1D5DB;
            padding: 0.5rem; 
            text-align: center;
            vertical-align: middle;
        }
        .evaluation-table th {
            background-color: #F3F4F6;
            font-weight: 600;
            white-space: normal; 
        }
        .evaluation-table td:first-child {
            text-align: left;
            font-weight: 500;
            white-space: normal;
        }
        .evaluation-table input[type="checkbox"] {
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
    <form id="evaluacionTonoUbicacionForm">
        <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

        <div class="mb-6 text-center">
            <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
            <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
        </div>

        <div class="border-t border-b border-gray-400 py-2 mb-2 mt-6"><h1 class="text-xl font-semibold text-center text-gray-800">TONO MUSCULAR Y UBICACIÓN</h1></div>
        <div class="text-sm text-center text-gray-700 pb-4 mb-2">
            <strong>Leyenda: General(1), Axial(2), Extremidades(3), Miembros Torácicos(4), Miembros Pélvicos(5), Hemicuerpo(6), Contralateral(7), Derecho(8), Izquierdo(9), Normal</strong>
        </div>
        <div class="overflow-x-auto">
            <table class="evaluation-table">
                <thead>
                    <tr>
                        <th>Tipo de Tono</th>
                        <th>General</th>
                        <th>Axial</th>
                        <th>Extremidades</th>
                        <th>M. Torácicos</th>
                        <th>M. Pélvicos</th>
                        <th>Hemicuerpo</th>
                        <th>Contralateral</th>
                        <th>Derecho</th>
                        <th>Izquierdo</th>
                        <th>Normal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hipotonía</td>
                        <td><input type="checkbox" id="tu_hipotonia_opt1" name="tu_hipotonia[]" value="general(1)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt2" name="tu_hipotonia[]" value="axial(2)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt3" name="tu_hipotonia[]" value="extremidades(3)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt4" name="tu_hipotonia[]" value="miembros Toracicos(4)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt5" name="tu_hipotonia[]" value="miembros Pelvicos(5)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt6" name="tu_hipotonia[]" value="hemicuerpo(6)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt7" name="tu_hipotonia[]" value="contralateral(7)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt8" name="tu_hipotonia[]" value="derecho(8)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt9" name="tu_hipotonia[]" value="izquierdo(9)"></td>
                        <td><input type="checkbox" id="tu_hipotonia_opt10" name="tu_hipotonia[]" value="normal"></td>
                    </tr>
                    <tr>
                        <td>Hipertonía</td>
                        <td><input type="checkbox" id="tu_hipertonia_opt1" name="tu_hipertonia[]" value="general(1)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt2" name="tu_hipertonia[]" value="axial(2)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt3" name="tu_hipertonia[]" value="extremidades(3)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt4" name="tu_hipertonia[]" value="miembros Toracicos(4)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt5" name="tu_hipertonia[]" value="miembros Pelvicos(5)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt6" name="tu_hipertonia[]" value="hemicuerpo(6)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt7" name="tu_hipertonia[]" value="contralateral(7)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt8" name="tu_hipertonia[]" value="derecho(8)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt9" name="tu_hipertonia[]" value="izquierdo(9)"></td>
                        <td><input type="checkbox" id="tu_hipertonia_opt10" name="tu_hipertonia[]" value="normal"></td>
                    </tr>
                    <tr>
                        <td>Mixto (Hipotonía/Hipertonía)</td>
                        <td><input type="checkbox" id="tu_mixto_opt1" name="tu_mixto[]" value="general(1)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt2" name="tu_mixto[]" value="axial(2)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt3" name="tu_mixto[]" value="extremidades(3)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt4" name="tu_mixto[]" value="miembros Toracicos(4)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt5" name="tu_mixto[]" value="miembros Pelvicos(5)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt6" name="tu_mixto[]" value="hemicuerpo(6)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt7" name="tu_mixto[]" value="contralateral(7)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt8" name="tu_mixto[]" value="derecho(8)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt9" name="tu_mixto[]" value="izquierdo(9)"></td>
                        <td><input type="checkbox" id="tu_mixto_opt10" name="tu_mixto[]" value="normal"></td>
                    </tr>
                    <tr>
                        <td>Fluctuante</td>
                        <td><input type="checkbox" id="tu_fluctuante_opt1" name="tu_fluctuante[]" value="general(1)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt2" name="tu_fluctuante[]" value="axial(2)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt3" name="tu_fluctuante[]" value="extremidades(3)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt4" name="tu_fluctuante[]" value="miembros Toracicos(4)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt5" name="tu_fluctuante[]" value="miembros Pelvicos(5)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt6" name="tu_fluctuante[]" value="hemicuerpo(6)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt7" name="tu_fluctuante[]" value="contralateral(7)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt8" name="tu_fluctuante[]" value="derecho(8)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt9" name="tu_fluctuante[]" value="izquierdo(9)"></td>
                        <td><input type="checkbox" id="tu_fluctuante_opt10" name="tu_fluctuante[]" value="normal"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section-title border-t border-b border-gray-400 py-2 mb-2 mt-6"><h1 class="text-xl font-semibold text-center text-gray-800">POSTURA</h1></div>
        <div class="text-sm text-center text-gray-700 pb-4 mb-2">
            <strong>Leyenda: Axial(1), Miembros Torácicos(2), Miembro Pélvicos(3), Hemicuerpo(4), Contralateral(5), Derecho(6), Izquierdo(7), Normal</strong>
        </div>
        <div class="overflow-x-auto">
            <table class="evaluation-table">
                <thead>
                    <tr>
                        <th>Característica</th>
                        <th>Axial</th>
                        <th>M. Torácicos</th>
                        <th>M. Pélvicos</th>
                        <th>Hemicuerpo</th>
                        <th>Contralateral</th>
                        <th>Derecho</th>
                        <th>Izquierdo</th>
                        <th>Normal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Asimetría</td>
                        <td><input type="checkbox" id="Asimetria_opt1" name="Asimetria[]" value="axial(1)"></td>
                        <td><input type="checkbox" id="Asimetria_opt2" name="Asimetria[]" value="miembros Toracicos(2)"></td>
                        <td><input type="checkbox" id="Asimetria_opt3" name="Asimetria[]" value="miembros Pelvicos(3)"></td>
                        <td><input type="checkbox" id="Asimetria_opt4" name="Asimetria[]" value="hemicuerpo(4)"></td>
                        <td><input type="checkbox" id="Asimetria_opt5" name="Asimetria[]" value="contralateral(5)"></td>
                        <td><input type="checkbox" id="Asimetria_opt6" name="Asimetria[]" value="derecho(6)"></td>
                        <td><input type="checkbox" id="Asimetria_opt7" name="Asimetria[]" value="izquierdo(7)"></td>
                        <td><input type="checkbox" id="Asimetria_opt8" name="Asimetria[]" value="normal"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-between mt-8">
            <a href="agregar.lenguaje.php">
                <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
            </a>
            <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
        </div>
    </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionPaso6_posturas_tmyu'; 
            const datosGuardados = sessionStorage.getItem(sessionKey);
            let datosJson = {};

            if (datosGuardados) {
                try {
                    datosJson = JSON.parse(datosGuardados);
                } catch(e) {
                    console.error("Error Paso 6 (Posturas TMyU) al parsear datos guardados:", e);
                    sessionStorage.removeItem(sessionKey);
                }
            }

            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
            if (datosPaso1Raw) {
                try {
                    const dP1 = JSON.parse(datosPaso1Raw);
                    if (mesDisplay && dP1.mes) {
                        mesDisplay.textContent = dP1.mes;
                    } else if (mesDisplay) {
                        mesDisplay.textContent = 'No disponible';
                    }
                } catch(e){
                    if(mesDisplay) mesDisplay.textContent = 'Error al cargar mes';
                    console.error("Error Paso 6 (Posturas TMyU): No se pudo parsear JSON de evaluacionPaso1 para el mes.", e);
                }
            } else if(mesDisplay) {
                mesDisplay.textContent = 'No disponible';
            }

            if (dateInput) {
                if(datosJson.fecha_evaluacion) {
                    dateInput.value = datosJson.fecha_evaluacion;
                } else { 
                    const datosPaso5Raw = sessionStorage.getItem('evaluacionPaso5_lenguaje'); 
                    if(datosPaso5Raw){
                        try{
                            const dP5 = JSON.parse(datosPaso5Raw);
                            if(dP5.fecha_evaluacion) dateInput.value = dP5.fecha_evaluacion;
                        } catch(e) {
                            console.error("Error Paso 6 (Posturas TMyU): No se pudo parsear JSON de evaluacionPaso5_lenguaje.", e);
                        }
                    }
                    if(!dateInput.value) {
                        const t = new Date();
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`;
                    }
                }
            }

            const form = document.getElementById('evaluacionTonoUbicacionForm');
            const checkboxGroupNames = [
                'tu_hipotonia', 
                'tu_hipertonia', 
                'tu_mixto', 
                'tu_fluctuante',
                'Asimetria' // Asegúrate que este 'Asimetria' coincida con el name="Asimetria[]"
                            // Si tenías un grupo 'tu_normal[]' separado y lo quieres, añádelo aquí.
            ];

            if(form && Object.keys(datosJson).length > 0) {
                checkboxGroupNames.forEach(groupName => {
                    if (datosJson[groupName] && Array.isArray(datosJson[groupName])) {
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            if (datosJson[groupName].includes(checkbox.value)) {
                                checkbox.checked = true;
                            } else {
                                checkbox.checked = false; 
                            }
                        });
                    } else {
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
                    const datosPaso = {};
                    if(dateInput) datosPaso['fecha_evaluacion'] = dateInput.value;

                    checkboxGroupNames.forEach(groupName => {
                        const checkedBoxes = form.querySelectorAll(`input[name="${groupName}[]"]:checked`);
                        const values = [];
                        checkedBoxes.forEach(checkbox => { values.push(checkbox.value); });
                        datosPaso[groupName] = values;
                    });

                    console.log(`Datos guardados en ${sessionKey} (Posturas TMyU):`, datosPaso);

                    try {
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso));
                        window.location.href = 'agregar.signos_alarma.php';
                    } catch(e) {
                        console.error(`Error guardando datos de ${sessionKey}:`, e);
                        alert("Hubo un error al guardar los datos de Postura, Tono Muscular y Ubicación.");
                    }
                });
            }
        });
    </script>
</body>
</html>