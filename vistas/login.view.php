    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/output.css" rel="stylesheet" />

    <body class="bg-[#BBD6DE] flex items-center justify-center min-h-screen">
      <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
      <div class="w-full max-w-md mb-12">
        <div class="text-4xl mb-6 text-center text-[#1f7BB8] font-semibold">
          <h1>Terapia Neurohabilitatoria</h1>
        </div>

        <form action="/" method="post" autocomplete="off" class="bg-[#1f7BB8] p-6 rounded-xl shadow-lg">
          <label for="usuario" class="block text-base mb-2 text-white">Usuario</label>
          <input
            type="text"
            id="usuario"
            name="user"
            class="border w-full text-base px-2 py-1 mb-4 focus:outline-none focus:ring-0 focus:border-gray-600 rounded"
            placeholder="Ingresar Usuario"
            required />

          <label for="contraseña" class="block text-base mb-2 text-white">Contraseña</label>
          <input
            type="password"
            id="contraseña"
            name="password"
            class="border w-full text-base px-2 py-1 mb-4 focus:outline-none focus:ring-0 focus:border-gray-600 rounded"
            placeholder="Ingresar Contraseña"
            required />

          <button type="submit" class="mt-4 w-full bg-blue-900 text-white py-2 rounded hover:bg-blue-800">
            Iniciar sesión
          </button>
        </form>
      </div>

    </body>