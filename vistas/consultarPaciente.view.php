<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultar Paciente</title>
  <link href="/assets/output.css" rel="stylesheet" />
  <style>
    .bg-custom-header-area {
      background-color: #FFFFFF;
    }

    .bg-custom-main-box {
      background: linear-gradient(135deg, #E0F2FE 0%, #F0F9FF 100%);
    }

    .bg-custom-button {
      background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%);
    }

    .text-custom-title {
      color: #0369A1;
    }

    input[readonly],
    textarea[readonly] {
      background-color: #F3F4F6;
      cursor: default;
      border-color: #D1D5DB;
      color: #4B5563;
    }

    .select-wrapper {
      position: relative;
    }

    .select-custom {
      appearance: none;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
      background-position: right 0.5rem center;
      background-repeat: no-repeat;
      background-size: 1.5em 1.5em;
      padding-right: 2.5rem;
      transition: all 0.2s ease-in-out;
    }

    .select-custom:focus {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(2, 132, 199, 0.15);
    }

    .select-custom:hover {
      border-color: #0284C7;
      background-color: #F8FAFC;
    }

    .info-card {
      background: white;
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
      border: 1px solid #E5E7EB;
      transition: all 0.3s ease-in-out;
    }

    .info-card:hover {
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
      transform: translateY(-2px);
    }

    .patient-field {
      background: white;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      border: 1px solid #E5E7EB;
      transition: all 0.2s ease-in-out;
    }

    .patient-field:hover {
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
      transform: translateY(-1px);
    }

    .field-label {
      font-weight: 600;
      color: #374151;
      margin-bottom: 0.5rem;
      display: block;
      font-size: 0.875rem;
      text-transform: uppercase;
      letter-spacing: 0.025em;
    }

    .field-input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 2px solid #E5E7EB;
      border-radius: 8px;
      font-size: 0.95rem;
      background-color: #F9FAFB;
      color: #4B5563;
      transition: all 0.2s ease-in-out;
    }

    .field-input:focus {
      outline: none;
      border-color: #0284C7;
      box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
    }

    .floating-header {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid #E5E7EB;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .evaluation-section {
      background: white;
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
      border: 1px solid #E5E7EB;
      margin-top: 1.5rem;
      transition: all 0.3s ease-in-out;
    }

    .evaluation-section:hover {
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    .evaluation-item {
      background: #F8FAFC;
      border-radius: 8px;
      padding: 1rem;
      margin-bottom: 1rem;
      border-left: 4px solid #0284C7;
      transition: all 0.2s ease-in-out;
    }

    .evaluation-item:hover {
      background: #F1F5F9;
      transform: translateX(4px);
    }

    .evaluation-label {
      font-weight: 600;
      color: #1E293B;
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
    }

    .evaluation-value {
      font-size: 1.1rem;
      color: #0F172A;
      font-weight: 500;
    }

    .btn-primary {
      background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%);
      color: white;
      padding: 0.875rem 2rem;
      border-radius: 12px;
      font-weight: 600;
      font-size: 0.95rem;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      box-shadow: 0 2px 8px rgba(2, 132, 199, 0.2);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(2, 132, 199, 0.35);
      background: linear-gradient(135deg, #0369A1 0%, #1E40AF 100%);
    }

    .btn-secondary {
      background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: 10px;
      font-weight: 500;
      font-size: 0.9rem;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      box-shadow: 0 2px 6px rgba(107, 114, 128, 0.2);
    }

    .btn-secondary:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
    }

    .section-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #0369A1;
      margin-bottom: 1.5rem;
      text-align: center;
      position: relative;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background: linear-gradient(90deg, #0284C7, #0369A1);
      border-radius: 2px;
    }


    @media (max-width: 768px) {
      .info-card, .patient-field, .evaluation-section {
        padding: 1.5rem;
      }
      
      .section-title {
        font-size: 1.25rem;
      }
    }
  </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

  <!-- Header flotante mejorado -->
  <div class="floating-header sticky top-0 z-10 py-4 mb-6">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl md:text-3xl font-bold text-custom-title">
          Consultar Evaluación del Paciente
        </h1>
        <a href="/consultar" class="btn-primary">
          ← Volver
        </a>
      </div>
    </div>
  </div>

  <div class="container mx-auto px-4 max-w-7xl">
    <div class="bg-custom-main-box rounded-2xl shadow-xl p-6 md:p-8">
      
      <!-- Información básica del paciente -->
      <div class="info-card mb-8">
        <h2 class="section-title">Información del Paciente</h2>
        
        <form method="post" action="/consultarPaciente">
          <input type="hidden" name="id_terapia" value="<?= htmlspecialchars($datosPaciente['id_terapia_neurohabilitatoriav2']) ?>">

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            
            <div class="patient-field">
              <label class="field-label">Nombre del Paciente</label>
              <input type="text" name="nombre_paciente" readonly value="<?= htmlspecialchars($datosPaciente['nombre_paciente']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Estado del Paciente</label>
              <input type="text" name="descripcion_estado_paciente" readonly value="<?= htmlspecialchars($datosPaciente['descripcion_estado_paciente']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Talla</label>
              <input type="text" name="talla" readonly value="<?= htmlspecialchars($datosPaciente['talla']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Peso</label>
              <input type="text" name="peso" readonly value="<?= htmlspecialchars($datosPaciente['peso']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Perímetro Cefálico</label>
              <input type="text" name="PC" readonly value="<?= htmlspecialchars($datosPaciente['pc']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Semanas de Gestación</label>
              <input type="text" name="semanas_gestacion" readonly value="<?= htmlspecialchars($datosPaciente['semanas_gestacion']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Edad Corregida</label>
              <input type="text" name="edad_corregida" readonly value="<?= htmlspecialchars($datosPaciente['edad_corregida']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Fecha de Nacimiento</label>
              <input type="date" name="dat_ter_tipo_terapia" readonly value="<?= htmlspecialchars($datosPaciente['fecha_nacimiento_paciente']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Fecha Inicio de Terapia</label>
              <input type="date" name="fecha_inicio_terapia" readonly value="<?= htmlspecialchars($datosPaciente['fecha_inicio_terapia']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Fecha de Terapia</label>
              <input type="date" name="fecha_terapia" readonly value="<?= htmlspecialchars($datosPaciente['fecha_terapia']) ?>" class="field-input">
            </div>


            <div class="patient-field">
              <label class="field-label">Edad Corregida en Semanas al Ingreso</label>
              <input type="text" name="edad_correg_al_ingr_sem" readonly value="<?= htmlspecialchars($datosPaciente['edad_correg_al_ingr_sem']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Personal encargado</label>
              <input type="text" name="edad_correg_al_ingr_mes" readonly value="<?= htmlspecialchars($datosPaciente['nombre_personal']) ?>" class="field-input">
            </div>
          
            <div class="patient-field">
              <label class="field-label">Puntaje Motor Grueso</label>
              <input type="text" name="motor_grueso_puntaje_total" readonly value="<?= htmlspecialchars($datosPaciente['motor_grueso_puntaje_total']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Porcentaje hasta el momento Motor Grueso</label>
              <input type="text" name="motor_grueso_porcentaje" readonly value="<?= htmlspecialchars($datosPaciente['motor_grueso_porcentaje']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Puntaje Motor Fino</label>
              <input type="text" name="motor_fino_puntaje_total" readonly value="<?= htmlspecialchars($datosPaciente['motor_fino_puntaje_total']) ?>" class="field-input">
            </div>
        
            <div class="patient-field">
              <label class="field-label">Porcentaje hasta el momento en Motor Fino</label>
              <input type="text" name="motor_fino_porcentaje" readonly value="<?= htmlspecialchars($datosPaciente['motor_fino_porcentaje']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Puntaje Lenguaje</label>
              <input type="text" name="lenguaje_puntaje_total" readonly value="<?= htmlspecialchars($datosPaciente['lenguaje_puntaje_total']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Porcentaje hasta el momento en Lenguaje</label>
              <input type="text" name="lenguaje_porcentaje" readonly value="<?= htmlspecialchars($datosPaciente['lenguaje_porcentaje']) ?>" class="field-input">
            </div>

            <div class="patient-field">
              <label class="field-label">Numero de Evaluacion</label>
              <input type="text" name="num_evaluacion" readonly value="<?= htmlspecialchars($datosPaciente['num_evaluacion']) ?>" class="field-input">
            </div>

            <div class="patient-field md:col-span-2 lg:col-span-3">
              <label class="field-label">Factores de Riesgo</label>
              <input type="text" name="factores_riesgo" readonly value="<?= htmlspecialchars($datosPaciente['factores_riesgo']) ?>" class="field-input">
            </div>

            <div class="patient-field md:col-span-2 lg:col-span-3">
              <label class="field-label">Observaciones</label>
              <input type="text" name="observaciones" readonly value="<?= htmlspecialchars($datosPaciente['observaciones']) ?>" class="field-input">
            </div>

          </div>

          <!-- Selector de área de evaluación -->
          <div class="info-card mb-6">
            <h3 class="text-lg font-bold text-custom-title mb-4 text-center">Seleccionar Área de Evaluación</h3>
            <div class="max-w-md mx-auto">
              <div class="select-wrapper">
                <select id="myselect" name="area" class="select-custom w-full p-3 border-2 border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                  <option value="" disabled selected>Selecciona un área</option>
                  <option value="maniobras">Maniobras Katona</option>
                  <option value="motor">Motor Grueso/Movimientos Posturales</option>
                  <option value="motorFino">Motor Fino</option>
                  <option value="lenguaje">Lenguaje</option>
                  <option value="tono">Tono Muscular y Ubicación</option>
                  <option value="postura">Postura</option>
                  <option value="signos">Signos de Alarma</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Secciones de evaluación -->
          
          <!-- Maniobras Katona -->
          <div id="maniobras" class="evaluation-section" style="display: none;">
            <h3 class="section-title">MANIOBRAS KATONA</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <?php foreach ($datosKatona as $fila): ?>
                <div class="evaluation-item">
                  <div class="evaluation-label"><?= htmlspecialchars($fila[0]) ?></div>
                  <div class="evaluation-value"><?= htmlspecialchars($fila[1]) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Motor Grueso -->
          <div id="motor" class="evaluation-section" style="display: none;">
            <h3 class="section-title">Motor Grueso/Movimientos Posturales</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <?php foreach ($datosSubMG as $fila): ?>
                <div class="evaluation-item">
                  <div class="evaluation-label"><?= htmlspecialchars($fila[0]) ?></div>
                  <div class="evaluation-value"><?= htmlspecialchars($fila[1]) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Lenguaje -->
          <div id="lenguaje" class="evaluation-section" style="display: none;">
            <h3 class="section-title">Lenguaje</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <?php foreach ($datosLenguaje as $fila): ?>
                <div class="evaluation-item">
                  <div class="evaluation-label"><?= htmlspecialchars($fila[0]) ?></div>
                  <div class="evaluation-value"><?= htmlspecialchars($fila[1]) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Motor Fino -->
          <div id="motorFino" class="evaluation-section" style="display: none;">
            <h3 class="section-title">Motor Fino</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <?php foreach ($datosSubMF as $fila): ?>
                <div class="evaluation-item">
                  <div class="evaluation-label"><?= htmlspecialchars($fila[0]) ?></div>
                  <div class="evaluation-value"><?= htmlspecialchars($fila[1]) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Tono Muscular -->
          <div id="tono" class="evaluation-section" style="display: none;">
            <h3 class="section-title">Tono Muscular y Ubicación</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <?php foreach ($datosTono as $fila): ?>
                <div class="evaluation-item">
                  <div class="evaluation-label"><?= htmlspecialchars($fila[0]) ?></div>
                  <div class="evaluation-value"><?= htmlspecialchars($fila[1]) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Postura -->
          <div id="postura" class="evaluation-section" style="display: none;">
            <h3 class="section-title">POSTURA</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <?php foreach ($datosPostura as $fila): ?>
                <div class="evaluation-item">
                  <div class="evaluation-label"><?= htmlspecialchars($fila[0]) ?></div>
                  <div class="evaluation-value"><?= htmlspecialchars($fila[1]) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Signos de Alarma -->
          <div id="signos" class="evaluation-section" style="display: none;">
            <h3 class="section-title">SIGNOS DE ALARMA</h3>
            <div class="grid grid-cols-1 gap-3">
              <?php foreach ($datosSignos as $fila): ?>
                <div class="evaluation-item">
                  <div class="evaluation-value text-center"><?= htmlspecialchars($fila[0]) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Botones de navegación -->
          <div class="info-card mt-8">
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
              <button type="button" id="botonUp" class="btn-secondary">
                ↑ Regresar Arriba
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function moverArriba() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    function mostrar() {
      var select = document.getElementById("myselect");
      var sections = ['motor', 'motorFino', 'maniobras', 'tono', 'postura', 'signos', 'lenguaje'];
      
      // Ocultar todas las secciones
      sections.forEach(function(sectionId) {
        var section = document.getElementById(sectionId);
        if (section) {
          section.style.display = "none";
        }
      });

      // Mostrar la sección seleccionada con animación
      if (select.value) {
        var selectedSection = document.getElementById(select.value);
        if (selectedSection) {
          selectedSection.style.display = "block";
          selectedSection.style.opacity = "0";
          selectedSection.style.transform = "translateY(20px)";
          
          setTimeout(function() {
            selectedSection.style.transition = "all 0.3s ease-in-out";
            selectedSection.style.opacity = "1";
            selectedSection.style.transform = "translateY(0)";
          }, 10);
        }
      }
    }

    // Inicializar eventos
    document.addEventListener('DOMContentLoaded', function() {
      mostrar();
      document.getElementById("myselect").addEventListener("change", mostrar);
      document.getElementById("botonUp").addEventListener("click", moverArriba);
    });
  </script>

</body>
</html>