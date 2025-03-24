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
        for ($i = 0; $i < $TotalFilas; $i++) {
            $Fila = mysqli_fetch_assoc($result);
            echo "<tr><td>" . $Fila["clave_paciente"] ."</td></tr>";
        }

        $stmt->close();
        $Con->close();
    }
}
