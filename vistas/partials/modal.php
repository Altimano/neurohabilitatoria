<body>
    <div class="hidden">
        <img src="/assets/img_iconos/agregaar.svg" class="agregar w-24 h-24 hover:scale-110 hover:brightness-75 transition-all" />
        <img src="/assets/img_iconos/mooodificar.svg" class="modificar w-24 h-24 hover:scale-110 hover:brightness-75 transition-all" />
        <img src="/assets/img_iconos/eliminaar.svg" class="eliminar w-24 h-24 hover:scale-110 hover:brightness-75 transition-all" />
    </div>

    <!--componente del modal general-->
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
                            <h3 class="text-lg font-medium text-gray-900"></h3>
                        <div class="texto-modal">
                            <p class="text-gray-500 text-sm"></p>
                        </div>
                        </div>
                    </div>
                </div>

                <!--Componente de modal de advertencia-->
                <div class="acciones-modal bg-gray-200 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="Cancelar-cerrar" class="w-full inline-flex justify-center rounded-md border border-transparent 
                    shadow-md px-4 py-2 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none
                    focus:ring-2 focus:ring-offset-2 focus:ring-blue-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                    <button id="Seguir" class="w-full inline-flex justify-center rounded-md border border-transparent 
                    shadow-md px-4 py-2 mt-3 bg-red-700 font-medium text-white hover:bg-red-600 focus:outline-none
                    focus:ring-2 focus:ring-offset-2 focus:ring-red-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"></button>
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
                            <h3 class="text-lg font-medium text-gray-900"></h3>
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
    const botones = document.querySelectorAll(".agregar, .buscar, .modificar, .eliminar");

    const modalOverlay = document.getElementById("contenedor-componente-modal");
    const modal = document.getElementById("contenedor-modal");
    const botonCancelar = document.getElementById("Cancelar-cerrar");
    const botonSeguir = document.getElementById("Seguir");

    const modalExitoOverlay = document.getElementById("contenedor-componente-modal-exito");
    const modalExito = modalExitoOverlay.querySelector("#contenedor-modal");
    const botonCancelarExito = document.getElementById("Cancelar-cerrar-exito");

    const tituloModal = modal.querySelector("h3");
    const textoModal = modal.querySelector(".texto-modal p");
    const imagenModal = modal.querySelector(".iconos-modal img");

    const tituloExitoModal = modalExito.querySelector("h3");
    const imagenExitoModal = modalExito.querySelector("img");

    // Configuraciones por tipo de botón
    const config = {
        agregar: {
            titulo: "Agregar Paciente",
            texto: "¿Seguro que quieres agregar este campo?",
            imagen: "/assets/img/advertencia.png",
            textoBoton: "Agregar",
            colorBoton: "bg-blue-700 hover:bg-blue-600 text-white focus:ring-blue-200",
            tituloExito: "¡Paciente agregado exitosamente!",
            imagenExito: "/assets/img/Exito.png"
        },
        modificar: {
            titulo: "Modificar Paciente",
            texto: "¿Seguro que quieres modificar este campo?",
            imagen: "/assets/img/advertencia.png",
            textoBoton: "Modificar",
            colorBoton: "bg-yellow-600 hover:bg-yellow-500 text-white focus:ring-yellow-200",
            tituloExito: "¡Modificación realizada con éxito!",
            imagenExito: "/assets/img/Exito.png"
        },
        eliminar: {
            titulo: "Eliminar Paciente",
            texto: "¿Seguro que quieres eliminar este campo?",
            imagen: "/assets/img/advertencia.png",
            textoBoton: "Eliminar",
            colorBoton: "bg-red-700 hover:bg-red-600 text-white focus:ring-red-200",
            tituloExito: "¡Paciente eliminado correctamente!",
            imagenExito: "/assets/img/Exito.png"
        }
    };

    let claseSeleccionada = null;

    botones.forEach(boton => {
        boton.addEventListener("click", () => {
            claseSeleccionada = Array.from(boton.classList).find(cls => config[cls]);
            if (!claseSeleccionada) return;

            const datos = config[claseSeleccionada];

            // Actualiza contenido del primer modal
            tituloModal.textContent = datos.titulo;
            textoModal.textContent = datos.texto;
            imagenModal.src = datos.imagen;

            // Actualiza botón
            botonSeguir.textContent = datos.textoBoton;
            botonSeguir.className = `w-full inline-flex justify-center rounded-md border border-transparent 
                shadow-md px-4 py-2 mt-3 font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 
                sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm ${datos.colorBoton}`;

            // Muestra modal
            modalOverlay.classList.remove("hidden");
            setTimeout(() => {
                modal.classList.remove("opacity-0", "scale-95");
                modal.classList.add("opacity-100", "scale-100");
            }, 10);
        });
    });

    botonCancelar.addEventListener("click", () => {
        modal.classList.remove("opacity-100", "scale-100");
        modal.classList.add("opacity-0", "scale-95");
        setTimeout(() => modalOverlay.classList.add("hidden"), 200);
    });

    botonSeguir.addEventListener("click", () => {
        if (!claseSeleccionada) return;

        const datos = config[claseSeleccionada];

        // Oculta modal de advertencia
        modal.classList.remove("opacity-100", "scale-100");
        modal.classList.add("opacity-0", "scale-95");

        setTimeout(() => {
            modalOverlay.classList.add("hidden");

            // Muestra modal de éxito
            tituloExitoModal.textContent = datos.tituloExito;
            imagenExitoModal.src = datos.imagenExito;

            modalExitoOverlay.classList.remove("hidden");
            setTimeout(() => {
                modalExito.classList.remove("opacity-0", "scale-95");
                modalExito.classList.add("opacity-100", "scale-100");
            }, 10);
        }, 200);
    });

    botonCancelarExito.addEventListener("click", () => {
        modalExito.classList.remove("opacity-100", "scale-100");
        modalExito.classList.add("opacity-0", "scale-95");
        setTimeout(() => modalExitoOverlay.classList.add("hidden"), 200);
    });
});
</script>

