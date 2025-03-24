<?php
    function validarAcceso($user, $password) {
        include "./config/db.php";
        $Con = conectar();
        $stmt = $Con -> prepare("SELECT nombre_usuario_personal FROM personal WHERE nombre_usuario_personal = ? AND `contraseña_personal` = ?");
        $stmt -> bind_param("ss", $user, $password);

        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }
    
        $stmt->bind_param("ss", $user, $password);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    function cerrar_sesion() {
        session_start();
        session_destroy();
        header("Location: /");
    }

