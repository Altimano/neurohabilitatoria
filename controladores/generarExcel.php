<?php
session_start();
date_default_timezone_set('America/Mexico_City');
if (!isset($_POST['datosExcel'])) {
    die("No hay datos para exportar.");
}

$datos = json_decode($_POST['datosExcel'], true);
$nombreArchivo = "Evaluaciones_" . date("Y-m-d_H-i-s") . ".xls";
header("Content-Type: application/vnd.ms-excel");

header("Content-Disposition: attachment; filename=\"$nombreArchivo\"");

echo "<table border='1'>";
echo "<tr>
        <th>Código de Paciente</th>
        <th>Nombre del Paciente</th>
        <th>Fecha de Registro</th>
        <th>Edad Corregida</th>
        <th>Inicio Tratamiento</th>
        <th>Fecha Evaluación</th>
      </tr>";

foreach ($datos as $fila) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($fila["clave_paciente"]) . "</td>";
    echo "<td>" . htmlspecialchars($fila["nombre_pacinete"]) . "</td>";
    echo "<td>" . htmlspecialchars($fila["fecha_registro"]) . "</td>";
    echo "<td>" . htmlspecialchars($fila["edad_corregida"]) . "</td>";
    echo "<td>" . htmlspecialchars($fila["dat_ter_fec_ini_tratam_terap"]) . "</td>";
    echo "<td>" . htmlspecialchars($fila["eval_subs_fec_eval"]) . "</td>";
    echo "</tr>";
}

echo "</table>";