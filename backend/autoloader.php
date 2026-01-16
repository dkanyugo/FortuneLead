<?php

spl_autoload_register('autoloader');

function autoloader($classname){
  $directories = ["utils"];
  $extension = ".php";
  foreach($directories AS $dir){
    $FileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir .  DIRECTORY_SEPARATOR . $classname . '.php';

    if(file_exists($FileName) AND is_readable($FileName)){
      require_once $FileName;
    } else {
      return false;
    }
  }
}

?>

