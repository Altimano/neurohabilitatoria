<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

echo "<h3>Datos de la sesión:</h3>";
/*if (!empty($_SESSION)) {
    foreach ($_SESSION as $key => $value) {
        echo "<strong>$key:</strong> ";
        if (is_array($value)) {
            print_r($value);
        } else {
            echo htmlspecialchars($value);
        }
        echo "<br>";
    }
} else {
    echo "No hay datos en la sesión.";
}*/
    require './vistas/modificar.hitomfino.php';