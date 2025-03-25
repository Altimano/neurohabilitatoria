<?php
 session_start();
 include './config/db.php';
if ($_SESSION["session"] === 'okA'){
    require './vistas/consultar.view.php';
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
        if ($TotalFilas > 0) {
            echo "<table border='1'>";
            echo "<thead><tr>";


            $Fila = mysqli_fetch_assoc($result);

            foreach ($Fila as $nom_columna => $valor_columna) {
                echo "<th>$nom_columna</th>"; 
            }

            echo "</tr></thead><tbody>";


            echo "<tr>";
            foreach ($Fila as $valor_columna) {
                echo "<td>$valor_columna</td>";
            }
            echo "</tr>";


            while ($Fila = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($Fila as $valor_columna) {
                    echo "<td>$valor_columna</td>";
                }
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "No hay datos disponibles.";
        }

        $stmt->close();
        $Con->close();
    }
}
