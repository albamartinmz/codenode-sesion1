<?php

//  Procesamiento del formulario de contacto en el servidor


// Solo procesamos si la petición es POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 1. Recoger y limpiar los datos
    $nombre    = trim(htmlspecialchars($_POST["nombre"]    ?? ""));
    $apellidos = trim(htmlspecialchars($_POST["apellidos"] ?? ""));
    $email     = trim(htmlspecialchars($_POST["email"]     ?? ""));
    $telefono  = trim(htmlspecialchars($_POST["telefono"]  ?? ""));
    $mensaje   = trim(htmlspecialchars($_POST["mensaje"]   ?? ""));

    // 2. Validación
    $errores = [];

    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    } elseif (!preg_match('/^[a-zA-ZàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞŸăşţĂŞŢčšžČŠŽćđžĆĐŽłńśźżŁŃŚŹŻőűŐŰ\s\-\']+$/u', $nombre)) {
        $errores[] = "El nombre solo puede contener letras y espacios.";
    }

    if (empty($apellidos)) {
        $errores[] = "Los apellidos son obligatorios.";
    } elseif (!preg_match('/^[a-zA-ZàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞŸăşţĂŞŢčšžČŠŽćđžĆĐŽłńśźżŁŃŚŹŻőűŐŰ\s\-\']+$/u', $apellidos)) {
        $errores[] = "Los apellidos solo pueden contener letras y espacios.";
    }

    if (empty($email)) {
        $errores[] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email no es válido.";
    }

    if (!empty($telefono) && !preg_match('/^[+0-9\s\-]{7,15}$/', $telefono)) {
        $errores[] = "El formato del teléfono no es válido.";
    }

    if (empty($mensaje)) {
        $errores[] = "El mensaje es obligatorio.";
    }

    // 3. Pasar datos a la vista y cargarla
    $tipo  = empty($errores) ? "exito" : "error";
    $datos = compact("nombre", "apellidos", "email", "telefono", "mensaje");

    include "confirmation.php";

} else {
    // Acceso directo sin enviar el formulario -> redirigir al inicio
    header("Location: index.html");
    exit;
}
