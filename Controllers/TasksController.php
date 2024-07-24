<?php

class TasksController extends Controller{

  private $model;

  public function __construct($f3){
    parent::__construct($f3);
    $this->model = new Tasks();
  }

  public function taskList(){

    $this-> loginRequired( ($this-> f3-> isSessLoggedIn)  && ($this->f3->get('PARAMS.uid') == $_SESSION['sessId'] )) ;

    $tasks = $this->model->getTasksByUser();

    $this->f3->set('tasks',$tasks);
    $this->setPageTitle("Tasks");
    echo $this->template->render("tasks.html");
  }

  /**
   * if task already exists, we update, if not, we insert
   */
  public function newTask(){
    //validating form 
    if ($this->validateTask()){
      
      //checking whether task exists
      $taskId = $this->f3->get("POST.task_id");
      $existingTask = $this->model->getSingleTask($taskId);
      
      if($existingTask){
         //if there is already a task with the same id, we run the update function from model
        $this->model->updateById($taskId);

      } else if(!$existingTask){
        //if there is no task with the same id, we run the insert
        $this->model->insertTask();
      }
      
      $this->taskList();
    } else {
      //redirect
      $this->f3->setPageTitle('YOUR TASKS');
      echo $this->template->render('tasks.html');
    }
    

    
  }

  private function validateTask(){
    if (trim($this->f3->get('POST.title')) == ""){
      return false;
    }
    if (trim($this->f3->get("POST.description")) == ""){
      return false;
    }
    if (trim($this->f3->get("POST.due_date")) == ""){
      return false;
    }
    if (trim($this->f3->get('POST.category')) == ""){
      return false;
    }
    if (trim($this->f3->get("POST.priority")) == ""){
      return false;
    }
    return true;
  }
}