<?php

class Controller_Task extends Controller
{
    function __construct()
    {
        $this->model = new Model_Task();
        $this->view = new View();
    }

    function action_index()
    {

        $data = $this->model->get_data();

        $this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function action_insert()
    {
        if(isset($_POST['taskName']) && isset($_POST['taskDescription'])) {
            $id = $this->model->insertTask($_POST['taskName'], $_POST['taskDescription']);
            echo $id;
        }
    }

    function action_update()
    {
        if(isset($_POST['id'])) {
            $this->model->updateTask($_POST['id'], 1);
        } else {
            var_dump('No id in POST');
        }
    }

}