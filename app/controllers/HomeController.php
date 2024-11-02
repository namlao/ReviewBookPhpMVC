<?php
class HomeController extends Controller{
    
    protected $model = null;

    public function index(){
        // $result = $this->model("Books")->getAll();

        $table = $this->model("Books");
        // $book = $table->getAll();
        var_dump($table->getAll());
        // return $this->view('index');
    }    
}