<?php

require_once('./app/models/Task.php');
require_once('./app/database/DatabaseConnection.php');

class DeleteTaskController
{
    public function deleteTask($taskId)
    {
        $conn = DatabaseConnection::connecto();

        try {
            $sql = "DELETE FROM tasks WHERE id_task = :taskId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':taskId', $taskId);
            $stmt->execute();

            echo "Tarea eliminada con éxito.";
        } catch (PDOException $e) {
            echo "Error al eliminar tarea: " . $e->getMessage();
        }
    }
}
echo "Función deleteTask() llamada correctamente.";
?>
