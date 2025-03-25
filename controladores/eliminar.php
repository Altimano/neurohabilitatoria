<?php
session_start();
include '../config/db.php';

if (isset($_POST['row_id'])) {
    $row_id = $_POST['row_id'];
    $Con = conectar();
    $stmt = $Con -> prepare("DELETE FROM terapia_neurohabilitatoria WHERE id_terapia_neurohabilitatoria = ?");
    $stmt->bind_param("i", $row_id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        header("Location: /eliminar");
    }else{
        echo "No se pudo eliminar el paciente " . $stmt->error;
    }
    $Con->close();

}