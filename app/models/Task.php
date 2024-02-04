<?php

class Task
{
    public $id_task;
    public $task;
    public $task_comments;
    public $category;
    public $complete;
    public $task_image;


    public function __construct($data)
    {

        $this->id_task = $data['id_task'];
        $this->task = $data['task'];
        $this->task_comments = $data['task_comments'];
        $this->category = $data['category'];
        $this->complete = $data['complete'];
        $this->task_image = $data['task_image'];
    }

    //métodos getter y setter en tu clase Task para acceder y modificar los atributos de manera controlada.
    
    // Métodos Getter
    public function getId()
    {
        return $this->id_task;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function getTaskComments()
    {
        return $this->task_comments;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getComplete()
    {
        return $this->complete;
    }

    public function getTaskImage()
    {
        return $this->task_image;
    }

    // Métodos Setter
    public function setTask($task)
    {
        $this->task = $task;
    }

    public function setTaskComments($comments)
    {
        $this->task_comments = $comments;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setComplete($complete)
    {
        $this->complete = $complete;
    }

    public function setTaskImage($image)
    {
        $this->task_image = $image;
    }
}

?>
