<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task\TaskRepository;
use App\Entities\Tasks;

class TasksController extends Controller
{
    protected $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    function index()
    {
        $task = $this->taskRepository->getAll();
        $d['tasks'] = $task;
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            require "../cli-config.php";
            $task = new Tasks();
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            $task->setcreatedAt();
            $task->setupdatedAt();
            $em->persist($task);
            $em->flush();

        }

        $this->render("create");
    }

    function edit($id)
    {

        $d["task"] = $this->taskRepository->showTask($id);
        require "../cli-config.php";
        if (isset($_POST["title"]))
        {
            $d["task"] = $em->getRepository(Tasks::class)->find($id);
            $d["task"]->setTitle($_POST["title"]);
            $d["task"]->setDescription($_POST["description"]);
            $d["task"]->setcreatedAt();
            $d["task"]->setupdatedAt();
            $em->flush();
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if ($this->taskRepository->delete($id))
        {
            header("Location: " . WEBROOT . "/tasks/index");
        }
    }
}
?>