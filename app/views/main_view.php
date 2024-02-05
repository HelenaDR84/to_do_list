<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once('app/controllers/CreateTaskController.php');
require_once('app/controllers/ReadTaskController.php');
require_once('app/controllers/UpdateTaskController.php');
require_once('app/controllers/DeleteTaskController.php');
require_once('app/models/Task.php');
require_once('app/database/DatabaseConnection.php');
require_once('app/FileUpload.php');

//echo "Archivos incluidos correctamente.";

// Agregar tarea
if (isset($_POST['submit'])) {
    try {
        $fileUpload = new FileUpload();

        // Verificar el tamaño del archivo
        $maxFileSize = convertBytes(ini_get('upload_max_filesize'));
        $uploadedFile = $_FILES['image'];

        // Subir archivo y obtener la ruta
        $taskImage = $fileUpload->uploadFile($uploadedFile, $maxFileSize);

        // Resto de tu lógica para agregar la tarea
        $createTaskController = new CreateTaskController();
        $taskName = $_POST['name'];
        $taskComments = $_POST['comments'] ?? '';
        $taskCategory = $_POST['category'] ?? '';
        $taskStatus = $_POST['status'] ?? 'pending';

        $createTaskController->createTask($taskName, $taskComments, $taskCategory, $taskStatus, $taskImage);

        // Recargar la página o redireccionar a la misma para actualizar la lista
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        echo 'Error al agregar la tarea: ' . $e->getMessage();
    }
}

// Obtener lista de tareas
$readTaskController = new ReadTaskController();
$tasks = $readTaskController->readTasks();

// Marcar tarea como completada
if (isset($_POST['complete_task'])) {
    $updateTaskController = new UpdateTaskController();
    $taskId = $_POST['task_id'];
    $updateTaskController->updateTaskStatus($taskId, 'completed');
    // Recargar la página o redireccionar a la misma para actualizar la lista
    header('Location: index.php');
    exit();
}

// Eliminar tarea
if (isset($_POST['delete_task'])) {
    $deleteTaskController = new DeleteTaskController();
    $taskId = $_POST['task_id'];
    $deleteTaskController->deleteTask($taskId);
    // Recargar la página o redireccionar a la misma para actualizar la lista
    header('Location: index.php');
    exit();
}

// Función para convertir tamaños de archivo a bytes
function convertBytes($value)
{
    $unit = strtolower($value[strlen($value) - 1]);
    $value = (int)$value;

    switch ($unit) {
        case 'k':
            $value *= 1024;
            break;
        case 'm':
            $value *= 1024 * 1024;
            break;
        case 'g':
            $value *= 1024 * 1024 * 1024;
            break;
    }

    return $value;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
</head>

<body style="
      min-height: 100vh; 
        background-image: url('./public/images/OIP.jpeg');
        background-size: cover;
      ">

    <header>
        <h1>P8 To Do List Helena</h1>
    </header>
    <main>
        <div class="heading">
            <h2>Femcoders To Do List</h2>
        </div>
        <form method="post" action="index.php" class="input_form" enctype="multipart/form-data">
            <label for="name">Task :*</label>
            <input type="text" name="name" id="name" class="task_input" placeholder="Enter task" required>

            <label for="comments">Task comments:</label>
            <input type="text" name="comments" id="comments" class="task_input" placeholder="Write a comment">

            <label for="image">Task image:</label>
            <input type="file" name="image" id="image" class="task_input_img" accept="image/*">

            <label for="priority">Task priority:</label>
            <select name="priority" id="priority" class="task_input">
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>

            <label for="status">Task status:</label>
            <select name="status" id="status" class="task_input">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>

            <label for="category">Task category:</label>
            <input type="text" name="category" id="category" class="task_input" placeholder="Enter task category">

            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </form>

        <div class="task-list">
            <h3>Task List</h3>
            <ul>
                <?php foreach ($tasks as $task) : ?>
                    <li>
                        <span><?= $task['task']; ?></span>
                        <?php if (!empty($task['comments'])) : ?>
                            <span class="comments">Comments: <?= $task['comments']; ?></span>
                        <?php endif; ?>
                        <?php if (!empty($task['image'])) : ?>
                            <img src="<?= $task['image']; ?>" alt="Task Image" class="task-image">
                        <?php endif; ?>
                        <?php if (!empty($task['priority'])) : ?>
                            <span class="priority">Priority: <?= ucfirst($task['priority']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($task['category'])) : ?>
                            <span class="category">Category: <?= $task['category']; ?></span>
                        <?php endif; ?>
                        <form method="post" action="index.php" style="display: inline;">
                            <input type="hidden" name="task_id" value="<?= $task['id_task']; ?>">
                            <?php if (isset($task['status']) && $task['status'] === 'completed') : ?>
                                <span class="status">Completed</span>
                            <?php else : ?>
                                <label for="complete_task_<?= $task['id_task']; ?>">
                                    <input type="checkbox" id="complete_task_<?= $task['id_task']; ?>" name="complete_task" <?php if (isset($task['status']) && $task['status'] === 'completed') echo 'checked'; ?>>
                                    Complete
                                </label>
                            <?php endif; ?>
                            <button type="submit" name="delete_task">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </main>
    <footer>
    </footer>
</body>

</html>