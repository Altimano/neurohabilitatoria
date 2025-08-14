<!-- Pagina de inicio, aqui se muestra el carrousel de imagenes junto con el header para seleccionar operaciones a realizar -->
<?php require 'partials/header.php'; ?>

<div id="default-carousel" class="relative w-full h-screen" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-screen overflow-hidden">
        <!-- Item 1 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src=<?=base_url("/assets/fotoscarrusel/Slide1.webp")?> class="absolute w-full h-full object-cover top-0 left-0">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src=<?=base_url("/assets/fotoscarrusel/Slide2.webp")?> class="absolute w-full h-full object-cover top-0 left-0">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src=<?=base_url("/assets/fotoscarrusel/Slide3.webp")?> class="absolute w-full h-full object-cover top-0 left-0">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src=<?=base_url("/assets/fotoscarrusel/Slide4.webp")?> class="absolute w-full h-full object-cover top-0 left-0">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src=<?=base_url("/assets/fotoscarrusel/Slide5.webp")?> class="absolute w-full h-full object-cover top-0 left-0">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex justify-center w-full bottom-5">
        <div class="flex space-x-3">
            <button type="button" class="w-5 h-5 rounded-full" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-5 h-5 rounded-full" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-5 h-5 rounded-full" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-5 h-5 rounded-full" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-5 h-5 rounded-full" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 
                    group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60
                    group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<div class="flex flex-col justify-center items-center">
    <div class="w-[300px] h-[300px]">
        <img src=<?=base_url("/assets/img/bebe.svg")?> alt="Bebe" class="w-full h-full">
    </div>

    <div class="text-center text-lg border-t-4 border-b-4 border-indigo-500 mb-24 p-4 mx-72">
        <p>La Unidad de Investigación en Neurodesarrollo realiza con éxito el diagnóstico e intervención temprana de recién nacidos
            expuestos a factores de riesgo de daño cerebral prenatal y perinatal. El trabajo realizado por el equipo
            multidisciplinario de esta Unidad, ha logrado minimizar secuelas de discapacidad que provoca el daño cerebral en los bebés.
        </p>
    </div>
</div>
</div>