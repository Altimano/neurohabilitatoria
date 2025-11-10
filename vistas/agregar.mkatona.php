<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maniobras Katona</title>
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
        .katona-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            font-size: 0.875rem;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }
        .katona-table th,
        .katona-table td {
            border: 1px solid #E5E7EB;
            padding: 0.75rem 0.5rem;
            text-align: center;
            vertical-align: middle;
            transition: background-color 0.2s ease-in-out;
        }
        .katona-table th {
            background: linear-gradient(135deg, #F8FAFC 0%, #F1F5F9 100%);
            font-weight: 700;
            white-space: normal;
            color: #334155;
            font-size: 0.8rem;
            line-height: 1.3;
        }
        .katona-table td:first-child {
            text-align: left;
            font-weight: 600;
            white-space: normal;
            background: linear-gradient(135deg, #FEFEFE 0%, #F8FAFC 100%);
            color: #1E293B;
            padding-left: 1rem;
        }
        .katona-table tbody tr:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }
        .katona-table input[type="checkbox"] {
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
        .katona-table input[type="checkbox"]:hover {
            transform: scale(1.1);
            border-color: #2563EB;
        }
        .katona-table input[type="checkbox"]:checked {
            background-color: #2563EB;
            border-color: #2563EB;
            transform: scale(1.05);
        }
        .section-title {
            background: white;
            border-radius: 16px;
            padding: 1.5rem 2rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            margin-bottom: 2rem;
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
        .table-container {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            overflow-x: auto;
        }
        .abbreviation-tag {
            background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            margin: 0.125rem;
            display: inline-block;
        }
        @media (max-width: 768px) {
            .katona-table th,
            .katona-table td {
                padding: 0.5rem 0.25rem;
                font-size: 0.75rem;
            }
            .katona-table td:first-child {
                padding-left: 0.5rem;
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
        @media (max-width: 640px) {
            .katona-table {
                font-size: 0.7rem;
            }
            .katona-table th,
            .katona-table td {
                padding: 0.375rem 0.25rem;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Maniobras de Katona
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator w-20"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionKatonaForm">
                <div class="mb-8 text-center">
                    <label for="fecha_evaluacion" class="block text-lg font-semibold text-gray-700 mb-3">
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
                        MANIOBRAS DE KATONA
                    </h1>
                </div>
                <div class="table-container">
                    <div class="overflow-x-auto">
                        <table class="katona-table">
                            <thead>
                                <tr>
                                    <th style="min-width: 200px;">Maniobra</th>
                                    <th>Normal</th>
                                    <th>Hipotonía</th>
                                    <th>Hipertonía</th>
                                    <th>Miembros Torácicos</th>
                                    <th>Miembros Pélvicos</th>
                                    <th>Extremidades</th>
                                    <th>Hemicuerpo</th>
                                    <th>Contralateral</th>
                                    <th>Derecha</th>
                                    <th>Izquierda</th>
                                    <th>Ausente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="mk_elev_tronco_manos_row" value="Elevación de tronco (tracción de manos)">
                                    <td>Elevación de tronco (tracción de manos)</td>
                                    <td><input type="checkbox" id="mk_elev_tronco_manos_N" name="mk_elev_tronco_manos[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_elev_tronco_manos_Hneg" name="mk_elev_tronco_manos[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_elev_tronco_manos_Hpos" name="mk_elev_tronco_manos[]" value="Hipertonía(+)"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="checkbox" id="mk_elev_tronco_manos_A" name="mk_elev_tronco_manos[]" value="Ausente"></td>
                                </tr>

                                <tr id="mk_elev_tronco_espalda_row" value="Elevación de tronco (espalda-cadera)">
                                    <td>Elevación de tronco (espalda-cadera)</td>
                                    <td><input type="checkbox" id="mk_elev_tronco_espalda_N" name="mk_elev_tronco_espalda[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_elev_tronco_espalda_Hip" name="mk_elev_tronco_espalda[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_elev_tronco_espalda_Hiper" name="mk_elev_tronco_espalda[]" value="Hipertonía(+)"></td>
                                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    <td><input type="checkbox" id="mk_elev_tronco_espalda_A" name="mk_elev_tronco_espalda[]" value="Ausente"></td>
                                </tr>

                                <tr id="mk_sentado_aire_row" value="Sentado al aire">
                                    <td>Sentado al aire</td>
                                    <td><input type="checkbox" id="mk_sentado_aire_N" name="mk_sentado_aire[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_sentado_aire_Hneg" name="mk_sentado_aire[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_sentado_aire_Hpos" name="mk_sentado_aire[]" value="Hipertonía(+)"></td>
                                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    <td><input type="checkbox" id="mk_sentado_aire_A" name="mk_sentado_aire[]" value="Ausente"></td>
                                </tr>
                                
                                <tr id="mk_rotacion_izq_der_row" value="Rotación izquierda y derecha">
                                    <td>Rotación izquierda y derecha</td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_N" name="mk_rotacion_izq_der[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_Hneg" name="mk_rotacion_izq_der[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_Hpos" name="mk_rotacion_izq_der[]" value="Hipertonía(+)"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_MTs" name="mk_rotacion_izq_der[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_MP" name="mk_rotacion_izq_der[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_E1" name="mk_rotacion_izq_der[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_H" name="mk_rotacion_izq_der[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_CL" name="mk_rotacion_izq_der[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_D" name="mk_rotacion_izq_der[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_I" name="mk_rotacion_izq_der[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="mk_rotacion_izq_der_A" name="mk_rotacion_izq_der[]" value="Ausente"></td>
                                </tr>

                                <tr>
                                    <td>Gateo asistido</td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_N" name="mk_gateo_asistido[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_Hneg" name="mk_gateo_asistido[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_Hpos" name="mk_gateo_asistido[]" value="Hipertonía(+)"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_MTs" name="mk_gateo_asistido[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_MP" name="mk_gateo_asistido[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_E1" name="mk_gateo_asistido[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_H" name="mk_gateo_asistido[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_CL" name="mk_gateo_asistido[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_D" name="mk_gateo_asistido[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_I" name="mk_gateo_asistido[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_A" name="mk_gateo_asistido[]" value="Ausente"></td>
                                </tr>
                                
                                <tr>
                                    <td>Gateo asistido modificado</td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_mod_N" name="mk_gateo_asistido_mod[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_mod_Hneg" name="mk_gateo_asistido_mod[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_mod_Hpos" name="mk_gateo_asistido_mod[]" value="Hipertonía(+)"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_mod_D" name="mk_gateo_asistido_mod[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_mod_I" name="mk_gateo_asistido_mod[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="mk_gateo_asistido_mod_A" name="mk_gateo_asistido_mod[]" value="Ausente"></td>
                                </tr>

                                <tr>
                                    <td>Arrastre horizontal</td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_N" name="mk_arrastre_horizontal[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_Hneg" name="mk_arrastre_horizontal[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_Hpos" name="mk_arrastre_horizontal[]" value="Hipertonía(+)"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_MTs" name="mk_arrastre_horizontal[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_MP" name="mk_arrastre_horizontal[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_E1" name="mk_arrastre_horizontal[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_H" name="mk_arrastre_horizontal[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_CL" name="mk_arrastre_horizontal[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_D" name="mk_arrastre_horizontal[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_I" name="mk_arrastre_horizontal[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="mk_arrastre_horizontal_A" name="mk_arrastre_horizontal[]" value="Ausente"></td>
                                </tr>
                                
                                <tr>
                                    <td>Marcha en plano horizontal</td>
                                    <td><input type="checkbox" id="mk_marcha_plano_horizontal_N" name="mk_marcha_plano_horizontal[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_horizontal_Hneg" name="mk_marcha_plano_horizontal[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_horizontal_Hpos" name="mk_marcha_plano_horizontal[]" value="Hipertonía(+)"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_horizontal_D" name="mk_marcha_plano_horizontal[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_horizontal_I" name="mk_marcha_plano_horizontal[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_horizontal_A" name="mk_marcha_plano_horizontal[]" value="Ausente"></td>
                                </tr>

                                <tr>
                                    <td>Marcha en plano ascendente</td>
                                    <td><input type="checkbox" id="mk_marcha_plano_ascendente_N" name="mk_marcha_plano_ascendente[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_ascendente_Hneg" name="mk_marcha_plano_ascendente[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_ascendente_Hpos" name="mk_marcha_plano_ascendente[]" value="Hipertonía(+)"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_ascendente_D" name="mk_marcha_plano_ascendente[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_ascendente_I" name="mk_marcha_plano_ascendente[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="mk_marcha_plano_ascendente_A" name="mk_marcha_plano_ascendente[]" value="Ausente"></td>
                                </tr>
                                
                                <tr>
                                    <td>Arrastre en plano inclinado descendente</td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_N" name="mk_arrastre_inclinado_desc[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_Hneg" name="mk_arrastre_inclinado_desc[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_Hpos" name="mk_arrastre_inclinado_desc[]" value="Hipertonía(+)"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_MTs" name="mk_arrastre_inclinado_desc[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_MP" name="mk_arrastre_inclinado_desc[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_E1" name="mk_arrastre_inclinado_desc[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_H" name="mk_arrastre_inclinado_desc[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_CL" name="mk_arrastre_inclinado_desc[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_D" name="mk_arrastre_inclinado_desc[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_I" name="mk_arrastre_inclinado_desc[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_desc_A" name="mk_arrastre_inclinado_desc[]" value="Ausente"></td>
                                </tr>

                                <tr>
                                    <td>Arrastre en plano inclinado ascendente</td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_N" name="mk_arrastre_inclinado_asc[]" value="Normal"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_Hneg" name="mk_arrastre_inclinado_asc[]" value="Hipotonía(-)"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_Hpos" name="mk_arrastre_inclinado_asc[]" value="Hipertonía(+)"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_MTs" name="mk_arrastre_inclinado_asc[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_MP" name="mk_arrastre_inclinado_asc[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_E1" name="mk_arrastre_inclinado_asc[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_H" name="mk_arrastre_inclinado_asc[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_CL" name="mk_arrastre_inclinado_asc[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_D" name="mk_arrastre_inclinado_asc[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_I" name="mk_arrastre_inclinado_asc[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="mk_arrastre_inclinado_asc_A" name="mk_arrastre_inclinado_asc[]" value="Ausente"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="navigation-buttons flex flex-col sm:flex-row justify-between items-center gap-4">
                        <a href=<?=base_url("/agregar")?> class="btn-navigation">
                            ← ANTERIOR
                        </a>
                        <div class="text-sm text-gray-600 text-center hidden sm:block">
                            Paso 2 de 9 - Maniobras Katona
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
            const sessionKey = 'evaluacionP2_mkatona'; // Clave para los datos de Katona en sessionStorage

            // Recupera los datos del paciente (Paso 1) del sessionStorage.
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

            // Recupera los datos específicos de Katona del sessionStorage.
            const datosKatonaGuardados = sessionStorage.getItem(sessionKey);
            let datosKatona = {};
            if (datosKatonaGuardados) { 
                try { 
                    datosKatona = JSON.parse(datosKatonaGuardados); 
                } catch(e) { 
                    console.error("Error al cargar datos de Katona:", e);
                }
            }
            
            // Establece la fecha de evaluación.
            if (dateInput) {
                if(datosKatona.fecha_evaluacion) { 
                    dateInput.value = datosKatona.fecha_evaluacion; 
                } else if(datosPaciente.fecha_inicio_tratamiento) {
                    dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                } else { 
                    const t = new Date(); 
                    dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; 
                }
                //Debug 
                console.log('DEBUG: Fecha de evaluación cargada desde sessionStorage:', datosPaciente.fecha_inicio_tratamiento);
                console.log('DEBUG: Fecha Nacimiento Corregida cargada desde sessionStorage:', datosPaciente.fecha_nacimiento_corregida_display);
                console.log('DEBUG: Fecha Nacimiento Corregida (Semanas) cargada desde sessionStorage:', datosPaciente.edad_corregida_display);
            }

            // Define los nombres de los grupos de checkboxes para las maniobras de Katona.
            const form = document.getElementById('evaluacionKatonaForm');
            const checkboxGroupsNames = [
                'mk_elev_tronco_manos', 'mk_elev_tronco_espalda', 'mk_sentado_aire',
                'mk_rotacion_izq_der', 'mk_gateo_asistido', 'mk_gateo_asistido_mod',
                'mk_arrastre_horizontal', 'mk_marcha_plano_horizontal', 'mk_marcha_plano_ascendente',
                'mk_arrastre_inclinado_desc', 'mk_arrastre_inclinado_asc'
            ];

            // Marcar o desmarcar los checkboxes del formulario con datos previamente guardados.
            if(form && Object.keys(datosKatona).length > 0) { 
                checkboxGroupsNames.forEach(groupName => {
                    if (datosKatona[groupName] && Array.isArray(datosKatona[groupName])) {
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            checkbox.checked = datosKatona[groupName].includes(checkbox.value);
                        });
                    } else {
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            checkbox.checked = false;
                        });
                    }
                });
            }

            // Configura el evento click para el botón "Siguiente".
            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // Recopila los datos de las maniobras de Katona del formulario.
                    const currentKatonaData = {};
                    if (dateInput) currentKatonaData['fecha_evaluacion'] = dateInput.value;
                    
                    checkboxGroupsNames.forEach(groupName => {
                        const checkedBoxes = form.querySelectorAll(`input[name="${groupName}[]"]:checked`);
                        const values = [];
                        checkedBoxes.forEach(checkbox => { values.push(checkbox.value); });
                        currentKatonaData[groupName] = values;
                    });

                    // Fusiona los datos del paciente con los datos de Katona.
                    Object.assign(datosPaciente, { katona: currentKatonaData }); 

                    try {
                        // Guarda los datos actualizados del paciente en sessionStorage.
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        // Guarda los datos específicos de Katona por separado (opcional).
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentKatonaData)); 
                        
                        // Redirige al siguiente paso de la evaluación.
                        window.location.href = "<?=base_url('/agregarGrueso')?>"; 
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage:", e);
                        alert("Hubo un error al guardar los datos de Katona."); 
                    }
                });
            }
        });
    </script>
</body>
</html>