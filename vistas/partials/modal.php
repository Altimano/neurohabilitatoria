
<body>
    <button class="bg-blue-300 text-white p-3">Abrir modal</button>

    <!--componente del modal de eliminar-->
    <div id="contenedor-componente-modal" class="hidden fixed inset-0">
        <div class="contenedor-modal-flex flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center 
            sm:block sm:p-0"> 
            <!--flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center--> <!--Estilos cuando la pantalla sea menor a 640px--> 
            <!--sm:block sm:p-0--> <!--Esilos cuando la pantalla sea mayor a 640px-->
            <div class="contenedor-modal-bg fixed inset-0 bg-gray-700 bg-opacity-75"></div>
            
            <div class="contenedor-espacio hidden sm:inline-block sm:align-middle sm:h-screen"></div>

            <div id="contenedor-modal" class="contenedor-modal inline-block alignbottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="modal-wrapper-flex sm:flex sm:items-start">
                        <div class="iconos-modal mx-auto flex-shrink-0 flex items-center justify-center h-64 w-64 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <img src="/assets/img/advertencia.png" class="h-auto w-auto">
                        </div>
                        <div class="contenido-modal text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg font-medium text-gray-900">
                                Eliminar Paciente
                            </h3>
                        <div class="texto-modal">
                            <p class="text-gray-500 text-sm">¿Seguro que quieres eliminar este campo?</p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="acciones-modal bg-gray-200 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="Cancelar-cerrar" class="w-full inline-flex justify-center rounded-md border border-transparent 
                    shadow-md px-4 py-2 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none
                    focus:ring-2 focus:ring-offset-2 focus:ring-blue-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                    <button id="Eliminar-seguir" class="w-full inline-flex justify-center rounded-md border border-transparent 
                    shadow-md px-4 py-2 mt-3 bg-red-700 font-medium text-white hover:bg-red-600 focus:outline-none
                    focus:ring-2 focus:ring-offset-2 focus:ring-red-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Componente de modal de exito-->
    <div id="contenedor-componente-modal-exito" class="hidden fixed inset-0">
        <div class="contenedor-modal-flex flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center 
            sm:block sm:p-0"> 
            <div class="contenedor-modal-bg fixed inset-0 bg-gray-700 bg-opacity-75"></div>
            
            <div class="contenedor-espacio hidden sm:inline-block sm:align-middle sm:h-screen"></div>

            <div id="contenedor-modal" class="contenedor-modal inline-block align bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="modal-wrapper-flex sm:flex sm:items-start">
                        <div class="iconos-modal mx-auto flex-shrink-0 flex items-center justify-center h-64 w-64 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <img src="/assets/img/Exito.png" alt="Logo1" class="h-auto w-auto">
                        </div>
                        <div class="contenido-modal text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg font-medium text-gray-900">
                                Se ha borrado el paciente con exito!
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="acciones-modal bg-gray-200 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="Cancelar-cerrar-exito" class="w-full inline-flex justify-center rounded-md border border-transparent 
                    shadow-md px-4 py-2 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none
                    focus:ring-2 focus:ring-offset-2 focus:ring-blue-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    const botonAbrir = document.querySelector("button.bg-blue-300");
    const modalOverlay = document.getElementById("contenedor-componente-modal");
    const modal = document.getElementById("contenedor-modal");
    const botonCancelar = document.getElementById("Cancelar-cerrar");
    const botonCancelarExito = document.getElementById("Cancelar-cerrar-exito");
    const botonEliminar = document.getElementById("Eliminar-seguir");

    const modalExitoOverlay = document.getElementById("contenedor-componente-modal-exito");
    const modalExito = modalExitoOverlay.querySelector("#contenedor-modal");

    // Ocultar ambos modales al inicio
    modalOverlay.classList.add("hidden");
    modal.classList.add("opacity-0", "scale-95", "transition-all", "duration-200");

    modalExitoOverlay.classList.add("hidden");
    modalExito.classList.add("opacity-0", "scale-95", "transition-all", "duration-200");

    // Abrir primer modal
    botonAbrir.addEventListener("click", () => {
        modalOverlay.classList.remove("hidden");

        setTimeout(() => {
            modal.classList.remove("opacity-0", "scale-95");
            modal.classList.add("opacity-100", "scale-100");
        }, 10);
    });

    // Cancelar primer modal
    botonCancelar.addEventListener("click", () => {
        modal.classList.remove("opacity-100", "scale-100");
        modal.classList.add("opacity-0", "scale-95");

        setTimeout(() => {
            modalOverlay.classList.add("hidden");
        }, 200);
    });

    // Eliminar y mostrar modal de éxito
    botonEliminar.addEventListener("click", () => {
        // Cerrar el modal de eliminar
        modal.classList.remove("opacity-100", "scale-100");
        modal.classList.add("opacity-0", "scale-95");

        setTimeout(() => {
            modalOverlay.classList.add("hidden");

            // Mostrar el modal de éxito
            modalExitoOverlay.classList.remove("hidden");
            setTimeout(() => {
                modalExito.classList.remove("opacity-0", "scale-95");
                modalExito.classList.add("opacity-100", "scale-100");
            }, 10);
        }, 200);

            // Cerrar el segundo modal
            botonCancelarExito.addEventListener("click", () => {
                modalExito.classList.remove("opacity-100", "scale-100");
                modalExito.classList.add("opacity-0", "scale-95");

                setTimeout(() => {
                    modalExitoOverlay.classList.add("hidden");
            }, 200);
        });
    });
});
</script>
</body>