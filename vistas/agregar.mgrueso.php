<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Grueso</title>
    <link href=<?=base_url("/assets/output.css")?> rel="stylesheet"/>
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
                Motor Grueso
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator w-1/2"></div> 
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionMotorGruesoForm">
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
                        MOTOR GRUESO / MOVIMIENTOS POSTURALES
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
                        <label for="control_cefalico" class="evaluation-label required">
                            Control cefálico
                        </label>
                        <div class="select-wrapper">
                            <select name="control_cefalico" id="control_cefalico" class="select-custom">
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
                        <label for="levanta_torax" class="evaluation-label">
                            Sobre el abdomen levanta tórax apoyando brazos
                        </label>
                        <div class="select-wrapper">
                            <select name="levanta_torax" id="levanta_torax" class="select-custom">
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
                       <label for="reaccion_delantera" class="evaluation-label">
                           Sentado con reacción de protección delantera
                       </label>
                       <div class="select-wrapper">
                           <select name="reaccion_delantera" id="reaccion_delantera" class="select-custom">
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
                        <label for="cambio_decubito_prono_supino" class="evaluation-label">
                            Cambio de decúbito prono a decúbito supino
                        </label>
                        <div class="select-wrapper">
                            <select name="cambio_decubito_prono_supino" id="cambio_decubito_prono_supino" class="select-custom">
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
                        <label for="sentado_sin_apoyo" class="evaluation-label required">
                            Sentado sin apoyo
                        </label>
                        <div class="select-wrapper">
                            <select name="sentado_sin_apoyo" id="sentado_sin_apoyo" class="select-custom">
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
                        <label for="reaccion_lateral_delantera" class="evaluation-label required">
                            Reacciones de protección laterales y delanteras
                        </label>
                        <div class="select-wrapper">
                            <select name="reaccion_lateral_delantera" id="reaccion_lateral_delantera" class="select-custom">
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
                        <label for="cambio_posicion_sedente_prono" class="evaluation-label">
                            Cambio de posición sedente a decúbito prono
                        </label>
                        <div class="select-wrapper">
                            <select name="cambio_posicion_sedente_prono" id="cambio_posicion_sedente_prono" class="select-custom">
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
                        <label for="patron_arrastre" class="evaluation-label required">
                            Patrón de arrastre
                        </label>
                        <div class="select-wrapper">
                            <select name="patron_arrastre" id="patron_arrastre" class="select-custom">
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
                        <label for="cambio_posicion_cuatro_hincado" class="evaluation-label">
                            Cambio de posición cuatro puntos a hincado
                        </label>
                        <div class="select-wrapper">
                            <select name="cambio_posicion_cuatro_hincado" id="cambio_posicion_cuatro_hincado" class="select-custom">
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
                       <label for="patron_gateo_independiente" class="evaluation-label required">
                           Patrón de gateo independiente
                       </label>
                       <div class="select-wrapper">
                           <select name="patron_gateo_independiente" id="patron_gateo_independiente" class="select-custom">
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
                       <label for="gateo_niveles" class="evaluation-label">
                           Gateo en diferentes niveles (colchón, planos, etc.)
                       </label>
                       <div class="select-wrapper">
                           <select name="gateo_niveles" id="gateo_niveles" class="select-custom">
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
                       <label for="transicion_gateo_bipedestacion" class="evaluation-label required">
                           Transición gateo a bipedestación
                       </label>
                       <div class="select-wrapper">
                           <select name="transicion_gateo_bipedestacion" id="transicion_gateo_bipedestacion" class="select-custom">
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
                       <label for="comienza_patron_marcha" class="evaluation-label required">
                           Comienza el patrón de marcha
                       </label>
                       <div class="select-wrapper">
                           <select name="comienza_patron_marcha" id="comienza_patron_marcha" class="select-custom">
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
                       <label for="pone_pie_sin_apoyo" class="evaluation-label">
                           Se pone de pie momentáneamente sin apoyarse
                       </label>
                       <div class="select-wrapper">
                           <select name="pone_pie_sin_apoyo" id="pone_pie_sin_apoyo" class="select-custom">
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
                       <label for="camina_atras" class="evaluation-label">
                           Camina hacia atrás
                       </label>
                       <div class="select-wrapper">
                           <select name="camina_atras" id="camina_atras" class="select-custom">
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
                       <label for="camina_solo_cae_frecuencia" class="evaluation-label">
                           Camina solo (cae frecuentemente)
                       </label>
                       <div class="select-wrapper">
                           <select name="camina_solo_cae_frecuencia" id="camina_solo_cae_frecuencia" class="select-custom">
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
                       <label for="Sube_escaleras_apoyo_manos" class="evaluation-label">
                           Sube escaleras apoyándose en ambas manos
                       </label>
                       <div class="select-wrapper">
                           <select name="Sube_escaleras_apoyo_manos" id="Sube_escaleras_apoyo_manos" class="select-custom">
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
                       <label for="patea_pelota" class="evaluation-label">
                           Patea una pelota
                       </label>
                       <div class="select-wrapper">
                           <select name="patea_pelota" id="patea_pelota" class="select-custom">
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
                       <label for="sube_escaleras_gateando" class="evaluation-label">
                           Sube escaleras gateando
                       </label>
                       <div class="select-wrapper">
                           <select name="sube_escaleras_gateando" id="sube_escaleras_gateando" class="select-custom">
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
                       <label for="corre_rigidez" class="evaluation-label">
                           Corre (con rigidez)
                       </label>
                       <div class="select-wrapper">
                           <select name="corre_rigidez" id="corre_rigidez" class="select-custom">
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
                       <label for="camina_solo_cae_raravez" class="evaluation-label">
                           Camina solo (cae rara vez)
                       </label>
                       <div class="select-wrapper">
                           <select name="camina_solo_cae_raravez" id="camina_solo_cae_raravez" class="select-custom">
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
                       <label for="sube_baja_escaleras" class="evaluation-label">
                           Sube y baja escaleras sostenido de una mano
                       </label>
                       <div class="select-wrapper">
                           <select name="sube_baja_escaleras" id="sube_baja_escaleras" class="select-custom">
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
                       <label for="lanza_pelota" class="evaluation-label">
                           Lanza la pelota
                       </label>
                       <div class="select-wrapper">
                           <select name="lanza_pelota" id="lanza_pelota" class="select-custom">
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
                       <label for="salta_sitio" class="evaluation-label">
                           Salta en el sitio
                       </label>
                       <div class="select-wrapper">
                           <select name="salta_sitio" id="salta_sitio" class="select-custom">
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
                       <label for="juega_cuclillas" class="evaluation-label">
                           Juega en Cuclillas
                       </label>
                       <div class="select-wrapper">
                           <select name="juega_cuclillas" id="juega_cuclillas" class="select-custom">
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
                    <a href=<?=base_url("/agregarKatona")?> class="btn-navigation">
                        ← ANTERIOR
                    </a>
                    <div class="text-sm text-gray-600 text-center hidden sm:block">
                        Paso 3 de 9 - Motor Grueso
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
            const sessionKey = 'evaluacionP3_mgrueso'; // Clave para los datos de Motor Grueso en sessionStorage

            // Recupera los datos del paciente principal
            const datosPacienteRaw = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let datosPaciente = {};
            if (datosPacienteRaw) {
                try {
                    datosPaciente = JSON.parse(datosPacienteRaw);
                } catch (e) {
                    console.error("Error al cargar datos del paciente:", e);
                    window.location.href = "<?=base_url('agregar.view.php?error=datos_corruptos')?>"; 
                    return;
                }
            } else {
                console.error("No se encontraron datos del paciente. Redirigiendo...");
                window.location.href = "<?=base_url('agregar.view.php?error=datos_faltantes')?>"; 
                return;
            }

            // Recupera los datos específicos de Motor Grueso para este paso (si existen)
            const datosMgresoGuardados = sessionStorage.getItem(sessionKey);
            let datosMgreso = {};
            if (datosMgresoGuardados) { 
                try { 
                    datosMgreso = JSON.parse(datosMgresoGuardados); 
                } catch(e) { 
                    console.error("Error al cargar datos de Motor Grueso:", e);
                }
            }

            // Establece la fecha de evaluación.
            if (dateInput) {
                if(datosMgreso.fecha_evaluacion) { 
                    dateInput.value = datosMgreso.fecha_evaluacion; 
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
            const form = document.getElementById('evaluacionMotorGruesoForm');
            if(form && Object.keys(datosMgreso).length > 0) { 
                const selects = form.querySelectorAll('select');
                selects.forEach(select => { 
                    if(datosMgreso[select.name] !== undefined) { 
                        select.value = datosMgreso[select.name]; 
                    } else {
                        select.value = ""; 
                    }
                });
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // Recopila los datos del formulario de Motor Grueso.
                    const currentMotorGruesoData = {};
                    
                    // Incluye la fecha de evaluación del formulario.
                    if(dateInput) currentMotorGruesoData['fecha_evaluacion'] = dateInput.value;

                    // Itera sobre todos los selects y guarda sus valores si es que su informacion no es NULL.
                    const allSelects = form.querySelectorAll('select');
                    allSelects.forEach(select => {
                        if(select.value !== ""){
                            currentMotorGruesoData[select.name] = select.value;
                        }
                    });
                    
                    // Fusiona los datos del paso actual con el objeto principal del paciente.
                    datosPaciente.mgrueso = currentMotorGruesoData; 

                    try {
                        // Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage.
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // Guarda los datos específicos de Motor Grueso por separado (opcional).
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentMotorGruesoData)); 

                        // Redirige al siguiente paso de la evaluación.
                        window.location.href = "<?=base_url('/agregarFino')?>"; 
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage:", e);
                        alert("Hubo un error al guardar los datos de Motor Grueso."); 
                    }
                });
            }
        });
    </script>
</body>
</html>