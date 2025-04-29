<?php

class Estudios{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    

//    FUNCIONES PARA LA CONSULTA 

    public function consultarTodosLosEstudios(){
        $SQL = "SELECT * FROM terapia_neurohabilitatoria ORDER BY eval_subs_fec_eval DESC LIMIT 50";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarTodosLosEstudiosPorNombre($Criterio){
        $SQL = "SELECT * FROM terapia_neurohabilitatoria WHERE nombre_pacinete LIKE ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("s", $likeCriterio);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarTodosLosEstudiosPorNombreyFecha($Criterio, $fechaInicio, $fechaFin){
        $SQL = "SELECT * FROM terapia_neurohabilitatoria WHERE nombre_pacinete LIKE ? AND eval_subs_fec_eval BETWEEN ? AND ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("sss", $likeCriterio, $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarTodosLosEstudiosPorNombreyCodigo($Criterio, $codigo){
        $SQL = "SELECT * FROM terapia_neurohabilitatoria WHERE nombre_pacinete LIKE ? AND clave_paciente = ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $likeCodigo = "%$codigo%";
        $stmt->bind_param("ss", $likeCriterio, $likeCodigo);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarTodosLosEstudiosPorFecha($fechaInicio, $fechaFin){
        $SQL = "SELECT * FROM terapia_neurohabilitatoria WHERE eval_subs_fec_eval BETWEEN ? AND ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("ss", $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarTodosLosEstudiosPorFechaYCodigo($fechaInicio, $fechaFin, $codigo){
        $SQL = "SELECT * FROM terapia_neurohabilitatoria WHERE eval_subs_fec_eval BETWEEN ? AND ? AND clave_paciente = ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("sss", $fechaInicio, $fechaFin, $codigo);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarTodosLosEstudiosPorCodigo($Criterio){
        $SQL = "SELECT * FROM terapia_neurohabilitatoria 
        INNER JOIN paciente 
        ON terapia_neurohabilitatoria.clave_paciente = paciente.clave_paciente
        WHERE paciente.codigo_paciente = ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("s", $Criterio);
        if (!$stmt->execute()) {
            die("Error en la consulta: " . $stmt->error);
        }
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    //FUNCIONES PARA MODIFICAR

    //Consulta para obtener toda la informacion de un estudio en base a su id
    public function consultarEstudioPorId($id_terapia_neurohabilitatoria){
        $SQL = "SELECT * FROM terapia_neurohabilitatoria WHERE id_terapia_neurohabilitatoria = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia_neurohabilitatoria);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    //Funcion para modificar el estudio
    //Queda pendiente los nombres de las nuevas variables de la bd para terapia neurohabilitatoria
    //Queda pendiente si usar una funcion por seccion o todo junto y corregir con nombres de datos correctos
    public function modificarEstudio($datos){
        $stmt = $this->db->prepare("UPDATE terapia_neurohabilitatoria SET subesc_cf = ? , subesc_sobre_ab = ?, subesc_sent_prot_del = ? , subesc_camb_decub = ? , subesc_sent_sin_apoyo = ? , subesc_reac_lat_del = ? , subesc_pos_sed_decub = ? , subesc_patron_arrastre = ? , subesc_pos_hincado = ? , subesc_patron_gateo = ? , subesc_gateo_niveles = ? , 
        subesc_trans_bipedest = ? , subesc_patr_marcha = ? , subesc_pie_momentaneo = ? , subesc_camina_atras = ? , subesc_camina_solo_cae_frec = ? , subesc_esca_ambas_manos = ? , subesc_patea_pelota = ? , subesc_esc_gateando = ? , subesc_corre_con_rig = ? , subesc_camina_solo_cae_rara = ? , subesc_esc_una_mano = ? , 
        subesc_lanza_pelota = ? , subesc_salta_sitio = ? , subesc_juega_cuclillas = ? WHERE id_terapia_neurohabilitatoria = ?");
        $stmt->bind_param("iiiiiiiiiiiiiiiiiiiiiiiiis", $datos['clave_paciente'], $datos['nombre_pacinete'], $datos['eval_subs_fec_eval'], $datos['eval_subs_edad_eval'], $datos['eval_subs_edad_eval_meses'], $datos['eval_subs_edad_eval_dias'], $datos['eval_subs_edad_eval_semanas'], $datos['eval_subs_edad_eval_anios'], $datos['eval_subs_edad_eval_anios_meses'], $datos['eval_subs_edad_eval_anios_dias'], $datos['id_terapia_neurohabilitatoria']);
        if ($stmt->execute()) {
            header("Location: /modificar");
        } else {
            echo "Error al modificar la evaluación: " . $stmt->error;
        }
        $stmt->close();
    }

    //FUNCIONES PARA ELIMINAR

    public function consultarEstudiosParaEliminar(){
        $SQL = "SELECT paciente.codigo_paciente, terapia_neurohabilitatoria.nombre_pacinete,
        terapia_neurohabilitatoria.fecha_registro, paciente.semanas_gestacion, 
        terapia_neurohabilitatoria.eval_subs_fec_eval
        FROM terapia_neurohabilitatoria
        JOIN paciente
        ON paciente.clave_paciente = terapia_neurohabilitatoria.clave_paciente
        ORDER BY eval_subs_fec_eval DESC LIMIT 50";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarEstudioPorNombreEliminar($Criterio){
        $SQL = "SELECT paciente.codigo_paciente, terapia_neurohabilitatoria.nombre_pacinete,
        terapia_neurohabilitatoria.fecha_registro, paciente.semanas_gestacion, 
        terapia_neurohabilitatoria.eval_subs_fec_eval
        FROM terapia_neurohabilitatoria
        INNER JOIN paciente
        ON paciente.clave_paciente = terapia_neurohabilitatoria.clave_paciente
        WHERE terapia_neurohabilitatoria.nombre_pacinete LIKE ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("s", $likeCriterio);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarEstudioPorNombreYFechaEliminar($Criterio,$fechaInicio,$fechaFin){
        $SQL = "SELECT paciente.clave_paciente, terapia_neurohabilitatoria.clave_paciente,paciente.codigo_paciente, terapia_neurohabilitatoria.nombre_pacinete,
        terapia_neurohabilitatoria.fecha_registro, paciente.semanas_gestacion,
        terapia_neurohabilitatoria.eval_subs_fec_eval
        FROM paciente
        INNER JOIN  terapia_neurohabilitatoria
        ON paciente.clave_paciente = terapia_neurohabilitatoria.clave_paciente
        WHERE terapia_neurohabilitatoria.nombre_pacinete LIKE ? AND terapia_neurohabilitatoria.eval_subs_fec_eval BETWEEN ? AND ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("sss", $likeCriterio, $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarEstudioPorNombreYCodigoEliminar($Criterio, $codigo_paciente){
        $SQL = "SELECT paciente.codigo_paciente, terapia_neurohabilitatoria.nombre_pacinete,
        terapia_neurohabilitatoria.fecha_registro, paciente.semanas_gestacion, 
        terapia_neurohabilitatoria.eval_subs_fec_eval
        FROM terapia_neurohabilitatoria
        INNER JOIN paciente
        ON paciente.clave_paciente = terapia_neurohabilitatoria.clave_paciente
        WHERE terapia_neurohabilitatoria.nombre_pacinete LIKE ? AND paciente.codigo_paciente = ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("ss", $likeCriterio, $codigo_paciente);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarEstudioPorFechaEliminar($fechaInicio, $fechaFin){
        $SQL = "SELECT paciente.codigo_paciente, terapia_neurohabilitatoria.nombre_pacinete,
        terapia_neurohabilitatoria.fecha_registro, paciente.semanas_gestacion, 
        terapia_neurohabilitatoria.eval_subs_fec_eval
        FROM terapia_neurohabilitatoria
        INNER JOIN paciente
        ON paciente.clave_paciente = terapia_neurohabilitatoria.clave_paciente
        WHERE terapia_neurohabilitatoria.fecha_registro BETWEEN ? AND ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("ss", $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarEstudioPorFechaYCodigoEliminar($fechaInicio, $fechaFin, $codigo_paciente){
        $SQL = "SELECT paciente.codigo_paciente, terapia_neurohabilitatoria.nombre_pacinete,
        terapia_neurohabilitatoria.fecha_registro, paciente.semanas_gestacion, 
        terapia_neurohabilitatoria.eval_subs_fec_eval
        FROM terapia_neurohabilitatoria
        INNER JOIN paciente
        ON paciente.clave_paciente = terapia_neurohabilitatoria.clave_paciente
        WHERE terapia_neurohabilitatoria.fecha_registro BETWEEN ? AND ? AND paciente.codigo_paciente = ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("sss", $fechaInicio, $fechaFin, $codigo_paciente);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarEstudioPorCodigoEliminar($Criterio){
        $SQL = "SELECT paciente.codigo_paciente, terapia_neurohabilitatoria.nombre_pacinete,
        terapia_neurohabilitatoria.fecha_registro, paciente.semanas_gestacion, 
        terapia_neurohabilitatoria.eval_subs_fec_eval
        FROM terapia_neurohabilitatoria
        INNER JOIN paciente
        ON paciente.clave_paciente = terapia_neurohabilitatoria.clave_paciente
        WHERE paciente.codigo_paciente LIKE ? ORDER BY eval_subs_fec_eval DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("s", $likeCriterio);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }


    //FUNCIONES PARA AGREGAR (Consultas)

    public function consultarPacientes(){
        $SQL = "SELECT DISTINCT * FROM paciente ORDER BY fecha_registro LIMIT 50";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarPacientesPorNombre($Criterio){
        $SQL = "SELECT DISTINCT * FROM paciente WHERE concat_ws(' ',nombre_paciente, apellido_paterno_paciente,apellido_materno_paciente) LIKE ? ORDER BY fecha_registro DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("s", $likeCriterio);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarPacientesPorNombreYFecha($Criterio, $fechaInicio, $fechaFin){
        $SQL = "SELECT DISTINCT * FROM paciente WHERE concat_ws(' ',nombre_paciente, apellido_paterno_paciente,apellido_materno_paciente) LIKE ? AND fecha_registro BETWEEN ? and ? ORDER BY fecha_registro DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("sss",$likeCriterio, $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarPacientesPorNombreYCodigo($Criterio, $codigo_paciente){
        $SQL = "SELECT DISTINCT * FROM paciente WHERE concat_ws(' ',nombre_paciente, apellido_paterno_paciente,apellido_materno_paciente) LIKE ? AND codigo_paciente LIKE ? ORDER BY fecha_registro";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $likeCodigo = "%$codigo_paciente%";
        $stmt->bind_param("ss", $likeCriterio, $likeCodigo);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarPacientesPorFecha($fechaInicio, $fechaFin){
        $SQL = "SELECT DISTINCT * FROM paciente WHERE fecha_registro BETWEEN ? AND ? ORDER BY fecha_registro DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("ss", $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarPacientePorFechaYCodigo($fechaInicio, $fechaFin, $codigo_paciente){
        $SQL = "SELECT DISTINCT * FROM paciente WHERE fecha_registro BETWEEN ? AND ? AND codigo_paciente LIKE ? ORDER BY fecha_registro DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("sss", $fechaInicio, $fechaFin, $codigo_paciente);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarPacientesPorCodigo($Criterio){
        $SQL = "SELECT * FROM paciente  WHERE codigo_paciente LIKE ? ORDER BY fecha_registro DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("s", $likeCriterio);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    //FUNCIONES PARA AGREGAR (Insertar en la base de datos)

    //Agrega un estudio a base de el campo post agregado en el formulario inicial
    public function agregarEstudio($datos){
        $stmt = $this->db-> prepare("INSERT INTO terapia_neurohabilitatoria (clave_paciente, nombre_pacinete, eval_subs_fec_eval, eval_subs_edad_eval, eval_subs_edad_eval_meses, eval_subs_edad_eval_dias, eval_subs_edad_eval_semanas, eval_subs_edad_eval_anios, eval_subs_edad_eval_anios_meses, eval_subs_edad_eval_anios_dias) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $datos['nombre_pacinete'], $datos['eval_subs_fec_eval'], $datos['eval_subs_edad_eval'], $datos['eval_subs_edad_eval_meses'], $datos['eval_subs_edad_eval_dias'], $datos['eval_subs_edad_eval_semanas'], $datos['eval_subs_edad_eval_anios'], $datos['eval_subs_edad_eval_anios_meses'], $datos['eval_subs_edad_eval_anios_dias']);
        $stmt-> execute();
        //if ($stmt->execute()) {
          //  header("Location: /crear");
        //} else {
          //  echo "Error al agregar el estudio: " . $stmt->error;
        //}
        $stmt->close();
    }


//    Elimina un estudio a base de el campo post agregado en el formulario inicial
    public function eliminarEstudio($row_id){
        $stmt = $this->db-> prepare("DELETE FROM terapia_neurohabilitatoria WHERE id_terapia_neurohabilitatoria = ?");
        $stmt->bind_param("i", $row_id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            header("Location: /eliminar");
        }else{
            echo "No se pudo eliminar el paciente " . $stmt->error;
        }
        $this->db->close();
    }
    //Funciones para agregar Evaluaciones
    public function agregarEvaluacion($datos){
        $stmt = $this->db->prepare("INSERT INTO terapia_neurohabilitatoria (clave_paciente, nombre_pacinete, eval_subs_fec_eval, eval_subs_edad_eval, eval_subs_edad_eval_meses, eval_subs_edad_eval_dias, eval_subs_edad_eval_semanas, eval_subs_edad_eval_anios, eval_subs_edad_eval_anios_meses, eval_subs_edad_eval_anios_dias) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssss", $datos['clave_paciente'], $datos['nombre_pacinete'], $datos['eval_subs_fec_eval'], $datos['eval_subs_edad_eval'], $datos['eval_subs_edad_eval_meses'], $datos['eval_subs_edad_eval_dias'], $datos['eval_subs_edad_eval_semanas'], $datos['eval_subs_edad_eval_anios'], $datos['eval_subs_edad_eval_anios_meses'], $datos['eval_subs_edad_eval_anios_dias']);
        if ($stmt->execute()) {
            header("Location: /crear");
        } else {
            echo "Error al agregar la evaluación: " . $stmt->error;
        }
        $stmt->close();
    }

    public function regresarDatosInicialesPaciente($codigo_paciente){
        $stmt = $this->db->prepare("SELECT fecha_nacimiento_paciente FROM paciente WHERE codigo_paciente = ?");
        $stmt->bind_param("s", $codigo_paciente);
    }
    //verificar si es el primer estudio del paciente en terapia neurohabilitatoria realizando una consulta a la bd en base a la clave de paciente
    //si el paciente ya tiene un estudio en terapia neurohabilitatoria se regresa un true, si no se regresa un false
    public function validarEvaluacionInicial($clave_paciente) {
        $stmt = $this->db->prepare("SELECT  1 FROM terapia_neurohabilitatoria
        WHERE clave_paciente = ? LIMIT 1;");
        $stmt->bind_param("s", $clave_paciente);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            return true; // El paciente ya tiene una evaluación en terapia neurohabilitatoria
        } else {
            return false; // El paciente no tiene ninguna evaluación en terapia neurohabilitatoria
        }
        $stmt->close();
    }

    /*public function validarPorFiltrosPacientes($filtros) {
        $parametros = [];
        $condiciones = [];
        $sql = "SELECT * FROM paciente";
        $tipos = [];
    
        if (!$filtros['Nombre']) {
            $condiciones[] = "(nombre_paciente LIKE ? OR apellido_paterno_paciente LIKE ? OR apellido_materno_paciente LIKE ?)";
            $nombre = "%" . $_POST['Nombre'] . "%";
            $parametros[] = $nombre;
            $parametros[] = $nombre;
            $parametros[] = $nombre;
            $tipos[] = 's';
            $tipos[] = 's';
            $tipos[] = 's';
        }
    
        if (!$filtros['codigo']) {
            $condiciones[] = "codigo_paciente LIKE ?";
            $parametros[] = "%" . $_POST['codigo'] . "%";
            $tipos[] = 's';
        }
    
        if (!$filtros['fechaInicial'] && !$filtros['fechaFinal']) {
            $condiciones[] = "fecha_registro BETWEEN ? AND ?";
            $parametros[] = $_POST['fechaInicial'];
            $parametros[] = $_POST['fechaFinal'];
            $tipos[] = 's';
            $tipos[] = 's';
        }
    
        if (!empty($condiciones)) {
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }
    
        $sql .= " ORDER BY fecha_registro DESC";
    
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
    
        if (!empty($parametros)) {
            $bind_names[] = implode("", $tipos);
            foreach ($parametros as $key => $value) {
                $bind_names[] = &$parametros[$key];
            }
            call_user_func_array([$stmt, 'bind_param'], $bind_names);
        }
    
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        return $resultado;
    }
    */
}
