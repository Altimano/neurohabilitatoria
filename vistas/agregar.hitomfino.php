<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitos de Desarrollo Motricidad Fina</title>
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
        .bg-custom-button-no {
            background-color: #6B7280; 
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
        }
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }
        .modal-icon {
            font-size: 2.5rem;
            color: #F59E0B;
            margin-bottom: 1rem;
        }
        .modal-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #1F2937;
        }
        .modal-message {
            font-size: 1rem;
            color: #4B5563;
            margin-bottom: 1.5rem;
        }
        .modal-buttons button {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            color: white;
            margin: 0 0.5rem;
            cursor: pointer;
        }
        .hidden { 
            display: none; 
        }
        #statusMessage {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            display: none;
        }
        #statusMessage.success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        #statusMessage.error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluación</h3></div>

    <div class="max-w-4xl mx-auto mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionHitoMFinoForm" class="text-center">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluación</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-2"><h1 class="text-xl font-semibold text-center text-gray-800">HITOS DE DESARROLLO MOTRICIDAD FINA</h1></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6 text-left">
                <div>
                    <label for="hf_fijacion_ocular_display" class="block text-sm font-medium text-gray-700 mb-1">Fijación Ocular (FO)</label>
                    <p id="hf_fijacion_ocular_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_fijacion_ocular" id="hf_fijacion_ocular_value">
                </div>
                <div>
                    <label for="hf_cubito_palmar_display" class="block text-sm font-medium text-gray-700 mb-1">Cúbito-Palmar (CP)</label>
                    <p id="hf_cubito_palmar_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_cubito_palmar" id="hf_cubito_palmar_value">
                </div>
                <div>
                    <label for="hf_presion_r_display" class="block text-sm font-medium text-gray-700 mb-1">Prensión "Rascado" (PR)</label>
                    <p id="hf_presion_r_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_presion_r" id="hf_presion_r_value">
                </div>
                <div>
                    <label for="hf_pinza_inferior_display" class="block text-sm font-medium text-gray-700 mb-1">Pinza Inferior (PI)</label>
                    <p id="hf_pinza_inferior_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_pinza_inferior" id="hf_pinza_inferior_value">
                </div>
                <div>
                    <label for="hf_pinza_fina_display" class="block text-sm font-medium text-gray-700 mb-1">Pinza Fina (PF)</label>
                    <p id="hf_pinza_fina_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_pinza_fina" id="hf_pinza_fina_value">
                </div>
                <div>
                    <label for="hf_abajamiento_voluntario_display" class="block text-sm font-medium text-gray-700 mb-1">Aflojamiento Voluntario (AV)</label>
                    <p id="hf_abajamiento_voluntario_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_abajamiento_voluntario" id="hf_abajamiento_voluntario_value">
                </div>
                <div>
                    <label for="hf_coordinacion_oculomanual_display" class="block text-sm font-medium text-gray-700 mb-1">Coordinación Oculomanual (CO)</label>
                    <p id="hf_coordinacion_oculomanual_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_coordinacion_oculomanual" id="hf_coordinacion_oculomanual_value">
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="agregar.hitomgrueso.php">
                    <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                </a>
                <div class="text-sm text-gray-600 text-center hidden sm:block">
                        Paso 8 de 8 - Lenguaje
                    </div>
                <button type="button" id="botonFinalizarEvaluacion" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">FINALIZAR EVALUACIÓN</button>
            </div>
        </form>
        <div id="statusMessage" class=""></div>
    </div>

    <div id="confirmacionModal" class="modal-overlay hidden">
        <div class="modal-content">
            <div class="modal-icon">⚠️</div>
            <h3 class="modal-title">Finalizar Evaluación</h3>
            <p class="modal-message">¿Seguro que quieres finalizar la evaluación?</p>
            <div class="modal-buttons">
                <button id="modalBotonSi" class="bg-custom-button">Sí</button>
                <button id="modalBotonNo" class="bg-custom-button-no">No</button>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('fecha_evaluacion');
        const sessionKey = 'evaluacionP9_hitomfino'; // Clave para los datos de Hitos de Desarrollo Motricidad Fina

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

        // 1. Recupera el objeto principal de datos del paciente.
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

        // 2. Recupera los datos específicos de Hitos Motricidad Fina para este paso.
        const datosHitoMfinoGuardados = loadSessionData(sessionKey);
        
        // Carga la fecha de evaluación.
        if (dateInput) {
            if (datosHitoMfinoGuardados.fecha_evaluacion) { 
                dateInput.value = datosHitoMfinoGuardados.fecha_evaluacion; 
            } else {
                // Si no hay fecha guardada para este paso, usa la fecha del inicio de tratamiento del paciente.
                if (datosPaciente.fecha_inicio_tratamiento) {
                    dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                } else { 
                    // Si no hay fecha en ninguna parte, usa la fecha actual.
                    const t = new Date(); 
                    dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                }
            }
        }

        // Muestra el mes de la evaluación.
        const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
        if (mesDisplay && datosPaciente.mes) { 
            mesDisplay.textContent = datosPaciente.mes;
        } else if (mesDisplay) { 
            mesDisplay.textContent = 'No disponible'; 
        }

        const form = document.getElementById('evaluacionHitoMFinoForm');
        
        // Obtiene los datos de Motor Fino del paso anterior para precargar los hitos.
        const datosMotorFinoPasoAnterior = loadSessionData('evaluacionP4_mfino'); 

        // Mapeo de valores numéricos a descripciones legibles para la visualización.
        const resultados_mfino_display = {
            '0': 'No lo logra (0)', '1': 'Lo intenta pero no lo logra (1)',
            '2': 'En proceso (2)', '3': 'Lo realiza inhábilmente (3)',
            '4': 'Normal (4)', '': 'Aún no se evalúa' 
        };

        // Función para actualizar los elementos de display y los campos hidden con los valores de los hitos.
        const setHitoDisplay = (baseId, valorNumericoDelCampoAnterior) => {
            const displayElement = document.getElementById(baseId + '_display');
            const valueElement = document.getElementById(baseId + '_value'); 
            if (displayElement && valueElement) {
                const valorParaInput = (valorNumericoDelCampoAnterior === null || typeof valorNumericoDelCampoAnterior === 'undefined' || valorNumericoDelCampoAnterior === '') 
                                        ? '' 
                                        : String(valorNumericoDelCampoAnterior);
                
                const textoDisplay = resultados_mfino_display[valorParaInput] || resultados_mfino_display[''];

                displayElement.textContent = textoDisplay;
                valueElement.value = valorParaInput; // Asigna el valor al input hidden
            }
        };

        // Mapeo de los IDs de los elementos HTML con los nombres de las claves en datosMotorFinoPasoAnterior.
        const mapeoHitosMFParaDisplay = {
            'hf_fijacion_ocular': datosMotorFinoPasoAnterior.mf_manos_linea_media, 
            'hf_cubito_palmar': datosMotorFinoPasoAnterior.mf_estruja_papel, 
            'hf_presion_r': datosMotorFinoPasoAnterior.mf_transfiere_manos, 
            'hf_pinza_inferior': datosMotorFinoPasoAnterior.mf_desarrolla_agarre, 
            'hf_pinza_fina': datosMotorFinoPasoAnterior.mf_pinza_superior, 
            'hf_abajamiento_voluntario': datosMotorFinoPasoAnterior.mf_torre_2_cubos, 
            'hf_coordinacion_oculomanual': datosMotorFinoPasoAnterior.mf_torre_6_cubos 
        };
        
        // Recorrer el mapeo y actualizar los displays y hidden inputs.
        for (const idHito in mapeoHitosMFParaDisplay) {
            setHitoDisplay(idHito, mapeoHitosMFParaDisplay[idHito]);
        }

        const botonFinalizar = document.getElementById('botonFinalizarEvaluacion');
        const modal = document.getElementById('confirmacionModal');
        const modalBotonSi = document.getElementById('modalBotonSi');
        const modalBotonNo = document.getElementById('modalBotonNo');
        const statusMessageDiv = document.getElementById('statusMessage');

        // Función para enviar todos los datos de la evaluación al servidor.
        function enviarDatosEvaluacion(datos) {
            const http = new XMLHttpRequest();
            http.open("POST", "../controladores/guardarEvaluacionCompleta.php", true); 
            http.setRequestHeader("Content-Type", "application/json"); 
            http.send(JSON.stringify(datos));

            http.onreadystatechange = function() {
                if (http.readyState === 4) {
                    if (http.status === 200) {
                        try {
                            const responseData = JSON.parse(http.responseText);
                            if (responseData.success) {
                                statusMessageDiv.textContent = responseData.message || "Evaluación guardada exitosamente.";
                                statusMessageDiv.className = 'status-message success';
                                statusMessageDiv.style.display = 'block';
                                limpiarSessionStorageYRedirigir(clavesDePasos); 
                            } else {
                                statusMessageDiv.textContent = responseData.message || "Error desconocido al guardar la evaluación.";
                                statusMessageDiv.className = 'status-message error';
                                statusMessageDiv.style.display = 'block';
                            }
                        } catch (e) {
                            console.error("Error al parsear la respuesta JSON del servidor:", e, "Respuesta recibida:", http.responseText);
                            statusMessageDiv.textContent = "Error inesperado del servidor. La respuesta no fue JSON válida. (Ver consola para detalles)";
                            statusMessageDiv.className = 'status-message error';
                            statusMessageDiv.style.display = 'block';
                        }
                    } else {
                        statusMessageDiv.textContent = "Error al enviar la solicitud. Código: " + http.status + " - " + http.statusText;
                        statusMessageDiv.className = 'status-message error';
                        statusMessageDiv.style.display = 'block';
                    }
                }
            };
        }

        // Claves de sessionStorage a limpiar después de la finalización exitosa.
        const clavesDePasos = [
            'datosPacienteParaEvaluacion',
            'evaluacionPaso1',
            'evaluacionPaso2_mkatona',
            'evaluacionPaso3_mgrueso',
            'evaluacionP4_mfino',
            'evaluacionP5_lenguaje',
            'evaluacionP6_posturas_tmyu',
            'evaluacionP7_signos_alarma',
            'evaluacionP8_hitomgrueso',
            sessionKey 
        ];

        if (botonFinalizar && form && modal && modalBotonSi && modalBotonNo && statusMessageDiv) {
            botonFinalizar.addEventListener('click', function() {
                const currentHitoMfinoData = {};
                // La fecha de evaluación es del Paso 9.
                if(dateInput) currentHitoMfinoData['fecha_evaluacion'] = dateInput.value;

                // Recopila los valores de los campos hidden, guardando solo si el valor es "4".
                const hitoInputs = form.querySelectorAll('input[type="hidden"]');
                hitoInputs.forEach(input => {
                    if (input.value === '4') {
                        currentHitoMfinoData[input.name] = input.value;
                    } 
                });

                // Fusiona los datos del paso actual con el objeto principal del paciente.
                datosPaciente.hitomfino = currentHitoMfinoData; 

                try {
                    // Guarda los datos actualizados del paciente en sessionStorage.
                    sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                    // Guarda los datos específicos de Hitos Motricidad Fina por separado.
                    sessionStorage.setItem(sessionKey, JSON.stringify(currentHitoMfinoData)); 

                } catch(e) {
                    console.error(`Error guardando datos de ${sessionKey} antes de mostrar modal:`, e);
                    alert("Hubo un error al guardar los Hitos de Desarrollo Motor Fino actuales. Por favor, inténtalo de nuevo.");
                    return;
                }
                modal.classList.remove('hidden'); // Muestra el modal de confirmación
            });

            modalBotonNo.addEventListener('click', () => modal.classList.add('hidden'));

            modalBotonSi.addEventListener('click', function() {
                modal.classList.add('hidden');
                statusMessageDiv.textContent = 'Enviando datos...';
                statusMessageDiv.className = 'status-message';
                statusMessageDiv.style.display = 'block';

                // Obtiene todos los datos consolidados del sessionStorage para el envío final.
                const finalDataToSend = loadSessionData('datosPacienteParaEvaluacion');

                enviarDatosEvaluacion(finalDataToSend);
            });
        }

        // Función para limpiar sessionStorage y redirigir.
        function limpiarSessionStorageYRedirigir(claves) {
            claves.forEach(clave => sessionStorage.removeItem(clave));
            setTimeout(() => {
                window.location.href = '/inicio'; 
            }, 1500);
        }
    });
</script>
</body>
</html>