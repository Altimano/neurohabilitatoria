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
                            <!-- EMPIEZA SUBESCALAS DEL MOTOR GRUESO/MOVIMIENTOS POSTURALES-->
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


                <!-- FIN DE SUBESCALAS DE MOTOR GRUESO -->
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
    }
</script>