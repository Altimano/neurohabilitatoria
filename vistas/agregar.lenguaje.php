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
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            background-color: white;
            font-size: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            width: 100%;
            padding: 0.875rem 1rem;
        }

        .select-custom:focus {
            outline: none;
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
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
        .evaluation-label.required::after {
            content: " *";
            color: #DC2626;
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
        .section-divider {
            background: linear-gradient(90deg, transparent 0%, #D1D5DB 50%, transparent 100%);
            height: 1px;
            margin: 2rem 0;
        }
        .scale-legend {
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            border-left: 4px solid #F59E0B;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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

        .abbreviation-tag {
            background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            margin: 0.125rem;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .evaluation-card {
                padding: 1rem;
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
            .abbreviation-tag {
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Lenguaje
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator w-5/6"></div> 
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionLenguajeForm"> 
                <div class="info-card text-center">
                    <p class="text-lg text-gray-700">
                        Evaluación para el mes: <span class="font-bold text-custom-title" id="mesSeleccionadoDisplay">...</span>
                    </p>
                </div>
                <div class="mb-8 text-center">
                    <label for="fecha_evaluacion" class="evaluation-label text-lg">
                        Fecha de la Evaluación
                    </label>
                    <input type="date"
                        name="fecha_evaluacion"
                        id="fecha_evaluacion"
                        class="date-input"
                        readonly>
                </div>
                <div class="section-title text-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                        LENGUAJE
                    </h1>
                </div>
                <div class="scale-legend rounded-xl p-6 mb-8 text-center">
                    <h2 class="text-lg font-bold text-gray-800 mb-3">
                        Escala de Puntuación
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 text-sm">
                        <div class="bg-white rounded-lg p-3 text-center shadow-sm">
                            <div class="font-bold text-red-600">0</div>
                            <div>No lo logra</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center shadow-sm">
                            <div class="font-bold text-orange-600">1</div>
                            <div>Lo intenta pero no lo logra</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center shadow-sm">
                            <div class="font-bold text-yellow-600">2</div>
                            <div>En proceso</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center shadow-sm">
                            <div class="font-bold text-blue-600">3</div>
                            <div>Lo realiza inhábilmente</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 text-center shadow-sm">
                            <div class="font-bold text-green-600">4</div>
                            <div>Normal</div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_atencion_conjunta" class="evaluation-label">Atencion Conjunta</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_atencion_conjunta" id="lenguaje_atencion_conjunta" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_realiza_voca_uao" class="evaluation-label">Realizacion de vocalizaciones u, a, o</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_realiza_voca_uao" id="lenguaje_realiza_voca_uao" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_juego_vocalico" class="evaluation-label">Juego Vocálico</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_juego_vocalico" id="lenguaje_juego_vocalico" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_mama_baba" class="evaluation-label">Balbuceo reduplicativo/mama/baba</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_mama_baba" id="lenguaje_mama_baba" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_emergencia_gestos" class="evaluation-label">Emergencia de gestos deicticos(dar,mostrar,señalar)</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_emergencia_gestos" id="lenguaje_emergencia_gestos" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_comprende_NO" class="evaluation-label">Comprende la palabra NO acompañada del gesto</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_comprende_NO" id="lenguaje_comprende_NO" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_primera_palabra" class="evaluation-label">Aparece la primera palabra (solo si se designa a un objeto)</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_primera_palabra" id="lenguaje_primera_palabra" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_gestos_reconocimiento" class="evaluation-label">Emplea gestos de reconocimientos</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_gestos_reconocimiento" id="lenguaje_gestos_reconocimiento" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_emplea_palabras" class="evaluation-label">Emplea por lo menos tres palabras (papá, mamá, sopa, agua)</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_emplea_palabras" id="lenguaje_emplea_palabras" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_forma_frases_2" class="evaluation-label">Forma frases de dos palabras </label>
                        <div class="select-wrapper">
                            <select name="lenguaje_forma_frases_2" id="lenguaje_forma_frases_2" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_dice_nombre" class="evaluation-label">Dice su nombre</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_dice_nombre" id="lenguaje_dice_nombre" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="lenguaje_forma_frases_3" class="evaluation-label">Forma frases de tres palabras</label>
                        <div class="select-wrapper">
                            <select name="lenguaje_forma_frases_3" id="lenguaje_forma_frases_3" class="select-custom">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">0 - No lo logra</option>
                                <option value="1">1 - Lo intenta pero no lo logra</option>
                                <option value="2">2 - En proceso</option>
                                <option value="3">3 - Lo realiza inhábilmente</option>
                                <option value="4">4 - Normal</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="navigation-buttons flex flex-col sm:flex-row justify-between items-center gap-4">
                    <a href="agregar.mfino.php" class="btn-navigation">
                        ← ANTERIOR
                    </a>
                    <div class="text-sm text-gray-600 text-center hidden sm:block">
                        Paso 5 de 6 - Lenguaje
                    </div>
                    <button type="button" id="botonSiguientePaso" class="btn-navigation">
                        SIGUIENTE →
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionP5_lenguaje'; // Clave para los datos de Lenguaje

            // Recupera el objeto de datos del paciente principal
            const datosPacienteRaw = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let datosPaciente = {};
            if (datosPacienteRaw) {
                try {
                    datosPaciente = JSON.parse(datosPacienteRaw);
                } catch (e) {
                    console.error("Error al cargar datos del paciente:", e);
                    window.location.href = 'agregar.view.php?error=datos_corruptos'; 
                    return;
                }
            } else {
                console.error("No se encontraron datos del paciente. Redirigiendo...");
                window.location.href = 'agregar.view.php?error=datos_faltantes'; 
                return;
            }

            // Recupera los datos específicos de Lenguaje para este paso (si existen)
            const datosLenguajeGuardados = sessionStorage.getItem(sessionKey);
            let datosLenguaje = {};
            if (datosLenguajeGuardados) { 
                try { 
                    datosLenguaje = JSON.parse(datosLenguajeGuardados); 
                } catch(e) { 
                    console.error("Error al cargar datos de Lenguaje:", e);
                }
            }
            
            // Muestra el mes seleccionado (del Paso 1)
            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            if (mesDisplay && datosPaciente.mes) { 
                mesDisplay.textContent = datosPaciente.mes;
            } else if (mesDisplay) { 
                mesDisplay.textContent = 'No disponible'; 
            }

            // Establece la fecha de evaluación.
            if (dateInput) {
                if(datosLenguaje.fecha_evaluacion) { 
                    dateInput.value = datosLenguaje.fecha_evaluacion; 
                } 
                else if (datosPaciente.fecha_inicio_tratamiento) {
                    dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                }
                else { 
                    const t = new Date(); 
                    dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                }
            }

            // Precarga los valores de los <select> si existen datos guardados.
            const form = document.getElementById('evaluacionLenguajeForm'); 
            if(form && Object.keys(datosLenguaje).length > 0) { 
                const selects = form.querySelectorAll('select');
                selects.forEach(select => { 
                    if(datosLenguaje[select.name] !== undefined) { 
                        select.value = datosLenguaje[select.name]; 
                    } else {
                        select.value = ""; 
                    }
                });
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // Recopila los datos del formulario de Lenguaje.
                    const currentLenguajeData = {};
                    
                    // Incluye la fecha de evaluación del formulario.
                    if(dateInput) currentLenguajeData['fecha_evaluacion'] = dateInput.value;

                    // Itera sobre todos los selects y guarda sus valores.
                    const allSelects = form.querySelectorAll('select');
                    allSelects.forEach(select => {
                        currentLenguajeData[select.name] = select.value;
                    });

                    // Fusiona los datos del paso actual con el objeto principal del paciente.
                    datosPaciente.lenguaje = currentLenguajeData; 

                    try {
                        // Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage.
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // Guarda los datos específicos de Lenguaje por separado (opcional).
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentLenguajeData)); 

                        // Redirige al siguiente paso de la evaluación.
                        window.location.href = 'agregar.posturas_tmyu.php'; 
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage:", e);
                        alert("Hubo un error al guardar los datos de Lenguaje."); 
                    }
                });
            }
        });
    </script>
</body>
</html>