<?php
session_start();
include './config/db.php';
include './Clases/Estudios.php';
include './funciones/funciones.php';

$Con = conectar();
$Estudio = new Estudios($Con);
$id_terapia = $_POST["terapia_id"];
$postLimpio = limpiarClavesPost($_POST);
/*$dicKatona = $_SESSION["dicKatona"];
$dicSubMG = $_SESSION["dicSubMG"];
$dicSubMF = $_SESSION["dicSubMF"];
$dicTono = $_SESSION["dicTono"];
$dicSignos = $_SESSION["dicSignos"];
$dicPostura = $_SESSION["dicPostura"];
$dicLenguaje = $_SESSION["dicLenguaje"];
$dicCamposSignos = $_SESSION["dicCamposSignos"];
$postLimpio = limpiarClavesPost($_POST);
$valoresParaModificar = [];
$coincidenciasKatona = compararDiccionarioConPost($dicKatona, $postLimpio);
$coincidenciasSubMG = compararDiccionarioConPost($dicSubMG, $postLimpio);
$coincidenciasSubMF = compararDiccionarioConPost($dicSubMF, $postLimpio);
$coincidenciasTono = compararDiccionarioConPost($dicTono, $postLimpio);
$coincidenciasSignos = compararDiccionarioConPost($dicSignos, $postLimpio);
$coincidenciasPostura = compararDiccionarioConPost($dicPostura, $postLimpio);
$coincidenciasLenguaje = compararDiccionarioConPost($dicLenguaje, $postLimpio);
$coincidenciasCamposSignos = compararDiccionarioConPost($dicCamposSignos, $postLimpio);
$subMFSeparado = implode(" ", $dicSubMF);
$subKatonaSeparado = implode(" ", $dicKatona);
//MEJOR DEJAR LAS COINCIDENCIAS POR SEPARADO, ASÍ SE PUEDE SABER QUÉ VALORES SE VAN A MODIFICAR EN CADA EVALUACIÓN
$valoresParaModificar = array_merge($valoresParaModificar, $coincidenciasKatona, $coincidenciasSubMG, $coincidenciasSubMF, $coincidenciasTono, $coincidenciasSignos, $coincidenciasPostura, $coincidenciasLenguaje, $coincidenciasCamposSignos);
/*echo "<br>";
echo "Los valores a modificar son: "; var_dump($valoresParaModificar);
echo "<br>";
echo "El diccionario de SubMG es: "; var_dump($dicSubMG);
echo "<br>";
echo "El diccionario de Katona separado es: " . $subKatonaSeparado;
echo "<br>";
echo "Coincidencias encontradas en Katona: "; echo var_dump($coincidenciasKatona);
echo "<br>";
echo "Coincidencias encontradas en SubMG: "; echo var_dump($coincidenciasSubMG);
echo "<br>";
echo "El diccionario de las evaluaciones en katona que se ha registrado que el paciente ya tiene registrado "; var_dump($dicKatona);
echo "<br>";
echo "El array con los contenidos de POST "; var_dump($_POST);
echo "<br>";
*/
//echo "El array con los contenidos de POST limpio "; var_dump($postLimpio);
echo "<br>";
echo "El Post sin arreglar es"; print_r($_POST);
echo "<br>";
$idCambiarKatona = [];
$idCambiarSubMG = [];
$idCambiarLenguaje = [];
$idCambiarSubMF = [];
$idCambiarTono = [];
$idCambiarSignos = [];
$idCambiarPostura = [];
if (isset($_POST['id_resultados_submg'])) {
    foreach ($_POST['id_resultados_sub_mg'] as $id) {
        if (is_numeric($id)) {
            $idCambiarSubMG[] = $id;
        }
    }
}
echo "Los ids de subMG que se van a cambiar son: "; print_r($idCambiarSubMG);
if (isset($_POST['id_resultados_sub_mf'])) {
    foreach ($_POST['id_resultados_sub_mf'] as $id) {
        if (is_numeric($id)) {
            $idCambiarSubMF[] = $id;
        }
    }
}
echo "Los ids de subMF que se van a cambiar son: "; print_r($idCambiarSubMF);
if (isset($_POST['id_resultados_tono_muscular'])) {
    foreach ($_POST['id_resultados_tono_muscular'] as $id) {
        if (is_numeric($id)) {
            $idCambiarTono[] = $id;
        }
    }
}
echo "Los ids de tono que se van a cambiar son: "; print_r($idCambiarTono);
if (isset($_POST['id_resultados_signos_alarma'])) {
    foreach ($_POST['id_resultados_signos_alarma'] as $id) {
        if (is_numeric($id)) {
            $idCambiarSignos[] = $id;
        }
    }
}
echo "Los ids de signos que se van a cambiar son: "; print_r($idCambiarSignos);
if (isset($_POST['id_resultado_postura'])) {
    foreach ($_POST['id_resultado_postura'] as $id) {
        if (is_numeric($id)) {
            $idCambiarPostura[] = $id;
        }
    }
}
echo "Los ids de postura que se van a cambiar son: "; print_r($idCambiarPostura);
if (isset($_POST['id_resultados_lenguaje'])) {
    foreach ($_POST['id_resultados_lenguaje'] as $id) {
        if (is_numeric($id)) {
            $idCambiarLenguaje[] = $id;
        }
    }
}
echo "Los ids de lenguaje que se van a cambiar son: "; print_r($idCambiarLenguaje);
if (isset($_POST['id_resultados_katona'])) {
    foreach ($_POST['id_resultados_katona'] as $id) {
        if (is_numeric($id)) {
            $idCambiarKatona[] = $id;
        }
    }
}
echo "Los ids de katona que se van a cambiar son: "; print_r($idCambiarKatona);
if (isset($_POST['modified_ids'])) {
  $modifiedIds = json_decode($_POST['modified_ids'], true);
  // Ejemplo de uso:
  foreach ($modifiedIds as $id) {
    // Procesa solo el id_resultado modificado
    // (Aquí puedes aplicar tu lógica de actualización)
    echo "ID modificado: " . htmlspecialchars($id) . "<br>";
  }
}
echo "<br>";
echo "Los id en implode se ven asi" . implode("AND id_resultados_katona=", $idCambiarKatona) . "<br>";

    require './vistas/modificarEvaluacion.view.php';