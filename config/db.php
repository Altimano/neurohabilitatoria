<?php
    function conectar(){
        $Hostname = "db"; // Nombre del servicio en Docker Compose
        $Usuario = "root";
        $Password = "15103106";
        $BD = "terapiaNeurohabilitatoria_2025";
        $Port = 3306; // Puerto interno del contenedor MySQL
    
        $Con = mysqli_connect($Hostname, $Usuario, $Password, $BD, $Port);
        mysqli_set_charset($Con, "utf8");
    
        if (!$Con) {
            die("Error en la conexión: " . mysqli_connect_error());
        }else{
            //echo "Conexión exitosa";
        }
        return $Con;
    }
    
    function Ejecutar($Con,$SQL){
        $Result = mysqli_query($Con,$SQL) or die(mysqli_error($Con));
        return $Result;
    }

    function Procesar(){
    }

    function Cerrar($Con){
        mysqli_close($Con);
    }
    ?>