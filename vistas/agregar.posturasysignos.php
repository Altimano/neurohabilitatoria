<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Evaluación - Postura y Signos</title>
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
        <form id="evaluacionPosturaSignosForm" action="?" method="post">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="text-center legend-text border-t border-b border-gray-400 py-2 mb-6">
                 <strong>Axial(1), Mentón Clínico(2), Miembro Sup(3), Pelvis(4), Cintura Esc(5), Derecho(6), Izquierdo(7) </strong> 
            </div>

            <div class="section-title"><h1 class="text-xl font-semibold text-center text-gray-800">POSTURA</h1></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                 <div>
                    <label for="ps_asimetria" class="block text-sm font-medium text-gray-700 mb-1">Asimetría</label>
                    <select name="ps_asimetria" id="ps_asimetria" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option>
                        <option value="2">Mentón Clínico(2)</option>
                        <option value="3">Miembro Sup(3)</option>
                        <option value="4">Pelvis(4)</option>
                        <option value="5">Cintura Esc(5)</option>
                        <option value="6">Derecho(6)</option>
                        <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
            </div>

             <div class="section-title"><h1 class="text-xl font-semibold text-center text-gray-800">SIGNOS DE ALARMA</h1></div>
             <p class="section-note"></p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div>
                    <label for="ps_aduccion_pulgares" class="block text-sm font-medium text-gray-700 mb-1">Aducción de pulgares</label>
                    <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                <div>
                    <label for="ps_estrabismo" class="block text-sm font-medium text-gray-700 mb-1">Estrabismo</label>
                    <select name="ps_estrabismo" id="ps_estrabismo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                <div>
                    <label for="ps_irritabilidad" class="block text-sm font-medium text-gray-700 mb-1">Irritabilidad</label>
                    <select name="ps_irritabilidad" id="ps_irritabilidad" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                         <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                <div>
                    <label for="ps_marcha_en_punta" class="block text-sm font-medium text-gray-700 mb-1">Marcha en punta</label>
                    <select name="ps_marcha_en_punta" id="ps_marcha_en_punta" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                         <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                <div>
                    <label for="ps_marcha_cruzada" class="block text-sm font-medium text-gray-700 mb-1">Marcha Cruzada</label>
                    <select name="ps_marcha_cruzada" id="ps_marcha_cruzada" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                         <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="ps_punos_cerrados" class="block text-sm font-medium text-gray-700 mb-1">Puños cerrados</label>
                    <select name="ps_punos_cerrados" id="ps_punos_cerrados" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                         <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                <div>
                    <label for="ps_reflejo_hiperextension" class="block text-sm font-medium text-gray-700 mb-1">Reflejo de hiperextensión</label>
                    <select name="ps_reflejo_hiperextension" id="ps_reflejo_hiperextension" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                         <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="ps_lenguaje_escaso" class="block text-sm font-medium text-gray-700 mb-1">Lenguaje escaso</label>
                    <select name="ps_lenguaje_escaso" id="ps_lenguaje_escaso" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                         <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                 <a href="agregar.tmyubicacion.php">
                     <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                 </a>
                 <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionPaso6_posturaysignos';
            const datosGuardados = sessionStorage.getItem(sessionKey);
             let datosJson = {};
             if (datosGuardados) { try { datosJson = JSON.parse(datosGuardados); } catch(e) { console.error("Error P6_PosturaSignos:", e); sessionStorage.removeItem(sessionKey); } }
             if (dateInput) {
                 if(datosJson.fecha_evaluacion) { dateInput.value = datosJson.fecha_evaluacion; }
                 else {
                      const dP5R = sessionStorage.getItem('evaluacionPaso5_tmyubicacion');
                      if(dP5R){ try{ const dP5 = JSON.parse(dP5R); if(dP5.fecha_evaluacion) dateInput.value = dP5.fecha_evaluacion; }catch(e){} }
                      if(!dateInput.value) { const t = new Date(); dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; }
                 }
             }
            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
            if (datosPaso1Raw) {
                 try { const dP1 = JSON.parse(datosPaso1Raw); if (mesDisplay && dP1.mes) mesDisplay.textContent = dP1.mes; } catch(e){ if(mesDisplay) mesDisplay.textContent = 'Error';}
             } else if(mesDisplay) { mesDisplay.textContent = 'No disponible'; }

             const form = document.getElementById('evaluacionPosturaSignosForm');
             if(form && datosJson) {
                 const selects = form.querySelectorAll('select');
                 selects.forEach(select => { if(datosJson[select.name]) { select.value = datosJson[select.name]; } });
             }
            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const formData = new FormData(form);
                    const datosPaso = {};
                    formData.forEach((value, key) => { datosPaso[key] = value; });
                    if(dateInput) datosPaso['fecha_evaluacion'] = dateInput.value;

                    try {
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso));
                        window.location.href = 'agregar.hitomgrueso.php';

                    } catch(e) { console.error("Error guardando P6_PosturaSignos:", e); alert("Hubo un error al guardar."); }
                });
            }
        });
    </script>
</body>
</html>