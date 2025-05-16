<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'partials/modal.php'; ?>
    <title>Modificar Evaluaciones</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; }
        .bg-custom-main-box { background-color: #E0F2FE; } 
        .bg-custom-button { background-color: #0284C7; } 
        .text-custom-title { color: #0369A1; } 
    </style>
</head>
<body class="bg-gray-100">

    <div class="px-6 md:px-10 py-4 flex justify-between items-center bg-custom-header-area shadow-sm">
        <h1 class="text-2xl font-bold text-custom-title">Modificar</h1>
        <a href="/inicio" class="bg-custom-button hover:opacity-90 text-white px-4 py-2 rounded-lg text-sm font-medium">
            Salir
        </a> 
    </div>

    <div class="mx-6 md:mx-10 my-6 bg-custom-main-box rounded-xl shadow-md p-6">

        <form method="post" action="/modificar" class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4 mb-6">
            <div class="w-full sm:flex-grow"> 
                <label for="Nombre" class="block text-sm font-medium text-custom-title mb-1">Nombre del paciente</label>
                <input 
                    type="text" 
                    id="Nombre" 
                    name="Nombre" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2" 
                    placeholder="Buscar por nombre..."
                    value="">
                
            </div>
            <div class="w-full sm:flex-grow"> 
                <label for="fecha" class="block text-sm font-medium text-custom-title mb-1">Fecha de Inicio</label>
                <input 
                    type="date" 
                    id="fechaInicial" 
                    name="fechaInicial" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2" 
                    placeholder="Buscar por fecha..."
                    value="">
                
            </div>
            <div class="w-full sm:flex-grow"> 
                <label for="fecha" class="block text-sm font-medium text-custom-title mb-1">Fecha Final</label>
                <input 
                    type="date" 
                    id="fechaFinal" 
                    name="fechaFinal" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2" 
                    placeholder="Buscar por fecha..."
                    value="">
                
            </div>
            <div class="w-full sm:flex-grow"> 
                <label for="codigo" class="block text-sm font-medium text-custom-title mb-1">Codigo de paciente</label>
                <input 
                    type="text" 
                    id="codigo" 
                    name="codigo" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2" 
                    placeholder="Buscar por codigo..."
                    value="">
                
            </div>
            <div class="w-full sm:w-auto"> 
                <button 
                    type="submit" 
                >
                    <input type="hidden" name="Vacio" value="">
                    <img 
                    src="/assets/img_iconos/buuscar.svg" 
                    alt="Buscar" 
                    class="w-56 h-24 hover:scale-110 hover:brightness-75 transition-all"
                    />
                </button>
            </div>
        </form>

        <div class="overflow-x-auto"> <?php // Permite scroll horizontal en pantallas pequeñas ?>
            <table class="w-full border-collapse border border-sky-300 bg-white text-sm">
                <thead>
                    <tr class="bg-sky-200 text-custom-title">
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Clave del paciente</th>
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Nombre del Paciente</th>
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Fecha de Registro</th>
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Fecha de Evaluacion</th>
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium"></th>
                        </tr>
                </thead>
                <tbody>
                <?php if (!empty($pacientes)): ?>
        <?php foreach ($pacientes as $paciente): ?>
            <tr>
                <td class="border border-sky-300 px-3 py-2"><?= htmlspecialchars($paciente["clave_paciente"]) ?></td>
                <td class="border border-sky-300 px-3 py-2"><?php 
                    if (!empty($paciente["nombre_pacinete"])) {
                        echo htmlspecialchars($paciente["nombre_pacinete"]);
                    } else {
                        echo htmlspecialchars($paciente["nombre_paciente"] . " " . $paciente["apellido_materno_paciente"] . " " . $paciente["apellido_paterno_paciente"]);
                    }
                    ?></td>
                <td class="border border-sky-300 px-3 py-2"><?= htmlspecialchars($paciente["fecha_registro"]) ?></td>
                <td class="border border-sky-300 px-3 py-2"><?php 
                    if (!empty($paciente["eval_subs_fec_eval"])) {
                        echo htmlspecialchars($paciente["eval_subs_fec_eval"]);
                    } else {
                        echo htmlspecialchars($paciente["nombre_paciente"] . " " . $paciente["apellido_materno_paciente"] . " " . $paciente["apellido_paterno_paciente"]);
                    }
                    ?></td>
                <td class="border border-sky-300 px-3 py-2">  
                    <form action='modificarEvaluacion' method='POST' style='display:inline;'>
                    <input type='hidden' name='terapia_id' value='<?php echo htmlspecialchars($paciente["id_terapia_neurohabilitatoria"] , ENT_QUOTES); ?>'>
                    <div class="flex justify-center">
                        <img src="/assets/img_iconos/mooodificar.svg" class="modificar w-24 h-24 hover:scale-110 hover:brightness-75 transition-all" />
                    </img>
                    </form></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="border border-sky-300 px-3 py-2 text-center text-gray-500">
                No se encontraron resultados
            </td>
        </tr>
    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>