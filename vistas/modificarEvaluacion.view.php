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
<!-- TOMAR EN CUENTA LOS NOMBRES DE LOS CAMPOS PARA USARLOS EN LA BD NUEVA -->
    <div class="m-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-custom-title mb-4">Modificar Evaluación</h2>
        <form method="post" action="/modificarEvaluacion">
            <input type="hidden" name="id_terapia" value="<?= htmlspecialchars($evaluaciones['id_terapia_neurohabilitatoria']) ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-custom-title">Nombre de Paciente</label>
                    <input type="text" name="nombre_pacinete" readonly value="<?= htmlspecialchars($evaluaciones['nombre_pacinete']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Fecha de Inicio de Terapia</label>
                    <input type="date" name="dat_ter_fec_ini_tratam_terap" value="<?= htmlspecialchars($evaluaciones['dat_ter_fec_ini_tratam_terap']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Tipo de Terapia</label>
                    <input type="text" name="dat_ter_tipo_terapia" value="<?= htmlspecialchars($evaluaciones['dat_ter_tipo_terapia']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Area de Evaluacion</label>
                    <select id="myselect" name="area" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="maniobras">Maniobras Katona</option>
                        <option value="motor">Motor Grueso/Movimientos Posturales</option>
                        <option value="fino">Motor Fino</option>
                        <option value="tono">Tono Muscular y Ubicacion</option>
                        <option value="signos">Signos de Alarma (Colocar un 1)</option>
                    </select>
                </div>

                <!-- Maniobras Katona EMPIEZAN -->

                <div id="maniobras">
                <div>
                    <label class="block text-sm font-medium text-custom-title">Elevación de tronco (tracción de manos)</label>
                    <input type="number" min="0" max="4"  name="maniobra_elevacion_traccion" value="<?= htmlspecialchars($evaluaciones['maniobra_elevacion_traccion']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Elevación de tronco (espalda-cadera)</label>
                    <input type="number" min="0" max="4" name="maniobra_elevacion_espalda" value="<?= htmlspecialchars($evaluaciones['maniobra_elevacion_espalda']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Sentado al aire</label>
                    <input type="number" min="0" max="4" name="maniobra_sentado" value="<?= htmlspecialchars($evaluaciones['maniobra_sentado']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Rotación izquierda y derecha</label>
                    <input type="number" min="0" max="4" name="maniobra_rotacion_izqDer" value="<?= htmlspecialchars($evaluaciones['maniobra_rotacion_izqDer']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Gateo asistido</label>
                    <input type="number" min="0" max="4" name="maniobra_gateo_asistido" value="<?= htmlspecialchars($evaluaciones['maniobra_gateo_asistido']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Gateo asistido modificado</label>
                    <input type="number" min="0" max="4" name="maniobra_gateo_asistidoMod" value="<?= htmlspecialchars($evaluaciones['maniobra_gateo_asistidoMod']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Arrastre horizontal</label>
                    <input type="number" min="0" max="4" name="maniobra_arrastre_horiz" value="<?= htmlspecialchars($evaluaciones['maniobra_arrastre_horiz']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Marcha en plano horizontal</label>
                    <input type="number" min="0" max="4" name="maniobra_marcha_planoHoriz" value="<?= htmlspecialchars($evaluaciones['maniobra_marcha_planoHoriz']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Marcha en plano ascendente</label>
                    <input type="number" min="0" max="4" name="maniobra_marcha_planoAsc" value="<?= htmlspecialchars($evaluaciones['maniobra_marcha_planoAsc']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Arrastre en plano inclinado descendente</label>
                    <input type="number" min="0" max="4" name="maniobra_arrastre_inclinadoDesc" value="<?= htmlspecialchars($evaluaciones['maniobra_arrastre_inclinadoDesc']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Arrastre en plano inclinado ascendente</label>
                    <input type="number" min="0" max="4" name="maniobra_arrastre_inclinadoAsc" value="<?= htmlspecialchars($evaluaciones['maniobra_arrastre_inclinadoAsc']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                </div>

                <!-- FIN DE MANIOBRAS KATONA -->

                <!-- EMPIEZA SUBESCALAS DEL MOTOR GRUESO/MOVIMIENTOS POSTURALES-->
                <div id="motor">
                <div>
                    <label class="block text-sm font-medium text-custom-title">Control cefálico</label>
                    <input type="number" min="0" max="4"  name="subesc_cf" value="<?= htmlspecialchars($evaluaciones['subesc_cf']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Sobre el abdomen levanta tórax apoyando brazos</label>
                    <input type="number" min="0" max="4" name="subesc_sobre_ab" value="<?= htmlspecialchars($evaluaciones['subesc_sobre_ab']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Sentado con reacción de protección delantera</label>
                    <input type="number" min="0" max="4" name="subesc_sent_prot_del" value="<?= htmlspecialchars($evaluaciones['subesc_sent_prot_del']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Cambio de decúbito prono a decúbito supino</label>
                    <input type="number" min="0" max="4" name="subesc_camb_decub" value="<?= htmlspecialchars($evaluaciones['subesc_camb_decub']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Sentado sin apoyo</label>
                    <input type="number" min="0" max="4" name="subesc_sent_sin_apoyo" value="<?= htmlspecialchars($evaluaciones['subesc_sent_sin_apoyo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Reacciones de protección laterales y delanteras</label>
                    <input type="number" min="0" max="4" name="subesc_reac_lat_del" value="<?= htmlspecialchars($evaluaciones['subesc_reac_lat_del']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Cambio de posición sedente a decúbito prono</label>
                    <input type="number" min="0" max="4" name="subesc_pos_sed_decub" value="<?= htmlspecialchars($evaluaciones['subesc_pos_sed_decub']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Patrón de arrastre</label>
                    <input type="number" min="0" max="4" name="subesc_patron_arrastre" value="<?= htmlspecialchars($evaluaciones['subesc_patron_arrastre']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Cambio de posición cuatro puntos a hincado</label>
                    <input type="number" min="0" max="4" name="subesc_pos_hincado" value="<?= htmlspecialchars($evaluaciones['subesc_pos_hincado']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Patrón de gateo independiente</label>
                    <input type="number" min="0" max="4" name="subesc_patron_gateo" value="<?= htmlspecialchars($evaluaciones['subesc_patron_gateo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Gateo en diferentes niveles (colchón, planos, etc.)</label>
                    <input type="number" min="0" max="4" name="subesc_gateo_niveles" value="<?= htmlspecialchars($evaluaciones['subesc_gateo_niveles']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Transición gateo a bipedestación</label>
                    <input type="number" min="0" max="4" name="subesc_trans_bipedest" value="<?= htmlspecialchars($evaluaciones['subesc_trans_bipedest']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Comienza el patrón de marcha</label>
                    <input type="number" min="0" max="4" name="subesc_patr_marcha" value="<?= htmlspecialchars($evaluaciones['subesc_patr_marcha']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Se pone de pie momentáneamente sin apoyarse</label>
                    <input type="number" min="0" max="4" name="subesc_pie_momentaneo" value="<?= htmlspecialchars($evaluaciones['subesc_pie_momentaneo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Camina hacia atrás</label>
                    <input type="number" min="0" max="4" name="subesc_camina_atras" value="<?= htmlspecialchars($evaluaciones['subesc_camina_atras']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Camina solo (cae frecuentemente)</label>
                    <input type="number" min="0" max="4" name="subesc_camina_solo_cae_frec" value="<?= htmlspecialchars($evaluaciones['subesc_camina_solo_cae_frec']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Sube escaleras apoyándose en ambas manos</label>
                    <input type="number" min="0" max="4" name="subesc_esca_ambas_manos" value="<?= htmlspecialchars($evaluaciones['subesc_esca_ambas_manos']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Patea una pelota</label>
                    <input ttype="number" min="0" max="4" name="subesc_patea_pelota" value="<?= htmlspecialchars($evaluaciones['subesc_patea_pelota']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Sube escaleras gateando</label>
                    <input type="number" min="0" max="4" name="subesc_esc_gateando" value="<?= htmlspecialchars($evaluaciones['subesc_esc_gateando']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Corre (con rigidez)</label>
                    <input type="number" min="0" max="4" name="subesc_corre_con_rig" value="<?= htmlspecialchars($evaluaciones['subesc_corre_con_rig']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Camina solo (cae rara vez)</label>
                    <input type="number" min="0" max="4" name="subesc_camina_solo_cae_rara" value="<?= htmlspecialchars($evaluaciones['subesc_camina_solo_cae_rara']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Sube y baja escaleras sostenido de una mano</label>
                    <input type="number" min="0" max="4" name="subesc_esc_una_mano" value="<?= htmlspecialchars($evaluaciones['subesc_esc_una_mano']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Lanza la pelota</label>
                    <input type="number" min="0" max="4" name="subesc_lanza_pelota" value="<?= htmlspecialchars($evaluaciones['subesc_lanza_pelota']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Salta en el sitio</label>
                    <input type="number" min="0" max="4" name="subesc_salta_sitio" value="<?= htmlspecialchars($evaluaciones['subesc_salta_sitio']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Juega en cuclillas</label>
                    <input type="number" min="0" max="4" name="subesc_juega_cuclillas" value="<?= htmlspecialchars($evaluaciones['subesc_juega_cuclillas']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                </div>

                <!-- FIN DE SUBESCALAS DE MOTOR GRUESO -->

                <!-- EMPIEZA SUBESCALAS DEL MOTOR FINO -->

                <div id="motorFino">
                <div>
                    <label class="block text-sm font-medium text-custom-title">Lleva las manos a la línea media</label>
                    <input type="number" min="0" max="4"  name="subesc_manos_linMedia" value="<?= htmlspecialchars($evaluaciones['subesc_manos_linMedia']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Sostiene y mantiene firmemente un objeto con la mano</label>
                    <input type="number" min="0" max="4"  name="subesc_firm_obj_mano" value="<?= htmlspecialchars($evaluaciones['subesc_firm_obj_mano']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Se estira para tomar un objeto con ambas manos</label>
                    <input type="number" min="0" max="4"  name="subesc_obj_ambManos" value="<?= htmlspecialchars($evaluaciones['subesc_obj_ambManos']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Estruja papel, sábanas, ropa, etc.</label>
                    <input type="number" min="0" max="4"  name="subesc_estruja" value="<?= htmlspecialchars($evaluaciones['subesc_estruja']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Toma un objeto y lo transfiere entre sus manos</label>
                    <input type="number" min="0" max="4"  name="subesc_transObjeto" value="<?= htmlspecialchars($evaluaciones['subesc_transObjeto']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Toma objetos que están a su alcance y los examina</label>
                    <input type="number" min="0" max="4"  name="subesc_examObjeto" value="<?= htmlspecialchars($evaluaciones['subesc_examObjeto']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Comienza a desarrollar agarre índice-pulgar</label>
                    <input type="number" min="0" max="4"  name="subesc_agarre_indPulg" value="<?= htmlspecialchars($evaluaciones['subesc_agarre_indPulg']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Inserta objetos en un agujero grande</label>
                    <input type="number" min="0" max="4"  name="subesc_inserta_objAgujero" value="<?= htmlspecialchars($evaluaciones['subesc_inserta_objAgujero']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Pinza superior</label>
                    <input type="number" min="0" max="4"  name="subesc_pinzaSup" value="<?= htmlspecialchars($evaluaciones['subesc_pinzaSup']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Señala con el dedo índice</label>
                    <input type="number" min="0" max="4"  name="subesc_dedoIndice" value="<?= htmlspecialchars($evaluaciones['subesc_dedoIndice']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Forma una torre de dos cubos</label>
                    <input type="number" min="0" max="4"  name="subesc_torre_dos" value="<?= htmlspecialchars($evaluaciones['subesc_torre_dos']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Garabatea espontáneamente por imitación</label>
                    <input type="number" min="0" max="4"  name="subesc_garabImitacion" value="<?= htmlspecialchars($evaluaciones['subesc_garabImitacion']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Toma dos cubos en una mano</label>
                    <input type="number" min="0" max="4"  name="subesc_dosCubos_mano" value="<?= htmlspecialchars($evaluaciones['subesc_dosCubos_mano']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Forma una torre con tres o cuatro cubos</label>
                    <input type="number" min="0" max="4"  name="subesc_torre_tresCuatro" value="<?= htmlspecialchars($evaluaciones['subesc_torre_tresCuatro']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Introduce bolitas en la botella</label>
                    <input type="number" min="0" max="4"  name="subesc_boliBotella" value="<?= htmlspecialchars($evaluaciones['subesc_boliBotella']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Da vuelta a las páginas de un libro (dos o tres a la vez)</label>
                    <input type="number" min="0" max="4"  name="subesc_vueltaPag" value="<?= htmlspecialchars($evaluaciones['subesc_vueltaPag']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Intenta quitar la rosca o tapa de un frasco pequeño</label>
                    <input type="number" min="0" max="4"  name="subesc_quitarTapa" value="<?= htmlspecialchars($evaluaciones['subesc_quitarTapa']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Imita trazo vertical </label>
                    <input type="number" min="0" max="4"  name="subesc_imiTrazo" value="<?= htmlspecialchars($evaluaciones['subesc_imiTrazo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Arma torre de seis cubos</label>
                    <input type="number" min="0" max="4"  name="subesc_torre_seis" value="<?= htmlspecialchars($evaluaciones['subesc_torre_seis']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Arma tren de tres cubos</label>
                    <input type="number" min="0" max="4"  name="subesc_tren_tres" value="<?= htmlspecialchars($evaluaciones['subesc_tren_tres']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                </div>

                <!-- FIN DE SUBESCALAS DE MOTOR FINO -->

                <!--Inicia tono muscular y ubicacion-->

                <div id="tono">

                </div>

                <!--Fin tono muscular y ubicacion-->

                <!--Inicia Postura-->

                <div id="postura">

                </div>

                <!--Termina Postura--> 

                <!--Inicia Signos de Alarma-->
                <div id="signos">
                <div>
                    <label class="block text-sm font-medium text-custom-title">Aducción de pulgares</label>
                    <input type="number" min="0" max="1"  name="signos_aduccionPulg" value="<?= htmlspecialchars($evaluaciones['signos_aduccionPulg']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Estrabismo</label>
                    <input type="number" min="0" max="1"  name="signos_estrabismo" value="<?= htmlspecialchars($evaluaciones['signos_estrabismo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Irritabilidad</label>
                    <input type="number" min="0" max="1"  name="signos_irritabilidad" value="<?= htmlspecialchars($evaluaciones['signos_irritabilidad']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Marcha en punta</label>
                    <input type="number" min="0" max="1"  name="signos_marchaPun" value="<?= htmlspecialchars($evaluaciones['signos_marchaPun']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Marcha Cruzada</label>
                    <input type="number" min="0" max="1"  name="signos_marchaCruz" value="<?= htmlspecialchars($evaluaciones['signos_marchaCruz']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Puños cerrados</label>
                    <input type="number" min="0" max="1"  name="signos_puCerrado" value="<?= htmlspecialchars($evaluaciones['signos_puCerrado']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Reflejo de hiperextensión</label>
                    <input type="number" min="0" max="1"  name="signos_reflejoHiper" value="<?= htmlspecialchars($evaluaciones['signos_reflejoHiper']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Lenguaje escaso</label>
                    <input type="number" min="0" max="1"  name="signos_lenguajeEsc" value="<?= htmlspecialchars($evaluaciones['signos_lenguajeEsc']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm num">
                </div>
                </div>
                <!--Termina Signos de Alarma-->
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-custom-button text-white px-6 py-2 rounded-lg hover:opacity-90">
                    Guardar y Continuar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
