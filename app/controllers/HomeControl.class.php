<?php 
class HomeControl extends Controller{
    public function index()
    {
        if ($_SESSION['user_id'] == null) {
            $loginLogout = 'users/login';
        }else{
            $loginLogout = 'users/logout';}
        $this->view('test',$loginLogout);
    }
}