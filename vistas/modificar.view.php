<?php
session_start();
include 'partials/header.php';
?>

<!-- Estilos personalizados para el cuerpo de la vista -->
<style>
  .bg-custom-main-box { background-color: #E0F2FE; }
  .bg-custom-button { background-color: #0284C7; }
  .text-custom-title { color: #0369A1; }
</style>

<!-- Contenedor principal para la modificación -->
<div class="mx-6 md:mx-10 my-6 bg-custom-main-box rounded-xl shadow-md p-6">
  <h2 class="text-2xl font-bold text-custom-title mb-4">
    Ingresa los datos para modificar la evaluación
  </h2>

  <!-- Formulario de modificación -->
  <form method="post" action="/modificar" class="space-y-4">
    <!-- Código del Paciente -->
    <div>
      <label for="codigoPaciente" class="block text-sm font-medium text-custom-title mb-1">
        Código del Paciente
      </label>
      <input 
        type="text" 
        id="codigoPaciente" 
        name="codigoPaciente" 
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2" 
        placeholder="Ej. P001"
        value=""
      >
    </div>

    <!-- Nombre Completo -->
    <div>
      <label for="nombrePaciente" class="block text-sm font-medium text-custom-title mb-1">
        Nombre Completo
      </label>
      <input 
        type="text" 
        id="nombrePaciente" 
        name="nombrePaciente" 
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2" 
        placeholder="Ej. Juan Pérez"
        value=""
      >
    </div>

    <!-- Fecha de Nacimiento -->
    <div>
      <label for="fechaNacimiento" class="block text-sm font-medium text-custom-title mb-1">
        Fecha de Nacimiento
      </label>
      <input 
        type="date" 
        id="fechaNacimiento" 
        name="fechaNacimiento" 
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2"
      >
    </div>

    <!-- Semanas de Gestación -->
    <div>
      <label for="semanasGestacion" class="block text-sm font-medium text-custom-title mb-1">
        Semanas de Gestación
      </label>
      <input 
        type="number" 
        id="semanasGestacion" 
        name="semanasGestacion" 
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2" 
        placeholder="Ej. 38"
        value=""
      >
    </div>

    <!-- Fecha de Registro -->
    <div>
      <label for="fechaRegistro" class="block text-sm font-medium text-custom-title mb-1">
        Fecha de Registro
      </label>
      <input 
        type="date" 
        id="fechaRegistro" 
        name="fechaRegistro" 
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm p-2"
      >
    </div>

    <!-- Botones de acción -->
    <div class="flex items-center justify-between pt-4">
      <!-- Botón Cancelar a la izquierda -->
      <a 
        href="/inicio" 
        class="bg-gray-400 hover:opacity-90 text-white font-semibold py-2 px-6 rounded-lg"
      >
        Cancelar
      </a>
      <!-- Botón Modificar a la derecha -->
      <button 
        type="submit" 
        class="bg-custom-button hover:opacity-90 text-white font-semibold py-2 px-6 rounded-lg"
      >
        Modificar
      </button>
    </div>
  </form>
</div>

<?php
include 'partials/footer.php';

?>
