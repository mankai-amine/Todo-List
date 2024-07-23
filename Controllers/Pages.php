<?php

 class Pages extends Controller{

  private $model;

  /**
   * Parent constructor setup common elements and value
   * @param object $f3 Instance of the FatFreeFramework
   */
  function __construct($f3){
    parent::__construct($f3);


    //db connection
    //$this->model= new Model();
  }


  /**
     * GET home page
     */
  function home($f3){
        
    $this->setPageTitle("Home");
    echo $this->template->render("index.html");
  }

  /**
     * GET contact page
     */
    function contact($f3){
        
    $this->setPageTitle("Contact");  
    echo $this->template->render("contact.html");
  }

  /**
   * GET login page
   */
  function login($f3){
      
      $this->setPageTitle("Login");
      
      echo $this->template->render("login.html");
  }

  /**
   * GET signup page
     */
  function signup($f3){
    
    $this->setPageTitle("Signup");

    echo $this->template->render("signup.html");
  }

  /**
   * GET account page
   */
  function account(){
    $this->setPageTitle("Account");
    echo $this->template->render("account.html");
  }

  function Tasks(){
  }

}
