<?php
 session_start();
 include './config/db.php';
if ($_SESSION["session"] === 'okA'){
    require './vistas/eliminar.view.php';
    if (isset($_POST['Nombre'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        //QUEDA PENDIENTE SI SE VA A BUSCAR TAMBIEN EL CODIGO DE PACIENTE
        //QUEDA PENDIENTE QUE MOSTRAR PARA CONSULTAR ELIMINAR
        $SQL = "SELECT  * FROM terapia_neurohabilitatoria WHERE nombre_pacinete LIKE ?";
        $stmt=  $Con -> prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $Con->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("s", $likeCriterio);
        $stmt->execute();
        $result = $stmt->get_result();
        $TotalFilas = mysqli_num_rows($result);
        echo "<table border='1'>";
        echo "<tr><th>Clave Paciente</th><th>Nombre</th><th>Fecha de Evaluacion Subsecuente</th><th>Acción</th></tr>";
        for ($i = 0; $i < $TotalFilas; $i++) {
            $Fila = mysqli_fetch_assoc($result);
            echo "<tr>";
            echo "<td>" . $Fila["clave_paciente"] . "</td>";
            echo "<td>" . $Fila["nombre_pacinete"] . "</td>";
            echo "<td>" . $Fila["eval_subs_fec_eval"] . "</td>";
            echo "<td>
                    <form action='controladores/eliminar.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='row_id' value='" . $Fila["id_terapia_neurohabilitatoria"] . "'>
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
