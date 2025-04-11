<?php

class Estudios{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    

//    FUNCIONES PARA LA CONSULTA 

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
        $stmt->bind_param("ss", $likeCriterio, $codigo);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarTodosLosEstudiosPorFecha($fechaInicio, $fechaFin){
        $SQL = "SELECT DISTINCT * FROM terapia_neurohabilitatoria WHERE eval_subs_fec_eval BETWEEN ? AND ? ORDER BY eval_subs_fec_eval DESC";
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

    //Funciones para Eliminar
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

    public function consultarPacientes($Criterio){
        $SQL = "SELECT DISTINCT * FROM paciente WHERE nombre_paciente LIKE ? OR apellido_paterno_paciente LIKE ? OR apellido_materno_paciente LIKE ? ORDER BY fecha_registro DESC";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $stmt->bind_param("sss", $likeCriterio, $likeCriterio, $likeCriterio);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarPacientesPorAno($fechaInicio, $fechaFin){
        $SQL = "SELECT DISTINCT * FROM paciente WHERE fecha_registro BETWEEN ? and ? ORDER BY fecha_registro DESC";
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
    //verificar si es el primer estudio del paciente en terapia neurohabilitatoria
    public function validarEvaluacionInicial() {
        
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
