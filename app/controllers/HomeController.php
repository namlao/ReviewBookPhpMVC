<?php
class HomeController extends Controller{
    
    public function index(){
        $book = $this->model("test")->getAll()->execute();
        return $this->view('index',['book' => $book]);
    }    
}