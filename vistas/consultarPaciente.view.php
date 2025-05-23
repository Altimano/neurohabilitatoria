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
        <a href="/consultar" class="bg-custom-button text-white px-4 py-2 rounded-lg text-sm font-medium">
            Volver
        </a>
    </div>
<!-- TOMAR EN CUENTA LOS NOMBRES DE LOS CAMPOS PARA USARLOS EN LA BD NUEVA -->
    <div class="m-6 bg-custom-main-box rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-custom-title mb-4">Consultar</h2>
        <form method="post" action="/consultarPaciente" class="space-y-6"> 
            <input type="hidden" name="id_terapia" value="<?= htmlspecialchars($datosPaciente['id_terapia_neurohabilitatoriav2']) ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-custom-title">Nombre de Paciente</label>
                    <input type="text" name="nombre_paciente" readonly value="<?= htmlspecialchars($datosPaciente['nombre_paciente']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Talla</label>
                    <input type="text" name="talla" readonly value="<?= htmlspecialchars($datosPaciente['talla']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Peso</label>
                    <input type="text" name="peso" readonly value="<?= htmlspecialchars($datosPaciente['peso']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Perimetro Cefalico</label>
                    <input type="text" name="PC" readonly value="<?= htmlspecialchars($datosPaciente['pc']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Semanas de Gestacion</label>
                    <input type="text" name="semanas_gestacion" readonly value="<?= htmlspecialchars($datosPaciente['semanas_gestacion']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Edad Corregida</label>
                    <input type="text" name="edad_corregida" readonly value="<?= htmlspecialchars($datosPaciente['edad_corregida']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Fecha de Nacimiento</label>
                    <input type="date" name="dat_ter_tipo_terapia" readonly value="<?= htmlspecialchars($datosPaciente['fecha_nacimiento_paciente']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Fecha Inicio de Tratamiento</label>
                    <input type="date" name="fecha_inicio_terapia" readonly value="<?= htmlspecialchars($datosPaciente['fecha_inicio_terapia']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Edad Corregida en Semanas al Ingreso</label>
                    <input type="text" name="edad_correg_al_ingr_sem" readonly value="<?= htmlspecialchars($datosPaciente['edad_correg_al_ingr_sem']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-custom-title">Factores de Riesgo</label>
                    <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($datosPaciente['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-custom-title">Area de Evaluacion</label>
                    <select id="myselect" name="area" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="maniobras">Maniobras Katona</option>
                        <option value="motor">Motor Grueso/Movimientos Posturales</option>
                        <option value="fino">Motor Fino</option>
                        <option value="lenguaje">Lenguaje</option>
                        <option value="tono">Tono Muscular y Ubicacion</option>
                        <option value="postura">Postura (Colocar un 1)</option>
                        <option value="signos">Signos de Alarma (Colocar un 1)</option>
                    </select>
                </div>

<!-- Maniobras Katona EMPIEZAN -->
<div id="maniobras" class="space-y-6">
  <h3 class="text-lg font-bold text-custom-title mb-2">MANIOBRAS KATONA</h3>

  <?php foreach ($datosKatona as $fila): ?>
    <div>
      <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($fila[0]) ?></label>
      <input type="text" name="maniobras_Katona" readonly value="<?= htmlspecialchars($fila[1]) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
    </div>
  <?php endforeach; ?>


</div>
<!-- FIN DE MANIOBRAS KATONA -->


<!-- EMPIEZA SUBESCALAS DEL MOTOR GRUESO/MOVIMIENTOS POSTURALES -->
<div id="motor" class="space-y-6">
  <h3 class="text-lg font-bold text-custom-title mb-2">Subescalas Motor Grueso/Movimientos Posturales</h3>

<?php foreach ($datosSubMG as $fila): ?>
    <div>
      <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($fila[0]) ?></label>
      <input type="text" name="sub_MG" readonly value="<?= htmlspecialchars($fila[1]) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
    </div>
  <?php endforeach; ?>
</div>
<!-- FIN DE SUBESCALAS DE MOTOR GRUESO -->


<!-- EMPIEZA SUBESCALAS DE LENGUAJE -->
<div id="lenguaje" class="space-y-6">
  <h3 class="text-lg font-bold text-custom-title mb-2">Subescalas Lenguaje</h3>

<?php foreach ($datosLenguaje as $fila): ?>
    <div>
      <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($fila[0]) ?></label>
      <input type="text" name="sub_leng" readonly value="<?= htmlspecialchars($fila[1]) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
    </div>
  <?php endforeach; ?>
</div>
<!-- FIN DE SUBESCALAS LENGUAJE -->


 <!-- EMPIEZA SUBESCALAS DEL MOTOR FINO -->
<div id="motorFino" class="space-y-6">
  <h3 class="text-lg font-bold text-custom-title mb-2">Subescalas de Motor Fino</h3>

<?php foreach ($datosSubMF as $fila): ?>
    <div>
      <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($fila[0]) ?></label>
      <input type="text" name="sub_MF" readonly value="<?= htmlspecialchars($fila[1]) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
    </div>
  <?php endforeach; ?>

</div>
<!-- FIN DE SUBESCALAS DE MOTOR FINO -->


<!--Inicia tono muscular y ubicacion-->
<div id="tono" class="space-y-6">

  <h3 class="text-lg font-bold text-custom-title mb-2">Tono muscular y ubicación</h3>

<?php foreach ($datosTono as $fila): ?>
    <div>
      <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($fila[0]) ?></label>
      <input type="text" name="tonoMusc" readonly value="<?= htmlspecialchars($fila[1]) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
    </div>
  <?php endforeach; ?>

</div>
<!--Fin tono muscular y ubicacion-->

<!--Inicia Postura-->
<div id="postura" class="space-y-6">

  <h3 class="text-lg font-bold text-custom-title mb-2">POSTURA</h3>

<?php foreach ($datosPostura as $fila): ?>
    <div>
      <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($fila[0]) ?></label>
      <input type="text" name="tonoMusc" readonly value="<?= htmlspecialchars($fila[1]) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
    </div>
  <?php endforeach; ?>

</div>
<!--Termina Postura-->


<!-- Inicia Signos de Alarma -->
<div id="signos" class="space-y-6">
  <h3 class="text-lg font-bold text-custom-title mb-2">SIGNOS DE ALARMA</h3>

<?php foreach ($datosSignos as $fila): ?>
    <div>
      <input type="text" name="signoAlarma" readonly value="<?= htmlspecialchars($fila[0]) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
    </div>
  <?php endforeach; ?>

</div>
<!--Termina Signos de Alarma-->

            </div>

            <div class="mt-6">
                <button type="button" id="botonUp" class="bg-custom-button text-white px-6 py-2 rounded-lg hover:opacity-90">
                    Regresar Arriba
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

    function moverArriba() {
      window.scrollTo(0, 0);
    }

    function mostrar() {
        var select = document.getElementById("myselect");
        var motor = document.getElementById("motor");
        var motorFino = document.getElementById("motorFino");
        var maniobras = document.getElementById("maniobras");
        var tono = document.getElementById("tono");
        var postura = document.getElementById("postura");
        var signos = document.getElementById("signos");
        var lenguaje = document.getElementById("lenguaje")
        motor.style.display = "none";
        motorFino.style.display = "none";
        lenguaje.style.display = "none";
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

        } else if (select.value === "lenguaje")
        {
            lenguaje.style.display = "block";

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
    moverArriba();
    document.getElementById("botonUp").addEventListener("click", moverArriba);
</script>