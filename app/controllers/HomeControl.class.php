<?php 
class HomeControl extends Controller{
    public function index()
    {
        error_reporting(0);
        if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) ||$_SESSION['user_id'] == ' ' ) {
            $loginLogout = [
                'loginLogout' => 'users/login',
                'name' => 'login'
            ];
        }else{
            $loginLogout = [
                'loginLogout' => 'users/logout',
                'name' => 'logout'
            ];
        }
        $this->view('HomePage',$loginLogout);
    }
    public function Contact()
    {
        error_reporting(0);
        if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) ||$_SESSION['user_id'] == ' ' ) {
            $loginLogout = [
                'loginLogout' => 'users/login',
                'name' => 'login'
            ];
        }else{
            $loginLogout = [
                'loginLogout' => 'users/logout',
                'name' => 'logout'
            ];
        }
        $this->view('Contact',$loginLogout);
    }
}