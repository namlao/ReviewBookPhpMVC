<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'home';
    protected $currentMethod = 'index';
    protected $params = [];

    protected $controller = '';

    public function __construct(){

      $url = $this->getUrl();
      // nếu url có tồn tại controller -> $controller = $url[0];
      // Bắt buộc phải đặt tên file và class theo dang <ten>Controller.php -> OrderController
      if(isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]). 'Controller.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]).'Controller';
        $this->controller = $this->currentController;
        // Unset 0 Index
        unset($url[0]);
      }else{ //nếu url khong tồn tại controller -> $controller = currentController;
        $this->controller = ucwords($this->currentController).'Controller';
        
      }
      

      require_once '../app/controllers/'. $this->controller . '.php';
      // khởi tạo đối tượng controller
      $this->controller = new $this->controller;

      // kiểm tra param
      if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->controller, $url[1])){
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->controller, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  } 
  
  