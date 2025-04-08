<?php
session_start();
    //Generar un excel a base de los resultados de la query en la pagina de consultar
    
    $nombreArchivo = $_POST['Nombre'] . "_" . $_POST['eval_subs_fec_eval'] .  '.xlsx';
    header("Content-Type: application/vnd.ms-excel"); 
    header("Content-Disposition: attachment; filename=\"$nombreArchivo\""); 
    
   