<script>
    function validarNumeros(input) {
        
    };
    function validarTexto(input) {
        const valor = input.value;
        if (valor.trim() === "") {
            alert("Este campo no puede estar vacío.");
            input.value = ""; 
        }
    };

    function mostrar() {
        var select = document.getElementById("myselect");
        var motor = document.getElementById("motor");
        var motorFino = document.getElementById("motorFino");
        var maniobras = document.getElementById("maniobras");
        var tono = document.getElementById("tono");
        var postura = document.getElementById("postura");
        var signos = document.getElementById("signos");
        motor.style.display = "none";
        motorFino.style.display = "none";
        maniobras.style.display = "none";
        tono.style.display = "none";
        postura.style.display = "none";
        signos.style.display = "none";

        if (select.value === "motor") 
        {
            motor.style.display = "block";

        } else if (select.value === "fino")
        {
            motorFino.style.display = "block";

        }
        else if (select.value === "maniobras")
        {
            maniobras.style.display = "block";

        } else if (select.value === "tono")
        {
            tono.style.display = "block";

        } else if (select.value === "postura")
        {
            postura.style.display = "block";

        } else if (select.value === "signos")
        {
            signos.style.display = "block";

        } 
        else
        {
            motor.style.display = "none";
            motorFino.style.display = "none";
            maniobras.style.display = "none";
            tono.style.display = "none";
            postura.style.display = "none";
            signos.style.display = "none";
        }
    }

    mostrar();

    document.getElementById("myselect").addEventListener("change", mostrar);
</script>