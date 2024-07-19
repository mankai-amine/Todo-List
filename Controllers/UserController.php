<?php


 class UserController extends Controller{

    private $model; 

    public function __construct($f3){
        // execute parent constructor
        parent::__construct($f3);
        
        $this->model = new User(); // establish database connection    
    }


    /**
     * Validate and create a new user
     */
    public function addUser(){
        if ($this->isFormValid()){
            // save and reroute
            $userId = $this->model->userSignup();
            $this->f3->reroute("@tasklist");
        }
    }

    /**
     * Validate the data for the form after a POST method
     * If nay date does not pass validation, the form is shown and false is returned
     * @return boolean TRUE if the form is valid
     */
    private function isFormValid(){

        $errors = [];
        // validate the name
        if (trim($this->f3->get('POST.name')) == ""){
            array_push($errors, "Name is not valid");
        }

        // validate the email
        if (trim($this->f3->get('POST.email')) == ""){
            array_push($errors, "Email is not valid");
        }

        // validate the password
        if ( trim($this->f3->get('POST.password')) == "" ){
            array_push($errors, "Email is not valid");
        }

        if ( $this->f3->get('POST.password') !== $this->f3->get('POST.password2') ){
            array_push($errors, "Emails do not match");
        }

        //TODO: check if there is already an existing user with the same email
        

        if (empty($errors)){
            return true;
        } else {
            $this->f3->set("item", $this->f3->get("POST"));

            $this->f3->set("errors", $errors);
            echo $this->template->render("signup.html");

            return false;
        }
    }


 }