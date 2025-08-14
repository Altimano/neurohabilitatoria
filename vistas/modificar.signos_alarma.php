<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signos de Alarma</title>
    <link href=<?=base_url("/assets/output.css")?> rel="stylesheet"/>
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

        .select-wrapper {
            position: relative;
        }

        .select-custom {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            transition: all 0.2s ease-in-out;
        }

        .select-custom:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.15);
        }

        .select-custom:hover {
            border-color: #0284C7;
            background-color: #F8FAFC;
        }

        .evaluation-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #E5E7EB;
            transition: all 0.2s ease-in-out;
        }

        .evaluation-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }

        .evaluation-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
            line-height: 1.4;
        }

        .evaluation-label.required {
            color: #DC2626;
        }

        .progress-indicator {
            background: linear-gradient(90deg, #10B981 0%, #059669 100%);
            height: 4px;
            border-radius: 2px;
            transition: width 0.3s ease-in-out;
        }

        .evaluation-label.required::after {
            content: " *";
            color: #DC2626;
        }


        .section-divider {
            background: linear-gradient(90deg, transparent 0%, #D1D5DB 50%, transparent 100%);
            height: 1px;
            margin: 2rem 0;
        }

        .scale-legend {
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            border-left: 4px solid #F59E0B;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%);
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(2, 132, 199, 0.3);
        }

        .floating-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #E5E7EB;
        }

        @media (max-width: 768px) {
            .evaluation-card {
                padding: 1rem;
            }
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


        @media (max-width: 640px) {
            .navigation-buttons {
                padding: 1.5rem;
            }

            .btn-navigation {
                min-width: 100px;
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

    <!-- Header flotante mejorado -->
    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Modificar Evaluación - Signos de Alarma
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator bg-blue-500 h-2 rounded-full" style="width: 77%;"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionSignosAlarmaForm">

                <!-- Información del mes -->
                <div hidden class="text-center mb-8 p-4 bg-white rounded-xl shadow-sm">
                    <p  class="text-lg text-gray-700">
                        Evaluación para el mes: <span class="font-bold text-custom-title" id="mesSeleccionadoDisplay">...</span>
                    </p>
                </div>

                <!-- Fecha de evaluación -->
                <div hidden class="mb-8 text-center">
                    <label for="fecha_evaluacion" class="evaluation-label text-lg">
                        Fecha de la Evaluación
                    </label>
                    <input type="date"
                        name="fecha_evaluacion"
                        id="fecha_evaluacion"
                        class="p-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-lg"
                        readonly>
                </div>

                <!-- Título de la sección -->
                <div class="text-center mb-8">
                    <div class="inline-block bg-white rounded-2xl px-8 py-4 shadow-lg">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                            SIGNOS DE ALARMA
                        </h1>
                    </div>
                </div>

                <!-- Leyenda de puntuación -->
                <div class="scale-legend rounded-xl p-6 mb-8">
                    <h2 class="text-lg font-bold text-gray-800 mb-3 text-center">
                        Leyenda
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-3 text-sm">
                        <div class="bg-white rounded-lg p-3 text-center shadow-sm">
                            <div class="font-bold text-red-600">Sí</div>
                            <div> Lo tiene</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center shadow-sm">
                            <div class="font-bold text-green-600">No</div>
                            <div>No lo tiene</div>
                        </div>
                    </div>
                </div>

                <!-- Grid de evaluaciones -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                    <div class="subescala evaluation-card">
                        <div class="signos">
                        <label for="sa_aduccion_pulgares" class="evaluation-label">
                            Aducción de pulgares
                        </label>
                        <div class="select-wrapper">
                            <select name="sa_aduccion_pulgares"
                                id="sa_aduccion_pulgares"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <div class="signos">
                        <label for="sa_estrabismo" class="evaluation-label">
                            Estrabismo
                        </label>
                        <div class="select-wrapper">
                            <select name="sa_estrabismo"
                                id="sa_estrabismo"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <div class="signos">
                        <label for="sa_irritabilidad" class="evaluation-label">
                            Irritabilidad
                        </label>
                        <div class="select-wrapper">
                            <select name="sa_irritabilidad"
                                id="sa_irritabilidad"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <div class="signos">
                        <label for="sa_marcha_en_punta_presencia" class="evaluation-label">
                            Marcha en punta
                        </label>
                        <div class="select-wrapper">
                            <select name="sa_marcha_en_punta_presencia"
                                id="sa_marcha_en_punta_presencia"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <div class="signos">
                        <label for="sa_marcha_cruzada_presencia" class="evaluation-label">
                            Marcha Cruzada
                        </label>
                        <div class="select-wrapper">
                            <select name="sa_marcha_cruzada_presencia"
                                id="sa_marcha_cruzada_presencia"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <div class="signos">
                        <label for="sa_punos_cerrados_presencia" class="evaluation-label">
                            Puños cerrados
                        </label>
                        <div class="select-wrapper">
                            <select name="sa_punos_cerrados_presencia"
                                id="sa_punos_cerrados_presencia"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <div class="signos">
                        <label for="sa_reflejo_hiperextension" class="evaluation-label">
                            Reflejo de hiperextensión
                        </label>
                        <div class="select-wrapper">
                            <select name="sa_reflejo_hiperextension"
                                id="sa_reflejo_hiperextension"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <div class="signos">
                        <label for="sa_lenguaje_escaso" class="evaluation-label">
                            Lenguaje escaso
                        </label>
                        <div class="select-wrapper">
                            <select name="sa_lenguaje_escaso"
                                id="sa_lenguaje_escaso"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        </div>
                    </div>
                </div>


                    <div class="navigation-buttons">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <a href=<?=base_url("/modificarPostura")?> class="btn-navigation">
                                ← ANTERIOR
                            </a>
                            <div class="text-sm text-gray-600 text-center hidden sm:block">
                                Paso 7 de 9 - Signos de Alarma
                            </div>
                            <button type="button" id="botonSiguientePaso" class="btn-navigation">
                                SIGUIENTE →
                            </button>
                        </div>
                    </div>
        </form>
    </div>

    <script>
        const $resultadosSignos = <?php echo json_encode($datosSignos); ?>;
        console.log("Resultados Signos de Alarma:", $resultadosSignos);
        document.addEventListener('DOMContentLoaded', function() {
            const signos = $resultadosSignos.map(item => item.campo.trim().toLowerCase());
            console.log("Signos de Alarma:", signos);

            const divs = document.querySelectorAll('div.subescala.evaluation-card');
            divs.forEach(div => {
                const select = div.querySelector('select');
                const label = div.querySelector('label');
                if (select && label) {
                    const labelText = label.textContent
                        .replace(/\*/g, '') // Elimina el asterisco si lo hay
                        .trim()
                        .toLowerCase();

                    // Busca si hay una subescala que coincida con el label
                    const resultadoEncontrado = $resultadosSignos.find(item =>
                        item.campo.trim().toLowerCase() === labelText
                    );
                    console.log(`Buscando "${labelText}" en resultadosSignos:`, resultadoEncontrado);

                    if (resultadoEncontrado) {
                        div.style.display = ''; // Muestra el div

                        // Selecciona el valor del select que coincide con el resultado
                    } else {
                        div.style.display = 'none'; // Oculta el div
                    }
                }
            });
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionPaso7_signos_alarma';
            const datosGuardados = sessionStorage.getItem(sessionKey);
            let datosJson = {};

            if (datosGuardados) {
                try {
                    datosJson = JSON.parse(datosGuardados);
                } catch (e) {
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
                } catch (e) {
                    if (mesDisplay) mesDisplay.textContent = 'Error al cargar mes';
                    console.error("Error Paso 7 (Signos Alarma): No se pudo parsear JSON de evaluacionPaso1 para el mes.", e);
                }
            } else if (mesDisplay) {
                mesDisplay.textContent = 'No disponible';
            }

            if (dateInput) {
                if (datosJson.fecha_evaluacion) {
                    dateInput.value = datosJson.fecha_evaluacion;
                } else {
                    const datosPaso6Raw = sessionStorage.getItem('evaluacionPaso6_posturas_tmyu');
                    if (datosPaso6Raw) {
                        try {
                            const dP6 = JSON.parse(datosPaso6Raw);
                            if (dP6.fecha_evaluacion) dateInput.value = dP6.fecha_evaluacion;
                        } catch (e) {
                            console.error("Error Paso 7 (Signos Alarma): No se pudo parsear JSON de evaluacionPaso6_posturas_tmyu.", e);
                        }
                    }
                    if (!dateInput.value) {
                        const t = new Date();
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`;
                    }
                }
            }

            const form = document.getElementById('evaluacionSignosAlarmaForm');

            const camposConLateralidad = [{
                    selectId: 'ps_marcha_en_punta_presencia',
                    radioGroupId: 'ps_marcha_en_punta_lado_group',
                    radioName: 'ps_marcha_en_punta_lado'
                },
                {
                    selectId: 'ps_marcha_cruzada_presencia',
                    radioGroupId: 'ps_marcha_cruzada_lado_group',
                    radioName: 'ps_marcha_cruzada_lado'
                },
                {
                    selectId: 'ps_punos_cerrados_presencia',
                    radioGroupId: 'ps_punos_cerrados_lado_group',
                    radioName: 'ps_punos_cerrados_lado'
                }
            ];

            /*function toggleLateralityGroup(selectElement, radioGroupId) {
                const radioGroup = document.getElementById(radioGroupId);
                if (selectElement.value === '1') {
                    radioGroup.style.display = 'block';
                } else {
                    radioGroup.style.display = 'none';
                    const radios = form.querySelectorAll(`input[name="${selectElement.id.replace('_presencia', '_lado')}"]`);
                    radios.forEach(radio => radio.checked = false);
                }
            }*/

            if (form && Object.keys(datosJson).length > 0) {
                const selects = form.querySelectorAll('select');
                selects.forEach(select => {
                    if (datosJson[select.name] !== undefined) {
                        select.value = datosJson[select.name];
                    }
                });
            } else {
                camposConLateralidad.forEach(campo => {
                    const radioGroup = document.getElementById(campo.radioGroupId);
                    if (radioGroup) radioGroup.style.display = 'none';
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
                botonSiguiente.addEventListener('click', () => {
                    const datosPaso7 = {};
                    datosPaso7.fecha_evaluacion = dateInput.value;

                    const selects = form.querySelectorAll('select');
                    selects.forEach(select => {
                        if (select.value !== '') {
                            datosPaso7[select.name] = select.value;
                        }
                    });

                    camposConLateralidad.forEach(campo => {
                        const select = document.getElementById(campo.selectId);
                        if (select && select.value === '1') {
                            const ladoSeleccionado = form.querySelector(`input[name="${campo.radioName}"]:checked`);
                            if (ladoSeleccionado) {
                                datosPaso7[campo.radioName] = ladoSeleccionado.value;
                            }
                        }
                    });
                    console.log(`Datos guardados en ${sessionKey} (Signos de Alarma):`, datosPaso7);

                    try {
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso7));
                        window.location.href = "<?=base_url('/modificarHitosMG')?>";
                    } catch (e) {
                        console.error(`Error guardando datos de ${sessionKey}:`, e);
                        alert("Hubo un error al guardar los Signos de Alarma.");
                    }
                });
            }
        });
    </script>
</body>

</html>