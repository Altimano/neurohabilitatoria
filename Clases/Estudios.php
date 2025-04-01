<?php

include './funciones/funciones.php';
class Estudios{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

//    regresa todos los datos de los pacientes / paciente
    public function consultarTodosLosEstudios($Criterio){
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

//    Regresa los datos del paciente / pacientes para la vista general de agregar y modificar
    public function consultarEstudio($Criterio){
        $SQL = "SELECT DISTINCT paciente.codigo_paciente,
       terapia_neurohabilitatoria.nombre_pacinete,
       paciente.fecha_nacimiento_paciente,
       paciente.semanas_gestacion,
CASE
    WHEN paciente.clave_estado_paciente = 1 THEN 'Activo'
    WHEN paciente.clave_estado_paciente = 2 THEN 'Inactivo'
    WHEN paciente.clave_estado_paciente = 3 THEN 'Baja'
END AS estado_paciente
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

    public function consultarPacientes($Criterio){
        $SQL = "SELECT DISTINCT * FROM paciente WHERE nombre_paciente OR apellido_paterno_paciente OR apellido_materno_paciente LIKE ? ORDER BY fecha_registro DESC";
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
}