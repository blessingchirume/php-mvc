<?php
    
    class Home extends Controller
    {
        public function index($data=[])
        {
            $user = $this->model('User');

           //$user->name = $name;
            $data = json_decode(@file_get_contents('php://input'),true);
            $this->view('home/index',$data);
            
        }
       
    }
    
