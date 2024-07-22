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
}