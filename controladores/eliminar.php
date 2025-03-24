<?php
 session_start();
 include './config/db.php';
if ($_SESSION["session"] === 'okA'){
    require './vistas/eliminar.view.php';
    if (isset($_POST['Nombre'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        //QUEDA PENDIENTE SI SE VA A BUSCAR TAMBIEN EL CODIGO DE PACIENTE
        $SQL = "SELECT * FROM terapia_neurohabilitatoria WHERE nombre_pacinete LIKE ?";
        $stmt=  $Con -> prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("s", $likeCriterio);
        $stmt->execute();
        $result = $stmt->get_result();
        $TotalFilas = mysqli_num_rows($result);
        echo "<table border='1'>";
        echo "<tr><th>Clave Paciente</th><th>Nombre</th><th>Acción</th></tr>";
        for ($i = 0; $i < $TotalFilas; $i++) {
            $Fila = mysqli_fetch_assoc($result);
            echo "<tr>";
            echo "<td>" . $Fila["clave_paciente"] . "</td>";
            echo "<td>" . $Fila["nombre_pacinete"] . "</td>";
            echo "<td>
                    <form action='controladores/eliminar_paciente.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='clave_paciente' value='" . $Fila["clave_paciente"] . "'>
                        <button type='submit' onclick='return confirm(\"¿Estás seguro de eliminar este paciente?\");'>
                            Eliminar
                        </button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";

        $stmt->close();
        $Con->close();
    }
}
