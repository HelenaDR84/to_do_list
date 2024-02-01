<?php

require_once('./app/models/Task.php');
require_once('./app/database/DatabaseConnection.php');

class CreateTaskController
{
    public function createTask($task, $comments, $category, $complete, $image)
    {
        $conn = DatabaseConnection::connecto();

        try {
            $sql = "INSERT INTO tasks (task, task_comments, category, complete, task_image) 
                    VALUES (:task, :comments, :category, :complete, :image)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':task', $task);
            $stmt->bindParam(':comments', $comments);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':complete', $complete);
            $stmt->bindParam(':image', $image, PDO::PARAM_LOB);

            $stmt->execute();

            echo "Tarea creada con éxito.";
        } catch (PDOException $e) {
            echo "Error al crear tarea: " . $e->getMessage();
        }
    }
}
echo "Función createTask() llamada correctamente.";

?>
