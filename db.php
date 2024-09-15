<?php
    $host = 'localhost';
    $db = 'gestion_tareas';
    $user = 'root';  // Cambiar si usas otro usuario
    $pass = '';  // Añadir la contraseña si la tienes

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
    }
?>
