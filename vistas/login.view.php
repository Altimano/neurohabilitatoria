<?php require 'partials/header.php'; ?>

<div class="text-4xl mt-10 block text-center text-[#1f7BB8] font-semibold">
    <h1>Terapia Neurohabilitatoria</h1>
</div>

<body class="bg-[#BBD6DE]">
  <form action="/" class="max-w-sm mx-auto p-6 rounded-xl" method="post">

    <div class="w-102 p-6 shadow-lg content-center bg-[#1f7BB8] rounded-xl">
      <label for="usuario" class="block text-base mb-2 text-white">Usuario</label>
      <input 
        type="text" 
        id="usuario" 
        name="usuario"
        class="border w-full text-base px-2 py-1 mb-4 focus:outline-none focus:ring-0 focus:border-gray-600 rounded"
        placeholder="Ingresar Usuario"
        required
      />

      <label for="contraseña" class="block text-base mb-2 text-white">Contraseña</label>
      <input 
        type="password" 
        id="contraseña" 
        name="contraseña"
        class="border w-full text-base px-2 py-1 mb-4 focus:outline-none focus:ring-0 focus:border-gray-600 rounded"
        placeholder="Ingresar Contraseña"
        required
      />

      
        <button type="submit" class="mt-4 w-full bg-blue-900 text-white py-2 rounded hover:bg-blue-800">
        Iniciar sesión
      </button>
      </a>
    </div>
  </form>
</body>


