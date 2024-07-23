<?php

class TasksController extends Controller{

  private $model;

  public function __construct($f3){
    parent::__construct($f3);
    $this->model = new Tasks();
  }

  public function taskList(){
    $tasks = $this->model->getTasksByUser();

    $this->f3->set('tasks',$tasks);
    $this->setPageTitle("Tasks");
    echo $this->template->render("tasks.html");

    //test
  }

  public function newTask(){
    //exec the model
    if ($this->validateTask()){
      $this->model->insertTask();
      //reset page data & redirect
      $this->taskList();
    } else {
      echo "could not process request";
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