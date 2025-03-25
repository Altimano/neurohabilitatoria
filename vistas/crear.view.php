<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Estudio</title>
</head>
<body>
<form method="post" action="/crear">
    <div class="container">
        <div class="input-box"><label for="" style="background-color: rgb(131 70 177);">Ingresa el nombre o codigo de paciente</label> </div>
        <div class="input-box">
            <input type="text" placeholder="Nombre" name="Nombre" id="Nombre">
        </div>
        <div class="input-box">
            <input type="submit" class="btn">
        </div>
        <div class="input-box" style="width: 10%; justify-content: center;">
            <a href="/inicio" class="btn2">Salir</a>
        </div>
    </div>
</form>
</html>