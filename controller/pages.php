<?php

//class decaration in php, same as java
class pages {

  public function action(\Base $f3/*instance of fatfree*/ , array $args= []) :void/**doesnt return any value */ {
    echo "Hello ".$args['name'];
  }
}