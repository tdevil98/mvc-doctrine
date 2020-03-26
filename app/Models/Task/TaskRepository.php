<?php
    namespace App\Models\Task;

    use App\Models\Task\TaskResourceModel;

    class TaskRepository {

        private $resourceModel;

        public function __construct()
        {
            $this->resourceModel = new TaskResourceModel();
        }

        public function add($model) {
            return $this->resourceModel->add($model);
        }

        public function showTask($id) {
            return $this->resourceModel->showTask($id);
        }

        public function getAll() {
            return $this->resourceModel->showAllTasks();
        }


        public function update($id, $model) {
            return $this->resourceModel->edit($id, $model);
        }

        public function delete($id) {
            return $this->resourceModel->delete($id);
        }
    }
?>