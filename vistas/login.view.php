<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Terapia Neurohabilitatoria</title>
    <link rel="stylesheet" href="<?= base_url('/assets/output.css') ?>">
</head>
<body class="bg-[#BBD6DE] flex items-center justify-center min-h-screen">
    <script src="<?= base_url('/node_modules/flowbite/dist/flowbite.min.js') ?>"></script>
    
    <div class="w-full max-w-md mb-12">
        <div class="text-4xl mb-6 text-center text-[#1f7BB8] font-semibold">
            <h1>Terapia Neurohabilitatoria</h1>
        </div>

        <!-- CAMBIO IMPORTANTE: Action apunta específicamente a /login -->
        <form action="<?= base_url('/login') ?>" method="post" autocomplete="off" class="bg-[#1f7BB8] p-6 rounded-xl shadow-lg">
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

        <!-- Mostrar errores si existen -->
        <?php if (isset($error)) : ?>
            <div class="mt-4 flex items-center gap-2 p-4 mb-4 text-blue-900 border border-blue-300 rounded-lg bg-blue-100 shadow-sm" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-blue-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.75a.75.75 0 00-1.5 0v3.5a.75.75 0 001.5 0v-3.5zm0 6a.75.75 0 00-1.5 0v.5a.75.75 0 001.5 0v-.5z" />
                </svg>
                <div class="text-sm font-medium">
                    <?= htmlspecialchars($error) ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- DEBUG: Mostrar información útil -->
        <?php if (isset($_GET['debug'])): ?>
            <div class="mt-4 p-3 bg-gray-100 rounded text-sm">
                <strong>Debug Info:</strong><br>
                Current URL: <?= base_url() ?><br>
                Form Action: <?= base_url('/login') ?><br>
                Request Method: <?= $_SERVER['REQUEST_METHOD'] ?? 'GET' ?><br>
                Request URI: <?= $_SERVER['REQUEST_URI'] ?? 'N/A' ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>