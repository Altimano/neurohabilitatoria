<?php
    function validarAcceso($user, $password) {
        include "./config/db.php"; 
        $Con = conectar();
        $stmt = $Con -> prepare("SELECT nombre_usuario_personal FROM personal WHERE nombre_usuario_personal = ? AND `contraseña_personal` = ?");
        $stmt -> bind_param("ss", $user, $password);

        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $Con->error);
        }
    
        $stmt->bind_param("ss", $user, $password);
        $stmt->execute();
        $stmt->store_result();
        //Incluir la clave de personal 
        return $stmt->num_rows > 0;
    }

    function tomarClavePersonal(){
        include "./config/db.php";
        $Con = conectar();
        $stmt = $Con -> prepare("SELECT clave_personal FROM personal WHERE nombre_usuario_personal = ? AND `contraseña_personal` = ?");
        $stmt -> bind_param("ss", $user, $password);

        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $Con->error);
        }
    
        $stmt->bind_param("ss", $user, $password);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    /*function validarUsuario($user) {
        include "./config/db.php";
        $Con = conectar();
        $stmt = $Con -> prepare("SELECT nombre_usuario_personal FROM personal WHERE nombre_usuario_personal = ?");
        $stmt -> bind_param("s", $user);

        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $Con->error);
        }
    
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    function validarContra(){
        include "./config/db.php";
        $Con = conectar();
        $stmt = $Con -> prepare("SELECT contraseña_personal FROM personal WHERE contraseña_personal = ?");
        $stmt -> bind_param("s", $password);

        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $Con->error);
        }
    
        $stmt->bind_param("s", $password);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }
        */

    function cerrar_sesion() {
        session_start();
        session_destroy();
        header("Location: /");
    }

//    Funciones para agregar estudios / formato pdf
    function calcularFechaNacimientoCorregida($fechaNacimiento, $semanasEnGestacion)
    {
        $semanasEnGestacion = (39-$semanasEnGestacion)*7;
        $fechaNacimientoCorregida = date("Y-m-d", strtotime($fechaNacimiento . " + $semanasEnGestacion week"));
        return $fechaNacimientoCorregida;

    }

    function calcularEdadCronologicaIngreso($fechaInicioTratamiento, $fechaNacimiento)
    {
        $fechaInicio = new DateTime($fechaInicioTratamiento);
        $fechaNacimiento = new DateTime($fechaNacimiento);
        $diferencia = $fechaInicio->diff($fechaNacimiento);
        $edadAnios = $diferencia->y;
        $edadMeses = $diferencia->m;
        return "$edadAnios A $edadMeses M";

    }

//    QUEDA PENDIENTE REVISAR COMO AJUSTAR LA EDAD CRONOLOGICA DE INGRESO PARA CALCULAR LA EDAD CORREGIDA EN SEMANAS
//    EDAD CORREGIDA SEMANAS SE PUEDEN PONER LA PURA CANTIDAD DE SEMANAS?
    function calcularEdadCorregidaSemanas($edadCronologicaIngreso, $semanasEnGestacion)
    {
        $semanasEnGestacion = (39-$semanasEnGestacion);
        // A INVESTIGAR CHAVITO
        $edadCorregidaSemanas = $edadCronologicaIngreso - $semanasEnGestacion;
        return $edadCorregidaSemanas;
    }

    function calcularPuntuacion($valoresColumna){
        return  array_sum($valoresColumna);
    }

    function calcularPorcentaje($puntuacionTotal, $puntuacionMaxima)
    {
        return ($puntuacionTotal * 100) / $puntuacionMaxima;
    }


