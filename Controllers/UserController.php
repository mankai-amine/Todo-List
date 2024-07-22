<?php


 class UserController extends Controller{

    private $model; 

    public function __construct($f3){
        // execute parent constructor
        parent::__construct($f3);
        
        // establish database connection 
        $this->model = new User();    
    }


    /**
     * Validate and create a new user
     */
    public function userSignup(){
        if ($this->isSignupFormValid()){
            // save, get the ID and reroute
            $userId = $this->model->saveUser();
            $this->f3->reroute("@tasklist(@uid={$userId})");
        } 
    }

    /**
     * Allow the user the log in
     */
    public function userLogin(){
        if ($this->isLoginFormValid()){
            // get the ID reroute
            $email = $this->f3->get('POST.email');
            $userId = $this->model->findUserByEmail($email)->user_id;
            $this->f3->reroute("@tasklist(@uid={$userId})");
        } 
    }

    /**
     * Allow the user the log in
     */
    public function userAccount(){
        // fetch the user 
        $user = $this->model->findUserById( $this->f3->get('PARAMS.uid') );

        // redirect if user does not exist 
        if (!$user){
            $this->f3->reroute('@home');
        }

        $this->setPageTitle("Account");
        $this->f3->set("item", $user);
        echo $this->template->render("account.html");      

    } 


    /**
     * Validate the data for the form after a POST method
     * If any data does not pass validation, the form is shown and false is returned
     * @return boolean TRUE if the form is valid
     */
    private function isSignupFormValid(){

        $errors = [];
   
        // check if the email is valid
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        array_push($errors, "The email is not valid");

        // check if the user entered the same password twice
        if ( $this->f3->get('POST.password') !== $this->f3->get('POST.password2') ){
            array_push($errors, "Passwords do not match");
        }

        // check if there is already a user with the same email
        $email = $this->f3->get('POST.email');
        $existingUser = $this->model->findUserByEmail($email);

        if ($existingUser){
            array_push($errors, "There is an existing user with the same email address");
        }
        

        if (empty($errors)){
            return true;
        } else {
            $this->f3->set("item", $this->f3->get("POST"));

            $this->f3->set("errors", $errors);
            echo $this->template->render("signup.html");

            return false;
        }
    }

    /**
     * Validate the data for the form after a POST method
     * If any data does not pass validation, the form is shown and false is returned
     * @return boolean TRUE if the form is valid
     */
    private function isLoginFormValid(){

        $errors = [];

        // check if there is a user with this email
        $email = $this->f3->get('POST.email');
        $existingUser = $this->model->findUserByEmail($email);

        if (!$existingUser){
            array_push($errors, "There is no user with this email address");
        } else {
            // check if the password is correct
            $correctPassword = $existingUser->password;
            $enteredPassword = $this->f3->get('POST.password');

            if ($correctPassword !== $enteredPassword){
                array_push($errors, "The password is incorrect");
            }    
        }  

        if (empty($errors)){
            return true;
        } else {
            $this->f3->set("item", $this->f3->get("POST"));

            $this->f3->set("errors", $errors);
            echo $this->template->render("login.html");

            return false;
        }
    }
 
}