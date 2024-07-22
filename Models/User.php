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
    public function saveUser(){
        $this->copyfrom('POST');
        $this->save();

        return $this->user_id; // last insersted id
    }

    /**
     * Fetch a single value from the table using `email`
     * @param email email of row to fetch
     * @return Object database result
     */

    public function findUserByEmail($email) {
        return $this->findOne(['email=?', $email]);
    }

    /**
     * Fetch a single value from the table using the `id` primary key
     * @param int Id of row to fetch
     * @return Object database result
     */
    public function findUserById( $uid ){
        return $this->findone(['user_id=?', $uid]);
    }
}