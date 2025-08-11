<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitos de Desarrollo Motor Grueso</title>
    <link href="/assets/output.css" rel="stylesheet"/>
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
                Modificar Evaluación - Hitos Motor Grueso
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator bg-blue-500 h-2 rounded-full" style="width: 85%;"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionHitoMGruesoForm">


                <!-- Título de la sección -->
                <div class="text-center mb-8">
                    <div class="inline-block bg-white rounded-2xl px-8 py-4 shadow-lg">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                            HITOS DE DESARROLLO (MOTOR GRUESO)
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
                        Los hitos mostrados a continuación se basan en las evaluaciones previas de Motor Grueso. 
                        Estos representan logros importantes en el desarrollo motor del paciente.
                    </p>
                </div>

                <!-- Grid de hitos -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                    <div class="evaluation-card">
                        <label for="hg_control_cefalico_display" class="evaluation-label">
                            Control Cefálico
                        </label>
                        <div class="hito-display" id="hg_control_cefalico_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hg_control_cefalico" id="hg_control_cefalico_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hg_posicion_sentado_display" class="evaluation-label">
                            Posición de Sentado
                        </label>
                        <div class="hito-display" id="hg_posicion_sentado_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hg_posicion_sentado" id="hg_posicion_sentado_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hg_reacciones_proteccion_display" class="evaluation-label">
                            Reacciones de Protección
                        </label>
                        <div class="hito-display" id="hg_reacciones_proteccion_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hg_reacciones_proteccion" id="hg_reacciones_proteccion_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hg_patron_arrastre_display" class="evaluation-label">
                            Patrón de Arrastre
                        </label>
                        <div class="hito-display" id="hg_patron_arrastre_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hg_patron_arrastre" id="hg_patron_arrastre_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hg_patron_gateo_display" class="evaluation-label">
                            Patrón de Gateo
                        </label>
                        <div class="hito-display" id="hg_patron_gateo_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hg_patron_gateo" id="hg_patron_gateo_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hg_mov_posturales_autonomos_display" class="evaluation-label">
                            Movimientos Posturales Autónomos
                        </label>
                        <div class="hito-display" id="hg_mov_posturales_autonomos_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hg_mov_posturales_autonomos" id="hg_mov_posturales_autonomos_value">
                    </div>

                    <div class="evaluation-card">
                        <label for="hg_patron_marcha_independiente_display" class="evaluation-label">
                            Patrón de Marcha Independiente
                        </label>
                        <div class="hito-display" id="hg_patron_marcha_independiente_display">
                            <em>Cargando...</em>
                        </div>
                        <input type="hidden" name="hg_patron_marcha_independiente" id="hg_patron_marcha_independiente_value">
                    </div>

                </div>

                <!-- Botones de navegación -->
                <div class="navigation-buttons">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <a href="/modificarSignos" class="btn-navigation">
                            ← ANTERIOR
                        </a>
                        <div class="text-sm text-gray-600 text-center hidden sm:block">
                            Paso 8 de 9 - Hitos Motor Grueso
                        </div>
                        <button type="button" id="botonSiguientePaso" class="btn-navigation">
                            SIGUIENTE →
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKeyThisStep = 'evaluacionPaso8_hitomgrueso';

            const datosGuardadosEstePaso = sessionStorage.getItem(sessionKeyThisStep);
            let datosJsonEstePaso = {};
            if (datosGuardadosEstePaso) {
                try {
                    datosJsonEstePaso = JSON.parse(datosGuardadosEstePaso);
                } catch (e) {
                    console.error(`Error Paso 8 (Hito M. Grueso) al parsear datos guardados:`, e);
                    sessionStorage.removeItem(sessionKeyThisStep);
                }
            }

            if (dateInput) {
                if (datosJsonEstePaso.fecha_evaluacion) {
                    dateInput.value = datosJsonEstePaso.fecha_evaluacion;
                } else {
                    const datosPaso7Raw = sessionStorage.getItem('evaluacionPaso7_signos_alarma');
                    if (datosPaso7Raw) {
                        try {
                            const dP7 = JSON.parse(datosPaso7Raw);
                            if (dP7.fecha_evaluacion) dateInput.value = dP7.fecha_evaluacion;
                        } catch (e) {
                            console.error("Error Paso 8 (Hito M. Grueso): No se pudo parsear JSON de evaluacionPaso7_signos_alarma.", e);
                        }
                    }
                    if (!dateInput.value) {
                        const t = new Date();
                        dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`;
                    }
                }
            }

            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');

            const form = document.getElementById('evaluacionHitoMGruesoForm');

            const datosMgruesoRaw = sessionStorage.getItem('evaluacionPaso3_mgrueso');
            let datosMgrueso = {};
            if (datosMgruesoRaw) {
                try {
                    datosMgrueso = JSON.parse(datosMgruesoRaw);
                } catch (e) {
                    datosMgrueso = {};
                    console.error("Error Paso 8 (Hito M. Grueso): No se pudo parsear JSON de evaluacionPaso3_mgrueso.", e);
                }
            }

            const resultados_mgrueso = {
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
                let textoAMostrar = resultados_mgrueso[''];

                if (valorNumericoDelCampoAnterior && typeof resultados_mgrueso[String(valorNumericoDelCampoAnterior)] !== 'undefined') {
                    valorAGuardar = String(valorNumericoDelCampoAnterior);
                    textoAMostrar = resultados_mgrueso[String(valorNumericoDelCampoAnterior)];
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

            const mapeoHitosMG = {
                'hg_control_cefalico': datosMgrueso.mg_control_cefalico,
                'hg_posicion_sentado': datosMgrueso.mg_sentado_sin_apoyo,
                'hg_reacciones_proteccion': datosMgrueso.mg_reaccion_lateral_delantera,
                'hg_patron_arrastre': datosMgrueso.mg_patron_arrastre,
                'hg_patron_gateo': datosMgrueso.mg_patron_gateo_independiente,
                'hg_mov_posturales_autonomos': datosMgrueso.mg_transicion_gateo_bipedestacion,
                'hg_patron_marcha_independiente': datosMgrueso.mg_comienza_patron_marcha
            };

            for (const idHito in mapeoHitosMG) {
                setHitoDisplay(idHito, mapeoHitosMG[idHito]);
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const datosPasoActual = {};
                    if (dateInput) datosPasoActual['fecha_evaluacion'] = dateInput.value;

                    const hitoInputs = form.querySelectorAll('input[type="hidden"]');
                    hitoInputs.forEach(input => {
                        const valor = input.value;
                        if (valor !== '' && valor !== 'Aún no se evalúa') {
                            datosPasoActual[input.name] = valor;
                        }
                    });

                    // FILTRA explícitamente campos vacíos o con "Aún no se evalúa"
                    const camposHitos = [
                        'hg_control_cefalico',
                        'hg_posicion_sentado',
                        'hg_reacciones_proteccion',
                        'hg_patron_arrastre',
                        'hg_patron_gateo',
                        'hg_mov_posturales_autonomos',
                        'hg_patron_marcha_independiente'
                    ];

                    camposHitos.forEach(function(campoId) {
                        const valor = document.getElementById(`${campoId}_value`).value;
                        if (valor !== '' && valor !== 'Aún no se evalúa') {
                            datosPasoActual[campoId] = valor;
                        }
                    });

                    console.log(`Datos guardados en ${sessionKeyThisStep} (Hitos Motor Grueso):`, datosPasoActual);

                    try {
                        sessionStorage.setItem(sessionKeyThisStep, JSON.stringify(datosPasoActual));
                        window.location.href = '/modificarHitosMF';
                    } catch (e) {
                        console.error(`Error guardando datos de ${sessionKeyThisStep}:`, e);
                        alert("Hubo un error al guardar los Hitos de Desarrollo Motor Grueso.");
                    }
                });
            }
        });
    </script>
</body>

</html>