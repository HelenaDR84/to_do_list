<?php

class DatabaseConnection
{
    public static function connecto()
    {
        $config = include('./app/config/Database.php');
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        echo "Conexión establecida.";
        try {
            return new PDO($dsn, $config['username'], $config['password']);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

?>
