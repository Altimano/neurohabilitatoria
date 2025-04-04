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
        //QUEDA PENDIENTE EN PRUEBA LOCAL AGREGAR BAYLEY3
        $Estudio = new Estudios($Con);
        $result = $Estudio->consultarPacientes($Criterio);
        $TotalFilas = mysqli_num_rows($result);
        $Fila = mysqli_fetch_assoc($result);
        echo "<table border='1'>";
        echo "<tr><th>Codigo Paciente</th><th>Nombre</th><th>Fecha de Nacimiento</th><th>Semanas de Gestacion</th><th>Fecha de registro</th><th>Acción</th></tr>";
        for ($i = 0; $i < $TotalFilas; $i++) {
            $Fila = mysqli_fetch_assoc($result);
            echo "<tr>";
            echo "<td>" . $Fila["codigo_paciente"] . "</td>";
            echo "<td>" . $Fila["nombre_paciente"] . " " . $Fila["apellido_paterno_paciente"] . " " . $Fila["apellido_materno_paciente"] . "</td>";
            echo "<td>" . $Fila["fecha_nacimiento_paciente"] . "</td>";
            echo "<td>" . $Fila["semanas_gestacion"] . "</td>";
            echo "<td>" . $Fila["fecha_registro"] . "</td>";
            echo "<td>
                    <form action='controladores/crear.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='codigo_paciente' value='" . $Fila["codigo_paciente"] . $Fila["fecha_nacimiento_paciente"] . $Fila["semanas_gestacion"] ."'>
                        <input type='hidden' name='fecha_nacimiento_paciente' value='".$Fila["fecha_nacimiento_paciente"]."'>
                         <input type='hidden' name='semanas_gestacion' value='".$Fila["semanas_gestacion"]."'>
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
