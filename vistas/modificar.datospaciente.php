<!-- Pagina de modificacion de los datos del paciente -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Evaluación</title>
    <link href=<?=base_url("/assets/output.css")?> rel="stylesheet" />
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

        .form-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            transition: all 0.2s ease-in-out;
        }

        .form-section:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .form-field {
            background: white;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            transition: all 0.2s ease-in-out;
            font-size: 0.95rem;
        }

        .form-field:focus {
            outline: none;
            border-color: #0284C7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
            transform: translateY(-1px);
        }

        .form-field:hover:not([readonly]) {
            border-color: #0284C7;
            background-color: #F8FAFC;
        }

        .form-field[readonly] {
            background-color: #F9FAFB;
            border-color: #D1D5DB;
            color: #6B7280;
            cursor: not-allowed;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.9rem;
            letter-spacing: 0.025em;
        }

        .select-wrapper {
            position: relative;
        }

        .select-custom {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 1rem center;
            background-repeat: no-repeat;
            background-size: 1.25em 1.25em;
            padding-right: 3rem;
        }

        .section-divider {
            background: linear-gradient(90deg, transparent 0%, #D1D5DB 50%, transparent 100%);
            height: 2px;
            margin: 2rem 0;
            border-radius: 1px;
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

        .month-selector-section {
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            border-left: 4px solid #F59E0B;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .patient-data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-section {
                padding: 1.5rem;
            }

            .patient-data-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .navigation-buttons {
                padding: 1.5rem;
            }

            .btn-navigation {
                min-width: 100px;
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        .info-banner {
            background: linear-gradient(135deg, #DBEAFE 0%, #BFDBFE 100%);
            border: 1px solid #93C5FD;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .textarea-field {
            min-height: 120px;
            resize: vertical;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

    <!-- Header flotante mejorado -->
    <div class="floating-header sticky top-0 z-10 py-4 mb-6">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-custom-title text-center">
                Modificar Evaluación - Datos del Paciente
            </h3>
            <div class="mt-3 max-w-md mx-auto bg-gray-200 rounded-full h-2">
                <div class="progress-indicator bg-blue-500 h-2 rounded-full" style="width: 11%;"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">
        <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
            <form id="formPaso1">


                <!-- Sección de datos del paciente -->
                <div class="form-section">
                    <div class="text-center mb-8">
                        <div class="inline-block bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-2xl px-8 py-4 shadow-lg">
                            <h1 class="text-2xl md:text-3xl font-bold">
                                DATOS DEL PACIENTE
                            </h1>
                        </div>
                    </div>

                    <!-- Grid de campos del paciente -->
                    <!--No todos los datos del paciente se pueden modificar, solo se modifican los datos pertinentes a terapia neurohabilitatoria-->
                    <div class="patient-data-grid">
                        <div>
                            <label class="form-label">Nombre Paciente</label>
                            <input type="text" id="dp_nombre_paciente" name="nombre_paciente_display" value="<?= htmlspecialchars($datosPaciente['nombre_paciente']) ?>" class="form-field w-full" readonly>
                        </div>

                        <div>
                            <label class="form-label">Clave Paciente</label>
                            <input type="text" id="dp_clave_paciente" name="clave_paciente_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['clave_paciente']) ? $datos_paciente_para_mostrar['clave_paciente'] : ''); ?>" class="form-field w-full" readonly>
                        </div>

                        <div>
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" id="dp_fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_nacimiento']) ? $datos_paciente_para_mostrar['fecha_nacimiento'] : ''); ?>" class="form-field w-full" readonly>
                        </div>

                        <div>
                            <label class="form-label">Semanas de Gestación (SDG)</label>
                            <input type="text" id="dp_sdg" name="sdg" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['sdg']) ? $datos_paciente_para_mostrar['sdg'] : ''); ?>" class="form-field w-full" readonly>
                        </div>

                        <div>
                            <label class="form-label"> Talla</label>
                            <input type="text" id="dp_talla" name="talla" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['talla']) ? $datos_paciente_para_mostrar['talla'] : ''); ?>" class="form-field w-full">
                        </div>

                        <div>
                            <label class="form-label"> Peso</label>
                            <input type="text" id="dp_peso" name="peso" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['peso']) ? $datos_paciente_para_mostrar['peso'] : ''); ?>" class="form-field w-full">
                        </div>

                        <div>
                            <label class="form-label"> Perímetro Cefálico</label>
                            <input type="text" id="dp_perimetro_cefalico" name="perimetro_cefalico" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['perimetro_cefalico']) ? $datos_paciente_para_mostrar['perimetro_cefalico'] : ''); ?>" class="form-field w-full">
                        </div>
                        
                        <div>
                            <label class="form-label"> Fecha de Evaluación</label>
                            <input type="date"
                                id="dp_fecha_inicio_tratamiento"
                                value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_terapia']) ? $datos_paciente_para_mostrar['fecha_terapia'] : ''); ?>"
                                class="form-field w-full"
                                >
                        </div>

                        <div>
                            <label class="form-label"> Edad Cronológica</label>
                            <input type="text" id="dp_edad_cronologica_ingreso_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['edad_cronologica_ingreso_display']) ? $datos_paciente_para_mostrar['edad_cronologica_ingreso_display'] : ''); ?>" class="form-field w-full" readonly>
                        </div>

                        <div>
                            <label class="form-label">Fecha Nacimiento Corregida</label>
                            <input type="text" id="dp_edad_corregida_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['edad_corregida_display']) ? $datos_paciente_para_mostrar['edad_corregida_display'] : ''); ?>" class="form-field w-full" readonly>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <!-- Factores de riesgo -->
                    <div>
                        <label for="factores_riesgo" class="form-label text-lg mb-3">
                            Factores de Riesgo
                        </label>
                        <textarea id="factores_riesgo" name="factores_riesgo" rows="4" class="form-field textarea-field w-full" placeholder="Describir los factores de riesgo relevantes..."><?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['factores_de_riesgo']) ? $datos_paciente_para_mostrar['factores_de_riesgo'] : ''); ?></textarea>
                    </div>

                    <div class="section-divider"></div>

                    <div>
                        <label for="observaciones" class="form-label text-lg mb-3">
                            Observaciones
                        </label>
                        <textarea id="observaciones" name="observaciones" rows="4" class="form-field textarea-field w-full" placeholder="Añadir observaciones..."><?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['observaciones']) ? $datos_paciente_para_mostrar['observaciones'] : ''); ?></textarea>
                    </div>


                </div>

                <!-- Botones de navegación -->
                <div class="navigation-buttons">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <a href=<?=base_url("/modificar")?> class="btn-navigation">
                            ← ANTERIOR
                        </a>
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
            const formPaso1 = document.getElementById('formPaso1');
            if (!formPaso1) return;

            // --- INICIO DE MODIFICACIONES ---

            /**
             * Calcula la diferencia entre dos fechas y la devuelve en formato "X A, Y M, Z D".
             * @param {string} fechaMayorStr - La fecha más reciente en formato YYYY-MM-DD.
             * @param {string} fechaMenorStr - La fecha más antigua en formato YYYY-MM-DD.
             * @returns {string} - La edad formateada.
             */
            function calcularEdadAniosMesesDias(fechaMayorStr, fechaMenorStr) {
                if (!fechaMayorStr || !fechaMenorStr) return 'N/A';
                const fechaMayor = new Date(fechaMayorStr + 'T00:00:00');
                const fechaMenor = new Date(fechaMenorStr + 'T00:00:00');
                if (isNaN(fechaMayor.getTime()) || isNaN(fechaMenor.getTime())) return 'Fechas inválidas';

                let anios = fechaMayor.getFullYear() - fechaMenor.getFullYear();
                let meses = fechaMayor.getMonth() - fechaMenor.getMonth();
                let dias = fechaMayor.getDate() - fechaMenor.getDate();

                if (dias < 0) {
                    meses--;
                    const ultimoDiaMesAnterior = new Date(fechaMayor.getFullYear(), fechaMayor.getMonth(), 0).getDate();
                    dias += ultimoDiaMesAnterior;
                }
                if (meses < 0) {
                    anios--;
                    meses += 12;
                }
                return `${anios} A, ${meses} M, ${dias} D`;
            }

            /**
             * Calcula la edad corregida y devuelve solo el número de semanas.
             * @param {string} fechaEvaluacionStr - La fecha actual de evaluación.
             * @param {string} fechaNacimientoStr - La fecha de nacimiento real.
             * @param {number} semanasGestacion - Las semanas de gestación.
             * @returns {string} - El número total de semanas corregidas.
             */
            function calcularEdadCorregidaSemanas(fechaEvaluacionStr, fechaNacimientoStr, semanasGestacion) {
                if (!fechaEvaluacionStr || !fechaNacimientoStr || isNaN(semanasGestacion)) return 'N/A';

                const fechaEvaluacion = new Date(fechaEvaluacionStr + 'T00:00:00');
                const fechaNacimiento = new Date(fechaNacimientoStr + 'T00:00:00');
                if (isNaN(fechaEvaluacion.getTime()) || isNaN(fechaNacimiento.getTime())) return 'Fechas inválidas';

                const semanasFaltantes = 40 - semanasGestacion;
                let diasTotales;

                if (semanasFaltantes <= 0) {
                    const diffMilisegundos = fechaEvaluacion.getTime() - fechaNacimiento.getTime();
                    diasTotales = Math.floor(diffMilisegundos / (1000 * 60 * 60 * 24));
                } else {
                    const diasAjuste = semanasFaltantes * 7;
                    const fechaNacimientoCorregida = new Date(fechaNacimiento);
                    fechaNacimientoCorregida.setDate(fechaNacimiento.getDate() + diasAjuste);

                    const diffMilisegundosCorregida = fechaEvaluacion.getTime() - fechaNacimientoCorregida.getTime();
                    if (diffMilisegundosCorregida < 0) return '0';
                    diasTotales = Math.floor(diffMilisegundosCorregida / (1000 * 60 * 60 * 24));
                }
                
                if (diasTotales < 0) return '0';

                const semanas = Math.floor(diasTotales / 7);
                return semanas.toString();
            }

            /**
             * Función principal para actualizar los campos de edad en el formulario.
             */
            function actualizarEdadesCalculadas() {
                const fechaEvaluacion = document.getElementById('dp_fecha_inicio_tratamiento').value;
                const fechaNacimiento = document.getElementById('dp_fecha_nacimiento').value;
                const sdg = parseInt(document.getElementById('dp_sdg').value, 10);

                if (fechaEvaluacion && fechaNacimiento) {
                    const edadCronologica = calcularEdadAniosMesesDias(fechaEvaluacion, fechaNacimiento);
                    document.getElementById('dp_edad_cronologica_ingreso_display').value = edadCronologica;
                }

                if (fechaEvaluacion && fechaNacimiento && !isNaN(sdg)) {
                    const edadCorregida = calcularEdadCorregidaSemanas(fechaEvaluacion, fechaNacimiento, sdg);
                    document.getElementById('dp_edad_corregida_display').value = edadCorregida;
                }
            }
            
            // --- FIN DE MODIFICACIONES ---

            function limpiarDatosPasosEvaluacion() {
                const clavesPasos = [
                    'evaluacionPaso1', 'evaluacionPaso2_mkatona', 'evaluacionPaso3_mgrueso',
                    'evaluacionPaso4_mfino', 'evaluacionPaso5_tmyubicacion',
                    'evaluacionPaso6_posturaysignos', 'evaluacionPaso7_hitomgrueso',
                    'evaluacionPaso8_hitomfino'
                ];
                clavesPasos.forEach(clave => sessionStorage.removeItem(clave));
            }

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar)): ?>
                limpiarDatosPasosEvaluacion();
                try {
                    const datosPacienteActualesPHP = <?php echo json_encode($datos_paciente_para_mostrar); ?>;
                    sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPacienteActualesPHP));
                } catch (e) {
                    console.error("Error JS PHP block: guardar datos Paciente:", e);
                }
            <?php endif; ?>

            const datosPacienteGuardados = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let esPrimeraEvaluacionJS = false;
            let pacienteDataParaActualizar = {};

            if (datosPacienteGuardados) {
                try {
                    pacienteDataParaActualizar = JSON.parse(datosPacienteGuardados);
                    esPrimeraEvaluacionJS = pacienteDataParaActualizar.esPrimeraEvaluacion || false;

                    document.getElementById('dp_nombre_paciente').value = pacienteDataParaActualizar.nombre_paciente || '';
                    document.getElementById('dp_clave_paciente').value = pacienteDataParaActualizar.clave_paciente || '';
                    document.getElementById('dp_fecha_nacimiento').value = pacienteDataParaActualizar.fecha_nacimiento || '';
                    document.getElementById('dp_sdg').value = pacienteDataParaActualizar.sdg || '';
                    document.getElementById('dp_talla').value = pacienteDataParaActualizar.talla || '';
                    document.getElementById('dp_peso').value = pacienteDataParaActualizar.peso || '';
                    document.getElementById('dp_perimetro_cefalico').value = pacienteDataParaActualizar.perimetro_cefalico || '';
                    document.getElementById('dp_fecha_inicio_tratamiento').value = pacienteDataParaActualizar.fecha_terapia || '';
                    document.getElementById('factores_riesgo').value = pacienteDataParaActualizar.factores_de_riesgo || '';
                    document.getElementById('observaciones').value = pacienteDataParaActualizar.observaciones || '';

                    actualizarEdadesCalculadas();

                    console.log("Datos del paciente cargados desde sessionStorage:", pacienteDataParaActualizar);
                    console.log("Es primera evaluación:", esPrimeraEvaluacionJS);;

                } catch (e) {
                    console.error("Error JS: leyendo datosPacienteParaEvaluacion:", e);
                }
            }
            
            const fechaEvaluacionInput = document.getElementById('dp_fecha_inicio_tratamiento');
            if (fechaEvaluacionInput) {
                fechaEvaluacionInput.addEventListener('change', actualizarEdadesCalculadas);
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente) {
                botonSiguiente.addEventListener('click', function() {
                    if (pacienteDataParaActualizar) {
                        pacienteDataParaActualizar.talla = document.getElementById('dp_talla').value;
                        pacienteDataParaActualizar.peso = document.getElementById('dp_peso').value;
                        pacienteDataParaActualizar.perimetro_cefalico = document.getElementById('dp_perimetro_cefalico').value;
                        pacienteDataParaActualizar.sdg = document.getElementById('dp_sdg').value;
                        pacienteDataParaActualizar.fecha_nacimiento = document.getElementById('dp_fecha_nacimiento').value;
                        pacienteDataParaActualizar.factores_de_riesgo = document.getElementById('factores_riesgo').value;
                        pacienteDataParaActualizar.observaciones = document.getElementById('observaciones').value;
                        
                        // Guardar los valores actualizados de las fechas y edades
                        pacienteDataParaActualizar.fecha_terapia = document.getElementById('dp_fecha_inicio_tratamiento').value;
                        pacienteDataParaActualizar.edad_cronologica_ingreso_display = document.getElementById('dp_edad_cronologica_ingreso_display').value;
                        pacienteDataParaActualizar.edad_corregida_display = document.getElementById('dp_edad_corregida_display').value;

                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(pacienteDataParaActualizar));
                    }

                    try {
                        const datosPaso1 = {}; // Objeto vacío según el código original
                        sessionStorage.setItem('evaluacionPaso1', JSON.stringify(datosPaso1));
                        window.location.href = "<?= base_url('/modificarKatona') ?>";
                    } catch (e) {
                        console.error("Error al guardar datos en sessionStorage:", e);
                        const alertDiv = document.createElement('div');
                        alertDiv.className = 'fixed top-4 right-4 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50';
                        alertDiv.innerHTML = '❌ Hubo un error al intentar guardar los datos.';
                        document.body.appendChild(alertDiv);

                        setTimeout(() => alertDiv.remove(), 3000);
                    }
                });
            }
        });
    </script>
</body>
</html>