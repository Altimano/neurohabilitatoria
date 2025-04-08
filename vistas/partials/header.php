<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS y Flowbite por CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<header class="bg-white text-black py-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-6">

        <!-- logo izquierdo -->
        <img src="/assets/img/Logo1.png" alt="Logo Izquierdo" class="h-32 w-auto">

        <!-- menu -->
        <nav class="flex items-center space-x-12">
            <a href="/crear" class="font-bold text-xl px-4 py-2 hover:underline hover:text-[#1F7BB8]">
                AGREGAR
            </a>
            <a href="/consultar" class="font-bold text-xl px-4 py-2 hover:underline hover:text-[#1F7BB8]">
                CONSULTAR
            </a>
            <a href="/modificar" class="font-bold text-xl px-4 py-2 hover:underline hover:text-[#1F7BB8]">
                MODIFICAR
            </a>
            <a href="/eliminar" class="font-bold text-xl px-4 py-2 hover:underline hover:text-[#1F7BB8]">
                ELIMINAR
            </a>
        </nav>

        <!-- logo derecho-->
        <div class="flex items-center space-x-6">
            <img src="/assets/img/Logo2.png" alt="Logo Derecho" class="h-24 w-auto">
            <!-- cerrar sesión -->
            <a href="/salir"
                class="bg-[#1F7BB8] text-black font-bold px-10 py-3 text-lg rounded-full hover:bg-[#155E8A] no-underline">
                Cerrar sesión
            </a>
        </div>
    </div>
</header>