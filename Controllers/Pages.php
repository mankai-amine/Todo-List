<?php

 class Pages{

  protected $f3;
  protected $template;

  /**
   * Parent constructor setup common elements and value
   * @param object $f3 Instance of the FatFreeFramework
   */
  function __construct($f3){
      $this->f3 = $f3; // f3 instance to be used
      
      // setup of page title
      $f3->set('pageTitle', '');
      // setup errors variables used on several pages
      $f3->set("errors", null);

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
     * GET account page
     */
    function account($f3){
        
      $this->setPageTitle("Account");
      
      echo $this->template->render("account.html");
  }


  /**
   * GET login page
   */
  function login($f3){
      
      $this->setPageTitle("Login");
      
      echo $this->template->render("login.html");
  }
}