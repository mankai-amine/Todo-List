<?php 

// load the composer required libraries
require "vendor/autoload.php";

// load the framework
$f3 = Base::instance(); 

// framework to automatically load the classes within 
$f3->set('AUTOLOAD', 'Controllers/');

// framework to automatically load the templates (VIEWS) within
$f3->set("UI", "Views/");

// debugging
$f3->set("DEBUG", 3);


// set routes

// -> home
$f3->route("GET @home: /", 'Pages->home');

// -> contact
$f3->route("GET @contact: /contact", 'Pages->contact');

// -> contact
$f3->route("GET @account: /account", 'Pages->account');

// -> login
$f3->route("GET @login: /login", 'Pages->login');
//$f3->route("POST @login: /login/@name", 'Pages->loginSave');

// -> signup
$f3->route("GET @signup: /signup", 'Pages->signup');

//$f3->route('GET|POST /helloworld/@name', 'pages->action');  /* How does this work ? */
$f3->run();
