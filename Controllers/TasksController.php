<?php

class TasksController extends Controller{

  private $model;

  public function __construct($f3){
    parent::__construct($f3);
    $this->model = new Tasks();
  }

  public function taskList(){
    $uid = $this->f3->get('PARAMS.uid');
    $this-> loginRequired( ($this-> f3-> isSessLoggedIn)  && ($this->f3->get('PARAMS.uid') == $_SESSION['sessId'] )) ;

    if (isset($_GET['sort_by']) && isset($_GET['order'])){
      $sort_by = $this->f3->get('GET.sort_by');
      $order = $this->f3->get('GET.order');
      $tasks = $this->model->getTasksByUser($uid, $sort_by, $order);
    } else {
      $tasks = $this->model->getTasksByUser($uid);
    }

    $this->f3->set('tasks',$tasks);
    $this->setPageTitle("Tasks");
    echo $this->template->render("tasks.html");
  }

  /**
   * if task already exists, we update, if not, we insert
   */
  public function newTask($f3){
    //validating form 
    if ($this->validateTask()){
      
      //checking whether task_id is sent
      $taskId = $this->f3->get("POST.task_id");
      $existingTask = $this->model->getSingleTask($taskId);
      
      if($existingTask){
         //if there is already a task with the same id, we run the update function from model
        $this->model->updateById($taskId, $f3);

      } else if(!$existingTask){
        //if there is no task with the same id, we run the insert
        $this->model->insertTask($f3);
      }
      
      $this->taskList();
    } else {
      //redirect
      $this->taskList();
    }
    

    
  }

  private function validateTask() {
    if (!isset($_POST['title']) || trim($this->f3->get('POST.title') ?? '') == "") {
        return false;
    }
    
    if (!isset($_POST['description']) || trim($this->f3->get('POST.description') ?? '') == "") {
        return false;
    }
    
    if (!isset($_POST['due_date']) || trim($this->f3->get('POST.due_date') ?? '') == "") {
        return false;
    }
    
    if (!isset($_POST['category']) || trim($this->f3->get('POST.category') ?? '') == "") {
        return false;
    }
    
    if (!isset($_POST['priority']) || trim($this->f3->get('POST.priority') ?? '') == "") {
        return false;
    }
    
    return true;
  }
}