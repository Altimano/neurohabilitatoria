<?php
session_start();
include './config/db.php';
include './Clases/Estudios.php';
if ($_SESSION["session"] === 'okA') {
    require './vistas/crear.view.php';
    if (isset($_POST['Nombre'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        //QUEDA PENDIENTE QUE DATOS MOSTRAR AL AGREGAR ESTUDIO
        $Estudios = new Estudios($Con);
        $result = $Estudios->consultarEstudio($Criterio);
        $TotalFilas = mysqli_num_rows($result);
        echo "<table border='1'>";
        echo "<tr><th>Codigo Paciente</th><th>Nombre</th><th>Acción</th></tr>";
        for ($i = 0; $i < $TotalFilas; $i++) {
            $Fila = mysqli_fetch_assoc($result);
            echo "<tr>";
            echo "<td>" . $Fila["codigo_paciente"] . "</td>";
            echo "<td>" . $Fila["nombre_pacinete"] . " " . $Fila["apellido_paterno_paciente"] . " " . $Fila["apellido_materno_paciente"] . "</td>";
            echo "<td>
                    <form action='controladores/crear.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='codigo_paciente' value='" . $Fila["codigo_paciente"] . "'>
                        <button type='submit' onclick='return confirm(\"¿Estás seguro de agregar un estudio para este paciente?\");'>
                            Agregar
                        </button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}
