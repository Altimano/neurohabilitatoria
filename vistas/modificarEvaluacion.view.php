<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Evaluación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-main-box { background-color: #E0F2FE; }
        .bg-custom-button { background-color: #0284C7; }
        .text-custom-title { color: #0369A1; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="px-6 py-4 bg-white shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-bold text-custom-title">Editar Evaluación del Paciente</h1>
        <a href="/inicio" class="bg-custom-button text-white px-4 py-2 rounded-lg text-sm font-medium">
            Volver
        </a>
    </div>

    <div class="m-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <?php foreach ($columnas as $columna): ?>
            <?php $colName = $columna->name; ?>   
        <form method="post" action="/modificar">
            <input type="hidden" name="id_terapia" value="<?= htmlspecialchars($evaluaciones['id_terapia_neurohabilitatoria']) ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($colName) ?></label>
                    <input type="text" name="<?= htmlspecialchars($colName) ?>" value="<?= htmlspecialchars($evaluaciones['nombre_pacinete']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <?php endforeach; ?>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Fecha de Inicio de Terapia</label>
                    <input type="date" name="dat_ter_fec_ini_tratam_terap" value="<?= htmlspecialchars($evaluaciones['dat_ter_fec_ini_tratam_terap']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Edad corregida</label>
                    <input type="text" name="edad_corregida" value="<?= htmlspecialchars($evaluaciones['edad_corregida']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Patrones de desarrollo </label>
                    <input type="date" name="fecha_registro" value="<?= htmlspecialchars($evaluaciones['fecha_registro']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Fecha de inicio de tratamiento</label>
                    <input type="date" name="dat_ter_fec_ini_tratam_terap" value="<?= htmlspecialchars($evaluaciones['dat_ter_fec_ini_tratam_terap']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Fecha de evaluación</label>
                    <input type="date" name="eval_subs_fec_eval" value="<?= htmlspecialchars($evaluaciones['eval_subs_fec_eval']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <!-- Agrega aquí más campos de evaluación si los hay -->
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-custom-button text-white px-6 py-2 rounded-lg hover:opacity-90">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</body>
</html>