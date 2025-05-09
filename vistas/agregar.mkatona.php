<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katona</title>
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
        <form id="evaluacionKatonaForm">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">MANIOBRAS DE KATONA</h1></div>

            <div class="legend-text border-b border-gray-400 pb-4 mb-6">
                <strong>Normal(N), Hipotonía(-), Hipertonía(+), Miembros Toracicos(MTs), Miembro Pelvico(MP), Extremidades(E), Hemicuerpo(H), Control Lateral(CL), Derecha(D), Izquierda(I), Ausente(A), Extremidades(E)</strong>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div>
                    <label for="mk_elev_tronco_manos" class="block text-sm font-medium text-gray-700 mb-1">Elevación de tronco (tracción de manos)</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                <div>
                    <label for="mk_elev_tronco_cadera" class="block text-sm font-medium text-gray-700 mb-1">Elevación de tronco (espalda-cadera)</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                 <div>
                    <label for="mk_sentado_aire" class="block text-sm font-medium text-gray-700 mb-1">Sentado al aire</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                 <div>
                    <label for="mk_rotacion_izq_der" class="block text-sm font-medium text-gray-700 mb-1">Rotacion izquierda y derecha</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                 <div>
                    <label for="mk_gateo_asistido" class="block text-sm font-medium text-gray-700 mb-1">Gateo asistido</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                 <div>
                    <label for="mk_gateo_asistido_mod" class="block text-sm font-medium text-gray-700 mb-1">Gateo asistido modificado</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                 <div>
                    <label for="mk_arrastre_horizontal" class="block text-sm font-medium text-gray-700 mb-1">Arrastre horizontal</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                 <div>
                    <label for="mk_marcha_plano_horizontal" class="block text-sm font-medium text-gray-700 mb-1">Marcha en plano horizontal</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                <div>
                    <label for="mk_marcha_plano_ascendente" class="block text-sm font-medium text-gray-700 mb-1">Marcha en plano ascendente</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                 <div>
                    <label for="mk_arrastre_inclinado_desc" class="block text-sm font-medium text-gray-700 mb-1">Arrastre en plano inclinado descendente</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
                 <div>
                    <label for="mk_arrastre_inclinado_asc" class="block text-sm font-medium text-gray-700 mb-1">Arrastre en plano inclinado ascendente</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="N"><label for="tu_hipotonia_1">Normal(N)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="H-"><label for="tu_hipotonia_2">Hipotonía(-)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="H+"><label for="tu_hipotonia_3">Hipertonía(+)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="MTs"><label for="tu_hipotonia_4">Miembros Toracicos(MTs)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="MP"><label for="tu_hipotonia_5">Membros Pelvicos(MP)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_6">Extremidades(E)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="H"><label for="tu_hipotonia_7">Hemicuerpo(H)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="CL"><label for="tu_hipotonia_D">Control Lateral(CL)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="D"><label for="tu_hipotonia_I">Derecha(D)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="I"><label for="tu_hipotonia_I">Izquierda(I)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="A"><label for="tu_hipotonia_I">Ausente(A)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="E"><label for="tu_hipotonia_I">Extremidades(E)</label></div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                 <a href="agregar.view.php">
                     <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                 </a>
                 <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const datosGuardados = sessionStorage.getItem('evaluacionPaso2_mkatona');
            let datosJson = {};
             if (datosGuardados) {
                 try { datosJson = JSON.parse(datosGuardados); }
                 catch(e) { console.error("Error P2_Katona:", e); sessionStorage.removeItem('evaluacionPaso2_mkatona');}
             }
             if (dateInput) {
                if(datosJson.fecha_evaluacion) { dateInput.value = datosJson.fecha_evaluacion; }
                else {
                     const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
                      if(datosPaso1Raw){
                         try{
                              const datosPaso1 = JSON.parse(datosPaso1Raw);
                         } catch(e){}
                      }
                     if(!dateInput.value) {
                         const today = new Date();
                         const year = today.getFullYear();
                         const month = String(today.getMonth() + 1).padStart(2, '0');
                         const day = String(today.getDate()).padStart(2, '0');
                         dateInput.value = `${year}-${month}-${day}`;
                     }
                }
            }

            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
            let mesSeleccionado = null;
            if (datosPaso1Raw) {
                 try {
                     const datosPaso1 = JSON.parse(datosPaso1Raw);
                     mesSeleccionado = datosPaso1.mes;
                     if (mesDisplay && mesSeleccionado) { mesDisplay.textContent = mesSeleccionado; }
                     else if(mesDisplay) { mesDisplay.textContent = 'No especificado'; }
                 } catch(e){ if(mesDisplay) mesDisplay.textContent = 'Error'; }
            } else if(mesDisplay) {
                 mesDisplay.textContent = 'No disponible';
            }

            const form = document.getElementById('evaluacionKatonaForm');
            if(form && datosJson) {
                const selects = form.querySelectorAll('select');
                selects.forEach(select => {
                    if(datosJson[select.name]) { select.value = datosJson[select.name]; }
                });
            }
            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const formDataKatona = new FormData(form);
                    const datosPaso2 = {};
                    formDataKatona.forEach((value, key) => { datosPaso2[key] = value; });
                    if(dateInput) datosPaso2['fecha_evaluacion'] = dateInput.value;

                    try {
                        sessionStorage.setItem('evaluacionPaso2_mkatona', JSON.stringify(datosPaso2));
                        window.location.href = 'agregar.mgrueso.php';
                    } catch(e) {
                        console.error("Error al guardar datos P2_Katona:", e);
                        alert("Hubo un error al guardar los datos de este paso.");
                    }
                });
            }
        });
    </script>
</body>
</html>