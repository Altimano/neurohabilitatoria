<?php
session_start();

include './config/db.php';
include './Clases/Estudios.php';

if ($_SESSION["session"] === 'okA'){
    require './vistas/partials/header.php';
    require './vistas/consultar.view.php';
    if (!empty($_POST['Nombre'])) {
        $Criterio = strtoupper($_POST['Nombre']);
        $Con = conectar();
        $Estudios = new Estudios($Con);
        $result = $Estudios->consultarTodosLosEstudios($Criterio);
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

    }elseif (!empty($_POST['fecha'])) {
        $Criterio = strtoupper($_POST['fecha']);
        $Con = conectar();
        $Estudios = new Estudios($Con);
        $result = $Estudios->consultarPorAno($Criterio);
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
        } 
    }elseif (!empty($_POST['codigo'])) {
        $Criterio = $_POST['codigo'];
        $Con = conectar();
        $Estudios = new Estudios($Con);
        $result = $Estudios->consultarPorCodigo($Criterio);
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
}
require './vistas/partials/footer.php';
}