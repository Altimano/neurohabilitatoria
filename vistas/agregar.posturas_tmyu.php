<?php
//para verificacion de la version descomentar
//phpinfo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postura, Tono Muscular y Ubicacion</title>
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
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Postura, Tono Muscular y Ubicacion
            </h3>
            <div class="mt-2 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator w-full"></div> 
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="evaluacionTonoUbicacionForm">
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
                        TONO MUSCULAR Y UBICACIÓN
                    </h1>
                </div>
                <div class="table-container">
                    <div class="overflow-x-auto">
                        <table class="evaluation-table">
                            <thead>
                                <tr>
                                    <th>Tipo de Tono</th>
                                    <th>General</th>
                                    <th>Axial</th>
                                    <th>Extremidades</th>
                                    <th>Miembros Torácicos</th>
                                    <th>Miembros Pélvicos</th>
                                    <th>Hemicuerpo</th>
                                    <th>Contralateral</th>
                                    <th>Derecho</th>
                                    <th>Izquierdo</th>
                                    <th>Normal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hipotonía</td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt1" name="tu_hipotonia[]" value="General"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt2" name="tu_hipotonia[]" value="Axial"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt3" name="tu_hipotonia[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt4" name="tu_hipotonia[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt5" name="tu_hipotonia[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt6" name="tu_hipotonia[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt7" name="tu_hipotonia[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt8" name="tu_hipotonia[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt9" name="tu_hipotonia[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="tu_hipotonia_opt10" name="tu_hipotonia[]" value="Normal"></td>
                                </tr>
                                <tr>
                                    <td>Hipertonía</td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt1" name="tu_hipertonia[]" value="General"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt2" name="tu_hipertonia[]" value="Axial"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt3" name="tu_hipertonia[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt4" name="tu_hipertonia[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt5" name="tu_hipertonia[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt6" name="tu_hipertonia[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt7" name="tu_hipertonia[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt8" name="tu_hipertonia[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt9" name="tu_hipertonia[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="tu_hipertonia_opt10" name="tu_hipertonia[]" value="Normal"></td>
                                </tr>
                                <tr>
                                    <td>Mixto (Hipotonía/Hipertonía)</td>
                                    <td><input type="checkbox" id="tu_mixto_opt1" name="tu_mixto[]" value="General"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt2" name="tu_mixto[]" value="Axial"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt3" name="tu_mixto[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt4" name="tu_mixto[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt5" name="tu_mixto[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt6" name="tu_mixto[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt7" name="tu_mixto[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt8" name="tu_mixto[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt9" name="tu_mixto[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="tu_mixto_opt10" name="tu_mixto[]" value="Normal"></td>
                                </tr>
                                <tr>
                                    <td>Fluctuante</td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt1" name="tu_fluctuante[]" value="General"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt2" name="tu_fluctuante[]" value="Axial"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt3" name="tu_fluctuante[]" value="Extremidades"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt4" name="tu_fluctuante[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt5" name="tu_fluctuante[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt6" name="tu_fluctuante[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt7" name="tu_fluctuante[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt8" name="tu_fluctuante[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt9" name="tu_fluctuante[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="tu_fluctuante_opt10" name="tu_fluctuante[]" value="Normal"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="section-title text-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                        POSTURA
                    </h1>
                </div>
                <div class="table-container">
                    <div class="overflow-x-auto">
                        <table class="evaluation-table">
                            <thead>
                                <tr>
                                    <th>Característica</th>
                                    <th>Axial</th>
                                    <th>Miembros Torácicos</th>
                                    <th>Miembros Pélvicos</th>
                                    <th>Hemicuerpo</th>
                                    <th>Contralateral</th>
                                    <th>Derecho</th>
                                    <th>Izquierdo</th>
                                    <th>Normal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Asimetría</td>
                                    <td><input type="checkbox" id="Asimetria_opt1" name="Asimetria[]" value="Axial"></td>
                                    <td><input type="checkbox" id="Asimetria_opt2" name="Asimetria[]" value="Miembros Torácicos"></td>
                                    <td><input type="checkbox" id="Asimetria_opt3" name="Asimetria[]" value="Miembros Pélvicos"></td>
                                    <td><input type="checkbox" id="Asimetria_opt4" name="Asimetria[]" value="Hemicuerpo"></td>
                                    <td><input type="checkbox" id="Asimetria_opt5" name="Asimetria[]" value="Contralateral"></td>
                                    <td><input type="checkbox" id="Asimetria_opt6" name="Asimetria[]" value="Derecha"></td>
                                    <td><input type="checkbox" id="Asimetria_opt7" name="Asimetria[]" value="Izquierda"></td>
                                    <td><input type="checkbox" id="Asimetria_opt8" name="Asimetria[]" value="Normal"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="navigation-buttons flex flex-col sm:flex-row justify-between items-center gap-4">
                    <a href=<?=base_url("/agregarLenguaje")?> class="btn-navigation">
                        ← ANTERIOR
                    </a>
                    <div class="text-sm text-gray-600 text-center hidden sm:block">
                        Paso 6 de 9 - Postura, Tono Muscular y Ubicacion
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
            const sessionKey = 'evaluacionP6_posturas_tmyu'; // Clave para los datos de Postura, Tono Muscular y Ubicación

            // Recupera el objeto de datos del paciente principal
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

            // Recupera los datos específicos de Postura, Tono Muscular y Ubicación para este paso (si existen)
            const datosTmyuGuardados = sessionStorage.getItem(sessionKey);
            let datosTmyu = {};
            if (datosTmyuGuardados) {
                try {
                    datosTmyu = JSON.parse(datosTmyuGuardados);
                } catch(e) {
                    console.error("Error al cargar datos de Postura TMyU:", e);
                }
            }

            // Establece la fecha de evaluación.
            if (dateInput) {
                if(datosTmyu.fecha_evaluacion) {
                    dateInput.value = datosTmyu.fecha_evaluacion;
                }
                else if (datosPaciente.fecha_inicio_tratamiento) {
                    dateInput.value = datosPaciente.fecha_inicio_tratamiento;
                }
                else {
                    const t = new Date();
                    dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`;
                }
            }

            // Precarga los valores de los checkboxes
            const form = document.getElementById('evaluacionTonoUbicacionForm');
            const checkboxGroupNames = [
                'tu_hipotonia', 'tu_hipertonia', 'tu_mixto', 'tu_fluctuante', 'Asimetria'
            ];

            if(form && Object.keys(datosTmyu).length > 0) { 
                checkboxGroupNames.forEach(groupName => {
                    if (datosTmyu[groupName] && Array.isArray(datosTmyu[groupName])) {
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            checkbox.checked = datosTmyu[groupName].includes(checkbox.value);
                        });
                    } else {
                        const checkboxesInGroup = form.querySelectorAll(`input[name="${groupName}[]"]`);
                        checkboxesInGroup.forEach(checkbox => {
                            checkbox.checked = false;
                        });
                    }
                });
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    // Recopila los datos del formulario (solo los seleccionados de checkboxes)
                    const currentTmyuData = {};
                    if(dateInput) currentTmyuData['fecha_evaluacion'] = dateInput.value;

                    checkboxGroupNames.forEach(groupName => {
                        const checkedBoxes = form.querySelectorAll(`input[name="${groupName}[]"]:checked`);
                        const values = [];
                        checkedBoxes.forEach(checkbox => { values.push(checkbox.value); });
                        currentTmyuData[groupName] = values; 
                    });

                    // Fusiona los datos del paso actual con el objeto principal del paciente
                    datosPaciente.posturas_tmyu = currentTmyuData; 

                    try {
                        // Guarda el objeto datosPaciente (que ahora contiene todo) de nuevo en sessionStorage.
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPaciente));
                        
                        // Guarda los datos específicos de Postura TMyU por separado (opcional).
                        sessionStorage.setItem(sessionKey, JSON.stringify(currentTmyuData)); 

                        // Redirige al siguiente paso de la evaluación.
                        window.location.href = "<?=base_url('/agregarSignos')?>"; 
                    } catch(e) { 
                        console.error("Error al guardar datos en sessionStorage:", e);
                        alert("Hubo un error al guardar los datos de Postura, Tono Muscular y Ubicación."); 
                    }
                });
            }
        });
    </script>
</body>
</html>