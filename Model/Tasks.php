<?php 

class Tasks extends Model{

    /**
     * tasks table connection
     */
    public function __construct(){
        parent::__construct('tasks');
    }

    /**
     * fetch individual task
     */
    public function getSingleTask($id){
        return $this->findone(['task_id=?', $id]);    
    }

    /**
     * fetch all tasks by user id
     */
    public function getTasksByUser(){
        $userID = 1;
        $status = "Ongoing";
        $this->load(array('user_id = ? AND status = ?', $userID, $status));
        return $this->query;
    }

    /**
     * new task
     */
    public function insertTask(){
        $this->copyfrom('POST');
        $this->user_id=1;
        $this->status='Ongoing';
        $this->save();
    } 

    /**
     * update task by task_id
     */
    public function updateById($id){
        $this->load( ['task_id=?', $id ]); // populate the object from the database
        $this->user_id=1;
        $this->status='Ongoing';
        $this->copyfrom('POST'); // overwrite object with form data
        $this->update();
    }
}
