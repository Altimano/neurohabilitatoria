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

    function tomarClavePersonal($user){
        $Con = conectar();
        $stmt = $Con -> prepare("SELECT clave_personal FROM personal WHERE nombre_usuario_personal = ?");
        $stmt -> bind_param("s", $user);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $Con->error);
        }   
        $stmt->execute();
        $resultado = $stmt->get_result();
        $resultadoAssoc = mysqli_fetch_assoc($resultado);
        return $resultadoAssoc['clave_personal'];
    }

    function generarDiccionario($datos) {
        $diccionario = [];
        foreach ($datos as $fila) {
            $diccionario[] = $fila[0]; 
        }
        return $diccionario;
    }

    function limpiarClavesPost($post) {
        $postLimpio = [];
        foreach ($post as $clave => $valor) {
            $claveLimpia = str_replace("_", " ", $clave);
            // Si el valor también es un array, aplica recursión
            if (is_array($valor)) {
                $postLimpio[$claveLimpia] = limpiarClavesPost($valor);
            } else {
                $postLimpio[$claveLimpia] = $valor;
            }
        }
        return $postLimpio;
    }

    function compararDiccionarioConPost($diccionario, $post) {
        $claves = array_keys($post);
        return array_intersect($claves, $diccionario);
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

    // Funciones para agregar estudios / formato pdf (las que tú modificaste/añadiste)
    function calcularFechaNacimientoCorregida($fechaNacimientoRealStr, $semanasGestacion)
    {
        $fechaNacimientoReal = new DateTime($fechaNacimientoRealStr);
        $semanasTermino = 40;
        $semanasPrematuro = $semanasTermino - $semanasGestacion;
        
        // Si el bebé no fue prematuro, la fecha corregida es la misma que la real.
        if ($semanasPrematuro <= 0) {
            return $fechaNacimientoReal->format('Y-m-d');
        }
        
        $diasCorreccion = $semanasPrematuro * 7;
        $fechaCorregida = clone $fechaNacimientoReal;
        $fechaCorregida->modify("-$diasCorreccion days");
        return $fechaCorregida->format('Y-m-d');
    }

    function calcularEdadCronologicaIngreso($fechaInicioTratamientoStr, $fechaNacimientoStr)
    {
        $fechaInicio = new DateTime($fechaInicioTratamientoStr);
        $fechaNacimiento = new DateTime($fechaNacimientoStr);
        $diferencia = $fechaInicio->diff($fechaNacimiento);
        $edadAnios = $diferencia->y;
        $edadMeses = $diferencia->m;
        // Agregado el cálculo de días para una salida más precisa como en tus ejemplos de log
        $edadDias = $diferencia->d; 
        return "$edadAnios A $edadMeses M $edadDias D"; 
    }

    function calcularEdadCorregidaEnTexto($fechaActualStr, $fechaNacimientoRealStr, $semanasGestacion) {
        $fechaActual = new DateTime($fechaActualStr);
        $fechaNacimientoReal = new DateTime($fechaNacimientoRealStr);

        $semanasTermino = 37; //preguntarle a mi hermana
        $semanasPrematuro = $semanasTermino - $semanasGestacion;
        
        // Convertir semanas a días para la corrección
        $diasCorreccion = $semanasPrematuro * 7;

        // Aplicar la corrección a la fecha de nacimiento real para obtener la fecha de nacimiento CORREGIDA
        $fechaNacimientoCorregidaObj = clone $fechaNacimientoReal;
        $fechaNacimientoCorregidaObj->modify("-$diasCorreccion days");

        // Calcular la edad corregida usando la fecha de nacimiento corregida y la fecha actual
        $intervaloCorregido = $fechaNacimientoCorregidaObj->diff($fechaActual);
        $aniosCorregidos = $intervaloCorregido->y;
        $mesesCorregidos = $intervaloCorregido->m;
        $diasCorregidos = $intervaloCorregido->d;

        // Formato de salida (ej. "0A 9M" o "1A 2M")
        return $aniosCorregidos . 'A ' . $mesesCorregidos . 'M' . $diasCorregidos . 'D';
    }

    // QUEDA PENDIENTE REVISAR COMO AJUSTAR LA EDAD CRONOLOGICA DE INGRESO PARA CALCULAR LA EDAD CORREGIDA EN SEMANAS
    // EDAD CORREGIDA SEMANAS SE PUEDEN PONER LA PURA CANTIDAD DE SEMANAS?
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

    function calcularFechaEnSemana($fechaEvaluacion, $fechaNacimientoCorregida){
        $fechaEvaluacion = new DateTime(($fechaEvaluacion));
        $fechaNacimientoCorregida = new DateTime(($fechaNacimientoCorregida));
        $diferencia = $fechaEvaluacion->diff($fechaNacimientoCorregida);
        $diasDiferencias = $diferencia->days;
        $fechaEnSemanas = floor($diasDiferencias / 7);
        return $fechaEnSemanas;
    }

?>