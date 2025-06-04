<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenguaje</title>
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
        <h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3>
    </div>

    <div class="mx-6 md:mx-10 mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionLenguajeForm">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-6">
                <h1 class="text-xl font-semibold text-center text-gray-800">LENGUAJE</h1>
            </div>
            <div class="border-b border-gray-400 py-5 mb-6">
                <h2 class="text-base md:text-lg font-semibold text-center text-gray-800 px-2"> No lo logra (0) | Lo intenta pero no lo logra (1) | En proceso (2) | Lo realiza inhábilmente (3) | Normal (4) </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div class="subescala">
                    <label for="lenguaje_atencion_conjunta" class="block text-sm font-medium text-gray-700 mb-1">Atención conjunta</label>
                    <select name="lenguaje_atencion_conjunta" id="lenguaje_atencion_conjunta" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_realiza_voca_uao" class="block text-sm font-medium text-gray-700 mb-1">Realización de vocalizaciones u, a, o</label>
                    <select name="lenguaje_realiza_voca_uao" id="lenguaje_realiza_voca_uao" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_juego_vocalico" class="block text-sm font-medium text-gray-700 mb-1">Juego vocálico</label>
                    <select name="lenguaje_juego_vocalico" id="lenguaje_juego_vocalico" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_mama_baba" class="block text-sm font-medium text-gray-700 mb-1">Balbuceo reduplicativo /mama/baba/</label>
                    <select name="lenguaje_mama_baba" id="lenguaje_mama_baba" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_emergencia_gestos" class="block text-sm font-medium text-gray-700 mb-1">Emergencia de gestos deícticos (dar, mostrar, señalar)</label>
                    <select name="lenguaje_emergencia_gestos" id="lenguaje_emergencia_gestos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_comprende_NO" class="block text-sm font-medium text-gray-700 mb-1">Comprende la palabra NO acompañada del gesto</label>
                    <select name="lenguaje_comprende_NO" id="lenguaje_comprende_NO" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_primera_palabra" class="block text-sm font-medium text-gray-700 mb-1">Aparece la primera palabra (solo si se designa a un objeto)</label>
                    <select name="lenguaje_primera_palabra" id="lenguaje_primera_palabra" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_gestos_reconocimiento" class="block text-sm font-medium text-gray-700 mb-1">Emplea gestos de reconocimientos</label>
                    <select name="lenguaje_gestos_reconocimiento" id="lenguaje_gestos_reconocimiento" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_emplea_palabras" class="block text-sm font-medium text-gray-700 mb-1">Emplea por lo menos tres palabras (papá, mamá, sopa, agua)</label>
                    <select name="lenguaje_emplea_palabras" id="lenguaje_emplea_palabras" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_forma_frases_2" class="block text-sm font-medium text-gray-700 mb-1">Forma frases de dos palabras</label>
                    <select name="lenguaje_forma_frases_2" id="lenguaje_forma_frases_2" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_dice_nombre" class="block text-sm font-medium text-gray-700 mb-1">Dice su nombre</label>
                    <select name="lenguaje_dice_nombre" id="lenguaje_dice_nombre" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="subescala">
                    <label for="lenguaje_forma_frases_3" class="block text-sm font-medium text-gray-700 mb-1">Forma frases de tres palabras</label>
                    <select name="lenguaje_forma_frases_3" id="lenguaje_forma_frases_3" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
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
                <a href="/modificarFino"> <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        const $resultadosLenguaje = <?php echo json_encode($datosLenguaje); ?>;

        document.addEventListener('DOMContentLoaded', function() {
            const subescalas = $resultadosLenguaje.map(item => item.subescala.trim().toLowerCase());

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
                    const resultadoEncontrado = $resultadosLenguaje.find(item =>
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
            const sessionKey = 'evaluacionPaso5_lenguaje';
            const datosGuardados = sessionStorage.getItem(sessionKey);
            let datosJson = {};

            if (datosGuardados) {
                try {
                    datosJson = JSON.parse(datosGuardados);
                } catch (e) {
                    console.error("Error Paso 5 (Lenguaje) al parsear datos guardados:", e);
                    sessionStorage.removeItem(sessionKey);
                }
            }

            if (dateInput) {
                if (datosJson.fecha_evaluacion) {
                    dateInput.value = datosJson.fecha_evaluacion;
                } else {
                    const datosPaso4Raw = sessionStorage.getItem('evaluacionPaso4_mfino');
                    if (datosPaso4Raw) {
                        try {
                            const dP4 = JSON.parse(datosPaso4Raw);
                            if (dP4.fecha_evaluacion) dateInput.value = dP4.fecha_evaluacion;
                        } catch (e) {
                            console.error("Error Paso 5 (Lenguaje): No se pudo parsear JSON de evaluacionPaso4_mfino.", e);
                        }
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
                    console.error("Error Paso 5 (Lenguaje): No se pudo parsear JSON de evaluacionPaso1.", e);
                }
            } else if (mesDisplay) {
                mesDisplay.textContent = 'No disponible';
            }

            const form = document.getElementById('evaluacionLenguajeForm');
            if (form && datosJson) {
                const selects = form.querySelectorAll('select');
                selects.forEach(select => {
                    if (datosJson[select.name] !== undefined) {
                        select.value = datosJson[select.name];
                    }
                });
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const formDataLenguaje = new FormData(form);
                    const datosPaso = {};

                    // CONSOLE LOG PARA VERIFICAR DATOS RECOLECTADOS
                    console.log("Contenido de FormData en agregar.lenguaje.php:");
                    for (let [key, value] of formDataLenguaje.entries()) {
                        datosPaso[key] = value;
                    }

                    if (dateInput) datosPaso['fecha_evaluacion'] = dateInput.value;

                    // CONSOLE LOG PARA VER DATOS ANTES DE GUARDAR
                    console.log(`Datos guardados en ${sessionKey}:`, datosPaso);

                    try {
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso));
                        window.location.href = '/modificarPostura';
                    } catch (e) {
                        console.error(`Error guardando datos de ${sessionKey}:`, e);
                        alert("Hubo un error al guardar los datos de Lenguaje.");
                    }
                });
            }
        });
    </script>
</body>

</html>