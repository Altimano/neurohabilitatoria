<?php
//Esta clase maneja las consultas a la base de datos relacionadas con los estudios de terapia neurohabilitatoria
//Estas funciones regresan un objeto de tipo mysqli_result
//Todas estas funciones se podrian agrupar en menos si se actualiza la filtracion de datos por el usuario a una query dinamica
class Estudios
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    //    METODOS PARA LA CONSULTA 

    //Este metodo consulta los ultimos 100 estudios mas recientes, se usa en eliminar, modificar y consultar
    public function consultarTodosLosEstudiosv2()
    {
        $SQL = "SELECT 
                t.id_terapia_neurohabilitatoriav2,
                p.clave_paciente,
                CONCAT(p.nombre_paciente , ' ' , p.apellido_paterno_paciente , ' ' , p.apellido_materno_paciente) AS nombre_paciente,
                t.fecha_inicio_terapia,
                t.fecha_terapia,
                t.num_evaluacion,
                pers.nombre_personal AS terapeuta,
                p.semanas_gestacion         
            FROM terapia_neurov2 t
            JOIN paciente p ON t.clave_paciente = p.clave_paciente
            JOIN personal pers ON t.clave_personal = pers.clave_personal
            ORDER BY t.fecha_registro DESC
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
    t.factores_riesgo,
    t.observaciones,
    t.num_evaluacion,
    t.motor_grueso_puntaje_total,
    t.motor_grueso_porcentaje,
    t.motor_fino_puntaje_total,
    t.motor_fino_porcentaje,
    t.lenguaje_puntaje_total,
    t.lenguaje_porcentaje,
    espa.descripcion_estado_paciente,
    reg.regular_no_regular
    FROM terapia_neurov2 t
    JOIN paciente p ON t.clave_paciente = p.clave_paciente
    JOIN personal pers ON t.clave_personal = pers.clave_personal
    JOIN estado_paciente espa ON p.clave_estado_paciente = espa.clave_estado_paciente 
    LEFT JOIN pacientes_regulares_no_regulares reg ON p.clave_paciente = reg.clave_paciente
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
        t.num_evaluacion,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE CONCAT(p.nombre_paciente, ' ', p.apellido_paterno_paciente, ' ', p.apellido_materno_paciente) LIKE ?
        ORDER BY t.fecha_registro DESC
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
        t.num_evaluacion,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE CONCAT(p.nombre_paciente, ' ', p.apellido_paterno_paciente, ' ', p.apellido_materno_paciente) LIKE ? AND fecha_terapia BETWEEN ? AND ?
        ORDER BY t.fecha_registro DESC
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
        t.num_evaluacion,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE CONCAT(p.nombre_paciente, ' ', p.apellido_paterno_paciente, ' ', p.apellido_materno_paciente) LIKE ? AND p.clave_paciente = ?
        ORDER BY t.fecha_registro DESC
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
        t.num_evaluacion,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE t.fecha_terapia BETWEEN ? AND ?
        ORDER BY t.fecha_registro DESC
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
        t.num_evaluacion,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE t.fecha_terapia BETWEEN ? AND ? AND p.clave_paciente = ?
        ORDER BY t.fecha_registro DESC
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
        t.num_evaluacion,
        pers.nombre_personal AS terapeuta,
        p.semanas_gestacion         
        FROM terapia_neurov2 t
        JOIN paciente p ON t.clave_paciente = p.clave_paciente
        JOIN personal pers ON t.clave_personal = pers.clave_personal
        WHERE p.clave_paciente = ?
        ORDER BY t.fecha_registro DESC
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
    //No lo he implementado
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
    //Por el momento los procedimientos de insertar se realizan en el controlador pero se puede agregar aqui en todo caso

    //FUNCIONES PARA ELIMINAR
    //    Elimina un estudio a base de el campo post terapia_id agregado en el formulario inicial
    public function eliminarEstudio($terapia_id)
    {
        
        $stmt = $this->db->prepare("DELETE FROM terapia_neurov2 WHERE id_terapia_neurohabilitatoriav2 = ?");
        $stmt->bind_param("i", $terapia_id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            header("Location: " . base_url('/eliminar'));
            
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

    //EN PROGRESO REALIZAR FILTRO DE BUSQUEDA DINAMICO PARA LA BUSQUEDA DE ESTUDIOS

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
    //Por el momento no se han implementando, un proceso diferente se encuentra en el controlador para agregar
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

    public function contadorEvaluacion($clave_paciente)
    {
        $stmt = $this->db->prepare("SELECT num_evaluacion FROM terapia_neurov2 WHERE clave_paciente = ? ORDER BY num_evaluacion DESC LIMIT 1");
        $stmt->bind_param("i", $clave_paciente);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $resultAssoc = $resultado->fetch_assoc();
        if (!empty($resultado)){
            $resultAssoc["num_evaluacion"] = 1 + $resultAssoc["num_evaluacion"];
            //Falta logica para encontrar el id de terapia especifica depende de miguel
            $stmt = $this->db->prepare("INSERT INTO terapia_neurov2 (num_evaluacion) VALUES ($resultAssoc) WHERE clave_paciente = ? ");
        }

    }

    public function consultarResultadosHitosMG($id_terapia)
    {
        $SQL = "SELECT
        hmg.campos,
        rhmg.fecha_consolidacion_semanas
        FROM terapia_neurov2 t
        JOIN resultados_hitos_mg rhmg ON t.id_terapia_neurohabilitatoriav2 = rhmg.id_terapia_neuro
        JOIN hitos_mg hmg ON rhmg.id_hito_motor_grueso = hmg.id_hito_motor_grueso
        WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
        // Nota: no cerramos $this->db->close() aquí para permitir múltiples llamadas seguidas en el controlador
    }

    public function consultarResultadosHitosMF($id_terapia)
    {
        $SQL = "SELECT
        hmf.campo,
        rhmf.fecha_consolidacion_semanas
        FROM terapia_neurov2 t
        JOIN resultados_hitos_mf rhmf ON t.id_terapia_neurohabilitatoriav2 = rhmf.id_terapia_neuro
        JOIN hitos_mf hmf ON rhmf.id_hito_mf = hmf.id_hito_motor_fino
        WHERE t.id_terapia_neurohabilitatoriav2 = ?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        $stmt->bind_param("i", $id_terapia);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
    }
}
?>