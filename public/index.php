<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <h1>P8 To Do List Helena</h1>
    </header>
    <main>
        <div class="heading">
            <h2 style="font-style: 'Hervetica';">P8 To Do List Helena</h2>
        </div>
        <form method="post" action="index.php" class="input_form">
            <input type="text" name="name" id="name" class="task_input" required>
            <label for="description">Task description</label>
            <textarea name="description" id="description" class="task_input"></textarea>
            <label for="comments">Comentarios de la tarea</label>
            <input type="text" name="comments" id="comments" class="task_input" placeholder="Escribe un comentario">
            <label for="image">Task image</label>
            <input type="file" name="image" id="image" class="task_input" accept="image/*">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add task</button>
    </main>
    <footer>

    </footer>

</body>

</html>