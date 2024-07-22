<?php 

// load the composer required libraries
require "vendor/autoload.php";

// load the framework
$f3 = Base::instance(); 

//configuration file
$f3->config('config.ini');

$f3->config('access.ini');

// framework to automatically load the classes within 
//$f3->set('AUTOLOAD', 'Controllers/');

// framework to automatically load the templates (VIEWS) within
//$f3->set("UI", "Views/");

// debugging
//$f3->set("DEBUG", 3);


// set routes

// -> home
$f3->route("GET @home: /", 'Pages->home');

// -> contact
$f3->route("GET @contact: /contact", 'Pages->contact');

// -> account
//$f3->route("GET @account: /account/manage", 'Pages->account');   // The user needs to log in to access teh account page
//$f3->route("GET @account: /account/@uid", 'Pages->account');
$f3->route("GET @account: /account/@uid", 'UserController->userAccount');

// -> login
$f3->route("GET @login: /login", 'Pages->login');
$f3->route("POST @login: /login", 'UserController->userLogin');

// -> signup
$f3->route("GET @signup: /signup", 'Pages->signup');
$f3->route("POST @signup: /signup", 'UserController->userSignup');

// -> tasks              // The user needs to log in to access teh tasks page
$f3->route('GET @tasklist: /tasks/@uid', 'TasksController->taskList');



$f3->run();
