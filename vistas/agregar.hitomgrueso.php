<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitos de Desarrollo Motor Grueso</title>
    <link href=<?=base_url("/assets/output.css")?> rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #F0F9FF 0%, #E0F2FE 100%);
        }
        .bg-custom-header-area {
            background-color: #FFFFFF;
        }
        .bg-custom-main-box {
            background-color: #FFFFFF;
            border: 1px solid #E5E7EB;
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
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
            width: 100%;
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
            margin-bottom: 1.5rem;
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
            text-align: center;
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
        .evaluation-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            margin-bottom: 2rem;
            font-size: 0.875rem;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }
        .evaluation-table th, .evaluation-table td {
            border: 1px solid #E5E7EB;
            padding: 0.75rem 0.5rem;
            text-align: center;
            vertical-align: middle;
            transition: background-color 0.2s ease-in-out;
        }
        .evaluation-table th {
            background: linear-gradient(135deg, #F8FAFC 0%, #F1F5F9 100%);
            font-weight: 700;
            white-space: normal; 
            color: #334155;
            font-size: 0.8rem;
            line-height: 1.3;
        }
        .evaluation-table td:first-child {
            text-align: left;
            font-weight: 600;
            white-space: normal;
            background: linear-gradient(135deg, #FEFEFE 0%, #F8FAFC 100%);
            color: #1E293B;
            padding-left: 1rem;
        }
        .evaluation-table tbody tr:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }
        .evaluation-table input[type="checkbox"] {
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
        .evaluation-table input[type="checkbox"]:hover {
            transform: scale(1.1);
            border-color: #2563EB;
        }
        .evaluation-table input[type="checkbox"]:checked {
            background-color: #2563EB;
            border-color: #2563EB;
            transform: scale(1.05);
        }
        @media (max-width: 640px) {
            .evaluation-table {
                font-size: 0.7rem;
            }
            .evaluation-table th,
            .evaluation-table td {
                padding: 0.375rem 0.25rem;
            }
        }
        .radio-group-laterality { 
            display: none; 
            margin-top: 0.5rem; 
            padding-left: 1rem;
        }
        .radio-group-laterality label { 
            margin-left: 0.25rem; 
            margin-right: 0.75rem; 
            font-weight: normal;
        }
        .hito-display {
            background: white;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            color: #4B5563;
            min-height: 3rem; 
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            justify-content: center;
            text-align: center;
            font-weight: 600;
        }
        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            text-align: center;
            color: #1E3A8A;
            padding: 1.5rem 0;
            margin-bottom: 1.5rem;
            background: linear-gradient(90deg, transparent 0%, #DBEAFE 50%, transparent 100%);
            border-radius: 8px;
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="text-center my-8"> <h3 class="text-3xl font-extrabold text-custom-title">Agregar una Evaluación</h3> </div>

    <div class="max-w-7xl mx-auto px-6 mb-6"> <div class="h-2 bg-gray-200 rounded-full">
            <div class="progress-indicator w-full"></div> 
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-6 bg-custom-main-box rounded-xl shadow-lg p-8">
        <form id="evaluacionHitoMGruesoForm" class="text-center">
            
            <div class="info-card mb-6"> <label for="fecha_evaluacion" class="block text-base font-semibold text-gray-700 mb-2">Fecha de la Evaluación</label>
                <input type="date" 
                    name="fecha_evaluacion" 
                    id="fecha_evaluacion" 
                    class="date-input w-full" 
                    readonly>
            </div>

            <div class="section-title">
                <h1>HITOS DE DESARROLLO MOTOR GRUESO</h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 text-left">
                <div class="subescala evaluation-card">
                    <label for="hg_control_cefalico_display" class="evaluation-label">Control cefálico</label>
                    <p id="hg_control_cefalico_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_control_cefalico" id="hg_control_cefalico_value">
                </div>
                <div class="subescala evaluation-card">
                    <label for="hg_posicion_sentado_display" class="evaluation-label">Posición de sentado</label>
                    <p id="hg_posicion_sentado_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_posicion_sentado" id="hg_posicion_sentado_value">
                </div>
                <div class="subescala evaluation-card">
                    <label for="hg_reacciones_proteccion_display" class="evaluation-label">Reacciones de protección</label>
                    <p id="hg_reacciones_proteccion_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_reacciones_proteccion" id="hg_reacciones_proteccion_value">
                </div>
                <div class="subescala evaluation-card">
                    <label for="hg_patron_arrastre_display" class="evaluation-label">Patrón de arrastre</label>
                    <p id="hg_patron_arrastre_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_patron_arrastre" id="hg_patron_arrastre_value">
                </div>
                <div class="subescala evaluation-card">
                    <label for="hg_patron_gateo_display" class="evaluation-label">Patrón de gateo</label>
                    <p id="hg_patron_gateo_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_patron_gateo" id="hg_patron_gateo_value">
                </div>
                <div class="subescala evaluation-card">
                    <label for="hg_mov_posturales_autonomos_display" class="evaluation-label">Movimientos posturales autónomos</label>
                    <p id="hg_mov_posturales_autonomos_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_mov_posturales_autonomos" id="hg_mov_posturales_autonomos_value">
                </div>
                <div class="subescala evaluation-card">
                    <label for="hg_patron_marcha_independiente_display" class="evaluation-label">Patrón de marcha independiente</label>
                    <p id="hg_patron_marcha_independiente_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hg_patron_marcha_independiente" id="hg_patron_marcha_independiente_value">
                </div>
            </div>

            <div class="navigation-buttons flex flex-col sm:flex-row justify-between items-center gap-4">
                <a href=<?=base_url("agregar.signos_alarma.php")?> class="w-full sm:w-auto mb-4 sm:mb-0">
                    <button type="button" class="btn-navigation w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        ANTERIOR
                    </button>
                </a>
                <div class="text-base text-gray-600 font-medium mx-4 mb-4 sm:mb-0">
                    Paso 8 de 9 - Hitos de Desarrollo Motor Grueso
                </div>
                <button type="button" id="botonSiguientePaso" class="btn-navigation w-full sm:w-auto">
                    SIGUIENTE 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionP8_hitomgrueso'; // Clave para los datos de Hitos de Desarrollo Motor Grueso
            
            // Función para cargar datos de sessionStorage de forma segura.
            const loadSessionData = (key) => {
                try {
                    const data = sessionStorage.getItem(key);
                    return data ? JSON.parse(data) : {};
                } catch (e) {
                    console.error(`Error al parsear datos de sessionStorage para ${key}:`, e);
                    sessionStorage.removeItem(key); // Limpia datos corruptos.
                    return {};
                }
            };

            // Recupera el objeto de datos del paciente principal
            const datosPaciente = loadSessionData('datosPacienteParaEvaluacion');
            if (Object.keys(datosPaciente).length === 0) {
                console.error("No se encontraron datos del paciente. Redirigiendo...");
                window.location.href = "<?=base_url('agregar.view.php?error=datos_faltantes')?>";
                return;
            }

            // Recupera los datos específicos de Hitos Motor Grueso para este paso 
            const datosHitoMgrueso = loadSessionData(sessionKey);
            
            // Lógica para cargar la fecha de evaluación
            if (dateInput) {
                if(datosHitoMgrueso.fecha_evaluacion) { 
                    dateInput.value = datosHitoMgrueso.fecha_evaluacion; 
                } else {
                    // Prioriza la fecha del Paso 1 (fecha_inicio_tratamiento) si no hay fecha guardada para este paso
                    if (datosPaciente.fecha_inicio_tratamiento) {
                        dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                    } else { // Si aún no hay fecha, usar la fecha actual
                        const t = new Date(); 
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                    }
                }
            }

            const form = document.getElementById('evaluacionHitoMGruesoForm');
            
            // Cargar los datos del Paso 3 (Motor Grueso) para precargar los hitos
            // Es crucial que 'datosPaciente.mgrueso' contenga los datos de Motor Grueso del paso anterior
            let datosMotorGruesoPasoAnterior = datosPaciente.mgrueso || {}; 
            
            // Mapeo de valores numéricos a descripciones legibles
            const resultados_mgrueso_display = {
                '0': 'No lo logra (0)',
                '1': 'Lo intenta pero no lo logra (1)',
                '2': 'En proceso (2)',
                '3': 'Lo realiza inhábilmente (3)',
                '4': 'Normal (4)',
                '': 'Aún no se evalúa' // Para casos donde el valor es nulo o indefinido
            };

            // Función para actualizar los elementos de display y los campos hidden
            function setHitoDisplay(baseId, valorNumericoDelCampoAnterior) {
                const displayElement = document.getElementById(baseId + '_display');
                const valueElement = document.getElementById(baseId + '_value');
                
                let valorAGuardar = '';
                let textoAMostrar = resultados_mgrueso_display['']; // Default a 'Aún no se evalúa'

                // Primero, intentar precargar desde los datos de este paso si ya están guardados
                if (datosHitoMgrueso[baseId]) {
                    valorAGuardar = datosHitoMgrueso[baseId];
                    textoAMostrar = resultados_mgrueso_display[String(datosHitoMgrueso[baseId])] || resultados_mgrueso_display[''];
                } 
                // Si no hay datos guardados para este paso, usar los del paso anterior (Motor Grueso)
                else if (valorNumericoDelCampoAnterior !== undefined && valorNumericoDelCampoAnterior !== null && typeof resultados_mgrueso_display[String(valorNumericoDelCampoAnterior)] !== 'undefined') {
                    valorAGuardar = String(valorNumericoDelCampoAnterior);
                    textoAMostrar = resultados_mgrueso_display[String(valorNumericoDelCampoAnterior)];
                }

                if (displayElement && valueElement) {
                    displayElement.textContent = textoAMostrar;
                    valueElement.value = valorAGuardar;
                }
            }
            
            // Mapeo de los IDs de los elementos HTML con los nombres de las claves en datosMotorGruesoPasoAnterior
            const mapeoHitosMG = {
                'hg_control_cefalico': datosMotorGruesoPasoAnterior.control_cefalico,
                'hg_posicion_sentado': datosMotorGruesoPasoAnterior.sentado_sin_apoyo,
                'hg_reacciones_proteccion': datosMotorGruesoPasoAnterior.reaccion_lateral_delantera,
                'hg_patron_arrastre': datosMotorGruesoPasoAnterior.patron_arrastre,
                'hg_patron_gateo': datosMotorGruesoPasoAnterior.patron_gateo_independiente,
                'hg_mov_posturales_autonomos': datosMotorGruesoPasoAnterior.transicion_gateo_bipedestacion,
                'hg_patron_marcha_independiente': datosMotorGruesoPasoAnterior.comienza_patron_marcha
            };

            // Recorrer el mapeo y actualizar los displays y hidden inputs
            for (const idHito in mapeoHitosMG) {
                setHitoDisplay(idHito, mapeoHitosMG[idHito]);
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const currentHitoMgruesoData = {};
                    if(dateInput) currentHitoMgruesoData['fecha_evaluacion'] = dateInput.value;
                    
                    // Recolectar los valores de los campos hidden
                    const hitoInputs = form.querySelectorAll('input[type="hidden"]');
                    hitoInputs.forEach(input => {
                        // Guardar solo si el valor es "4" (Normal)
                        if (input.value === '4') {
                            currentHitoMgruesoData[input.name] = input.value;
                        } 
                    });

                    // Fusiona los datos del paso actual con el objeto principal del paciente
                    datosPaciente.hitomgrueso = currentHitoMgruesoData; 

                    try {
                        // Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage.
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // Guarda los datos específicos de Hitos Motor Grueso por separado.
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentHitoMgruesoData)); 

                        // Redirige al siguiente paso de la evaluación.
                        window.location.href = "<?=base_url('agregar.hitomfino.php')?>"; 
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage:", e);
                        alert("Hubo un error al guardar los Hitos de Desarrollo Motor Grueso."); 
                    }
                });
            }
        });
    </script>
</body>
</html>