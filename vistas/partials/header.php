<!-- Header (barrita de arriba blanca con opciones de operacion) 
    Se usa para navegar entre las diferentes secciones de la aplicacion. 
    Usa flowbite
-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link href="/assets/output.css" rel="stylesheet" />
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
=======
    <link rel="stylesheet" href="<?= base_url('/assets/output.css') ?>">
    <script src="<?= base_url('/node_modules/flowbite/dist/flowbite.min.js') ?>"></script>
>>>>>>> deploy_test

</head>

<header class="bg-white text-black w-full shadow-lg">
    <div class="container mx-auto flex flex-wrap items-center justify-between px-6 py-[0.75rem]">
        <!-- Logo -->
        <div class="logos">
            <div class="flex">
<<<<<<< HEAD
                <img src="/assets/img/Logo1.png" alt="Logo1" class="h-24 w-auto px-2">
                <img src="/assets/img/Logo2.png" alt="Logo2" class="h-24 w-auto px-2">
=======
                <img src=<?= base_url("/assets/img/Logo1.png")?> alt="Logo1" class="h-24 w-auto px-2">
                <img src=<?= base_url("/assets/img/Logo2.png")?> alt="Logo2" class="h-24 w-auto px-2">
>>>>>>> deploy_test
            </div>
        </div>

        <!-- Navigation -->
        <button id="menu-toggle" class="block md:hidden text-black pt-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <nav id="menu" class="hidden md:flex flex-col md:flex-row md:space-x-4 w-full md:w-auto">
<<<<<<< HEAD
            <a href="/crear" class="font-bold text-lg px-4 py-2">AGREGAR</a>
            <a href="/consultar" class="font-bold text-lg px-4 py-2">CONSULTAR</a>
            <a href="/modificar" class="font-bold text-lg px-4 py-2">MODIFICAR</a>
            <a href="/eliminar" class="font-bold text-lg px-4 py-2">ELIMINAR</a>
        </nav>

        <a href="/"
=======
            <a href=<?= base_url("/crear")?> class="font-bold text-lg px-4 py-2">AGREGAR</a>
            <a href=<?= base_url("/consultar")?> class="font-bold text-lg px-4 py-2">CONSULTAR</a>
            <a href=<?= base_url("/modificar")?> class="font-bold text-lg px-4 py-2">MODIFICAR</a>
            <a href=<?= base_url("/eliminar")?> class="font-bold text-lg px-4 py-2">ELIMINAR</a>
        </nav>

        <a href=<?= base_url("/salir")?>
>>>>>>> deploy_test
            class="bg-[#1F7BB8] text-black font-bold px-10 py-3 text-lg rounded-full hover:bg-[#155E8A] no-underline">
            Cerrar sesión
        </a>
    </div>
</header>

<script>
    document.getElementById("menu-toggle").addEventListener("click", () => {
        const menu = document.getElementById("menu");
        menu.classList.toggle("hidden");
    });
</script>