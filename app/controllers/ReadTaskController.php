<?php

require_once('./app/models/Task.php');
require_once('./app/database/DatabaseConnection.php');

class ReadTaskController
{
    public function readTasks()
    {
        $conn = DatabaseConnection::connecto();

        try {
            $sql = "SELECT * FROM tasks";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Puedes devolver los resultados o hacer lo que necesites con ellos
            return $tasks;
        } catch (PDOException $e) {
            echo "Error al leer tareas: " . $e->getMessage();
        }
    }
}
//echo "Función readTasks() llamada correctamente.";

?>
