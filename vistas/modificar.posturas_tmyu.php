<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tono Muscular y Ubicación, Postura</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area {
            background-color: #FFFFFF;
        }

        .bg-custom-main-box {
            background: linear-gradient(135deg, #E0F2FE 0%, #F0F9FF 100%);
        }

        .bg-custom-button {
            background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%);
        }

        .text-custom-title {
            color: #0369A1;
        }

        input[readonly],
        textarea[readonly] {
            background-color: #F3F4F6;
            cursor: default;
            border-color: #D1D5DB;
            color: #4B5563;
        }

        .floating-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #E5E7EB;
        }

        .progress-indicator {
            background: linear-gradient(90deg, #10B981 0%, #059669 100%);
            height: 4px;
            border-radius: 2px;
            transition: width 0.3s ease-in-out;
        }

        .katona-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            font-size: 0.875rem;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .katona-table th,
        .katona-table td {
            border: 1px solid #E5E7EB;
            padding: 0.75rem 0.5rem;
            text-align: center;
            vertical-align: middle;
            transition: background-color 0.2s ease-in-out;
        }

        .katona-table th {
            background: linear-gradient(135deg, #F8FAFC 0%, #F1F5F9 100%);
            font-weight: 700;
            white-space: normal;
            color: #334155;
            font-size: 0.8rem;
            line-height: 1.3;
        }

        .katona-table td:first-child {
            text-align: left;
            font-weight: 600;
            white-space: normal;
            background: linear-gradient(135deg, #FEFEFE 0%, #F8FAFC 100%);
            color: #1E293B;
            padding-left: 1rem;
        }

        .katona-table tbody tr:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }

        .katona-table input[type="checkbox"] {
            height: 1.25rem;
            width: 1.25rem;
            color: #2563EB;
            border-color: #9CA3AF;
            border-radius: 4px;
            display: block;
            margin: auto;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .katona-table input[type="checkbox"]:hover {
            transform: scale(1.1);
            border-color: #2563EB;
        }

        .katona-table input[type="checkbox"]:checked {
            background-color: #2563EB;
            border-color: #2563EB;
            transform: scale(1.05);
        }

        .legend-card {
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            border-left: 4px solid #F59E0B;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            background: white;
            border-radius: 16px;
            padding: 1.5rem 2rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            margin-bottom: 2rem;
        }

        .info-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #E5E7EB;
            margin-bottom: 2rem;
        }

        .navigation-buttons {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            margin-top: 2rem;
        }

        .btn-navigation {
            background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.2);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 120px;
        }

        .btn-navigation:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(2, 132, 199, 0.35);
            background: linear-gradient(135deg, #0369A1 0%, #1E40AF 100%);
        }

        .btn-navigation:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.2);
        }

        .btn-navigation:focus {
            outline: none;
            box-shadow: 0 0 0 2px #3B82F6, 0 6px 20px rgba(2, 132, 199, 0.35);
        }

        .date-input {
            background: white;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .date-input:focus {
            outline: none;
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .table-container {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            overflow-x: auto;
        }

        .abbreviation-tag {
            background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            margin: 0.125rem;
            display: inline-block;
        }

        @media (max-width: 768px) {

            .katona-table th,
            .katona-table td {
                padding: 0.5rem 0.25rem;
                font-size: 0.75rem;
            }

            .katona-table td:first-child {
                padding-left: 0.5rem;
            }

            .navigation-buttons {
                padding: 1.5rem;
            }

            .btn-navigation {
                min-width: 100px;
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
            }

            .section-title {
                padding: 1rem 1.5rem;
            }
        }

        @media (max-width: 640px) {
            .katona-table {
                font-size: 0.7rem;
            }

            .katona-table th,
            .katona-table td {
                padding: 0.375rem 0.25rem;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

    <!-- Header flotante mejorado -->
    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Modificar Evaluación - Tono Muscular y Ubicación, Postura
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator bg-blue-500 h-2 rounded-full" style="width: 66%;"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionTonoUbicacionForm">

                <!-- Información del mes -->
                <div hidden class="info-card text-center">
                    <p class="text-lg text-gray-700">
                        Evaluación para el mes: <span class="font-bold text-custom-title" id="mesSeleccionadoDisplay">...</span>
                    </p>
                </div>

                <!-- Fecha de evaluación -->
                <div hidden class="mb-8 text-center">
                    <label for="fecha_evaluacion" class="block text-lg font-semibold text-gray-700 mb-3">
                        Fecha de la Evaluación
                    </label>
                    <input type="date"
                        name="fecha_evaluacion"
                        id="fecha_evaluacion"
                        class="date-input"
                        readonly>
                </div>

                <!-- Título de la sección -->
                <div class="section-title text-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                        Tono Muscular y Ubicación
                    </h1>
                </div>

                <!-- Tabla de evaluaciones -->
                <div class="table-container">
                    <div class="overflow-x-auto">
                        <table class="katona-table">
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
                                <tr id="tmyu_Hipotonia" value="Hipotonía">
                                    <td>Hipotonía</td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt1" name="tu_hipotonia[]" value="General"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt2" name="tu_hipotonia[]" value="Axial"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt3" name="tu_hipotonia[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt4" name="tu_hipotonia[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt5" name="tu_hipotonia[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt6" name="tu_hipotonia[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt7" name="tu_hipotonia[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt8" name="tu_hipotonia[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt9" name="tu_hipotonia[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt10" name="tu_hipotonia[]" value="Normal"></td>
                                </tr>
                                <tr id="tmyu_Hipertonía" value="Hipertonía">
                                    <td>Hipertonía</td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt1" name="tu_hipertonia[]" value="General"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt2" name="tu_hipertonia[]" value="Axial"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt3" name="tu_hipertonia[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt4" name="tu_hipertonia[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt5" name="tu_hipertonia[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt6" name="tu_hipertonia[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt7" name="tu_hipertonia[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt8" name="tu_hipertonia[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt9" name="tu_hipertonia[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt10" name="tu_hipertonia[]" value="Normal"></td>
                                </tr>
                                <tr id="tmyu_mixto" value="Mixto (hipotonía-hipertonía)">
                                    <td>Mixto (Hipotonía/Hipertonía)</td>
                                    <td><input type="checkbox" id="tu_mixto_opt1" name="tu_mixto[]" value="General"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt2" name="tu_mixto[]" value="Axial"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt3" name="tu_mixto[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt4" name="tu_mixto[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt5" name="tu_mixto[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt6" name="tu_mixto[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt7" name="tu_mixto[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt8" name="tu_mixto[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt9" name="tu_mixto[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt10" name="tu_mixto[]" value="Normal"></td>
                                </tr>
                                <tr id="tmyu_fluctuante" value="Fluctuante">
                                    <td>Fluctuante</td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt1" name="tu_fluctuante[]" value="General"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt2" name="tu_fluctuante[]" value="Axial"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt3" name="tu_fluctuante[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt4" name="tu_fluctuante[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt5" name="tu_fluctuante[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt6" name="tu_fluctuante[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt7" name="tu_fluctuante[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt8" name="tu_fluctuante[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt9" name="tu_fluctuante[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt10" name="tu_fluctuante[]" value="Normal"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="section-title text-center mt-8">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                            POSTURA
                        </h1>
                    </div>
                    <!-- Leyenda de abreviaciones -->
                </div>
                <div class="table-container">
                    <div class="overflow-x-auto">
                        <table class="katona-table">
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
                            <tr id="Asimetria" value="Asimetría">
                                <td>Asimetría</td>
                                <td><input type="checkbox" id="pt_Asimetria_opt1" name="pt_Asimetria[]" value="Axial"></td>
                                <td><input type="checkbox" id="pt_Asimetria_opt2" name="pt_Asimetria[]" value="Miembros Torácicos"></td>
                                <td><input type="checkbox" id="pt_Asimetria_opt3" name="pt_Asimetria[]" value="Miembros Pélvicos"></td>
                                <td><input type="checkbox" id="pt_Asimetria_opt4" name="pt_Asimetria[]" value="Hemicuerpo"></td>
                                <td><input type="checkbox" id="pt_Asimetria_opt5" name="pt_Asimetria[]" value="Contralateral"></td>
                                <td><input type="checkbox" id="pt_Asimetria_opt6" name="pt_Asimetria[]" value="Derecha"></td>
                                <td><input type="checkbox" id="pt_Asimetria_opt7" name="pt_Asimetria[]" value="Izquierda"></td>
                                <td><input type="checkbox" id="pt_Asimetria_opt8" name="pt_Asimetria[]" value="Normal"></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>

                    <div class="navigation-buttons">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <a href="/modificarLenguaje" class="btn-navigation">
                                ← ANTERIOR
                            </a>
                            <div class="text-sm text-gray-600 text-center hidden sm:block">
                                Paso 6 de 9 - Tono Muscular y Ubicación, Postura
                            </div>
                            <button type="button" id="botonSiguientePaso" class="btn-navigation">
                                SIGUIENTE →
                            </button>
                        </div>
                    </div>
            </form>
        </div>

        <script>
            const resultadosTono = <?php echo json_encode($datosTono); ?>;
            const resultadosPostura = <?php echo json_encode($datosPostura); ?>;
            console.log("Resultados Tono:", resultadosTono);
            console.log("Resultados Postura:", resultadosPostura);

            document.addEventListener('DOMContentLoaded', function() {
                const filas = document.querySelectorAll('tr[value]');

                filas.forEach(fila => {
                    const filaValue = fila.getAttribute('value').trim().toLowerCase();

                    // Filtramos todos los resultados que coincidan con el campo
                    const resultadosTonoEncontrados = resultadosTono.find(item =>
                        item.campos && item.campos.trim().toLowerCase() === filaValue
                    );

                    const resultadosPosturaEncontrados = resultadosPostura.find(item =>
                        item.campo && item.campo.trim().toLowerCase() === filaValue
                    );

                    console.log("Fila actual:", filaValue);
                    console.log("Resultados Tono encontrados:", resultadosTonoEncontrados);
                    console.log("Resultados Postura encontrados:", resultadosPosturaEncontrados);

                    if (resultadosTonoEncontrados || resultadosPosturaEncontrados) {
                        fila.style.display = '';

                        // Recopilamos todos los resultados con verificaciones
                        let resultadosTonoArray = [];
                        if (resultadosTonoEncontrados && resultadosTonoEncontrados.resultado) {
                            resultadosTonoArray = resultadosTonoEncontrados.resultado
                                .split(',')
                                .map(r => r.trim().toLowerCase())
                                .filter(r => r !== ''); // Filtrar strings vacíos
                        }

                        let resultadosPosturaArray = [];
                        if (resultadosPosturaEncontrados && resultadosPosturaEncontrados.resultado) {
                            resultadosPosturaArray = resultadosPosturaEncontrados.resultado
                                .split(',')
                                .map(r => r.trim().toLowerCase())
                                .filter(r => r !== ''); // Filtrar strings vacíos
                        }

                        console.log("Arrays procesados:", {
                            resultadosTonoArray,
                            resultadosPosturaArray
                        });

                        const checkboxes = fila.querySelectorAll('input[type="checkbox"]');
                        checkboxes.forEach(checkbox => {
                            const checkboxValue = checkbox.value.trim().toLowerCase();
                            console.log("Checkbox actual:", checkboxValue);
                            if (resultadosTonoArray.includes(checkboxValue) || resultadosPosturaArray.includes(checkboxValue)) {
                                checkbox.checked = true;
                            } else {
                                checkbox.checked = false;
                            }
                        });
                    } else {
                        fila.style.display = 'none';
                    }
                });
                const dateInput = document.getElementById('fecha_evaluacion');
                const sessionKey = 'evaluacionPaso6_posturas_tmyu';
                const datosGuardados = sessionStorage.getItem(sessionKey);
                let datosJson = {};

                if (datosGuardados) {
                    try {
                        datosJson = JSON.parse(datosGuardados);
                    } catch (e) {
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
                    } catch (e) {
                        if (mesDisplay) mesDisplay.textContent = 'Error al cargar mes';
                        console.error("Error Paso 6 (Posturas TMyU): No se pudo parsear JSON de evaluacionPaso1 para el mes.", e);
                    }
                } else if (mesDisplay) {
                    mesDisplay.textContent = 'No disponible';
                }

                if (dateInput) {
                    if (datosJson.fecha_evaluacion) {
                        dateInput.value = datosJson.fecha_evaluacion;
                    } else {
                        const datosPaso5Raw = sessionStorage.getItem('evaluacionPaso5_lenguaje');
                        if (datosPaso5Raw) {
                            try {
                                const dP5 = JSON.parse(datosPaso5Raw);
                                if (dP5.fecha_evaluacion) dateInput.value = dP5.fecha_evaluacion;
                            } catch (e) {
                                console.error("Error Paso 6 (Posturas TMyU): No se pudo parsear JSON de evaluacionPaso5_lenguaje.", e);
                            }
                        }
                        if (!dateInput.value) {
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
                    'pt_Asimetria'
                ];

                 console.log("Checkbox groups a procesar:", checkboxGroupNames[4]);
                 console.log("Datos JSON cargados:", datosJson);

                 // Verificar si encuentra los checkboxes
console.log('Checkboxes encontrados de posturaaaa:', document.querySelectorAll('input[name="pt_Asimetria[]"]'));
console.log('Checkboxes encontrados de tono:', document.querySelectorAll('input[name="tu_hipotonia[]"]'));

// Verificar estructura de datos
console.log('Datos Postura???""""":', datosJson.pt_Asimetria);
console.log('DatosJSON AYUDA', datosJson);

                if (form && Object.keys(datosJson).length > 0) {
                    checkboxGroupNames.forEach(groupName => {
                        console.log(`Procesando grupo: ${groupName}`);
                        if (datosJson[groupName] && Array.isArray(datosJson[groupName])) {
                            console.log(`Datos encontrados para el grupo ${groupName}:`, datosJson[groupName]);
                            const checkboxesInGroup = document.querySelectorAll(`input[name="${groupName}[]"]`);
                            checkboxesInGroup.forEach(checkbox => {
                                console.log(`Verificando checkbox: ${checkbox.value} en grupo ${groupName}`);
                                if (datosJson[groupName].includes(checkbox.value)) {
                                    checkbox.checked = true;
                                    console.log(`Checkbox ${checkbox.value} en grupo ${groupName} marcado.`);
                                } else {
                                    checkbox.checked = false;
                                    console.log(`Checkbox ${checkbox.value} en grupo ${groupName} no marcado.`);
                                }
                            });
                        } else {
                            const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                            checkboxesInGroup.forEach(checkbox => {
                                checkbox.checked = false;
                                console.log(`Checkbox ${checkbox.value} en grupo ${groupName} no marcado (no hay datos).`);
                            });
                        }
                    });
                }

                const botonSiguiente = document.getElementById('botonSiguientePaso');
                if (botonSiguiente && form) {
                    botonSiguiente.addEventListener('click', function() {
                        const datosPaso = {};
                        if (dateInput) datosPaso['fecha_evaluacion'] = dateInput.value;

                        checkboxGroupNames.forEach(groupName => {
                            console.log(`Procesando grupo al presionar boton siguiente: ${groupName}`);
                            const checkedBoxes = document.querySelectorAll(`input[name="${groupName}[]"]:checked`);
                            const values = [];
                            checkedBoxes.forEach(checkbox => {
                                console.log(`Checkbox marcado: ${checkbox.value} en grupo ${groupName}`);
                                values.push(checkbox.value);
                            });
                            if (values.length > 0) {
                                datosPaso[groupName] = values;
                            }
                        });

                        console.log(`Datos guardados en ${sessionKey} (Posturas TMyU):`, datosPaso);

                        try {
                            sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso));
                            window.location.href = '/modificarSignos';
                        } catch (e) {
                            console.error(`Error guardando datos de ${sessionKey}:`, e);
                            alert("Hubo un error al guardar los datos de Postura, Tono Muscular y Ubicación.");
                        }
                    });
                }
            });
        </script>
</body>

</html>