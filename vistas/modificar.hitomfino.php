<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitos de Desarrollo Motricidad Fina - Finalizar</title>
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

        .hito-display {
            padding: 1rem;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            background: linear-gradient(135deg, #F8FAFC 0%, #F1F5F9 100%);
            color: #374151;
            min-height: 3rem;
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .hito-display em {
            color: #6B7280;
            font-style: italic;
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

        .btn-finalizar {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 180px;
        }

        .btn-finalizar:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.35);
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .info-card {
            background: linear-gradient(135deg, #DBEAFE 0%, #EBF8FF 100%);
            border: 1px solid #93C5FD;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.1);
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status-logrado {
            background-color: #D1FAE5;
            color: #065F46;
            border: 1px solid #A7F3D0;
        }

        .status-proceso {
            background-color: #FEF3C7;
            color: #92400E;
            border: 1px solid #FDE68A;
        }

        .status-no-logra {
            background-color: #FEE2E2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }

        .status-pendiente {
            background-color: #F3F4F6;
            color: #4B5563;
            border: 1px solid #D1D5DB;
        }

        /* Estilos para el Modal */
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
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 420px;
            text-align: center;
            border: 1px solid #E5E7EB;
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-icon {
            font-size: 3rem;
            color: #F59E0B;
            margin-bottom: 1.5rem;
            display: block;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1F2937;
        }

        .modal-message {
            font-size: 1rem;
            color: #4B5563;
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .modal-buttons button {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease-in-out;
            min-width: 80px;
        }

        .modal-btn-si {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
        }

        .modal-btn-si:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .modal-btn-no {
            background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);
            box-shadow: 0 2px 8px rgba(107, 114, 128, 0.2);
        }

        .modal-btn-no:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
        }

        .hidden {
            display: none;
        }

        @media (max-width: 640px) {
            .navigation-buttons {
                padding: 1.5rem;
            }

            .btn-navigation, .btn-finalizar {
                min-width: 100px;
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
            }

            .modal-content {
                padding: 2rem;
                margin: 1rem;
            }

            .modal-buttons {
                flex-direction: column;
            }

            .modal-buttons button {
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

    <!-- Header flotante mejorado -->
    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Modificar Evaluación - Hitos Motor Fino
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator bg-green-500 h-2 rounded-full" style="width: 100%;"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionHitoMFinoForm">

                <!-- Información del mes -->
                <div class="text-center mb-8 p-4 bg-white rounded-xl shadow-sm">
                    <p class="text-lg text-gray-700">
                        Evaluación para el mes: <span class="font-bold text-custom-title" id="mesSeleccionadoDisplay">...</span>
                    </p>
                </div>

                <!-- Fecha de evaluación -->
                <div class="mb-8 text-center">
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
                            HITOS DE DESARROLLO (MOTOR FINO)
                        </h1>
                    </div>
                </div>

                <!-- Información sobre los hitos -->
                <div class="info-card mb-8">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-blue-900">
                            Información sobre Hitos de Desarrollo
                        </h3>
                    </div>
                    <p class="text-blue-800 text-sm leading-relaxed">
                        Los hitos mostrados a continuación se basan en las evaluaciones previas de Motor Fino. 
                        Estos representan logros importantes en el desarrollo de la motricidad fina del paciente.
                    </p>
                </div>

                <!-- Grid de hitos -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                    <div class="evaluation-card">
                        <label for="hf_fijacion_ocular_display" class="evaluation-label">
                            Fijación Ocular (FO)
                        </label>
                        <div class="hito-display" id="hf_fijacion_ocular_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hf_fijacion_ocular" id="hf_fijacion_ocular_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hf_cubito_palmar_display" class="evaluation-label">
                            Cubito-Palmar (CP)
                        </label>
                        <div class="hito-display" id="hf_cubito_palmar_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hf_cubito_palmar" id="hf_cubito_palmar_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hf_presion_r_display" class="evaluation-label">
                            Prensión "Rascado" (PR)
                        </label>
                        <div class="hito-display" id="hf_presion_r_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hf_presion_r" id="hf_presion_r_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hf_pinza_inferior_display" class="evaluation-label">
                            Pinza Inferior (PI)
                        </label>
                        <div class="hito-display" id="hf_pinza_inferior_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hf_pinza_inferior" id="hf_pinza_inferior_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hf_pinza_fina_display" class="evaluation-label">
                            Pinza Fina (PF)*
                        </label>
                        <div class="hito-display" id="hf_pinza_fina_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hf_pinza_fina" id="hf_pinza_fina_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hf_abajamiento_voluntario_display" class="evaluation-label">
                            Alojamiento Voluntario (AV)
                        </label>
                        <div class="hito-display" id="hf_abajamiento_voluntario_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hf_abajamiento_voluntario" id="hf_abajamiento_voluntario_value">
                    </div>

                    <div class="evaluation-card md:col-span-2 lg:col-span-1">
                        <label for="hf_coordinacion_oculomanual_display" class="evaluation-label">
                            Coordinación Oculomanual (CO)
                        </label>
                        <div class="hito-display" id="hf_coordinacion_oculomanual_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hf_coordinacion_oculomanual" id="hf_coordinacion_oculomanual_value">
                    </div>

                </div>

                <!-- Botones de navegación -->
                <div class="navigation-buttons">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <a href="/modificarHitosMG" class="btn-navigation">
                            ← ANTERIOR
                        </a>
                        <div class="text-sm text-gray-600 text-center hidden sm:block">
                            Paso 9 de 9 - Finalizar Evaluación
                        </div>
                        <button type="button" id="botonFinalizarEvaluacion" class="btn-finalizar">
                            ✓ FINALIZAR EVALUACIÓN
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- Modal mejorado -->
    <div id="confirmacionModal" class="modal-overlay hidden">
        <div class="modal-content">
            <span class="modal-icon">⚠️</span>
            <h3 class="modal-title">Finalizar Evaluación</h3>
            <p class="modal-message">¿Está seguro que desea finalizar y guardar la evaluación?<br>Esta acción no se puede deshacer.</p>
            <div class="modal-buttons">
                <button id="modalBotonSi" class="modal-btn-si">Sí, Finalizar</button>
                <button id="modalBotonNo" class="modal-btn-no">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKeyThisStep = 'evaluacionPaso9_hitomfino';

            const datosGuardadosEstePaso = sessionStorage.getItem(sessionKeyThisStep);
            let datosJsonEstePaso = {};
            if (datosGuardadosEstePaso) {
                try {
                    datosJsonEstePaso = JSON.parse(datosGuardadosEstePaso);
                } catch (e) {
                    console.error(`Error Paso 9 (Hito M. Fino) al parsear datos guardados:`, e);
                    sessionStorage.removeItem(sessionKeyThisStep);
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
                    console.error("Error Paso 9 (Hito M. Fino): No se pudo parsear JSON de evaluacionPaso1 para el mes.", e);
                }
            } else if (mesDisplay) {
                mesDisplay.textContent = 'No disponible';
            }

            if (dateInput) {
                if (datosJsonEstePaso.fecha_evaluacion) {
                    dateInput.value = datosJsonEstePaso.fecha_evaluacion;
                } else {
                    const datosPaso8Raw = sessionStorage.getItem('evaluacionPaso8_hitomgrueso');
                    if (datosPaso8Raw) {
                        try {
                            const dP8 = JSON.parse(datosPaso8Raw);
                            if (dP8.fecha_evaluacion) dateInput.value = dP8.fecha_evaluacion;
                        } catch (e) {
                            console.error("Error Paso 9 (Hito M. Fino): No se pudo parsear JSON de evaluacionPaso8_hitomgrueso.", e);
                        }
                    }
                    if (!dateInput.value) {
                        const t = new Date();
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`;
                    }
                }
            }

            const form = document.getElementById('evaluacionHitoMFinoForm');
            const datosMfinoRaw = sessionStorage.getItem('evaluacionPaso4_mfino');
            let datosMfino = {};
            if (datosMfinoRaw) {
                try {
                    datosMfino = JSON.parse(datosMfinoRaw);
                } catch (e) {
                    datosMfino = {};
                    console.error("Error Paso 9 (Hito M. Fino): No se pudo parsear JSON de evaluacionPaso4_mfino.", e);
                }
            }
            console.log("Datos de Motor Fino (Paso 4) leídos para Hitos:", datosMfino);

            const resultados_mfino = {
                '0': 'No lo logra (0)',
                '1': 'Lo intenta pero no lo logra (1)',
                '2': 'En proceso (2)',
                '3': 'Lo realiza inhábilmente (3)',
                '4': 'Normal (4)',
                '': 'Aún no se evalúa'
            };

            function setHitoDisplay(baseId, valorNumericoDelCampoAnterior) {
                const displayElement = document.getElementById(baseId + '_display');
                const valueElement = document.getElementById(baseId + '_value');
                let valorAGuardar = '';
                let textoAMostrar = resultados_mfino[''];

                if (valorNumericoDelCampoAnterior && typeof resultados_mfino[String(valorNumericoDelCampoAnterior)] !== 'undefined') {
                    valorAGuardar = String(valorNumericoDelCampoAnterior);
                    textoAMostrar = resultados_mfino[String(valorNumericoDelCampoAnterior)];
                }

                if (displayElement && valueElement) {
                    displayElement.innerHTML = textoAMostrar === 'Aún no se evalúa' ? 
                        '<em>Aún no se evalúa</em>' : textoAMostrar;
                    valueElement.value = valorAGuardar;

                    // Agregar clase de estado visual
                    displayElement.className = 'hito-display';
                    if (valorNumericoDelCampoAnterior === '4') {
                        displayElement.classList.add('status-logrado');
                    } else if (valorNumericoDelCampoAnterior === '2' || valorNumericoDelCampoAnterior === '3') {
                        displayElement.classList.add('status-proceso');
                    } else if (valorNumericoDelCampoAnterior === '0' || valorNumericoDelCampoAnterior === '1') {
                        displayElement.classList.add('status-no-logra');
                    } else {
                        displayElement.classList.add('status-pendiente');
                    }
                }
            }

            const mapeoHitosMF = {
                'hf_fijacion_ocular': datosMfino.mf_manos_linea_media,
                'hf_cubito_palmar': datosMfino.mf_estruja_papel,
                'hf_presion_r': datosMfino.mf_transfiere_manos,
                'hf_pinza_inferior': datosMfino.mf_desarrolla_agarre,
                'hf_pinza_fina': datosMfino.mf_pinza_superior,
                'hf_abajamiento_voluntario': datosMfino.mf_torre_2_cubos,
                'hf_coordinacion_oculomanual': datosMfino.mf_torre_6_cubos
            };

            for (const idHito in mapeoHitosMF) {
                setHitoDisplay(idHito, mapeoHitosMF[idHito]);
            }

            const botonFinalizar = document.getElementById('botonFinalizarEvaluacion');
            const modal = document.getElementById('confirmacionModal');
            const modalBotonSi = document.getElementById('modalBotonSi');
            const modalBotonNo = document.getElementById('modalBotonNo');

            if (botonFinalizar && form && modal && modalBotonSi && modalBotonNo) {
                botonFinalizar.addEventListener('click', function() {
                    const datosPasoActual = {};
                    if (dateInput) datosPasoActual['fecha_evaluacion'] = dateInput.value;

                    const hitoInputs = form.querySelectorAll('input[type="hidden"]');
                    hitoInputs.forEach(input => {
                        const valor = input.value;
                        if (valor !== '' && valor !== 'Aún no se evalúa') {
                            datosPasoActual[input.name] = valor;
                        }
                    });

                    console.log(`Datos guardados en ${sessionKeyThisStep} (Hitos Motor Fino):`, datosPasoActual);
                    try {
                        sessionStorage.setItem(sessionKeyThisStep, JSON.stringify(datosPasoActual));
                    } catch (e) {
                        console.error(`Error guardando datos de ${sessionKeyThisStep} antes de mostrar modal:`, e);
                        alert("Hubo un error al guardar los Hitos de Desarrollo Motor Fino actuales.");
                        return;
                    }
                    modal.classList.remove('hidden');
                });

                modalBotonNo.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });

                modalBotonSi.addEventListener('click', function() {
                    modal.classList.add('hidden');

                    const todosLosDatos = {};
                    const clavesDePasos = [
                        'datosPacienteParaEvaluacion',
                        'evaluacionPaso1',
                        'evaluacionPaso2_mkatona',
                        'evaluacionPaso3_mgrueso',
                        'evaluacionPaso4_mfino',
                        'evaluacionPaso5_lenguaje',
                        'evaluacionPaso6_posturas_tmyu',
                        'evaluacionPaso7_signos_alarma',
                        'evaluacionPaso8_hitomgrueso',
                        sessionKeyThisStep
                    ];

                    console.log("--- INICIO: RECOLECCIÓN DE TODOS LOS DATOS DE LA EVALUACIÓN ---");
                    clavesDePasos.forEach(clave => {
                        const datosGuardados = sessionStorage.getItem(clave);
                        if (datosGuardados) {
                            try {
                                todosLosDatos[clave] = JSON.parse(datosGuardados);
                                console.log(`Datos para ${clave}:`, todosLosDatos[clave]);
                            } catch (e) {
                                console.error(`Error parseando datos para ${clave}:`, e, datosGuardados);
                                todosLosDatos[clave] = {
                                    error: "No se pudieron parsear los datos",
                                    raw: datosGuardados
                                };
                            }
                        } else {
                            console.warn(`No se encontraron datos para ${clave} en sessionStorage.`);
                            todosLosDatos[clave] = null;
                        }
                    });
                    console.log("--- Objeto consolidado con TODOS LOS DATOS DE LA EVALUACIÓN: ---", todosLosDatos);
                    console.log("--- FIN: RECOLECCIÓN DE TODOS LOS DATOS DE LA EVALUACIÓN ---");
                    //aqui poner la coneccion 
                    // Preparar los datos
                    const datosParaEnviar = {
                        DatosPaciente: todosLosDatos.datosPacienteParaEvaluacion,
                        evaluacionPaso2_mkatona: todosLosDatos.evaluacionPaso2_mkatona,
                        evaluacionPaso3_mgrueso: todosLosDatos.evaluacionPaso3_mgrueso,
                        evaluacionPaso4_mfino: todosLosDatos.evaluacionPaso4_mfino,
                        evaluacionPaso5_lenguaje: todosLosDatos.evaluacionPaso5_lenguaje,
                        evaluacionPaso6_posturas_tmyu: todosLosDatos.evaluacionPaso6_posturas_tmyu,
                        evaluacionPaso7_signos_alarma: todosLosDatos.evaluacionPaso7_signos_alarma,
                        evaluacionPaso8_hitomgrueso: todosLosDatos.evaluacionPaso8_hitomgrueso,
                        evaluacionPaso9_hitomfino: todosLosDatos[sessionKeyThisStep]
                    };

                    function enviarDatosEvaluacion(datos) {
                        console.log("Enviando datos de evaluación al servidor...");
                        http = new XMLHttpRequest();
                        http.open("POST", "/realizarModificacion", true);
                        http.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                        http.send(JSON.stringify(datos));
                        http.onreadystatechange = function() {
                            if (http.readyState === 4) {
                                // Mostrar la respuesta completa del servidor
                                console.log("Respuesta completa del servidor:", http.responseText);

                                if (http.status === 200) {
                                    console.log("Datos enviados correctamente.");
                                    //alert("Evaluación modificada exitosamente.");
                                } else {
                                    console.error("Error al enviar los datos:", http.status, http.statusText);
                                    console.error("Respuesta de error:", http.responseText);
                                    //alert("Hubo un error al modificar la evaluación. Por favor, inténtalo de nuevo más tarde.");
                                }
                            }
                        };
                    }

                    enviarDatosEvaluacion(datosParaEnviar);
                    console.log("Datos de evaluación enviados al servidor:", datosParaEnviar);

                    limpiarSessionStorageYRedirigir(clavesDePasos);
                });
            }

            function limpiarSessionStorageYRedirigir(claves) {
                console.log("Limpiando datos de sessionStorage...");
                claves.forEach(clave => {
                    sessionStorage.removeItem(clave);
                    console.log(`Removido: ${clave}`);
                });
                console.log("Limpieza de sessionStorage completada.");
                window.location.href = '/inicio';
            }
        });
    </script>
</body>

</html>