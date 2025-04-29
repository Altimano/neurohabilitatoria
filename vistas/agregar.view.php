<?php
$id_paciente_actual = 1; 
$datos_paciente = [
    'nombre_paciente' => 'Juan Perez Ejemplo', 'talla' => '50 cm', 'peso' => '3.5 Kg', 'perimetro_cefalico' => '34 cm',
    'sdg' => '40', 'edad_corregida' => 'N/A', 'fecha_nacimiento' => '2024-10-01',
    'fecha_tratamiento' => '2024-11-01', 'edad_semanas' => '4',
    'factores_de_riesgo' => 'Este niño presenta sintomas de retraso mental'
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Evaluación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; }
        .bg-custom-main-box { background-color: #E0F2FE; }
        .bg-custom-button { background-color: #0284C7; }
        .text-custom-title { color: #0369A1; }
        input[readonly], textarea[readonly] {
             background-color: #E5E7EB;
             cursor: default;
             border-color: #D1D5DB;
             color: #4B5563;
        }
        select:not([disabled]) { background-color: #FFFFFF; cursor: pointer; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3></div>

    <div class="mx-6 md:mx-10 mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
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
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Nombre Paciente</label><input type="text" value="<?php echo htmlspecialchars($datos_paciente['nombre_paciente']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Talla</label><input type="text" value="<?php echo htmlspecialchars($datos_paciente['talla']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Peso</label><input type="text" value="<?php echo htmlspecialchars($datos_paciente['peso']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Perimetro Cefalico</label><input type="text" value="<?php echo htmlspecialchars($datos_paciente['perimetro_cefalico']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Semanas de Gestacion(SDG)</label><input type="text" value="<?php echo htmlspecialchars($datos_paciente['sdg']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Edad Corregida</label><input type="text" value="<?php echo htmlspecialchars($datos_paciente['edad_corregida']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label><input type="date" value="<?php echo htmlspecialchars($datos_paciente['fecha_nacimiento']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Fecha Inicio de Tratamiento</label><input type="date" value="<?php echo htmlspecialchars($datos_paciente['fecha_tratamiento']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Edad Corregida en Semanas al Ingreso</label><input type="text" value="<?php echo htmlspecialchars($datos_paciente['edad_semanas']); ?>" class="w-full p-2 border rounded-md" readonly></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Factores de Riesgo</label><input type="text" value="<?php echo htmlspecialchars($datos_paciente['factores_de_riesgo']); ?>" class="w-full p-2 border rounded-md" readonly></div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="bienvenido.php"> <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button> </a>
                <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mesSelector = document.getElementById('mes_seleccionado');
            const botonSiguiente = document.getElementById('botonSiguientePaso');

            const datosGuardados = sessionStorage.getItem('evaluacionPaso1');
            if (datosGuardados) {
                try {
                    const datosJson = JSON.parse(datosGuardados);
                    if (mesSelector && datosJson.mes) mesSelector.value = datosJson.mes;
                } catch(e) {
                    console.error("Error parseando datos guardados del paso 1:", e);
                    sessionStorage.removeItem('evaluacionPaso1');
                }
            }

            if (botonSiguiente && mesSelector) {
                botonSiguiente.addEventListener('click', function() {
                    const mesSeleccionado = mesSelector.value;

                    if (mesSeleccionado) {
                        const datosPaso1 = {
                            mes: mesSeleccionado,
                        };
                        try {
                            sessionStorage.setItem('evaluacionPaso1', JSON.stringify(datosPaso1));
                            window.location.href = `agregar.mkatona.php`;
                        } catch (e) {
                            console.error("Error al guardar en sessionStorage:", e);
                            alert("Hubo un error al intentar guardar los datos.");
                        }
                    } else {
                        alert('Por favor, selecciona un mes de revisión.');
                    }
                });
            }
        });
    </script>
</body>
</html>