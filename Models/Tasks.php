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
    public function getTasksByUser($id) {
        $statuses = ['Ongoing', 'Pending'];
        $this->load(array('user_id = ? AND status IN (?, ?)', $id, $statuses[0], $statuses[1]));
        return $this->query;
    }
    

    public function sortByUser($id, $sortBy, $order){
        $statuses = ['Ongoing', 'Pending'];
        $this->load(array('user_id = ? AND status IN (?, ?)', $id, $statuses[0], $statuses[1]));
        $this->sort($sortBy, $order);
        return $this->query;
    }

    /**
     * new task
     */
    public function insertTask($f3){
        $this->copyfrom('POST');
        $this->user_id=$f3->get('PARAMS.uid');
        $this->status='Ongoing';
        $this->save();
    } 

    /**
     * update task by task_id
     */
    public function updateById($id, $f3){
        $this->load( ['task_id=?', $id ]); // populate the object from the database
        $this->user_id=$f3->get('PARAMS.uid');
        $this->copyfrom('POST'); // overwrite object with form data
        $this->update();
    }
}