<?php

class Controller
{

    public function model($model)
    {
        require_once '../app/models/' . $model . '.class.php';
        return new $model;
    }

    public function view($view, $data = [],$data2 = [])
    { 
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        }
    }
}
