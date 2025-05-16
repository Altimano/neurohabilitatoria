<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Evaluación - Hitos Motor Grueso</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <style>
         .bg-custom-header-area { background-color: #FFFFFF; }
         .bg-custom-main-box { background-color: #E0F2FE; }
         .bg-custom-button { background-color: #0284C7; }
         .text-custom-title { color: #0369A1; }
         input[readonly] { background-color: #f3f4f6; cursor: default; }
         input[type="date"][readonly] { background-color: #f3f4f6; cursor: default; }
         .section-note { font-size: 0.8rem; color: #777; text-align: center; margin-top: -1rem; margin-bottom: 1.5rem; }
     </style>
</head>
<body class="bg-gray-100">

    <div class="text-center my-6"><h3 class="text-2xl font-bold text-custom-title">Agregar una Evaluacion</h3></div>

    <div class="mx-6 md:mx-10 mb-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <form id="evaluacionHitoMGruesoForm" action="?" method="post">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-2"><h1 class="text-xl font-semibold text-center text-gray-800">HITOS DE DESARROLLO CONSOLIDADOS</h1></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div>
                    <label for="hg_control_cefalico" class="block text-sm font-medium text-gray-700 mb-1">Control cefálico</label>
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
                <div>
                    <label for="hg_posicion_sentado" class="block text-sm font-medium text-gray-700 mb-1">Posición de sentado</label>
                    <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="hg_reacciones_proteccion" class="block text-sm font-medium text-gray-700 mb-1">Reacciones de protección</label>
                    <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="hg_patron_arrastre" class="block text-sm font-medium text-gray-700 mb-1">Patrón de arrastre</label>
                    <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="hg_patron_gateo" class="block text-sm font-medium text-gray-700 mb-1">Patrón de gateo</label>
                    <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="hg_mov_posturales_autonomos" class="block text-sm font-medium text-gray-700 mb-1">Movimientos posturales autónomos</label>
                    <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                <div>
                    <label for="hg_patron_marcha_independiente" class="block text-sm font-medium text-gray-700 mb-1">Patrón de marcha independiente</label>
                    <select name="ps_aduccion_pulgares" id="ps_aduccion_pulgares" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                 <a href="agregar.posturasysignos.php">
                     <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                 </a>
                 <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionPaso7_hitomgrueso';
            const datosGuardados = sessionStorage.getItem(sessionKey);
             let datosJson = {};
             if (datosGuardados) { try { datosJson = JSON.parse(datosGuardados); } catch(e) { console.error("Error P7_HitoMG:", e); sessionStorage.removeItem(sessionKey); } }
             if (dateInput) {
                 if(datosJson.fecha_evaluacion) { dateInput.value = datosJson.fecha_evaluacion; }
                 else {
                      const dP6R = sessionStorage.getItem('evaluacionPaso6_posturaysignos');
                      if(dP6R){ try{ const dP6 = JSON.parse(dP6R); if(dP6.fecha_evaluacion) dateInput.value = dP6.fecha_evaluacion; }catch(e){} }
                      if(!dateInput.value) { const t = new Date(); dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; }
                 }
             }
            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
            if (datosPaso1Raw) {
                 try { const dP1 = JSON.parse(datosPaso1Raw); if (mesDisplay && dP1.mes) mesDisplay.textContent = dP1.mes; } catch(e){ if(mesDisplay) mesDisplay.textContent = 'Error';}
             } else if(mesDisplay) { mesDisplay.textContent = 'No disponible'; }

             const form = document.getElementById('evaluacionHitoMGruesoForm');
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
                        window.location.href = 'agregar.hitomfino.php';

                    } catch(e) { console.error("Error guardando P7_HitoMG:", e); alert("Hubo un error al guardar."); }
                });
            }
        });
    </script>
</body>
</html>