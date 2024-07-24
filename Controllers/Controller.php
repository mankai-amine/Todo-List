<?php 
// parent controller class

class Controller{

    protected $f3;
    protected $template;

    /**
     * Parent constructor setup common elements and value
     * @param object $f3 Instance of the FatFreeFramework
     */
    function __construct($f3){
        $this->f3 = $f3; // f3 instance to be used

        // Start the session
        session_start();

        // Flag to know if user is logged in
        $f3 -> isSessLoggedIn = (array_key_exists("sessIsAuth", $_SESSION) && $_SESSION['sessIsAuth'] == true);
        
        // setup of page title
        $f3->set('pageTitle', '');
        
        // setup errors variables used on several pages
        $f3->set("errors", null);

        // Initialize item inputs with empty strings
        $f3->set('item', [
            'name' => '',
            'email' => '',
            'password' => '',
            'password2' => ''
        ]);


        // setup template
        $this->template = new Template;
    }


    /**
     * Setup up the page title. Appends to existsig pageTitle
     * @param string $title New title to append
     */
    public function setPageTitle($title){
        $currentTitle = $this->f3->get('pageTitle');
        $newTitle = $title;

        if ($currentTitle != ""){
            // append string
            $newTitle .= $currentTitle . " | ";
        }

        $this->f3->set('pageTitle', $newTitle);
    } 

    /**
     * Redirect the user if they are not logged in
     * @param boolean $loginFlag
     */
    function loginRequired($loginFlag){
        // if the login is not true then redirect
        if ($loginFlag != true){
            $this->f3->reroute("@home");
        }
    }

}