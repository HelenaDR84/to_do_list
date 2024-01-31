<?php
include("AddTask.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
</head>

<body>

    <header>
        <h1>P8 To Do List Helena</h1>
    </header>
    <main>
        <div class="heading">
            <h2>Femcoders To Do List</h2>
        </div>
        <form method="post" action="index.php" class="input_form">
            <label for="name">Task title:</label>
            <input type="text" name="name" id="name" class="task_input" placeholder="Enter task title" required>

            <label for="description">Task description:</label>
            <textarea name="description" id="description" class="task_input" placeholder="Enter task description" required></textarea>

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
    </main>
    <footer>

    </footer>

</body>

</html>