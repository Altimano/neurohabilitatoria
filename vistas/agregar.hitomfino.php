<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Evaluación - Hitos de Desarrollo Motricidad Fina</title>
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
        <form id="evaluacionHitoMFinoForm" action="?" method="post">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-2"><h1 class="text-xl font-semibold text-center text-gray-800">HITOS DE DESARROLLO MOTRICIDAD FINA</h1></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div>
                    <label for="hf_fijacion_ocular" class="block text-sm font-medium text-gray-700 mb-1">Fijación Ocular (FO)</label>
                    <select name="hf_fijacion_ocular" id="hf_fijacion_ocular" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
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
                    <label for="hf_cubito_palmar" class="block text-sm font-medium text-gray-700 mb-1">Cubito-Palmar (CP)</label>
                    <select name="hf_cubito_palmar" id="hf_cubito_palmar" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="hf_prension_palmar_r" class="block text-sm font-medium text-gray-700 mb-1">Prensión Palmar + R (PPR)</label>
                    <select name="hf_prension_palmar_r" id="hf_prension_palmar_r" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="hf_pinza_inferior" class="block text-sm font-medium text-gray-700 mb-1">Pinza Inferior (PI)</label>
                    <select name="hf_pinza_inferior" id="hf_pinza_inferior" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="hf_pinza_fina" class="block text-sm font-medium text-gray-700 mb-1">Pinza Fina (PF)*</label>
                    <select name="hf_pinza_fina" id="hf_pinza_fina" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                 <div>
                    <label for="hf_abajamiento_colab" class="block text-sm font-medium text-gray-700 mb-1">Abajamiento/Colaboración (Ab*)</label>
                    <select name="hf_abajamiento_colab" id="hf_abajamiento_colab" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
                <div>
                    <label for="hf_coord_ojo_mano" class="block text-sm font-medium text-gray-700 mb-1">Coordinación Ojo-mano (CO)</label>
                    <select name="hf_coord_ojo_mano" id="hf_coord_ojo_mano" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1">Axial(1)</option> <option value="2">Mentón Clínico(2)</option> <option value="3">Miembro Sup(3)</option> <option value="4">Pelvis(4)</option> <option value="5">Cintura Esc(5)</option> <option value="6">Derecho(6)</option> <option value="7">Izquierdo(7)</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                 <a href="agregar.hitomgrueso.php">
                     <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                 </a>
                 <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionPaso8_hitomfino';
            const datosGuardados = sessionStorage.getItem(sessionKey);
             let datosJson = {};
             if (datosGuardados) { try { datosJson = JSON.parse(datosGuardados); } catch(e) { console.error("Error P8_HitoMF:", e); sessionStorage.removeItem(sessionKey); } }
             if (dateInput) {
                 if(datosJson.fecha_evaluacion) { dateInput.value = datosJson.fecha_evaluacion; }
                 else {
                      const dP7R = sessionStorage.getItem('evaluacionPaso7_hitomgrueso');
                      if(dP7R){ try{ const dP7 = JSON.parse(dP7R); if(dP7.fecha_evaluacion) dateInput.value = dP7.fecha_evaluacion; }catch(e){} }
                      if(!dateInput.value) { const t = new Date(); dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; }
                 }
             }

            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
            if (datosPaso1Raw) {
                 try { const dP1 = JSON.parse(datosPaso1Raw); if (mesDisplay && dP1.mes) mesDisplay.textContent = dP1.mes; } catch(e){ if(mesDisplay) mesDisplay.textContent = 'Error';}
             } else if(mesDisplay) { mesDisplay.textContent = 'No disponible'; }

             const form = document.getElementById('evaluacionHitoMFinoForm');
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
                        window.location.href = '.php';

                    } catch(e) { console.error("Error guardando P8_HitoMF:", e); alert("Hubo un error al guardar."); }
                });
            }
        });
    </script>
</body>
</html>