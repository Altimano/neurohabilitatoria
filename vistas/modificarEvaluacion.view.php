<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Editar Evaluación</title>
  <link href=<?=base_url("/assets/output.css")?> rel="stylesheet"/>
  <style>
    .bg-custom-main-box {
      background-color: #E0F2FE;
    }

    .bg-custom-button {
      background-color: #0284C7;
    }

    .text-custom-title {
      color: #0369A1;
    }
  </style>
</head>

<body class="bg-gray-100">

  <div class="px-6 py-4 bg-white shadow-md flex justify-between items-center">
    <h1 class="text-2xl font-bold text-custom-title">Editar Evaluación del Paciente</h1>
    <a href=<?=base_url("/inicio")?> class="bg-custom-button text-white px-4 py-2 rounded-lg text-sm font-medium">
      Volver
    </a>
  </div>
  <!-- TOMAR EN CUENTA LOS NOMBRES DE LOS CAMPOS PARA USARLOS EN LA BD NUEVA -->
  <div class="m-6 bg-custom-main-box rounded-xl shadow-md p-6">
    <h2 class="text-xl font-bold text-custom-title mb-4">Modificar Evaluación</h2>
    <form method="post" action=<?=base_url("/realizarModificacion")?>>
      <input type="hidden" name="id_terapia" value="<?= htmlspecialchars($datosPaciente['id_terapia_neurohabilitatoriav2']) ?>">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
          <label class="block text-sm font-medium text-custom-title">Nombre de Paciente</label>
          <input type="text" name="nombre_paciente" disabled readonly value="<?= htmlspecialchars($datosPaciente['nombre_paciente']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Talla</label>
          <input type="text" name="talla" disabled readonly value="<?= htmlspecialchars($datosPaciente['talla']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Peso</label>
          <input type="text" name="peso" disabled readonly value="<?= htmlspecialchars($datosPaciente['peso']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Perimetro Cefalico</label>
          <input type="text" name="PC" disabled readonly value="<?= htmlspecialchars($datosPaciente['pc']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Semanas de Gestacion</label>
          <input type="text" name="semanas_gestacion" disabled readonly value="<?= htmlspecialchars($datosPaciente['semanas_gestacion']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Edad Corregida</label>
          <input type="text" name="edad_corregida" disabled readonly value="<?= htmlspecialchars($datosPaciente['edad_corregida']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Fecha de Nacimiento</label>
          <input type="date" name="dat_ter_tipo_terapia" disabled readonly value="<?= htmlspecialchars($datosPaciente['fecha_nacimiento_paciente']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Fecha Inicio de Tratamiento</label>
          <input type="date" name="fecha_inicio_terapia" disabled readonly value="<?= htmlspecialchars($datosPaciente['fecha_inicio_terapia']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Edad Corregida en Semanas al Ingreso</label>
          <input type="text" name="edad_correg_al_ingr_sem" disabled readonly value="<?= htmlspecialchars($datosPaciente['edad_correg_al_ingr_sem']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-custom-title">Factores de Riesgo</label>
          <input type="text" name="factores_riesgo" disabled readonly value="<?= htmlspecialchars($datosPaciente['factores_riesgo']) ?>" class="mt-1 block w-full p-2 border rounded-md shadow-sm">
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

          <?php foreach ($datosKatona as $fila): ?>
            <input type="hidden" name="id_resultados_katona[]" value="<?= htmlspecialchars($fila[2]) ?>">
            <div>
              <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($fila[0]) ?></label>
              <h2> <?= htmlspecialchars($fila[1]) ?> </h2>
              <div class="mt-1 block w-full p-2 border bg-white rounded-md shadow-sm">
                <ul class="list-none space-y-1">
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Normal" class="form-checkbox mr-2">Normal (N)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Hipotonía" class="form-checkbox mr-2">Hipotonía (–)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Hipertonía" class="form-checkbox mr-2">Hipertonía (+)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Miembros Torácicos" class="form-checkbox mr-2">Miembros Torácicos (MTs)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Miembros Pélvicos" class="form-checkbox mr-2">Miembros Pélvicos (MP)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Extremidades" class="form-checkbox mr-2">Extremidades (E)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Hemicuerpo" class="form-checkbox mr-2">Hemicuerpo (H)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Control Lateral" class="form-checkbox mr-2">Control Lateral (CL)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Derecha" class="form-checkbox mr-2">Derecha (D)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Izquierda" class="form-checkbox mr-2">Izquierda (I)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Ausente" class="form-checkbox mr-2">Ausente (A)</label></li>
                </ul>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- FIN DE MANIOBRAS KATONA -->


        <!-- EMPIEZA SUBESCALAS DEL MOTOR GRUESO/MOVIMIENTOS POSTURALES -->
        <div id="motor" class="space-y-6">
          <?php foreach ($datosSubMG as $fila): ?>
            <input type="hidden" name="id_resultados_sub_mg[]" value="<?= htmlspecialchars($fila[2]) ?>">
            <div>
              <label for="subMG" class="block text-sm font-medium text-custom-title mb-1"><?= htmlspecialchars($fila[0]) ?></label>
              <select name="<?= htmlspecialchars($fila[0]) ?>" id="<?= htmlspecialchars($fila[0]) ?>" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                <option value="<?= htmlspecialchars($fila[1]) ?>" disabled selected> <?= htmlspecialchars($fila[1]) ?> </option>
                <option value="0">No lo logra (0)</option>
                <option value="1">Lo intenta pero no lo logra (1)</option>
                <option value="2">En proceso (2)</option>
                <option value="3">Lo realiza inhábilmente (3)</option>
                <option value="4">Normal (4)</option>
              </select>
            </div>
          <?php endforeach; ?>

        </div>
        <!-- FIN DE SUBESCALAS DE MOTOR GRUESO -->


        <!-- EMPIEZA SUBESCALAS DEL MOTOR FINO -->
        <div id="motorFino" class="space-y-6">

          <?php foreach ($datosSubMF as $fila): ?>
            <input type="hidden" name="id_resultados_sub_mf[]" value="<?= htmlspecialchars($fila[2]) ?>">
            <div>
              <label for="subMF" class="block text-sm font-medium text-custom-title mb-1"><?= htmlspecialchars($fila[0]) ?></label>
              <select name="<?= htmlspecialchars($fila[0]) ?>" id="<?= htmlspecialchars($fila[0]) ?>" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                <option value="<?= htmlspecialchars($fila[1]) ?>" disabled selected> <?= htmlspecialchars($fila[1]) ?> </option>
                <option value="0">No lo logra (0)</option>
                <option value="1">Lo intenta pero no lo logra (1)</option>
                <option value="2">En proceso (2)</option>
                <option value="3">Lo realiza inhábilmente (3)</option>
                <option value="4">Normal (4)</option>
              </select>
            </div>
          <?php endforeach; ?>

        </div>
        <!-- FIN DE SUBESCALAS DE MOTOR FINO -->

        <!-- INICIO DE SUBESCALAS DE LENGUAJE -->
        <div id="lenguaje" class="space-y-6">

          <?php foreach ($datosLenguaje as $fila): ?>
            <input type="hidden" name="id_resultados_lenguaje[]" value="<?= htmlspecialchars($fila[2]) ?>">
            <div>
              <label for="lenguaje" class="block text-sm font-medium text-custom-title mb-1"><?= htmlspecialchars($fila[0]) ?></label>
              <select name="<?= htmlspecialchars($fila[0]) ?>" id="<?= htmlspecialchars($fila[0]) ?>" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                <option value="<?= htmlspecialchars($fila[1]) ?>" disabled  selected> <?= htmlspecialchars($fila[1]) ?> </option>
                <option value="0">No lo logra (0)</option>
                <option value="1">Lo intenta pero no lo logra (1)</option>
                <option value="2">En proceso (2)</option>
                <option value="3">Lo realiza inhábilmente (3)</option>
                <option value="4">Normal (4)</option>
              </select>
            </div>
          <?php endforeach; ?>

        </div>
        <!-- INICIO DE SUBESCALAS DE LENGUAJE -->

        <!--Inicia tono muscular y ubicacion-->
        <div id="tono" class="space-y-6">

          <h3 class="text-lg font-bold text-custom-title mb-2">Tono muscular y ubicación</h3>

          <?php foreach ($datosTono as $fila): ?>
            <input type="hidden" name="id_resultados_tono_muscular[]" value="<?= htmlspecialchars($fila[2]) ?>">
            <div>
              <label class="block text-sm font-medium text-custom-title"><?= htmlspecialchars($fila[0]) ?></label>
              <h2> <?= htmlspecialchars($fila[1]) ?> </h2>
              <div class="mt-1 block w-full p-2 border bg-white rounded-md shadow-sm">
                <ul class="list-none space-y-1">
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="General" class="form-checkbox mr-2">General (1)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Axial" class="form-checkbox mr-2">Axial (2)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Extremidades" class="form-checkbox mr-2">Extremidades (3)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Miembros Torácicos" class="form-checkbox mr-2">Miembros Torácicos (4)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Miembros Pélvicos" class="form-checkbox mr-2">Miembros Pélvicos (5)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Hemicuerpo" class="form-checkbox mr-2">Hemicuerpo (6)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Contralateral" class="form-checkbox mr-2">Contralateral (7)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Derecho" class="form-checkbox mr-2">Derecho (8)</label></li>
                  <li><label class="flex items-center"><input type="checkbox" name="<?= htmlspecialchars($fila[0]) ?>[]" value="Izquierdo" class="form-checkbox mr-2">Izquierdo (9)</label></li>
                </ul>
              </div>
            </div>
           <?php endforeach; ?>

        </div>
        <!--Fin tono muscular y ubicacion-->

        <!--Inicia Postura-->
        <div id="postura" class="space-y-6">

          <h3 class="text-lg font-bold text-custom-title mb-2">POSTURA</h3>

          <div>
            <?php foreach ($datosPostura as $fila): ?>
              <input type="hidden" name="id_resultado_postura[]" value="<?= htmlspecialchars($fila[2]) ?>">
              <div>
                <label for="postura" class="block text-sm font-medium text-custom-title mb-1"><?= htmlspecialchars($fila[0]) ?></label>
                <select name="<?= htmlspecialchars($fila[0]) ?>" id="<?= htmlspecialchars($fila[0]) ?>" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                  <option value="<?= htmlspecialchars($fila[1]) ?>" disabled selected> <?= htmlspecialchars($fila[1]) ?> </option>
                  <option value="Axial">Axial (1)</option>
                  <option value="Miembro(s)Torácico(s)">Miembro(s)Torácico(s) (2)</option>
                  <option value="Miembro(s)Pélvico(s)">Miembro(s)Pélvico(s) (3)</option>
                  <option value="Hemicuerpo">Hemicuerpo (4)</option>
                  <option value="Contralateral">Contralateral (5)</option>
                  <option value="Derecha">Derecha (6)</option>
                  <option value="Izquierda">Izquierda (7)</option>
                </select>
              </div>
            <?php endforeach; ?>
          </div>

        </div>
        <!--Termina Postura-->


        <!-- Inicia Signos de Alarma -->
        <div id="signos" class="space-y-6">
          <h3 class="text-lg font-bold text-custom-title mb-2">SIGNOS DE ALARMA</h3>

          <div>
            <h2> Signos de alarma actuales: </h2>
            <?php foreach ($datosSignos as $fila): ?>
              <h2><?= htmlspecialchars($fila[0]) ?> </h2>
            <?php endforeach; ?>

            <div>
              <?php foreach ($datosCamposSignos as $fila2): ?>
                <input type="hidden" name="id_resultados_signos_alarma[]" value="<?= htmlspecialchars($fila2[1]) ?>">
                <div>
                  <label for="signosAlarma" class="block text-sm font-medium text-custom-title mb-1"><?= htmlspecialchars($fila2[0]) ?></label>
                  <select name="<?= htmlspecialchars($fila2[0]) ?>" id="<?= htmlspecialchars($fila2[0]) ?>" class="w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected> Seleccionar </option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                </div>
              <?php endforeach; ?>
            </div>
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

  document.addEventListener("DOMContentLoaded", function () {
    // Paso 1. Guarda valores iniciales de los select
    const initialValues = {};
    document.querySelectorAll("select").forEach(select => {
      initialValues[select.name] = select.value;
    });

    // Paso 2. Enviar el formulario con solo los IDs modificados
    const form = document.querySelector("form");
    form.addEventListener("submit", function (e) {
      const modifiedIds = [];

      // Recorremos cada select para detectar cambios
      document.querySelectorAll("select").forEach(select => {
        if (select.value !== initialValues[select.name]) {
          // Buscamos el input hidden del id relacionado
          let idInput = null;
          if (select.name in initialValues) {
            // Para SubMG:
            idInput = select.parentElement.querySelector('input[type="hidden"][name="id_resultados_sub_mg[]"]');
          }

          if (idInput && idInput.value) {
            modifiedIds.push(idInput.value);
          }
        }
      });

      // Creamos o actualizamos un input hidden con los IDs modificados
      let modifiedIdsInput = form.querySelector('input[name="modified_ids"]');
      if (!modifiedIdsInput) {
        modifiedIdsInput = document.createElement("input");
        modifiedIdsInput.type = "hidden";
        modifiedIdsInput.name = "modified_ids";
        form.appendChild(modifiedIdsInput);
      }
      modifiedIdsInput.value = JSON.stringify(modifiedIds);

      // Ahora el formulario enviará este campo adicional.
    });
  });


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
    var lenguaje = document.getElementById("lenguaje")
    motor.style.display = "none";
    motorFino.style.display = "none";
    lenguaje.style.display = "none";
    maniobras.style.display = "none";
    tono.style.display = "none";
    postura.style.display = "none";
    signos.style.display = "none";

    if (select.value === "motor") {
      motor.style.display = "block";

    } else if (select.value === "fino") {
      motorFino.style.display = "block";

    } else if (select.value === "lenguaje") {
      lenguaje.style.display = "block";

    } else if (select.value === "maniobras") {
      maniobras.style.display = "block";

    } else if (select.value === "tono") {
      tono.style.display = "block";

    } else if (select.value === "postura") {
      postura.style.display = "block";

    } else if (select.value === "signos") {
      signos.style.display = "block";

    } else {
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