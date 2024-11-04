<?php
class HomeController extends Controller{
    
    public function index(){
        // $book = $this->model("test")->getAll()->execute();

        
        return $this->view('index');
    }    
    public function add(){
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo(upload_file('fileUpload'));
       }
    }
}