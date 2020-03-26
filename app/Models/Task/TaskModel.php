<?php

namespace App\Models\Task;

use App\Core\Model;

class TaskModel extends Model
{
    public $title;
    public $description;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        if (isset($title)){
            $this->title = $title;
        }
    }
    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        if (isset($description)){
            $this->description = $description;
        }
    }
}
?>