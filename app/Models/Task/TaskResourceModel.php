<?php
namespace App\Models\Task;

use App\Entities\Tasks;
use App\Core\ResourceModel;

class TaskResourceModel extends ResourceModel {

    private $resourceModel;
    public function __construct()
    {
        $task = new Tasks();
        $this->_init('tasks', 'id', $task);
    }
}
?>