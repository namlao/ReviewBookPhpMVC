<?php
class PostController extends Controller{
    public function index(){
       return $this->view('show');
    }
}