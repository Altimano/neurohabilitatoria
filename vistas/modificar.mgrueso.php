<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Grueso</title>
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

        .evaluation-label.required::after {
            content: " *";
            color: #DC2626;
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
                Modificar Evaluación - Motor Grueso
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator bg-blue-500 h-2 rounded-full" style="width: 33%;"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionMotorGruesoForm">



                <!-- Título de la sección -->
                <div class="text-center mb-8">
                    <div class="inline-block bg-white rounded-2xl px-8 py-4 shadow-lg">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                            MOTOR GRUESO/MOVIMIENTOS POSTURALES
                        </h1>
                    </div>
                </div>

                <!-- Leyenda de puntuación -->
                <div class="scale-legend rounded-xl p-6 mb-8">
                    <h2 class="text-lg font-bold text-gray-800 mb-3 text-center">
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

                <!-- Grid de evaluaciones -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                    <div class="subescala evaluation-card">
                        <label for="mg_control_cefalico" class="evaluation-label required">
                            Control cefálico
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_control_cefalico"
                                id="mg_control_cefalico"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_levanta_torax" class="evaluation-label">
                            Sobre el abdomen levanta tórax apoyando brazos
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_levanta_torax"
                                id="mg_levanta_torax"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_reaccion_delantera" class="evaluation-label">
                            Sentado con reacción de protección delantera
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_reaccion_delantera"
                                id="mg_reaccion_delantera"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_cambio_decubito_prono_supino" class="evaluation-label">
                            Cambio de decúbito prono a decúbito supino
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_cambio_decubito_prono_supino"
                                id="mg_cambio_decubito_prono_supino"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_sentado_sin_apoyo" class="evaluation-label required">
                            Sentado sin apoyo
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_sentado_sin_apoyo"
                                id="mg_sentado_sin_apoyo"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_reaccion_lateral_delantera" class="evaluation-label required">
                            Reacciones de protección laterales y delanteras
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_reaccion_lateral_delantera"
                                id="mg_reaccion_lateral_delantera"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_cambio_posicion_sedente_prono" class="evaluation-label">
                            Cambio de posición sedente a decúbito prono
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_cambio_posicion_sedente_prono"
                                id="mg_cambio_posicion_sedente_prono"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_patron_arrastre" class="evaluation-label required">
                            Patrón de arrastre
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_patron_arrastre"
                                id="mg_patron_arrastre"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_cambio_posicion_cuatro_hincado" class="evaluation-label">
                            Cambio de posición cuatro puntos a hincado
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_cambio_posicion_cuatro_hincado"
                                id="mg_cambio_posicion_cuatro_hincado"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_patron_gateo_independiente" class="evaluation-label required">
                            Patrón de gateo independiente
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_patron_gateo_independiente"
                                id="mg_patron_gateo_independiente"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_gateo_niveles" class="evaluation-label">
                            Gateo en diferentes niveles (colchón, planos, etc.)
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_gateo_niveles"
                                id="mg_gateo_niveles"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_transicion_gateo_bipedestacion" class="evaluation-label required">
                            Transición gateo a bipedestación
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_transicion_gateo_bipedestacion"
                                id="mg_transicion_gateo_bipedestacion"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_comienza_patron_marcha" class="evaluation-label required">
                            Comienza el patrón de marcha
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_comienza_patron_marcha"
                                id="mg_comienza_patron_marcha"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_pone_pie_sin_apoyo" class="evaluation-label">
                            Se pone de pie momentáneamente sin apoyarse
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_pone_pie_sin_apoyo"
                                id="mg_pone_pie_sin_apoyo"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_camina_atras" class="evaluation-label">
                            Camina hacia atrás
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_camina_atras"
                                id="mg_camina_atras"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_camina_solo" class="evaluation-label">
                            Camina solo (cae frecuentemente)
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_camina_solo"
                                id="mg_camina_solo"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_sube_escaleras_apoyo_manos" class="evaluation-label">
                            Sube escaleras apoyándose en ambas manos
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_sube_escaleras_apoyo_manos"
                                id="mg_sube_escaleras_apoyo_manos"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_patea_pelota" class="evaluation-label">
                            Patea una pelota
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_patea_pelota"
                                id="mg_patea_pelota"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_sube_escaleras_gateando" class="evaluation-label">
                            Sube escaleras gateando
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_sube_escaleras_gateando"
                                id="mg_sube_escaleras_gateando"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_corre_rigidez" class="evaluation-label">
                            Corre (con rigidez)
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_corre_rigidez"
                                id="mg_corre_rigidez"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_camina_solo_rara" class="evaluation-label">
                            Camina solo (cae rara vez)
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_camina_solo_rara"
                                id="mg_camina_solo_rara"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_sube_baja_escaleras" class="evaluation-label">
                            Sube y baja escaleras sostenido de una mano
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_sube_baja_escaleras"
                                id="mg_sube_baja_escaleras"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_lanza_pelota" class="evaluation-label">
                            Lanza la pelota
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_lanza_pelota"
                                id="mg_lanza_pelota"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_salta_sitio" class="evaluation-label">
                            Salta en el sitio
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_salta_sitio"
                                id="mg_salta_sitio"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <label for="mg_juega_cuclillas" class="evaluation-label">
                            Juega en Cuclillas
                        </label>
                        <div class="select-wrapper">
                            <select name="mg_juega_cuclillas"
                                id="mg_juega_cuclillas"
                                class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                    <div class="navigation-buttons">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <a href="/modificarKatona" class="btn-navigation">
                                ← ANTERIOR
                            </a>
                            <div class="text-sm text-gray-600 text-center hidden sm:block">
                                Paso 3 de 9 - Motor Grueso
                            </div>
                            <button type="button" id="botonSiguientePaso" class="btn-navigation">
                                SIGUIENTE →
                            </button>
                        </div>
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

                const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');

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