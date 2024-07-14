<?php
// Autoload dependencies
require('vendor/autoload.php');

// Create a new instance of the Fat-Free Framework
$f3 = Base::instance();
//set autoload to access files from wherever
$f3->set('AUTOLOAD', 'controller/');



$f3->route('GET|POST /helloworld/@name', 'pages->action');
$f3->run();

