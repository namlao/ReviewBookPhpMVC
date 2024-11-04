<?php
  // Load Config
  require_once 'config/config.php';
  require_once 'helpers/url_helpers.php';
  require_once 'helpers/session_helper.php';
  require_once 'helpers/upload_file_helper.php';

  // Autoload Core Libraries
  $autoload = [
    'Controller',
    'Core',
    'Database',
    'Model'
  ];
foreach($autoload as $className){
  require_once 'libraries/' . $className . '.php';
}