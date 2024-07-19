<?php 
/**
 * Model to interact with Portfolio table
 */
class User extends Model{

    /**
     * Establish the table to use for the database
     */
    public function __construct(){
        parent::__construct('users');
    }

    /**
     * Insert a new row into the table using POST data
     * @return int Last inserted ID
     */
    public function userSignup(){
        $this->copyfrom('POST');
        $this->save();

        return $this->user_id; // last insersted id
    }
}