<?php
  require_once '../app/bootstrap.php';

  // Init Core Library
  $init = new Core;


  // set eviroment
  if(EVM == 'developments'){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  }