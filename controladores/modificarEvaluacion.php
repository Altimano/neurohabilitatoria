<?php
session_start();

include './config/db.php';
include './Clases/Estudios.php';

if ($_SESSION["session"] === 'okA') {
    require './vistas/modificar.view.php';
    if (isset($_POST['Nombre'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        //QUEDA PENDIENTE QUE DATOS MOSTRAR AL AGREGAR ESTUDIO
        //QUEDA PENDIENTE EN PRUEBA LOCAL AGREGAR BAYLEY3
        $Estudios = new Estudios($Con);
        $result = $Estudios->consultarTodosLosEstudios($Criterio);
        $TotalFilas = mysqli_num_rows($result);
        echo "<table border='1'>";
        echo "<tr><th>Acción</th><th>Clave Paciente</th><th>Nombre</th><th>Fecha de Evaluacion Subsecuente</th></tr>";
        while ($Fila = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>
                    <form action='controladores/modificar.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='row_id' value='" . $Fila["id_terapia_neurohabilitatoria"] . "'>
                        <button type='submit' onclick='return confirm(\"¿Estás seguro de modificar este estudio?\");'>
                            Modificar
                        </button>
                    </form>
                  </td>";
            echo "<td>" . $Fila["clave_paciente"] . "</td>";
            echo "<td>" . $Fila["nombre_pacinete"] . "</td>";
            echo "<td>" . $Fila["eval_subs_fec_eval"] . "</td>";

            echo "</tr>";
        }

        echo "</table>";
        $stmt->close();
        $Con->close();
    }
}