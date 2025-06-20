<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signos de Alarma</title>
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
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Signos de Alarma
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator w-full"></div> 
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionSignosAlarmaForm">
                <div class="info-card text-center">
                    <p class="text-lg text-gray-700">
                        Evaluación para el mes: <span class="font-bold text-custom-title" id="mesSeleccionadoDisplay">...</span>
                    </p>
                </div>
                <div class="mb-8 text-center">
                    <label for="fecha_evaluacion" class="evaluation-label text-lg">
                        Fecha de la Evaluación
                    </label>
                    <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="date-input" readonly>
                </div>
                <div class="section-title text-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                        SIGNOS DE ALARMA
                    </h1>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <div class="subescala evaluation-card">
                        <label for="ps_aduccion_pulgares" class="evaluation-label">Aducción de pulgares</label>
                        <div class="select-wrapper">
                            <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="select-custom">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option> 
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="ps_estrabismo" class="evaluation-label">Estrabismo</label>
                        <div class="select-wrapper">
                            <select name="ps_estrabismo" id="ps_estrabismo" class="select-custom">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option> 
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="ps_irritabilidad" class="evaluation-label">Irritabilidad</label>
                        <div class="select-wrapper">
                            <select name="ps_irritabilidad" id="ps_irritabilidad" class="select-custom">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option> 
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <label for="ps_marcha_en_punta_presencia" class="evaluation-label">Marcha en punta</label>
                        <div class="select-wrapper">
                            <select name="ps_marcha_en_punta_presencia" id="ps_marcha_en_punta_presencia" class="select-custom">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        <div id="ps_marcha_en_punta_lado_group" class="radio-group-laterality">
                            <label><input type="radio" name="ps_marcha_en_punta_lado" value="derecha"> Derecha</label>
                            <label><input type="radio" name="ps_marcha_en_punta_lado" value="izquierda"> Izquierda</label>
                            <label><input type="radio" name="ps_marcha_en_punta_lado" value="ambas"> Ambas</label>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <label for="ps_marcha_cruzada_presencia" class="evaluation-label">Marcha Cruzada</label>
                        <div class="select-wrapper">
                            <select name="ps_marcha_cruzada_presencia" id="ps_marcha_cruzada_presencia" class="select-custom">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        <div id="ps_marcha_cruzada_lado_group" class="radio-group-laterality">
                            <label><input type="radio" name="ps_marcha_cruzada_lado" value="derecha"> Derecha</label>
                            <label><input type="radio" name="ps_marcha_cruzada_lado" value="izquierda"> Izquierda</label>
                            <label><input type="radio" name="ps_marcha_cruzada_lado" value="ambas"> Ambas</label>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <label for="ps_punos_cerrados_presencia" class="evaluation-label">Puños cerrados</label>
                        <div class="select-wrapper">
                            <select name="ps_punos_cerrados_presencia" id="ps_punos_cerrados_presencia" class="select-custom">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        <div id="ps_punos_cerrados_lado_group" class="radio-group-laterality">
                            <label><input type="radio" name="ps_punos_cerrados_lado" value="derecha"> Derecha</label>
                            <label><input type="radio" name="ps_punos_cerrados_lado" value="izquierda"> Izquierda</label>
                            <label><input type="radio" name="ps_punos_cerrados_lado" value="ambas"> Ambas</label>
                        </div>
                    </div>

                    <div class="subescala evaluation-card">
                        <label for="ps_reflejo_hiperextension" class="evaluation-label">Reflejo de hiperextensión</label>
                        <div class="select-wrapper">
                            <select name="ps_reflejo_hiperextension" id="ps_reflejo_hiperextension" class="select-custom">
                                <option value="" disabled selected>Seleccione</option> 
                                <option value="0">No</option> 
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                    <div class="subescala evaluation-card">
                        <label for="ps_lenguaje_escaso" class="evaluation-label">Lenguaje escaso</label>
                        <div class="select-wrapper">
                            <select name="ps_lenguaje_escaso" id="ps_lenguaje_escaso" class="select-custom">
                                <option value="" disabled selected>Seleccione</option> 
                                <option value="0">No</option> 
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="navigation-buttons flex flex-col sm:flex-row justify-between items-center gap-4">
                    <a href="agregar.posturas_tmyu.php" class="btn-navigation">
                        ← ANTERIOR
                    </a>
                    <div class="text-sm text-gray-600 text-center hidden sm:block">
                        Paso 6 de 8 - Signos de Alarma
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
            const sessionKey = 'evaluacionP7_signos_alarma'; // Clave para los datos de Signos de Alarma

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

            // Recupera los datos específicos de Signos de Alarma para este paso (si existen)
            const datosSignosAlarmaGuardados = sessionStorage.getItem(sessionKey);
            let datosSignosAlarma = {};
            if (datosSignosAlarmaGuardados) { 
                try { 
                    datosSignosAlarma = JSON.parse(datosSignosAlarmaGuardados); 
                } catch(e) { 
                    console.error(`Error al cargar datos de Signos de Alarma:`, e); 
                    sessionStorage.removeItem(sessionKey); 
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
                if(datosSignosAlarma.fecha_evaluacion) { 
                    dateInput.value = datosSignosAlarma.fecha_evaluacion; 
                } else { 
                    const datosPaso6Raw = sessionStorage.getItem('evaluacionP6_posturas_tmyu'); 
                    if(datosPaso6Raw){ 
                        try{ 
                            const dP6 = JSON.parse(datosPaso6Raw); 
                            if(dP6.fecha_evaluacion) dateInput.value = dP6.fecha_evaluacion; 
                        } catch(e){
                            console.error("Error al parsear fecha de evaluación del paso anterior:", e);
                        } 
                    }
                    if(!dateInput.value) { 
                        const t = new Date(); 
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                    }
                }
            }

            const form = document.getElementById('evaluacionSignosAlarmaForm');
            
            // Define los selectores para los campos de lateralidad. Los radios quedarán deshabilitados para guardar.
            const camposConLateralidad = [
                { selectId: 'ps_marcha_en_punta_presencia', radioGroupId: 'ps_marcha_en_punta_lado_group', radioName: 'ps_marcha_en_punta_lado' },
                { selectId: 'ps_marcha_cruzada_presencia', radioGroupId: 'ps_marcha_cruzada_lado_group', radioName: 'ps_marcha_cruzada_lado' },
                { selectId: 'ps_punos_cerrados_presencia', radioGroupId: 'ps_punos_cerrados_lado_group', radioName: 'ps_punos_cerrados_lado' }
            ];

            // Cargar datos al iniciar la página
            if(form && Object.keys(datosSignosAlarma).length > 0 ) {
                const allSelects = form.querySelectorAll('select');
                allSelects.forEach(select => { 
                    if(datosSignosAlarma[select.name] !== undefined) { 
                        select.value = datosSignosAlarma[select.name]; 
                    } 
                });
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // Recopila los datos del formulario (solo los valores de los select)
                    const currentSignosAlarmaData = {};
                    if(dateInput) currentSignosAlarmaData['fecha_evaluacion'] = dateInput.value;

                    // Recolectar todos los valores de los select
                    const allSelects = form.querySelectorAll('select');
                    allSelects.forEach(select => {
                        currentSignosAlarmaData[select.name] = select.value;
                    });
                    
                    // Fusiona los datos del paso actual con el objeto principal del paciente
                    datosPaciente.signos_alarma = currentSignosAlarmaData; 

                    try {
                        // Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage.
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // Guarda los datos específicos de Signos de Alarma por separado (opcional).
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentSignosAlarmaData)); 

                        // Redirige al siguiente paso de la evaluación.
                        window.location.href = 'agregar.hitomgrueso.php'; 
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage:", e);
                        alert("Hubo un error al guardar los Signos de Alarma."); 
                    }
                });
            }
        });
    </script>
</body>
</html>