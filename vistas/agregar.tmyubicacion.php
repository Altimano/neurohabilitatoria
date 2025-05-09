<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tono Muscular y Ubicacion</title>
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
    <form id="evaluacionMotorFinoForm" action="?" method="post">
            <p class="text-center text-gray-600 mb-4">Evaluación para el mes: <strong id="mesSeleccionadoDisplay">...</strong></p>

            <div class="mb-6 text-center">
                <label for="fecha_evaluacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de la Evaluacion</label>
                <input type="date" name="fecha_evaluacion" id="fecha_evaluacion" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 inline-block" readonly>
            </div>

            <div class="border-t border-b border-gray-400 py-2 mb-6"><h1 class="text-xl font-semibold text-center text-gray-800">TONO MUSCULAR Y UBICACIÓN</h1></div>
            <div class="text-sm text-center text-gray-700 border-b border-gray-400 pb-4 mb-6"><strong>General(1), Axial(2), Extremidades(3), Miembros Toracicos(4), Membros Pelvicos(5), Hemicuerpo(6), Contralateral(7), Derecho(8), Izquierdo(9)</strong></div>
            <div class="space-y-6 mb-6 text-left">

                <div>
                    <label class="block text-base font-medium text-gray-800 mb-1 text-center border-t pt-2">Hipotonía:</label>
                    <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="1"><label for="tu_hipotonia_1">General(1)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="2"><label for="tu_hipotonia_2">Axial(2)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="3"><label for="tu_hipotonia_3">Extremidades(3)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="4"><label for="tu_hipotonia_4">Miembros Toracicos(4)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="5"><label for="tu_hipotonia_5">Membros Pelvicos(5)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="6"><label for="tu_hipotonia_6">Hemicuerpo(6)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="7"><label for="tu_hipotonia_7">Contralateral(7)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="8"><label for="tu_hipotonia_D">Derecho(8)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="9"><label for="tu_hipotonia_I">Izquierdo(9)</label></div>
                    </div>
                </div>
                 <div>
                     <label class="block text-base font-medium text-gray-800 mb-1 text-center border-t pt-2">Hipertonía:</label>
                     <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="1"><label for="tu_hipotonia_1">General(1)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="2"><label for="tu_hipotonia_2">Axial(2)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="3"><label for="tu_hipotonia_3">Extremidades(3)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="4"><label for="tu_hipotonia_4">Miembros Toracicos(4)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="5"><label for="tu_hipotonia_5">Membros Pelvicos(5)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="6"><label for="tu_hipotonia_6">Hemicuerpo(6)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="7"><label for="tu_hipotonia_7">Contralateral(7)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="8"><label for="tu_hipotonia_D">Derecho(8)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="9"><label for="tu_hipotonia_I">Izquierdo(9)</label></div>
                    </div>
                </div>
                 <div>
                     <label class="block text-base font-medium text-gray-800 mb-1 text-center border-t pt-2">Mixto (Hipotonía + Espasticidad):</label>
                     <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="1"><label for="tu_hipotonia_1">General(1)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="2"><label for="tu_hipotonia_2">Axial(2)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="3"><label for="tu_hipotonia_3">Extremidades(3)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="4"><label for="tu_hipotonia_4">Miembros Toracicos(4)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="5"><label for="tu_hipotonia_5">Membros Pelvicos(5)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="6"><label for="tu_hipotonia_6">Hemicuerpo(6)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="7"><label for="tu_hipotonia_7">Contralateral(7)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="8"><label for="tu_hipotonia_D">Derecho(8)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="9"><label for="tu_hipotonia_I">Izquierdo(9)</label></div>
                    </div>
                </div>
                 <div>
                     <label class="block text-base font-medium text-gray-800 mb-1 text-center border-t pt-2">Fluctuante:</label>
                     <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="1"><label for="tu_hipotonia_1">General(1)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="2"><label for="tu_hipotonia_2">Axial(2)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="3"><label for="tu_hipotonia_3">Extremidades(3)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="4"><label for="tu_hipotonia_4">Miembros Toracicos(4)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="5"><label for="tu_hipotonia_5">Membros Pelvicos(5)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="6"><label for="tu_hipotonia_6">Hemicuerpo(6)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="7"><label for="tu_hipotonia_7">Contralateral(7)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="8"><label for="tu_hipotonia_D">Derecho(8)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="9"><label for="tu_hipotonia_I">Izquierdo(9)</label></div>
                    </div>
                </div>
                 <div>
                     <label class="block text-base font-medium text-gray-800 mb-1 text-center border-t pt-2">Normal:</label>
                     <div class="checkbox-group-container flex flex-wrap justify-center gap-x-4 gap-y-2">
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_1" name="tu_hipotonia[]" value="1"><label for="tu_hipotonia_1">General(1)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_2" name="tu_hipotonia[]" value="2"><label for="tu_hipotonia_2">Axial(2)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_3" name="tu_hipotonia[]" value="3"><label for="tu_hipotonia_3">Extremidades(3)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_4" name="tu_hipotonia[]" value="4"><label for="tu_hipotonia_4">Miembros Toracicos(4)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_5" name="tu_hipotonia[]" value="5"><label for="tu_hipotonia_5">Membros Pelvicos(5)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_6" name="tu_hipotonia[]" value="6"><label for="tu_hipotonia_6">Hemicuerpo(6)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_7" name="tu_hipotonia[]" value="7"><label for="tu_hipotonia_7">Contralateral(7)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_D" name="tu_hipotonia[]" value="8"><label for="tu_hipotonia_D">Derecho(8)</label></div>
                         <div class="checkbox-item"><input type="checkbox" id="tu_hipotonia_I" name="tu_hipotonia[]" value="9"><label for="tu_hipotonia_I">Izquierdo(9)</label></div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                 <a href="agregar.mfino.php">
                     <button type="button" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">ANTERIOR</button>
                 </a>
                 <button type="button" id="botonSiguientePaso" class="bg-custom-button hover:opacity-90 text-white px-6 py-2 rounded-lg text-sm font-medium shadow">SIGUIENTE</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('fecha_evaluacion');
            const sessionKey = 'evaluacionPaso4_mfino';
            const datosGuardados = sessionStorage.getItem(sessionKey);
             let datosJson = {};
             if (datosGuardados) { try { datosJson = JSON.parse(datosGuardados); } catch(e) { console.error("Error P4_M Fino:", e); sessionStorage.removeItem(sessionKey); } }
             if (dateInput) {
                 if(datosJson.fecha_evaluacion) { dateInput.value = datosJson.fecha_evaluacion; }
                 else { 
                      const dP3R = sessionStorage.getItem('evaluacionPaso3_mgrueso');
                      if(dP3R){ try{ const dP3 = JSON.parse(dP3R); if(dP3.fecha_evaluacion) dateInput.value = dP3.fecha_evaluacion; }catch(e){} }
                      if(!dateInput.value) { const t = new Date(); dateInput.value = `${t.getFullYear()}-${String(t.getMonth()+1).padStart(2,'0')}-${String(t.getDate()).padStart(2,'0')}`; }
                 }
             }

            const mesDisplay = document.getElementById('mesSeleccionadoDisplay');
            const datosPaso1Raw = sessionStorage.getItem('evaluacionPaso1');
            if (datosPaso1Raw) {
                 try { const dP1 = JSON.parse(datosPaso1Raw); if (mesDisplay && dP1.mes) mesDisplay.textContent = dP1.mes; } catch(e){ if(mesDisplay) mesDisplay.textContent = 'Error';}
             } else if(mesDisplay) { mesDisplay.textContent = 'No disponible'; }

             const form = document.getElementById('evaluacionMotorFinoForm');
             if(form && datosJson) {
                 const selects = form.querySelectorAll('select');
                 selects.forEach(select => { if(datosJson[select.name]) { select.value = datosJson[select.name]; } });
             }

            const botonSiguiente = document.getElementById('botonSiguientePaso');
            if (botonSiguiente && form) {
                botonSiguiente.addEventListener('click', function() {
                    const formDataFino = new FormData(form);
                    const datosPaso = {};
                    formDataFino.forEach((value, key) => { datosPaso[key] = value; });
                    if(dateInput) datosPaso['fecha_evaluacion'] = dateInput.value;

                    try {
                        sessionStorage.setItem(sessionKey, JSON.stringify(datosPaso));

                        window.location.href = 'agregar.posturasysignos.php';

                    } catch(e) { console.error("Error guardando P4_M Fino:", e); alert("Hubo un error al guardar."); }
                });
            }
        });
    </script>
</body>
</html>