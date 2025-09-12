<?php

//para verificacion de la version
//phpinfo();

require_once './funciones/funciones.php';
require_once './config/db.php';
require_once './Clases/Estudios.php';

$datos_paciente_para_mostrar = [];
$error_mensaje = null;
$esPrimeraEvaluacion = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["clave_paciente"])) {
    date_default_timezone_set('America/Mexico_City');
    $Con = conectar();
    $Estudio = new Estudios($Con);

    $clave_paciente = $_POST["clave_paciente"];

    if (!$clave_paciente) {
        $error_mensaje = "Error: No se recibió la clave del paciente.";
    } else {
        $stmt = $Con->prepare(
            "SELECT clave_paciente, codigo_paciente, nombre_paciente, apellido_paterno_paciente, apellido_materno_paciente,
                    fecha_nacimiento_paciente, semanas_gestacion
                     FROM paciente WHERE clave_paciente = ?"
        );

        if (!$stmt) {
            $error_mensaje = "Error en preparación de consulta: " . $Con->error;
        } else {
            $stmt->bind_param("i", $clave_paciente);
            $stmt->execute();
            $result = $stmt->get_result();
            $datos_db_paciente = $result->fetch_assoc();
            $stmt->close();

            if (!$datos_db_paciente) {
                $error_mensaje = "Error: Paciente con clave '" . htmlspecialchars($clave_paciente) . "' no encontrado.";
            } else {
                $yaTieneEvaluacionInicial = $Estudio->validarEvaluacionInicial($clave_paciente);
                $esPrimeraEvaluacion = !$yaTieneEvaluacionInicial;

                $fechaInicioTratamientoFormateada = (new DateTime())->format('Y-m-d');
                $fechaNacimientoReal = $datos_db_paciente['fecha_nacimiento_paciente'];
                $semanasGestacionReales = $datos_db_paciente['semanas_gestacion'];

                $datos_paciente_para_mostrar = [
                    'clave_paciente'                => $clave_paciente,
                    'codigo_paciente'               => $datos_db_paciente['codigo_paciente'],
                    'nombre_paciente'               => trim(($datos_db_paciente['nombre_paciente'] ?? '') . ' ' . ($datos_db_paciente['apellido_paterno_paciente'] ?? '') . ' ' . ($datos_db_paciente['apellido_materno_paciente'] ?? '')),
                    'talla'                         => '',
                    'peso'                          => '',
                    'perimetro_cefalico'            => '',
                    'sdg'                           => $semanasGestacionReales,
                    'fecha_nacimiento'              => $fechaNacimientoReal,
                    'fecha_inicio_tratamiento'      => $fechaInicioTratamientoFormateada,
                    'factores_de_riesgo'            => '',
                    'esPrimeraEvaluacion'           => $esPrimeraEvaluacion,
                    'clave_personal'                => $_SESSION['clave_personal'],
                    'edad_corregida_display'        => '',
                    'fecha_nacimiento_corregida_display' => '',
                    'edad_cronologica_ingreso_display' => '',
                ];

                if ($esPrimeraEvaluacion) {
                    $datos_paciente_para_mostrar['edad_cronologica_ingreso_display'] = calcularEdadCronologicaIngreso($fechaInicioTratamientoFormateada, $fechaNacimientoReal);
                    $datos_paciente_para_mostrar['edad_corregida_display'] = calcularFechaNacimientoCorregida($fechaNacimientoReal, $semanasGestacionReales);
                } else {
                    $ultimaEvaluacion = $Estudio->obtenerUltimaEvaluacionPaciente($clave_paciente);
                    if ($ultimaEvaluacion) {
                        $datos_paciente_para_mostrar['talla'] = $ultimaEvaluacion['talla'];
                        $datos_paciente_para_mostrar['peso'] = $ultimaEvaluacion['peso'];
                        $datos_paciente_para_mostrar['perimetro_cefalico'] = $ultimaEvaluacion['pc'];
                        $datos_paciente_para_mostrar['factores_de_riesgo'] = $ultimaEvaluacion['factores_riesgo'];
                    }

                    $stmt_primera_eval = $Con->prepare(
                        "SELECT edad_cronologica, edad_corregida, dat_ter_fech_nac_edad_correg 
                         FROM terapia_neurov2 
                         WHERE clave_paciente = ? 
                         ORDER BY id_terapia_neurohabilitatoriav2 ASC 
                         LIMIT 1"
                    );
                    if ($stmt_primera_eval) {
                        $stmt_primera_eval->bind_param("i", $clave_paciente);
                        $stmt_primera_eval->execute();
                        $result_primera_eval = $stmt_primera_eval->get_result();
                        $primeraEvaluacion = $result_primera_eval->fetch_assoc();
                        $stmt_primera_eval->close();

                        if ($primeraEvaluacion) {
                            $datos_paciente_para_mostrar['edad_cronologica_ingreso_display'] = $primeraEvaluacion['edad_cronologica'] ?? 'N/A';
                            $datos_paciente_para_mostrar['edad_corregida_display'] = $primeraEvaluacion['edad_corregida'] ?? 'N/A';
                            $datos_paciente_para_mostrar['fecha_nacimiento_corregida_display'] = $primeraEvaluacion['dat_ter_fech_nac_edad_correg'] ?? '';
                        }
                    }
                }
            }
        }
    }
    $Con->close();

} else if (isset($_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'])) {
    $datos_paciente_para_mostrar = $_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'];
    $esPrimeraEvaluacion = isset($datos_paciente_para_mostrar['esPrimeraEvaluacion']) ? $datos_paciente_para_mostrar['esPrimeraEvaluacion'] : false;
} else {
    header('Location: crear.view.php?error=acceso_invalido_agregar_view');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar) && !$error_mensaje) {
    $_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'] = $datos_paciente_para_mostrar;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'partials/modal.php'; ?>
    <title>Agregar Evaluación</title>
    <link href=<?=base_url("/assets/output.css")?> rel="stylesheet"/>
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; }
        .bg-custom-main-box { background-color: #E0F2FE; }
        .bg-custom-button { background-color: #0284C7; }
        .text-custom-title { color: #0369A1; }
        input[readonly], textarea[readonly] { background-color: #E5E7EB; cursor: default; border-color: #D1D5DB; color: #4B5563; }
        select:not([disabled]) { background-color: #FFFFFF; cursor: pointer; }
    </style>
</head>
<body class="bg-gray-100">

    <script>
        console.log('DEBUG (PHP a JS): datos_paciente_para_mostrar (al cargar la página):', <?php echo json_encode($datos_paciente_para_mostrar); ?>);
        console.log('DEBUG (PHP a JS): esPrimeraEvaluacion (desde PHP al cargar la página):', <?php echo json_encode($esPrimeraEvaluacion); ?>);
        
        <?php if ($esPrimeraEvaluacion): ?>
            console.log('DEBUG: Es la primera evaluación, los cálculos serán dinámicos.');
        <?php else: ?>
            console.log('DEBUG: No es la primera evaluación, los datos de edad son fijos desde la BD.');
            console.log('DEBUG (PHP a JS): Edad Cronológica (BD):', '<?php echo isset($datos_paciente_para_mostrar['edad_cronologica_ingreso_display']) ? addslashes($datos_paciente_para_mostrar['edad_cronologica_ingreso_display']) : "N/A"; ?>');
            console.log('DEBUG (PHP a JS): Fecha Nacimiento Corregida (Semanas) (BD):', '<?php echo isset($datos_paciente_para_mostrar['edad_corregida_display']) ? addslashes($datos_paciente_para_mostrar['edad_corregida_display']) : "N/A"; ?>');
            console.log('DEBUG (PHP a JS): Fecha Nacimiento Corregida (BD):', '<?php echo isset($datos_paciente_para_mostrar['fecha_nacimiento_corregida_display']) ? addslashes($datos_paciente_para_mostrar['fecha_nacimiento_corregida_display']) : "N/A"; ?>');
        <?php endif; ?>
    </script>
    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3></div>

    <div class="max-w-4xl mx-auto mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <?php if ($error_mensaje): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                <?php echo htmlspecialchars($error_mensaje); ?>
                <p><a href="crear.view.php" class="underline">Volver a la búsqueda</a></p>
            </div>
        <?php elseif (empty($datos_paciente_para_mostrar) && $_SERVER['REQUEST_METHOD'] === 'POST') : ?>
             <div class="mb-4 p-4 bg-yellow-100 text-yellow-700 border border-yellow-300 rounded">
                 No se pudieron cargar los datos del paciente. Asegúrate de que la clave del paciente sea correcta y la tabla 'paciente' exista. <a href="crear.view.php" class="underline">Intente de nuevo</a>.
            </div>
        <?php else: ?>
            <form id="formPaso1">
                <div class="border-t border-b border-gray-400 py-2 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">DATOS DEL PACIENTE</h1></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Nombre Paciente</label><input type="text" id="dp_nombre_paciente" name="nombre_paciente_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['nombre_paciente']) ? $datos_paciente_para_mostrar['nombre_paciente'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Código Paciente</label><input type="text" id="dp_codigo_paciente" name="codigo_paciente_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['codigo_paciente']) ? $datos_paciente_para_mostrar['codigo_paciente'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label><input type="date" id="dp_fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_nacimiento']) ? $datos_paciente_para_mostrar['fecha_nacimiento'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Semanas de Gestacion(SDG)</label><input type="text" id="dp_sdg" name="sdg" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['sdg']) ? $datos_paciente_para_mostrar['sdg'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>

                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Talla*</label><input type="text" id="dp_talla" name="talla" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['talla']) ? $datos_paciente_para_mostrar['talla'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; else echo 'required'; ?>></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Peso*</label><input type="text" id="dp_peso" name="peso" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['peso']) ? $datos_paciente_para_mostrar['peso'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; else echo 'required'; ?>></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Perimetro Cefalico*</label><input type="text" id="dp_perimetro_cefalico" name="perimetro_cefalico" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['perimetro_cefalico']) ? $datos_paciente_para_mostrar['perimetro_cefalico'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; else echo 'required'; ?>></div>

                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Evaluación Actual</label><input type="date" id="dp_fecha_inicio_tratamiento" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_inicio_tratamiento']) ? $datos_paciente_para_mostrar['fecha_inicio_tratamiento'] : ''); ?>" class="w-full p-2 border rounded-md bg-white"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Edad Cronológica</label><input type="text" id="dp_edad_cronologica_ingreso_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['edad_cronologica_ingreso_display']) ? $datos_paciente_para_mostrar['edad_cronologica_ingreso_display'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha Nacimiento Corregida(Semanas)</label><input type="text" id="dp_edad_corregida_display_en_sem" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['edad_corregida_display']) ? $datos_paciente_para_mostrar['edad_corregida_display'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha Nacimiento Corregida</label><input type="date" id="dp_edad_corregida_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_nacimiento_corregida_display']) ? $datos_paciente_para_mostrar['fecha_nacimiento_corregida_display'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                </div>
                <div class="mb-6">
                    <label for="factores_riesgo" class="block text-sm font-medium text-gray-700 mb-1">Factores de Riesgo*</label>
                    <textarea id="factores_riesgo" name="factores_riesgo" rows="3"
                        class="w-full p-2 border rounded-md bg-white"
                        <?php if (!$esPrimeraEvaluacion) echo 'readonly'; else echo 'required'; ?>
                        placeholder="<?php echo ($esPrimeraEvaluacion ? 'En caso de que no haya factores de riesgo escribir "Ninguna"' : ''); ?>"
                    ><?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['factores_de_riesgo']) ? $datos_paciente_para_mostrar['factores_de_riesgo'] : ''); ?></textarea>
                </div>

                <div class="flex justify-between mt-8">
                    <a href=<?=base_url("/crear")?>> <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button> </a>
                    <div class="text-sm text-gray-600 text-center hidden sm:block">
                            Paso 1 de 9 - Datos Generales
                        </div>
                    <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formPaso1 = document.getElementById('formPaso1');
            if (!formPaso1) return;

            function limpiarDatosPasosEvaluacion() {
                const clavesPasos = [
                    'datosPacienteParaEvaluacion', 'evaluacionP1', 'evaluacionP2_mkatona',
                    'evaluacionP3_mgrueso', 'evaluacionP4_mfino', 'evaluacionP5_lenguaje',
                    'evaluacionP6_posturas_tmyu', 'evaluacionP7_signos_alarma',
                    'evaluacionP8_hitomgrueso', 'evaluacionP9_hitomfino'
                ];
                clavesPasos.forEach(clave => sessionStorage.removeItem(clave));
            }

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar) && !$error_mensaje): ?>
                limpiarDatosPasosEvaluacion();
                try {
                    const datosPacienteActualesPHP = <?php echo json_encode($datos_paciente_para_mostrar); ?>;
                    datosPacienteActualesPHP.mes = datosPacienteActualesPHP.mes || '';
                    sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPacienteActualesPHP));
                } catch (e) {
                    console.error("Error JS PHP block: guardar datos Paciente:", e);
                }
            <?php endif; ?>

            const datosPacienteGuardados = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let esPrimeraEvaluacionJS = false;
            let pacienteDataParaActualizar = {};

            if(datosPacienteGuardados){
                try {
                    pacienteDataParaActualizar = JSON.parse(datosPacienteGuardados);
                    esPrimeraEvaluacionJS = pacienteDataParaActualizar.esPrimeraEvaluacion;

                    // Si se regresa de otra página, sessionStorage tendrá los últimos datos editados
                    // y los re-poblará en los campos, manteniendo el estado.
                    document.getElementById('dp_talla').value = pacienteDataParaActualizar.talla || '';
                    document.getElementById('dp_peso').value = pacienteDataParaActualizar.peso || '';
                    document.getElementById('dp_perimetro_cefalico').value = pacienteDataParaActualizar.perimetro_cefalico || '';
                    document.getElementById('factores_riesgo').value = pacienteDataParaActualizar.factores_de_riesgo || '';
                    
                    const camposEditablesPrimeraEval = [ 'dp_talla', 'dp_peso', 'dp_perimetro_cefalico', 'factores_riesgo' ];
                    camposEditablesPrimeraEval.forEach(idCampo => {
                        const el = document.getElementById(idCampo);
                        if (el) {
                            el.readOnly = !esPrimeraEvaluacionJS;
                            if (el.readOnly) {
                                el.classList.add('bg-gray-200', 'cursor-default', 'text-gray-500');
                                el.classList.remove('bg-white');
                                el.removeAttribute('required');
                            } else {
                                el.classList.remove('bg-gray-200', 'cursor-default', 'text-gray-500');
                                el.classList.add('bg-white');
                                el.setAttribute('required', 'required');
                            }
                        }
                    });

                    const camposSiempreReadOnly = ['dp_sdg', 'dp_fecha_nacimiento', 'dp_codigo_paciente', 'dp_nombre_paciente', 'dp_edad_cronologica_ingreso_display', 'dp_edad_corregida_display_en_sem', 'dp_edad_corregida_display'];
                    camposSiempreReadOnly.forEach(idCampo => {
                        const el = document.getElementById(idCampo);
                        if (el) {
                            el.readOnly = true;
                            el.classList.add('bg-gray-200', 'cursor-default', 'text-gray-500');
                            el.classList.remove('bg-white');
                        }
                    });

                    const factoresRiesgoEl = document.getElementById('factores_riesgo');
                    if (factoresRiesgoEl && esPrimeraEvaluacionJS) {
                        factoresRiesgoEl.placeholder = 'En caso de que no haya factores de riesgo escribir "Ninguna"';
                    } else if (factoresRiesgoEl) {
                        factoresRiesgoEl.placeholder = '';
                    }

                } catch(e) { console.error("Error JS: leyendo datosPacienteParaEvaluacion:", e);}
            } else if (formPaso1) {
                if (!<?php echo json_encode($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["clave_paciente"])); ?>) {
                     window.location.href = "<?=base_url('crear.view.php?error=datos_paciente_no_cargados')?>";
                }
            }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente) {
                botonSiguiente.addEventListener('click', function() {
                    if (pacienteDataParaActualizar.esPrimeraEvaluacion) {
                        const talla = document.getElementById('dp_talla').value;
                        const peso = document.getElementById('dp_peso').value;
                        const perimetroCefalico = document.getElementById('dp_perimetro_cefalico').value;
                        const factoresRiesgo = document.getElementById('factores_riesgo').value;

                        if (!talla || !peso || !perimetroCefalico || !factoresRiesgo) {
                            alert('Por favor, rellena todos los campos obligatorios (Talla, Peso, Perímetro Cefálico, Factores de Riesgo).');
                            return;
                        }
                        pacienteDataParaActualizar.talla = talla;
                        pacienteDataParaActualizar.peso = peso;
                        pacienteDataParaActualizar.perimetro_cefalico = perimetroCefalico;
                        pacienteDataParaActualizar.factores_de_riesgo = factoresRiesgo;
                    }
                    
                    const fechaEvaluacionActual = document.getElementById('dp_fecha_inicio_tratamiento').value;
                    pacienteDataParaActualizar.fecha_inicio_tratamiento = fechaEvaluacionActual;

                    pacienteDataParaActualizar.edad_cronologica_ingreso_display = document.getElementById('dp_edad_cronologica_ingreso_display').value;
                    pacienteDataParaActualizar.edad_corregida_display = document.getElementById('dp_edad_corregida_display_en_sem').value;
                    pacienteDataParaActualizar.fecha_nacimiento_corregida_display = document.getElementById('dp_edad_corregida_display').value;

                    try {
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(pacienteDataParaActualizar));
                        window.location.href = "<?=base_url('/agregarKatona')?>";
                    } catch (e) {
                        console.error("Error al guardar datos en sessionStorage:", e);
                        alert("Hubo un error al intentar guardar los datos.");
                    }
                });
            }
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let pacienteData = {};
        const datosGuardados = sessionStorage.getItem('datosPacienteParaEvaluacion');
        if (datosGuardados) {
            try {
                pacienteData = JSON.parse(datosGuardados);
            } catch(e) {
                console.error("Error al parsear datos del paciente en el segundo script:", e);
                return;
            }
        }

        // ***** INICIO: LÓGICA CONDICIONAL *****
        // Solo ejecuta los cálculos dinámicos si es la primera evaluación.
        if (pacienteData.esPrimeraEvaluacion) {
            const fechaEvaluacionInput = document.getElementById('dp_fecha_inicio_tratamiento');
            const fechaNacimientoInput = document.getElementById('dp_fecha_nacimiento');
            const semanasGestacionInput = document.getElementById('dp_sdg');
            const edadCronologicaOutput = document.getElementById('dp_edad_cronologica_ingreso_display');
            const edadCorregidaSemanasOutput = document.getElementById('dp_edad_corregida_display_en_sem');
            const fechaNacimientoCorregidaOutput = document.getElementById('dp_edad_corregida_display');

            function formatearEdadAniosMesesDias(totalDias) {
                if (isNaN(totalDias) || totalDias < 0) return 'N/A';
                const diasEnAnio = 365.25;
                const diasEnPromedioPorMes = 30.4375;
                let diasRestantes = totalDias;
                const anios = Math.floor(diasRestantes / diasEnAnio);
                diasRestantes %= diasEnAnio;
                const meses = Math.floor(diasRestantes / diasEnPromedioPorMes);
                diasRestantes %= diasEnPromedioPorMes;
                const dias = Math.floor(diasRestantes);
                return `${anios} A, ${meses} M, ${dias} D`;
            }

            function formatearEdadEnSemanas(totalDias) {
                if (isNaN(totalDias) || totalDias < 0) return '0';
                const semanas = Math.floor(totalDias / 7);
                return semanas.toString();
            }

            function actualizarEdades() {
                const fechaEvaluacionStr = fechaEvaluacionInput.value;
                const fechaNacimientoStr = fechaNacimientoInput.value;
                const semanasGestacion = parseInt(semanasGestacionInput.value, 10);

                if (!fechaEvaluacionStr || !fechaNacimientoStr) {
                    return;
                }

                const fechaEvaluacion = new Date(fechaEvaluacionStr + 'T00:00:00');
                const fechaNacimiento = new Date(fechaNacimientoStr + 'T00:00:00');
                
                const diffMilisegundos = fechaEvaluacion.getTime() - fechaNacimiento.getTime();
                const edadCronologicaEnDias = Math.floor(diffMilisegundos / (1000 * 60 * 60 * 24));

                let edadCorregidaEnDias = edadCronologicaEnDias;
                let diasDePrematurez = 0;
                if (!isNaN(semanasGestacion) && semanasGestacion < 39) {
                    diasDePrematurez = (39 - semanasGestacion) * 7;
                    edadCorregidaEnDias = edadCronologicaEnDias - diasDePrematurez;
                }
                
                const fechaNacimientoCorregida = new Date(fechaNacimiento.getTime());
                fechaNacimientoCorregida.setDate(fechaNacimiento.getDate() + diasDePrematurez);

                const yyyy = fechaNacimientoCorregida.getFullYear();
                const mm = String(fechaNacimientoCorregida.getMonth() + 1).padStart(2, '0');
                const dd = String(fechaNacimientoCorregida.getDate()).padStart(2, '0');
                const fechaCorregidaFormateada = `${yyyy}-${mm}-${dd}`;

                const edadCronologicaFormateada = formatearEdadAniosMesesDias(edadCronologicaEnDias);
                const edadCorregidaSemanasFormateada = formatearEdadEnSemanas(edadCorregidaEnDias);

                edadCronologicaOutput.value = edadCronologicaFormateada;
                edadCorregidaSemanasOutput.value = edadCorregidaSemanasFormateada;
                fechaNacimientoCorregidaOutput.value = fechaCorregidaFormateada;

                // Actualizar siempre el objeto en sessionStorage para la navegación
                pacienteData.fecha_inicio_tratamiento = fechaEvaluacionStr;
                pacienteData.edad_cronologica_ingreso_display = edadCronologicaFormateada;
                pacienteData.edad_corregida_display = edadCorregidaSemanasFormateada;
                pacienteData.fecha_nacimiento_corregida_display = fechaCorregidaFormateada;
                sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(pacienteData));
            }

            if (fechaEvaluacionInput) {
                fechaEvaluacionInput.addEventListener('change', actualizarEdades);
                actualizarEdades(); // Calcular al cargar la página
            }
        }
    });
    </script>

</body>
</html>