<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS y Flowbite por CDN -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<header class="bg-white text-black w-full shadow-lg">
    <div class="container mx-auto flex flex-wrap items-center justify-between px-6 py-[0.75rem]">
        <!-- Logo -->
        <div class="logos">
            <div class="flex">
                <img src="/assets/img/Logo1.png" alt="Logo1" class="h-24 w-auto px-2">
                <img src="/assets/img/Logo2.png" alt="Logo2" class="h-24 w-auto px-2">
            </div>
        </div>

        <!-- Navigation -->
        <button id="menu-toggle" class="block md:hidden text-black pt-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <nav id="menu" class="hidden md:flex flex-col md:flex-row md:space-x-4 w-full md:w-auto">
            <a href="#" class="font-bold text-lg px-4 py-2">AGREGAR</a>
            <a href="#" class="font-bold text-lg px-4 py-2">CONSULTAR</a>
            <a href="#" class="font-bold text-lg px-4 py-2">MODIFICAR</a>
            <a href="#" class="font-bold text-lg px-4 py-2">ELIMINAR</a>
        </nav>
    </div>
</header>

<script>
    document.getElementById("menu-toggle").addEventListener("click", () => {
        const menu = document.getElementById("menu");
        menu.classList.toggle("hidden");
    });
</script>
