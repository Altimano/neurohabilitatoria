<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Grueso</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area {
            background-color: #FFFFFF;
        }

        .bg-custom-main-box {
            background-color: #E0F2FE;
        }

        .bg-custom-button {
            background-color: #0284C7;
        }

        .text-custom-title {
            color: #0369A1;
        }

        input[readonly],
        textarea[readonly] {
            background-color: #E5E7EB;
            cursor: default;
            border-color: #D1D5DB;
            color: #4B5563;
        }

        select:not([disabled]) {
            background-color: #FFFFFF;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="text-center my-6">
        <h3 class="text-2xl font-bold text-custom-title">Modificar Evaluacion</h3>
    </div>

    <div class="mx-6 md:mx-10 mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionMotorGruesoForm">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-5 mb-6">
                <h1 class="text-xl font-semibold text-center text-gray-800">MOTOR GRUESO/MOVIMIENTOS POSTURALES</h1>
            </div>
            <div class="border-b border-gray-400 py-5 mb-6">
                <h2 class="text-base md:text-lg font-semibold text-center text-gray-800 px-2"> No lo logra (0) | Lo intenta pero no lo logra (1) | En proceso (2) | Lo realiza inhábilmente (3) | Normal (4) </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div class="subescala">
                    <label for="mg_control_cefalico" class="block text-sm font-medium text-gray-700 mb-1"><strong>Control cefálico*</strong></label>
                    <select name="mg_control_cefalico" id="mg_control_cefalico" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_levanta_torax" class="block text-sm font-medium text-gray-700 mb-1">Sobre el abdomen levanta tórax apoyando brazos</label>
                    <select name="mg_levanta_torax" id="mg_levanta_torax" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_reaccion_delantera" class="block text-sm font-medium text-gray-700 mb-1">Sentado con reacción de protección delantera</label>
                    <select name="mg_reaccion_delantera" id="mg_reaccion_delantera" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_cambio_decubito_prono_supino" class="block text-sm font-medium text-gray-700 mb-1">Cambio de decúbito prono a decúbito supino</label>
                    <select name="mg_cambio_decubito_prono_supino" id="mg_cambio_decubito_prono_supino" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_sentado_sin_apoyo" class="block text-sm font-medium text-gray-700 mb-1"><strong>Sentado sin apoyo*</strong></label>
                    <select name="mg_sentado_sin_apoyo" id="mg_sentado_sin_apoyo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_reaccion_lateral_delantera" class="block text-sm font-medium text-gray-700 mb-1"><strong>Reacciones de protección laterales y delanteras*</strong></label>
                    <select name="mg_reaccion_lateral_delantera" id="mg_reaccion_lateral_delantera" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_cambio_posicion_sedente_prono" class="block text-sm font-medium text-gray-700 mb-1">Cambio de posición sedente a decúbito prono</label>
                    <select name="mg_cambio_posicion_sedente_prono" id="mg_cambio_posicion_sedente_prono" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_patron_arrastre" class="block text-sm font-medium text-gray-700 mb-1"><strong>Patrón de arrastre*</strong></label>
                    <select name="mg_patron_arrastre" id="mg_patron_arrastre" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_cambio_posicion_cuatro_hincado" class="block text-sm font-medium text-gray-700 mb-1">Cambio de posición cuatro puntos a hincado</label>
                    <select name="mg_cambio_posicion_cuatro_hincado" id="mg_cambio_posicion_cuatro_hincado" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_patron_gateo_independiente" class="block text-sm font-medium text-gray-700 mb-1"><strong>Patrón de gateo independiente*</strong></label>
                    <select name="mg_patron_gateo_independiente" id="mg_patron_gateo_independiente" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_gateo_niveles" class="block text-sm font-medium text-gray-700 mb-1">Gateo en diferentes niveles (colchón, planos, etc.)</label>
                    <select name="mg_gateo_niveles" id="mg_gateo_niveles" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_transicion_gateo_bipedestacion" class="block text-sm font-medium text-gray-700 mb-1"><strong>Transición gateo a bipedestación*</strong></label>
                    <select name="mg_transicion_gateo_bipedestacion" id="mg_transicion_gateo_bipedestacion" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_comienza_patron_marcha" class="block text-sm font-medium text-gray-700 mb-1"><strong>Comienza el patrón de marcha*</strong></label>
                    <select name="mg_comienza_patron_marcha" id="mg_comienza_patron_marcha" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_pone_pie_sin_apoyo" class="block text-sm font-medium text-gray-700 mb-1">Se pone de pie momentáneamente sin apoyarse</label>
                    <select name="mg_pone_pie_sin_apoyo" id="mg_pone_pie_sin_apoyo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_camina_atras" class="block text-sm font-medium text-gray-700 mb-1">Camina hacia atrás</label>
                    <select name="mg_camina_atras" id="mg_camina_atras" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_camina_solo" class="block text-sm font-medium text-gray-700 mb-1">Camina solo (cae frecuentemente)</label>
                    <select name="mg_camina_solo" id="mg_camina_solo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_sube_escaleras_apoyo_manos" class="block text-sm font-medium text-gray-700 mb-1">Sube escaleras apoyándose en ambas manos</label>
                    <select name="mg_sube_escaleras_apoyo_manos" id="mg_sube_escaleras_apoyo_manos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_patea_pelota" class="block text-sm font-medium text-gray-700 mb-1">Patea una pelota</label>
                    <select name="mg_patea_pelota" id="mg_patea_pelota" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_sube_escaleras_gateando" class="block text-sm font-medium text-gray-700 mb-1">Sube escaleras gateando</label>
                    <select name="mg_sube_escaleras_gateando" id="mg_sube_escaleras_gateando" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_corre_rigidez" class="block text-sm font-medium text-gray-700 mb-1">Corre (con rigidez)</label>
                    <select name="mg_corre_rigidez" id="mg_corre_rigidez" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_camina_solo_rara" class="block text-sm font-medium text-gray-700 mb-1">Camina solo (cae rara vez)</label>
                    <select name="mg_camina_solo_rara" id="mg_camina_solo_rara" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_sube_baja_escaleras" class="block text-sm font-medium text-gray-700 mb-1">Sube y baja escaleras sostenido de una mano</label>
                    <select name="mg_sube_baja_escaleras" id="mg_sube_baja_escaleras" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_lanza_pelota" class="block text-sm font-medium text-gray-700 mb-1">Lanza la pelota</label>
                    <select name="mg_lanza_pelota" id="mg_lanza_pelota" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_salta_sitio" class="block text-sm font-medium text-gray-700 mb-1">Salta en el sitio</label>
                    <select name="mg_salta_sitio" id="mg_salta_sitio" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="mg_juega_cuclillas" class="block text-sm font-medium text-gray-700 mb-1">Juega en Cuclillas</label>
                    <select name="mg_juega_cuclillas" id="mg_juega_cuclillas" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="/modificarKatona">
                    <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        const resultadosGruesos = <?php echo json_encode($datosGruesos); ?>;
        document.addEventListener('DOMContentLoaded', function() {
            const subescalas = resultadosGruesos.map(item => item.subescala.trim().toLowerCase());

            const divs = document.querySelectorAll('div.subescala');

            divs.forEach(div => {
                const label = div.querySelector('label');
                const select = div.querySelector('select');

                if (label && select) {
                    const labelText = label.textContent
                        .replace(/\*/g, '') // Elimina el asterisco si lo hay
                        .trim()
                        .toLowerCase();

                    // Busca si hay una subescala que coincida con el label
                    const resultadoEncontrado = resultadosGruesos.find(item =>
                        item.subescala.trim().toLowerCase() === labelText
                    );

                    if (resultadoEncontrado) {
                        div.style.display = ''; // Muestra el div

                        // Selecciona el valor del select que coincide con el resultado
                        const optionToSelect = select.querySelector(`option[value="${resultadoEncontrado.resultado}"]`);
                        if (optionToSelect) {
                            optionToSelect.selected = true;
                        }
                    } else {
                        div.style.display = 'none'; // Oculta el div
                    }
                }
            });
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionPaso3_mgrueso';
            const datosGuardados = sessionStorage.getItem(sessionKey);
            let datosJson = {};
            if (datosGuardados) {
                try {
                    datosJson = JSON.parse(datosGuardados);
                } catch (e) {
                    console.error("Error P3_M grueso:", e);
                    sessionStorage.removeItem(sessionKey);
                }
            }
            if (dateInput) {
                if (datosJson.fecha_evaluacion) {
                    dateInput.value = datosJson.fecha_evaluacion;
                } else {
                    const dP2R = sessionStorage.getItem('evaluacionPaso2_mkatona');
                    if (dP2R) {
                        try {
                            const dP2 = JSON.parse(dP2R);
                            if (dP2.fecha_evaluacion) dateInput.value = dP2.fecha_evaluacion;
                        } catch (e) {}
                    }
                    if (!dateInput.value) {
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
                } catch (e) {
                    if (mesDisplay) mesDisplay.textContent = 'Error';
                }
            } else if (mesDisplay) {
                mesDisplay.textContent = 'No disponible';
            }

            const form = document.getElementById('evaluacionMotorGruesoForm');
            if (form && datosJson) {
                const selects = form.querySelectorAll('select');
                selects.forEach(select => {
                    if (datosJson[select.name]) {
                        select.value = datosJson[select.name];
                    }
                });
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const formData = new FormData(form);
                    const datosPaso = {};
                    formData.forEach((value, key) => {
                        datosPaso[key] = value;
                    });
                    if (dateInput) datosPaso['fecha_evaluacion'] = dateInput.value;

                    try {
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso));
                        window.location.href = '/modificarFino';
                    } catch (e) {
                        console.error("Error guardando P3_M grueso:", e);
                        alert("Hubo un error al guardar.");
                    }
                });
            }

        });
    </script>
</body>

</html>