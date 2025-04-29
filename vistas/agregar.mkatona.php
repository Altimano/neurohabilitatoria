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
                <strong>Normal(N), Hipotonía(-), Hipertonía(+), Asimetría(A), M.Sup.(MS), M.Inf.(MI), Facial(F), Cuello(C), Tronco(T), Global(G), Hemicuerpo(H), C.Valgo(Cv), C.Varo(Cvr), Derecha(D), Izquierda(I), Supinador(S), Pronador(Pr), Flexión(Fx), Extensión(Ex), Dudoso(?), Ausente(Au), Dismetrías(Ds)</strong>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                <div>
                    <label for="mk_elev_tronco_manos" class="block text-sm font-medium text-gray-700 mb-1">Elevación de tronco (tracción de manos)</label>
                    <select name="mk_elev_tronco_manos" id="mk_elev_tronco_manos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="N">N (Normal)</option> <option value="-">- (Hipotonía)</option> <option value="+">+ (Hipertonía)</option> <option value="A">A (Asimetría)</option> <option value="MS">MS (M.Sup.)</option> <option value="MI">MI (M.Inf.)</option> <option value="F">F (Facial)</option> <option value="C">C (Cuello)</option> <option value="T">T (Tronco)</option> <option value="G">G (Global)</option> <option value="H">H (Hemicuerpo)</option> <option value="Cv">Cv (C.Valgo)</option> <option value="Cvr">Cvr (C.Varo)</option> <option value="D">D (Derecha)</option> <option value="I">I (Izquierda)</option> <option value="S">S (Supinador)</option> <option value="Pr">Pr (Pronador)</option> <option value="Fx">Fx (Flexión)</option> <option value="Ex">Ex (Extensión)</option> <option value="?">? (Dudoso)</option> <option value="Au">Au (Ausente)</option> <option value="Ds">Ds (Dismetrías)</option>
                    </select>
                </div>
                <div>
                    <label for="mk_elev_tronco_espalda" class="block text-sm font-medium text-gray-700 mb-1">Elevación de tronco (espalda-cuello)</label>
                    <select name="mk_elev_tronco_espalda" id="mk_elev_tronco_espalda" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                 <div>
                    <label for="mk_sentado_aire" class="block text-sm font-medium text-gray-700 mb-1">Sentado al aire</label>
                    <select name="mk_sentado_aire" id="mk_sentado_aire" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                 <div>
                    <label for="mk_marcha_izq_der" class="block text-sm font-medium text-gray-700 mb-1">Marcha izqda y derecha</label>
                    <select name="mk_marcha_izq_der" id="mk_marcha_izq_der" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                 <div>
                    <label for="mk_gateo_asistido" class="block text-sm font-medium text-gray-700 mb-1">Gateo asistido</label>
                    <select name="mk_gateo_asistido" id="mk_gateo_asistido" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                 <div>
                    <label for="mk_gateo_asistido_mod" class="block text-sm font-medium text-gray-700 mb-1">Gateo asistido modificado</label>
                    <select name="mk_gateo_asistido_mod" id="mk_gateo_asistido_mod" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                 <div>
                    <label for="mk_arrastre_horizontal" class="block text-sm font-medium text-gray-700 mb-1">Arrastre horizontal</label>
                    <select name="mk_arrastre_horizontal" id="mk_arrastre_horizontal" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                 <div>
                    <label for="mk_marcha_plano_horizontal" class="block text-sm font-medium text-gray-700 mb-1">Marcha en plano horizontal</label>
                    <select name="mk_marcha_plano_horizontal" id="mk_marcha_plano_horizontal" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                <div>
                    <label for="mk_marcha_plano_ascendente" class="block text-sm font-medium text-gray-700 mb-1">Marcha en plano ascendente</label>
                    <select name="mk_marcha_plano_ascendente" id="mk_marcha_plano_ascendente" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                 <div>
                    <label for="mk_arrastre_inclinado_desc" class="block text-sm font-medium text-gray-700 mb-1">Arrastre en plano inclinado descendente</label>
                    <select name="mk_arrastre_inclinado_desc" id="mk_arrastre_inclinado_desc" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
                </div>
                 <div>
                    <label for="mk_arrastre_inclinado_asc" class="block text-sm font-medium text-gray-700 mb-1">Arrastre en plano inclinado ascendente</label>
                    <select name="mk_arrastre_inclinado_asc" id="mk_arrastre_inclinado_asc" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                         <option value="" disabled selected>Seleccione</option>
                         <option value="N">N</option> <option value="-">-</option> <option value="+">+</option> <option value="A">A</option> <option value="MS">MS</option> <option value="MI">MI</option> <option value="F">F</option> <option value="C">C</option> <option value="T">T</option> <option value="G">G</option> <option value="H">H</option> <option value="Cv">Cv</option> <option value="Cvr">Cvr</option> <option value="D">D</option> <option value="I">I</option> <option value="S">S</option> <option value="Pr">Pr</option> <option value="Fx">Fx</option> <option value="Ex">Ex</option> <option value="?">?</option> <option value="Au">Au</option> <option value="Ds">Ds</option>
                    </select>
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