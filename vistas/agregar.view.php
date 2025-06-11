<?php

//para verificacion de la version
//phpinfo();

session_start();

require_once '../funciones/funciones.php';
require_once '../config/db.php';
require_once '../Clases/Estudios.php';

$datos_paciente_para_mostrar = [];
$error_mensaje = null;
$esPrimeraEvaluacion = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["clave_paciente"])) {
    date_default_timezone_set('America/Mexico_City');
    $Con = conectar();
    $Estudio = new Estudios($Con);

    $clave_paciente = $_POST["clave_paciente"];
    $codigo_paciente_post = isset($_POST["codigo_paciente"]) ? $_POST["codigo_paciente"] : null; // Capturamos el código del paciente enviado por POST

    if (!$clave_paciente) {
        $error_mensaje = "Error: No se recibió la clave del paciente.";
    } else {
        // Incluye codigo_paciente en la selección
        $stmt = $Con->prepare(
            "SELECT clave_paciente, codigo_paciente, nombre_paciente, apellido_paterno_paciente, apellido_materno_paciente,
                     fecha_nacimiento_paciente, semanas_gestacion
                 FROM paciente WHERE clave_paciente = ?"
        );

        if (!$stmt) {
            $error_mensaje = "Error en preparación de consulta: " . $Con->error;
        } else {
            // Asegúrate de que clave_paciente es un entero si lo es en tu BD
            // ¡Importante!: Si clave_paciente es un INT en la BD, usa "i" en bind_param
            $stmt->bind_param("i", $clave_paciente); // Cambiado a "i" (integer) asumiendo que clave_paciente es INT
            $stmt->execute();
            $result = $stmt->get_result();
            $datos_db_paciente = $result->fetch_assoc();
            $stmt->close();

            if (!$datos_db_paciente) {
                $error_mensaje = "Error: Paciente con clave '" . htmlspecialchars($clave_paciente) . "' no encontrado.";
            } else {
                if ($codigo_paciente_post && $datos_db_paciente['codigo_paciente'] !== $codigo_paciente_post) {
                    // Este error puede ser omitido o manejado de otra forma si solo se busca por clave_paciente
                    // $error_mensaje = "Error: El código de paciente proporcionado no coincide con la clave del paciente.";
                }

                // Determinar si es la primera evaluación
                $yaTieneEvaluacionInicial = $Estudio->validarEvaluacionInicial($clave_paciente);
                $esPrimeraEvaluacion = !$yaTieneEvaluacionInicial; // True si NO tiene evaluaciones previas

                $fechaInicioTratamiento = new DateTime();
                $fechaInicioTratamientoFormateada = $fechaInicioTratamiento->format('Y-m-d');
                $fechaNacimientoReal = $datos_db_paciente['fecha_nacimiento_paciente'];
                $semanasGestacionReales = $datos_db_paciente['semanas_gestacion'];

                $edadCronologicaIngreso = calcularEdadCronologicaIngreso($fechaInicioTratamientoFormateada, $fechaNacimientoReal);
                $fechaNacimientoCorregidaStr = calcularFechaNacimientoCorregida($fechaNacimientoReal, $semanasGestacionReales);

                $datos_paciente_para_mostrar = [
                    'clave_paciente'             => $clave_paciente,
                    'codigo_paciente'            => $datos_db_paciente['codigo_paciente'],
                    'nombre_paciente'            => trim((isset($datos_db_paciente['nombre_paciente']) ? $datos_db_paciente['nombre_paciente'] : '') . ' ' . (isset($datos_db_paciente['apellido_paterno_paciente']) ? $datos_db_paciente['apellido_paterno_paciente'] : '') . ' ' . (isset($datos_db_paciente['apellido_materno_paciente']) ? $datos_db_paciente['apellido_materno_paciente'] : '')),
                    'talla'                      => '', // Se inicializan vacíos
                    'peso'                       => '', // Se inicializan vacíos
                    'perimetro_cefalico'         => '', // Se inicializan vacíos
                    'sdg'                        => $semanasGestacionReales,
                    'fecha_nacimiento'           => $fechaNacimientoReal,
                    'fecha_inicio_tratamiento'   => $fechaInicioTratamientoFormateada,
                    'edad_corregida_display'     => $fechaNacimientoCorregidaStr, // String como "1A 2M"
                    'edad_cronologica_ingreso_display' => $edadCronologicaIngreso, // String como "9A 7M"
                    'factores_de_riesgo'         => '', // Se inicializan vacíos
                    'esPrimeraEvaluacion'        => $esPrimeraEvaluacion,
                    // --- AÑADIDO: clave_personal para ser enviado al SessionStorage ---
                    'clave_personal'             => 60 // ¡IMPORTANTE! Reemplaza este valor con la clave real del personal logueado
                    // --- FIN AÑADIDO ---
                ];

                // SI NO ES LA PRIMERA EVALUACIÓN, CARGA LOS ÚLTIMOS DATOS EXISTENTES
                if (!$esPrimeraEvaluacion) {
                    $ultimaEvaluacion = $Estudio->obtenerUltimaEvaluacionPaciente($clave_paciente);
                    if ($ultimaEvaluacion) {
                        $datos_paciente_para_mostrar['talla'] = $ultimaEvaluacion['talla'];
                        $datos_paciente_para_mostrar['peso'] = $ultimaEvaluacion['peso'];
                        $datos_paciente_para_mostrar['perimetro_cefalico'] = $ultimaEvaluacion['pc']; // El campo en DB es 'pc'
                        $datos_paciente_para_mostrar['factores_de_riesgo'] = $ultimaEvaluacion['factores_riesgo'];
                    }
                }
            }
        }
    }
    $Con->close(); // Cierra la conexión a la base de datos una vez que se han realizado todas las operaciones.

} else if (isset($_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'])) {
    $datos_paciente_para_mostrar = $_SESSION['datosPacienteParaEvaluacionCargadosPHP_View'];
    $esPrimeraEvaluacion = isset($datos_paciente_para_mostrar['esPrimeraEvaluacion']) ? $datos_paciente_para_mostrar['esPrimeraEvaluacion'] : false;
} else {
    // Redirige si no hay datos en sesión ni en POST, o si la clave del paciente no se envió en el POST inicial.
    // Esto evita que se acceda directamente a esta página sin haber buscado un paciente.
    header('Location: crear.view.php?error=acceso_invalido_agregar_view');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar) && !$error_mensaje) {
    // Solo guarda en sesión si no hay un error
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
    <script src="https://cdn.tailwindcss.com"></script>
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
        // Este console.log se ejecutará tan pronto como la página se cargue en el navegador.
        // Mostrará los datos que PHP preparó antes de enviarlos al cliente.
        console.log('DEBUG (PHP a JS): datos_paciente_para_mostrar (al cargar la página):', <?php echo json_encode($datos_paciente_para_mostrar); ?>);
        console.log('DEBUG (PHP a JS): esPrimeraEvaluacion (desde PHP al cargar la página):', <?php echo json_encode($esPrimeraEvaluacion); ?>);
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
                <div class="flex items-center space-x-4 mb-6">
                    <label for="mes_seleccionado" class="block text-sm font-medium text-gray-700 whitespace-nowrap">Selecciona el mes de revision</label>
                    <select name="mes" id="mes_seleccionado" required class="flex-grow p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione el mes</option>
                        <?php for ($i = 1; $i <= 24; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="border-t border-b border-gray-400 py-2 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">DATOS DEL PACIENTE</h1></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Nombre Paciente</label><input type="text" id="dp_nombre_paciente" name="nombre_paciente_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['nombre_paciente']) ? $datos_paciente_para_mostrar['nombre_paciente'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Código Paciente</label><input type="text" id="dp_codigo_paciente" name="codigo_paciente_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['codigo_paciente']) ? $datos_paciente_para_mostrar['codigo_paciente'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label><input type="date" id="dp_fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_nacimiento']) ? $datos_paciente_para_mostrar['fecha_nacimiento'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Semanas de Gestacion(SDG)</label><input type="text" id="dp_sdg" name="sdg" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['sdg']) ? $datos_paciente_para_mostrar['sdg'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>

                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Talla*</label><input type="text" id="dp_talla" name="talla" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['talla']) ? $datos_paciente_para_mostrar['talla'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; else echo 'required'; ?>></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Peso*</label><input type="text" id="dp_peso" name="peso" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['peso']) ? $datos_paciente_para_mostrar['peso'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; else echo 'required'; ?>></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Perimetro Cefalico*</label><input type="text" id="dp_perimetro_cefalico" name="perimetro_cefalico" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['perimetro_cefalico']) ? $datos_paciente_para_mostrar['perimetro_cefalico'] : ''); ?>" class="w-full p-2 border rounded-md bg-white" <?php if (!$esPrimeraEvaluacion) echo 'readonly'; else echo 'required'; ?>></div>

                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Evaluación Actual</label><input type="date" id="dp_fecha_inicio_tratamiento" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['fecha_inicio_tratamiento']) ? $datos_paciente_para_mostrar['fecha_inicio_tratamiento'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Edad Cronológica</label><input type="text" id="dp_edad_cronologica_ingreso_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['edad_cronologica_ingreso_display']) ? $datos_paciente_para_mostrar['edad_cronologica_ingreso_display'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha Nacimiento Corregida</label><input type="text" id="dp_edad_corregida_display" value="<?php echo htmlspecialchars(isset($datos_paciente_para_mostrar['edad_corregida_display']) ? $datos_paciente_para_mostrar['edad_corregida_display'] : ''); ?>" class="w-full p-2 border rounded-md" readonly></div>
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
                    <a href="/crear"> <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button> </a>
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
                    'evaluacionPaso1', 'evaluacionPaso2_mkatona', 'evaluacionPaso3_mgrueso',
                    'evaluacionPaso4_mfino', 'evaluacionPaso5_lenguaje', // Corregido: lenguaje es el paso 5
                    'evaluacionPaso6_posturas_tmyu', // Corregido: posturas_tmyu es el paso 6
                    'evaluacionPaso7_signos_alarma', // Corregido: signos_alarma es el paso 7
                    'evaluacionPaso8_hitomgrueso',
                    'evaluacionPaso9_hitomfino' // Añadido el último paso
                ];
                clavesPasos.forEach(clave => sessionStorage.removeItem(clave));
            }

            // Esta sección PHP se ejecuta solo cuando la página se carga vía POST por primera vez con datos del paciente
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($datos_paciente_para_mostrar) && !$error_mensaje): ?>
                limpiarDatosPasosEvaluacion(); // Limpia datos de sesiones anteriores para una nueva evaluación
                try {
                    const datosPacienteActualesPHP = <?php echo json_encode($datos_paciente_para_mostrar); ?>;
                    sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(datosPacienteActualesPHP));
                } catch (e) {
                    console.error("Error JS PHP block: guardar datos Paciente:", e);
                }
            <?php endif; ?>

            const datosPacienteGuardados = sessionStorage.getItem('datosPacienteParaEvaluacion');
            let esPrimeraEvaluacionJS = false;
            let pacienteDataParaActualizar = {}; // Este objeto contendrá los datos del paciente para ser actualizados y pasados.

            if(datosPacienteGuardados){
                try {
                    pacienteDataParaActualizar = JSON.parse(datosPacienteGuardados);
                    esPrimeraEvaluacionJS = pacienteDataParaActualizar.esPrimeraEvaluacion || false;

                    // Precargar los campos de display y los campos editables
                    document.getElementById('dp_nombre_paciente').value = pacienteDataParaActualizar.nombre_paciente || '';
                    document.getElementById('dp_codigo_paciente').value = pacienteDataParaActualizar.codigo_paciente || '';
                    document.getElementById('dp_fecha_nacimiento').value = pacienteDataParaActualizar.fecha_nacimiento || '';
                    document.getElementById('dp_sdg').value = pacienteDataParaActualizar.sdg || '';
                    document.getElementById('dp_talla').value = pacienteDataParaActualizar.talla || '';
                    document.getElementById('dp_peso').value = pacienteDataParaActualizar.peso || '';
                    document.getElementById('dp_perimetro_cefalico').value = pacienteDataParaActualizar.perimetro_cefalico || '';
                    document.getElementById('dp_fecha_inicio_tratamiento').value = pacienteDataParaActualizar.fecha_inicio_tratamiento || '';
                    document.getElementById('dp_edad_cronologica_ingreso_display').value = pacienteDataParaActualizar.edad_cronologica_ingreso_display || '';
                    document.getElementById('dp_edad_corregida_display').value = pacienteDataParaActualizar.edad_corregida_display || '';
                    document.getElementById('factores_riesgo').value = pacienteDataParaActualizar.factores_de_riesgo || '';

                    // Campos que son editables solo en la primera evaluación
                    const camposEditablesPrimeraEval = [
                        'dp_talla', 'dp_peso', 'dp_perimetro_cefalico', 'factores_riesgo'
                    ];

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

                    // Campos que siempre son readonly
                    const camposSiempreReadOnly = ['dp_sdg', 'dp_fecha_nacimiento', 'dp_codigo_paciente', 'dp_nombre_paciente', 'dp_fecha_inicio_tratamiento', 'dp_edad_cronologica_ingreso_display', 'dp_edad_corregida_display'];
                    camposSiempreReadOnly.forEach(idCampo => {
                        const el = document.getElementById(idCampo);
                        if (el) {
                            el.readOnly = true;
                            el.classList.add('bg-gray-200', 'cursor-default', 'text-gray-500');
                            el.classList.remove('bg-white');
                            el.removeAttribute('required'); // Los campos de solo lectura no deben ser requeridos
                        }
                    });

                    // Establecer el placeholder para factores_riesgo si es la primera evaluación
                    const factoresRiesgoEl = document.getElementById('factores_riesgo');
                    if (factoresRiesgoEl && esPrimeraEvaluacionJS) {
                        factoresRiesgoEl.placeholder = 'En caso de que no haya factores de riesgo escribir "Ninguna"';
                    } else if (factoresRiesgoEl) {
                        factoresRiesgoEl.placeholder = ''; // Limpiar placeholder si no es la primera evaluación
                    }

                } catch(e) { console.error("Error JS: leyendo datosPacienteParaEvaluacion:", e);}
            } else if (formPaso1) {
                if (!<?php echo json_encode($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["clave_paciente"])); ?>) {
                     window.location.href = 'crear.view.php?error=datos_paciente_no_cargados';
                }
            }

            const mesSelector = document.getElementById('mes_seleccionado');
            const botonSiguiente = document.getElementById('botonSiguientePaso');

            const datosPaso1Guardados = sessionStorage.getItem('evaluacionPaso1');
            if (datosPaso1Guardados) {
                try {
                    const datosJson = JSON.parse(datosPaso1Guardados);
                    if (mesSelector && datosJson.mes) mesSelector.value = datosJson.mes;
                } catch(e) { sessionStorage.removeItem('evaluacionPaso1'); }
            }

            if (botonSiguiente && mesSelector) {
                botonSiguiente.addEventListener('click', function() {
                    const mesSeleccionado = mesSelector.value;
                    if (!mesSeleccionado) {
                        alert('Por favor, selecciona un mes de revisión.');
                        return;
                    }

                    // Actualizar pacienteDataParaActualizar con los valores del formulario
                    if (pacienteDataParaActualizar.esPrimeraEvaluacion) {
                        const talla = document.getElementById('dp_talla').value;
                        const peso = document.getElementById('dp_peso').value;
                        const perimetroCefalico = document.getElementById('dp_perimetro_cefalico').value;
                        const factoresRiesgo = document.getElementById('factores_riesgo').value;

                        // Validar campos obligatorios solo si es la primera evaluación
                        if (!talla || !peso || !perimetroCefalico || !factoresRiesgo) {
                            alert('Por favor, rellena todos los campos obligatorios (Talla, Peso, Perímetro Cefálico, Factores de Riesgo).');
                            return; // Detener el proceso si faltan campos
                        }

                        pacienteDataParaActualizar.talla = talla;
                        pacienteDataParaActualizar.peso = peso;
                        pacienteDataParaActualizar.perimetro_cefalico = perimetroCefalico;
                        pacienteDataParaActualizar.factores_de_riesgo = factoresRiesgo;
                    }

                    // Crear el objeto para el Paso 1
                    // AHORA INCLUYE TODOS LOS DATOS RELEVANTES DE TERAPIA_NEUROV2 Y OTROS CALCULADOS/OBTENIDOS
                    const datosPaso1 = {
                        mes: mesSeleccionado,
                        clave_paciente: pacienteDataParaActualizar.clave_paciente,
                        clave_personal: pacienteDataParaActualizar.clave_personal, // Usar la clave_personal del objeto pacienteDataParaActualizar
                        
                        fecha_inicio_terapia: pacienteDataParaActualizar.fecha_inicio_tratamiento,
                        fecha_terapia: pacienteDataParaActualizar.fecha_inicio_tratamiento, 
                        
                        edad_corregida: pacienteDataParaActualizar.edad_corregida_display, 
                        edad_cronologica: pacienteDataParaActualizar.edad_cronologica_ingreso_display,
                        
                        // Los campos dat_ter_fech_nac_edad_correg, edad_cronologica_al_ingr_sem,
                        // edad_correg_al_ingr_sem deben ir con los valores correctos para la DB.
                        // Según tu esquema, 'dat_ter_fech_nac_edad_correg' es DATE.
                        // 'edad_cronologica_al_ingr_sem' y 'edad_correg_al_ingr_sem' son VARCHAR(4).
                        dat_ter_fech_nac_edad_correg: pacienteDataParaActualizar.fecha_nacimiento, // Fecha de Nacimiento original, si es la que va en ese campo DATE
                        edad_cronologica_al_ingr_sem: pacienteDataParaActualizar.sdg.toString(), // Convertir a string para VARCHAR
                        edad_correg_al_ingr_sem: pacienteDataParaActualizar.sdg.toString(), // Convertir a string para VARCHAR
                        
                        peso: pacienteDataParaActualizar.peso,
                        talla: pacienteDataParaActualizar.talla,
                        pc: pacienteDataParaActualizar.perimetro_cefalico,
                        factores_riesgo: pacienteDataParaActualizar.factores_de_riesgo
                    };

                    // console.log para verificar los datos antes de guardarlos
                    console.log('DEBUG (JS - Botón Siguiente): datosPaso1 a guardar:', datosPaso1);
                    console.log('DEBUG (JS - Botón Siguiente): pacienteDataParaActualizar actualizada:', pacienteDataParaActualizar);


                    try {
                        sessionStorage.setItem('evaluacionPaso1', JSON.stringify(datosPaso1));
                        sessionStorage.setItem('datosPacienteParaEvaluacion', JSON.stringify(pacienteDataParaActualizar)); // Guarda los datos actualizados del paciente
                        window.location.href = 'agregar.mkatona.php';
                    } catch (e) {
                        console.error("Error al guardar datos en sessionStorage:", e);
                        alert("Hubo un error al intentar guardar los datos.");
                    }
                });
            }
        });
    </script>
</body>
</html>