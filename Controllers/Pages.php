<?php

class Pages extends Controller{



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

  /**
   * GET signup page
   */
  function signup($f3){

    $this->setPageTitle("Signup");

    echo $this->template->render("signup.html");
  }
}
