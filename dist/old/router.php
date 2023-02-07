<?php

class Router {

  public function getUri() {
    if(!empty($_SERVER['REQUEST_URI'])) {
      return trim($_SERVER['REQUEST_URI'], "/");
    }

    return "/";
  }

  public function run() {
    $uri = $this->getUri();

    $routes = array(
      "disinsection" => __DIR__."/pages/bug.php",
      "disinfection" => __DIR__."/pages/mold.php",
      "acarid" => __DIR__."/pages/acarid.php",
      "rats" => __DIR__."/pages/rats.php"
    );

    foreach($routes as $pattern => $path) {
      if(preg_match("~$pattern~", $uri)) {
        if(file_exists($path)) {
          include_once($path);
          return;
        }
      }
    }

    include_once(__DIR__."/pages/mole.php");
  }

}

?>