<?php

Class Model extends DB\SQL\Mapper{

    protected $db;

    /**
     * Parent class constructor - taken from steph repo 
     * @param string $table Name of the database table to interact with
     */
    public function __construct($table){
        $f3 = Base::instance(); // load the framework

        $db_name = $f3->get('DBNAME');
        $db_user = $f3->get('DBUSER');
        $db_pass = $f3->get("DBPASS");
        $db_port = $f3->get('DBPORT');
        // connect to the database
        $this->db = new DB\SQL(
            "mysql:host=localhost;dbname={$db_name};port={$db_port}",
            $db_user,
            $db_pass
        );

        // create mapper of given table
        parent::__construct($this->db, $table);
    }
}