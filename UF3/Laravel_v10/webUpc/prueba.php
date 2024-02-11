<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=webupc', 'root', '');
    echo "Conexión exitosa.";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
