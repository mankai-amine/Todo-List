<?php 

class Tasks extends Model{

    /**
     * tasks table connection
     */
    public function __construct(){
        parent::__construct('tasks');
    }

    /**
     * fetch all tasks by user id
     */
    public function getTasksByUser(){
        $this->load('user_id=1');
        return $this->query;
    }
}