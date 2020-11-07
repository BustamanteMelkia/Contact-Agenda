<?php
    // credenciales de la base de datos
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_HOST','localhost');
    define('DB_NAME','agenda');
    // Conectar a la base de datos

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // echo $conn->ping(); // verificar conexión 1= conexión exitosa
?>