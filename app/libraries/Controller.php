<?php
  /*
   * Base Controller
   * Loads the models and views
   */
  class Controller {
    // Load model
    public function model($model){
      // Require model file
      require_once '../app/models/' . $model . '.php';

      // Instatiate model
      return new $model();
    }

    // Load view
    public function view($view, $data = []){
      // Check for view file
      if(file_exists('../app/views/' . $view . '.php')){
        extract($data);
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist
        die('View does not exist');
      }
    }


    function header($info = []){
      if(!file_exists(APPROOT."/views/inc/header.php")){
        die("file header not found");
      }
      extract($info);
      require_once(APPROOT."/views/inc/header.php");
    }

    function footer($script){
      if(!file_exists(APPROOT."/views/inc/footer.php")){
        die("file footer not found");
      }
      
      require_once(APPROOT."/views/inc/footer.php");
    }
  }