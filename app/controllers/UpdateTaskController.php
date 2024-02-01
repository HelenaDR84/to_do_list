<?php

require_once('./app/models/Task.php');
require_once('./app/database/DatabaseConnection.php');

class UpdateTaskController
{
    public function updateTask($taskId, $newTask, $newComments, $newCategory, $newComplete, $newImage)
    {
        $conn = DatabaseConnection::connecto();

        try {
            $sql = "UPDATE tasks 
                    SET task = :newTask, task_comments = :newComments, category = :newCategory, 
                        complete = :newComplete, task_image = :newImage
                    WHERE id_task = :taskId";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':newTask', $newTask);
            $stmt->bindParam(':newComments', $newComments);
            $stmt->bindParam(':newCategory', $newCategory);
            $stmt->bindParam(':newComplete', $newComplete);
            $stmt->bindParam(':newImage', $newImage, PDO::PARAM_LOB);
            $stmt->bindParam(':taskId', $taskId);

            $stmt->execute();

            echo "Tarea actualizada con éxito.";
        } catch (PDOException $e) {
            echo "Error al actualizar tarea: " . $e->getMessage();
        }
    }
    public function updateTaskStatus($taskId, $status)
    {
        $conn = DatabaseConnection::connecto();

        try {
            $sql = "UPDATE tasks SET complete = :status WHERE id_task = :taskId";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':taskId', $taskId);
            $stmt->execute();

            echo "Estado de tarea actualizado con éxito.";
        } catch (PDOException $e) {
            echo "Error al actualizar estado de tarea: " . $e->getMessage();
        }
    }
}
echo "Función updateTaskStatus() llamada correctamente.";

?>
