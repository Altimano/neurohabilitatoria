<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Paciente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-main-box { background-color: #E0F2FE; }
        .bg-custom-button { background-color: #0284C7; }
        .text-custom-title { color: #0369A1; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="px-6 py-4 bg-white shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-bold text-custom-title">Consultar Evaluacion del Paciente</h1>
        <a href="/inicio" class="bg-custom-button text-white px-4 py-2 rounded-lg text-sm font-medium">
            Volver
        </a>
    </div>
<!-- TOMAR EN CUENTA LOS NOMBRES DE LOS CAMPOS PARA USARLOS EN LA BD NUEVA -->
    <div class="m-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-custom-title mb-4">Consultar</h2>
        <form method="post" action="/consultarPaciente" class="space-y-6"> 
            <input type="hidden" name="id_terapia" value="<?= htmlspecialchars($evaluaciones['id_terapia_neurohabilitatoria']) ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-custom-title">Nombre de Paciente</label>
                    <input type="text" name="nombre_paciente" readonly value="<?= htmlspecialchars($filas[0]['nombre_paciente']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Talla</label>
                    <input type="text" name="talla" readonly value="<?= htmlspecialchars($campos['talla']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Peso</label>
                    <input type="text" name="peso" readonly value="<?= htmlspecialchars($campos['peso']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Perimetro Cefalico</label>
                    <input type="text" name="PC" readonly value="<?= htmlspecialchars($campos['PC']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Semanas de Gestacion</label>
                    <input type="text" name="semanas_gestacion" readonly value="<?= htmlspecialchars($filas[0]['semanas_gestacion']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Edad Corregida</label>
                    <input type="text" name="edad_corregida" readonly value="<?= htmlspecialchars($campos['edad_corregida']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Fecha de Nacimiento</label>
                    <input type="date" name="dat_ter_tipo_terapia" readonly value="<?= htmlspecialchars($campos['fecha_nacimiento_paciente']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Fecha Inicio de Tratamiento</label>
                    <input type="date" name="dat_ter_tipo_terapia" readonly value="<?= htmlspecialchars($campos['fecha_inicio_terapia']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Edad Corregida en Semanas al Ingreso</label>
                    <input type="text" name="dat_ter_tipo_terapia" readonly value="<?= htmlspecialchars($campos['fecha_terapia']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Factores de Riesgo</label>
                    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Area de Evaluacion</label>
                    <select id="myselect" name="area" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="maniobras">Maniobras Katona</option>
                        <option value="motor">Motor Grueso/Movimientos Posturales</option>
                        <option value="fino">Motor Fino</option>
                        <option value="tono">Tono Muscular y Ubicacion</option>
                        <option value="postura">Postura (Colocar un 1)</option>
                        <option value="signos">Signos de Alarma (Colocar un 1)</option>
                    </select>
                </div>

<!-- Maniobras Katona EMPIEZAN -->
<div id="maniobras" class="space-y-6">

  <!-- Elevación de tronco (tracción de manos) -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Elevación de tronco (tracción de manos)</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Elevación de tronco (espalda-cadera) -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Elevación de tronco (espalda-cadera)</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Sentado al aire -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Sentado al aire</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Rotación izquierda y derecha -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Rotación izquierda y derecha</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Gateo asistido -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Gateo asistido</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Gateo asistido modificado -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Gateo asistido modificado</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Arrastre horizontal -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Arrastre horizontal</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Marcha en plano horizontal -->
  <div>
    <label class="block text-sm font-medium text-custom-title"> Marcha en plano horizontal</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Marcha en plano ascendente -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Marcha en plano ascendente</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Arrastre en plano inclinado descendente -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Arrastre en plano inclinado descendente</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

  <!-- Arrastre en plano inclinado ascendente -->
  <div>
    <label class="block text-sm font-medium text-custom-title">Arrastre en plano inclinado ascendente</label>
    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($campos['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
  </div>

</div>
<!-- FIN DE MANIOBRAS KATONA -->


<!-- EMPIEZA SUBESCALAS DEL MOTOR GRUESO/MOVIMIENTOS POSTURALES -->
<div id="motor" class="space-y-6">

  <div>
    <label for="subesc_cf" class="block text-sm font-medium text-custom-title mb-1">Control cefálico</label>
    <select name="subesc_cf" id="subesc_cf" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_sobre_ab" class="block text-sm font-medium text-custom-title mb-1">Sobre el abdomen levanta tórax apoyando brazos</label>
    <select name="subesc_sobre_ab" id="subesc_sobre_ab" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_sent_prot_del" class="block text-sm font-medium text-custom-title mb-1">Sentado con reacción de protección delantera</label>
    <select name="subesc_sent_prot_del" id="subesc_sent_prot_del" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_camb_decub" class="block text-sm font-medium text-custom-title mb-1">Cambio de decúbito prono a decúbito supino</label>
    <select name="subesc_camb_decub" id="subesc_camb_decub" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_sent_sin_apoyo" class="block text-sm font-medium text-custom-title mb-1">Sentado sin apoyo</label>
    <select name="subesc_sent_sin_apoyo" id="subesc_sent_sin_apoyo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_reac_lat_del" class="block text-sm font-medium text-custom-title mb-1">Reacciones de protección laterales y delanteras</label>
    <select name="subesc_reac_lat_del" id="subesc_reac_lat_del" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_pos_sed_decub" class="block text-sm font-medium text-custom-title mb-1">Cambio de posición sedente a decúbito prono</label>
    <select name="subesc_pos_sed_decub" id="subesc_pos_sed_decub" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_patron_arrastre" class="block text-sm font-medium text-custom-title mb-1">Patrón de arrastre</label>
    <select name="subesc_patron_arrastre" id="subesc_patron_arrastre" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_pos_hincado" class="block text-sm font-medium text-custom-title mb-1">Cambio de posición cuatro puntos a hincado</label>
    <select name="subesc_pos_hincado" id="subesc_pos_hincado" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_patron_gateo" class="block text-sm font-medium text-custom-title mb-1">Patrón de gateo independiente</label>
    <select name="subesc_patron_gateo" id="subesc_patron_gateo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_gateo_niveles" class="block text-sm font-medium text-custom-title mb-1">Gateo en diferentes niveles (colchón, planos, etc.)</label>
    <select name="subesc_gateo_niveles" id="subesc_gateo_niveles" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_trans_bipedest" class="block text-sm font-medium text-custom-title mb-1">Transición gateo a bipedestación</label>
    <select name="subesc_trans_bipedest" id="subesc_trans_bipedest" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_patr_marcha" class="block text-sm font-medium text-custom-title mb-1">Comienza el patrón de marcha</label>
    <select name="subesc_patr_marcha" id="subesc_patr_marcha" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_pie_momentaneo" class="block text-sm font-medium text-custom-title mb-1">Se pone de pie momentáneamente sin apoyarse</label>
    <select name="subesc_pie_momentaneo" id="subesc_pie_momentaneo" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_camina_atras" class="block text-sm font-medium text-custom-title mb-1">Camina hacia atrás</label>
    <select name="subesc_camina_atras" id="subesc_camina_atras" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_camina_solo_cae_frec" class="block text-sm font-medium text-custom-title mb-1">Camina solo (cae frecuentemente)</label>
    <select name="subesc_camina_solo_cae_frec" id="subesc_camina_solo_cae_frec" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_esca_ambas_manos" class="block text-sm font-medium text-custom-title mb-1">Sube escaleras apoyándose en ambas manos</label>
    <select name="subesc_esca_ambas_manos" id="subesc_esca_ambas_manos" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_patea_pelota" class="block text-sm font-medium text-custom-title mb-1">Patea una pelota</label>
    <select name="subesc_patea_pelota" id="subesc_patea_pelota" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_esc_gateando" class="block text-sm font-medium text-custom-title mb-1">Sube escaleras gateando</label>
    <select name="subesc_esc_gateando" id="subesc_esc_gateando" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_corre_con_rig" class="block text-sm font-medium text-custom-title mb-1">Corre (con rigidez)</label>
    <select name="subesc_corre_con_rig" id="subesc_corre_con_rig" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_camina_solo_cae_rara" class="block text-sm font-medium text-custom-title mb-1">Camina solo (cae rara vez)</label>
    <select name="subesc_camina_solo_cae_rara" id="subesc_camina_solo_cae_rara" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_esc_una_mano" class="block text-sm font-medium text-custom-title mb-1">Sube y baja escaleras sostenido de una mano</label>
    <select name="subesc_esc_una_mano" id="subesc_esc_una_mano" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_lanza_pelota" class="block text-sm font-medium text-custom-title mb-1">Lanza la pelota</label>
    <select name="subesc_lanza_pelota" id="subesc_lanza_pelota" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_salta_sitio" class="block text-sm font-medium text-custom-title mb-1">Salta en el sitio</label>
    <select name="subesc_salta_sitio" id="subesc_salta_sitio" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_juega_cuclillas" class="block text-sm font-medium text-custom-title mb-1">Juega en cuclillas</label>
    <select name="subesc_juega_cuclillas" id="subesc_juega_cuclillas" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

</div>
<!-- FIN DE SUBESCALAS DE MOTOR GRUESO -->


 <!-- EMPIEZA SUBESCALAS DEL MOTOR FINO -->
<div id="motorFino" class="space-y-6">

  <div>
    <label for="subesc_manos_linMedia" class="block text-sm font-medium text-custom-title mb-1">
      Lleva las manos a la línea media
    </label>
    <select name="subesc_manos_linMedia" id="subesc_manos_linMedia"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_firm_obj_mano" class="block text-sm font-medium text-custom-title mb-1">
      Sostiene y mantiene firmemente un objeto con la mano
    </label>
    <select name="subesc_firm_obj_mano" id="subesc_firm_obj_mano"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_obj_ambManos" class="block text-sm font-medium text-custom-title mb-1">
      Se estira para tomar un objeto con ambas manos
    </label>
    <select name="subesc_obj_ambManos" id="subesc_obj_ambManos"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_estruja" class="block text-sm font-medium text-custom-title mb-1">
      Estruja papel, sábanas, ropa, etc.
    </label>
    <select name="subesc_estruja" id="subesc_estruja"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_transObjeto" class="block text-sm font-medium text-custom-title mb-1">
      Toma un objeto y lo transfiere entre sus manos
    </label>
    <select name="subesc_transObjeto" id="subesc_transObjeto"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_examObjeto" class="block text-sm font-medium text-custom-title mb-1">
      Toma objetos que están a su alcance y los examina
    </label>
    <select name="subesc_examObjeto" id="subesc_examObjeto"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_agarre_indPulg" class="block text-sm font-medium text-custom-title mb-1">
      Comienza a desarrollar agarre índice-pulgar
    </label>
    <select name="subesc_agarre_indPulg" id="subesc_agarre_indPulg"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_inserta_objAgujero" class="block text-sm font-medium text-custom-title mb-1">
      Inserta objetos en un agujero grande
    </label>
    <select name="subesc_inserta_objAgujero" id="subesc_inserta_objAgujero"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_pinzaSup" class="block text-sm font-medium text-custom-title mb-1">
      Pinza superior
    </label>
    <select name="subesc_pinzaSup" id="subesc_pinzaSup"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_dedoIndice" class="block text-sm font-medium text-custom-title mb-1">
      Señala con el dedo índice
    </label>
    <select name="subesc_dedoIndice" id="subesc_dedoIndice"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_torre_dos" class="block text-sm font-medium text-custom-title mb-1">
      Forma una torre de dos cubos
    </label>
    <select name="subesc_torre_dos" id="subesc_torre_dos"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_garabImitacion" class="block text-sm font-medium text-custom-title mb-1">
      Garabatea espontáneamente por imitación
    </label>
    <select name="subesc_garabImitacion" id="subesc_garabImitacion"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_dosCubos_mano" class="block text-sm font-medium text-custom-title mb-1">
      Toma dos cubos en una mano
    </label>
    <select name="subesc_dosCubos_mano" id="subesc_dosCubos_mano"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_torre_tresCuatro" class="block text-sm font-medium text-custom-title mb-1">
      Forma una torre con tres o cuatro cubos
    </label>
    <select name="subesc_torre_tresCuatro" id="subesc_torre_tresCuatro"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_boliBotella" class="block text-sm font-medium text-custom-title mb-1">
      Introduce bolitas en la botella
    </label>
    <select name="subesc_boliBotella" id="subesc_boliBotella"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_vueltaPag" class="block text-sm font-medium text-custom-title mb-1">
      Da vuelta a las páginas de un libro (dos o tres a la vez)
    </label>
    <select name="subesc_vueltaPag" id="subesc_vueltaPag"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_quitarTapa" class="block text-sm font-medium text-custom-title mb-1">
      Intenta quitar la rosca o tapa de un frasco pequeño
    </label>
    <select name="subesc_quitarTapa" id="subesc_quitarTapa"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_imiTrazo" class="block text-sm font-medium text-custom-title mb-1">
      Imita trazo vertical
    </label>
    <select name="subesc_imiTrazo" id="subesc_imiTrazo"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_torre_seis" class="block text-sm font-medium text-custom-title mb-1">
      Arma torre de seis cubos
    </label>
    <select name="subesc_torre_seis" id="subesc_torre_seis"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

  <div>
    <label for="subesc_tren_tres" class="block text-sm font-medium text-custom-title mb-1">
      Arma tren de tres cubos
    </label>
    <select name="subesc_tren_tres" id="subesc_tren_tres"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="0">No lo logra (0)</option>
      <option value="1">Lo intenta pero no lo logra (1)</option>
      <option value="2">En proceso (2)</option>
      <option value="3">Lo realiza inhábilmente (3)</option>
      <option value="4">Normal (4)</option>
    </select>
  </div>

</div>
<!-- FIN DE SUBESCALAS DE MOTOR FINO -->


<!--Inicia tono muscular y ubicacion-->
<div id="tono" class="space-y-6">

  <h3 class="text-lg font-bold text-custom-title mb-2">Tono muscular y ubicación</h3>

  <div>
    <label for="tono_hipotonia" class="block text-sm font-medium text-custom-title mb-1">Hipotonía</label>
    <select name="tono_hipotonia" id="tono_hipotonia"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">General (1)</option>
      <option value="2">Axial (2)</option>
      <option value="3">Extremidades (3)</option>
      <option value="4">Miembros Torácicos (4)</option>
      <option value="5">Membros Pélvicos (5)</option>
      <option value="6">Hemicuerpo (6)</option>
      <option value="7">Contralateral (7)</option>
      <option value="8">Derecho (8)</option>
      <option value="9">Izquierdo (9)</option>
    </select>
  </div>

  <div>
    <label for="tono_hipertonia" class="block text-sm font-medium text-custom-title mb-1">Hipertonía</label>
    <select name="tono_hipertonia" id="tono_hipertonia"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">General (1)</option>
      <option value="2">Axial (2)</option>
      <option value="3">Extremidades (3)</option>
      <option value="4">Miembros Torácicos (4)</option>
      <option value="5">Membros Pélvicos (5)</option>
      <option value="6">Hemicuerpo (6)</option>
      <option value="7">Contralateral (7)</option>
      <option value="8">Derecho (8)</option>
      <option value="9">Izquierdo (9)</option>
    </select>
  </div>

  <div>
    <label for="tono_mixto" class="block text-sm font-medium text-custom-title mb-1">Mixto (Hipotonía + Espasticidad)</label>
    <select name="tono_mixto" id="tono_mixto"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">General (1)</option>
      <option value="2">Axial (2)</option>
      <option value="3">Extremidades (3)</option>
      <option value="4">Miembros Torácicos (4)</option>
      <option value="5">Membros Pélvicos (5)</option>
      <option value="6">Hemicuerpo (6)</option>
      <option value="7">Contralateral (7)</option>
      <option value="8">Derecho (8)</option>
      <option value="9">Izquierdo (9)</option>
    </select>
  </div>

  <div>
    <label for="tono_fluctuante" class="block text-sm font-medium text-custom-title mb-1">Fluctuante</label>
    <select name="tono_fluctuante" id="tono_fluctuante"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">General (1)</option>
      <option value="2">Axial (2)</option>
      <option value="3">Extremidades (3)</option>
      <option value="4">Miembros Torácicos (4)</option>
      <option value="5">Membros Pélvicos (5)</option>
      <option value="6">Hemicuerpo (6)</option>
      <option value="7">Contralateral (7)</option>
      <option value="8">Derecho (8)</option>
      <option value="9">Izquierdo (9)</option>
    </select>
  </div>

  <div>
    <label for="tono_normal" class="block text-sm font-medium text-custom-title mb-1">Normal</label>
    <select name="tono_normal" id="tono_normal"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">General (1)</option>
      <option value="2">Axial (2)</option>
      <option value="3">Extremidades (3)</option>
      <option value="4">Miembros Torácicos (4)</option>
      <option value="5">Membros Pélvicos (5)</option>
      <option value="6">Hemicuerpo (6)</option>
      <option value="7">Contralateral (7)</option>
      <option value="8">Derecho (8)</option>
      <option value="9">Izquierdo (9)</option>
    </select>
  </div>

</div>
<!--Fin tono muscular y ubicacion-->

<!--Inicia Postura-->
<div id="postura" class="space-y-6">

  <h3 class="text-lg font-bold text-custom-title mb-2">POSTURA</h3>

  <div>
    <label for="postura_asimetria" class="block text-sm font-medium text-custom-title mb-1">
      Asimetría
    </label>
    <select name="postura_asimetria" id="postura_asimetria"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
  </div>

</div>
<!--Termina Postura-->


<!-- Inicia Signos de Alarma -->
<div id="signos" class="space-y-6">
  <h3 class="text-lg font-bold text-custom-title mb-2">SIGNOS DE ALARMA</h3>

  <div>
    <label for="signos_aduccionPulg" class="block text-sm font-medium text-custom-title mb-1">
      Aducción de pulgares
    </label>
    <select name="signos_aduccionPulg" id="signos_aduccionPulg"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
  </div>

  <div>
    <label for="signos_estrabismo" class="block text-sm font-medium text-custom-title mb-1">
      Estrabismo
    </label>
    <select name="signos_estrabismo" id="signos_estrabismo"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
  </div>

  <div>
    <label for="signos_irritabilidad" class="block text-sm font-medium text-custom-title mb-1">
      Irritabilidad
    </label>
    <select name="signos_irritabilidad" id="signos_irritabilidad"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
  </div>

  <div>
    <label for="signos_marchaPun" class="block text-sm font-medium text-custom-title mb-1">
      Marcha en punta
    </label>
    <select name="signos_marchaPun" id="signos_marchaPun"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
  </div>

  <div>
    <label for="signos_marchaCruz" class="block text-sm font-medium text-custom-title mb-1">
      Marcha Cruzada
    </label>
    <select name="signos_marchaCruz" id="signos_marchaCruz"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
  </div>

  <div>
    <label for="signos_puCerrado" class="block text-sm font-medium text-custom-title mb-1">
      Puños cerrados
    </label>
    <select name="signos_puCerrado" id="signos_puCerrado"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
  </div>

  <div>
    <label for="signos_reflejoHiper" class="block text-sm font-medium text-custom-title mb-1">
      Reflejo de hiperextensión
    </label>
    <select name="signos_reflejoHiper" id="signos_reflejoHiper"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
  </div>

  <div>
    <label for="signos_lenguajeEsc" class="block text-sm font-medium text-custom-title mb-1">
      Lenguaje escaso
    </label>
    <select name="signos_lenguajeEsc" id="signos_lenguajeEsc"
      class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
      <option value="" disabled selected>Seleccione una opción</option>
      <option value="1">Axial (1)</option>
      <option value="2">Mentón Clínico (2)</option>
      <option value="3">Miembro Sup (3)</option>
      <option value="4">Pelvis (4)</option>
      <option value="5">Cintura Esc (5)</option>
      <option value="6">Derecho (6)</option>
      <option value="7">Izquierdo (7)</option>
    </select>
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