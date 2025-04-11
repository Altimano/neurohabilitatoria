<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Pacientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-header-area { background-color: #FFFFFF; } /fondo del header/
        .bg-custom-main-box { background-color: #E0F2FE; } /contenedor principal/
        .bg-custom-button { background-color: #0284C7; } /botones/
        .text-custom-title { color: #0369A1; } /títulos/
    </style>
</head>
<body class="bg-gray-100"> <?php?>

    <?php require 'partials/header.php';?>

    <div class="px-6 md:px-10 py-4 flex justify-between items-center bg-custom-header-area shadow-sm">
        <h1 class="text-2xl font-bold text-custom-title">Consulta de pacientes</h1>
        <a href="/logout.php" class="bg-custom-button hover:opacity-90 text-white px-4 py-2 rounded-lg text-sm font-medium">
            Cerrar sesión
        </a> 
    </div>

    <div class="mx-6 md:mx-10 my-6 bg-custom-main-box rounded-xl shadow-md p-6">

        <form method="post" action="/consultar" class="flex flex-col sm:flex-row items-end space-y-4 sm:space-y-0 sm:space-x-4 mb-6">
            <div class="w-full sm:flex-grow"> <?php?>
                <label for="nombre_buscar" class="block text-sm font-medium text-custom-title mb-1">Nombre del paciente</label>
                <input 
                    type="text" 
                    id="nombre_buscar" 
                    name="nombre_buscar" 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2" 
                    placeholder="Buscar por nombre..."
                    value="">{aqui creo que va el metodo de busqueda*+}
                >
            </div>
            <div class="w-full sm:w-auto"> <?php?>
                <button 
                    type="submit" 
                    class="w-full sm:w-auto bg-custom-button hover:opacity-90 text-white font-semibold py-2 px-6 rounded-lg h-[42px]" <?php?>
                >
                    Buscar
                </button>
            </div>
        </form>

        <div class="overflow-x-auto"> <?php // Permite scroll horizontal en pantallas pequeñas ?>
            <table class="w-full border-collapse border border-sky-300 bg-white text-sm">
                <thead>
                    <tr class="bg-sky-200 text-custom-title">
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Codigo</th>
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Nombre del Paciente</th>
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Fecha de Nacimiento</th>
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Semanas de Gestacion</th>
                        <th class="border border-sky-300 px-3 py-2 text-left font-medium">Fecha de Evaluacion</th>
                        </tr>
                </thead>
                <tbody>
                    <?php 
                        // Aquí va la lógica para hacer la consulta


                         // Dejo la fila vacía estática para que se vea como la imagen inicialmente:
                         echo '<tr>';
                         echo '<td class="border border-sky-300 px-3 py-2 h-16">&nbsp;</td>'; 
                         echo '<td class="border border-sky-300 px-3 py-2 h-16">&nbsp;</td>';
                         echo '<td class="border border-sky-300 px-3 py-2 h-16">&nbsp;</td>';
                         echo '<td class="border border-sky-300 px-3 py-2 h-16">&nbsp;</td>';
                         echo '<td class="border border-sky-300 px-3 py-2 h-16">&nbsp;</td>';
                         echo '</tr>';
                    ?>
                </tbody>
            </table>
        </div>

    </div> <?php?>

</body>
</html>
