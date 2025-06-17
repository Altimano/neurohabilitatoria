<?php

class Estudios
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    //    FUNCIONES PARA LA CONSULTA 

    public function consultarTodosLosEstudios()
    {
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

    public function consultarTodosLosEstudiosv2()
    {
        $SQL = "SELECT 
                t.id_terapia_neurohabilitatoriav2,
                p.clave_paciente,
                CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
                t.fecha_inicio_terapia,
                t.fecha_terapia,
                pers.nombre_personal AS terapeuta,
                p.semanas_gestacion         
            FROM terapia_neurov2 t
            JOIN paciente p ON t.clave_paciente = p.clave_paciente
            JOIN personal pers ON t.clave_personal = pers.clave_personal
            ORDER BY t.fecha_inicio_terapia DESC
            LIMIT 100";

        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    public function consultarDatosPacientev2($id_terapia)
    {
        $SQL = "SELECT
    t.id_terapia_neurohabilitatoriav2,
    p.clave_paciente,
    CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
    p.fecha_nacimiento_paciente,
    p.semanas_gestacion,
    t.fecha_inicio_terapia,
    pers.nombre_personal ,
    t.fecha_terapia,
    t.edad_corregida,
    t.edad_cronologica,
    t.dat_ter_fech_nac_edad_correg,
    t.edad_cronologica_al_ingr_sem,
    t.edad_correg_al_ingr_sem,
    t.peso,
    t.talla,
    t.pc,
    t.factores_riesgo
    FROM terapia_neurov2 t
    JOIN paciente p ON t.clave_paciente = p.clave_paciente
    JOIN personal pers ON t.clave_personal = pers.clave_personal
    WHERE t.id_terapia_neurohabilitatoriav2 = ?";

        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarResultadosKatona($id_terapia)
    {
        $SQL = "SELECT
    mk.evaluacion AS evaluacionKatona,
    rk.tono_muscular_topografia AS resultadosKatona,
    rk.id_resultados_katona
    FROM terapia_neurov2 t
    JOIN resultados_maniobras_katona rk ON rk.id_terapia_neuro = t.id_terapia_neurohabilitatoriav2
    JOIN maniobras_Katona mk ON mk.id_katona = rk.id_katona 
    WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarResultadosSubMG($id_terapia)
    {
        $SQL = "SELECT
    sbmg.subescala,
    rsmg.resultado,
    rsmg.id_resultados_sub_mg
    FROM terapia_neurov2 t
    JOIN resultados_sub_mg rsmg ON t.id_terapia_neurohabilitatoriav2 = rsmg.id_terapia_neuro
    JOIN subescalas_mg sbmg ON rsmg.id_sub_grueso = sbmg.id_sub_grueso
    WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarResultadosSubMF($id_terapia)
    {
        $SQL = "SELECT
    sbmf.subescala,
    rsmf.resultado,
    rsmf.id_resultados_sub_mf
    FROM terapia_neurov2 t
    JOIN resultados_sub_mf rsmf ON t.id_terapia_neurohabilitatoriav2 = rsmf.id_terapia_neuro
    JOIN subescalas_mf sbmf ON rsmf.id_sub_fino = sbmf.id_sub_fino
    WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarResultadosTonoMuscUbi($id_terapia)
    {
        $SQL = "SELECT
    tnmu.campos,
    rstnmu.resultado,
    rstnmu.id_resultados_tono_muscular
    FROM terapia_neurov2 t
    JOIN resultados_tono_muscular rstnmu ON t.id_terapia_neurohabilitatoriav2 = rstnmu.id_terapia_neuro
    JOIN tono_muscular_ubicacion tnmu ON tnmu.id_tono_muscular_ubicacion = rstnmu.id_tono_muscular_ubicacion
    WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarResultadosSignosAlarma($id_terapia)
    {
        $SQL = "SELECT
    sgal.campo,
    rsgal.id_resultados_signos_alarma
    FROM terapia_neurov2 t
    JOIN resultados_signos_alarma rsgal ON t.id_terapia_neurohabilitatoriav2 = rsgal.id_terapia_neuro
    JOIN signos_alarma sgal ON sgal.id_signos_alarma = rsgal.id_signos_alarma
    WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarCamposSignosAlarma(){
        $SQL = "SELECT campo FROM signos_alarma";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarResultadosPostura($id_terapia)
    {
        $SQL = "SELECT
        p.campo,
        rp.resultado,
        rp.id_resultado_postura
        FROM terapia_neurov2 t
        JOIN resultados_postura rp ON t.id_terapia_neurohabilitatoriav2 = rp.id_terapia_neuro
        JOIN postura p ON rp.id_postura = p.id_postura
        WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarResultadosLenguaje($id_terapia)
    {
        $SQL = "SELECT
        sl.subescala,
        rsl.resultado,
        rsl.id_resultados_leng
        FROM terapia_neurov2 t
        JOIN resultados_sub_leng rsl ON t.id_terapia_neurohabilitatoriav2 = rsl.id_terapia_neuro
        JOIN subescalas_lenguaje sl ON rsl.id_sub_leng = sl.id_sub_leng
        WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }






    public function consultarDatosPacienteNombre($Criterio)
    {
        $SQL = "SELECT 
        t.id_terapia_neurohabilitatoriav2,
        p.clave_paciente,
        CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
        t.fecha_inicio_terapia,
        t.fecha_terapia,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE CONCAT(p.nombre_paciente, ' ', p.apellido_paterno_paciente, ' ', p.apellido_materno_paciente) LIKE ?
        ORDER BY t.fecha_inicio_terapia DESC
        LIMIT 100";        
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

    public function consultarDatosPacienteNombreyFecha($Criterio, $fechaInicio, $fechaFin)
    {
        $SQL = "SELECT 
        t.id_terapia_neurohabilitatoriav2,
        p.clave_paciente,
        CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
        t.fecha_inicio_terapia,
        t.fecha_terapia,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE CONCAT(p.nombre_paciente, ' ', p.apellido_paterno_paciente, ' ', p.apellido_materno_paciente) LIKE ? AND fecha_terapia BETWEEN ? AND ?
        ORDER BY t.fecha_inicio_terapia DESC
        LIMIT 100";        
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

    public function consultarDatosPacienteNombreyClave($Criterio, $codigo)
    {
        $SQL = "SELECT 
        t.id_terapia_neurohabilitatoriav2,
        p.clave_paciente,
        CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
        t.fecha_inicio_terapia,
        t.fecha_terapia,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE CONCAT(p.nombre_paciente, ' ', p.apellido_paterno_paciente, ' ', p.apellido_materno_paciente) LIKE ? AND p.clave_paciente = ?
        ORDER BY t.fecha_inicio_terapia DESC
        LIMIT 100";        
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $likeCriterio = "%$Criterio%";
        $likeCodigo = "$codigo";
        $stmt->bind_param("ss", $likeCriterio, $likeCodigo);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarDatosPacienteFecha($fechaInicio, $fechaFin)
    {
        $SQL = "SELECT 
        t.id_terapia_neurohabilitatoriav2,
        p.clave_paciente,
        CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
        t.fecha_inicio_terapia,
        t.fecha_terapia,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE t.fecha_terapia BETWEEN ? AND ?
        ORDER BY t.fecha_inicio_terapia DESC
        LIMIT 100";        
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

    public function consultarDatosPacienteFechayClave($fechaInicio, $fechaFin, $codigo)
    {
        $SQL = "SELECT 
        t.id_terapia_neurohabilitatoriav2,
        p.clave_paciente,
        CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
        t.fecha_inicio_terapia,
        t.fecha_terapia,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE t.fecha_terapia BETWEEN ? AND ? AND p.clave_paciente = ?
        ORDER BY t.fecha_inicio_terapia DESC
        LIMIT 100";        
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

    public function consultarDatosPacienteClave($Criterio)
    {
        $SQL = "SELECT 
        t.id_terapia_neurohabilitatoriav2,
        p.clave_paciente,
        CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
        t.fecha_inicio_terapia,
        t.fecha_terapia,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE p.clave_paciente = ?
        ORDER BY t.fecha_inicio_terapia DESC
        LIMIT 100";        
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("s", $Criterio);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    //FUNCIONES PARA MODIFICAR

    //Consulta para obtener toda la informacion de un estudio en base a su id
    public function consultarEstudioPorId($id_terapia_neurohabilitatoria)
    {
        $SQL = "SELECT * FROM terapia_neurohabilitatoria WHERE id_terapia_neurohabilitatoria = ? ";
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
    
   public function modificarDatos($id_terapia,$id_rows,$tabla,$datos)
    {

        foreach ($datos as $dato) {
            $SQL = "UPDATE $tabla SET $dato[0] = ? WHERE id_resultados_katona = ?";
            $stmt = $this->db->prepare($SQL);
            if (!$stmt) {
                die("Error en prepare: " . $this->db->error);
            }

        }

        $SQL = "UPDATE ? SET ";
        $set = [];
        $ids = implode("AND id_resultados_katona=", $id_rows);
        $condiciones = " WHERE id_resultados_katona= $ids";

    }

    //FUNCIONES DE CONSULTA PARA AGREGAR (Consultas)

    public function consultarPacientes()
    {
        $SQL = "SELECT DISTINCT * FROM paciente ORDER BY fecha_registro DESC LIMIT 50";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        $this->db->close();
    }

    public function consultarPacientesPorNombre($Criterio)
    {
        $SQL = "SELECT DISTINCT * FROM paciente WHERE concat_ws(' ',nombre_paciente, apellido_paterno_paciente,apellido_materno_paciente) LIKE ? ORDER BY fecha_registro DESC LIMIT 50";
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

    public function consultarPacientesPorNombreYFecha($Criterio, $fechaInicio, $fechaFin)
    {
        $SQL = "SELECT DISTINCT * FROM paciente WHERE concat_ws(' ',nombre_paciente, apellido_paterno_paciente,apellido_materno_paciente) LIKE ? AND fecha_registro BETWEEN ? and ? ORDER BY fecha_registro DESC LIMIT 50";
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

    public function consultarPacientesPorNombreYCodigo($Criterio, $codigo_paciente)
    {
        $SQL = "SELECT DISTINCT * FROM paciente WHERE concat_ws(' ',nombre_paciente, apellido_paterno_paciente,apellido_materno_paciente) LIKE ? AND codigo_paciente LIKE ? ORDER BY fecha_registro DESC LIMIT 50";
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

    public function consultarPacientesPorFecha($fechaInicio, $fechaFin)
    {
        $SQL = "SELECT DISTINCT * FROM paciente WHERE fecha_registro BETWEEN ? AND ? ORDER BY fecha_registro DESC LIMIT 50";
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

    public function consultarPacientePorFechaYCodigo($fechaInicio, $fechaFin, $codigo_paciente)
    {
        $SQL = "SELECT DISTINCT * FROM paciente WHERE fecha_registro BETWEEN ? AND ? AND codigo_paciente LIKE ? ORDER BY fecha_registro DESC LIMIT 50";
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

    public function consultarPacientesPorCodigo($Criterio)
    {
        $SQL = "SELECT * FROM paciente  WHERE codigo_paciente LIKE ? ORDER BY fecha_registro DESC LIMIT 50";
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
    public function agregarEstudio($datos)
    {
        $stmt = $this->db->prepare("INSERT INTO terapia_neurohabilitatoria (clave_paciente, nombre_pacinete, eval_subs_fec_eval, eval_subs_edad_eval, eval_subs_edad_eval_meses, eval_subs_edad_eval_dias, eval_subs_edad_eval_semanas, eval_subs_edad_eval_anios, eval_subs_edad_eval_anios_meses, eval_subs_edad_eval_anios_dias) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $datos['nombre_pacinete'], $datos['eval_subs_fec_eval'], $datos['eval_subs_edad_eval'], $datos['eval_subs_edad_eval_meses'], $datos['eval_subs_edad_eval_dias'], $datos['eval_subs_edad_eval_semanas'], $datos['eval_subs_edad_eval_anios'], $datos['eval_subs_edad_eval_anios_meses'], $datos['eval_subs_edad_eval_anios_dias']);
        $stmt->execute();
        //if ($stmt->execute()) {
        //  header("Location: /crear");
        //} else {
        //  echo "Error al agregar el estudio: " . $stmt->error;
        //}
        $stmt->close();
    }


    //    Elimina un estudio a base de el campo post agregado en el formulario inicial
    public function eliminarEstudio($terapia_id)
    {
        $stmt = $this->db->prepare("DELETE FROM terapia_neurov2 WHERE id_terapia_neurohabilitatoriav2 = ?");
        $stmt->bind_param("i", $terapia_id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            header("Location: /eliminar");
        } else {
            echo "No se pudo eliminar el paciente " . $stmt->error;
        }
        $this->db->close();
    }

    //verificar si es el primer estudio del paciente en terapia neurohabilitatoria realizando una consulta a la bd en base a la clave de paciente
    //si el paciente ya tiene un estudio en terapia neurohabilitatoria se regresa un true, si no se regresa un false

    public function verificarEvaluacionesRepetidas($tabla,$id_terapia,$nombre_id_catalogo,$id_catalogo){
        $stmt = $this->db->prepare("SELECT 1 FROM $tabla WHERE id_terapia_neuro = ? AND $nombre_id_catalogo = ?");
        $stmt->bind_param("ss",$id_terapia,$id_catalogo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            return true; 
        } else {
            return false; 
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
    }*/

    //Funciones para agregar Evaluaciones
    public function agregarEvaluacion($datos)
    {
        $stmt = $this->db->prepare("INSERT INTO terapia_neurohabilitatoria (clave_paciente, nombre_pacinete, eval_subs_fec_eval, eval_subs_edad_eval, eval_subs_edad_eval_meses, eval_subs_edad_eval_dias, eval_subs_edad_eval_semanas, eval_subs_edad_eval_anios, eval_subs_edad_eval_anios_meses, eval_subs_edad_eval_anios_dias) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssss", $datos['clave_paciente'], $datos['nombre_pacinete'], $datos['eval_subs_fec_eval'], $datos['eval_subs_edad_eval'], $datos['eval_subs_edad_eval_meses'], $datos['eval_subs_edad_eval_dias'], $datos['eval_subs_edad_eval_semanas'], $datos['eval_subs_edad_eval_anios'], $datos['eval_subs_edad_eval_anios_meses'], $datos['eval_subs_edad_eval_anios_dias']);
        if ($stmt->execute()) {
            header("Location: /crear");
        } else {
            echo "Error al agregar la evaluación: " . $stmt->error;
        }
        $stmt->close();
    }
    
    public function regresarDatosInicialesPaciente($codigo_paciente)
    {
        $stmt = $this->db->prepare("SELECT fecha_nacimiento_paciente FROM paciente WHERE codigo_paciente = ?");
        if (!$stmt) {
            error_log("Error en preparación de consulta (regresarDatosInicialesPaciente): " . $this->db->error);
            return null; // Devuelve null en caso de error
        }
        $stmt->bind_param("s", $codigo_paciente);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc(); // Obtiene la fila como array asociativo
        $stmt->close();
        return $data; // Devuelve los datos o null si no se encuentra
    }
    
    public function obtenerUltimaEvaluacionPaciente($clave_paciente)
    {
        $SQL = "SELECT talla, peso, pc, factores_riesgo, fecha_inicio_terapia 
                FROM terapia_neurov2 
                WHERE clave_paciente = ? 
                ORDER BY fecha_inicio_terapia DESC, id_terapia_neurohabilitatoriav2 DESC 
                LIMIT 1";
        
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            error_log("Error en preparación de consulta (obtenerUltimaEvaluacionPaciente): " . $this->db->error);
            return null;
        }
        $stmt->bind_param("i", $clave_paciente);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        
        return $data;
    }

    public function validarEvaluacionInicial($clave_paciente)
    {
        $stmt = $this->db->prepare("SELECT 1 FROM terapia_neurov2 WHERE clave_paciente = ? LIMIT 1;");
        if (!$stmt) {
            error_log("Error en preparación de consulta (validarEvaluacionInicial): " . $this->db->error);
            return false;
        }
        $stmt->bind_param("i", $clave_paciente);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        return $resultado->num_rows > 0; 
    }

}
?>