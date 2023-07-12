<?php

// Configuración de la conexión a la base de datos
$host = 'localhost'; // Cambiar por el nombre del servidor si es necesario
$dbname = 'login_adrian'; // Cambiar por el nombre de la base de datos
$username = 'root'; // Cambiar por el nombre de usuario de la base de datos
$password = ''; // Cambiar por la contraseña de usuario de la base de datos

// Intenta conectarse a la base de datos
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Habilita las excepciones de PDO para reportar errores de manera adecuada
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si no podemos conectarnos a la base de datos, muestra un mensaje de error
    echo 'Error al conectar con la base de datos: ' . $e->getMessage();
    exit();
}