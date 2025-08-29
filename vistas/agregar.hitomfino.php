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
    <link href=<?=base_url("/assets/output.css")?> rel="stylesheet"/>
    <style>
        .modal-overlay {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
            display: none;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
        .modal-content {
            background: white;
            padding: 2rem 3rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 600px;
            height: 450px;
            max-height: 600px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }
        .modal-icon {
            font-size: 6rem;
            color: #facc15;
            line-height: 1;
        }
        .modal-title {
            font-size: 3rem;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 1rem;
        }
        .modal-message {
            font-size: 2rem;
            color: #374151;
            margin-bottom: 1.5rem;
        }
        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: auto;
        }
        .modal-buttons button {
            padding: 1rem 2.5rem;
            font-weight: 700;
            border-radius: 0.75rem;
            cursor: pointer;
            font-size: 1.25rem;
            transition: background-color 0.2s ease-in-out;
            border: none;
            color: white;
            min-width: 180px;
        }
        .bg-custom-button {
            background-color: #16a34a;
        }
        .bg-custom-button:hover {
            background-color: #4ade80;
        }
        .bg-custom-button-no {
            background-color: #dc2626;
        }
        .bg-custom-button-no:hover {
            background-color: #f87171;
        }
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
        <form id="evaluacionHitoMFinoForm" class="text-center">

            <div class="info-card mb-6"> <label for="fecha_evaluacion" class="block text-base font-semibold text-gray-700 mb-2">Fecha de la Evaluación</label>
                <input type="date" 
                    name="fecha_evaluacion" 
                    id="fecha_evaluacion" 
                    class="date-input w-full" 
                    readonly>
            </div>

            <div class="section-title">
                <h1>HITOS DE DESARROLLO MOTRICIDAD FINA</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 text-left">
                <div>
                    <label for="hf_fijacion_ocular_display" class="evaluation-label">Fijación Ocular (FO)</label>
                    <p id="hf_fijacion_ocular_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_fijacion_ocular" id="hf_fijacion_ocular_value">
                </div>
                <div>
                    <label for="hf_cubito_palmar_display" class="evaluation-label">Cúbito-Palmar (CP)</label>
                    <p id="hf_cubito_palmar_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_cubito_palmar" id="hf_cubito_palmar_value">
                </div>
                <div>
                    <label for="hf_presion_r_display" class="evaluation-label">Prensión "Rascado" (PR)</label>
                    <p id="hf_presion_r_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_presion_r" id="hf_presion_r_value">
                </div>
                <div>
                    <label for="hf_pinza_inferior_display" class="evaluation-label">Pinza Inferior (PI)</label>
                    <p id="hf_pinza_inferior_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_pinza_inferior" id="hf_pinza_inferior_value">
                </div>
                <div>
                    <label for="hf_pinza_fina_display" class="evaluation-label">Pinza Fina (PF)</label>
                    <p id="hf_pinza_fina_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_pinza_fina" id="hf_pinza_fina_value">
                </div>
                <div>
                    <label for="hf_abajamiento_voluntario_display" class="evaluation-label">Aflojamiento Voluntario (AV)</label>
                    <p id="hf_abajamiento_voluntario_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_abajamiento_voluntario" id="hf_abajamiento_voluntario_value">
                </div>
                <div>
                    <label for="hf_coordinacion_oculomanual_display" class="evaluation-label">Coordinación Óculomanual (CO)</label>
                    <p id="hf_coordinacion_oculomanual_display" class="hito-display"><em>...</em></p>
                    <input type="hidden" name="hf_coordinacion_oculomanual" id="hf_coordinacion_oculomanual_value">
                </div>
            </div>

            <div class="navigation-buttons flex flex-col sm:flex-row justify-between items-center gap-4">
                <a href=<?=base_url("/agregarHitosMG")?> class="w-full sm:w-auto mb-4 sm:mb-0">
                    <button type="button" class="btn-navigation w-full">ANTERIOR</button>
                </a>
                <div class="text-base text-gray-600 font-medium mx-4 mb-4 sm:mb-0">
                            Paso 9 de 9 - Lenguaje
                        </div>
                <button type="button" id="botonFinalizarEvaluacion" class="btn-navigation bg-green-500 hover:bg-green-400 w-full sm:w-auto">FINALIZAR EVALUACIÓN</button>
            </div>
        </form>
        <div id="statusMessage" class=""></div>
    </div>

    <div id="confirmacionModal" class="modal-overlay"> <!-- Quitamos 'hidden' para que el JS lo controle -->
        <div class="modal-content">
            <div class="modal-icon">⚠️</div>
            <h1 class="modal-title">Finalizar Evaluación</h1>
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
        const sessionKey = 'evaluacionP9_hitomfino';

        const loadSessionData = (key) => {
            try {
                const data = sessionStorage.getItem(key);
                return data ? JSON.parse(data) : {};
            } catch (e) {
                console.error(`Error al parsear datos de sessionStorage para ${key}:`, e);
                sessionStorage.removeItem(key);
                return {};
            }
        };

        const datosPacienteRaw = sessionStorage.getItem('datosPacienteParaEvaluacion');
        let datosPaciente = {};
        if (datosPacienteRaw) {
            try {
                datosPaciente = JSON.parse(datosPacienteRaw);
            } catch (e) {
                console.error("Error al cargar datos del paciente:", e);
                window.location.href = "<?='agregar.view.php?error=datos_corruptos'?>";
                return;
            }
        } else {
            console.error("No se encontraron datos del paciente. Redirigiendo...");
            window.location.href = "<?='agregar.view.php?error=datos_faltantes'?>";
            return;
        }

        const datosHitoMfinoGuardados = loadSessionData(sessionKey);
        
        if (dateInput) {
            if (datosHitoMfinoGuardados.fecha_evaluacion) { 
                dateInput.value = datosHitoMfinoGuardados.fecha_evaluacion; 
            } else {
                if (datosPaciente.fecha_inicio_tratamiento) {
                    dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                } else { 
                    const t = new Date(); 
                    dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                }
            }
        }

        const form = document.getElementById('evaluacionHitoMFinoForm');
        const datosMotorFinoPasoAnterior = loadSessionData('evaluacionP4_mfino'); 

        const resultados_mfino_display = {
            '0': 'No lo logra (0)', '1': 'Lo intenta pero no lo logra (1)',
            '2': 'En proceso (2)', '3': 'Lo realiza inhábilmente (3)',
            '4': 'Normal (4)', '': 'Aún no se evalúa' 
        };

        const setHitoDisplay = (baseId, valorNumericoDelCampoAnterior) => {
            const displayElement = document.getElementById(baseId + '_display');
            const valueElement = document.getElementById(baseId + '_value'); 
            if (displayElement && valueElement) {
                const valorParaInput = (valorNumericoDelCampoAnterior === null || typeof valorNumericoDelCampoAnterior === 'undefined' || valorNumericoDelCampoAnterior === '') 
                                        ? '' 
                                        : String(valorNumericoDelCampoAnterior);
                
                const textoDisplay = resultados_mfino_display[valorParaInput] || resultados_mfino_display[''];

                displayElement.textContent = textoDisplay;
                valueElement.value = valorParaInput;
            }
        };

        const mapeoHitosMFParaDisplay = {
            'hf_fijacion_ocular': datosMotorFinoPasoAnterior.mf_manos_linea_media, 
            'hf_cubito_palmar': datosMotorFinoPasoAnterior.mf_estruja_papel, 
            'hf_presion_r': datosMotorFinoPasoAnterior.mf_transfiere_manos, 
            'hf_pinza_inferior': datosMotorFinoPasoAnterior.mf_desarrolla_agarre, 
            'hf_pinza_fina': datosMotorFinoPasoAnterior.mf_pinza_superior, 
            'hf_abajamiento_voluntario': datosMotorFinoPasoAnterior.mf_torre_2_cubos, 
            'hf_coordinacion_oculomanual': datosMotorFinoPasoAnterior.mf_torre_6_cubos 
        };
        
        for (const idHito in mapeoHitosMFParaDisplay) {
            setHitoDisplay(idHito, mapeoHitosMFParaDisplay[idHito]);
        }

        const botonFinalizar = document.getElementById('botonFinalizarEvaluacion');
        const modal = document.getElementById('confirmacionModal');
        const modalBotonSi = document.getElementById('modalBotonSi');
        const modalBotonNo = document.getElementById('modalBotonNo');
        const statusMessageDiv = document.getElementById('statusMessage');

        function enviarDatosEvaluacion(datos) {
            const http = new XMLHttpRequest();
            http.open("POST", "guardarEvaluacion", true); 
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

        const clavesDePasos = [
            'datosPacienteParaEvaluacion', 'evaluacionP1', 'evaluacionP2_mkatona',
            'evaluacionP3_mgrueso', 'evaluacionP4_mfino', 'evaluacionP5_lenguaje',
            'evaluacionP6_posturas_tmyu', 'evaluacionP7_signos_alarma',
            'evaluacionP8_hitomgrueso', sessionKey 
        ];

        if (botonFinalizar && form && modal && modalBotonSi && modalBotonNo && statusMessageDiv) {
            botonFinalizar.addEventListener('click', function() {
                const currentHitoMfinoData = {};
                if(dateInput) currentHitoMfinoData['fecha_evaluacion'] = dateInput.value;

                const hitoInputs = form.querySelectorAll('input[type="hidden"]');
                hitoInputs.forEach(input => {
                    if (input.value === '4') {
                        currentHitoMfinoData[input.name] = input.value;
                    } 
                });

                datosPaciente.hitomfino = currentHitoMfinoData; 

                try {
                    sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                    sessionStorage.setItem(sessionKey, JSON.stringify(currentHitoMfinoData)); 
                } catch(e) {
                    console.error(`Error guardando datos de ${sessionKey} antes de mostrar modal:`, e);
                    alert("Hubo un error al guardar los Hitos de Desarrollo Motor Fino actuales. Por favor, inténtalo de nuevo.");
                    return;
                }
                modal.style.display = 'flex'; // Muestra el modal
            });

            modalBotonNo.addEventListener('click', () => {
                modal.style.display = 'none'; // Oculta el modal
            });

            modalBotonSi.addEventListener('click', function() {
                modal.style.display = 'none'; // Oculta el modal
                statusMessageDiv.textContent = 'Enviando datos...';
                statusMessageDiv.className = 'status-message';
                statusMessageDiv.style.display = 'block';

                const finalDataToSend = loadSessionData('datosPacienteParaEvaluacion');
                enviarDatosEvaluacion(finalDataToSend);
            });
        }

        function limpiarSessionStorageYRedirigir(claves) {
            claves.forEach(clave => sessionStorage.removeItem(clave));
            setTimeout(() => {
                window.location.href = "inicio";
            }, 1500);
        }
    });
    </script>
</body>
</html>