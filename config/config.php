<?php
// Detectar URL base dinámicamente
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$scriptName = str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME']));
$basePath = rtrim($scriptName, '/');
$baseUrl = rtrim($scheme . '://' . $host . $basePath, '/');

// Función helper para generar URLs completas
function base_url($path = '') {
    global $baseUrl;
    return $baseUrl . $path;
}
